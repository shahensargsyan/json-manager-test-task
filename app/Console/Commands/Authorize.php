<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class Authorize extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'authorize:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Authorize user, return token';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->ask('email');
        $password = $this->ask('password');

        $data = [
            'email' => $email,
            'password' => $password
        ];

        $validator = Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            echo  "Incorrect credentials \n";
            die;
        }

        config()->set('jwt.ttl', 5);
        $token = auth()->attempt($data);
        if (!$token) {
            echo "Invalid Credentials";
        }

        echo $token. "\n\n";

        return Command::SUCCESS;
    }
}
