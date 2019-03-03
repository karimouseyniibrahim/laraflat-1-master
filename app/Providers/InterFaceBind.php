<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class InterFaceBind extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Application\Repository\InterFaces\UserInterface',
            'App\Application\Repository\Eloquent\UserEloquent'
        );
        $this->app->bind(
            'App\Application\Repository\InterFaces\GroupInterface',
            'App\Application\Repository\Eloquent\GroupEloquent'
        );
        $this->app->bind(
            'App\Application\Repository\InterFaces\RolesInterface',
            'App\Application\Repository\Eloquent\RolesEloquent'
        );
        $this->app->bind(
            'App\Application\Repository\InterFaces\HomeInterface',
            'App\Application\Repository\Eloquent\HomeEloquent'
        );
        $this->app->bind(
            'App\Application\Repository\InterFaces\MenuInterface',
            'App\Application\Repository\Eloquent\MenuEloquent'
        );
        $this->app->bind(
            'App\Application\Repository\InterFaces\PageInterface',
            'App\Application\Repository\Eloquent\PageEloquent'
        );
        $this->app->bind(
            'App\Application\Repository\InterFaces\SectionInterface',
            'App\Application\Repository\Eloquent\SectionEloquent'
        );
        $this->app->bind(
            'App\Application\Repository\InterFaces\DemandeshoprentalsInterface',
            'App\Application\Repository\Eloquent\DemandeshoprentalsEloquent'
        );

        $this->app->bind(
            'App\Application\Repository\InterFaces\InscriptionInterface',
            'App\Application\Repository\Eloquent\InscriptionEloquent'
        );

        require_once __DIR__.'/ExtraInterfaces.php';

    }
}
