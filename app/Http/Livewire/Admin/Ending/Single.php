<?php

namespace App\Http\Livewire\Admin\Ending;

use App\Models\Ending;
use Livewire\Component;

class Single extends Component
{

    public $ending;

    public function mount(Ending $ending){
        $this->ending = $ending;
    }

    public function delete()
    {
        $this->ending->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Ending') ]) ]);
        $this->emit('endingDeleted');
    }

    public function render()
    {
        return view('livewire.admin.ending.single')
            ->layout('admin::layouts.app');
    }
}
