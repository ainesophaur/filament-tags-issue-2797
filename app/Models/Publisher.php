<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Publisher extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'publisher_authors');
    }
}
