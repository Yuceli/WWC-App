<?php 

/**
* Web Application Container
*/
class WebApplication extends Singleton {
	
	function __construct()
	{
		$this->config = Config::getInstance();
		$this->urlManager = new URLManager();
		session_name('sid');
		session_start();
	}

	public function start()
	{
		$this->urlManager->begin();
	}
}