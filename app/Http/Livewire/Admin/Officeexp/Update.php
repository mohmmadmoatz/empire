<?php

namespace App\Http\Livewire\Admin\Officeexp;

use App\Models\OfficeExp;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $officeexp;

    public $number;
    public $description;
    public $name;
    public $date;
    public $amount;
    
    protected $rules = [
        'number' => 'required',        'description' => 'required',        'name' => 'required',        'date' => 'required',        'amount' => 'required',        
    ];

    public function mount(OfficeExp $officeexp){
        $this->officeexp = $officeexp;
        $this->number = $this->officeexp->number;
        $this->description = $this->officeexp->description;
        $this->name = $this->officeexp->name;
        $this->date = $this->officeexp->date;
        $this->amount = $this->officeexp->amount;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('OfficeExp') ]) ]);
        
        $this->officeexp->update([
            'number' => $this->number,
            'description' => $this->description,
            'name' => $this->name,
            'date' => $this->date,
            'amount' => $this->amount,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.officeexp.update', [
            'officeexp' => $this->officeexp
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('OfficeExp') ])]);
    }
}
