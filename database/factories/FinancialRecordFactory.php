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

        $user_ids = User::pluck('id')->toArray();
        $user_id_rand = $user_ids[array_rand($user_ids)];

        $category_ids = Category::pluck('id')->toArray();
        $category_id_rand = $category_ids[array_rand($category_ids)];

        return [
            'user_id' => $user_id_rand,
            'income' => $income,
            'expenditure' => $expenditure,
            'balance' => $income - $expenditure,
            'category_id' => $category_id_rand
        ];
    }
}
