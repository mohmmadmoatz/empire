<?php

namespace App\Http\Livewire\Admin\Buildrequst;

use App\Models\buildrequst;
use Livewire\Component;

class Single extends Component
{

    public $buildrequst;

    public function mount(Buildrequst $buildrequst){
        $this->buildrequst = $buildrequst;
    }

    public function delete()
    {
        $this->buildrequst->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Buildrequst') ]) ]);
        $this->emit('buildrequstDeleted');
    }

    public function render()
    {
        return view('livewire.admin.buildrequst.single')
            ->layout('admin::layouts.app');
    }
}
