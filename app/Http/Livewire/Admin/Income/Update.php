<?php

namespace App\Http\Livewire\Admin\Income;

use App\Models\Income;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $income;

    public $project_id;
    public $amount;
    public $recive_name;
    public $description;
    public $date;
    public $image;
    public $isred;
    
    protected $rules = [
        'project_id' => 'required',        
    ];

    public function mount(Income $income){
        $this->income = $income;
        $this->project_id = $this->income->project_id;
        $this->amount = $this->income->amount;
        $this->recive_name = $this->income->recive_name;
        $this->description = $this->income->description;    
        $this->date = $this->income->date;    
        $this->image = $this->income->image;    
        $this->isred = $this->income->isred;    
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->amount = str_replace(",","",$this->amount);

        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Income') ]) ]);
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('image',"public");
        }
        $this->income->update([
            'project_id' => $this->project_id,
            'amount' => $this->amount,
            'recive_name' => $this->recive_name,
            'description' => $this->description,            
            'date' => $this->date,            
            'image' => $this->image,            
            'isred' => $this->isred,            
        ]);
    }

    public function render()
    {
        return view('livewire.admin.income.update', [
            'income' => $this->income
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Income') ])]);
    }
}
