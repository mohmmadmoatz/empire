<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0">
                <h3 class="card-title">{{ __('ListTitle', ['name' => __(\Illuminate\Support\Str::plural('Expense')) ]) }}</h3>

                <div class="px-2 mt-4">

                    <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                        <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __(\Illuminate\Support\Str::plural('Expense')) }}</li>
                    </ul>

                    <div class="row justify-content-between mt-4 mb-4">
                        @if(getCrudConfig('expense')->create)
                        <div class="col-md-4 right-0">
                            <a href="@route(getRouteName().'.expense.create')?project_id={{$project_id}}&category_id={{$category_id}}&worker_id={{$worker_id}}" class="btn btn-success">{{ __('CreateTitle', ['name' => __('Expense') ]) }}</a>
                        </div>
                        @endif
                        @if(getCrudConfig('expense')->searchable())
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
                       

                        <div class="col-md-6">

                            <div class='form-group' wire:ignore>
                                <label for='project_id' class=' control-label'>المشروع</label>
                                <select wire:model.lazy='project_id'
                                    class="form-control selectpicker @error('project_id') is-invalid @enderror"
                                    data-live-search="true">
                                    <option value="">يرجى اختيار المشروع</option>
                                    @foreach (App\Models\Project::latest()->get() as $item)
                                    <option value="{{$item->id}}">{{$item->name}} - {{$item->customer->name}}</option>
        
                                    @endforeach
                                </select>
                                @error('project_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                            </div>
        
                        </div>
        
                        <div class="col-md-6">
        
                            <div class='form-group' wire:ignore>
                                <label for='worker_id' class=' control-label'>الكادر</label>
                                <select wire:model.lazy='worker_id'
                                    class="form-control selectpicker @error('worker_id') is-invalid @enderror"
                                    data-live-search="true">
                                    <option value="">يرجى اختيار الكادر</option>
                                    @foreach (App\Models\Worker::latest()->get() as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
        
                                    @endforeach
                                </select>
                                @error('worker_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                            </div>
        
                        </div>
                        <div class="col-md-12">
                            <table class="table">
                                <tr>
                                    <th>اجمالي المبلغ</th>
                                    <th>اجمالي المدفوع</th>
                                    <th>اجمالي المتبقي</th>
                                </tr>
                                <tr>
                                    <td>@convert($total_amount)</td>
                                    <td><span class="text text-success">@convert($total_pay)</span></td>
                                    <td><span class="text text-danger">@convert($total_rest)</span></td>

                                </tr>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <td style='cursor: pointer' wire:click="sort('description')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'description') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'description') fa-sort-amount-up ml-2 @endif'></i> {{ __('Description') }} </td>
                        <td>{{ __('ملف') }} </td>
                        <td> المشروع </td>
                       
                        <td> الكادر </td>
                        <td style='cursor: pointer' wire:click="sort('date')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'date') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'date') fa-sort-amount-up ml-2 @endif'></i> التاريخ </td>
                        <td style='cursor: pointer' wire:click="sort('amount')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'amount') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'amount') fa-sort-amount-up ml-2 @endif'></i> {{ __('Amount') }} </td>
                        <td style='cursor: pointer' wire:click="sort('pay')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'pay') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'pay') fa-sort-amount-up ml-2 @endif'></i> {{ __('Pay') }} </td>
                        <td style='cursor: pointer' wire:click="sort('rest')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'rest') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'rest') fa-sort-amount-up ml-2 @endif'></i> {{ __('Rest') }} </td>
                        
                        @if(getCrudConfig('expense')->delete or getCrudConfig('expense')->update)
                            <td>{{ __('Action') }}</td>
                        @endif
                    </tr>

                    @foreach($expenses as $expense)
                        @livewire('admin.expense.single', ['expense' => $expense], key($expense->id))
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="m-auto pt-3 pr-3">
                {{ $expenses->appends(request()->query())->links() }}
            </div>

            <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>

        </div>
    </div>
</div>
