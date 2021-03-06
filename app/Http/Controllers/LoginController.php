<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Interfaces\IAccountRepository;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public $accountRepo;

	public function __construct(IAccountRepository $account) {
        $this->accountRepo = $account;
    }

    public function index()
    {
        return view('login/index');
    }

    public function login(Request $req)
    {
        $account = $this->accountRepo->login($req->account, $req->password);

        if (isset($account) && isset($account->id)) {
            return redirect()->route('statement');
        } else {
            return redirect()->route('login');
        }
    }
}
