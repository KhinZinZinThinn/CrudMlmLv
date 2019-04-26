<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    public function getAll(){
        $data=Student::all();
        return response()->json($data);
    }

    public function getDelete($id){
        $data=Student::whereId($id)->firstOrFail();
        if($data){
            $data->delete();
            return response()->json("Deleted");
        }else{
            return response()->json("No data");
        }

    }

    public function getInsertStudentRecord(Request $request){
        $this->validate($request,[
            'stu_name'=>'required',
            'email'=>'required|email',
            'address'=>'required',
            'phone'=>'required',
            'photo'=>'required'
        ]);


        $img_name=date('d-m-y-h-i-s').'.'.$request->file('photo')->getClientOriginalExtension();
        $img_file=$request->file('photo');
        $stu=new Student();
        $stu->stu_name=$request['stu_name'];
        $stu->email=$request['email'];
        $stu->address=$request['address'];
        $stu->phone=$request['phone'];
        $stu->photo=$img_name;
        // dd($stu->stu_name, $stu->email);
        $stu->save();

        Storage::disk('photo')->put($img_name, File::get($img_file));
        return response()->json('Created');

    }
}
