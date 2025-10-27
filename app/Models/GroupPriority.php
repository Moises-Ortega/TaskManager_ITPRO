<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupPriority extends Model
{
    protected $table = 'group_priorities';

    protected $fillable = ['name'];

    public $timestamps = false;
}
