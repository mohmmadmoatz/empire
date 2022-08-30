<?php

namespace App\Http\Livewire\Admin\Outpayment;

use App\Models\OutPayment;
use Livewire\Component;

class Single extends Component
{

    public $outpayment;

    public function mount(OutPayment $outpayment){
        $this->outpayment = $outpayment;
    }

    public function delete()
    {
        $this->outpayment->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('OutPayment') ]) ]);
        $this->emit('outpaymentDeleted');
    }

    public function render()
    {
        return view('livewire.admin.outpayment.single')
            ->layout('admin::layouts.app');
    }
}
