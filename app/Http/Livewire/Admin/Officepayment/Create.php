<?php

namespace App\Http\Livewire\Admin\Officepayment;

use App\Models\OfficePayment;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $date;
    public $amount;
    public $description;
    public $image;
    public $projectbalance;
    public $project_id;
    protected $queryString = ['project_id'];

    
    protected $rules = [
        'date' => 'required',        'amount' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('OfficePayment') ])]);
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('image');
        }

        OfficePayment::create([
            'date' => $this->date,
            'amount' => $this->amount,
            'description' => $this->description,
            'image' => $this->image,            
            'project_id' => $this->project_id,            
        ]);

        $this->reset();
    }

    public function render()
    {
        if($this->project_id){
            $this->projectbalance = Project::find($this->project_id)->office_net;
        }else{
            $this->projectbalance = 0;
        }
        return view('livewire.admin.officepayment.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('OfficePayment') ])]);
    }
}
