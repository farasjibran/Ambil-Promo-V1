<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // function show data user in array to use in datatable with ajax
    public function dataSug()
    {
        $contact = Contact::get();
        foreach ($contact as $value) {
            $tbody = array();
            $tbody[] = $value['id'];
            $tbody[] = $value['name'];
            $tbody[] = $value['email'];
            $tbody[] = $value['website'];
            $tbody[] = $value['message'];
            $data[] = $tbody;
        }
        if ($contact->count() >  0) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }
}
