<?php

namespace App\Http\Livewire\Admin\Project;

use App\Models\Project;
use Livewire\Component;

class Single extends Component
{

    public $project;

    public function mount(Project $project){
        $this->project = $project;
    }

    public function delete()
    {
        $this->project->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Project') ]) ]);
        $this->emit('projectDeleted');
    }

    public function render()
    {
        return view('livewire.admin.project.single')
            ->layout('admin::layouts.app');
    }
}
