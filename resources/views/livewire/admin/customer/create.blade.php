<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Customer') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.customer.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Customer')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

        <div class="card-body">
                        <!-- Name Input -->
            <div class='form-group'>
                <label for='inputname' class='col-sm-2 control-label'> {{ __('Name') }}</label>
                <input type='text' wire:model.lazy='name' class="form-control @error('name') is-invalid @enderror" id='inputname'>
                @error('name') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

            <div class='form-group'>
                <label for='inputname' class='col-sm-2 control-label'>الأسم المستخدم</label>
                <input type='text' wire:model.lazy='email' class="form-control @error('name') is-invalid @enderror" id='inputname'>
                @error('email') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

            <div class='form-group'>
                <label for='inputname' class='col-sm-2 control-label'>كلمة المرور</label>
                <input type='password' wire:model.lazy='password' class="form-control @error('password') is-invalid @enderror" id='inputname'>
                @error('password') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

            <!-- Phone Input -->
            <div class='form-group'>
                <label for='inputphone' class='col-sm-2 control-label'> {{ __('Phone') }}</label>
                <input type='text' wire:model.lazy='phone' class="form-control @error('phone') is-invalid @enderror" id='inputphone'>
                @error('phone') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Address Input -->
            <div class='form-group'>
                <label for='inputaddress' class='col-sm-2 control-label'> {{ __('Address') }}</label>
                <textarea wire:model.lazy='address' class="form-control @error('address') is-invalid @enderror"></textarea>
                @error('address') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.customer.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
