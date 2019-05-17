<?php

namespace App\Http\Controllers;

use App\Bread;
use App\Meal;
use App\MealRegistration;
use App\Sandwich;
use App\Sauce;
use App\Vegetable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class MealRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if($open_meal = Meal::open()->first()) {
            $is_meal_opened = !$open_meal->mealRegistrations()->whereUserId(auth()->user()->id)->exists();
        } else {
            $is_meal_opened = false;
        }

        $meal_registrations = auth()->user()->mealRegistrations()->with(["meal", "bread", "sandwich", "sauce"])->paginate(50);

        return view("meal_registrations.index", compact("meal_registrations", "is_meal_opened"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $meal = Meal::open()->first();
        $breads = Bread::all()->pluck("name", 'id');
        $sandwiches = Sandwich::all()->pluck("taste", 'id');
        $vegetables = Vegetable::all()->pluck("name", 'id');
        $sauces = Sauce::all()->pluck("name", 'id');

        if(!$meal) {
            flash()->error("Cannot register at the moment because there is no open meal. Please try again later");
            return back();
        }

        return view("meal_registrations.create", compact("meal", "breads", "vegetables", "sauces", "sandwiches"));
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
            "bread_id" => "required|exists:breads,id",
            "bread_size" => "required|in:15,30",
            "baked" => "required|in:YES,NO",
            "sandwich_id" => "required|exists:sandwiches,id",
            "vegetables" => "required|array|exists:vegetables,id",
            "sauce_id" => "required|exists:sauces,id",
            "extra" => "nullable|string",
        ]);

        try{
            DB::beginTransaction();

            if(!$meal = Meal::open()->first()) {
                throw ValidationException::withMessages([
                    "meal" => "Cannot register at the moment because there is no open meal. Please try again later"
                ]);
            }

            $data = $request->all();
            $data["meal_id"] = $meal->id;
            $meal_registration = auth()->user()->mealRegistrations()->create($data);
            $meal_registration->vegetables()->sync($request->get("vegetables"));

            flash()->success("Success! You order has been created");
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            flash()->error("Error! An Error occurred while booking your order, please try again [" . $exception->getMessage() . "]");
            return back()->withInput();
        }

        return redirect()->route("meal-registrations.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
