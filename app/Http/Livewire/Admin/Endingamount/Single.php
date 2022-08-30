<?php

namespace App\Http\Livewire\Admin\Endingamount;

use App\Models\EndingAmount;
use Livewire\Component;

class Single extends Component
{

    public $endingamount;

    public function mount(EndingAmount $endingamount){
        $this->endingamount = $endingamount;
    }

    public function delete()
    {
        $this->endingamount->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('EndingAmount') ]) ]);
        $this->emit('endingamountDeleted');
    }

    public function render()
    {
        return view('livewire.admin.endingamount.single')
            ->layout('admin::layouts.app');
    }
}
