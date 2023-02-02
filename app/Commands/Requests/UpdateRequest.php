<?php

declare(strict_types=1);

namespace App\Commands\Requests;

use App\Contracts\Commands\Requests\UpdateRequestContract;
use App\Http\DataObject\NewRequest;
use App\Models\Request;
use Illuminate\Support\Facades\DB;

final class UpdateRequest implements UpdateRequestContract
{
    public function handle(NewRequest $payload, string $id): bool
    {
        $request = Request::query()->findOrFail(
            id: $id,
        );

        return DB::transaction(
            callback: static fn (): bool => (bool) $request->update($payload->toArray()),
        );
    }
}
