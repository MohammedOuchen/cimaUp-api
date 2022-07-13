<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class devEnvironment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dev {--Client=100} {--Owner=100}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'setting dev environment';

     /**
     * The ensitech logo.
     *
     * @var string
     */
    protected $asciiLogo = "
     ______    _    __      _______   __    ___________    _______    ________   _
    |   ___|  | |  /   |    \   ___| |  |  |____   ____|  |   ____|  |   _____| | |
    |  |___   | | / /  |     \ \     |  |       |  |      |  |____   |  |       | |____
    |   ___|  | |/ / | |      \ \    |  |       |  |      |   ____|  |  |       |  __  |
    |  |___   | / /  | |   ____\ \   |  |       |  |      |  |____   |  |_____  | |  | |
    |______|  |__/   |_|  |_______|  |__|       |__|      |_______|  |________| |_|  |_|
     ";

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
        $start = microtime(true);

        //character encoding
        ini_set('output_encoding', 'UTF-8');

        $this->info("\033[0;94m ".$this->asciiLogo);

        $this->info("\033[1;36m DEV ENVIRONMENT CREATION");

        //setting up the project
        $this->basicSetUp();

        //creating the users
        $this->usersCreation();

        $this->info("\033[35m Action completed in ".round((microtime(true) - $start), 4)." seconds");
    }

     /**
     * Execute the basic set up.
     */
    public function basicSetUp(){
        //optimize
        $this->info("\033[0;33m Starting optimization...");
        Artisan::call('clear-compiled');
        Artisan::call('optimize:clear');
        $this->info("\033[32m Optimization done \xE2\x9C\x94");

        //db wipe
        $this->info("\033[33m Starting db wipe...");
        Artisan::call('db:wipe');
        $this->info("\033[32m DB wipe done \xE2\x9C\x94");

        //migrate
        $this->info("\033[33m Starting migrating...");
        Artisan::call('migrate:fresh');
        $this->info("\033[32m Default migration done \xE2\x9C\x94");

        //seed
        $this->info("\033[33m Starting seeding...");
        Artisan::call('db:seed');
        $this->info("\033[32m Seeding done \xE2\x9C\x94");
    }

    public function usersCreation(){
        //project var
        $appName = config('app.name');

        //command values
        $nbClient =  $this->option('Client');
        $nbOwner = $this->option('Owner');

        //global users we will create
        $globalNbToCreate = $nbClient + $nbOwner;

        if($globalNbToCreate > 0){
            $this->info("\033[33m Starting creating ".$globalNbToCreate." users...");

            //Clients creation
            if($nbClient > 0){
                $nbToCreate = $nbClient;
                $roleName = "Client";
                $wantedRole =  Role::findOrCreate($roleName);

                $this->info("\033[33m --- Creating ".$nbToCreate." ".$roleName."s :");
                $bar = $this->output->createProgressBar($nbToCreate);
                $bar->setFormat(' --- %bar% %percent:3s%% %current%/%max%');
                $bar->setBarCharacter('<comment>█</comment>');
                $bar->setEmptyBarCharacter(' ');
                $bar->setProgressCharacter(' ');
                $bar->start();

                for ($i=0; $i < $nbToCreate; $i++) {
                    /** @var User $user */
                    $user = User::factory()
                        ->create([
                            'email' => Str::slug($roleName).'-'.($i+1).'@'.Str::slug($appName).'.com',
                        ])
                        ->assignRole($wantedRole);

                    $bar->advance();
                }
                $bar->finish();
                $this->info("\n\033[97m --- ".$roleName."s created\xE2\x9C\x94");
            }

            //Owner creation
            if($nbOwner > 0){
                $nbToCreate = $nbOwner;
                $roleName = "owner";
                $wantedRole =  Role::findOrCreate($roleName);

                $this->info("\033[33m --- Creating ".$nbToCreate." ".$roleName."s :");
                $bar = $this->output->createProgressBar($nbToCreate);
                $bar->setFormat(' --- %bar% %percent:3s%% %current%/%max%');
                $bar->setBarCharacter('<comment>█</comment>');
                $bar->setEmptyBarCharacter(' ');
                $bar->setProgressCharacter(' ');
                $bar->start();

                for ($i=0; $i < $nbToCreate; $i++) {
                    /** @var User $user */
                    $user = User::factory()
                        ->create([
                            'email' => Str::slug($roleName).'-'.($i+1).'@'.Str::slug($appName).'.com',
                        ])
                        ->assignRole($wantedRole);

                    $bar->advance();
                }
                $bar->finish();
                $this->info("\n\033[97m --- ".$roleName."s created\xE2\x9C\x94");
            }

            $this->info("\033[32m All users are created \xE2\x9C\x94");
        }
        else{
            $this->info(("\033[0;91m No users to create \xE2\x9D\x8C "));
        }
    }


}
