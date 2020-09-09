<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndustryImage extends Model
{
    
    protected $table = 'Access.OM at Intake?Images';
    protected $primaryKey   = 'ID';
    protected $fillable = ['Image', 'photo'];
    public $timestamps = false;
    public function industry()
    {
        return $this->belongsTo('App\Industry', 'Photo', 'ID');
    }

}
