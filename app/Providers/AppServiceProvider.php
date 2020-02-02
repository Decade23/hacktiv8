<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Services\Pegawai\PegawaiService;
use App\Services\Pegawai\PegawaiServiceContract;
use App\Services\RiwayatPendidikan\RiwayatPendidikanService;
use App\Services\RiwayatPendidikan\RiwayatPendidikanServiceContract;
use App\Services\ProductionHouse\ProductionHouseService;
use App\Services\ProductionHouse\ProductionHouseServiceContract;
use App\Services\Movie\MovieService;
use App\Services\Movie\MovieServiceContract;
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
            ProductionHouseServiceContract::class,
            ProductionHouseService::class
        );

        $this->app->bind(
            MovieServiceContract::class,
            MovieService::class
        );

        $this->app->bind(
            PangkatServiceContract::class,
            PangkatService::class            
        );

    }
}
