<?php

namespace App\Providers;

use App\Services\SMS\Provider\RestSmsProvider;
use App\Services\SMS\Provider\SmsProviderInterface;
use App\Services\SMS\Provider\SoapSmsProvider;
use App\Services\SMS\Resolver\SmsProviderResolver;
use App\Services\SMS\Resolver\SmsProviderResolverInterface;
use App\Services\SMS\SmsService;
use App\Services\SMS\SmsServiceInterface;
use App\Services\SoapClient\ExistingSoapClient;
use App\Services\SoapClient\ExistingSoapClientInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ExistingSoapClientInterface::class, ExistingSoapClient::class);

        $this->app->bind(SoapSmsProvider::class, function ($app) {
            return new SoapSmsProvider($app->make(ExistingSoapClientInterface::class));
        });

        $this->app->bind(RestSmsProvider::class, function ($app) {
            return new RestSmsProvider(
                'http://api.smsexternalservice.com/v1' // this should be provided by ENV variable
            );
        });

        $this->app->tag([RestSmsProvider::class, SoapSmsProvider::class], 'providers');

        $this->app->bind(SmsProviderResolverInterface::class, function ($app) {
            return new SmsProviderResolver($app->tagged('providers'), 100);
        });

        $this->app->bind(SmsServiceInterface::class, SmsService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
