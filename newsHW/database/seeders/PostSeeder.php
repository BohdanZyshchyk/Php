<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'C# 9.0. Що нового?',
            'url' => 'My program language',
            'description' => 'Для крутих козаків !!!',
            'description_short' => 'Для крутих козаків',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_published' => true,
            'id_category' => 1
        ]);

        DB::table('posts')->insert([
            'title' => 'Як приготувати салат Цезар',
            'url' => 'Холодні страви',
            'description' => 'Готується з різних овочів та фруктів !!!',
            'description_short' => 'Готується з різних овочів та фруктів. ',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_published' => true,
            'id_category' => 2
        ]);

        DB::table('posts')->insert([
            'title' => 'Торт спартак, Новий рецепт.',
            'url' => 'Кондитерський вироби',
            'description' => 'Солодкі вироби',
            'description_short' => 'Солодкі вироби',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'is_published' => false,
            'id_category' => 3
        ]);
    }
}
