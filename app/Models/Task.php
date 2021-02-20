<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Task extends Model
{
    use HasFactory;
    const EXCERPT_LENGTH = 40;

    //protected $fillable =['user_id', 'title', 'description'];
    protected $guarded = [];

    public function excerpt()
    {
        return Str::limit($this->description, Task::EXCERPT_LENGTH);
    }



}
