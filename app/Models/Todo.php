<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    use HasFactory;

    protected $table ='todo';
    protected $fillable = ['todo_name'];
    protected $guarded = ['id'];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,'todo_user_id');
    }
}
