<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Services\Pegawai\PegawaiService;
use App\Services\Pegawai\PegawaiServiceContract;
use App\Services\RiwayatPendidikan\RiwayatPendidikanService;
use App\Services\RiwayatPendidikan\RiwayatPendidikanServiceContract;

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
    }
}
