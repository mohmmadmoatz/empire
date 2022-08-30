<?php

namespace App\Http\Livewire\Admin\Worker;

use App\Models\Worker;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $phone;
    
    protected $rules = [
        'name' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Worker') ])]);
        
        Worker::create([
            'name' => $this->name,            'phone' => $this->phone,            
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.worker.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Worker') ])]);
    }
}
