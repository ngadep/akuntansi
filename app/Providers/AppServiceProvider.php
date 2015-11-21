<?php

namespace Akuntansi\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        DB::listen(function($sql, $bindings, $time){
            $logFile = storage_path('logs/query.log');
            $monolog = new Logger('log');
            $monolog->pushHandler(new StreamHandler($logFile), Logger::INFO);
            $monolog->info($sql, compact('bindings', 'time'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
