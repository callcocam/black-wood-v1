<?php

namespace Database\Factories\Auth\Acl;

use App\Models\Auth\Acl\Permission;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

class PermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Permission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            "status_id"=>Status::all()->random()->id
        ];
    }
}
