<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Drink;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userId  = User::pluck('id')->all();
        $drinkId  = Drink::pluck('id')->all();

        return [
            'body' => $this->faker->text,
            'user_id' => $this->faker->randomElement($userId),
            'drink_id' => $this->faker->randomElement($drinkId),
        ];
    }
}
