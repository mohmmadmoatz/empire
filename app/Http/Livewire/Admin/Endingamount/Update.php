<?php

namespace App\Http\Livewire\Admin\Endingamount;

use App\Models\EndingAmount;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $endingamount;

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
        'category_id' => 'required',        'project_id' => 'required',        'worker_id' => 'required',        'amount' => 'required',        
    ];

    public function mount(EndingAmount $endingamount){
        $this->endingamount = $endingamount;
        $this->category_id = $this->endingamount->category_id;
        $this->project_id = $this->endingamount->project_id;
        $this->worker_id = $this->endingamount->worker_id;
        $this->amount = $this->endingamount->amount;
        $this->pay = $this->endingamount->pay;
        $this->rest = $this->endingamount->rest;
        $this->date = $this->endingamount->date;
        $this->description = $this->endingamount->description;
        $this->recive_name = $this->endingamount->recive_name;       
        $this->image = $this->endingamount->image;        
        $this->isred = $this->endingamount->isred;        

    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('EndingAmount') ]) ]);
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('ending');
        }


        $this->endingamount->update([
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
        $this->rest =  $this->amount - $this->pay;

        return view('livewire.admin.endingamount.update', [
            'endingamount' => $this->endingamount
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('EndingAmount') ])]);
    }
}
