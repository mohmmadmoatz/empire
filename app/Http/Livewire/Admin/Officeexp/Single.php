<?php

namespace App\Http\Livewire\Admin\Officeexp;

use App\Models\OfficeExp;
use Livewire\Component;

class Single extends Component
{

    public $officeexp;

    public function mount(OfficeExp $officeexp){
        $this->officeexp = $officeexp;
    }

    public function delete()
    {
        $this->officeexp->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('OfficeExp') ]) ]);
        $this->emit('officeexpDeleted');
    }

    public function render()
    {
        return view('livewire.admin.officeexp.single')
            ->layout('admin::layouts.app');
    }
}
