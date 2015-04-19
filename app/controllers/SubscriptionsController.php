<?php 

/**
* Subscriptions Controller
*/
class SubscriptionsController extends Controller {
	
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
		$subscriptions = Subscription::all();
		View::make('subscriptions.list', 'default', array(
			'subscriptions' => $subscriptions
		));
	}

	public function show($id = false)
	{
        $u = Subscription::find($id);
		View::make('subscriptions.show', 'default', array(
			'subscription' => $u
		));
	}

	public function add()
	{
		View::make('subscriptions.add');
	}

	public function edit($subscription_id)
	{
		//TODO...
	}

	public function store($user_id, $workshop_id)
	{
		$subscription = Subscription::create(
			array(
				'user_id' => $user_id,
				'workshop_id'  => $workshop_id,
				'inscription_date'     => date('Y-m-d H:i:s'),
				)
			);
		Redirect::to('subscriptions');
	}

	public function update($subscription_id)
	{
		// TODO...
	}

	public function delete($subscription_id)
	{
		$subscription = Subscription::find($subscription_id);
		$subscription->delete();
		Redirect::to('subscriptions');
	}
	
}