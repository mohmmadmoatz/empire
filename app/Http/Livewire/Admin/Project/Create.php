<?php

namespace App\Http\Livewire\Admin\Project;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

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

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Project') ])]);
        
        Project::create([
            'customer_id' => $this->customer_id,            'name' => $this->name,
            'site' => $this->site,
            'space_site' => $this->site_space,
            'space_build' => $this->space_build,
            'floor_count' => $this->floor_count,
            'starting_date' => $this->starting_date,
            'office_perctange' => $this->office_perctange,            
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.project.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Project') ])]);
    }
}
