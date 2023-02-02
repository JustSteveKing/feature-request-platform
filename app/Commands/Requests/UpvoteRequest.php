<?php

declare(strict_types=1);

namespace App\Commands\Requests;

use App\Contracts\Commands\Requests\UpvoteRequestContract;
use App\Models\Request;
use Illuminate\Support\Facades\DB;

final class UpvoteRequest implements UpvoteRequestContract
{
    public function handle(string $user, Request $request): bool
    {
        $count = (int) $request->getAttribute('vote_count');

        return DB::transaction(
            callback: static fn (): bool => (bool) $request->update([
                'vote_count' => ++$count,
            ]),
        );
    }
}
