<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0">
                <h3 class="card-title">{{ __('ListTitle', ['name' => __(\Illuminate\Support\Str::plural('Buildrequst')) ]) }}</h3>

                <div class="px-2 mt-4">

                    <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                        <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __(\Illuminate\Support\Str::plural('Buildrequst')) }}</li>
                    </ul>

                    <div class="row justify-content-between mt-4 mb-4">
                        @if(!getCrudConfig('buildrequst')->create)
                        <div class="col-md-4 right-0">
                            <a href="@route(getRouteName().'.buildrequst.create')" class="btn btn-success">{{ __('CreateTitle', ['name' => __('Buildrequst') ]) }}</a>
                        </div>
                        @endif
                        @if(getCrudConfig('buildrequst')->searchable())
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
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <td style='cursor: pointer' wire:click="sort('name')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'name') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'name') fa-sort-amount-up ml-2 @endif'></i> {{ __('Name') }} </td>
                        <td style='cursor: pointer' wire:click="sort('adress')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'adress') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'adress') fa-sort-amount-up ml-2 @endif'></i>العنوان</td>
                        <td style='cursor: pointer' wire:click="sort('description')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'description') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'description') fa-sort-amount-up ml-2 @endif'></i>الوصف </td>
                        <td style='cursor: pointer' wire:click="sort('phone')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'phone') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'phone') fa-sort-amount-up ml-2 @endif'></i> {{ __('Phone') }} </td>
                        <td style='cursor: pointer' wire:click="sort('sundirction')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'sundirction') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'sundirction') fa-sort-amount-up ml-2 @endif'></i>اتجاه الشمس</td>
                        <td style='cursor: pointer' wire:click="sort('area')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'area') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'area') fa-sort-amount-up ml-2 @endif'></i>المساحة </td>
                        <td style='cursor: pointer' wire:click="sort('numberofspace')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'numberofspace') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'numberofspace') fa-sort-amount-up ml-2 @endif'></i> عدد الفضائات</td>
                        <td style='cursor: pointer' wire:click="sort('numberofflower')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'numberofflower') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'numberofflower') fa-sort-amount-up ml-2 @endif'></i> عدد الطوابق </td>
                        
                        @if(getCrudConfig('buildrequst')->delete or getCrudConfig('buildrequst')->update)
                            <td>{{ __('Action') }}</td>
                        @endif
                    </tr>

                    @foreach($buildrequsts as $buildrequst)
                        @livewire('admin.buildrequst.single', ['buildrequst' => $buildrequst], key($buildrequst->id))
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="m-auto pt-3 pr-3">
                {{ $buildrequsts->appends(request()->query())->links() }}
            </div>

            <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>

        </div>
    </div>
</div>
