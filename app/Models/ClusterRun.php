<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClusterRun extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'algorithm',
        'cluster_count',
        'data_count',
        'cost',
        'status',
        'model_version',
        'error_message',
        'completed_at',
    ];

    protected $casts = [
        'cost' => 'float',
        'cluster_count' => 'integer',
        'data_count' => 'integer',
        'completed_at' => 'datetime',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assignments(): HasMany
    {
        return $this->hasMany(ClusterAssignment::class, 'cluster_run_id');
    }
}
