<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'live_url',
        'github_url',
        'is_featured',
        'is_active',
        'image_url',
    ];

    /**
     * Get a temporary URL for the project screenshot, or null if none is stored.
     */
    public function imageTemporaryUrl(int $minutes = 30): ?string
    {
        if (blank($this->image_url)) {
            return null;
        }

        return rescue(
            fn (): string => Storage::disk('s3')->temporaryUrl($this->image_url, now()->addMinutes($minutes)),
            report: false,
        );
    }
}
