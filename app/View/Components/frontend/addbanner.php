<?php

namespace App\View\Components\frontend;

use App\Models\CMS;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class addbanner extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $data = CMS::where('id', 6)->first();
        return view('components.frontend.addbanner',compact('data'));
    }
}
