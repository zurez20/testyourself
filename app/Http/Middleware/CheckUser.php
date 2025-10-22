<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            // full url with parameters
            $intendedUrl = $request->fullUrl();
            Session::put('intended.url', $intendedUrl);
        }

        $placeholderImage = 'assets/media/blank.png';
        config(['placeholderImage' => $placeholderImage]);

        $placeholderblankImage = 'assets/media/blankimg.svg';
        config(['placeholderblankImage' => $placeholderblankImage]);

        $panelRoles = Role::where('panelFlag', 1)->pluck('slug')->toArray();

        if (Auth::check()) {
            if (in_array(Auth::User()->role, $panelRoles)) {

                if (Auth::User()->status == 1 && Auth::User()->deleteId == 0) {
                    if (Session::has('intended.url')) {
                        $intendedUrl = Session::get('intended.url');
                        Session::forget('intended.url');
                        return redirect()->intended($intendedUrl);
                    }
                } else {
                    Auth::logout();
                    Session()->flash('alert-danger', "You have been deactivated from the ADMIN PANEL\nPlease contact the Admin to reinstate your privilages");
                    return redirect('admin/login');
                }
            } else {
                Auth::logout();
                Session()->flash('alert-danger', "You are not authorized to access the ADMIN PANEL");
                return redirect('admin/login');
            }
        } else {
            // Session()->flash('alert-danger', "Please Login in First");
            return redirect('admin/login');
        }

        return $next($request);
    }
}
