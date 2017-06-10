<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

class AppRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('App\\Repositories\\Contracts\\IUserRepository', 'App\\Repositories\\Actions\\UserRepository');
        $this->app->bind('App\\Repositories\\Contracts\\IListingMobilRepository','App\\Repositories\\Actions\\ListingMobilRepository');
        $this->app->bind('App\\Repositories\\Contracts\\IImagesLmRepository','App\\Repositories\\Actions\\ImagesLmRepository');
        $this->app->bind('App\\Repositories\\Contracts\\IMerkRepository','App\\Repositories\\Actions\\MerkRepository');
        $this->app->bind('App\\Repositories\\Contracts\\IModelRepository','App\\Repositories\\Actions\\ModelRepository');
        $this->app->bind('App\\Repositories\\Contracts\\ITipeRepository','App\\Repositories\\Actions\\TipeRepository');
        $this->app->bind('App\\Repositories\\Contracts\\IProvinsiRepository','App\\Repositories\\Actions\\ProvinsiRepository');
        $this->app->bind('App\\Repositories\\Contracts\\IKotaRepository','App\\Repositories\\Actions\\KotaRepository');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
