<?php

namespace App\Providers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Setting;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFour();

        if (App::environment('local')) {
            $this->app->register(IdeHelperServiceProvider::class);
        }



        Blade::if('walikelas', function () {
            $guru = Guru::where('id_card', auth()->user()->id_card)->firstOrFail();
            $wali_kelas = Kelas::where('guru_id', $guru->id)->count();

            return $wali_kelas != 0;
        });

        View::share('setting', Setting::find(1));
    }
}
