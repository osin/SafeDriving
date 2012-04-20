<?php

class WP_User extends ActiveRecord\Model{
  static $validates_presence_of = array(
		array('user_login'), array('user_email'), array('wordpress_id'));
}

?>
