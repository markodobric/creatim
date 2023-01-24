<?php

declare(strict_types=1);

namespace App\Services\SMS;

use App\Dto\PhoneNumber;
use App\Events\Sms\SmsSentEvent;
use App\Models\Group;
use App\Models\Individual;
use App\Services\SMS\Resolver\SmsProviderResolverInterface;
use Psr\Log\LoggerInterface;

class SmsService implements SmsServiceInterface
{
    public function __construct(
        private SmsProviderResolverInterface $smsProviderResolver,
        private LoggerInterface $logger
    )
    {
    }

    public function sendToIndividual(Individual $individual, string $message): bool
    {
        try {
            $smsProvider = $this->smsProviderResolver->getProvider();

            $smsProvider->send(new PhoneNumber($individual->phone_number), $message);

            event(new SmsSentEvent($smsProvider->getType()));

            return true;
        } catch (\Exception $e) {
            $this->logger->error(
                'Failed to send sms message to individual.',
                [
                    'error' => $e->getMessage(),
                ]
            );

            return false;
        }
    }

    public function sendToGroup(Group $group, string $message): bool
    {
        try {
            foreach ($group->individuals as $individual) {
                $this->sendToIndividual($individual, $message);
            }

            return true;
        } catch (\Exception $e) {
            $this->logger->error(
                'Failed to send sms message to group.',
                [
                    'error' => $e->getMessage(),
                ]
            );

            return false;
        }
    }
}
