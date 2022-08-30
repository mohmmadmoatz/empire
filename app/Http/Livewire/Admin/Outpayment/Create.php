<?php

namespace App\Http\Livewire\Admin\Outpayment;

use App\Models\OutPayment;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $project_id;
    public $description;
    public $date;
    public $amount;
    
    protected $rules = [
        'project_id' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('OutPayment') ])]);
        
        OutPayment::create([
            'project_id' => $this->project_id,            'description' => $this->description,
            'date' => $this->date,
            'amount' => $this->amount,            
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.outpayment.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('OutPayment') ])]);
    }
}
