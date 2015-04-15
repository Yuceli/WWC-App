<?php 

/**
* Workshops Controller
*/
class WorkshopsController extends Controller {
	
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
		$workshops = Workshop::all();
		// var_dump($workshops); exit;
		View::make('workshops.list', 'default', array(
			'workshops' => $workshops
		));
	}

	public function show($id = false)
	{
     $workshops = Workshop::find($id);
		View::make('workshops.show', 'default', array(
			'workshops' => $workshops
		));
	}

	public function add()
	{
		View::make('workshops.add');
	}

	public function edit($workshops_id)
	{
		$workshops = Workshop::find($workshops_id);
		View::make('workshops.edit', 'default', array(
			'workshops' => $workshops
		));
	}

	public function store()
	{
		$workshops = Workshop::create(
			array(
				'title' => $_REQUEST['title'],
				'description'  => $_REQUEST['description'],
				'begin_date'     => $_REQUEST['begin_date'],
				'end_date'  => sha1($_REQUEST['end_date']),
				'role'      => $_REQUEST['role']
				)
			);
		Redirect::to();
	}

	public function update($workshops_id)
	{
		$workshops = Workshop::find($workshops_id);

		$workshops->title = $_REQUEST['title'];
		$workshops->description = $_REQUEST['description'];
		$workshops->begin_date  = $_REQUEST['begin_date'];
		$workshops->end_date = sha1($_REQUEST['end_date']);

		$user->save();

		Redirect::to();
	}

	public function delete($workshops_id)
	{
		$workshops = Workshop::find($workshops_id);
		$workshops->delete();
		Redirect::to();
	}
	
}