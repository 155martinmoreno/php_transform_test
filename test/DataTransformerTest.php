<?php


use DataTransformationTest\DataTransformer;
use DataTransformationTest\transformation\Transformation;
const DATA_STR = "Hola-";

class Data extends stdClass {
  public $dataStr = DATA_STR;
}

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

class DataTransformerTest extends PHPUnit_Framework_TestCase {

  function testShouldDuplicateData() {

    $result = (new DataTransformer(new Data()))
      ->addTransformation(new DuplicateDataTransformation())
      ->transformOrThrow();


    $this->assertEquals(DATA_STR . DATA_STR, $result->dataStr);
  }

}
