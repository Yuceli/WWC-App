<?php 

/**
* Users Controller
*/
class UsersController extends Controller {
	
	protected $accessControl = [
		'index'  => ['*'],
		'add'    => ['admin'],
		'edit'   => ['admin'],
		'store'  => ['admin'],
		'update' => ['admin'],
		'delete' => ['admin'],
        'show'   => ['*']
 	];

	public function index()
	{
		$users = User::all();
		View::make('users.list', 'default', array(
			'users' => $users
		));
	}

	public function show($id = false)
	{
        $u = User::find($id);
		View::make('users.show', 'default', array(
			'user' => $u
		));
	}

	public function add()
	{
		View::make('users.add');
	}

	public function edit($user_id)
	{
		$u = User::find($user_id);
		View::make('users.edit', 'default', array(
			'user' => $u
		));
	}

	public function store()
	{
		$user = User::create(
			array(
				'firstName' => $_REQUEST['firstName'],
				'lastName'  => $_REQUEST['lastName'],
				'email'     => $_REQUEST['email'],
				'password'  => sha1($_REQUEST['password']),
                'role'      => $_REQUEST['role']
				)
			);
		Redirect::to();
	}

	public function update($user_id)
	{
		$user = User::find($user_id);

		$user->firstName = $_REQUEST['firstName'];
		$user->lastName  = $_REQUEST['lastName'];
		$user->email     = $_REQUEST['email'];
		//$user->password  = sha1($_REQUEST['password']);

		$user->save();

		Redirect::to();
	}

	public function delete($user_id)
	{
		$user = User::find($user_id);
		$user->delete();
		Redirect::to();
	}
	
}