<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Penthouse\StoreRequest;
use App\Http\Requests\Penthouse\UpdateRequest;
use App\Models\Amenity;
use App\Models\Category;
use App\Models\Penthouse;
use App\Models\PenthouseAmenity;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PenthouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penthouses = Penthouse::all();
        $categories = Category::all();
        return view('admin.penthouse.index', compact('penthouses', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $amenities = Amenity::all();
        $categories = Category::all();

        $users = User::all();

        return view('admin.penthouse.create', [
            'amenities' => $amenities,
            'users' => $users,
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        // $penthouse = new Penthouse($data);

        $penthouse = Penthouse::firstOrCreate([
            'title' => $data['title']
        ], $data);


        if (isset($data['amenities'])) $amenitiesIds = $data['amenities'];

        unset($data['amenities']);

        if (isset($amenitiesIds)) foreach ($amenitiesIds as $amenityId) {
            PenthouseAmenity::firstOrCreate([
                'penthouse_id' => $penthouse->id,
                'amenity_id' => $amenityId,
            ]);
        }

               
        $penthouse->save();
     
        return redirect()->route('admin.penthouse.index')->with('success', 'Пентхаус '.$penthouse['title'].' успешно создан!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category, Penthouse $penthouse)
    {
        $penthouseAmenities = $penthouse->amenities;

        return view('admin.penthouse.show', compact('penthouse', 'penthouseAmenities'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penthouse $penthouse)
    {
        $penthouseAmenities = $penthouse->amenities;

        $amenities = Amenity::all();
        $categories = Category::all();
        $users = User::all();

        // dd($amenities,$categories,$users, $penthouseAmenities);

        return view('admin.penthouse.edit', compact('penthouse', 'amenities', 'categories', 'users', 'penthouseAmenities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Penthouse $penthouse)
    {
          // Получаем валидированные данные из формы
          $data = $request->validated(); 


  
        //   return redirect()->route('admin.category.show', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penthouse $penthouse)
    {
        $penthouse->delete();
        return redirect()->route('admin.penthouses.index');
    }
}
