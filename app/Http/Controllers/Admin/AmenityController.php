<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Amenity\StoreRequest;
use App\Http\Requests\Amenity\UpdateRequest;
use App\Models\Amenity;

class AmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $amenities = Amenity::all();
       return view('admin.amenity.index', compact('amenities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $amenities = Amenity::all();

        return view('admin.amenity.create', ['amenities' => $amenities]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $amenity = new Amenity($data);
        $amenity->save();

        return redirect()->route('admin.amenity.index')->with('success', 'Категория '.$amenity['title'].' успешно добавлена!');
    }


    public function show(Amenity $amenity)
    {
        return view('admin.amenity.show', compact('amenity'));
    }


    public function edit(Amenity $amenity)
    {
        $amenities = Amenity::all();
        return view('admin.amenity.edit', compact('amenity', 'amenities'));
    }


    public function update(UpdateRequest $request, Amenity $amenity)
    {
         // Получаем валидированные данные из формы
         $data = $request->validated(); 
 
         $amenity->update($data);
 
         return redirect()->route('admin.amenity.show', $amenity->id)->with('success', 'Категория '.$amenity['name'].' успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Amenity $amenity)
    {
        $amenity->delete();
        return redirect()->route('admin.amenity.index')->with('success',  'Категория '.$amenity['name'].' успешно удалена!');
    }
}
