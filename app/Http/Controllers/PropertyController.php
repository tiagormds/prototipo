<?php

namespace LaraDev\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Property;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = DB::select("SELECT * FROM properties");

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
        $propertySlug = $this->setName($request->title);

        $dados = [
            $request->title,
            $propertySlug,
            $request->description,
            $request->rental_price,
            $request->sale_price,
        ];
//        $title = $request->title;
//        $rental_price = $request->rental_price;
//        $sale_price = $request->sale_price;

        DB::insert("INSERT INTO properties(title, name, description, rental_price, sale_price) VALUES (?,?,?,?,?)", $dados);
        return redirect()->route('imoveis.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $property = DB::select("SELECT * FROM properties WHERE name = ?",[$name]);

        if (!empty($property)){
            return view('property.show')->with('property', $property);
        }else{
            return redirect()->action('PropertyController@index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    private function setName($title)
    {
        $propertySlug = str_slug($title);

        $properties = DB::select("SELECT * FROM properties");

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
