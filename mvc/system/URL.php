<?php

/**
* URL class for build urls
* @author Arandi López <arandilopez.github.io>
*/
class URL {
    
    /**
     * Create an URL based on BASE_URL global
     * @param  string $route route in format as: controller.method[.params]
     * @return string        router in format as: http://example.com/controller/method[/params]
     */
    public static function to($route=false)
    {
        $config = Config::getInstance();
        if ($route) {
            $url_path = str_replace(".", "/", $route);
            return $config->get('base_url').$url_path;
        }
        else
        {
            return $config->get('base_url');
        }
    }
}