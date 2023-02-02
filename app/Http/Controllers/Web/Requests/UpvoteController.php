<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Requests;

use App\Aggregates\RequestAggregate;
use App\Models\Request as RequestModel;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

final readonly class UpvoteController
{
    public function __construct(
        private Authenticatable $user,
    ) {}

    public function __invoke(Request $request, RequestModel $model): RedirectResponse
    {
        RequestAggregate::retrieve(
            uuid: Str::uuid()->toString(),
        )->registerUpvote(
            user: strval($this->user->getAuthIdentifier()),
            request: strval($model->getKey()),
        )->persist();

        return redirect()->back();
    }
}
