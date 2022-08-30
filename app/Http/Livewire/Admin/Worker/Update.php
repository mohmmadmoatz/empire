<?php

namespace App\Http\Livewire\Admin\Worker;

use App\Models\Worker;

use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $worker;

    public $name;
    public $phone;
    
    protected $rules = [
        'name' => 'required',        
    ];

    public function mount(Worker $worker){
        $this->worker = $worker;
        $this->name = $this->worker->name;
        $this->phone = $this->worker->phone;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Worker') ]) ]);
        
        $this->worker->update([
            'name' => $this->name,            'phone' => $this->phone,            
        ]);
    }

    public function render()
    {
        return view('livewire.admin.worker.update', [
            'worker' => $this->worker
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Worker') ])]);
    }
}
