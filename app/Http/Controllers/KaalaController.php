<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Brother;
use App\Models\KaalaResponse;
class KaalaController extends Controller
{
    public function showlogin(){
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        $brother = Brother::where('name', $request->name)->first();
        if($brother && Hash::check($request->password, $brother->password)){
            session(['kaala_user' => $brother->name]);
            return redirect()->route('feed');
        }
        return back()->withErrors(['name' => 'Wrong name or password']);
    }

    public function showfeed(){
        if(!session('kaala_user')){
            return redirect()->route('login');
        }
        $todayResponse = KaalaResponse::whereDate('created_at', Carbon::today())->first();
        if($todayResponse){
         $message = 'Today feeding is already completed by ' . $todayResponse->name . ' at ' . Carbon::parse($todayResponse->created_at)->format('d M Y , h:i A');
             return view('feed', [
            'name' => session('kaala_user'),
            'message' => $message]);
        }
        return view('feed',['name' => session('kaala_user')]);
    }

    public function submitFeed(Request $request){
        if(!session('kaala_user')){
            return redirect()->route('login');

        }
        If(KaalaResponse::whereDate('created_at', Carbon::today())->exists()){
            return redirect()->route('feed')->with('message', 'Today feeding is already completed! Please come back tomorrow!');
        }
        $request->validate(['query' => 'required|in:yes,no']);

        $name = session('kaala_user');
        $time = Carbon::now()->format('d M Y , h:i A');

        KaalaResponse::create([
            'name' => session('kaala_user'),
            'query' => $request->input('query'),
        ]);

        if($request->input('query') === 'yes'){
            Mail::raw("
            🐾 Kaala Food Update!

            ✅ Feeding Completed!
            👤 Fed by : $name
            🕐 Time   : $time

            Kaala is happy now! 🐶
        ", function ($message) {
            $message->to('sidhikoff21@gmail.com')
                    ->subject('🐾 Kaala has been fed!');
        });
            return redirect()->route('thankyou');
        }
        return redirect()->route('feed')->with('message', 'Kaala is still hungry! Please give him food!');

    }

    public function thankYou(){
        if(!session('kaala_user')){
            return redirect()->route('login');
        }
        return view('thankyou');
    }

    public function logout(Request $request){
        $request->session()->forget('kaala_user');
        return redirect()->route('login');
    }

    public function show()
    {
        $responses = KaalaResponse::paginate(5);
        return view('list', ['responses' => $responses]);
    }
}
