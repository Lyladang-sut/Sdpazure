<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User, TrainingProvider};
use DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = [
            'providers' => TrainingProvider::get()->pluck('Name organization_institution', 'ID'),
        ];

        return view('user.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create(inputs($request->except('_token', 'method')));

        return redirect()->route('user.edit', $user->ID)->with('message', 'You created user information successfuly');
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
        $data = [
            'user' => User::findOrFail($id),
            'providers' => TrainingProvider::get()->pluck('Name organization_institution', 'ID'),
        ];

        return view('user.edit')->with($data);
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
        $user = User::findOrFail($id);

        if($request->input('password')){
            $user->update(['password' => \Hash::make($request->input('password'))]);
        }
        $user->update(inputs($request->except('_token', 'method', 'password')));

        return redirect()->route('user.edit', $user->ID)->with('message', 'You updated user information successfuly');
    }

    public function delete($id)
    {
        $user     = User::findOrFail($id);
        return view('user.delete', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('message', 'You have deleted user successfully');
    }

    /**
     * DataTables Init
     */
    public function datatable()
    {
        return DataTables::of(User::query())
        ->addColumn('action', function ($user) {
            $action = '';
            if(\Auth::user()->role == 'Administrator'):            
                $action     .= "<a href='".route('user.edit', ['user' => $user->ID])."' class='btn btn-raised btn-sm btn-primary'><i class='ti-pencil'></i></a> ";
                $action     .= "<a href='".route('user.delete', ['user' => $user->ID])."' class='btn btn-raised btn-sm btn-danger'><i class='ti-trash'></i></a> ";
            endif;
            return $action;
        })
        ->make(true);
    }

}