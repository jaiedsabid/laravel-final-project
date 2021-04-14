<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Subscription;
use App\Models\Transaction;
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
                "description" => "Making Subscription test payment."
        ]);

        session()->flash('success', 'Payment has been successfully processed.');

        $mytime = Carbon::now();

        $data = User::where('id',session()->get('id'))->first();
        $data->subscription_id = $id;
        $data->expire_date = $mytime->addDays(30);
        $data->save();


        return back();
    }

    public function projStripePay($id)
    {
        $id = Crypt::decrypt($id);
        $proj = Project::find($id);


        return view('stripe.projPay');
    }

    public function projStripePayVeri($id,Request $request)
    {
        if($request->cash=='' ||$request->cash <=5)
        {
            session()->flash('error', 'Please Enter The amount you want to pay.');
            return back();
        }

        $id = Crypt::decrypt($id);


        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * $request->cash,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Making Project test payment."
        ]);

        session()->flash('success', 'Payment has been successfully processed.');

        $data = User::where('id',session()->get('id'))->first();

        $trans = new Transaction;


        $trans->user_id = $data->id;
        $trans->amount = $request->cash;
        $trans->type = 'Stripe Card';
        $trans->project_id = $id;
        $trans->subscription_id = $data->subscription_id;
        $trans->status = 'Paid';

        $trans->save();

        return back();
    }
}
