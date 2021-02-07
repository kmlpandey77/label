<?php
namespace Kmlpandey77\Label\Provider;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Kmlpandey77\Label\Label;

class LabelServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->mergeConfigFrom(__DIR__.'/../../config/label.php', 'label');
    $this->app->bind('label', function($app) {
        return new Label();
    });
  }

  public function boot()
  {
    $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
    $this->registerRoutes();
    $this->loadViewsFrom(__DIR__.'/../../resources/views/label', 'label');
  }

  protected function registerRoutes()
{
    Route::group($this->routeConfiguration(), function () {
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
    });
}

protected function routeConfiguration()
{
    return [
        'prefix' => config('label.prefix'),
        'middleware' => config('label.middleware'),
    ];
}
}
