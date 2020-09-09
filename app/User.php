<?php

namespace App;

// use App\Permissions\HasPermissionsTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'First Name', 'Last Name', 'email', 'password', 'role', 'Training Provider',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'Access.Submitter';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    public function trainees(){
        return $this->hasMany('App\Trainee', 'Submitter', 'ID');
    }

    public function enterprises(){
        return $this->hasMany('App\Enterprise', 'Submitter', 'ID');
    }

    public function industries(){
        return $this->hasMany('App\Industry', 'Submitter', 'ID');
    }
}
