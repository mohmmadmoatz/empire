<?php

namespace App\Http\Livewire\Admin\Customer;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $customer;

    public $name;
    public $phone;
    public $address;
    
    public $email;
    public $password;


    protected $rules = [
        'name' => 'required',        
    ];

    public function mount(Customer $customer){
        $this->customer = $customer;
        $this->name = $this->customer->name;
        $this->phone = $this->customer->phone;
        $this->address = $this->customer->address;   
        $this->email = $this->customer->email;
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Customer') ]) ]);
        
        $user = [
            'name' => $this->name,
            'phone' => $this->phone,
            'email'=>$this->email,
            'address' => $this->address,
            'user_id' => auth()->id(),
        ];

        if($this->password){
            $user['password'] = bcrypt($this->password);
        }

        $this->customer->update($user);
    }

    public function render()
    {
        return view('livewire.admin.customer.update', [
            'customer' => $this->customer
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Customer') ])]);
    }
}
