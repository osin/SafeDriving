<?php
class UserSession extends ActiveRecord\Model {
  static $belongs_to = array(
    array('session'),
    array('user'));

  static $validates_presence_of = array(
		array('user_id'),
    array('session_id'));
}

?>
