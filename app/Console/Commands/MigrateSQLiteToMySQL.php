<?php

namespace App\Console\Commands;

use App\Jobs\MigrateDataJob;
use App\Models\HousingSchemePlotTemp;
use Illuminate\Console\Command;

class MigrateSQLiteToMySQL extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:sqlite-to-mysql';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'job to migrate records from sqlite to mysql';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        HousingSchemePlotTemp::chunk(100, function ($records) {
            $data = $records->map(function ($record) {
                $record->migration_done = 1;
                $record->save();
                return $record;
            })->toArray();

            MigrateDataJob::dispatch($data);
        });
        return Command::SUCCESS;
    }
}
