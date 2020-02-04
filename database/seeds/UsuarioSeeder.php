<?php


use Illuminate\Database\Seeder;
use App\User;


class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados =[
            'name' => "Samuel",
            'email'=> "samueltaira@hotmail.com",
            'password' => bcrypt("teste123"),
            'admin' => "sim",

        ];
        $dados2 =[
            'name' => "Diego Gonçalves",
            'email'=> "diego.ggoncalves@telefonica.com",
            'password' => bcrypt("vivo15vivo15"),
            'admin' => "sim",

        ];

        if(User::where('email', '=', $dados['email']) -> count()){

            $usuario = User::where('email', '=', $dados['email'])->first();
            $usuario-> update($dados);
            echo "Usuario alterado!";

        }else{

            User::create($dados);
            User::create($dados2);

            echo "OK!";

        }
    }
}
