<?php

declare(strict_types=1);

namespace Tests\Feature\Services\SMS;

use App\Enum\SmsProviderType;
use App\Services\SMS\Provider\RestSmsProvider;
use App\Services\SMS\Provider\SmsProviderInterface;
use App\Services\SMS\Provider\SoapSmsProvider;
use App\Services\SMS\Resolver\SmsProviderResolver;
use App\Services\SMS\Resolver\SmsProviderResolverInterface;
use Tests\TestCase;

class SmsProviderResolverTest extends TestCase
{
    private SmsProviderResolverInterface $smsProviderResolver;

    public function setUp(): void
    {
        parent::setUp();

        $this->smsProviderResolver = new SmsProviderResolver($this->app->tagged('providers'), 1);
    }

    public function testInstanceOfSmsProvider(): void
    {
        $this->assertInstanceOf(SmsProviderInterface::class, $this->smsProviderResolver->getProvider());
        $this->assertInstanceOf(RestSmsProvider::class, $this->smsProviderResolver->getProvider());
    }

    public function testIncreaseMessageCountAndReorderProviders(): void
    {
        $provider = $this->smsProviderResolver->getProvider();

        // by default, there is the first provider (REST)
        $this->assertInstanceOf(RestSmsProvider::class, $provider);

        // increase count and check that provider is changed (SOAP)
        $this->smsProviderResolver->increaseMessageCount($provider->getType());
        $provider = $this->smsProviderResolver->getProvider();
        $this->assertInstanceOf(SoapSmsProvider::class, $provider);

        // increase count again and check that provider is back to the previous type (SOAP)
        $this->smsProviderResolver->increaseMessageCount($provider->getType());
        $provider = $this->smsProviderResolver->getProvider();
        $this->assertInstanceOf(RestSmsProvider::class, $provider);
    }
}
