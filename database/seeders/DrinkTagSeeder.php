<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Drink;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class DrinkTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 400; $i++) {
            $drinkIds = DB::table('drinks')->pluck('id');
            $tagIds = DB::table('tags')->pluck('id');
            DB::table('drink_tag')->insert([
                'drink_id' => $drinkIds->random(),
                'tag_id' => $tagIds->random()
            ]);
        }
    }
}
