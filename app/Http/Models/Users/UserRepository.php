<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 26/02/2018
 * Time: 20:49
 */

namespace App\Http\Models\Users;


class UserRepository
{
    public function getById($idUser){
        try{
            return User::query()->find($idUser);
        } catch (Exception $e){
            throw new Exception('Erro ao recuperar user do banco: ' . $e->getMessage());
        }
    }
}