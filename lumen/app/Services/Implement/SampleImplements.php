<?php namespace App\Services\Implement;

use App\Services\SampleService;
use App\Models\SampleModel;

class SampleImplements implements SampleService {

  public function getAll()
  {
    $result = app("SampleModel")->getAllList();
    return $result;
  }

}