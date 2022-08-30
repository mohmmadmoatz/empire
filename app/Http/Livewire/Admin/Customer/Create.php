<?php

namespace App\Http\Livewire\Admin\Customer;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $phone;
    public $address;
    public $email;
    public $password;
    protected $rules = [
        'name' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Customer') ])]);
        
        $user = [
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
            'email'=>$this->email,
            'password'=>bcrypt($this->password),  
            'user_type' => 'customer',
            'user_id' => auth()->id(),
        ];

        Customer::create($user);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.customer.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Customer') ])]);
    }
}
