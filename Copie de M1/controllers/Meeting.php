<?php
include_once '../common/inc/init.inc';
if (!$user->isAuthorized('direction'))
  header("location:/M1/");

$vehicles = Vehicle::find('all', array('conditions' => array('center_id' => $user->center_id)));

$sessions = Session::find('all', array('conditions' => array('circuit_id' => Circuit::find_by_center_id($user->center_id)->id)));
$intervenants = User::find_by_role('intervenant');
$events = '';
foreach ($sessions as $key => $session) {
  $events.= '{';
  $events.= '"id":' . $session->id . ','.chr(13);
  $events.= '"start": new Date('.substr($session->start->format( 'Y m d H i s' ), 0, 4) . ',' . (substr($session->start->format( 'Y m d H i s' ), 5, 2)-1) . ',' . substr($session->start->format( 'Y m d H i s' ), 8, 2) . ',' . substr($session->start->format( 'Y m d H i s' ), 11, 2) . ',' . substr($session->start->format( 'Y m d H i s' ), 14, 2) . '),';
  $events.= '"end": new Date('.substr($session->end->format( 'Y m d H i s' ), 0, 4) . ',' . (substr($session->end->format( 'Y m d H i s' ), 5, 2)-1) . ',' . substr($session->end->format( 'Y m d H i s' ), 8, 2) . ',' . substr($session->end->format( 'Y m d H i s' ), 11, 2) . ',' . substr($session->end->format( 'Y m d H i s' ), 14, 2) . '),';
  $events.= '"title":"' . $session->name . '",';
  $events.= '"body":"' . $session->description . '",';
  $events.= $user->isAuthorized('direction') ? 'readOnly: false' : 'readOnly: true';
  $events.=  '}';
  $key+1 == count($sessions) ? $events.=  '' : $events.=  ',';
}