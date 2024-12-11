<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'class_room_id'];

    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
