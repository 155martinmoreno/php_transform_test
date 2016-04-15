<?php


namespace transformation;


interface Transformation {
  function getAllowedInputType();

  /**
   * @param $data
   * @return \stdClass
   */
  function transformInput($data);

  /**
   * @param $data
   * @return \stdClass
   */
  function transformBusinessLogic($data);
}