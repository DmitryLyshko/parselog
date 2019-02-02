<?php

namespace App\Command;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use src\ParseLog;

/**
 * Class ViewLog
 * @package App\Command
 */
class ViewLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:view';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'View laravel log';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $logs = [];
        try {
            $logs = ParseLog::parse((string) Carbon::today()->getTimestamp(), (string) Carbon::tomorrow()->getTimestamp());
        } catch (Exception $e) {
            $this->info("Error: " . $e->getMessage());
        }

        if ($logs !== []) {
            $dt = Carbon::now();
            foreach ($logs as $log) {
                $this->info("Date: " . $dt->setTimestamp($log['date']));
                $this->warn($log['error']);
            }

            return;
        }

        $this->info("Empty log today");
    }
}
