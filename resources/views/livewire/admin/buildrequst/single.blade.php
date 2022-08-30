<tr x-data="{ modalIsOpen : false }">
    <td> {{ $buildrequst->name }} </td>
    <td> {{ $buildrequst->adress }} </td>
    <td> {{ $buildrequst->description }} </td>
    <td> {{ $buildrequst->phone }} </td>
    <td> {{ $buildrequst->sundirction }} </td>
    <td> {{ $buildrequst->area }} </td>
    <td> {{ $buildrequst->numberofspace }} </td>
    <td> {{ $buildrequst->numberofflower }} </td>    
    @if(getCrudConfig('buildrequst')->delete or getCrudConfig('buildrequst')->update)
        <td>

            @if(!getCrudConfig('buildrequst')->update)
                <a href="@route(getRouteName().'.buildrequst.update', ['buildrequst' => $buildrequst->id])" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(!getCrudConfig('buildrequst')->delete)
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Buildrequst') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Buildrequst') ]) }}</p>
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
