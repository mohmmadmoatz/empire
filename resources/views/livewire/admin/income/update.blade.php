<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('UpdateTitle', ['name' => __('Income') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.income.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Income')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Update') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">

        <div class="card-body">

                        <!-- Project_id Input -->
       
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
                        <div class='form-group'>
                            <label for='inputamount' class='col-sm-2 control-label'> {{ __('Date') }}</label>
                            <input type='date' wire:model.lazy='date' class="form-control @error('date') is-invalid @enderror" id='inputamount'>
                            @error('date') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                        </div>
            <!-- Amount Input -->
            <div class='form-group'>
                <label for='inputamount' class='col-sm-2 control-label'> {{ __('Amount') }}</label>
                <input  x-data x-mask:dynamic="$money($input)" type='text' wire:model.lazy='amount' class="form-control @error('amount') is-invalid @enderror" id='inputamount'>

                @error('amount') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Recive_name Input -->
            <div class='form-group'>
                <label for='inputrecive_name' class='col-sm-2 control-label'> {{ __('Recive_name') }}</label>
                <input type='text' wire:model.lazy='recive_name' class="form-control @error('recive_name') is-invalid @enderror" id='inputrecive_name'>
                @error('recive_name') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Description Input -->
            <div class='form-group'>
                <label for='inputdescription' class='col-sm-2 control-label'> {{ __('Description') }}</label>
                <textarea wire:model.lazy='description' class="form-control @error('description') is-invalid @enderror"></textarea>
                @error('description') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

            <div class="col-md-12">
                <!-- Image Input -->
         <div class='form-group'>
             <label for='inputimage' class='col-sm-2 control-label'>ملف</label>
             <input type='file' wire:model='image' class="form-control-file @error('image') is-invalid @enderror" id='inputimage'>
             @if($image and !$errors->has('image') and $image instanceof \Livewire\TemporaryUploadedFile and (in_array( $image->guessExtension(), ['png', 'jpg', 'gif', 'jpeg'])))
                 <a href="{{ $image->temporaryUrl() }}"><img width="200" height="200" class="img-fluid shadow" src="{{ $image->temporaryUrl() }}" alt=""></a>
             @endif
             @error('image') <div class='invalid-feedback'>{{ $message }}</div> @enderror
         </div>
         </div>

         <div class="col-md-12">
            <label>تأشير بالون الأحمر</label>
            <input type="checkbox" class="form-control" wire:model.lazy="isred">
        </div>
           

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Update') }}</button>
            <a href="@route(getRouteName().'.income.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
