<?php 

/**
 * App Configuration array.
 */

return array(

	/**
	 * Application configs
	 */
	
	// Relace with your app url, ie: http://myapp.com
	'base_url'           => 'http://localhost/mvcito/',
	// Replace with the main controller to show in root path
	'default_controller' => 'users',
	// Replace with the main controller method to show in root path
	'default_method'     => 'index',


	/**
	 * Application paths
	 * Don't change them
	 */
	'app_path' => dirname(dirname(__DIR__)).'/',
	'app_base' => basename(dirname(dirname(__DIR__))),
	'app'      => dirname(__DIR__).'/',

	/**
	 * Authentication configs
	 */
	// Replace with the class you want to manage your users
	'model' => 'User',

	/**
	 * CSV data file
	 * @deprecated don't use this
	 */
	'csv_path' => dirname(dirname(__DIR__)).'/tmp/data.csv'
);