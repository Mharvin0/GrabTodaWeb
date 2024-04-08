<?php

namespace App\Http\Livewire\Admin\Booking;

use App\Models\Booking;
use Livewire\Component;

class Single extends Component
{

    public $booking;

    public function mount(Booking $Booking){
        $this->booking = $Booking;
    }

    public function delete()
    {
        $this->booking->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Booking') ]) ]);
        $this->emit('bookingDeleted');
    }

    public function render()
    {
        return view('livewire.admin.booking.single')
            ->layout('admin::layouts.app');
    }
}
