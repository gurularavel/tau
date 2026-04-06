<?php

namespace Crud\Providers;

use Crud\Traits\Injectable;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class ServiceRegisterServiceProvider extends ServiceProvider
{
    use Injectable;

    /**
     * Register services.
     */
    public function register(): void
    {
        $providers = $this->inject('services');

        foreach ($providers as $contract => $service) {
            $this->app->bind(
                abstract: strval($contract),
                concrete: strval($service)
            );
        }
    }
}
