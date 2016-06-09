<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Gbrock\Table\Traits\Sortable;

class Player extends Model
{
    protected $guarded = ['id'];

    use Sortable;
    protected $sortable = ['last_name', 'first_name'];

    public function character()
    {
        return $this->hasMany('App\Character');
    }
}
