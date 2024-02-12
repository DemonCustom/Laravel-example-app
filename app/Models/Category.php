<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int    $id
 * @property string $name
 * @property string $poster
 * @property string $created_at
 * @property string $updated_at
 */

class Category extends Model
{
    use HasFactory;

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'category_post', 'category_id', 'post_id');
    }

}
