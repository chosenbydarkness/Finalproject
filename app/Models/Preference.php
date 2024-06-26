<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string, string>
     */
    protected $fillable = [
        'user_id',
        'preference',
    ];

    /**
     * Get the user that owns the dietary preference.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

