<?php

namespace App\Http\Livewire\Admin\Expense;

use App\Models\Expense;
use App\Models\OutPayment;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    
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
    public $fromOut;

    protected $queryString = ['category_id','project_id','worker_id'];
    
    protected $rules = [
             'project_id' => 'required',               'amount' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {

        $this->amount = str_replace(",","",$this->amount);
        $this->pay = str_replace(",","",$this->pay);

        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Expense') ])]);
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('image',"public");
        }

        Expense::create([
            'category_id' => $this->category_id,
            'project_id' => $this->project_id,
            'worker_id' => $this->worker_id,
            'amount' => $this->amount,
            'pay' => $this->pay,
            'rest' => $this->rest,
            'date' => $this->date,            'description' => $this->description,
            'recive_name' => $this->recive_name,      
            "image"=>$this->image   ,   
            "isred"=>$this->isred ,     
            "fromOut"=>$this->fromOut,     
        ]);

        if($this->fromOut){
            $newpayment=  new OutPayment();
            $newpayment->project_id = $this->project_id;
            $newpayment->amount = $this->amount;
            $newpayment->date = $this->date;
            $newpayment->description = $this->description;
            $newpayment->save();                               
        }

        $this->resetExcept('category_id','project_id','worker_id');
    }

    public function render()
    {

        if(is_numeric(str_replace(",","",$this->amount))){
            if(!is_numeric(str_replace(",","",$this->pay))){
                $this->pay = 0;
            }
            $this->rest =  str_replace(",","",$this->amount)  - str_replace(",","",$this->pay);
        }
        return view('livewire.admin.expense.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Expense') ])]);
    }
}
