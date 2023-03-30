<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::all();

        return view('property.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('property.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $propertySlug = $this->setName($request->title);

        $property = new Property();

        $property->title = $request->title;
        $property->name = $propertySlug;
        $property->description = $request->description;
        $property->rental_price = $request->rental_price;
        $property->sale_price = $request->sale_price;

        $property->save();

        return redirect()->route('imovel.index');
    }

    private function setName($title)
    {
        $propertySlug = Str::slug($title);
        $properties = Property::all();

        $i = 0;
        foreach ($properties as $property){
            if (Str::slug($property->title) === $propertySlug){
                $i++;
            }
        }

        if ($i > 0){
            $propertySlug = $propertySlug . '-' . $i;
        }

        return $propertySlug;

    }

    /**
     * Display the specified resource.
     *
     * @param int $name
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $property = Property::where('name', '=', $name)->first();

        return view('property.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $name
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
//        $property = Property::find($name);
        $property = Property::where('name', $name)->first();

        return view('property.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $name
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $name)
    {
        $propertySlug = $this->setName($request->title);

        $property = Property::where('name', $name)->first();

        $property->title = $request->title;
        $property->name = $propertySlug;
        $property->description = $request->description;
        $property->rental_price = $request->rental_price;
        $property->sale_price = $request->sale_price;

        $property->save();

        return redirect()->route('imovel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $name
     * @return \Illuminate\Http\Response
     */
    public function destroy($name)
    {
//        $property = Property::find($name);
        $property = Property::where('name', $name)->first();
        $property->delete();

        return redirect()->route('imovel.index');
    }
}
