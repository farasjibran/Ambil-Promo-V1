<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // function show data user in array to use in datatable with ajax
    public function dataUser()
    {
        $users = User::get();
        foreach ($users as $value) {
            $tbody = array();
            $tbody[] = $value['id'];
            foreach ($value->Role as $item) {
                $tbody[] = $item->role;
            }
            $tbody[] = $value['name'];
            $tbody[] = $value['email'];
            if ($value['status_user'] == "Aktif") {
                $tbody[] = "<a style='color: green'>Aktif</a>";
            } else {
                $tbody[] = "<a style='color: red'>Tidak Aktif</a>";
            }
            $button =
                "<div class='table-data-feature'>
                <button class='item editbtn' id=" . $value['id'] . " title=Edit'>
                <i class='zmdi zmdi-edit' style='color: blue;'></i>
                </button>
                <button type='button' class='item deletebtn' id=" . $value['id'] . " data-toggle='tooltip' data-placement='top' title='Delete'>
                    <i class='zmdi zmdi-delete' style='color: red;'></i>
                </button>
                </div>";
            $tbody[] = $button;
            $data[] = $tbody;
        }
        if ($users->count() > 0) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    // function add data user
    public function addUser(Request $request)
    {
        if ($_POST["action"] == "Add") {
            $user = new User();
            $user->id_role = $request->role;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->status_user = $request->status;
            $user->save();
            echo ('Data sukses disimpan!');
        }
    }

    // function get data id user
    public function getIdUser()
    {
        $output = array();
        $user = User::find($_POST["id"]);
        $output['id_role'] = $user->id_role;
        $output['name'] = $user->name;
        $output['email'] = $user->email;
        $output['password'] = $user->password;
        echo json_encode($output);
    }

    // function edit data user
    public function editUser(Request $request)
    {
        if ($_POST["action"] == "Edit") {
            $iduser = $request->id;
            $user = User::find($iduser);
            $user->id_role = $request->role;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->status_user = $request->status;
            $user->save();
            echo ('Data sukses di edit!');
        }
    }

    public function deleteUser()
    {
        $user = User::find($_POST["id"]);
        $user->delete();
    }

    public function viewLogin()
    {
        $user = DB::table('users')->select('status_user')->where('id', Auth::id())->first();
        if ($user) {
            return redirect()->route('dashboard');
        } else {
            return view('auth.login');
        }
    }
}
