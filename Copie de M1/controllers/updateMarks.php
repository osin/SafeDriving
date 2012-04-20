<?php
  require_once '../common/inc/init.inc';

  if (isset($_POST['session_id'])){
    $session = Session::find($_POST['session_id']);
    $userSessions = UserSession::find('all', array('conditions' => array('session_id' => $session->id)));
    foreach ($userSessions as $userSession){
      if (isset($_POST[$userSession->user_id])) {
        $userSession->mark = $_POST[$userSession->user_id];
      }
      if (isset($_POST['comment'.$userSession->user_id])) {
        $userSession->comment = $_POST['comment'.$userSession->user_id];
      }
      $userSession->save();
    }
}
header("location:../office/assignNote.php?session_id=".$_POST['session_id']);
?>
