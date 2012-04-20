<?php

include_once '../common/inc/init.inc';
if (!$user->isAuthorized('intervenant'))
  header("location:/M1/");

if (isset($_POST['week'])) {

  $weekNb = date('W', time());
  $yearNb = date('Y', time());
  $yearNb += $_POST['week'] == 'currentWeek' ? 0 : 1;
  $weekNb += $_POST['week'] == 'currentWeek' ? 0 : 1;

  $newsindisponibilities = Array();
  $metas = UserPrivilege::get_Meta($user->id, 'intervenant');

  $userPrivilege = UserPrivilege::find('all', array('conditions' =>
              array('user_id' => $user->id,
                  'privilege_id' => Privilege::find_by_label('intervenant')->id)));

  if ($_POST['value'] == 1) {
    if ($metas != null) {
      foreach ($metas as $indisponibilitie) {
        if ($indisponibilitie != $yearNb . '-' . $weekNb) {
          array_push($newsindisponibilities, $indisponibilitie);
        }
      }
    }
  }
  if ($_POST['value'] == 0) {
    if ($userPrivilege[0]->meta != null) {
      foreach ($metas as $indisponibilitie) {
        if ($indisponibilitie != $yearNb . '-' . $weekNb) {
          array_push($newsindisponibilities, $indisponibilitie);
        }
      }
      if (!@preg_match($yearNb . '-' . $weekNb, $newsindisponibilities)) {
        array_push($newsindisponibilities, $yearNb . '-' . $weekNb);
      }
    }else
      array_push($newsindisponibilities, $yearNb . '-' . $weekNb);
  }
}

$meta = implode(',', $newsindisponibilities);
$userPrivilege[0]->meta = $meta;
$userPrivilege[0]->save();
?>
