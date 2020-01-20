<?php

namespace App\Http\Controllers;

use App\Detail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Contracts\Validation\Validator 
     */
     
    protected function validator(array $data,$id)
    {
        $user  = User::find($id)->detail;
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'blood_group' =>['required'],
            'division' =>['required','string'],
            'city' => ['required', 'string', 'max:100'],
            'phone' => ['required','digits_between:11,13', 'unique:details,phone,'.$user->id],
            
            
        ]);
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $details = $user->detail;
       //details($detail->phone);
        return view('users.profile')->withdetails($details)->withuser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $details = $user->detail;
       return view('users.edit')->withdetails($details)->withuser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator($request->all(),$id)->validate();
        $user = User::find($id);
        $details = $user->detail;
        $user->name = $request['first_name']." ".$request['last_name'];
        $user->email = $request['email'];
        if($request->has('password'))
        $user->password = Hash::make($request['password']);
        $user->save();
        $details->user_id = $user->id;
        $details->first_name = $request['first_name'];
        $details->last_name = $request['last_name'];
        $details->blood_group = $request['blood_group'];
        $details->division = $request['division'];
        $details->city = $request['city'];
        $details->phone = $request['phone'];
        $details->save();
        return view('users.profile')->withdetails($details)->withuser($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail $detail)
    {
        //
    }
}
