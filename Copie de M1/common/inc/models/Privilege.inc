<?php
class Privilege extends ActiveRecord\Model{

  static $validates_presence_of = array(
		array('label'));

  static $has_many = array(
    array('users'));
}

?>
