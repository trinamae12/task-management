<?php

namespace App\Models;

use App\Policies\TaskPolicy;
use App\TaskStatus;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[UsePolicy(TaskPolicy::class)]
class Task extends Model
{
    use SoftDeletes;

    protected $casts = [
        'status' => TaskStatus::class,
    ];

    protected $fillable = [
        "label",
        "description",
        "status",
        "user_id"
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
