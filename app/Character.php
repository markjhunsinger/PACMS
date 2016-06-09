<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Gbrock\Table\Traits\Sortable;

class Character extends Model
{
    protected $guarded = ['id'];

    use Sortable;
    protected $sortable = ['character_name'];

    public function player()
    {
        return $this->belongsTo('App\Player');
    }
}
