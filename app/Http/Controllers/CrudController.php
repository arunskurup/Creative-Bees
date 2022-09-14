<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Config;
use Redirect;
use DB;
class CrudController extends Controller
{
    //List Employee data
    public function list(){
        $employee = Employee::all();
        return view('Crud',['employee' => $employee]);
    }

    public function Create(Request $request){
        // dd($request->all());

        $create = new Employee;
        $create->firstname = $request->first;
        $create->lastname = $request->last;
        $create->date_of_birth = $request->dob;
        $create->education_qualification = $request->qualification;
        $create->address= $request->address;
        $create->email = $request->email;
        $create->phone = $request->phone;

        if($request->file('resume'))
             {
            $file = $request->file('resume');
            $filename = time() . '.' . $request->file('resume')->extension();
            $filePath = public_path() . '/pdf/uploads/';
            $file->move($filePath, $filename);

            $create->resume  = '/pdf/uploads/'.$filename;
               }
               if($request->file('image'))
             {
            $file = $request->file('image');
            $filename = time() . '.' . $request->file('image')->extension();
            $filePath = public_path() . '/image/uploads/';
            $file->move($filePath, $filename);

            $create->photo  = '/image/uploads/'.$filename;
               }

        $create->save();
         return redirect()->back();


    }


    public function update($id){
        $employee =  Employee::where('employee_id',$id)->first();
        return view('Update',['employee' => $employee]);
    }


  //Update
    public function updated(Request $request){

        // $create =  Employee::where('employee_id',$request->id)->first();
        // $create->fill([
        //     'firstname' => $request->first,
        //     'lastname' => $request->last,
        //     'date_of_birth' => $request->dob,
        //     'education_qualificatio' => $request->qualification,
        //     'address' => $request->address,
        //     'email' => $request->email,
        //     'phone' =>  $request->phone,
        // ])->save();
        // $create->firstname = $request->first;
        // $create->lastname = $request->last;
        // $create->date_of_birth = $request->dob;
        // $create->education_qualification = $request->qualification;
        // $create->address= $request->address;
        // $create->email = $request->email;
        // $create->phone = $request->phone;
        $update = DB::update('update `employees` SET `firstname` = "'.$request->first.'",`lastname` = "'.$request->last.'",`date_of_birth` = "'.$request->dob.'",`address` = "'.$request->address.'",`email` = "'.$request->email.'",`phone` = "'.$request->phone.'", `education_qualification` = "'. $request->qualification.'" WHERE `employee_id` = '.$request->id.'');


        if($request->file('resume'))
             {
            $file = $request->file('resume');
            $filename = time() . '.' . $request->file('resume')->extension();
            $filePath = public_path() . '/pdf/uploads/';
            $file->move($filePath, $filename);
            $update = DB::update('update `employees` SET  `resume` = "'. '/pdf/uploads/'.$filename.'" WHERE `employee_id` = '.$request->id.'');

               }
               if($request->file('image'))
             {
            $file = $request->file('image');
            $filename = time() . '.' . $request->file('image')->extension();
            $filePath = public_path() . '/image/uploads/';
            $file->move($filePath, $filename);
            $update = DB::update('update `employees` SET  `photo` = "'. '/image/uploads/'.$filename.'" WHERE `employee_id` = '.$request->id.'');

               }

        //return Redirect::to('/')->with(['type' => 'error','message' => 'Your message'])->withInput(Input::except('password'));
        return Redirect::to('Employee/List');

    }




    public function info($id){
        $employee =  Employee::find($id);
        return $this->SuccessResponse($employee);
    }


// Delete
    public function delete($id){
        $delete =  Employee::where('employee_id',$id)->delete();
        return redirect()->back();
    }


   public function Show($id){
    $show =  Employee::where('employee_id',$id)->first();
    return view('View',['employee' => $show]);
   }

    private function SuccessResponse($employee)
    {
        return response()->json(
            [
                'success' => true,
                'data' => $employee
            ],
            200
        );
    }
}
