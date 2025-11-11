<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

final class ProjectInitialize extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Project Initialization';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->ensureLogFileExists();

        $this->call('migrate:fresh', [
            '--force' => true,
        ]);
        $this->call('shield:generate', [
            '--all' => true,
            '--panel' => 'admin',
            '--option' => 'policies_and_permissions',
        ]);
        $this->call('db:seed', [
            '--force' => true,
        ]);
        $this->call('shield:super-admin', [
            '--user' => '1',
            '--panel' => 'admin',
        ]);

        $this->call('filament:optimize-clear');
        $this->call('optimize:clear');
    }

    private function ensureLogFileExists(): void
    {
        $logFile = storage_path('logs/laravel.log');

        if (! is_dir(dirname($logFile))) {
            mkdir(dirname($logFile), 0755, true);
        }

        if (! file_exists($logFile)) {
            file_put_contents($logFile, '');
        }
    }
}
