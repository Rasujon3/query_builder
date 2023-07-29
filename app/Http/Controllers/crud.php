<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class crud extends Controller
{
    public function ShowIndex() {
        $sel = DB::table('student')->select()->get();
        return view('home', compact('sel'));
    }
    public function InsertData(Request $req) {
        $insert = DB::table('student')->insert([
            'name'=>$req->name,
            'email'=>$req->email,
            'dept'=>$req->dept,
        ]);
        if ($insert) {
            return redirect('/');
        } else {
            return 'Data insert failed';

        }
    }
    public function DeleteData($id) {
        $delete = DB::table('student')->where('id',$id)->delete();
        if ($delete) {
            return redirect('/');
        } else {
            return 'Data delete failed';

        }
    }
    public function EditData( $id) {
        $user = DB::table('student')->where('id',$id)->first();
        return view('edit',compact('user'));
    }
    public function UpdateData(Request $req, $id) {
        $update = DB::table('student')->where('id',$id)->update([
            'name'=>$req->name,
            'email'=>$req->email,
            'dept'=>$req->dept,
        ]);
        if ($update) {
            return redirect('/');
        } else {
            return "Update Failed";
        }

        return view('edit',compact('user'));
    }
}
