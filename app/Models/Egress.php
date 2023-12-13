<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egress extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'date', 'required',
        'value',
        'type',
        'url',
        'weekly_reports_id',
        
    ];
    public function weeklyReport()
    {
        return $this->belongsTo(WeeklyReport::class, 'weekly_reports_id');
    }
}
