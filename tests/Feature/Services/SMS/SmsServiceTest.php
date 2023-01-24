<?php

declare(strict_types=1);

namespace Tests\Feature\Services\SMS;

use App\Events\Sms\SmsSentEvent;
use App\Listeners\Sms\IncreaseProviderMessageCount;
use App\Models\Individual;
use App\Services\SMS\SmsServiceInterface;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class SmsServiceTest extends TestCase
{
    private SmsServiceInterface $smsService;

    public function setUp(): void
    {
        parent::setUp();

        $this->smsService = $this->app->make(SmsServiceInterface::class);
    }

    public function testSendMessageToIndividual(): void
    {
        Event::fake([SmsSentEvent::class]);

        $this->smsService->sendToIndividual(
            Individual::factory()->make(),
            'Hello Creatim'
        );

        Event::assertDispatched(SmsSentEvent::class);

        Event::assertListening(
            SmsSentEvent::class,
            IncreaseProviderMessageCount::class
        );
    }
}
