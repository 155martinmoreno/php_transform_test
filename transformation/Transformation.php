<?php


namespace transformation;


interface Transformation {
  
  function getAllowedDataType();

  /**
   * @param $data
   * @return \stdClass
   */
  function transform($data);

}