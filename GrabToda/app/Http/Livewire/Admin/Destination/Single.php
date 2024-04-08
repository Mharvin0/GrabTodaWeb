<?php

namespace App\Http\Livewire\Admin\Destination;

use App\Models\Destination;
use Livewire\Component;

class Single extends Component
{

    public $destination;

    public function mount(Destination $Destination){
        $this->destination = $Destination;
    }

    public function delete()
    {
        $this->destination->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Destination') ]) ]);
        $this->emit('destinationDeleted');
    }

    public function render()
    {
        return view('livewire.admin.destination.single')
            ->layout('admin::layouts.app');
    }
}
