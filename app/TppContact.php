<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TppContact extends Model
{
   protected $table = 'Access.TPP Contact';

   // Delare to make change 
   protected $primaryKey   = 'ID';
   public $timestamps      = false;
   protected $guarded      = ['ID']; // Need to guard ID

   public function organisation()
   {
       return $this->belongsTo('App\TrainingProvider', 'ID', 'Organisation');
   }
}
