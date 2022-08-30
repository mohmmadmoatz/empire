<?php

namespace App\Http\Livewire\Admin\Expense;

use App\Models\Expense;

use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $expense;

    public $category_id;
    public $project_id;
    public $worker_id;
    public $amount;
    public $pay;
    public $rest;
    public $date;
    public $description;
    public $recive_name;
    public $image;
    public $isred;
    protected $rules = [
               'project_id' => 'required',             'amount' => 'required',        
    ];

    public function mount(Expense $expense){
        $this->expense = $expense;
        $this->category_id = $this->expense->category_id;
        $this->project_id = $this->expense->project_id;
        $this->worker_id = $this->expense->worker_id;
        $this->amount = $this->expense->amount;
        $this->pay = $this->expense->pay;
        $this->rest = $this->expense->rest;
        $this->date = $this->expense->date;
        $this->description = $this->expense->description;
        $this->recive_name = $this->expense->recive_name; 
        $this->image = $this->expense->image;        
        $this->isred = $this->expense->isred;        

    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->amount = str_replace(",","",$this->amount);
        $this->pay = str_replace(",","",$this->pay);
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Expense') ]) ]);
        
          
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('image');
        }

        $this->expense->update([
            'category_id' => $this->category_id,
            'project_id' => $this->project_id,
            'worker_id' => $this->worker_id,
            'amount' => $this->amount,
            'pay' => $this->pay,
            'rest' => $this->rest,
            'date' => $this->date,            'description' => $this->description,
            'recive_name' => $this->recive_name,     
            'image' => $this->image,            
            'isred' => $this->isred,            

        ]);
    }

    public function render()
    {
        if(is_numeric(str_replace(",","",$this->amount))){
            if(!is_numeric(str_replace(",","",$this->pay))){
                $this->pay = 0;
            }
            $this->rest =  str_replace(",","",$this->amount)  - str_replace(",","",$this->pay);
        }

        return view('livewire.admin.expense.update', [
            'expense' => $this->expense
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Expense') ])]);
    }
}
