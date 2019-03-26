<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Program;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::all();

        foreach($programs as $program)
        {
            if(Carbon::today () > $program->date)
            {
                $program->status = "Event Over";
            }
            if(Carbon::today() == $program->date)
            {
                $program->status = "Ongoing";
            }
            if(Carbon::today() < $program->date)
            {
                $program->status = "Event yet to start";
            }
            /*if(Carbon::today() < $program->date)
            {
                $program->status = true;
            }
            else
            {
                $program->status = false;
            }*/
        }
        $context = [
            'programs' => $programs,
        ];

        return view('admin.index', $context);
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
