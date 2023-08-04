<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Article extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $with = ['category', 'type', 'author'];

    protected $guarded = [];

    public function scopeFilter($query, array $filters = null)
    {
//        if (!empty($filters)) {
//            return $query->where('category_id', $filters['category']);
//        }
//        return $query;
        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query
                ->whereExists(fn($query) =>
                    $query->from('categories')
                    ->whereColumn('categories.id', 'articles.category_id')
                    ->where('categories.name', $category))
        );

        $query->when($filters['type'] ?? false, fn($query, $category) =>
        $query
            ->whereExists(fn($query) =>
            $query->from('types')
                ->whereColumn('types.id', 'articles.type_id')
                ->where('types.name', $category))
        );
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function users(): BelongsToMany
    {
        $this->belongsToMany(User::class, 'users_articles');
    }

    public function registerMediaConversions(Media|\Spatie\MediaLibrary\MediaCollections\Models\Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }
}
