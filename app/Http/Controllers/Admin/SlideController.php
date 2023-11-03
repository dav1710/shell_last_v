<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreSlideRequest;
use App\Http\Requests\UpdateSlideRequest;
use App\Models\Slide;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.slide.index', ['slides' => Slide::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSlideRequest $request)
    {
        $data = $request->all();

        $filename = $request->file('img')->hashName();
        Image::make($request->file('img'))->resize(1920, 720)->save(public_path('storage/uploads/slide/' . $filename));
        $data['img'] = $filename;

        Slide::create($data);
        return redirect()->route('slide.index')->with('success', 'Սլայդը հաջողությամբ ավելացել է');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slide $slide)
    {
        return view('admin.slide.edit', ['item' => $slide]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSlideRequest $request, Slide $slide)
    {
        File::delete(public_path('storage/uploads/slide/' . $slide->img));
        $filename = $request->file('img')->hashName();
        Image::make($request->file('img'))->resize(1920, null, function ($c) {
            $c->aspectRatio();
            $c->upsize();
        })->save(public_path('storage/uploads/slide/' . $filename));
        $slide->img = $filename;

        $slide->update();
        return redirect()->route('slide.index')->with('success', 'Սլայդը հաջողությամբ փոփոխվել է');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slide $slide)
    {
        File::delete(public_path('storage/uploads/slide/' . $slide->img));
        $slide->delete();
        return redirect()->route('slide.index')->with('success', 'Սլայդը հաջողությամբ ջնջվել է');
    }
}
