<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RPL extends Model
{
    
    protected $table = 'Access.RPL';

    // Delare to make change 
    protected $primaryKey   = 'ID';
    public $timestamps      = false;
    protected $guarded      = [];

    public function provider()
    {
        return $this->belongsTo('App\RPLEnterprise', 'RPL provider', 'ID');
    }

    public function course()
    {
        return $this->belongsTo('App\RPLCourse', 'Course', 'ID');
    }

    public function batch()
    {
        return $this->belongsTo('App\RPLBatch', 'Batch', 'ID');
    }

    public function sector()
    {
        return $this->belongsTo('App\RPLSector', 'Assesment Sector', 'ID');
    }

    public function tests()
    {
        return $this->hasMany('App\RPLTest', 'RPL ID', 'ID');
    }
}
