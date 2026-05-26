<?php
namespace Khsing\World;

use Illuminate\Support\ServiceProvider;

class WorldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->publishMigrations();
        $this->publishSeeds();
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->registerCommands();
    }

    /**
     * Publish migration file.
     */
    private function publishMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations/');
        // $this->publishes([__DIR__ . '/../database/migrations/' => base_path('database/migrations')], 'migrations');
    }

    /**
     * Publish seeder file.
     */
    private function publishSeeds()
    {
        $this->publishes([__DIR__ . '/../database/seeders/' => base_path('database/seeders')], 'seeders');
    }

    private function registerCommands()
    {
        $this->commands([
            \Khsing\World\Console\InitCommand::class,
        ]);
    }
}
