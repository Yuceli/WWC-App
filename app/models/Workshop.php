<?php 

/**
* Workshop Model Class
*/
class Workshop extends Model implements Authenticable {
	
	protected $fillable = ['id', 'title', 'description', 'begin_date', 'end_date'];
	public $table = "workshops";
}