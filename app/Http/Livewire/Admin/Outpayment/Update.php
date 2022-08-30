<?php

namespace App\Http\Livewire\Admin\Outpayment;

use App\Models\OutPayment;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $outpayment;

    public $project_id;
    public $description;
    public $date;
    public $amount;
    
    protected $rules = [
        'project_id' => 'required',        
    ];

    public function mount(OutPayment $outpayment){
        $this->outpayment = $outpayment;
        $this->project_id = $this->outpayment->project_id;
        $this->description = $this->outpayment->description;
        $this->date = $this->outpayment->date;
        $this->amount = $this->outpayment->amount;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('OutPayment') ]) ]);
        
        $this->outpayment->update([
            'project_id' => $this->project_id,            'description' => $this->description,
            'date' => $this->date,
            'amount' => $this->amount,            
        ]);
    }

    public function render()
    {
        return view('livewire.admin.outpayment.update', [
            'outpayment' => $this->outpayment
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('OutPayment') ])]);
    }
}
