<?php

namespace App\Http\Livewire\Admin\Destination;

use App\Models\Destination;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $location;
    
    protected $rules = [
        'location' => 'required|string|max:80',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Destination') ])]);
        
        Destination::create([
            'location' => $this->location,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.destination.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Destination') ])]);
    }
}
