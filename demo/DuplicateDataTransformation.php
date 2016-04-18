<?php


namespace DataTransformationTestDemo;

use DataTransformationTest\transformation\Transformation;

class DuplicateDataTransformation implements Transformation {

  function getAllowedDataType() {
    return Data::class;
  }

  /**
   * @param $data
   * @return \stdClass
   */
  function transform($data) {
    $data->dataStr .= $data->dataStr;
    return $data;
  }

}