<?php


namespace Modules\User\Commands;

use Connections\UserV1\Resources\UserResource;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Modules\User\Services\UserService;

class UserV1Sync extends Command
{
    protected $signature = 'user:v1:sync';

    protected $description = 'Syncing Users v1';

    protected $userV1APi;

    protected $userService;

    public function __construct(
        UserResource $userV1APi,
        UserService $userService
    )
    {
        parent::__construct();
        $this->userV1APi = $userV1APi;
        $this->userService = $userService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        Log::info("Start Syncing Users from API v1.0.0");
        foreach ($this->userV1APi->list()->chunk(25) as $users)
        {
            foreach ($users as $user)
            {
                try {
                    $this->userService->insert($user->toArray());
                } catch (\Exception $exception) {
                    Log::info($exception->getMessage());
                }
            }

        }

    }

}
