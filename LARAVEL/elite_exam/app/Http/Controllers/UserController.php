<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Users;

class UserController extends Controller
{
    private $aRequest;
    public function __construct(Request $oRequest)
    {
        $this->aRequest = $oRequest->all();
    }

    public function registerUser()
    {
        $bUserExist = $this->checkUserNameIfExist();

        if ($bUserExist === true) {
            return array(
                'bResult' => false,
                'message' => 'Username already exist!'
            );
        }

        if (trim($this->aRequest['username']) === '' || trim($this->aRequest['password']) === '' || trim($this->aRequest['passwordrepeat']) === '') {
            return array(
                'bResult' => false,
                'message' => 'Input will not be empty'
            );
        }

        if (trim($this->aRequest['password']) !== trim($this->aRequest['passwordrepeat'])) {
            return array(
                'bResult' => false,
                'message' => 'Passwords are not equal!'
            );
        }

        $sHashedPassword = Hash::make($this->aRequest['password']);
        Users::create([
            'username' => $this->aRequest['username'],
            'password' => $sHashedPassword
        ]);

        return array(
            'bResult' => true
        );
    }

    private function checkUserNameIfExist()
    {
        $mUser = Users::where('username', trim($this->aRequest['username']))->first();
        return $mUser !== null;
    }
    /**
     * loginUser
     * used to validate the user's username and password
     */
    public function loginUser()
    {
        $mUser = Users::where('username', trim($this->aRequest['username']))->first();
        if ($mUser !== null) {
            $sStoredPassword = $mUser->password;
            if (Hash::check(trim($this->aRequest['password']), $sStoredPassword) === true) {
                session(['user_name' => $this->aRequest['username']]);
                return array(
                    'bResult' => true
                );
            }
            return array(
                'bResult' => false,
                'message' => 'Password is incorrect!'
            );
        }
        return array(
            'bResult' => false,
            'message' => 'Username does not exist!'
        );
    }

    public function logoutUser(Request $oRequest)
    {
        $oRequest->session()->forget('user_name');
        return array(
            'bResult' => true
        );
    }
}