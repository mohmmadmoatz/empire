<?php

namespace App\Http\Livewire\Admin\Ending;

use App\Models\Ending;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    
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

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Ending') ])]);
        
        Ending::create([
            'name' => $this->name,            
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.ending.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Ending') ])]);
    }
}
