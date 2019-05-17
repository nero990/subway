<?php

namespace App\Http\Controllers;

use App\Meal;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $meals = Meal::orderBy("status", "ASC")->withCount("mealRegistrations")->latest()->paginate(20);
        return view("meals.index", compact("meals"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("meals.create");
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
            "name" => "required|string|unique:meals",
            "status" => "required|string|in:OPEN,CLOSED",
            "eaten_at" => "required|date_format:Y-m-d",
        ]);

        Meal::create($request->all());

        flash()->success("Success! Meal Record created.");
        return redirect()->route("meals.index");
    }

    /**
     * Display the specified resource.
     *
     * @param Meal $meal
     * @return Response
     */
    public function show(Meal $meal)
    {
        $meal->load(["mealRegistrations", "mealRegistrations.user", "mealRegistrations.sauce", "mealRegistrations.sandwich"]);
        return view("meals.show", compact("meal"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Meal $meal
     * @return void
     */
    public function edit(Meal $meal)
    {
        return view("meals.edit", compact("meal"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Meal $meal
     * @return void
     * @throws ValidationException
     */
    public function update(Request $request, Meal $meal)
    {
        $data = $request->validate([
            "name" => "required|string|unique:meals,name,".$meal->id .",id",
            "status" => "required|string|in:OPEN,CLOSED",
            "eaten_at" => "required|date_format:Y-m-d",
        ]);

        //$meal->update($request->all());
        $meal->update($data);
        flash()->success("Success! Meal Record updated.");

        return redirect()->route("meals.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Meal $meal
     * @return void
     * @throws Exception
     */
    public function destroy(Meal $meal)
    {
        $meal->delete();
        return redirect()->route("meals.index");
    }
}
