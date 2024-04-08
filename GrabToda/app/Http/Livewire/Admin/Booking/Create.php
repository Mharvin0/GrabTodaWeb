<?php

namespace App\Http\Livewire\Admin\Booking;

use App\Models\Booking;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    
    protected $rules = [
        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Booking') ])]);
        
        Booking::create([
            
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.booking.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Booking') ])]);
    }
}
