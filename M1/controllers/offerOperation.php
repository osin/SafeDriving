<?php

include_once '../common/inc/init.inc';
if (!$user->isAuthorized('admin'))
  header("location:/M1/");
$action = isset($_POST['action']) ? $_POST['action'] : null;
switch ($action) {
  case 'register':
    try {
      $offer = Offer::create(array('name' => $_POST['name'], 'description' => $_POST['description'], 'price' => $_POST['price']));
      $_POST['action'] = null;
    } catch (Exception $e) {
      print 'failed\n' . $e;
    };
    break;
  case 'delete':
    try {
      foreach ($_POST['offer'] as $offerID) {
        $offer = Offer::find($offerID);
        $offer->delete();
      }
      $_POST['action'] = null;
    } catch (Exception $e) {
      print 'failed\n' . $e;
    };
    print 'failed';
    break;
  case 'update':
    try {
      foreach ($_POST['offer'] as $offerID) {
        $offer = Offer::find($offerID);
        $prestations = '';
        $prestation_nb = count($_POST['prestationsOffer' . $offerID]);
        foreach ($_POST['prestationsOffer' . $offerID] as $key => $prestationID) {
          $prestations .= $prestationID;
          if ($key + 1 < $prestation_nb) {
            $prestations .= ',';
          }
        }
        $offer->update_attributes(array('name' => $_POST['name' . $offerID], 'description' => $_POST['description' . $offerID], 'price' => $_POST['price' . $offerID], 'prestations' => $prestations));
      }
    } catch (Exception $e) {
      print 'failed\n' . $e;
    };
    $_POST['action'] = null;
    break;
  case 'prestation':
    try {
      $offer = Offer::find($_POST['offer_id']);
      $prestations = '';
      foreach (Prestation::find('all') as $key => $prestation) {
        if (!empty($_POST[$prestation->id]) && $_POST[$prestation->id] > 0) {
          for ($i = 0; $i < $_POST[$prestation->id]; $i++) {

            $prestations .= $prestation->id;
            $prestations .= ',';
          }
        }
      }
      print_r($prestations);
      $offer->price = $_POST['price'];
      $offer->prestations = substr($prestations, 0, strlen($prestations) - 1);
      $offer->description = $_POST['description'];
      $offer->save();
    } catch (Exception $e) {
      print 'failed\n' . $e;
    }
    $_POST['action'] = null;
    break;
  default:
header("location:../office/manageOffer.php");
    break;
}
?>
