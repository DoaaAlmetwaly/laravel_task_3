<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListTodo;

class ListController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data =   ListTodo::get();

       return view('list.index',['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('list.create');
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
        $data = $this->validate(request(),
        [
            "title"   => "required|min:5",
            "description" => "required|min:30",
            "startdate"   =>"required|date_format:m/d/y|after:tomorrow",
            "enddate"     =>"required|date_format:m/d/y|before_or_equal:startdate",
            "image"   => "required|image|mimes:png,jpg,gif,svg"
        ]);

        $FinalName = time().rand().'.'.$request->image->extension();



        # public folder
         if($request->image->move(public_path('images'),$FinalName)){

           $data['image'] = $FinalName;

           $op =  ListTodo::create($data);

           if($op){
               $message = "Raw Inserted";
           }else{
               $message = "Error Try Again";
           }

         }else{
             $message = "Error In Uploading Try Again";
         }

          session()->flash('Message',$message);

          return redirect(url('/ToDoList'));

 }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = ListTodo::find($id);
        return view('list.edit',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $this->validate(request(),
        [
            "title"   => "required|min:5",
            "description" => "required|min:30",
            "startdate"   =>"required|date_format:m/d/y|after:tomorrow",
            "enddate"     =>"required|date_format:m/d/y|before_or_equal:startdate",
            "image"   => "required|image|mimes:png,jpg,gif,svg"
        ]);


       /* $data['image'] = $Oldimage;

        if($request->image->move(public_path('images'),$FinalName)){*/



        $op =   ListTodo::where('id',$request->id)->update($data);
        if($op){
            $message = "Raw Inserted";
        }else{
            $message = "Error Try Again";}

            session()->flash('Message',$message);

          return redirect(url('/ToDoList'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = ListTodo::find($id);

         $op = ListTodo::where('id',$id)->delete();

          if($op){

             unlink(public_path('images/'.$data->image));

              $message = "Raw Removed";
          }else{
              $message = "Errot Try Again";
          }

          session()->flash('Message',$message);

          return redirect(url('/ToDoList'));
    }
}
