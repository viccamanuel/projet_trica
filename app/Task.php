<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    //passe les données à la DB
protected $table = 'tasks';

    public $timestamps=true;
    protected $fillable=['id','user_id','name','descriptionTache','fini'];

    /**
         * Get the user that owns the task.
         */
        public function user()
        {
            return $this->belongsTo(User::class);
        }
}
