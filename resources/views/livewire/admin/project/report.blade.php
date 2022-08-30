<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0">
                <h3 class="card-title">التقرير الشامل</h3>

                <div class="px-2 mt-4">

                    <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                        <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">التقارير</li>
                    </ul>

                    <div class="row justify-content-between mt-4 mb-4">
         
                      
                        <div class="col-md-12" >
                            <label for="">الفترة</label>
                            <div class="input-group" >
                                <input type="text" id= "reportrange" class="form-control" wire:model.lazy="daterange" wire:ignore >

                                <div class="input-group-append">
                                    <button class = "btn btn-primary" onclick="daterangeGo()">
                                        فلترة
                                    </button>
                                    @if($datefilterON)
                                    <button class = "btn btn-danger" wire:click = "$set('datefilterON',false)">
                                        الغاء
                                    </button>
                                    @endif
                                   
                                </div>
                            </div>

                        </div>
                      
                      
                        
                      
                    </div>
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
           

            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table  table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>الصافي السابق</th>
                                        <th>واردات المشاريع</th>
                                        <th>صادرات المشاريع</th>
                                        <th>الصافي</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    <tr>
                                        <td>
                                            <label style="font-size: x-large" class="badge badge-secondary">
                                                @convert($prvNet)
                                            </label>
                                        </td>
                                        <td>
                                            <label style="font-size: x-large" class="badge badge-success">
                                            @convert($projectIncomes)
                                        </label>
                                        </td>
                                        <td>
                                            <label style="font-size: x-large" class="badge badge-danger">
                                            @convert($projectExpenses)
                                        </label>
                                        </td>
                                        <td>
                                            <label style="font-size: x-large" class="badge badge-warning">
                                            @convert($projectNet)
                                        </label>
                                        </td>
                                    </tr>
                                </tbody>
                                    
                            </table>
        
        
                    </div>
                    </div>

                    <div class="col-12">
                        <hr>
                    </div>

                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table  table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>الصافي السابق</th>
                                        <th>واردات المكتب</th>
                                        <th>صادرات المكتب</th>
                                        <th>الصافي</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    <tr>
                                        <td>
                                            <label style="font-size: x-large" class="badge badge-secondary">
                                                @convert($prvNetOffice)
                                            </label>
                                        </td>
                                        <td>
                                            <label style="font-size: x-large" class="badge badge-success">
                                            @convert($officeIncomes)
                                        </label>
                                        </td>
                                        <td>
                                            <label style="font-size: x-large" class="badge badge-danger">
                                            @convert($officeExpenses)
                                        </label>
                                        </td>
                                        <td>
                                            <label style="font-size: x-large" class="badge badge-warning">
                                            @convert($officeNet)
                                        </label>
                                        </td>
                                    </tr>
                                </tbody>
                                    
                            </table>
        
        
                    </div>
                    </div>

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