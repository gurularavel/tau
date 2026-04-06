<?php

namespace Crud\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class CrudServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RepositoryRegisterServiceProvider::class);
        $this->app->register(ServiceRegisterServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //add hasRelation method to Request
        Request::macro('hasRelation', function ($params, $relation) {
            return collect(explode(",", $this->get($params)))->contains(function ($param) use ($relation) {
                return trim($param) == $relation;
            });
        });

        //add hasJoined to Builder method
        Builder::macro('hasJoined', function($table){
            return Collection::make($this->getQuery()->joins)->pluck('table')->contains($table);
        });
    }
}