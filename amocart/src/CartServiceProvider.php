<?php

namespace Amocart\Cart;

use Amocart\Cart\Repository\EloquentRepository;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishConfiguration();
        $this->publishMigrations();
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->bind('Amocart\Cart\Storage\StorageContract', function ($app) {
            $storageDriver = $app['config']->get('amocart.storage_driver', 'Session');

            switch ($storageDriver) {
                case 'Session':
                    return new Storage\Session\SessionRepository($app['Illuminate\Session\Store']);
                    break;

                case 'Database':
                    return new EloquentRepository();
                    break;

                default:
                    throw new \InvalidArgumentException('Invalid Cart storage driver');
                    break;
            }
        });
    }

    /**
     * Publish configuration file.
     */
    private function publishConfiguration()
    {
        $this->publishes([__DIR__ . '/resources/config/amocart.php' => config_path('amocart.php')], 'config');
        $this->mergeConfigFrom(__DIR__ . '/resources/config/amocart.php', 'amocart');
    }

    /**
     * Publish migration file.
     */
    private function publishMigrations()
    {
        $this->publishes([__DIR__ . '/resources/migrations/' => base_path('database/migrations')], 'migrations');
    }
}
