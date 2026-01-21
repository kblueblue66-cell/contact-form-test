<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // カテゴリを先に作る
        $this->call(CategorySeeder::class);

        //お問い合わせデータを35件
        \App\Models\Contact::factory(35)->create();
    }
}
