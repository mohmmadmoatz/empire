<?php

namespace App\Http\Livewire\Admin\Buildrequst;

use App\Models\buildrequst;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $adress;
    public $description;
    
    protected $rules = [
        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Buildrequst') ])]);
        
        Buildrequst::create([
            'name' => $this->name,
            'adress' => $this->adress,
            'description' => $this->description,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.buildrequst.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Buildrequst') ])]);
    }
}
