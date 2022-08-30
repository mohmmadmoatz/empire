<?php

namespace App\Http\Livewire\Admin\Project;

use Livewire\Component;
use App\Models\Project;
use App\Models\Income;
use App\Models\Expense;
use App\Models\EndingAmount;
use App\Models\OfficeExp;
use App\Models\Projectperctanges;
class Report extends Component
{
   
    public $datefilterON = false;

    public $projectIncomes = 0;
    public $projectExpenses = 0;
    public $projectNet=0;   
    public $prvNet=0;

    public $prvNetOffice=0;
    public $officeIncomes=0;
    public $officeExpenses=0;
    public $officeNet=0;


    public function searchBydate($date)
    {
        # code...
        $this->daterange = $date;
        $this->datefilterON = true;
    }

    public function render()
    {

        $this->projectIncomes = Income::sum("amount");
        $this->projectExpenses = Expense::sum("amount") +  EndingAmount::sum("amount");
        $this->projectNet = $this->projectIncomes - $this->projectExpenses;
        $this->prvNet = 0;

        $this->officeIncomes = Projectperctanges::sum("amount");
        $this->officeExpenses = OfficeExp::sum("amount");
        $this->officeNet = $this->officeIncomes - $this->officeExpenses;
        $this->prvNet = 0;

        if($this->datefilterON){
            //dd($this->daterange);
            $date1 = explode(" - ", $this->daterange)[0];
            $date2 = explode(" - ", $this->daterange)[1];

            $this->projectIncomes = Income::
            whereBetween('date',[$date1,$date2])->sum("amount");
            $this->projectExpenses = Expense::whereBetween('date',[$date1,$date2])->sum("amount") +  EndingAmount::whereBetween('date',[$date1,$date2])->sum("amount");
            
            $this->projectNet = $this->projectIncomes - $this->projectExpenses;


            $this->officeIncomes = Projectperctanges::whereBetween('date',[$date1,$date2])->sum("amount");
            $this->officeExpenses = OfficeExp::whereBetween('date',[$date1,$date2])->sum("amount");
            $this->officeNet = $this->officeIncomes - $this->officeExpenses;

            // before dates

            $projectIncomes = Income::
            where('date',"<",$date1)->sum("amount");

            $projectExpenses = Expense::where('date',"<",$date1)->sum("amount") +  EndingAmount::where('date',"<",$date1)->sum("amount");
            
            $this->prvNet = $projectIncomes - $projectExpenses;

            $officeIncomes = Projectperctanges::where('date',"<",$date1)->sum("amount");
            $officeExpenses = OfficeExp::where('date',"<",$date1)->sum("amount");
            $this->prvNetOffice = $officeIncomes - $officeExpenses;
            

            
            
        }
        return view('livewire.admin.project.report')->layout('admin::layouts.app', ['title' => "تقرير شامل" ]);
    }
}
