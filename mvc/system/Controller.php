<?php 

/**
* Controller class
*/
abstract class Controller {
	
	protected $accessControl = [];

	public function runAction($action, $entity, $params)
	{
		if (array_key_exists($action, $this->accessControl)) {
			$permissions = $this->accessControl[$action];

			if (in_array($entity, $permissions) or in_array('*', $permissions)) {
				//$this->$action($params);
                call_user_func_array(array($this, $action), $params);
			}else{
				// View::(403);
				//throw new Exception("You are not allowed to do this");
                Redirect::to('session/login');
			}

		}else{
			// View::error(404);
			throw new Exception("No method $action found");
		}
	}
	
}