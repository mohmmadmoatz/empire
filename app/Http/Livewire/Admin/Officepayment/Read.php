<?php

namespace App\Http\Livewire\Admin\Officepayment;

use App\Models\OfficePayment;
use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Read extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search','project_id'];

    protected $listeners = ['officepaymentDeleted'];
    public $project_id;
    public $sortType;
    public $sortColumn;
    public $officebalance=0;
    public function officepaymentDeleted(){
        // Nothing ..
    }

    public function sort($column)
    {
        $sort = $this->sortType == 'desc' ? 'asc' : 'desc';

        $this->sortColumn = $column;
        $this->sortType = $sort;
    }

    public function render()
    {
        $data = OfficePayment::query();

        $instance = getCrudConfig('officepayment');
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
            $data->latest('id');
        }

        if($this->project_id){
            $data = $data->where("project_id",$this->project_id);
            $projectnetbalance = Project::find($this->project_id)->office_net;
            $this->officebalance = $projectnetbalance;
        }else{
            $this->officebalance = 0;
        }

        $data = $data->paginate(config('easy_panel.pagination_count', 15));

        return view('livewire.admin.officepayment.read', [
            'officepayments' => $data
        ])->layout('admin::layouts.app', ['title' => __(\Str::plural('OfficePayment')) ]);
    }
}
