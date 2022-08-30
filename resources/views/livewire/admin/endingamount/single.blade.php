<tr @if($endingamount->isred) style="color: red" @endif x-data="{ modalIsOpen : false }">
    <td> {{ $endingamount->description }} </td>
    <td>  
        @if($endingamount->image)
        <a href="{{asset('storage/'.$endingamount->image)}}" target="_blank"> فتح الملف </a> 
        @else
        لايوجد
        @endif
    </td>
    <td> <a href="@route(getRouteName().'.endingamount.read')?project_id={{$endingamount->project_id}}"> {{ $endingamount->project->name ??"" }} -  {{ $endingamount->project->customer->name ??"" }} </a>  </td>
    <td> <a href="@route(getRouteName().'.endingamount.read')?category_id={{$endingamount->category_id}}"> {{ $endingamount->menu->name ??"" }} </a>  </td>

    <td> {{ $endingamount->worker->name ??"" }} </td>
    <td> {{ $endingamount->date }} </td>
    <td> @convert($endingamount->amount) </td>
    <td> 
        <span class="text text-success">@convert($endingamount->pay)  </span> 
    </td>
    <td>         <span class="text text-danger">@convert($endingamount->rest)  </span> 
    </td>     
    @if(getCrudConfig('endingamount')->delete or getCrudConfig('endingamount')->update)
        <td>

            @if(getCrudConfig('endingamount')->update)
                <a href="@route(getRouteName().'.endingamount.update', ['endingamount' => $endingamount->id])" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('endingamount')->delete)
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('EndingAmount') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('EndingAmount') ]) }}</p>
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
