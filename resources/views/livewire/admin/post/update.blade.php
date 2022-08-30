<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Post') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.post.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Post')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

        <div class="card-body">
                        <!-- Description Input -->
                        <div class='form-group'>
    
                            <div wire:ignore id="map-canvas"></div>
                            <div id="map-output"></div>
                            <script type="text/javascript">
                                /*
                                 * Google Maps: Latitude-Longitude Finder Tool
                                 * https://salman-w.blogspot.com/2009/03/latitude-longitude-finder-tool.html
                                 */
                                function loadmap() {
                                    // initialize map
                                    var map = new google.maps.Map(document.getElementById("map-canvas"), {
                                        center: new google.maps.LatLng(36.3528058, 43.2104131),
                                        zoom: 13,
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                    });
                                    // initialize marker
                                    var marker = new google.maps.Marker({
                                        position: map.getCenter(),
                                        draggable: true,
                                        map: map
                                    });
                                    // intercept map and marker movements
                                    google.maps.event.addListener(map, "idle", function() {
                                        marker.setPosition(map.getCenter());
                                        Livewire.emit('getLatitudeForInput',"[" + '"' + map.getCenter().lat() + '"' + "," + '"' +  map.getCenter().lng() + '"' + "]");
                                        });
                                    google.maps.event.addListener(marker, "dragend", function(mapEvent) {
                                        map.panTo(mapEvent.latLng);
                                    });
                                    // initialize geocoder
                                    var geocoder = new google.maps.Geocoder();
                                    google.maps.event.addDomListener(document.getElementById("search-btn"), "click", function() {
                                        geocoder.geocode({ address: document.getElementById("search-txt").value }, function(results, status) {
                                            if (status == google.maps.GeocoderStatus.OK) {
                                                var result = results[0];
                                                document.getElementById("search-txt").value = result.formatted_address;
                                                if (result.geometry.viewport) {
                                                    map.fitBounds(result.geometry.viewport);
                                                } else {
                                                    map.setCenter(result.geometry.location);
                                                }
                                            } else if (status == google.maps.GeocoderStatus.ZERO_RESULTS) {
                                            } else {
                                            }
                                        });
                                    });
                                    google.maps.event.addDomListener(document.getElementById("search-txt"), "keydown", function(domEvent) {
                                        if (domEvent.which === 13 || domEvent.keyCode === 13) {
                                            google.maps.event.trigger(document.getElementById("search-btn"), "click");
                                        }
                                    });
                                    // initialize geolocation
                                    if (navigator.geolocation) {
                                        google.maps.event.addDomListener(document.getElementById("detect-btn"), "click", function() {
                                            navigator.geolocation.getCurrentPosition(function(position) {
                                                map.setCenter(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
                                            }, function() {
                                            });
                                        });
                                        document.getElementById("detect-btn").disabled = false;
                                    }
                                }
                            </script>
                            <script src="//maps.googleapis.com/maps/api/js?v=3&amp;sensor=false&amp;key=AIzaSyAbjievsPTdcjqBTQLn3TV97nUjf2xGrWo&amp;callback=loadmap" defer></script>
                        
                        
                        
                        </div>
            <div class='form-group'>
                <label for='inputdescription' class='col-sm-2 control-label'>الوصف</label>
                <input type='text' wire:model.lazy='description' class="form-control @error('description') is-invalid @enderror" id='inputdescription'>
                @error('description') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <div class='form-group'>
                <label for='inputlalatlng' class='col-sm-2 control-label'>الموقع</label>
                <input type='text' wire:model='lalatlng' class="form-control @error('lalatlng') is-invalid @enderror" id='inputlalatlng'>
                @error('lalatlng') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            <!-- Latlng Input -->
            <div class='form-group'>
                <label for='inputcategory_id' class='col-sm-2 control-label'>النوع</label>
                <select wire:model.lazy='category_id' class="form-control @error('category_id') is-invalid @enderror" id='inputcategory_id'>
                    <option value="">{{ __('Select') }}</option>
                    @foreach(App\Models\Categories::get() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>




            <div class='form-group'>
                <label for='inputaddress' class='col-sm-2 control-label'>العنوان</label>
                <input type='text' wire:model.lazy='address' class="form-control @error('address') is-invalid @enderror" id='inputaddress'>
                @error('address') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
	
                <div class='form-group'>
                    <label for='inputdistance' class='col-sm-2 control-label'>المساحة</label>
                    <input type='text' wire:model.lazy='distance' class="form-control @error('distance') is-invalid @enderror" id='inputdistance'>
                    @error('distance') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>

                    <div class='form-group'>
                        <label for='inputbedroom' class='col-sm-2 control-label'>عدد الغرف</label>
                        <input type='text' wire:model.lazy='bedroom' class="form-control @error('bedroom') is-invalid @enderror" id='inputbedroom'>
                        @error('bedroom') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>

                        <div class='form-group'>
                            <label for='inputbathroom' class='col-sm-2 control-label'> {{ __('Bathroom') }}</label>
                            <input type='text' wire:model.lazy='bathroom' class="form-control @error('bathroom') is-invalid @enderror" id='inputbathroom'>
                            @error('bathroom') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                        </div>

                         
                            <div class='form-group'>
                                <label for='ishome' class='col-sm-2 control-label'>ظهور في الرئيسية</label>
                                <select wire:model.lazy='ishome' class="form-control @error('ishome') is-invalid @enderror" id='inputis_in_home'>
                                    <option value="">{{ __('Select') }}</option>
                                    <option value="1">{{ __('Yes') }}</option>
                                    <option value="0">{{ __('No') }}</option>
                                </select>
                                @error('ishome') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                            </div>
                            
                         

          
            <!-- Images Input -->
            <div class='form-group'>
                <label for='inputimages' class='col-sm-2 control-label'> {{ __('Images') }}</label>
                <input multiple type='file' wire:model='images' class="form-control-file @error('images') is-invalid @enderror" id='inputimages'>
                @if($images and !$errors->has('images') and $images instanceof \Livewire\TemporaryUploadedFile and (in_array( $images->guessExtension(), ['png', 'jpg', 'gif', 'jpeg'])))
                    <a href="{{ $images->temporaryUrl() }}"><img width="200" height="200" class="img-fluid shadow" src="{{ $images->temporaryUrl() }}" alt=""></a>
                @endif
                @error('images') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

        </div>
      
        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Update') }}</button>
            <a href="@route(getRouteName().'.post.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
<style>
    #map-search {  top: 10px; left: 10px; right: 10px; }
    #search-txt { float: left; width: 60%; }
    #search-btn { float: left; width: 19%; }
    #detect-btn { float: right; width: 19%; }
    #map-canvas {  width: 100%; height: 400px; }
    #map-output {  bottom: 10px; left: 10px; right: 10px; }
    #map-output a { float: right; }
</style>
