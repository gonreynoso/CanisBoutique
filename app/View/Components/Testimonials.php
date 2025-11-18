<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Testimonials extends Component
{
    public $testimonials = [];

    public function __construct()
    {
        $path = storage_path('app/data/testimonials.json');

        if (file_exists($path)) {
            $this->testimonials = json_decode(file_get_contents($path), true) ?? [];
        }
    }

    public function render()
    {
        return view('components.testimonials', [
            'testimonials' => $this->testimonials,
        ]);
    }
}
