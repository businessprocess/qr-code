<?php

namespace Qrcode;

use Illuminate\Support\ServiceProvider;

class QrCodeServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/qr-code.php', 'qr-code');

        $this->publishes([
            __DIR__.'/../config/qr-code.php' => config_path('qr-code.php'),
        ]);

        $this->app->bind('qrcode', function ($app) {
            $config = $app->make('config')->get('qr-code');

            return new Generator(new HttpPainter($config));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Generator::class];
    }
}
