<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateAboutRequest;
use App\Models\About;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.about.index', ['item' => About::first()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdateAboutRequest $request)
    {
        $data = $request->all();

        About::create($data);
        return redirect()->route('about.index')->with('success', 'Հաջողությամբ ավելացել է');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('admin.about.edit', ['item' => $about]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAboutRequest $request, About $about)
    {
        $about->update($request->all());
        return redirect()->route('about.index')->with('success', 'Մեր մասին տվյալները հաջողությամբ փոփոխվել են');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
    }
}
