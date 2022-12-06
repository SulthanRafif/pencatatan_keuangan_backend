<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FinancialRecord>
 */
class FinancialRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $income = $this->faker->numberBetween(100000, 500000);
        $expenditure = $this->faker->numberBetween(50000, 100000);

        return [
            'user_id' => $this->faker->numberBetween(1, User::count()),
            'income' => $income,
            'expenditure' => $expenditure,
            'balance' => $income - $expenditure,
            'category_id' => $this->faker->numberBetween(1, Category::count()),
        ];
    }
}
