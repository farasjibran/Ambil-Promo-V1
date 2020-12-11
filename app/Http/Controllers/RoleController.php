<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    // function show data user in array to use in datatable with ajax
    public function dataRole()
    {
        $role = Role::get();
        foreach ($role as $value) {
            $tbody = array();
            $tbody[] = $value['id'];
            $tbody[] = $value['role'];
            $tbody[] = $value['deskripsi'];
            $button =
                "<div class='table-data-feature'>
             <button class='item editbtnrole' id=" . $value['id'] . " title=Edit'>
             <i class='zmdi zmdi-edit' style='color: blue;'></i>
             </button>
             <button type='button' class='item deletebtnrole' id=" . $value['id'] . " data-toggle='tooltip' data-placement='top' title='Delete'>
                 <i class='zmdi zmdi-delete' style='color: red;'></i>
             </button>
             </div>";
            $tbody[] = $button;
            $data[] = $tbody;
        }
        if ($role->count() > 0) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    // function add role
    public function addRole(Request $request)
    {
        if ($_POST["action"] == "Add") {
            $role = new Role();
            $role->role = $request->role;
            $role->deskripsi = $request->deskripsi;
            $role->save();
            echo 'Data Inserted';
        }
    }

    // function get id role
    public function getIdRole()
    {
        $output = array();
        $data = Role::find($_POST["id"]);
        $output['role'] = $data->role;
        $output['deskripsi'] = $data->deskripsi;
        echo json_encode($output);
    }

    // function edit role
    public function editRole(Request $request)
    {
        if ($_POST["action"] == "Edit") {
            $idrole = $request->id;
            $role = Role::find($idrole);
            $role->role = $request->role;
            $role->deskripsi = $request->deskripsi;
            $role->save();
            echo 'Data Updated';
        }
    }
}
