<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ExpenseCategory;
use App\Models\Income;
use App\Models\Expense;
use App\Models\EndingAmount;
use App\Models\Ending;
class ProjectController extends Controller
{
    //

    public function index()
    {
        # code...
        $project = Project::where('customer_id', auth()->id())->get();
        return response()->json(['success'=>true,'data'=>$project], 200,);

    }

    public function openProject($id)
    {
       $projectInfo = Project::where("id",$id)->select('id','name','starting_date')->first();
       $incomes = Income::where("project_id",$id)->orderBy("date","asc")->get();
       $projectInfo['print_url'] = url("/projectprint?id=$id");

       $expCat = ExpenseCategory::select("id","name")->get();

       $endingCat = Ending::select("id","name")->get();

       foreach ($expCat as $exp) {
              $exp['records'] = Expense::where("project_id",$id)->where("category_id",$exp->id)->orderBy("date","asc")->get();
              $exp['records_total'] = Expense::where("project_id",$id)->where("category_id",$exp->id)->orderBy("date","asc")->sum("amount");
       }

       foreach ($endingCat as $end) {
        $end['records'] = EndingAmount::where("project_id",$id)->where("category_id",$end->id)->orderBy("date","asc")->get();
        $end['records_total'] = EndingAmount::where("project_id",$id)->where("category_id",$end->id)->orderBy("date","asc")->sum("amount");
     }

       
       return response()->json(['success'=>true,'data'=>$projectInfo,'incomes'=>$incomes,'expenses'=>$expCat,'ending'=>$endingCat], 200,);

    }

}
