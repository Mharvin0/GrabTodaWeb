<?php

namespace App\Http\Livewire\Admin\Booking;

use App\Models\Booking;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $booking;

    
    protected $rules = [
        
    ];

    public function mount(Booking $Booking){
        $this->booking = $Booking;
        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Booking') ]) ]);
        
        $this->booking->update([
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.booking.update', [
            'booking' => $this->booking
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Booking') ])]);
    }
}
