<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0">
                <h3 class="card-title">{{ __('ListTitle', ['name' => __(\Illuminate\Support\Str::plural('Project')) ]) }}</h3>

                <div class="px-2 mt-4">

                    <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                        <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __(\Illuminate\Support\Str::plural('Project')) }}</li>
                    </ul>

                    <div class="row justify-content-between mt-4 mb-4">
                        @if(getCrudConfig('project')->create)
                        <div class="col-md-4 right-0">
                            <a href="@route(getRouteName().'.project.create')" class="btn btn-success">{{ __('CreateTitle', ['name' => __('Project') ]) }}</a>
                        </div>
                        @endif
                        @if(getCrudConfig('project')->searchable())
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" @if(config('easy_panel.lazy_mode')) wire:model.lazy="search" @else wire:model="search" @endif placeholder="{{ __('Search') }}" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-default">
                                        <a wire:target="search" wire:loading.remove><i class="fa fa-search"></i></a>
                                        <a wire:loading wire:target="search"><i class="fas fa-spinner fa-spin" ></i></a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <div wire:ignore class='form-group'>
                                <label for='inputcustomer_id' class='control-label'> {{ __('Customer_id') }}</label>
                                <select  class="form-control selectpicker" data-live-search="true" wire:model.lazy='customer_id'
                                    class="form-control @error('customer_id') is-invalid @enderror" id='inputcustomer_id'>
                                    <option value="">يرجى اختيار الزبون</option>
                                    @foreach(App\Models\Customer::latest()->get() as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
        
                                    @endforeach
                                </select>
                                @error('customer_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                            </div>
                        </div>
                        
                        @endif
                    </div>
                </div>
            </div>
            <style>
                table.table-fit {
    width: max-content !important;
    table-layout: auto !important;
}
table.table-fit thead th, table.table-fit tfoot th {
    width: auto !important;
}
table.table-fit tbody td, table.table-fit tfoot td {
    width: auto !important;
}
                </style>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-bordered table-fit">
                    <tbody>
                    <tr>
                        <td></td>
                        <td style='cursor: pointer' wire:click="sort('name')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'name') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'name') fa-sort-amount-up ml-2 @endif'></i> {{ __('Name') }} </td>
                        <td> {{ __('Customer_id') }} </td>
                        <td style='cursor: pointer' wire:click="sort('site')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'site') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'site') fa-sort-amount-up ml-2 @endif'></i> {{ __('Site') }} </td>
                        <td>المساحة</td>
                     
                        <td style='cursor: pointer' wire:click="sort('floor_count')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'floor_count') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'floor_count') fa-sort-amount-up ml-2 @endif'></i> {{ __('Floor_count') }} </td>
                        <td style='cursor: pointer' wire:click="sort('starting_date')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'starting_date') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'starting_date') fa-sort-amount-up ml-2 @endif'></i> {{ __('Starting_date') }} </td>
                        <td> المقبوض </td>
                        <td> المصروف </td>
                        <td style='cursor: pointer' wire:click="sort('office_perctange')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'office_perctange') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'office_perctange') fa-sort-amount-up ml-2 @endif'></i> {{ __('نسبة المكتب % ') }} </td>
                        <td> نسبة المكتب </td>
                       
                        <td> رصيد المشروع </td>
                        <td> الموازنة </td>
                        <td>المبالغ المسحوبة من الغير</td>
                        
   
                    </tr>

                    @foreach($projects as $project)
                        @livewire('admin.project.single', ['project' => $project], key($project->id))
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="m-auto pt-3 pr-3">
                {{ $projects->appends(request()->query())->links() }}
            </div>

            <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>

        </div>
    </div>
</div>
