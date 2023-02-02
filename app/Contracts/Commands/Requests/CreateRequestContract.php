<?php

declare(strict_types=1);

namespace App\Contracts\Commands\Requests;

use App\Http\DataObject\NewRequest;
use Illuminate\Database\Eloquent\Model;

interface CreateRequestContract
{
    public function handle(NewRequest $payload, string $user): Model;
}
