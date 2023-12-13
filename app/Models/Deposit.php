<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = [
        'donor_name',
        'donor_id',
        'type_donor_id',
        'date', 'required',
        'value',
        'url',
        'type',
        'weekly_reports_id',
        
    ];

    public function weeklyReport()
    {
        return $this->belongsTo(WeeklyReport::class, 'weekly_reports_id');
    }
    use HasFactory;
}
