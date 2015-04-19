<?php 

/**
* Subscription Model Class
*/
class Subscription extends Model implements Authenticable {
	
	protected $fillable = ['id', 'user_id', 'workshop_id', 'inscription_date'];
	public $table = "users_workshops";
}