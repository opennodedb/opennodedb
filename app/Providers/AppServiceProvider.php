<?php

namespace App\Providers;

use League\Fractal\Manager;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use League\Fractal\Serializer\JsonApiSerializer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);

        $this->app->bind(Manager::class, function () {
            $manager = new Manager();
            $manager->setSerializer(new JsonApiSerializer());
            $manager->parseIncludes(request('include') ?? []);

            return $manager;
        });
    }
}
