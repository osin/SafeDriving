<?php
class UserPrivilege extends ActiveRecord\Model {
  static $belongs_to = array(
    array('privilege'),
    array('user'));

  static $validates_presence_of = array(
		array('user_id'),
    array('privilege_id'));

  static function get_Meta($user_id, $roleLabel){
    try{
      $userPrivilege = UserPrivilege::find('all', array('conditions' =>
                   array('user_id' => $user_id,
                   'privilege_id' => Privilege::find_by_label($roleLabel)->id)));
      if ($userPrivilege[0]->meta != null) {
        $indisponibilities = explode(',', $userPrivilege[0]->meta);
        return $indisponibilities;
      }
      else return;
    }catch(Exception $e){
      return $e->getTraceAsString();
    }
  }

}
?>
