<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Program;
use App\Speaker;
use App\Sponsor;

class ProgramController extends Controller
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

        $context = [
            'programs' => $programs,
        ];

        return view('program.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $context = [
            'speakers' => Speaker::all(),
            'sponsors' => Sponsor::all(),
        ];

        return view('program.create', $context);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $program = new Program;

        $program->name = $request->input('name');
        $program->date = $request->input('date');
        $program->time_from = $request->input('time_from');
        $program->time_to = $request->input('time_to');
        $program->what_is = $request->input('what_is');
        $program->objective = $request->input('objective');
        $program->program = $request->input('program');
        $program->admin_id = auth()->user()->id;

        $sponsors = $request->input('sponsors');
        $speakers = $request->input('speakers');

        return gettype($sponsors);

        $program->save();
        //
        // Retrieve the M:N Relationship data. Using sync() will set them up anew rather than simply appending the new data
        $program->speakers()->sync($speakers);
        $program->sponsors()->sync($sponsors);

        return view('program.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Program::find($id);

        $context = [
            'program' => $program
        ];

        return view('program.show');
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
