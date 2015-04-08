<?php

class SessionController extends Controller {

    protected $accessControl = [
        'login'   => ['*'],
        'doLogin' => ['*'],
        'logout'  => ['*']
    ];

    public function login()
    {
        if(Auth::check()){
            Redirect::to();
        }
        Asset::addCss('login', 'signin');
        View::make('session.login','sessionlayout', false);
    }

    public function doLogin()
    {
        $email = $_REQUEST['email'];
        $pass = $_REQUEST['password'];
        if (Auth::authenticate(array('email' => $email, 'password' => $pass)))
            Redirect::to();
    }

    public function logout()
    {
        Auth::logout();
        Redirect::to('session/login');
    }
}