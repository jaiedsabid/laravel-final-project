<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe;
use Session;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class StripeController extends Controller
{
    //
    public function handleGet($id)
    {

        $id = Crypt::decrypt($id);
        $cash = Subscription::find($id);
        $cash = $cash->price;
        return view('stripe.home')->with('id',$id)->with('cash',$cash);
    }

    /**
     * handling payment with POST
     */
    public function handlePost($id,Request $request)
    {
        $id = Crypt::decrypt($id);
        $cash = Subscription::find($id);
        $cash = $cash->price;

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * $cash,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Making test payment."
        ]);

        session()->flash('success', 'Payment has been successfully processed.');

        $mytime = Carbon::now();

        $data = User::where('id',session()->get('id'))->first();
        $data->subscription_id = $id;
        $data->expire_date = $mytime->addDays(30);
        $data->save();


        return back();
    }
}
