<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyReport extends Model
{
    protected $fillable = [
        'date',
        
        
    ];
   
    public function weekly_reports()
    {
        return $this->hasMany(WeeklyReport::class, 'monthly_reports_id');
    }

    use HasFactory;
}
