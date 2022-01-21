<?php

namespace Database\Seeders;

use App\Helpers\LoadRouterHelper;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LoadRouterHelper::save();
    }
}
