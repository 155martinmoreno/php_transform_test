<?php


namespace transformation;


interface Transformation {
  
  function getAllowedDataType();

  /**
   * @param $data
   * @return \stdClass the transformed data
   */
  function transform($data);

}