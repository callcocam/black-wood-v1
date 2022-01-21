<?php

namespace Database\Seeders;

use App\Models\Auth\Acl\Role;
use App\Models\User;
use App\Models\UserLandlord;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(50)->create();

        $users = User::query()->get();
        $domain =request()->getHost();
         if(request()->getHost() == "localhost"){
            $domain = "sigasmart.com.br";
         }
        //Super Admin
        $roleSuper = Role::factory()->create([
            'name' => "Super Admin", 'slug' => "super-admin", 'description' => "Poderá fazer tudo no sistema", 'special' => "all-access"
        ]);
        $mail = sprintf("super-admin@%s", $domain);
        $userSuper = User::factory()->create([
            'name' => "Super Admin", 'email' => $mail
        ]);
        $userSuper->roles()->sync($roleSuper->id->toString());

        //Admin geral
        $roleAdmin = Role::factory()->create([
            'name' => "Administrador Do Sistema", 'slug' => "administrador-sistema", 'description' => "Poderá fazer tudo menos as configurações de roles and permissions;", 'special' => 'no-defined'
        ]);
        $mail = sprintf("admin@%s", $domain);
        $userAdmin = User::factory()->create([
            'name' => "Administrador", 'email' => $mail
        ]);
        $userAdmin->roles()->sync($roleAdmin->id->toString());

          // Fornecedor
        $roleFornecedor = Role::factory()->create([
            'name' => "Fornecedor", 'slug' => "fornecedor ", 'description' => "Apenas cadastrar os produtos e serviços no formulário", 'special' => 'no-defined'
        ]);
        $mail = sprintf("fornecedor@%s", $domain);
        $Fornecedor = User::factory()->create([
            'name' => "Fornecedor", 'email' => $mail
        ]);
        $Fornecedor->roles()->sync($roleFornecedor->id->toString());

        // Cliente
        $roleClient = Role::factory()->create([
            'name' => "Client", 'slug' => "client", 'description' => "Apenas acessar o sistema com as permissões pre adicionadas", 'special' => 'no-defined'
        ]);
        $mail = sprintf("client@%s", $domain);
        $client = User::factory()->create([
            'name' => "Client", 'email' => $mail
        ]);
        $client->roles()->sync($roleClient->id->toString());

        foreach($users as $user){
            $case = rand(1,12);
            switch($case):
                case 1:
                case 2:
                case 3:
                    $user->roles()->sync($roleFornecedor->id->toString());
                    break;
                default:
                    $user->roles()->sync($roleClient->id->toString());
                    break;
                endswitch;
        }

    }
}
