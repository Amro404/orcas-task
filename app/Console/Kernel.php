<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Modules\User\Commands\UserV1Sync;
use Modules\User\Commands\UserV2Sync;

class Kernel extends ConsoleKernel
{

    protected $commands = [
        UserV1Sync::class,
        UserV2Sync::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('user:v1:sync')->cron("'0 */8 * * *")->withoutOverlapping();
        $schedule->command('user:v2:sync')->cron("'0 */8 * * *")->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
