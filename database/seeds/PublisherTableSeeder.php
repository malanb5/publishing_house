<?php

use Illuminate\Database\Seeder;
use App\Models\Publisher;

class PublisherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Publisher::truncate();
        factory(Publisher::class, 10)->create();
    }
}
