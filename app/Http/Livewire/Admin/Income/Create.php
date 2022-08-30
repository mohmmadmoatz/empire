<?php

namespace App\Http\Livewire\Admin\Income;

use App\Models\Income;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Project;
use App\Models\Projectperctanges;
class Create extends Component
{
    use WithFileUploads;

    public $project_id;
    public $amount;
    public $recive_name;
    public $description;
    public $date;
    public $image;
    public $isred;
    public $isPerctange = false;
    public $perctange = 0;
    
    protected $queryString = ['project_id'];
    
    protected $rules = [
        'project_id' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function mount()
    {
        $this->date = date("Y-m-d");
    }

    public function create()
    {
        $this->amount = str_replace(",","",$this->amount);
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Income') ])]);
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('image',"public");
        }

        Income::create([
            'project_id' => $this->project_id,
            'amount' => $this->amount,
            'recive_name' => $this->recive_name,
            'description' => $this->description,    
            "date"=>$this->date  ,      
            "image"=>$this->image    ,    
            "isred"=>$this->isred        
        ]);

        if($this->isPerctange) {
        
            Projectperctanges::create([
                'project_id' => $this->project_id,
                'amount' => $this->perctange,
                'description' => "نسبة من  المقبوض  : " . number_format($this->amount,0),
                'date' => $this->date,
                'user_id' => auth()->id(),
            ]);

        }

        $this->resetExcept('project_id','date');

    }

    public function render()
    {
        if($this->project_id && $this->isPerctange) {
        
            $project = Project::find($this->project_id);
            $this->perctange = ($project->office_perctange / 100) * $this->amount;
           
        }
        return view('livewire.admin.income.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Income') ])]);
    }
}
