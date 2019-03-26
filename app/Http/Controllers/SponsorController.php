<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\File;
use Illuminate\Http\Request;

use App\Sponsor;

class SponsorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsors = Sponsor::all();

        $context = [
            'sponsors' => $sponsors,
        ];

        return view('sponsor.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('sponsor.create');
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
        $logo = $request->file('logo');

        $sponsor = new Sponsor;

        $sponsor->name = $name;
        $sponsor->desc = $desc;
        $sponsor->save();

        $path = Storage::put("public/sponsor/{$sponsor->id}", $logo);

        $sponsor->logo = basename($path);

        $sponsor->save();

        return redirect()->action('SponsorController@edit', $sponsor);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sponsor = Sponsor::find($id);

        $logo = asset("storage/sponsor/$sponsor->id/$sponsor->logo");

        $context = [
            'sponsor' => $sponsor,
            'logo' => $logo,
        ];

        return view('sponsor.show', $context);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sponsor = Sponsor::find($id);

        $logo = asset("storage/sponsor/$sponsor->id/$sponsor->logo");

        $context = [
            'sponsor' => $sponsor,
            'logo' => $logo,
        ];

        return view('sponsor.edit', $context);
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
        $name = $request->input('name');
        $desc = $request->input('desc');
        $logo = $request->file('logo');

        $sponsor = Sponsor::find($id);

        $sponsor->name = $name;
        $sponsor->desc = $desc;
        $sponsor->save();

        $path = Storage::put("public/sponsor/{$sponsor->id}", $logo);

        $sponsor->logo = basename($path);

        $sponsor->save();

        return redirect()->action('SponsorController@edit', $sponsor);
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
