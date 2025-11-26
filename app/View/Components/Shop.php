<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Shop extends Component
{
    public $productos = [];

    public function __construct()
    {
        $path = storage_path('app/data/products.json');

        if (file_exists($path)) {
            $json = file_get_contents($path);
            $this->productos = json_decode($json, true) ?? [];
        }
    }

    public function render()
    {
        // aseguramos que la vista reciba $productos explícitamente
        return view('sections.home.shop', [
            'productos' => $this->productos,
        ]);
    }
}
