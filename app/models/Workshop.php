<?php 

/**
* Workshop Model Class
*/
class Workshop extends Model {
	
	protected $fillable = ['title', 'description', 'begin_date', 'end_date'];
	public $table = "workshops";
}