<?php

namespace Illuminate\Foundation\Auth;

use App\Detail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        
        $this->validator($request->all())->validate();
        //dd($request->all());
        event(new Registered($user = $this->create($request->all())));
        $details = new Detail;
        $details->user_id = $user->id;
        $details->first_name = $request['first_name'];
        $details->last_name = $request['last_name'];
        $details->blood_group = $request['blood_group'];
        $details->division = $request['division'];
        $details->city = $request['city'];
        $details->phone = $request['phone'];
        $details->save();
        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
