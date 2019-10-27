<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function deleteCategory()
    {
        $this->delete();
    }

    public function updateCategory($attributes)
    {
        $this->update($attributes);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
