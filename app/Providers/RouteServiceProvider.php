<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
             //para evitar manipular una ruta y estarle poniendo  /admin/post aqui en el provider de rutas lo definimos como PREFIX el cual damos a en tener a laravel que estamos en la ruta admin por lo cual no va hacer necesario agregar el admin en cada ruta si no que solo su ruta normal ejemplo de /admin/post  -> /post
            Route::middleware('web', 'auth')
                 ->prefix('admin')
                 ->name('admin.')//cunado le agregamos un nombre a una ruta para no estar llamandola por admin.dashboard   agregamos el metodo name aqui y ya solo le tenemos que poner el nombre osea dashboard porque con esto estamos declarando que nos referimos a admin.dashboard .
                ->group(base_path('routes/admin.php'));
        });
    }
}
