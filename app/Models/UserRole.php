<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserRole extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $casts = [
        'id' => 'string'
    ];

    public function users():HasMany
    {
        return $this->hasMany(User::class);
    }
}
