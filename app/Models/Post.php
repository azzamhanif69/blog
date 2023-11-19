<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];


    public function scopeFilter($query, array $filters)
    {
        // if (isset($filters['cari']) ? $filters['cari'] : false) {
        //     return $query->where('tittle', 'like', '%' . $filters['cari'] . '%')
        //         ->orWhere('body', 'like', '%' . $filters['cari'] . '%');
        // }
        $query->when($filters['cari'] ?? false, function ($query, $cari) {
            return $query->where(function ($query) use ($cari) {
                $query->where('tittle', 'like', '%' . $cari . '%')
                    ->orWhere('body', 'like', '%' . $cari . '%');
            });
        });
        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });
        $query->when($filters['author'] ?? false, function ($query, $author) {
            return $query->whereHas('author', function ($query) use ($author) {
                $query->where('username', $author);
            });
        });
    }
    public function category()
    {
        return $this->BelongsTo(Category::class);
    }
    public function author()
    {
        return $this->BelongsTo(User::class, 'user_id');
    }
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'tittle'
            ]
        ];
    }
}
