<?php

namespace App\Http\Livewire\Admin\Projectperctanges;

use App\Models\Projectperctanges;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $projectperctanges;

    public $project_id;
    public $amount;
    public $description;
    public $date;
    
    protected $rules = [
        'project_id' => 'required',
        'amount' => 'required',
        'description' => 'required|string',
        'date' => 'required|date',        
    ];

    public function mount(Projectperctanges $projectperctanges){
        $this->projectperctanges = $projectperctanges;
        $this->project_id = $this->projectperctanges->project_id;
        $this->amount = $this->projectperctanges->amount;
        $this->description = $this->projectperctanges->description;
        $this->date = $this->projectperctanges->date;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Projectperctanges') ]) ]);
        
        $this->projectperctanges->update([
            'project_id' => $this->project_id,
            'amount' => $this->amount,
            'description' => $this->description,
            'date' => $this->date,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.projectperctanges.update', [
            'projectperctanges' => $this->projectperctanges
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Projectperctanges') ])]);
    }
}
