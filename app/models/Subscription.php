<?php 

/**
* Subscription Model Class
*/
class Subscription extends Model implements Authenticable {
	
	protected $fillable = ['user_id', 'workshop_id', 'inscription_date'];
	public $table = "users_workshops";
}