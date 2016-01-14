<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liste extends Model
{
    //permettera de passer les infos de la BDD au classe qui y herite
    protected $table = 'lists';

    public $timestamps=false;
    protected $fillable=['id','task_id','name','user_id','DateCrea','Accompli'];


}
