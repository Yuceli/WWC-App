<?php 

/**
* User Model Class
*/
class User extends Model implements Authenticable {
	
	protected $fillable = ['id', 'firstName', 'lastName', 'email', 'password', 'role'];
}