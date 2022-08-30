
@php

$projectid = $_GET['id'];

$dates = $_GET['dates'] ??"";

$array = explode(' - ', $dates);
if($dates){
$date1 = $array[0];
$date2 = $array[1];
}

$project = App\Models\Project::find($projectid);

if(!$dates){
$incomes = App\Models\Income::where("project_id",$projectid)->orderBy("date","asc")->get();
$expenses  = App\Models\Expense::where("project_id",$projectid)->orderBy("date","asc")->get();

}else{
$incomes = App\Models\Income::where("project_id",$projectid)
->whereBetween("date",[$date1,$date2])
->orderBy("date","asc")->get();
$expenses  = App\Models\Expense::where("project_id",$projectid)
->whereBetween("date",[$date1,$date2])
->orderBy("date","asc")->get();

}



@endphp

<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">
    <title>طباعة ملف المشروع</title>

    <style>
        @font-face {
  font-family: SourceSansPro;
  src: url(printfiles/Tajawal-Regular.ttf);
}
body{
    font-family: SourceSansPro;
}
table{
    font-size: larger;
}
.table-striped tbody tr:nth-of-type(odd) td {
    background-color: rgba(0, 0, 0, .05)!important;
}
.table-striped tbody tr:nth-of-type(odd) th {
    background-color: rgba(0, 0, 0, .05)!important;
}
    </style>


</head>

<body>

 

    <div align="center">
    
     
        <img src="{{asset('images/logo.jpg')}}" style="
        width: 300px;
      
        margin-bottom: 10px;
    ">

        <br>
        <br>
     
    </div>

    <table class="table table-bordered">
        <tr>
            <th>
                <h3>اسم الزبون : {{$project->customer->name}}</h3>
            </th>
            <th style="text-align: left">
                <h4>{{Date("Y-m-d")}}</h4>
            </th>
        </tr>

        <tr>
            <th>
                <h3>اسم المشروع : {{$project->name}}</h3>
            </th>
            <th>
                <h4>الفترة : {{$dates ?? "الكل"}}</h4>
            </th>
            
        </tr>
    </table>

    <hr>

    <table class="table table-bordered table-striped">
        <tr>
            <th>المقبوض</th>
            <th>المصروف</th>
            <th> % نسبة المكتب</th>
            <th>نسبة المكتب</th>
            <th>رصيد المشروع</th>
            <th>الموازنة</th>
        </tr>
        <tr>
            <td>@convert($project->income)</td>
            <td>@convert($project->expenses)</td>
            <td>{{ $project->office_perctange }}</td>
            <td > @convert($project->office_balance) </td>
            <td  @if($project->project_balance <0) style="color:red" @endif> @convert($project->project_balance) </td>  
            <td  @if($project->budget <0) style="color:red" @endif > @convert($project->budget) </td>    



        </tr>
    </table>

    <div class="p-2">
        <hr>
        <h3 class="text text-success">المقبوض</h3>
        <div class="card-body table-responsive p-0">
            <table class="table table-bordered table-hover table-striped">
                <tr>
                    <th>{{ __('الوصف') }} </th>
                    <th>{{ __('التاريخ') }} </th>
                    <th>{{ __('المبلغ') }} </th>
                    <th>{{ __('المستلم') }} </th>
                </tr>
                @foreach ($incomes as $item)
                    <tr>
                        <td>{{$item->description}}</td>
                        <td>{{$item->date}}</td>
                        <td>@convert($item->amount)</td>
                        <td>{{$item->recive_name}}</td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="2">المجموع</th>
                    <th>@convert($incomes->sum("amount"))</th>
                    <th></th>

                </tr>
            </table>
        </div>
    </div>

   

  
                
        <div class="col-md-12">
            <h3>المصروف</h3>
            
        </div>


        

    
    <div class="p-2">
      
       
        


        <div class="card-body table-responsive p-0">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
            

             
                    <th>{{ __('الوصف') }} </th>
                    <th>{{ __('المبلغ') }} </th>
                    <th>{{ __('الكادر') }} </th>
                    {{-- <th>{{ __('اسم المستلم') }} </th> --}}
                    <th>{{ __('التاريخ') }} </th>
             
                </tr>
                   </thead>
                @foreach ($expenses as $item)
                    <tr>
                      
                        <td>{{$item->description}}</td>
                        <td>@convert($item->amount)</td>
                        <td>{{$item->worker->name ??""}}</td>
                        {{-- <td>{{$item->recive_name}}</td> --}}
                        <td>{{$item->date}}</td>

                    </tr>
                @endforeach
                <tr>
                      
                    <td><strong>المجموع</strong></td>
                    <td colspan="4"><strong>@convert($expenses->sum("amount"))</strong></td>
                    

                </tr>
            </table>
        </div>
    </div>


  
    
    
</body>

<script>
    setTimeout(() => {
        window.print()
    }, 1000);
</script>

</html>