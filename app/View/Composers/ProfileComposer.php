<?php

namespace App\View\Composers;

use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileComposer
{
    public function compose(View $view)
    {
        /*$view->with('users', $profiles = Client::find(Auth::guard('web')->user()->id));*/
    }
}
