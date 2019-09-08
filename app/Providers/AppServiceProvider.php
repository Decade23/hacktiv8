<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Services\Pegawai\PegawaiService;
use App\Services\Pegawai\PegawaiServiceContract;
use App\Services\RiwayatPendidikan\RiwayatPendidikanService;
use App\Services\RiwayatPendidikan\RiwayatPendidikanServiceContract;
use App\Services\Mutasi\MutasiService;
use App\Services\Mutasi\MutasiServiceContract;
use App\Services\Jabatan\JabatanService;
use App\Services\Jabatan\JabatanServiceContract;
use App\Services\Pangkat\PangkatService;
use App\Services\Pangkat\PangkatServiceContract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       Schema::defaultStringLength(191); //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            PegawaiServiceContract::class,
            PegawaiService::class            
        );

        $this->app->bind(
            RiwayatPendidikanServiceContract::class,
            RiwayatPendidikanService::class            
        );

        $this->app->bind(
            MutasiServiceContract::class,
            MutasiService::class            
        );

        $this->app->bind(
            JabatanServiceContract::class,
            JabatanService::class            
        );

        $this->app->bind(
            PangkatServiceContract::class,
            PangkatService::class            
        );

    }
}
