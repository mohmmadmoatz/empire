<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0">
                <h3 class="card-title">{{ __('ListTitle', ['name' => __(\Illuminate\Support\Str::plural('Project')) ]) }}</h3>

                <div class="px-2 mt-4">

                    <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                        <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item"><a href="@route(getRouteName().'.project.read')"
                            class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Project')) }}</a></li>
                        <li class="breadcrumb-item active">{{$project->name}}</li>
                    </ul>

                    <div class="row justify-content-between mt-4 mb-4">
                        
                        <div class="col-md-12">
                            <div class="input-group" >
                                <input type="text" id= "reportrange" onchange="daterangeGo()" class="form-control" wire:model.lazy="daterange" wire:ignore autocomplete="off" >

                                
                            </div>

                            <a target="_blank" class="btn btn-primary" href="@route('projectprint')?id={{$project->id}}">طباعة الكل</a>
                            <a target="_blank" class="btn btn-primary" href="@route('projectprint')?id={{$project->id}}&dates={{$daterange}}">طباعة حسب الفترة</a>
                            <hr>
                            <hr>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>المقبوض</th>
                                        <th>المصروف</th>
                                        <th>نسبة المكتب</th>
                                        <th>رصيد المكتب</th>
                                        <th>رصيد المشروع</th>
                                        <th>الموازنة</th>
                                    </tr>
                                    <tr>
                                        <td>@convert($project->income)</td>
                                        <td>@convert($project->expenses)</td>
                                        <td>{{ $project->office_perctange }}</td>
                                        <td> @convert($project->office_balance) </td>
                                        <td> @convert($project->project_balance) </td>  
                                        <td> @convert($project->budget) </td>    



                                    </tr>
                                </table>
                            </div>

                        </div>
                       
                    </div>
                </div>
            </div>

            <div class="p-2">
                <hr>
                <h4 class="text text-success">المقبوض</h4>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>{{ __('ت') }} </th>
                            <th>{{ __('Description') }} </th>
                            <th>{{ __('Date') }} </th>
                            <th>{{ __('Amount') }} </th>
                            <th>{{ __('Recive_name') }} </th>
                        </tr>
                        @foreach ($incomes as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->date}}</td>
                                <td>@convert($item->amount)</td>
                                <td>{{$item->recive_name}}</td>

                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>


            

            <div class="p-2">
                <hr>
                <h3 class="text text-danger">المصروف
                    <a href="@route(getRouteName().'.expense.create')?project_id={{$project->id}}" target="_blank" rel="noopener noreferrer">  <i class="fa fa-plus"></i> جديد</a>    
                </h3> 
                <hr>
                


                <div class="card-body table-responsive p-0">
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>ت</th>
                            
                            <th>{{ __('Description') }} </th>
                            <th>{{ __('Amount') }} </th>
                            <th>{{ __('الكادر') }} </th>
                            <th>{{ __('Recive_name') }} </th>
                            <th>{{ __('التاريخ') }} </th>
                            <th>
                                
                            </th>
                        </tr>
                        @foreach ($expenses as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                              
                                <td>{{$item->description}}</td>
                                <td>@convert($item->amount)</td>
                                <td>{{$item->worker->name ??""}}</td>
                                <td>{{$item->recive_name}}</td>
                                <td>{{$item->date}}</td>
                                <td>
                                    <a href="@route(getRouteName().'.expense.update', ['expense' => $item->id])" class="btn text-primary mt-1">
                                        <i class="icon-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
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
            
            </div>
           

            

        </div>
    </div>
</div>

<script>
 

    function daterangeGo() {
        var element = document.getElementById("reportrange")
        console.log(element.value)
        Livewire.emit('searchBydate');
        @this.searchBydate(element.value)
    }

</script>