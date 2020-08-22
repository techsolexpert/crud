<?php

namespace App\Http\Controllers;

use App\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Form::orderBy('id','DESC')->get();
        return View('form',compact('data'));
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
        $name = $request->input('name');
        $email = $request->input('email');
        $department = $request->input('department');
        $qualification = implode(',',request('qualification'));
        $gender = $request->input('gender');

        $file = $request->file('gallary');
        $file_name = time().$file->getClientOriginalName();
        $file->move(public_path().'/uploads/', $file_name);

        $save = Form::create([
            'name'=>$name,
            'email'=>$email,
            'department'=>$department,
            'qualification'=>$qualification,
            'gender'=>$gender,
            'gallary'=>$file_name,
        ]);

        if($save){
            echo "Data saved successfully";
            return redirect('crud');
        }else{
            echo "Somthing went wrong";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Form::find($id);
        return View('edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $department = $request->input('department');
        $qualification = implode(',',request('qualification'));
        $gender = $request->input('gender');

        $file = $request->file('gallary');
        $file_name = time().$file->getClientOriginalName();
        $file->move(public_path().'/uploads/', $file_name);

        $save = Form::where('id',$id)->update([
            'name'=>$name,
            'email'=>$email,
            'department'=>$department,
            'qualification'=>$qualification,
            'gender'=>$gender,
            'gallary'=>$file_name,
        ]);

        if($save){
            echo "Data saved successfully";
            return redirect('crud');
        }else{
            echo "Somthing went wrong";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        $find = Form::find(request('id'));
        if($find->delete()){
            echo "Record deleted successfully";
            return redirect('crud');
        }else{
            echo "something went wrong";
        }
    }
}
