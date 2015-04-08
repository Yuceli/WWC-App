<?php 

/**
* View builder helper
* @author Arandi López <arandilopez.93@gmail.com>
*/

class View {

    public static function make($view = false, $layout = 'default', $data = false)
    {
        $viewPath = str_replace(".", "/", $view);
        $config = Config::getInstance();
        if(file_exists($config->get('app')."views/$viewPath.php")) {
            $view = $config->get('app')."views/$viewPath.php";
            $lay = $config->get('app')."views/layouts/$layout.php";
            self::show($view, $lay, $data);
        } else {
            throw new Exception("View not found: $view => $viewPath"); 
        }
    }

    private static function show($view, $layout, $data)
    {
        if (is_array($data)) 
        {
            foreach ($data as $variable => $value) 
            {
               $$variable = $value;
            }
        }

        include $layout;
        unset($data);
        unset($view);
        unset($layout);
    }

    public static function error($error)
    {
        $config = Config::getInstance();
        $view = $config->get('app')."views/errors/$error.php";
        $layout = $config->get('app')."views/layouts/error.php";
        Asset::addCss('error', 'error');
        if (file_exists($view)) {
            http_response_code($error);
            include $layout;
        } else {
            throw new Exception("View not found $error");
        }
    }
}