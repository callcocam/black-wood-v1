<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Storage::deleteDirectory('posts');
        // Storage::deleteDirectory('sliders');
        // Storage::makeDirectory('posts');
        // Storage::makeDirectory('sliders');
         $this->call(StatusSeeder::class);
         $this->call(RoleSeeder::class);
         $this->call(TenantSeeder::class);
        // $this->call(SlideSeeder::class);
        // $this->call(PostSeeder::class);
        // $this->call(EventSeeder::class);
        // $this->call(SponsorSeeder::class);
    }
}
