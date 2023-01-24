<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Actions\Group\CreateGroupAction;
use App\Repository\Group\GroupRepositoryInterface;
use Exception;
use Illuminate\Console\Command;
use Psr\Log\LoggerInterface;

class CreateGroupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'creatim:create-group
                            {individuals* : The IDs of the individuals}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Create group of individuals";

    public function handle(GroupRepositoryInterface $groupRepository, LoggerInterface $logger): int
    {
        try {
            (new CreateGroupAction($groupRepository))($this->argument('individuals'));

            $this->info("Group has been created sucessfully.");

            return self::SUCCESS;
        } catch (Exception $exception) {
            $logger->error(
                'Error while creating a group.',
                [
                    'error' => $exception->getMessage(),
                ]
            );

            $this->warn('Failed to create a group.');

            return self::FAILURE;
        }
    }
}
