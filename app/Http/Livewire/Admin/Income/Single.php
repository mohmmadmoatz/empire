<?php

namespace App\Http\Livewire\Admin\Income;

use App\Models\Income;
use Livewire\Component;

class Single extends Component
{

    public $income;

    public function mount(Income $income){
        $this->income = $income;
    }

    public function delete()
    {
        $this->income->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Income') ]) ]);
        $this->emit('incomeDeleted');
    }

    public function render()
    {
        return view('livewire.admin.income.single')
            ->layout('admin::layouts.app');
    }
}
