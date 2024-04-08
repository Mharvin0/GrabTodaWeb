<?php

namespace App\Http\Livewire\Admin\Destination;

use App\Models\Destination;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $destination;

    public $location;
    
    protected $rules = [
        'location' => 'required|string|max:80',        
    ];

    public function mount(Destination $Destination){
        $this->destination = $Destination;
        $this->location = $this->destination->location;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Destination') ]) ]);
        
        $this->destination->update([
            'location' => $this->location,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.destination.update', [
            'destination' => $this->destination
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Destination') ])]);
    }
}
