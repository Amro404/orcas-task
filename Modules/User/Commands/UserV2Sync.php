<?php


namespace Modules\User\Commands;

use Connections\UserV2\Resources\UserResource;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Modules\User\Services\UserService;


class UserV2Sync extends Command
{
    protected $signature = 'user:v2:sync';

    protected $description = 'Syncing Users v2';

    protected $userV2APi;

    protected $userService;

    public function __construct(
        UserResource $userV2APi,
        UserService $userService
    )
    {
        parent::__construct();
        $this->userV2APi = $userV2APi;
        $this->userService = $userService;

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        Log::info("Start Syncing Users from API v2.0.0");
        foreach ($this->userV2APi->list()->chunk(25) as $users)
        {
            foreach ($users as $user)
            {
                try {
                    $this->userService->insert($user->toArray());
                } catch (\Exception $exception) {
                    Log::info($exception);
                }
            }

        }
        Log::info("Syncing Users from API v2.0.0: Finished.");
    }
}
