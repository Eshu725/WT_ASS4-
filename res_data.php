<?php

class ResData {

  private $resList;

  function __construct(array $resList) {
    if(sizeof($resList) > 0) {
      $this->resList = $resList;
    } else {
      throw new Exception("No Restaurant data available");
    }
  }

  public function getReslist() {
    $rescipeList = [];

    foreach($this->resList as $rescipe) {
      $rescipeList[] = array(
        "id" => $rescipe['id'],
        "name" => $rescipe['name']
      );
    }

    return json_encode($rescipeList);
  }

  public function getResdata($id) {
    $response = ["Invalid Rescipe Id"];

    if($id) {
      foreach($this->resList as $rescipe) {
        if ($id == $rescipe['id']) {
          $response = $rescipe;
          break;
        }
      }
    }

    return json_encode($response);
  }
}