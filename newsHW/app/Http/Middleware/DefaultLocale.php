<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;


class DefaultLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $localization = $request->route('locale');
        $available = ['uk', 'ru'];
        // Якщо мови недоступні викидаємо помилку
        if(isset($localization) && !in_array($localization, $available))
        {
            return abort(404);
        }
        // Якщо в роуті НЕ знайдено мову
        if(!in_array($localization, $available))
        {
            //Отримуємо мову із сесії або беремо за умовчанням
            $localization = session('locale', config('storym-localizator.default'));
        }
        // Якщо використовується недопустима мова
        if(!in_array($localization, $available)) {
            return abort(404);
        }
        session(['locale' => $localization]);
        app()->setLocale($localization);
        URL::defaults(['locale' => app()->getLocale()]);
        return $next($request);
    }
}
