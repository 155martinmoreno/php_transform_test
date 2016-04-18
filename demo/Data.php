<?php


namespace DataTransformationTestDemo;


use stdClass;

class Data extends stdClass {
  public $dataStr;

  /**
   * Data constructor.
   * @param string $dataStr
   */
  public function __construct($dataStr) {
    $this->dataStr = $dataStr;
  }
}