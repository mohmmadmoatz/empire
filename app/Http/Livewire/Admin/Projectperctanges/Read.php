<?php

namespace App\Http\Livewire\Admin\Projectperctanges;

use App\Models\Projectperctanges;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Read extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search','project_id'];

    protected $listeners = ['projectperctangesDeleted'];

    public $sortType;
    public $sortColumn;
    public $project_id;
    public $total;

    public function projectperctangesDeleted(){
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
        $data = Projectperctanges::query();

        $instance = getCrudConfig('projectperctanges');
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

        if($this->project_id){
            $data->where('project_id', $this->project_id);
            $this->total = Projectperctanges::where("project_id",$this->project_id)->sum("amount");
        }else{
            $this->total = Projectperctanges::sum("amount");
        }

        if($this->sortColumn) {
            $data->orderBy($this->sortColumn, $this->sortType);
        } else {
            $data->latest('id');
        }

        $data = $data->paginate(config('easy_panel.pagination_count', 15));

        return view('livewire.admin.projectperctanges.read', [
            'projectperctangess' => $data
        ])->layout('admin::layouts.app', ['title' => "واردات المكتب" ]);
    }
}
