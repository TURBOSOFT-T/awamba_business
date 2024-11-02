<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class CleanUpOldSessions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clean-up-old-sessions';
   // protected $description = 'Supprimer les enregistrements de connexion anciens';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Définissez l'âge des sessions à conserver, par exemple 30 jours
        $days = 3;
       $hours = 1;
       $minutes = 2;


        // Supprimez les enregistrements plus anciens que la date spécifiée
        DB::table('historiques_connexions')
            ->where('created_at', '<', Carbon::now()->subDays($days))
            ->delete();

        $this->info('Anciennes sessions supprimées avec succès.');
    }
}
