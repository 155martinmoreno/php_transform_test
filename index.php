<?php

include_once "DataTransformer.php";
include_once "DataTransformerException.php";
include_once "transformation/Transformation.php";
include_once "transformation/DuplicateTransform.php";

use transformation\DuplicateTransform;


class Data extends stdClass
{
  public $dataStr = "Hola-";
}

class Data2
{
}

try {
  /** @var Data $result */
  $result = (new DataTransformer(new Data()))
    ->addTransformation(new DuplicateTransform())
    ->addTransformation(new DuplicateTransform())
    ->transformOrThrow();

  echo $result->dataStr;

}catch (DataTransformerException $e)
{
  echo "Error: ".$e->getMessage();
}