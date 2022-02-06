<?php

namespace App\Console\Commands;

use App\Models\File;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class cmigrate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cmigrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $order_migrate = file_get_contents(base_path('modules_statuses.json'));
        $modules = (array)json_decode($order_migrate);
        $keys = array_keys($modules);
        foreach ($keys as $key) {
            $path = base_path("Modules/$key/Database/Migrations");
            if (file_exists($path)) {
                Artisan::call("migrate", ["--path"=>str_replace(base_path(),'',$path)]);
            }
        }
        return 0;
    }
}
