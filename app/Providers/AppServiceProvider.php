<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void {}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        DB::prohibitDestructiveCommands(
            $this->app->isProduction()
        );
        $this->configureModels();
        // configuration for the app
        URL::forceScheme('https');
    }

    private function configureModels(): void
    {
        Model::unguard();
        Model::preventLazyLoading();
        Model::shouldBeStrict();
    }
}
