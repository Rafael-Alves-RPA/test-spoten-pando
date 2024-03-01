<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Banner>
 */
class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $image = fake()->image(
            dir: public_path('banner'),
            width: 250,
            height: 200,
        );
        $imageName = basename($image);

        File::move('banner', $image);

        return [
            'description' => fake()->name(),
            'banner' => $imageName,
        ];
    }
}
