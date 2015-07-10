<?php namespace App\Http\Controllers;

use App\Services\SampleService;

class SampleController extends Controller {

  public function get(SampleService $service){
    $list = $service->getAll();
    return json_encode($list);
  }

}