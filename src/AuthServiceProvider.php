<?php

/**
 * Laravel Authentication Package Service Provider
 * 
 * This service provider handles the registration and bootstrapping of the
 * authentication package within a Laravel application. It manages route
 * loading, configuration publishing, and other package initialization tasks.
 * 
 * @package Alex\AuthPackage
 * @author astevens-ai <stevens_alexander@icloud.com>
 */

namespace Alex\AuthPackage;

use Illuminate\Support\ServiceProvider;

/**
 * AuthServiceProvider
 * 
 * Main service provider for the authentication package that extends Laravel's
 * base ServiceProvider to integrate authentication features into Laravel applications.
 */
class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services in the container.
     * 
     * This method is called during the application's service registration phase.
     * Use this method to bind services, repositories, or other dependencies
     * into the Laravel service container.
     * 
     * @return void
     */
    public function register()
    {
        // Register package bindings, singletons, and other container services
        // Example: $this->app->singleton('auth.service', AuthService::class);
        
        // Merge package configuration with application config
        $this->mergeConfigFrom(
            __DIR__.'/config/authpackage.php', 'authpackage'
        );
    }

    /**
     * Bootstrap services when the package is loaded.
     * 
     * This method is called after all service providers have been registered.
     * Use this method to load routes, publish assets, register middleware,
     * and perform other bootstrapping tasks.
     * 
     * @return void
     */
    public function boot()
    {
        // Load package routes if the routes file exists
        // This allows the package to define its own authentication routes
        if (file_exists(__DIR__.'/routes/auth.php')) {
            $this->loadRoutesFrom(__DIR__.'/routes/auth.php');
        }
        
        // Load package migrations for database schema
        // Uncomment the following line when migrations are added:
        // $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        
        // Load package views if they exist
        // Uncomment the following line when views are added:
        // $this->loadViewsFrom(__DIR__.'/resources/views', 'authpackage');
        
        // Publish package configuration file to application's config directory
        // Users can run: php artisan vendor:publish --tag=config
        $this->publishes([
            __DIR__.'/config/authpackage.php' => config_path('authpackage.php'),
        ], 'config');
        
        // Publish package migrations (when available)
        // Uncomment when migrations are created:
        // $this->publishes([
        //     __DIR__.'/database/migrations' => database_path('migrations'),
        // ], 'migrations');
        
        // Publish package views (when available)
        // Uncomment when views are created:
        // $this->publishes([
        //     __DIR__.'/resources/views' => resource_path('views/vendor/authpackage'),
        // ], 'views');
    }
}