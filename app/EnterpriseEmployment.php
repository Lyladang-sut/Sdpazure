<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnterpriseEmployment extends Model
{

    protected $table = 'Access.Enterprise employment';

   // Delare to make change 
   protected $primaryKey   = 'ID';
   public $timestamps      = false;
   protected $guarded      = ['ID']; // Need to guard ID

    public function enterprise()
    {
        return $this->belongsTo('App\Enterprise', 'Enterprise ID', 'ID');
    }
}
