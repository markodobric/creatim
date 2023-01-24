<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Actions\Group\CreateGroupAction;
use App\Models\Group;
use App\Models\Individual;
use App\Repository\Group\GroupRepositoryInterface;
use App\Repository\Individual\IndividualRepositoryInterface;
use App\Services\SMS\SmsServiceInterface;
use Exception;
use Illuminate\Console\Command;
use Psr\Log\LoggerInterface;

class SendSmsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'creatim:send-sms
                            {message : Text message}
                            {--group= : The ID of the group}
                            {--individual= : The ID of the individual}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Create group of individuals";

    public function handle(
        GroupRepositoryInterface $groupRepository,
        IndividualRepositoryInterface $individualRepository,
        SmsServiceInterface $smsService,
        LoggerInterface $logger
    ): int
    {
        if (!$this->option('individual') && !$this->option('group')) {
            $this->warn('Group or individual must be provided.');

            return self::FAILURE;
        }

        try {
            if ($id = $this->option('individual')) {
                /** @var Individual $individual */
                $individual = $individualRepository->find($id);

                if (!$individual) {
                    $this->warn('Individual not found.');
                }

                $smsService->sendToIndividual($individual, $this->argument('message'));
            } else {
                /** @var Group $group */
                $group = $groupRepository->find($this->option('group'));

                if (!$group) {
                    $this->warn('Group not found.');
                }

                $smsService->sendToGroup($group, $this->argument('message'));
            }

            $this->info("Message has been successfully sent.");

            return self::SUCCESS;
        } catch (Exception $exception) {
            $logger->error(
                'Error while sending a message.',
                [
                    'error' => $exception->getMessage(),
                ]
            );

            $this->warn('Failed to send message.');

            return self::FAILURE;
        }
    }
}
