<?php 

/**
* URL Manager
* @author Arandi López <arandilopez.github.io>
*/		
class URLManager {
	
	public function begin()
	{
        $config = Config::getInstance();
        $request    = trim($_SERVER['REQUEST_URI'], '/');
        $request    = urldecode($request);
        $request    = preg_replace("/\/*".$config->get('app_base')."\/*/", "", $request);
        $datas      = explode('/', $request);
        $controller = isset($datas[0]) ? $datas[0] : false;
        $action     = isset($datas[1]) ? $datas[1] : false;
        $data       = array_slice($datas, 2);
        $this->execute($controller, $action, $data);
    }

    private function execute($controller = false, $method = false, $params = false)
    {

        $config = Config::getInstance();
        $controller = (!$controller and empty($controller)) ? $config->get('default_controller') : $controller;
        $currentController = ucfirst($controller)."Controller";
        $currentControllerFile = $config->get('app')."controllers/$currentController.php";
        if (file_exists($currentControllerFile)) {
            $controllerObject = new $currentController();
            if($method) {
                if(method_exists($controllerObject, $method)) {
                    //call_user_func_array(array($controllerObject, $method), $params);

                    $controllerObject->runAction($method, $this->getRole(), $params);
                }else
                {
                    View::error(404);
                }
            }else{
                $defMethod = $config->get('default_method');
                //$controllerObject->$defMethod();
                $controllerObject->runAction($defMethod, $this->getRole(), $params);
            }
        }
        else
        {
            View::error(404);
        }
    }

    private function getRole()
    {
        if(!is_null(Auth::getUser()))
            $role = Auth::getUser()->role;
        else
            $role = '*';
        return $role;
    }
}