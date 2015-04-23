<?php 

/**
* User Model Class
*/
class User extends Model implements Authenticable {
	
	protected $fillable = ['firstName', 'lastName', 'email', 'password', 'role'];

	public $table = "users";
}