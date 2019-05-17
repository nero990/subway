<?php

namespace App\Http\Controllers;

use App\Sauce;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class SauceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sauces = Sauce::latest()->paginate(20);
        return view("sauces.index", compact("sauces"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("sauces.create");
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
            "name" => "required|string|unique:sauces",
        ]);

        Sauce::create($request->all());
        flash()->success("Success! Sauce Record created.");
        return redirect()->route("sauces.index");
    }

    /**
     * Display the specified resource.
     *
     * @param Sauce $sauce
     * @return Response
     */
    public function show(Sauce $sauce)
    {
        return view("sauces.edit", compact("sauce"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Sauce $sauce
     * @return void
     */
    public function edit(Sauce $sauce)
    {
        return view("sauces.edit", compact("sauce"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Sauce $sauce
     * @return void
     * @throws ValidationException
     */
    public function update(Request $request, Sauce $sauce)
    {
        $this->validate($request, [
            "name" => "required|string|unique:sauces,name," . $sauce->id,
        ]);

        $sauce->name = $request->get("name");
        $sauce->save() ? flash()->success("Success! Sauce Record updated.") : flash()->error("Error! No changes made.") ;
        return redirect()->route("sauces.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Sauce $sauce
     * @return void
     * @throws Exception
     */
    public function destroy(Sauce $sauce)
    {
        $sauce->delete();
        return redirect()->route("sauces.index");
    }
}
