<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Tenant::query()->delete();
        $host = \Str::replace("www.",'',request()->getHost());
        \App\Models\Tenant::factory()->create([
            'name'=> 'Base',
            'domain'=> $host,
            'database'=>'siga_v1',
            'prefix'=>'landlord',
            'middleware'=>'landlord',
            'provider'=>'mysql',
        ]);
    }
}
