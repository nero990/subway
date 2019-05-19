<?php

namespace App\Http\Controllers;

use App\Bread;
use App\Meal;
use App\MealRegistration;
use App\Sandwich;
use App\Sauce;
use App\Vegetable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class MealRegistrationController extends Controller
{

    private $rules = [
        "bread_id" => "required|exists:breads,id",
        "bread_size" => "required|in:15,30",
        "baked" => "required|in:YES,NO",
        "sandwich_id" => "required|exists:sandwiches,id",
        "vegetables" => "required|array|exists:vegetables,id",
        "sauce_id" => "required|exists:sauces,id",
        "extra" => "nullable|string",
    ];

    /**
     * MealRegistrationController constructor.
     */
    public function __construct()
    {
        $this->middleware("can:create,App\MealRegistration")->only(["create", "store"]);
        $this->middleware("can:view,meal_registration")->only("show");
        $this->middleware("can:update,meal_registration")->only(["edit", "update", "destroy"]);
    }


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
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $meal = $request->get("meal");
        $breads = Bread::all()->pluck("name", 'id');
        $sandwiches = Sandwich::all()->pluck("taste", 'id');
        $vegetables = Vegetable::all()->pluck("name", 'id');
        $sauces = Sauce::all()->pluck("name", 'id');
        $mealRegistration = auth()->user()->mealRegistrations()->latest()->first();

        return view("meal_registrations.create", compact("mealRegistration", "meal", "breads", "vegetables", "sauces", "sandwiches"));
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
        $this->validate($request, $this->rules);

        try{
            DB::beginTransaction();

            $data = $request->all();
            $data["meal_id"] = $request->get("meal")->id;
            $meal_registration = auth()->user()->mealRegistrations()->create($data);
            $meal_registration->vegetables()->sync($request->get("vegetables"));

            flash()->success("Success! You order has been created");
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            flash()->error("Error! An Error occurred while booking your order, please try again [" . $exception->getMessage() . "]");
            return back()->withInput();
        }

        return redirect()->route("meal-registrations.index");
    }

    /**
     * Display the specified resource.
     *
     * @param MealRegistration $mealRegistration
     * @return void
     */
    public function show(MealRegistration $mealRegistration)
    {
        $rating = $mealRegistration->meal->ratings()->whereUserId(auth()->user()->id)->first();
        return view("meal_registrations.show", compact("mealRegistration", "rating"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MealRegistration $mealRegistration
     * @return void
     */
    public function edit(MealRegistration $mealRegistration)
    {
        $meal = Meal::open()->first();
        $breads = Bread::all()->pluck("name", 'id');
        $sandwiches = Sandwich::all()->pluck("taste", 'id');
        $vegetables = Vegetable::all()->pluck("name", 'id');
        $sauces = Sauce::all()->pluck("name", 'id');

        return view("meal_registrations.edit", compact("mealRegistration", "meal", "breads", "sandwiches", "vegetables", "sauces"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param MealRegistration $mealRegistration
     * @return void
     * @throws ValidationException
     */
    public function update(Request $request, MealRegistration $mealRegistration)
    {
        $this->validate($request, $this->rules);

        try{
            DB::beginTransaction();

            $mealRegistration->update($request->all());
            $mealRegistration->vegetables()->sync($request->get("vegetables"));

            flash()->success("Success! You order has been updated");
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            flash()->error("Error! An Error occurred while updating your order, please try again [" . $exception->getMessage() . "]");
            return back()->withInput();
        }

        return redirect()->route("meal-registrations.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param MealRegistration $mealRegistration
     * @return Response
     * @throws Exception
     */
    public function destroy(MealRegistration $mealRegistration)
    {
        $mealRegistration->delete();
        return redirect()->route("meal-registrations.index");
    }
}
