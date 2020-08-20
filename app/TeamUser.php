<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamUser extends Model
{
    /**
     * @var string
     */
    protected $table = 'team_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function team()
    {
        return $this->belongsTo("App\Team", 'team_id');
    }
}
