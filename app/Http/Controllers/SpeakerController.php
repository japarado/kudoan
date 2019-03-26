<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\File;
use Illuminate\Http\Request;

use App\Speaker;

class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $speakers = Speaker::all();

        $context = [
            'speakers' => $speakers,
        ];

        return view('speaker.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('speaker.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $desc = $request->input('desc');
        $picture = $request->file('picture');

        $speaker = new Speaker;

        $speaker->name = $name;
        $speaker->desc = $desc;

        $speaker->save();

        $path = Storage::put("public/speaker/$speaker->id", $picture);

        $speaker->picture = basename($path);

        $speaker->save();

        return redirect()->action('SpeakerController@edit', [$speaker]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $speaker = Speaker::find($id);

        $picture = asset("storage/speaker/$speaker->id/$speaker->picture");

        $context = [
            'speaker' => $speaker,
            'picture' => $picture,
        ];

        return view('speaker.show', $context);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $speaker = Speaker::find($id);

        $picture = asset("storage/speaker/$speaker->id/$speaker->picture");

        $context = [
            'speaker' => $speaker,
            'picture' => $picture,
        ];

        return view('speaker.edit', $context);
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
        $speaker = Speaker::find($id);

        $name = $request->input('name');
        $desc = $request->input('desc');
        $picture = $request->file('picture');

        $speaker->name = $name;
        $speaker->desc = $desc;
        $speaker->save();

        $path = Storage::put("public/speaker/{$speaker->id}", $picture);

        $speaker->picture = $path ? basename($path) : "public/speaker/$speaker->id/$speaker->logo";

        $speaker->save();

        return redirect()->action('SpeakerController@edit', $speaker);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Speaker::destroy($id);

        return redirect()->action('SpeakerController@index');
    }
}
