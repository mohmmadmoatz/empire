<?php

namespace App\Http\Livewire\Admin\Worker;

use App\Models\Worker;

use Livewire\Component;

class Single extends Component
{

    public $worker;

    public function mount(Worker $worker){
        $this->worker = $worker;
    }

    public function delete()
    {
        $this->worker->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Worker') ]) ]);
        $this->emit('workerDeleted');
    }

    public function render()
    {
        return view('livewire.admin.worker.single')
            ->layout('admin::layouts.app');
    }
}
