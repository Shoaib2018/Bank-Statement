<?php  
namespace App\Repository\Eloquent;

use App\Models\Accounts;
use App\Repository\Interfaces\IAccountRepository;
use Illuminate\Support\Facades\Hash;

class AccountRepository implements IAccountRepository
{   
    protected $account = null;

    public function login($account, $password)
    {
        $account = Accounts::where('bank_account', '=', $account, 'and')->where('password', '=' , $password)->first();
        if( $account ){
            return $account;
        } else {
            return false;
        }
    }

    /* 
	public function getAllUsers()
    {
        return User::all();
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    public function createOrUpdate( $id = null, $collection = [] )
    {   
        if(is_null($id)) {
            $user = new User;
            $user->name = $collection['name'];
            $user->account = $collection['account'];
            $user->password = Hash::make('password');
            return $user->save();
        }
        $user = User::find($id);
        $user->name = $collection['name'];
        $user->account = $collection['account'];
        return $user->save();
    }
    
    public function deleteUser($id)
    {
        return User::find($id)->delete();
    }
    */ 
}
?>