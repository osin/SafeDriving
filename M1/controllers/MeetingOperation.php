<?php

include_once '../common/inc/init.inc';
$i = 0;
$type = $_POST['type'];
$id = isset($_POST['id']) ? $_POST['id'] : 0;
$start = isset($_POST['start']) ? $_POST['start'] : null;
$end = isset($_POST['end']) ? $_POST['end'] : null;
$name = isset($_POST['name']) ? $_POST['name'] : null;
$capacity = isset($_POST['capacity']) ? $_POST['capacity'] : 0;
$intervenant_id = isset($_POST['intervenant']) ? $_POST['intervenant'] : 0;
$description = isset($_POST['description']) ? $_POST['description'] : '';

switch ($type) {
  case 'save':
    if ($id != 0 && !Session::exists($id)) {
      if (!Session::exists(array('start' => $start, 'end' => $end)))
        $session = Session::create(array('name' => $name, 'description' => $description, 'circuit_id' => Circuit::find_by_center_id($user->center_id)->id, 'capacity' => $capacity, 'user_id' => $intervenant_id, 'start' => $start, 'end' => $end, ));
      $type=null;
      print 'Session créer';
    }
    break;
  case 'edit':
    if (Session::exists($id)) {
      $session = Session::find($id);
      $session->update_attributes(array('name' => $name, 'description' => $description, 'circuit_id' => Circuit::find_by_center_id($user->center_id)->id, 'capacity' => $capacity, 'user_id' => $intervenant_id, 'start' => $start, 'end' => $end, ));
      print 'Session editée';
      $type=null;
    }else
      print "Cette session n'est pas reconnu, ID invalide - ";
    break;
  case 'delete':
    if (Session::exists($id)) {
      $session = Session::find($id);
      $session->delete();
      $type=null;
      print "Supprimer";
    }
  default:
    break;
}
?>
