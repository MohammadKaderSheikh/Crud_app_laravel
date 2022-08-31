<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student_details;
class crudController extends Controller
{
    public function SelectAll(){
        $result = student_details::all();
        return response()->json($result);

    }
    public function SendData(Request $request){
        $name = $request->input('name');
        $roll =$request->input('roll');
        $pass = $request->input('pass');
        $mobile = $request->input('mobile');
        $count =student_details::where("name",$name)->count();
        if ($count>0){
            return "User name alredy exist ";
       }else{
           $result = student_details::insert(["name"=>$name,"roll"=>$roll,"pass"=>$pass,"mobile"=>$mobile]);
           if($result){
               return "data inserted success fully ";
           }else{
              return "data not inserted ";
           }
       }
        
        
    }
    public function Update(Request $request){
        $name = $request->input('name');
        $roll =$request->input('roll');
        $pass = $request->input('pass');
        $mobile = $request->input('mobile');
        $count =student_details::where("name",$name)->count();
        if($count>0){
            $result= student_details::Where('name',$name)->update(["name"=>$name, "roll"=>$roll, "pass"=>$pass, "mobile"=>$mobile]);
            if($result==true){
                return $name . "s data updated successfuly";
            }else{
                return "data not updated ";
            }
        }else{
            return "User not found try again";
        }
        

    }
    public function Delete($id){  
        $count =student_details::where("id",$id)->count();
        if($count>0){
            $result=student_details::Where('id', $id)->delete();
            if($result){
                return "data delete succesfully";
            }else{
                return " data not deleted";
            }
        }else{
            return "user not found";
        }
        
    }
}
