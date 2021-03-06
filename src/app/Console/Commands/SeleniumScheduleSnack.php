<?php

namespace App\Console\Commands;

use App\Models\LoginUfsc;
use App\Models\UserWeekDay;
use App\Services\SeleniumService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Bugsnag\Report;

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
        $weekDayId = Carbon::now()->dayOfWeek + 1;
        $usersWeekDays = UserWeekDay::where('week_day_id', $weekDayId)->orderBy('user_id', 'asc')->get();
        foreach ($usersWeekDays as $key => $value) {
            $this->service->loginUfsc($value, $value->user->loginUfsc);
        }

        Bugsnag::registerCallback(function ($report) {
            $report->setSeverity('info');
        });
        Bugsnag::notifyError('Aviso de completude!', 'Agendamentos do dia '. date('d/m/Y') . ' finalizados.');
    }
}
