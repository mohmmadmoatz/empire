<?php

namespace App\Http\Livewire\Admin\Projectperctanges;

use App\Models\Projectperctanges;
use Livewire\Component;

class Single extends Component
{

    public $projectperctanges;

    public function mount(Projectperctanges $projectperctanges){
        $this->projectperctanges = $projectperctanges;
    }

    public function delete()
    {
        $this->projectperctanges->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Projectperctanges') ]) ]);
        $this->emit('projectperctangesDeleted');
    }

    public function render()
    {
        return view('livewire.admin.projectperctanges.single')
            ->layout('admin::layouts.app');
    }
}
