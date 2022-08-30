<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('UpdateTitle', ['name' => __('Project') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.project.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Project')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Update') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">

        <div class="card-body">

                 <!-- Customer_id Input -->

            <div class="row">
                <div class="col-md-6">
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
                <div class="col-md-6">
                    <!-- Name Input -->
                    <div class='form-group'>
                        <label for='inputname' class='control-label'> {{ __('Name') }}</label>
                        <input type='text' wire:model.lazy='name'
                            class="form-control @error('name') is-invalid @enderror" id='inputname'>
                        @error('name') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            <!-- Site Input -->
            <div class='form-group'>
                <label for='inputsite' class='control-label'> {{ __('Site') }}</label>
                <input type='text' wire:model.lazy='site' class="form-control @error('site') is-invalid @enderror"
                    id='inputsite'>
                @error('site') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-4">
                    <!-- Site_space Input -->
                    <div class='form-group'>
                        <label for='inputsite_space' class='control-label'> {{ __('Site_space') }}</label>
                        <input type='text' wire:model.lazy='site_space'
                            class="form-control @error('site_space') is-invalid @enderror" id='inputsite_space'>
                        @error('site_space') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Space_build Input -->
                    <div class='form-group'>
                        <label for='inputspace_build' class='control-label'> {{ __('Space_build') }}</label>
                        <input type='text' wire:model.lazy='space_build'
                            class="form-control @error('space_build') is-invalid @enderror" id='inputspace_build'>
                        @error('space_build') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                      <!-- Floor_count Input -->
            <div class='form-group'>
                <label for='inputfloor_count' class='control-label'> {{ __('Floor_count') }}</label>
                <input type='text' wire:model.lazy='floor_count'
                    class="form-control @error('floor_count') is-invalid @enderror" id='inputfloor_count'>
                @error('floor_count') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
                </div>
            </div>




          
            <div class="row">
                <div class="col-md-6">
                       <!-- Starting_date Input -->
            <div class='form-group'>
                <label for='inputstarting_date' class='control-label'> {{ __('Starting_date') }}</label>
                <input type='date' wire:model.lazy='starting_date'
                    class="form-control @error('starting_date') is-invalid @enderror" id='inputstarting_date'>
                @error('starting_date') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
                </div>
                <div class="col-md-6">
                          <!-- Office_perctange Input -->
            <div class='form-group'>
                <label for='inputoffice_perctange' class='control-label'> {{ __('Office_perctange') }}</label>
                <input type='number' wire:model.lazy='office_perctange'
                    class="form-control @error('office_perctange') is-invalid @enderror" id='inputoffice_perctange'>
                @error('office_perctange') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
                </div>
            </div>

         
      
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Update') }}</button>
            <a href="@route(getRouteName().'.project.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
