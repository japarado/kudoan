<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

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
        $program->admin_id = auth()->user()->admin->user_id;


        $sponsors = $request->input('sponsors');
        $speakers = $request->input('speakers');


        $program->save();

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
        $sponsors = Sponsor::all();
        $speakers = Speaker::all();

        $context = [
            'program' => $program,
            'sponsors' => $sponsors,
            'speakers' => $speakers
        ];

        return view('program.show', $context);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $program = Program::find($id);

        $taken_sponsors = DB::table('program_sponsor')->select('sponsor_id')->where('program_id', '=', $id)->get();
        $taken_speakers = DB::table('program_speaker')->select('speaker_id')->where('program_id', '=', $id)->get();

        $taken_sponsor_ids = [];
        $taken_speaker_ids = [];

        foreach($taken_sponsors as $taken_sponsor)
        {
            array_push($taken_sponsor_ids, $taken_sponsor->sponsor_id);
        }

        foreach($taken_speakers as $taken_speaker)
        {
            array_push($taken_speaker_ids, $taken_speaker->speaker_id);
        }

        $sponsors = Sponsor::whereNotIn('id', $taken_sponsor_ids)->get();
        $speakers = Speaker::whereNotIn('id', $taken_speaker_ids)->get();

        $context = [
            'program' => $program,
            'sponsors' => $sponsors,
            'speakers' => $speakers,
        ];

        return view('program.edit', $context);
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
        $program = Program::find($id);

        $program->name = $request->input('name');
        $program->date = $request->input('date');
        $program->time_from = $request->input('time_from');
        $program->time_to = $request->input('time_to');
        $program->what_is = $request->input('what_is');
        $program->objective = $request->input('objective');
        $program->program = $request->input('program');
        $program->admin_id = auth()->user()->admin->user_id;


        $sponsors = $request->input('sponsors');
        $speakers = $request->input('speakers');

        $program->save();

        return redirect('program.edit', ['id' => $id]);
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
