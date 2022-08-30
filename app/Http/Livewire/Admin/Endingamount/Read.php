<?php

namespace App\Http\Livewire\Admin\Endingamount;

use App\Models\EndingAmount;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Read extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;
    
    protected $queryString = ['search','category_id','project_id','worker_id'];


    protected $listeners = ['endingamountDeleted'];

    public $sortType;
    public $sortColumn;

    public $category_id;
    public $project_id;
    public $worker_id;
    public $total_amount=0;
    public $total_pay=0;
    public $total_rest=0;

    public function endingamountDeleted(){
        // Nothing ..
    }

    public function sort($column)
    {
        $sort = $this->sortType == 'desc' ? 'asc' : 'desc';

        $this->sortColumn = $column;
        $this->sortType = $sort;
    }


    public function getData()
    {
        $data = EndingAmount::query();

        $instance = getCrudConfig('expense');
        if($instance->searchable()){
            $array = (array) $instance->searchable();
            $data->where(function (Builder $query) use ($array){
                foreach ($array as $item) {
                    if(!\Str::contains($item, '.')) {
                        $query->orWhere($item, 'like', '%' . $this->search . '%');
                    } else {
                        $array = explode('.', $item);
                        $query->orWhereHas($array[0], function (Builder $query) use ($array) {
                            $query->where($array[1], 'like', '%' . $this->search . '%');
                        });
                    }
                }
            });
        }

        if($this->sortColumn) {
            $data->orderBy($this->sortColumn, $this->sortType);
        } else {
            $data->latest('date');
        }

        if($this->category_id){
            $data = $data->where("category_id",$this->category_id);
        }

        if($this->project_id){
            $data = $data->where("project_id",$this->project_id);
        }

        if($this->worker_id){
            $data = $data->where("worker_id",$this->worker_id);
        }


        
        return $data;
    }

    // Use This if you want make a summing without changes in data (Mohmmad Moatz GS)
    public function getDataProperty()
    {
        $data = $this->getData();
        $this->total_amount = $data->sum("amount");
        $this->total_pay = $data->sum("pay");
        $this->total_rest = $data->sum("rest");

        return $data->paginate(10);
    }

    public function render()
    {
      

        return view('livewire.admin.endingamount.read', [
            'endingamounts' => $this->data
        ])->layout('admin::layouts.app', ['title' => __(\Str::plural('EndingAmount')) ]);
    }
}
