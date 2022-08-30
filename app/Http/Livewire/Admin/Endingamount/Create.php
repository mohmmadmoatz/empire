<?php

namespace App\Http\Livewire\Admin\Endingamount;

use App\Models\EndingAmount;
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

    protected $queryString = ['category_id','project_id','worker_id'];

    protected $rules = [
        'category_id' => 'required',        'project_id' => 'required',        'worker_id' => 'required',        'amount' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('EndingAmount') ])]);
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('ending',"public");
        }

        EndingAmount::create([
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

        $this->resetExcept('category_id','project_id','worker_id');

    }

    public function render()
    {
        $this->rest =  $this->amount - $this->pay;

        return view('livewire.admin.endingamount.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('EndingAmount') ])]);
    }
}
