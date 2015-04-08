<?php 

/**
* Auth 
*/
class Auth {

	public static function check()
	{
		return (Session::read('user.id')) ? true : false;
	}

	public static function authenticate(array $credentials)
	{
		$loggeableClass = Config::getInstance()->getInstance()->get('model');
		$user = $loggeableClass::findBy('email', array($credentials['email']));
		if($user->password === sha1($credentials['password'])){
			Session::write('user.email', $user->email);
			Session::write('user.id', $user->id);
            Session::write('user.role', $user->role);
			return true;
		}else{
			throw new Exception('Bad credentials');
		}
	}

	public static function logout()
	{
		session_destroy();
	}

    public static function getUser()
    {
        $loggeableClass = Config::getInstance()->getInstance()->get('model');
        if ($id = Session::read('user.id')){
            $user = $loggeableClass::find($id);
            return $user;
        }else{
            return null;
        }
    }

}