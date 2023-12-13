<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyReport extends Model
{

    protected $fillable = [
        'date',
        'monthly_reports_id',
    ];

    
    public function deposits()
    {
        return $this->hasMany(Deposit::class, 'weekly_reports_id');
    }
    public function egress()
    {
        return $this->hasMany(Egress::class, 'weekly_reports_id');
    }


    public function monthlyReport()
    {
        return $this->belongsTo(MonthlyReport::class, 'monthly_reports_id');
    }
    use HasFactory;
}
