<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Request extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'name',
        'status',
        'description',
        'vote_count',
        'paused',
        'user_id',
    ];

    protected $casts = [
        'status' => Status::class,
        'paused' => 'boolean',
    ];
}
