<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Service\StoreRequest;
use App\Http\Requests\Service\UpdateRequest;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        return view('admin.service.create', ['services' => $services]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $service = new Service($data);
        $service->save();

        return redirect()->route('admin.service.index')->with('success', 'Сервис '.$service['title'].' успешно добавлен!');
    }


    public function show(Service $service)
    {
        return view('admin.service.show', compact('service'));
    }


    public function edit(Service $service)
    {
        return view('admin.service.edit', compact('service'));
    }


    public function update(UpdateRequest $request, Service $service)
    {
         // Получаем валидированные данные из формы
         $data = $request->validated(); 
 
         $service->update($data);
 
         return redirect()->route('admin.service.show', $service->id)->with('success', 'Сервис '.$service['title'].' успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.service.index')->with('success',  'Категория '.$service['title'].' успешно удалена!');
    }
}
