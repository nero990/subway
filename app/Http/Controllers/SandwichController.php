<?php

namespace App\Http\Controllers;

use App\Sandwich;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class SandwichController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sandwiches = Sandwich::latest()->paginate(20);
        return view("sandwiches.index", compact("sandwiches"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("sandwiches.create");
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
            "taste" => "required|string|unique:sandwiches",
        ]);

        Sandwich::create($request->all());
        flash()->success("Success! Sandwich Record created.");
        return redirect()->route("sandwiches.index");
    }

    /**
     * Display the specified resource.
     *
     * @param Sandwich $sandwich
     * @return Response
     */
    public function show(Sandwich $sandwich)
    {
        return view("sandwiches.edit", compact("sandwich"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Sandwich $sandwich
     * @return void
     */
    public function edit(Sandwich $sandwich)
    {
        return view("sandwiches.edit", compact("sandwich"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Sandwich $sandwich
     * @return void
     * @throws ValidationException
     */
    public function update(Request $request, Sandwich $sandwich)
    {
        $this->validate($request, [
            "taste" => "required|string|unique:sandwiches,taste," . $sandwich->id,
        ]);

        $sandwich->taste = $request->get("taste");
        $sandwich->save() ? flash()->success("Success! Sandwich Record updated.") : flash()->error("Error! No changes made.") ;
        return redirect()->route("sandwiches.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Sandwich $sandwich
     * @return void
     * @throws Exception
     */
    public function destroy(Sandwich $sandwich)
    {
        $sandwich->delete();
        return redirect()->route("sandwiches.index");
    }
}
