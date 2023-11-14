<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    //gjgj
    public function render(): View
    {
        return view('layouts.app');
    }
}
