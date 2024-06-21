<?php

namespace Jhonoryza\RecaptchaV3;

use Illuminate\Support\ServiceProvider;

class RecaptchaServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // only publish when user run artisan vendor:publish --tag=recaptcha-v3-config
        $this->publishes([
            __DIR__ . '/../config/recaptcha-v3.php' => config_path('recaptcha-v3.php'),
        ], 'recaptcha-v3-config');
    }

    public function register(): void
    {
        // merge package configuration file with the application's published copy
        $this->mergeConfigFrom(__DIR__ . '/../config/recaptcha-v3.php', 'recaptcha-v3');
    }
}