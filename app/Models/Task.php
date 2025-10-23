<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = [
        'title',
        'description',
        'deadline',
        'status_id',
        'priority_id'
    ];

    // protected $guarded = [
    //     'id',
    //     'timestamps'
    // ];

    // protected $casts = [
    //     'daedline'=>'string'
    // ];

    // protected $hidden = ['password'];

}
