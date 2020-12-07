<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {
        if($this->checkAdmin() ==true){return view('welcome');};
        if($name =='create_admin'){
            // dd($this->checkAdmin());
            // return redirect(route('/'));
            $adminDetails =[
                'name'=>'Admin',
                'email'=>'Admin@'.request()->getHost(),
                'password'=>bcrypt('password'),
            ];
            $admin = new User();
            $admin->name =$adminDetails['name'];
            $admin->email =$adminDetails['email'];
            $admin->password =$adminDetails['password'];
            $admin->save();

            return 'Admin created successfully'.'<br>'. 'check '.$admin->email.' for login details ';
        }

        return false;
    }

    protected function checkAdmin(){
        $adminIsNotAvailable= user::where('name','Admin')->first();
        if(is_null($adminIsNotAvailable)){

            return false;
        }
        return true;
    }
    public function adminDashboard(){
        return 'this is admin and developer page';
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
    }
}
