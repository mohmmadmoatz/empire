@component('admin::layouts.app')
<div class="container-fluid">
   
    <div class="card-group">
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium">{{App\Models\Worker::count()}}</h2>
                            
                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate"> <a href="@route(getRouteName().'.'.'worker'.'.read')" class="sidebar-link @isActive(getRouteName().'.'.'worker'.'.read')">الكادر</a> </h6>
                    </div>
                    <div class="mr-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i class="fa fa-users fa-2x"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium">{{App\Models\Customer::count()}}</h2>
                            
                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate"> <a href="@route(getRouteName().'.'.'customer'.'.read')" >الزبائن</a> </h6>
                    </div>
                    <div class="mr-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i class="fa fa-users fa-2x"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium">{{App\Models\Project::count()}}</h2>
                            
                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate"> <a href="@route(getRouteName().'.'.'project'.'.read')" >المشاريع</a> </h6>
                    </div>
                    <div class="mr-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i class="fa fa-file fa-2x"></i></span>
                    </div>
                </div>
            </div>
        </div>
     
    </div>
</div>
@endcomponent
