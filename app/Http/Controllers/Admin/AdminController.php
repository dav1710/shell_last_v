<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Service;
use App\Models\Slide;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'slide_count' => Slide::count(),
            'service_count' => Service::count(),
            'product_count' => Product::count(),
        ]);
    }
}
