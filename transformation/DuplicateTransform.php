<?php


namespace transformation;


use Data;
use stdClass;

class DuplicateTransform implements Transformation {

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