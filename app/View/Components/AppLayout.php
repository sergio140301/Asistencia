<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    //yami
    public function render(): View
    {
        return view('layouts.app');
    }
}
