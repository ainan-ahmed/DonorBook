<?php

namespace App\Http\Controllers;

use App\Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\User;
class searchController extends Controller
{
    public function getSearch(){
        return view('search');
    }
    public function searchDonor(Request $request){
         
        if($request->ajax())
        {
            $blood = $request->get('blood');
            $division = $request->get('division');
            //console.log($blood);
            //console.log($division);
            $f1=true;
            $f2=true; 
            $body='';   
            $head='';
            if($blood == "Select blood group")$f1 = false;
            if($division == "Select division")$f2 = false;


            
            if($blood=="All" || $division== "All")
            {
                if(($blood=="All" && $division == "All")|| ($blood=="All" && $f2==false) || ($division =="Al" && $f1 == false))
                    $list = Detail::all();     
                else if($blood == "All")
                    $list = Detail::all()->where('division',$request->division);    
                else 
                    $list = Detail::all()->where('blood_group',$request->blood);
            }
            else if($f1 && $f2)
            $list = Detail::all()->where('blood_group',$request->blood)->where('division',$request->division);
            else if($f1)
            $list = Detail::all()->where('blood_group',$request->blood);
            else if($f2)
            $list = Detail::all()->where('division',$request->division);
            else{
                $head = "<h2 class='text-center font-weight-bolder' style='color:red'>No Donor Found. </h2>";
            }
            if($list->count() >0)
            {
                $head = "<tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Blood Group</th>
                    <th>Division</th>
                    <th>City</th>
                    <th>Phone</th>

                </tr>";
                foreach($list as $donor)
                {
                    $user =User::find($donor->user_id);
                    //$name =  $donor->user->name;
                   // console.log($email);
                    $body.= "
                    <tr>
                    <td>$user->name</td>
                    <td>$user->email</td>
                    <td>$donor->blood_group</td>
                    <td>$donor->division</td>
                    <td>$donor->city</td>
                    <td>$donor->phone</td>
                    </tr>
                    ";
                }
            }
            $data = array(
                'head'=>$head,
                'body'=>$body,
            );


        }
        //console.log($data->head);
       // console.log($data->body);
        return Response($data);
    }
    
}
