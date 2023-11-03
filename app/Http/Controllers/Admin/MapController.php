<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MapRequest;
use App\Models\Map;
use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $map = Map::all();
        return view('admin.map.index', compact('map'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.map.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MapRequest $request)
    {
        $data = $request->all();
        Map::create($data);
        return redirect()->route('map.index')->with('success', 'Հասցեն հաջողությամբ ավելացել է');
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
    public function edit(Map $map)
    {
        return view('admin.map.edit', ['item' => $map]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MapRequest $request, Map $map)
    {
        $data = $request->all();
        $map->update();
        return redirect()->route('map.index')->with('success', 'Հասցեն հաջողությամբ ավելացել է');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Map $map)
    {
        $map->delete();
        return redirect()->route('map.index')->with('success', 'Հաջողությամբ ջնջվել է');
    }
}
