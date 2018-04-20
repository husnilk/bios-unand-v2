<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $user = User::find(1);
        $roles = $user->getRoleNames();
        return view('user.index');
    }
    
    public function userData()
    {
        $users = DB::table('users')
        ->select('users.id', 'users.username', 'users.name', DB::raw('roles.name as role'))
        ->from('users')
        ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
        ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
        ->where('model_has_roles.model_type', 'App\\User');
        
        
        return DataTables::of($users)
        ->addColumn('action', function ($user) {
            $buttonEdit = '<a href="' . route('user.edit', [$user->id]) . '" class="btn btn-default"><i class="ti-pencil"></i> </a>';
            // $buttonShow = '<a href="' . route('user.show', [$user->id]) . '" class="btn btn-default"><i class="ti-eye"></i></a>';
            $buttonDelete = "<a href='#' onclick='event.preventDefault();onClickDelete(\"".route('user.destroy', [$user->id])."\")' class='btn btn-danger'><i class='ti-trash'></i></a>";
            return $buttonEdit . " ".$buttonDelete;
        })
        ->make(true);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');
        $statuses = config('bios.status_user');
        $role = null;
        return view('user.create', compact('roles', 'statuses', 'role'));
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'status' => $request->input('status')
            ]);
            $user->assignRole($request->input('role'));
            $user->save();
            
            return redirect()->route('user.index');
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
            $user = User::find($id);
            $roles = Role::all()->pluck('name', 'id');
            $role = $user->getRoleNames()->first();
            $statuses = config('bios.status_user');
            return view('user.edit', compact('user', 'statuses', 'roles', 'role'));
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
            $user = User::find($id);
            $user->name= $request->input('name');
            $user->email = $request->input('email');
            $user->username= $request->input('username');
            if($request->password != ""){
                $user->password= bcrypt($request->input('password'));
            }
            $user->status= $request->input('status');
            $user->syncRoles($request->input('role'));

            $user->save();
            
            return redirect()->route('user.index');
        }
        
        /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function destroy($id)
        {
            User::find($id)->delete();
            return redirect()->route('user.index');
        }
    }
    