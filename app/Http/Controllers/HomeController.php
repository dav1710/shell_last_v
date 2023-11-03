<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\Product;
use App\Models\Service;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        $product = Product::all();
        $service = Service::all();
        $slides = Slide::all();
        $about = About::all();
        $contacts = Contact::all();
        return view('home', compact('product', 'service', 'slides', 'about', 'contacts'));
    }
    public function product() {
        $product = Product::paginate(4);
        $contacts = Contact::all();
        return view('product', compact('product', 'contacts'));
    }
    public function faq() {
        $faq = Faq::all();
        $contacts = Contact::all();
        return view('faq', compact('faq', 'contacts'));
    }
    public function search(Request $request) {
        $contacts = Contact::all();
        $search_result = Product::where('title_am', 'like', '%' . $request->search . '%')
                                ->orWhere('title_en', 'like', '%' . $request->search . '%')
                                ->orWhere('content_am', 'like', '%' . $request->search . '%')
                                ->orWhere('content_en', 'like', '%' . $request->search . '%')
                                ->paginate(12);
        return view('search', compact('search_result', 'contacts'));
    }
}
