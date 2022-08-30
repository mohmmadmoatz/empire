<tr @if($income->isred) style="color: red" @endif x-data="{ modalIsOpen : false }">
    <td> {{ $income->project->name ??"" }} -  {{ $income->project->customer->name ??"" }}</td>
    <td>  
        @if($income->image)
        <a href="{{asset('storage/'.$income->image)}}" target="_blank"> فتح الملف </a> 
        @else
        لايوجد
        @endif
    </td>
    <td> {{ $income->date }} </td>
    <td> {{ $income->description }} </td>
    <td> @convert($income->amount)</td>
    <td> {{ $income->recive_name }} </td>    
    @if(getCrudConfig('income')->delete or getCrudConfig('income')->update)
        <td>

            @if(getCrudConfig('income')->update)
                <a href="@route(getRouteName().'.income.update', ['income' => $income->id])" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            <a target="_blank" href="@route('recept')?ID={{$income->id}}&type=income" class="btn text-primary mt-1">
                <i class="fa fa-print"></i>
            </a>

            @if(getCrudConfig('income')->delete)
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Income') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Income') ]) }}</p>
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
