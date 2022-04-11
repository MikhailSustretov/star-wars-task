<?php

namespace App\Providers;

use App\Models\Image;
use App\Repositories\FilmRepository;
use App\Repositories\FilmRepositoryEloquent;
use App\Repositories\GenderRepository;
use App\Repositories\GenderRepositoryEloquent;
use App\Repositories\HomeworldRepository;
use App\Repositories\HomeworldRepositoryEloquent;
use App\Repositories\ImageRepository;
use App\Repositories\ImageRepositoryEloquent;
use App\Repositories\PersonRepository;
use App\Repositories\PersonRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(PersonRepository::class, PersonRepositoryEloquent::class);
        $this->app->bind(FilmRepository::class, FilmRepositoryEloquent::class);
        $this->app->bind(HomeworldRepository::class, HomeworldRepositoryEloquent::class);
        $this->app->bind(GenderRepository::class, GenderRepositoryEloquent::class);
        $this->app->bind(ImageRepository::class, ImageRepositoryEloquent::class);
    }
}
