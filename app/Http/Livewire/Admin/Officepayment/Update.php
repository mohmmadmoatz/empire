<?php

namespace App\Http\Livewire\Admin\Officepayment;

use App\Models\OfficePayment;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $officepayment;

    public $date;
    public $amount;
    public $description;
    public $image;
    public $project_id;
    protected $rules = [
        'date' => 'required',        'amount' => 'required',        
    ];

    public function mount(OfficePayment $officepayment){
        $this->officepayment = $officepayment;
        $this->date = $this->officepayment->date;
        $this->amount = $this->officepayment->amount;
        $this->description = $this->officepayment->description;
        $this->image = $this->officepayment->image;        
        $this->project_id = $this->officepayment->project_id;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('OfficePayment') ]) ]);
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('image');
        }

        $this->officepayment->update([
            'date' => $this->date,
            'amount' => $this->amount,
            'description' => $this->description,
            'image' => $this->image,            
            'project_id' => $this->project_id,            
        ]);
    }

    public function render()
    {
        return view('livewire.admin.officepayment.update', [
            'officepayment' => $this->officepayment
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('OfficePayment') ])]);
    }
}
