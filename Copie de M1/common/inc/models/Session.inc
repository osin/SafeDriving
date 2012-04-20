<?php

class Session extends ActiveRecord\Model {

  static $validates_presence_of = array(
      array('user_id'));

  function find_participed_users() {
    $userSessions = UserSession::find('all', array('conditions' => array('session_id' => $this->id)));
    if (count($userSessions) > 0) {
      $pUsers = Array();
      foreach ($userSessions as $userSession) {
        $pUser = User::find($userSession->user_id);
        array_push($pUsers, $pUser);
      }
      return $pUsers;
    }
    else
      return;
  }

}

?>
