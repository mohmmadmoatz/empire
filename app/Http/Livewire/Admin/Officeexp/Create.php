<?php

namespace App\Http\Livewire\Admin\Officeexp;

use App\Models\OfficeExp;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $number;
    public $description;
    public $name;
    public $date;
    public $amount;
    
    protected $rules = [
        'number' => 'required',        'description' => 'required',        'name' => 'required',        'date' => 'required',        'amount' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('OfficeExp') ])]);
        
        OfficeExp::create([
            'number' => $this->number,
            'description' => $this->description,
            'name' => $this->name,
            'date' => $this->date,
            'amount' => $this->amount,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.officeexp.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('OfficeExp') ])]);
    }
}
