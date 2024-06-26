<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string, string>
     */
    protected $fillable = [
        'author_name',
        'recipe_id',
        'content',
    ];

    /**
     * Get the recipe that the comment belongs to.
     */
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    /**
     * Get the user that authored the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'author_name', 'name');
    }
}

