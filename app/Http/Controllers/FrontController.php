<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ticket;
use App\Models\Seller;
use App\Services\FrontService;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    protected $frontService;

    public function __construct(FrontService $frontService) {
        $this->frontService = $frontService;
    }

    //konsep service repository pattern
    public function index() {
        $data = $this->frontService->getFrontPageData();
        return view('front.index', $data);
        // dd($data);
    }

    //model binding
    public function details(Ticket $ticket) {
        return view('front.details', compact('ticket'));
        // dd($ticket);
    }

    public function category(Category $category) {
        return view('front.category', compact('category'));
        // dd($category);
    }
    public function explore(Seller $seller) {
        return view('front.seller', compact('seller'));
        // dd($seller);
    }

    //konsep mvc
    // public function index() {
    //     $categories = Category::latest()->get();
    //     $popular_ticket = Ticket::where('is_popular', true)->take(4)->get();
    //     $new_tickets = Ticket::latest()->get();
    //     return view('front.index', compact('categories', 'popular_tickets', 'new_tickets'));
    // }

}
