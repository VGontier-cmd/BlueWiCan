<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\CanData;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CanData>
 */
class CanDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model
     */
    protected $model = CanData::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'given_id' => Str::random(10),
            'data' => Str::random(20),
            'length' => 10,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];
    }
}
