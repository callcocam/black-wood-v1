<?php

namespace Database\Factories\Auth\Acl;


use App\Models\Auth\Acl\Role;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Uuid;

class RoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Uuid::uuid4(),
            "status_id"=>Status::all()->random()->id
        ];
    }
}
