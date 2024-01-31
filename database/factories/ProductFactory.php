<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cover = fake()->randomElement([
            'https://cdn.learnku.com/uploads/images/201806/01/5320/7kG1HekGK6.jpg',
            'https://cdn.learnku.com/uploads/images/201806/01/5320/1B3n0ATKrn.jpg',
            'https://cdn.learnku.com/uploads/images/201806/01/5320/r3BNRe4zXG.jpg',
            'https://cdn.learnku.com/uploads/images/201806/01/5320/C0bVuKB2nt.jpg',
            'https://cdn.learnku.com/uploads/images/201806/01/5320/82Wf2sg8gM.jpg',
            'https://cdn.learnku.com/uploads/images/201806/01/5320/nIvBAQO5Pj.jpg',
            'https://cdn.learnku.com/uploads/images/201806/01/5320/XrtIwzrxj7.jpg',
            'https://cdn.learnku.com/uploads/images/201806/01/5320/uYEHCJ1oRp.jpg',
            'https://cdn.learnku.com/uploads/images/201806/01/5320/2JMRaFwRpo.jpg',
            'https://cdn.learnku.com/uploads/images/201806/01/5320/pa7DrV43Mw.jpg',
        ]);
        $category_id = fake()->randomElement(Category::where('level', '<>', 1)->pluck('id')->toArray());
        return [
            'category_id' => $category_id,
            'name' => fake()->word(),
            'description' => fake()->sentence(),
            'cover' => $cover,
            'price' => 0,
            'sold_count' => 0,
            'is_on_sale' => true,
        ];
    }
}
