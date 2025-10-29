<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'priority_id',
        'user_id'
    ];

    public function category()
    {
        return $this->belongsTo(GroupCategory::class, 'category_id');
    }

    public function priority()
    {
        return $this->belongsTo(GroupPriority::class, 'priority_id');
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
