<?php

namespace App\Console\Commands;

use App\Models\Doctor;
use Illuminate\Console\Command;

class MakeDoctor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:doctor';

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
        $name = $this->ask('name ?');
        $email = $this->ask('email ?');
        $password = $this->ask('password ?');
        $speciality_id = 1;
        Doctor::create([
            "name" => $name,
            "email" => $email,
            "password" => bcrypt($password),
            "speciality_id" => $speciality_id,
        ]);
        $this->info("User created \n Email: $email \ Password: $password");
        return 0;
    }
}
