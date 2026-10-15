<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Umkm extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'address',
        'latitude',
        'longitude',
        'business_scale',
        'sales_channel',
        'public_phone',
        'photo_path',
        'status',
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(BusinessCategory::class, 'category_id');
    }

    public function clusterAssignments(): HasMany
    {
        return $this->hasMany(ClusterAssignment::class, 'umkm_id');
    }

    /**
     * Get the latest cluster assignment for this UMKM.
     */
    public function latestClusterAssignment(): HasOne
    {
        return $this->hasOne(ClusterAssignment::class, 'umkm_id')->latestOfMany();
    }
}
