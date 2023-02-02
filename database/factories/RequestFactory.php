<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\Status;
use App\Models\Request;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

final class RequestFactory extends Factory
{
    protected $model = Request::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
            'status' => Arr::random(Status::cases()),
            'description' => $this->faker->paragraph(),
            'vote_count' => $this->faker->numberBetween(
                0,
                1_000,
            ),
            'paused' => $this->faker->boolean(),
            'user_id' => User::factory(),
        ];
    }
}
