@php

$id = $_GET['ID'];

$type =$_GET['type'];

if($type=="income"){
    $income = App\Models\Income::find($id);
}

if($type=="expense"){
  $income = App\Models\Expense::find($id);
}

@endphp

<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="utf-8">
    <title>وصل</title>
    <link rel="stylesheet" href="printfiles/style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        مكتب ابتكار
      </div>
      <div id="company">
        <h2 class="name">مكتب ابتكار</h2>
        <div>موصل/الزهور/قرب دورة النافورة</div>
        <div dir="ltr">0770 185 1999</div>

      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">التاريخ</div>
          <h2 class="name">{{Date("Y-m-d")}}</h2>
       
        </div>
        <div id="invoice">
            @if($type=="income")
          <h1>وصل قبض
               :{{$id}}
            </h1>
            @else
            <h1>وصل صرف
              :{{$id}}
           </h1>
            @endif

            <h3>المبلغ
              :@convert($income->amount) د.ع
            </h3>
          
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            @if($type=="expense")
            <th class="desc">
              <h2> 
                  دفع للسيد : 

                <b>{{$income->worker->name ??""}}</b></h2>
             
            </th>
            @else
            <th class="desc">
                <h2> 
                    استلمت من : 
  
                  <b>{{$income->project->customer->name ??""}}</b></h2>
               
              </th>
            @endif
  
          </tr>
        </thead>
        <tbody>
          <tr>
           
            <th class="desc">
              <h3> مبلغ وقدره : 
                <b id="amount">{{$income->amount}}</b></h3>
             
            </th>
         
          </tr>

          <tr>
           
            <th class="desc">
              <h3> وذالك عن : 
                <b>{{$income->description}}</b></h3>
             
            </th>
         
          </tr>
      
        
        </tbody>
      
      </table>
     
     
    </main>
   <script src="printfiles/tafqit.js"></script>
   <script>
     var amount = document.getElementById("amount")
     amount.innerHTML = tafqit({{$income->amount}} ,{TextToFollow:"on"}) + " دينار عراقي فقط لاغير"

     setTimeout(() => {
       window.print();
       window.close();
     }, 2000);
   </script>
  </body>
</html>