<?php

include_once '../common/inc/init.inc';

if ($user->isAuthorized('intervenant')) {

  $currentWeek = $nextWeek = false;
  $weekNb = date('W', time());
  $yearNb = date('Y', time());

  $indisponibilities = UserPrivilege::get_Meta($user->id, 'intervenant');
  if ($indisponibilities != null) {
    foreach ($indisponibilities as $indisponibilitie) {
      if ($indisponibilitie == $yearNb . '-' . $weekNb) {
        $currentWeek = true;
      }
      if ($indisponibilitie == ($yearNb + 1) . '-' . $weekNb) {
        $nextWeek = true;
      }
    }
  }
  $psessions = Session::find('all', array('conditions' => array('user_id' => $user->id), 'order' => 'start desc'));

  if (isset($_GET['session_id'])) {
    $session = Session::find($_GET['session_id']);
    $pUsers = $session->find_participed_users();
  }else
    $sessions = $user->getSessions();
}



if ($user->isAuthorized('user')) {

  $currentWeek = $nextWeek = false;
  $weekNb = date('W', time());
  $yearNb = date('Y', time());

  $indisponibilities = UserPrivilege::get_Meta($user->id, 'user');
  if ($indisponibilities != null) {
    foreach ($indisponibilities as $indisponibilitie) {
      if ($indisponibilitie == $yearNb . '-' . $weekNb) {
        $currentWeek = true;
      }
      if ($indisponibilitie == ($yearNb + 1) . '-' . $weekNb) {
        $nextWeek = true;
      }
    }
  }
  if (isset($_GET['session_id'])) {
    $session = Session::find($_GET['session_id']);
    $pUsers = $session->find_participed_users();
  }else
    $sessions = $user->getSessions();
}
?>
