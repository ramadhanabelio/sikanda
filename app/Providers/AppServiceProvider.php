<?php

namespace App\Providers;

use App\Models\Anggaran;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('layouts.sidebar', function ($view) {
            $judul = Anggaran::select('judul')->distinct()->pluck('judul');
            $subJudul = Anggaran::select('sub_judul')->distinct()->pluck('sub_judul');
            $subSubJudul = Anggaran::select('sub_sub_judul')->distinct()->pluck('sub_sub_judul');

            $view->with(compact('judul', 'subJudul', 'subSubJudul'));
        });
    }
}
