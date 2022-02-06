<?php

namespace App\Console\Commands;

use App\Models\Common\Admin;
use Illuminate\Console\Command;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

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
        $name = $this->ask('Name ?');
        $email = $this->ask('Email ?');
        $password = $this->ask('Password ?');
        Admin::create([
            "name" => $name,
            "email" => $email,
            "password" => bcrypt($password)
        ]);
        $this->info("User created \n Email: $email \ Password: $password");
        return 0;
    }
}
