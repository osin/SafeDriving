<?php

class User extends ActiveRecord\Model {

  static $validates_presence_of = array(
      array('username'), array('email'), array('wordpress_id'));
  static $has_many = array(
      array('userprivileges'),
      array('privileges', 'throught' => 'userprivileges'));

  function getPrivileges() {
    $privileges_id = UserPrivilege::find('all', array('conditions' => array('user_id' => $this->id)));
    $privileges = Array();
    foreach ($privileges_id as $privilege_id)
      array_push($privileges, Privilege::find($privilege_id->privilege_id));
    return $privileges;
    print_r($privileges);
  }

  function getSessions() {
    $sessions_id = UserSession::find('all', array('conditions' => array('user_id' => $this->id)));
    if (count($sessions_id) == 0) {
      return;
    }
    $sessions = Array();
    foreach ($sessions_id as $session_id)
      array_push($sessions, Session::find($session_id->session_id));
    return $sessions;
  }

  function getMark($session_id){
    $container = UserSession::find('all', array('conditions' => array('user_id' => $this->id, 'session_id' => $session_id)));
    return $container[0]->mark;
  }

  function getComment($session_id){
    $container = UserSession::find('all', array('conditions' => array('user_id' => $this->id, 'session_id' => $session_id)));
    return $container[0]->comment;
  }

  function isAuthorized($role) {
    $privileges = $this->getPrivileges();
    foreach ($privileges as $privilege) {
      if (strtolower($privilege->label) == strtolower($role)) {
        return true;
      }
    }
    return false;
  }

  static function find_by_role($roleLabel) {
    $privilegeAsked = Privilege::find_by_label($roleLabel);
    $pUsersID = UserPrivilege::find('all', array('conditions' => array('privilege_id' => $privilegeAsked->id)));
    if (count($pUsersID) > 0) {
      $pUsers = array();
      foreach ($pUsersID as $pUserID) {
        array_push($pUsers, User::find($pUserID->user_id));
      }
      return $pUsers;
    }
    return;
  }
}

?>
