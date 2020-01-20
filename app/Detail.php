<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Detail extends Model  
{
   use Notifiable;
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','first_name','last_name' ,'blood_group', 'division','city','phone','eligibility'
    ];
    public function user(){
        return $this->belongsTo(User);
    }
}
