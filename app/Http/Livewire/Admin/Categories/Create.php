<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Categories;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $image;
    
    protected $rules = [
        
    ];

    public function updated($input)
    {
    }

    public function create()
    {

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Categories') ])]);
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('image','public');
        }

        Categories::create([
            'name' => $this->name,
            'image' => $this->image,
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.categories.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Categories') ])]);
    }
}
