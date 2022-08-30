<?php

namespace App\Http\Livewire\Admin\Project;

use Livewire\Component;
use App\Models\Project;
use App\Models\Income;
use App\Models\Expense;
use App\Models\EndingAmount;
class ProjectCore extends Component
{
    public $project;
    public $incomes;
    public $expenses;
    public $ending;
    public $daterange;
    public function searchBydate($date)
    {
        # code...
        $this->daterange = $date;
     
    }

    public function mount(Project $project){
        $this->project = $project;    
        $this->incomes = Income::where("project_id",$this->project->id)->latest()->get();
        $this->expenses = Expense::where("project_id",$this->project->id)->latest("date")->get();
        $this->ending = EndingAmount::where("project_id",$this->project->id)->latest("date")->get();
    }

    public function render()
    {
        return view('livewire.admin.project.project')->layout('admin::layouts.app', ['title' => __(\Str::plural('Project')) ]);
    }
}
