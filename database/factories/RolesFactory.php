<?php

namespace Database\Factories;

use App\Models\Roles;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RolesFactory extends Factory
{
    protected $model = Roles::class;

    public function definition(): array
    {
        return [
           'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'guard_name' => $this->faker->name(),
            'name' => $this->faker->name(),
        ];
    }
}
