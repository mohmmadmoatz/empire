<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Categories;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $categories;

    public $name;
    public $image;
    
    protected $rules = [
        
    ];

    public function mount(Categories $categories){
        $this->categories = $categories;
        $this->name = $this->categories->name;
        $this->image = $this->categories->image;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Categories') ]) ]);
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('image','public');
        }

        $this->categories->update([
            'name' => $this->name,
            'image' => $this->image,
        ]);
    }

    public function render()
    {
        return view('livewire.admin.categories.update', [
            'categories' => $this->categories
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Categories') ])]);
    }
}
