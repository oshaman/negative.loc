<?php

namespace Oshaman\Publication\Console\Commands;

use Illuminate\Console\Command;

use Oshaman\Publication\Currency as Curr;

class Currency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Getting the current exchange rate';

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
        $model = new Curr;
        $rates = $model->updateRates();
        \Log::info('Currency update complite - '. date("d-m-Y H:i:s"));
    }
}
