<?php

namespace App\Http\Livewire\Admin\Expensecategory;

use App\Models\ExpenseCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $expensecategory;

    public $name;
    
    protected $rules = [
        'name' => 'required',        
    ];

    public function mount(Expensecategory $expensecategory){
        $this->expensecategory = $expensecategory;
        $this->name = $this->expensecategory->name;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Expensecategory') ]) ]);
        
        $this->expensecategory->update([
            'name' => $this->name,            
        ]);
    }

    public function render()
    {
        return view('livewire.admin.expensecategory.update', [
            'expensecategory' => $this->expensecategory
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Expensecategory') ])]);
    }
}
