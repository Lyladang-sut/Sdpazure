<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTrainingSupport extends Model
{

    protected $table = 'Access.Post Training Support 1';

    protected $primaryKey   = 'ID';

    public $timestamps      = false;

    protected $guarded = ['ID', 'index'];

    public function trainee()
    {
        return $this->belongsTo('App\Trainee', 'ID', 'Personal ID');
    }

    public function supportType()
    {
        return $this->belongsTo('App\DimSupportType', 'ID', 'Topic');
    }

}
