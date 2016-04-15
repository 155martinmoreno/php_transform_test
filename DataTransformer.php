<?php


use transformation\Layer;

class DataTransformer {
  private $layers;
  private $data;

  /**
   * DataTransformer constructor.
   * @param stdClass $data
   */
  public function __construct(stdClass $data) {
    $this->data = $data;
  }

  public function addLayer(Layer $layer) {
    $this->layers[] = $layer;
    return $this;
  }

  public function transformOrThrow() {
    $resultData = $this->data;

    foreach ($this->layers as $transformation) {
      /** @var Layer $transformation */
      $allowedInputType = $transformation->getAllowedInputType();

      if (!$resultData instanceof $allowedInputType) {
        throw new DataTransformerException(get_class($transformation) ." cannot process type ".get_class($resultData) . ", only $allowedInputType allowed");
      }

      $resultData = $transformation->transformInput($resultData);

      if (!is_object($resultData)) {
        throw new DataTransformerException(get_class($transformation) . " returned a non-object result from transformInput()");
      }

      $resultData = $transformation->transformBusinessLogic($resultData);

      if (!is_object($resultData)) {
        throw new DataTransformerException(get_class($transformation) . " returned a non-object result from transformBusinessLogic()");
      }

    }

    return $resultData;
  }

}