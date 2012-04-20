<?php

class Offer extends ActiveRecord\Model {

  static function getPrestations() {
    if ($this->prestations != '') {
      $prestations_id = explode(',', $this->prestations);
      $prestations = Array();
      foreach ($prestations_id as $prestation_id) {
        array_push($prestations, Prestation::find($prestation_id));
      }
      return $prestations;
    }
    return null;
  }
/**
   * @param int $id
   * @return object
   */
  function isOffer($prestation_id){
    $count = 0;
    if ($this->prestations != 0) {
      foreach (explode(',', $this->prestations) as $values){
        if ($prestation_id == $values) {
          $count++;
        }
      }
    }
    return $count;
  }
}
?>
