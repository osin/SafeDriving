<?php

class Circuit extends ActiveRecord\Model
{
  static $validates_presence_of = array(
      array('center_id'));
}

?>
