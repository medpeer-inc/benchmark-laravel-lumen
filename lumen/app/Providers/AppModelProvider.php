<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppModelProvider extends ServiceProvider {
  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    $this->app->bind('SampleModel', 'App\Models\SampleModel');
  }
}