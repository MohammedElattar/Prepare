<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TruncateTelescopeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Truncate the telescope entries table
        if (config('telescope.enabled') && Schema::hasTable('telescope_entries')) {
            // Disable foreign key checks
            DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

            // Delete all records from the related tables
            DB::table('telescope_entries_tags')->truncate();
            DB::table('telescope_entries')->truncate();

            // Re-enable foreign key checks
            DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        }
    }
}
