<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TraineeImage extends Model
{

    protected $table = 'Access.TraineeApplication?Images';
    protected $primaryKey   = 'ID';
    public $timestamps      = false;

    protected $fillable = ['Image', 'photo'];

    public function employee(){
        return $this->belongsTo('App\Trainee', 'Photo', 'ID');
    }

}
