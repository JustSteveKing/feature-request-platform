<?php

declare(strict_types=1);

namespace App\Commands\Requests;

use App\Contracts\Commands\Requests\CreateRequestContract;
use App\Http\DataObject\NewRequest;
use App\Models\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

final class CreateRequest implements CreateRequestContract
{
    public function handle(NewRequest $payload, string $user): Model
    {
        return DB::transaction(
            callback: static fn (): Model => Request::query()->create(
                attributes: [
                    ...$payload->toArray(),
                    'user_id' => $user,
                ]
            )
        );
    }
}
