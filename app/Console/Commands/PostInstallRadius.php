<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PostInstallRadius extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'radius:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Move Radius Config Post Radius Installation';

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
        \File::copy(resource_path() . '/radius/default', '/etc/freeradius/sites-available/default');
        \File::copy(resource_path() . '/radius/dynamic-clients', '/etc/freeradius/sites-available/dynamic-clients');
        \File::copy(resource_path() . '/radius/sql', '/etc/freeradius/mods-available/sql');
        \File::copy(resource_path() . '/radius/eap', '/etc/freeradius/mods-available/eap');
        \File::copy(resource_path() . '/radius/queries.conf', '/etc/freeradius/mods-config/sql/main/mysql/queries.conf');
    }
}
