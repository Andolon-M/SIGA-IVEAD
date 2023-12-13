<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'work_teams_id',
        'user_id',
    ];
    public function usuario()
    {
        
        return $this->belongsTo(User::class, 'user_id');
    }

    public function equipo()
    {
        return $this->belongsTo(WorkTeam::class, 'work_teams_id');
    }
}
