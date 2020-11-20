<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Ads extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'photos', 'brand', 'color', 'price', 'kilometers', 'condition', 'description'];

    protected $casts = [
        'photos' => 'array'
    ];

    /**
     * Relation with users.
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get Car statuses.
     * @return array
     */
    public static function getConditions()
    {
        return ['good', 'very_good', 'excellent'];
    }

    public function getPhotos()
    {
        $photos = $this->photos ?: [];
        return collect($photos)->map(function ($photo) {
            return asset(Storage::url($photo));
        });
    }
}
