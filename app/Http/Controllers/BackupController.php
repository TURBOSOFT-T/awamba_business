<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class BackupController extends Controller
{
    public function export()
    {
     
       Artisan::call('backup:run --only-db');

       
        $backupPath = storage_path('app/backups');
        $files = Storage::disk('local')->files('backups');
        $latestBackupFile = collect($files)->last();

        if ($latestBackupFile) {
      
            return response()->download(storage_path("app/{$latestBackupFile}"));
        }

        return response()->json(['error' => 'No backup file found'], 404);
    }
}
