<?php

class CakeEntity{
	public $id;
	public $type;
	public $name;
	public $price;
	public $text;
	public $img;
	
	function __construct($id, $type, $name, $price, $text, $img){
		$this->id = $id;
		$this->type = $type;
		$this->name = $name;
		$this->price = $price;
		$this->text = $text;
		$this->img = $img;
	}
}