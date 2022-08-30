<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Categories;
use Livewire\Component;

class Single extends Component
{

    public $categories;

    public function mount(Categories $categories){
        $this->categories = $categories;
    }

    public function delete()
    {
        $this->categories->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Categories') ]) ]);
        $this->emit('categoriesDeleted');
    }

    public function render()
    {
        return view('livewire.admin.categories.single')
            ->layout('admin::layouts.app');
    }
}
