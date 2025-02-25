<?php

namespace App\Jobs;

use App\Models\HousingSchemePlot;
use App\Models\HousingSchemePlotTemp;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MigrateDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $records;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($records = [])
    {
        $this->records = $records;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->records as $plot) {
            HousingSchemePlot::create($plot);
        }
    }
}
