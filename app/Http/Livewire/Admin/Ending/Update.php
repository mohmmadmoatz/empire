<?php

namespace App\Http\Livewire\Admin\Ending;

use App\Models\Ending;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $ending;

    public $name;
    
    protected $rules = [
        'name' => 'required',        
    ];

    public function mount(Ending $ending){
        $this->ending = $ending;
        $this->name = $this->ending->name;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Ending') ]) ]);
        
        $this->ending->update([
            'name' => $this->name,            
        ]);
    }

    public function render()
    {
        return view('livewire.admin.ending.update', [
            'ending' => $this->ending
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Ending') ])]);
    }
}
