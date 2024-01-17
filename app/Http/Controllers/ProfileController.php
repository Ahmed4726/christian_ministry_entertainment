<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\UserBlog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     * 
     * 
     */
    public function admin_profile()
    {
        return view('layouts.admin.profile.profile' );
    }
    public function client_profile()
    {
        $user = auth()->user();
        $balance = User::where('balance',$user->balance)->first();
        $blogs = UserBlog::where('user_id', $user->id)
            ->where('status', '1')
            ->get();
        return view('client.profile.client_profile', compact('user', 'blogs','balance'));
    }
    public function vendor_profile()
    {
        $user = auth()->user();
        $balance = User::where('balance',$user->balance)->first();
        // $vendors = User::whereHas('roles', function ($user) {
        //     $user->where('title', 'vendor');
        // })->withCount('orders')->get();        
        $blogs = UserBlog::where('user_id', $user->id)
            ->where('status', '1')
            ->get();
            $vendor = auth()->user();
            $referralUserCount = User::where('vendor_id', $vendor->id)->count();
        return view('layouts.vendors.profile.vendor_profile', compact('user', 'blogs','vendor','referralUserCount','balance'));
    }
    public function edit_admin($id)
    {
       $user= Auth::user();
        return view("layouts.admin.profile.editProfile",compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update_admin(Request $request,$id) 
    {
        {
           $user = auth()->user()->id;
            $name=$request->input("name");
            $email=$request->input("email");
            $address=$request->input("address");
            $city=$request->input("city");
            $state=$request->input("state");
            $zip=$request->input("zip");
            $phone=$request->input("phone");
            $website=$request->input("website");
            $stripe_ID=$request->input("stripe_ID");
            $paypal_email=$request->input("paypal_email");
            $user=User::findorfail($id);
            if( 
                $user->name == $name && 
                $user->email==$email && 
                $user->city==$city &&
                $user->address == $address && 
                $user->state == $state &&
                $user->zip == $zip &&
                $user->phone == $phone &&
                $user->website == $website &&
                $user->paypal_email == $paypal_email &&
                $user->stripe_ID == $stripe_ID )

            {
                $message="No changes occur";
                return redirect()->route('admin.profile.read')->with('success','No changes occur');
            }
            else{
                $user->name = $name;  
                $user->email=$email;  
                $user->city=$city;
                $user->address = $address;
                $user->state = $state;
                $user->zip = $zip;
                $user->phone = $phone;
                $user->website = $website;
                $user->paypal_email = $paypal_email;
                $user->stripe_ID = $stripe_ID ;
                $user->save();
                return redirect()->route('admin.profile.read')->with('success','Profile updated successfully');
            }
        }
    }

    public function edit_vendor($id)
    {
       $user= Auth::user();
        return view("layouts.vendors.profile.editvendor_profile",compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update_vendor(Request $request,$id) 
    {
        {
           $user = auth()->user()->id;
            $name=$request->input("name");
            // $email=$request->input("email");
            $address=$request->input("address");
            $city=$request->input("city");
            $state=$request->input("state");
            $zip=$request->input("zip");
            $phone=$request->input("phone");
            $website=$request->input("website");
            $stripe_ID=$request->input("stripe_ID");
            $paypal_email=$request->input("paypal_email");
            $user=User::findorfail($id);
            if( 
                $user->name == $name && 
                // $user->email==$email && 
                $user->city==$city &&
                $user->address == $address && 
                $user->state == $state &&
                $user->zip == $zip &&
                $user->phone == $phone &&
                $user->website == $website &&
                $user->paypal_email == $paypal_email &&
                $user->stripe_ID == $stripe_ID )

            {
                $message="No changes occur";
                return redirect()->route('vendor.profile.read')->with('success','No changes occur');
            }
            else{
                $user->name = $name;  
                // $user->email=$email;  
                $user->city=$city;
                $user->address = $address;
                $user->state = $state;
                $user->zip = $zip;
                $user->phone = $phone;
                $user->website = $website;
                $user->paypal_email = $paypal_email;
                $user->stripe_ID = $stripe_ID ;
                $user->save();
                return redirect()->route('vendor.profile.read')->with('success','Profile updated successfully');
            }
        }
    }
    public function client_edit($id)
    {
       $user= Auth::user();
        return view("client.profile.edit",compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function client_update(Request $request,$id) 
    {
        {
           $user = auth()->user()->id;
            $name=$request->input("name");
            // $email=$request->input("email");
            $address=$request->input("address");
            $city=$request->input("city");
            $state=$request->input("state");
            $zip=$request->input("zip");
            $phone=$request->input("phone");
            $website=$request->input("website");
            $stripe_ID=$request->input("stripe_ID");
            $paypal_email=$request->input("paypal_email");
            $user=User::findorfail($id);
            if( 
                $user->name == $name && 
                // $user->email==$email && 
                $user->city==$city &&
                $user->address == $address && 
                $user->state == $state &&
                $user->zip == $zip &&
                $user->phone == $phone &&
                $user->website == $website &&
                $user->paypal_email == $paypal_email &&
                $user->stripe_ID == $stripe_ID )

            {
                $message="No changes occur";
                return redirect()->route('client.profile.read')->with('success','No changes occur');
            }
            else{
                $user->name = $name;  
                // $user->email=$email;  
                $user->city=$city;
                $user->address = $address;
                $user->state = $state;
                $user->zip = $zip;
                $user->phone = $phone;
                $user->website = $website;
                $user->paypal_email = $paypal_email;
                $user->stripe_ID = $stripe_ID ;
                $user->save();
                return redirect()->route('client.profile.read')->with('success','Profile updated successfully');
            }
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
