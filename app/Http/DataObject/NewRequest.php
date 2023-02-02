<?php

declare(strict_types=1);

namespace App\Http\DataObject;

use App\Enums\Status;
use JustSteveKing\DataObjects\Contracts\DataObjectContract;

final readonly class NewRequest implements DataObjectContract
{
    public function __construct(
        public string $name,
        public Status $status,
        public string $description,
    ) {}

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'status' => $this->status,
            'description' => $this->description,
        ];
    }
}
