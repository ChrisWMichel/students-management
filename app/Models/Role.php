<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];

    const ROLES = [
        'admin' => 'admin',
        'user' => 'user',
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
