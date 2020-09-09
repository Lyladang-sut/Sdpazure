<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessors extends Model
{
    protected $table = 'Access.Asseors' ; 

    // Delare to make change 
    protected $primaryKey   = 'ID';
    public $timestamps      = false;
    protected $guarded      = ['ID']; // Need to guard ID

    public function enterprise()
    {
        return $this->belongsTo('App\Enterprise', 'Enterprise link', 'ID' );
    }

    public function experts()
    {
        return $this->hasMany('App\AreaOfExpertise', 'AssesorID', 'ID');
    }

    public function courses()
    {
        return $this->hasMany('App\CourseTaught', 'AssesorID', 'ID');
    }

    public function image()
    {
        return $this->hasOne('App\AssessorImage', 'ID', 'Photo');
    }

    public function getImgAttribute()
    {
        return $this->image->Image;
    }
}
