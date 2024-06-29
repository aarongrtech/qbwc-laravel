<?php

namespace AaronGRTech\QbwcLaravel\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class SoapServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/qbwc.php' => config_path('qbwc.php'),
        ], 'config');

        $this->registerRoutes();

        $this->publishes([
            __DIR__ . '/../../resources/wsdl/QBWebConnectorSvc.wsdl' => storage_path('app/wsdl/QBWebConnectorSvc.wsdl'),
        ]);
    }

    /**
     * Register the SOAP routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        Route::middleware(config('qbwc.routes.middleware'))
            ->prefix(config('qbwc.routes.prefix'))
            ->group(function () {
                Route::post('/serverVersion', 'AaronGRTech\QbwcLaravel\Http\Controllers\SoapController@serverVersion');
                Route::post('/clientVersion', 'AaronGRTech\QbwcLaravel\Http\Controllers\SoapController@clientVersion');
                Route::post('/authenticate', 'AaronGRTech\QbwcLaravel\Http\Controllers\SoapController@authenticate');
                Route::post('/sendRequestXML', 'AaronGRTech\QbwcLaravel\Http\Controllers\SoapController@sendRequestXML');
                Route::post('/receiveResponseXML', 'AaronGRTech\QbwcLaravel\Http\Controllers\SoapController@receiveResponseXML');
            });
    }
}