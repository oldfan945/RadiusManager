<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PostInstallNginx extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nginx:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Move Nginx Config Post Nginx Installation';

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
        \File::copy(resource_path() . '/nginx/default', '/etc/nginx/sites-available/default');
    }
}
