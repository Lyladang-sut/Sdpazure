<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TOATraining extends Model
{
    protected $table = 'Access.TOA Training';

    protected $primaryKey   = 'ID';

    public $timestamps      = false;

    protected $guarded = ['ID', 'unique'];

    public function toa()
    {
        return $this->belongsTo('App\TOA', 'ID', 'TOA_ID');
    }

    public function provider()
    {
        return $this->belongsTo('App\TrainingProvider', 'Organisation', 'ID');
    }

    public function trainer()
    {
        return $this->belongsTo('App\TPPTrainer', 'Trainer', 'ID');
    }

    public function owner()
    {
        return $this->belongsTo('App\Industry', 'Owner', 'ID');
    }

    public static $types = [
        ''  => '',
        'Owner' => 'Owner',
        'Assessor'  => 'Assessor',
        'Trainer & Assessor' => 'Trainer & Assessor',
        'Enterprise Assessor' => 'Enterprise Assessor'
    ];
}
