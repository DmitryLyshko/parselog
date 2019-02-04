<?php

namespace Log\Command;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Log\ParseLog;

/**
 * Class EmailSendLog
 * @package Log\Command
 */
class EmailSendLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:send_email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email laravel log';

    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws \Exception
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
            $errorMessage = '';
            foreach ($logs as $log) {
                $errorMessage .= 'Date: ' . $dt->setTimestamp($log['date']) . "\n";
                $errorMessage .= 'Error: ' . $log['error'] . "\n\n";
            }

            \Mail::raw($errorMessage, function ($message) {
                $date = Carbon::now();
                $message->to('ipshon@gmail.com');
                $message->to('mekirile@gmail.com');
                $message->to('aa@dinrem.com');
                $message->to('dispector312@gmail.com');
                $message->to('dr-westa@ya.ru');
                $message->to('agerasimov.developer@gmail.com');
                $message->subject('Dinrem // Ошибки за ' . $date->format('y-m-d'));
            });

            $this->info("Send email");

            return;
        }

        $this->info("Empty log today");
    }
}
