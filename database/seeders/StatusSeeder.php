<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            'draft', 'published'
        ];

        foreach ($statuses as $status){
            \App\Models\Status::factory()->create([
                'name'=>\Str::title($status),
                'type'=>'general'
            ]);
        }
    }
}
