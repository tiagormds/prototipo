<?php

namespace LaraDev\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LaraDev\Property;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $properties = DB::select("SELECT * FROM properties");
        $properties = Property::all();

        return view("property.index", compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("property.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $propertySlug = $this->setName($request->title);
//
//        $dados = [
//            $request->title,
//            $propertySlug,
//            $request->description,
//            $request->rental_price,
//            $request->sale_price,
//        ];
//
//        DB::insert("INSERT INTO properties(title, name, description, rental_price, sale_price) VALUES (?,?,?,?,?)", $dados);

        $property = [
            'title' => $request->title,
            'name' => $this->setName($request->title),
            'description' => $request->description,
            'rental_price' => $request->rental_price,
            'sale_price' => $request->sale_price,
        ];

//        dd($property);

        Property::create($property);

        return redirect()->route('imoveis.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
//        $property = DB::select("SELECT * FROM properties WHERE name = ?",[$name]);
        $property = Property::where('name', '=', $name)->get();

        if (!empty($property)){
            return view('property.show')->with('property', $property);
        }else{
            return redirect()->action('PropertyController@index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
//        $property = DB::select('SELECT * FROM properties WHERE name = ?', [$name]);
        $property = Property::where('name', '=', $name)->get();

        if (!empty($property))
        {
            return view('property.edit', compact('property'));
        }else{
            return redirect()->action('PropertyController@index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        $propertySlug = $this->setName($request->title);
//
//        $dados = [
//            $request->title,
//            $propertySlug,
//            $request->description,
//            $request->rental_price,
//            $request->sale_price,
//            $id
//        ];
//
//        DB::update('UPDATE properties SET title = ?, name = ?,description = ?, rental_price = ?, sale_price = ? WHERE id = ?', $dados);

        $property = Property::find($id);

        $property->title = $request->title;
        $property->name = $this->setName($request->title);
        $property->description = $request->description;
        $property->rental_price = $request->rental_price;
        $property->sale_price = $request->sale_price;

        $property->save();


        return redirect()->action('PropertyController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function destroy($name)
    {
//        $properties = DB::select("SELECT * FROM properties WHERE name = ?", [$name]);
        $properties = Property::where('name', '=', $name)->get();

        if (!empty($properties)) {
            DB::delete('DELETE FROM properties WHERE name = ?', [$name]);
        }

        return redirect()->action('PropertyController@index');
    }

    private function setName($title)
    {
        $propertySlug = str_slug($title);

//        $properties = DB::select("SELECT * FROM properties");
        $properties = Property::all();

        $i = 0;
        foreach ($properties as $property){
            if (str_slug($property->title) === $propertySlug){
                $i++;
            }
        }

        if ($i>0){
            $propertySlug = $propertySlug.'-'.$i;
        }

        return $propertySlug;
    }
}
