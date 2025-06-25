<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model   // or rename to “Post” if that feels clearer
{
    use HasFactory;

    // The table name if you name it “posts”; remove if you name the model Post
    protected $table = 'posts';

    /**
     * The attributes that can be mass-assigned
     * via create() / update().
     */
    protected $fillable = [
        'type',         // weather, news, story, seminar, others
        'title',
        'body',
        'link',
        'image_path',
    ];

    /**
     * Optionally cast attributes or add accessors.
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /** Optional: return full URL for the stored image */
    public function getImageUrlAttribute()
    {
        return $this->image_path
            ? asset('storage/' . $this->image_path)
            : null;
    }
}
