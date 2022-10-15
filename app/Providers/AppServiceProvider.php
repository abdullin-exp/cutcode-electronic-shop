<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        Model::preventLazyLoading(!app()->isProduction());
        // выдаем Exception, если не указаны поля в св-ве $fillable у модели, по которым хотим добавить/отредактировать данные
        Model::preventSilentlyDiscardingAttributes(!app()->isProduction());

        // если какой либо из запросов больше указанного времени, то логируем
        DB::whenQueryingForLongerThan(500, function (Connection $connection) {

        });
    }
}
