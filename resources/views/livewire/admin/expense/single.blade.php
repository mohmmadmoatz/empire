<tr @if($expense->isred) style="color: red" @endif x-data="{ modalIsOpen : false }">
    <td> {{ $expense->description }} </td>

    <td>  
        @if($expense->image)
        <a href="{{asset('storage/'.$expense->image)}}" target="_blank"> فتح الملف </a> 
        @else
        لايوجد
        @endif
    </td>

    <td> <a href="@route(getRouteName().'.expense.read')?project_id={{$expense->project_id}}"> {{ $expense->project->name ??"" }} -   {{ $expense->project->customer->name ??"" }} </a>  </td>

    <td> {{ $expense->worker->name ??"" }} </td>
    <td> {{ $expense->date }} </td>
    <td> @convert($expense->amount) </td>
    <td> 
        <span class="text text-success">@convert($expense->pay)</span> 
        @if($expense->fromOut)
        <hr>
        <span class="text text-danger">مسحوب من الغير</span> 
        @endif
    </td>
    <td>         <span class="text text-danger">@convert($expense->rest)  </span> 
    </td>    
    @if(getCrudConfig('expense')->delete or getCrudConfig('expense')->update)
        <td>

            @if(getCrudConfig('expense')->update)
                <a href="@route(getRouteName().'.expense.update', ['expense' => $expense->id])" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            <a target="_blank" href="@route('recept')?ID={{$expense->id}}&type=expense" class="btn text-primary mt-1">
                <i class="fa fa-print"></i>
            </a>

            @if(getCrudConfig('expense')->delete)
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Expense') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Expense') ]) }}</p>
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
