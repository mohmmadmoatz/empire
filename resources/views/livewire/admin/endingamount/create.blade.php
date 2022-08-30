<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('EndingAmount') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.endingamount.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('EndingAmount')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <!-- Category_id Input -->
                    <div class='form-group' wire:ignore>
                        <label for='inputcategory_id' class=' control-label'> {{ __('Category_id') }}</label>
                        <select wire:model.lazy='category_id'
                            class="form-control selectpicker @error('category_id') is-invalid @enderror"
                            data-live-search="true">
                            <option value="">يرجى اختيار القائمة</option>
                            @foreach (App\Models\Ending::get() as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>

                            @endforeach
                        </select>
                        @error('category_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-md-4">

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

                <div class="col-md-4">

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
            </div>



            <div class="row">
                <div class="col-md-4">
                    <!-- Amount Input -->
                    <div class='form-group'>
                        <label for='inputamount' class=' control-label'> {{ __('Amount') }}</label>
                        <input type='number' wire:model.lazy='amount'
                            class="form-control @error('amount') is-invalid @enderror" id='inputamount'>
                        @error('amount') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Pay Input -->
                    <div class='form-group'>
                        <label for='inputpay' class=' control-label'> {{ __('Pay') }}</label>
                        <input type='number' wire:model.lazy='pay'
                            class="form-control @error('pay') is-invalid @enderror" id='inputpay'>
                        @error('pay') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Rest Input -->
                    <div class='form-group'>
                        <label for='inputrest' class=' control-label'> {{ __('Rest') }}</label>
                        <input readonly type='number' wire:model.lazy='rest'
                            class="form-control @error('rest') is-invalid @enderror" id='inputrest'>
                        @error('rest') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>




            <div class="row">
                <div class="col-md-6">
                    <!-- Date Input -->
                    <div class='form-group'>
                        <label for='inputdate' class=' control-label'> {{ __('Date') }}</label>
                        <input type='date' wire:model.lazy='date'
                            class="form-control @error('date') is-invalid @enderror" id='inputdate'>
                        @error('date') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Recive_name Input -->
                    <div class='form-group'>
                        <label for='inputrecive_name' class=' control-label'> {{ __('Recive_name') }}</label>
                        <input type='text' wire:model.lazy='recive_name'
                            class="form-control @error('recive_name') is-invalid @enderror" id='inputrecive_name'>
                        @error('recive_name') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>



            <!-- Description Input -->
            <div class='form-group'>
                <label for='inputdescription' class=' control-label'> {{ __('Description') }}</label>
                <textarea wire:model.lazy='description'
                    class="form-control @error('description') is-invalid @enderror"></textarea>
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
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.endingamount.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
