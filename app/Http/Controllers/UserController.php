<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Role;
use App\Models\UserBlog;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class UserController extends Controller
{
    // function addUser()  {
    //     return view('register',["roles" => Role::all()]);
    // }
    function store(Request $request) {
        
        $user = new User;
        $user->name= $request->input("name");
        $user->email= $request->input("email");
        $user->password= Hash::make($request->password);
        $user->address= $request->input("address");
        $user->city= $request->input("city");
        $user->state= $request->input("state");
        $user->zip= $request->input("zip");
        $user->phone= $request->input("phone");
        $user->stripe_ID= $request->input("stripe_ID");
        $user->paypal_email= $request->input("paypal_email");
        $user->website= $request->input("website");
        $user->referral_code= $request->input("referral_code");
        // $user->save();
        // $role = $user->role;
        $role=Role::where('title', $request->input("role"))->first();
        if ($request->input("role") === "vendor") {
            
            $user->referral_code = $this->generateUniqueReferralCode(); // Generate a random referral code
            
        }
        if ($request->input("role") !== "vendor"){
        $referralCode = $request->input('referral_code');

        // Look up the vendor by referral code
        $vendor = User::where('referral_code', $referralCode)->where('role_id', 2)->first();

        if ($vendor) {
            // Associate the user with the vendor by setting the vendor_id and role_id
            $user->vendor_id = $vendor->id;
            $user->role_id = 3; // Set role_id to represent "members"
        } else {
            // Handle invalid referral code
            return redirect()->route('register')->with('error', 'Invalid referral code.');
        }
        $role->users()->save($user);

            return redirect()->route('login')->with('success','registeration successful, login now');
    }
    else{
        $role->users()->save($user);
        return redirect()->route('login')->with('success','registeration successful, login now');
    }

}    
    private function generateUniqueReferralCode()
{
    do {
        $referralCode = Str::random(8);
    } while (User::where('referral_code', $referralCode)->exists());

    return $referralCode;
}

   public function shopping_mall() {
    $usersWithVendorRole = User::whereHas('role', function ($user) {
        $user->where('title', 'vendor');
    })->get();
        return view('Shopping_mall',['usersWithVendorRole'=>$usersWithVendorRole]);
    }
  
    public function AllUser()  {
        return view('layouts.admin.Users.allUsers',['users'=>User::all()]);
    }

 
}
