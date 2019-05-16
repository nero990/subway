<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware("is_admin");
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::latest()->paginate(20);
        return view("users.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("users.create");
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
            "name" => "required|string",
            "email" => "required|string|unique:users",
            "is_admin" => "required|in:0,1",
        ], [
            "is_admin.required" => "Role field is required.",
            "is_admin.in" => "Role must be either administrator or staff.",
        ]);

        $data = $request->all();
        $data["password"] = Hash::make("password");

        User::create($data);
        flash()->success("Success! User Record created.");
        return redirect()->route("users.index");
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return void
     */
    public function show(User $user)
    {
        return view("users.edit", compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return void
     */
    public function edit(User $user)
    {
        return view("users.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return void
     * @throws ValidationException
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            "name" => "required|string",
            "is_admin" => "required|in:0,1",
        ], [
            "is_admin.required" => "Role field is required.",
            "is_admin.in" => "Role must be either administrator or staff.",
        ]);

        $user->name = $request->get("name");
        $user->is_admin = $request->get("is_admin");
        $user->save() ?
            flash()->success("Success! User Record updated.") :
            flash()->error("Error! No changes made.") ;

        return redirect()->route("users.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return void
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route("users.index");
    }
}
