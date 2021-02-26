<?php

namespace Amirbagh75\SMSIR;

use Illuminate\Support\ServiceProvider;

class SmsIrPhpServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/Configs/config.php', 'smsirphp');
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/Configs/config.php' => config_path('smsirphp.php'),
            ], 'config');
        }
        $this->app->bind('smsir', function ($app) {
            return new SmsIRClient(config('smsirphp.api-key'), config('smsirphp.secret-key'), config('smsirphp.line-number'), config('smsirphp.request-timeout'));
        });
    }

    public function boot()
    {
        //
    }
}
