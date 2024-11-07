<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Interfaces\UserInterface',
            'App\Repositories\UserRepository'
        );
        $this->app->bind(
            'App\Interfaces\CustomerInquiryInterface',
            'App\Repositories\CustomerInquiryRepository'
        );
        $this->app->bind(
            'App\Interfaces\SliderInterface',
            'App\Repositories\SliderRepository'
        );
        $this->app->bind(
            'App\Interfaces\ProductInterface',
            'App\Repositories\ProductRepository'
        );
        $this->app->bind(
            'App\Interfaces\ServiceInterface',
            'App\Repositories\ServiceRepository'
        );
        $this->app->bind(
            'App\Interfaces\DashboardInterface',
            'App\Repositories\DashboardRepository'
        );
        $this->app->bind(
            'App\Interfaces\SettingInterface',
            'App\Repositories\SettingRepository'
        );
        $this->app->bind(
            'App\Interfaces\TestimonialInterface',
            'App\Repositories\TestimonialRepository'
        );
        $this->app->bind(
            'App\Interfaces\PageInterface',
            'App\Repositories\PageRepository'
        );
        $this->app->bind(
            'App\Interfaces\OurTeamInterface',
            'App\Repositories\OurTeamRepository'
        );
        $this->app->bind(
            'App\Interfaces\AppointmentInterface',
            'App\Repositories\AppointmentRepository'
        );

    }
}
