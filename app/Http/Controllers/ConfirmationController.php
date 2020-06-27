<?php

namespace App\Http\Controllers;


class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! session()->has('success_message')) {
            return redirect('/');
        }

        return view('thankyou');
    }
}
