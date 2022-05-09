<?php

namespace App\Console\Commands;

use App\Models\LoginUfsc;
use App\Services\SeleniumService;
use Illuminate\Console\Command;

class SeleniumScheduleSnack extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'selenium:agendarRefeicao';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private $service;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(SeleniumService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $loginsUfscArray = LoginUfsc::orderBy('id', 'desc')->get();
        foreach ($loginsUfscArray as $key => $value) {
            $this->service->loginUfsc($value);
        }
    }
}
