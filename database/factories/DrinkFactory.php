<?php

namespace Database\Factories;

use App\Models\Drink;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DrinkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Drink::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userId  = User::pluck('id')->all();
        $score = ['1','2','3','4','5'];
        return [
            'name' => $this->faker->word,
            'user_id' => $this->faker->randomElement($userId),
            'review' => $this->faker->text,
            'prefecture' => $this->faker->city,
            'place' => $this->faker->word,
            'map_url' => $this->faker->url,
            'image' => "https://1.bp.blogspot.com/-BnPjHnaxR8Q/YEGP_e4vImI/AAAAAAABdco/2i7s2jl14xUhqtxlR2P3JIsFz76EDZv3gCNcBGAsYHQ/s400/buranko_boy_smile.png",
            'price' => $this->faker->randomNumber($nbDigits = 3),
            'score' =>  $this->faker->randomElement($score),
        ];
    }
}
