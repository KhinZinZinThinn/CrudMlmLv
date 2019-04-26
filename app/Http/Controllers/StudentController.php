<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function getStudentRecord(){
        $stus=Student::OrderBy('id','desc')->paginate("10");
        return view('StudentRecord')->with(['stus'=>$stus]);

    }

    public function postStudentRecord(Request $request){
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
     return redirect()->back()->with('info', 'The new student info has been inserted');
    }

    public function getPhoto($img_name){
            $file=Storage::disk('photo')->get($img_name);
            return response($file, 200);
    }

    public function getEditStudentRecord($id){
        $stus=Student::whereId($id)->firstOrFail();
        return view('updateStu')->with(['stus'=>$stus]);
    }

    public function postUpdateStudentRecord(Request $request){
        $img=$request->file('photo');
        $id=$request['id'];
        $stus=Student::whereId($id)->firstOrFail();
        if(!empty($img)){
            Storage::disk('photo')->delete($stus->photo);
            $img_name=$request['stu_name'].".".$request->file('photo')->getClientOriginalExtension();
            $stus->photo=$img_name;
            Storage::disk('photo')->put($img_name,file::get($img));
        }

        $stus->stu_name=$request['stu_name'];
        $stus->email=$request['email'];
        $stus->address=$request['address'];
        $stus->phone=$request['phone'];
        $stus->update();
        return redirect()->route('StudentRecord');

    }

    public function getDeleteStudentRecord(Request $request){
        $id=$request['id'];
        $stu=Student::whereId($id)->firstOrFail();
        Storage::disk('photo')->delete($stu->photo);
        $stu->delete();
        return redirect()->back();
    }


}
