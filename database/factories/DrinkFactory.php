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
        $image = ['','https://media.nedigital.sg/fairprice/fpol/media/images/product/XL/90046492_XL1_20201116.jpg', 'https://us.coca-cola.com/content/dam/nagbrands/us/coke/en/home/coca-cola-original-20oz.png', 'https://www.yakult.co.jp/yakult1000/images/kv_image01_product.png', 'https://i.pinimg.com/originals/d1/6b/7a/d16b7a2553252183b8f49aaa2336fca0.jpg', 'https://www.kirishima.co.jp/assets/images/products/imo/kuro-kirishima-ex/img_lineup_02.png.pagespeed.ce._c4e3sbOJo.png',];

        $userId = User::pluck('id')->all();
        $score = ['1', '2', '3', '4', '5'];
        return [
            'name' => $this->faker->word,
            'user_id' => $this->faker->randomElement($userId),
            'review' => $this->faker->text,
            'prefecture' => $this->faker->prefecture,
            'place' => $this->faker->word,
            'map_url' => $this->faker->url,
            'image' => $this->faker->randomElement($image),
            'price' => $this->faker->randomNumber($nbDigits = 3),
            'score' => $this->faker->randomElement($score),
        ];
    }
}
