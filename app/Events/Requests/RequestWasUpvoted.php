<?php

declare(strict_types=1);

namespace App\Events\Requests;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

final class RequestWasUpvoted extends ShouldBeStored
{
    public function __construct(
        public readonly string $user,
        public readonly string $request,
    ) {}
}
