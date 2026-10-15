<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClusterAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'cluster_run_id',
        'umkm_id',
        'cluster_label',
    ];

    public function run(): BelongsTo
    {
        return $this->belongsTo(ClusterRun::class, 'cluster_run_id');
    }

    public function umkm(): BelongsTo
    {
        return $this->belongsTo(Umkm::class, 'umkm_id');
    }
}
