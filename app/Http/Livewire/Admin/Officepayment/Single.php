<?php

namespace App\Http\Livewire\Admin\Officepayment;

use App\Models\OfficePayment;
use Livewire\Component;

class Single extends Component
{

    public $officepayment;

    public function mount(OfficePayment $officepayment){
        $this->officepayment = $officepayment;
    }

    public function delete()
    {
        $this->officepayment->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('OfficePayment') ]) ]);
        $this->emit('officepaymentDeleted');
    }

    public function render()
    {
        return view('livewire.admin.officepayment.single')
            ->layout('admin::layouts.app');
    }
}
