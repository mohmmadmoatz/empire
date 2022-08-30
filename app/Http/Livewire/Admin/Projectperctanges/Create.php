<?php

namespace App\Http\Livewire\Admin\Projectperctanges;

use App\Models\Projectperctanges;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

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

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Projectperctanges') ])]);
        
        Projectperctanges::create([
            'project_id' => $this->project_id,
            'amount' => $this->amount,
            'description' => $this->description,
            'date' => $this->date,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.projectperctanges.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Projectperctanges') ])]);
    }
}
