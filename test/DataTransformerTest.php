<?php


use DataTransformationTest\DataTransformer;
use DataTransformationTestDemo\Data;
use DataTransformationTestDemo\DuplicateDataTransformation;
const DATA_STR = "Hola-";


class DataTransformerTest extends PHPUnit_Framework_TestCase {

  function testShouldDuplicateData() {

    $result = (new DataTransformer(new Data(DATA_STR)))
      ->addTransformation(new DuplicateDataTransformation())
      ->transformOrThrow();


    $this->assertEquals(DATA_STR . DATA_STR, $result->dataStr);
  }

}
