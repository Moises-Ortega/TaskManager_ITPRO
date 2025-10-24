<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
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

    protected $casts = [
        'deadline' => 'datetime',
    ];

    // protected $hidden = ['password'];

    public function status()
    {
        return $this->belongsTo(TaskStatus::class, 'status_id');
    }

    public function priority()
    {
        return $this->belongsTo(TaskPriority::class, 'priority_id');
    }

}
