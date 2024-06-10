<?php

namespace Tuyennt\Asm2Oop\Controllers\Client;

use Tuyennt\Asm2Oop\Commons\Controller;
use Tuyennt\Asm2Oop\Commons\Helper;
use Tuyennt\Asm2Oop\Models\Product;

class HomeController extends Controller
{

    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function index()
    {
        $products = $this->product->all();
        // Helper::debug($products);
        $name = 'Tuyennt';

        $this->renderViewClient('home',[
            'name' => $name,
            'products' => $products,
        ]);
    }
}
