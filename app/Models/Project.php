<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $appends =["expenses","income","ProjectBalance"];
    

    /**
     * Get all of the expenses for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    
     /**
      * Get all of the Expenses for the Project
      *
      * @return \Illuminate\Database\Eloquent\Relations\HasMany
      */
     public function getExpensesAttribute()
     {
         $exp = Expense::where("project_id",$this->id)->sum("amount");
         $ending = EndingAmount::where("project_id",$this->id)->sum("amount");
         return $exp + $ending;
     }

     /**
      * Get the Customer that owns the Project
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function Customer()
     {
         return $this->belongsTo(Customer::class, 'customer_id');
     }

     public function getIncomeAttribute()
     {
         $income = Income::where("project_id",$this->id)->sum("amount");
         return $income;
     }

     public function getOutPaymentAttribute()
     {
         $outpayment = OutPayment::where("project_id",$this->id)->sum("amount");
         return $outpayment;
     }

     public function getProjectBalanceAttribute()
     {
         return $this->income - $this->expenses;
     }

     public function getOfficeBalanceAttribute()
     {
        $perc = Projectperctanges::where("project_id",$this->id)->sum("amount");
        return $perc;
        // return $this->income * ($this->office_perctange / 100);
     }

     public function getOfficeNetAttribute()
     {
    
        $withdraw = OfficePayment::where("project_id",$this->id)->sum("amount");

         return $this->office_balance - $withdraw;
     }

     public function getBudgetAttribute()
     {
        return $this->income - ($this->office_balance +$this->expenses);
     }


    
}
