<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkTeam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
    ];

    public function perteneceUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function miembros()
    {
        return $this->hasMany(TeamMember::class, 'work_teams_id');
    }
}
