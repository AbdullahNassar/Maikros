<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use LaravelPayfort\Traits\PayfortResponse as PayfortResponse;

class PayfortOrdersController extends Controller{
    use PayfortResponse;
    
    public function processReturn(Request $request){
        $payfort_callback = $this->handlePayfortCallback($request);
        # Here you can process the response and make your decision.
        # The response structure is as described in payfort documentation
        $payfort_feedback = $this->handlePayfortFeedback($request);
        // Cart::destroy();
        return view('site.pages.thanks.index', compact('payfort_callback','payfort_feedback'));
    }
}