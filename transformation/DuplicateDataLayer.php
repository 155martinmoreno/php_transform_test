<?php


namespace transformation;


use Data;
use stdClass;

class DuplicateDataLayer implements Layer {

  function getAllowedInputType() {
    return Data::class;
  }

  function transformInput($data) {
    return $data;
  }

  /**
   * @param Data $data
   * @return stdClass
   */
  function transformBusinessLogic($data) {
    $data->dataStr .= $data->dataStr;
    return $data;
  }
}