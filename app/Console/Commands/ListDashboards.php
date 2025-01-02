<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;

class ListDashboards extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'filament:list-dashboards';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all registered Filament dashboards';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get all Filament routes
        $routes = collect(Route::getRoutes()->getRoutes())
            ->filter(function ($route) {
                return str_contains($route->getActionName(), 'Filament');
            });

        if ($routes->isEmpty()) {
            $this->info('No dashboards found.');
            return;
        }

        $this->info('Registered Filament Dashboards:');
        foreach ($routes as $route) {
            $this->line('- ' . $route->uri());
        }
    }
}
