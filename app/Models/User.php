<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "users";

    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable = ['name', 'email'];

    /*
     * Função para inserir os dados do usuário no banco de dados
     *
     * Recebe: Array com dados do usuário
     * Retorna: Uma instância do usuário recém registrado
     */

    public function insertUser(array $userData)
    {

        $user = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
        ]);

        return $user;

    }

    public function userAddress()
    {
        return $this->hasOne(UserAddress::class);
    }

}
