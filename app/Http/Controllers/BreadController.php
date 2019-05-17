<?php

namespace App\Http\Controllers;

use App\Bread;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class BreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $breads = Bread::latest()->paginate(20);
        return view("breads.index", compact("breads"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("breads.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required|string|unique:breads",
        ]);

        Bread::create($request->all());
        flash()->success("Success! Bread Record created.");
        return redirect()->route("breads.index");
    }

    /**
     * Display the specified resource.
     *
     * @param Bread $bread
     * @return Response
     */
    public function show(Bread $bread)
    {
        return view("breads.edit", compact("bread"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Bread $bread
     * @return void
     */
    public function edit(Bread $bread)
    {
        return view("breads.edit", compact("bread"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Bread $bread
     * @return void
     * @throws ValidationException
     */
    public function update(Request $request, Bread $bread)
    {
        $this->validate($request, [
            "name" => "required|string|unique:breads,name," . $bread->id,
        ]);

        $bread->name = $request->get("name");
        $bread->save() ? flash()->success("Success! Bread Record updated.") : flash()->error("Error! No changes made.") ;
        return redirect()->route("breads.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Bread $bread
     * @return void
     * @throws Exception
     */
    public function destroy(Bread $bread)
    {
        $bread->delete();
        return redirect()->route("breads.index");
    }
}
