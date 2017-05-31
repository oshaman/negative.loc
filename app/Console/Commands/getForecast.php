<?php

namespace Oshaman\Publication\Console\Commands;

use Illuminate\Console\Command;
use Oshaman\Publication\Weather;

class getForecast extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getForecast';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Getting forecast';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $model = new Weather;
        $res = $model->forecast();
        $res ? $this->info('Update success!') : $this->info('Update fail!');
        \Log::info('Forecast update complite - '. date("d-m-Y H:i:s"));
    }
}
