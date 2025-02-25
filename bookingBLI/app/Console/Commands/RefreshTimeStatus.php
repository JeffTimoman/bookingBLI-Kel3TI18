<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Time;

class RefreshTimeStatus extends Command
{
    protected $signature = 'time:refresh-status';
    protected $description = 'Refresh time status to 1 every new date';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Update all time statuses to 1
        // Time::query()->update(['status' => 1]);
        // update all time status to 1
        Time::query()->update(['status' => 1]);

        $this->info('Time statuses have been refreshed.');
    }
}