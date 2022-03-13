<?php  
namespace App\Repository\Interfaces;

interface IAccountRepository 
{
    //public function getAllUsers();

    //public function getUserById($id);

    public function login($account, $password);

    //public function createOrUpdate( $id = null, $collection = [] );

    //public function deleteUser($id);
}
?>