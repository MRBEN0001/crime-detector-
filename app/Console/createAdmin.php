<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class createAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (User::where('phone', '!=', '12345')) {
            User::create([
                'name' => 'admin',
                'phone' => '12345',
                'password' => Hash::make('password')
            ]);

            //dd("Admin created");
            $this->info('Admin created!');
        } else {
            dd("Admin Already Exist");
        }


    }
}
