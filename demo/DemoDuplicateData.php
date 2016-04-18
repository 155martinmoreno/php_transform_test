<?php

namespace DataTransformationTestDemo;

require_once "../vendor/autoload.php";

use DataTransformationTest\DataTransformer;
use DataTransformationTest\DataTransformerException;

const DATA_STR = "Hola-";


class Data2 extends \stdClass{
}

try {

  /** @var Data $result */
  $result = (new DataTransformer(new Data(DATA_STR)))
    ->addTransformation(new DuplicateDataTransformation())
    ->transformOrThrow();

  echo $result->dataStr;

} catch (DataTransformerException $e) {

  echo "Error: " . $e->getMessage();
}