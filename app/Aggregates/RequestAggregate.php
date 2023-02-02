<?php

declare(strict_types=1);

namespace App\Aggregates;

use App\Events\Requests\RequestWasUpvoted;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

final class RequestAggregate extends AggregateRoot
{
    public function registerUpvote(string $user, string $request): RequestAggregate
    {
        $this->recordThat(
            domainEvent: new RequestWasUpvoted(
                user: $user,
                request: $request,
            ),
        );

        return $this;
    }
}
