<?php

namespace App\Http\Controllers;

use App\Vegetable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class VegetableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $vegetables = Vegetable::latest()->paginate(20);
        return view("vegetables.index", compact("vegetables"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("vegetables.create");
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
            "name" => "required|string|unique:vegetables",
        ]);

        Vegetable::create($request->all());
        flash()->success("Success! Vegetable Record created.");
        return redirect()->route("vegetables.index");
    }

    /**
     * Display the specified resource.
     *
     * @param Vegetable $vegetable
     * @return Response
     */
    public function show(Vegetable $vegetable)
    {
        return view("vegetables.edit", compact("vegetable"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Vegetable $vegetable
     * @return void
     */
    public function edit(Vegetable $vegetable)
    {
        return view("vegetables.edit", compact("vegetable"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Vegetable $vegetable
     * @return void
     * @throws ValidationException
     */
    public function update(Request $request, Vegetable $vegetable)
    {
        $this->validate($request, [
            "name" => "required|string|unique:vegetables,name," . $vegetable->id,
        ]);

        $vegetable->name = $request->get("name");
        $vegetable->save() ? flash()->success("Success! Vegetable Record updated.") : flash()->error("Error! No changes made.") ;
        return redirect()->route("vegetables.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Vegetable $vegetable
     * @return void
     * @throws Exception
     */
    public function destroy(Vegetable $vegetable)
    {
        $vegetable->delete();
        return redirect()->route("vegetables.index");
    }
}
