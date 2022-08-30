<?php

namespace App\Http\Livewire\Admin\Buildrequst;

use App\Models\buildrequst;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $buildrequst;

    public $name;
    public $adress;
    public $description;
    
    protected $rules = [
        
    ];

    public function mount(Buildrequst $buildrequst){
        $this->buildrequst = $buildrequst;
        $this->name = $this->buildrequst->name;
        $this->adress = $this->buildrequst->adress;
        $this->description = $this->buildrequst->description;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Buildrequst') ]) ]);
        
        $this->buildrequst->update([
            'name' => $this->name,
            'adress' => $this->adress,
            'description' => $this->description,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.buildrequst.update', [
            'buildrequst' => $this->buildrequst
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Buildrequst') ])]);
    }
}
