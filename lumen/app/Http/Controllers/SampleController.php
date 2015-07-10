<?php namespace App\Http\Controllers;

use App\Services\SampleService;
use Laravel\Lumen\Routing\Controller as BaseController;

class SampleController extends BaseController {

  public function get(SampleService $service){
    $list = $service->getAll();
    return json_encode($list);
  }

}