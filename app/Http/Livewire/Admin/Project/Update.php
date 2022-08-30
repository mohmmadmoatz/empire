<?php

namespace App\Http\Livewire\Admin\Project;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $project;

    public $customer_id;
    public $name;
    public $site;
    public $site_space;
    public $space_build;
    public $floor_count;
    public $starting_date;
    public $office_perctange;
    
    protected $rules = [
        'name' => 'required',        'customer_id' => 'required',        
    ];

    public function mount(Project $project){
        $this->project = $project;
        $this->customer_id = $this->project->customer_id;
        $this->name = $this->project->name;
        $this->site = $this->project->site;
        $this->site_space = $this->project->space_site;
        $this->space_build = $this->project->space_build;
        $this->floor_count = $this->project->floor_count;
        $this->starting_date = $this->project->starting_date;
        $this->office_perctange = $this->project->office_perctange;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Project') ]) ]);
        
        $this->project->update([
            'customer_id' => $this->customer_id,            'name' => $this->name,
            'site' => $this->site,
            'space_site' => $this->site_space,
            'space_build' => $this->space_build,
            'floor_count' => $this->floor_count,
            'starting_date' => $this->starting_date,
            'office_perctange' => $this->office_perctange,            
        ]);
    }

    public function render()
    {
        return view('livewire.admin.project.update', [
            'project' => $this->project
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Project') ])]);
    }
}
