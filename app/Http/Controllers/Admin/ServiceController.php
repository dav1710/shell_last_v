<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.service.index', ['services' => Service::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('img')) {
            $filename = $request->file('img')->hashName();
            Image::make($request->file('img'))->resize(64, 74, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('storage/uploads/service/' . $filename));
            $data['img'] = $filename;
        }

        Service::create($data);
        return redirect()->route('service.index')->with('success', 'Սերվիսը հաջողությամբ ավելացել է');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.service.edit', ['item' => $service]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $data = $request->all();

        if ($request->hasFile('img')) {
            if ($service->img) {
                File::delete(public_path('storage/uploads/service/' . $service->img));
            }

            $filename = $request->file('img')->hashName();
            Image::make($request->file('img'))->resize(64, 74, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('storage/uploads/service/' . $filename));
            $data['img'] = $filename;
        }
        else if ($request->delete_image) {
            File::delete(public_path('storage/uploads/service/' . $service->img));
            $data['img'] = null;
            unset($data['delete_image']);
        }

        $service->update($data);
        return redirect()->route('service.index')->with('success', 'Սերվիսը հաջողությամբ փոփոխվել է');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        if ($service->img) {
            File::delete(public_path('storage/uploads/service/' . $service->img));
        }

        $service->delete();

        return redirect()->route('service.index')->with('success', 'Սերվիսը հաջողությամբ ջնջվել է');
    }
}
