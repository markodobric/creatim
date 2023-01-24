<?php

declare(strict_types=1);

namespace App\Services\SMS\Resolver;

use App\Enum\SmsProviderType;
use App\Services\SMS\Provider\SmsProviderInterface;
use Illuminate\Container\RewindableGenerator;

class SmsProviderResolver implements SmsProviderResolverInterface
{
    private static array $providerMap;

    public function __construct(private RewindableGenerator $providers, private int $reorderCountCap)
    {
        if (empty(self::$providerMap)) {
            foreach ($this->providers->getIterator() as $provider) {
                if (!($provider instanceof SmsProviderInterface)) {
                    throw new \RuntimeException(
                        sprintf(
                            'Provider must be instance of "%s" class',
                            SmsProviderInterface::class
                        )
                    );
                }

                self::$providerMap[$provider->getType()->value] = [
                    'provider' => $provider,
                    'message_count' => 0,
                ];
            }
        }
    }

    public function getProvider(): SmsProviderInterface
    {
        return current(self::$providerMap)['provider'];
    }

    public function increaseMessageCount(SmsProviderType $providerType): void
    {
        if (array_key_exists($providerType->value, self::$providerMap)) {
            // increase provider's message count
            ++self::$providerMap[$providerType->value]['message_count'];

            // if message count has more than cap value, reorder list
            if (self::$providerMap[$providerType->value]['message_count'] >= $this->reorderCountCap) {
                // remove first provider from list of providers
                $firstProvider = array_shift(self::$providerMap);

                $firstProvider['message_count'] = 0;

                // then put it at the end of list of providers
                self::$providerMap[$firstProvider['provider']->getType()->value] = $firstProvider;
            }
        }
    }
}
