<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $booking->user_id }}</td>
    <td class="">{{ $booking->pickup_location }}</td>
    <td class="">{{ $booking->dropoff_location }}</td>
    
    @if(getCrudConfig('Booking')->delete or getCrudConfig('Booking')->update)
        <td>

            @if(getCrudConfig('Booking')->update && hasPermission(getRouteName().'.booking.update', 1, 1, $booking))
                <a href="@route(getRouteName().'.booking.update', $booking->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Booking')->delete && hasPermission(getRouteName().'.booking.delete', 1, 1, $booking))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Booking') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Booking') ]) }}</p>
                        <div class="mt-5 d-flex justify-content-between">
                            <a wire:click.prevent="delete" class="text-white btn btn-success shadow">{{ __('Yes, Delete it.') }}</a>
                            <a @click.prevent="modalIsOpen = false" class="text-white btn btn-danger shadow">{{ __('No, Cancel it.') }}</a>
                        </div>
                    </div>
                </div>
            @endif
        </td>
    @endif
</tr>
