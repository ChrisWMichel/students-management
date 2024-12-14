<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $with = ['class', 'section'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function class()
    {
        return $this->belongsTo(ClassRoom::class, 'class_room_id');
    }

    public function scopeSearch(Builder $query, Request $request){
        return $query->where(function($query)use ($request){
            $query->where('firstname', 'like', '%'.$request->search.'%')
          ->orWhere('lastname', 'like', '%'.$request->search.'%')
          ->orWhere('email', 'like', '%'.$request->search.'%');
        })->when($request->class_id, function($query)use ($request){
            $query->where('class_room_id', $request->class_id);
        })->when($request->section_id, function($query)use ($request){
            $query->where('section_id', $request->section_id);
        });
    }
}
