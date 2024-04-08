<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $destination->location }}</td>
    
    @if(getCrudConfig('Destination')->delete or getCrudConfig('Destination')->update)
        <td>

            @if(getCrudConfig('Destination')->update && hasPermission(getRouteName().'.destination.update', 1, 1, $destination))
                <a href="@route(getRouteName().'.destination.update', $destination->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Destination')->delete && hasPermission(getRouteName().'.destination.delete', 1, 1, $destination))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Destination') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Destination') ]) }}</p>
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
