<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">تعديل السحب</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.officepayment.read')" class="text-decoration-none">سحوبات النسبة</a></li>
                <li class="breadcrumb-item active">{{ __('Update') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">

        <div class="card-body">

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

                        <!-- Date Input -->
            <div class='form-group'>
                <label for='inputdate' class='col-sm-2 control-label'> {{ __('Date') }}</label>
                <input type='text' wire:model.lazy='date' class="form-control @error('date') is-invalid @enderror" id='inputdate'>
                @error('date') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Amount Input -->
            <div class='form-group'>
                <label for='inputamount' class='col-sm-2 control-label'> {{ __('Amount') }}</label>
                <input type='number' wire:model.lazy='amount' class="form-control @error('amount') is-invalid @enderror" id='inputamount'>
                @error('amount') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Description Input -->
            <div class='form-group'>
                <label for='inputdescription' class='col-sm-2 control-label'> {{ __('Description') }}</label>
                <input type='text' wire:model.lazy='description' class="form-control @error('description') is-invalid @enderror" id='inputdescription'>
                @error('description') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Image Input -->
            <div class='form-group'>
                <label for='inputimage' class='col-sm-2 control-label'> {{ __('Image') }}</label>
                <input type='file' wire:model='image' class="form-control-file @error('image') is-invalid @enderror" id='inputimage'>
                @if($image and !$errors->has('image') and $string instanceof \Livewire\TemporaryUploadedFile and (in_array( $image->guessExtension(), ['png', 'jpg', 'gif', 'jpeg'])))
                    <a href="{{ $image->temporaryUrl() }}"><img width="200" height="200" class="img-fluid shadow" src="{{ $image->temporaryUrl() }}" alt=""></a>
                @endif
                @error('image') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Update') }}</button>
            <a href="@route(getRouteName().'.officepayment.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
