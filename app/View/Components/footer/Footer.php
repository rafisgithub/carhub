<?php

namespace App\View\Components\footer;

use App\Models\socialMedia;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
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
        $data = socialMedia::where('status', 1)->get();
        return view('components.footer.footer',compact('data'));
    }
}
