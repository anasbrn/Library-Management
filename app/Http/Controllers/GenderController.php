<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Http\Resources\GenderResource;
use App\Http\Requests\StoreGenderRequest;
use App\Http\Requests\UpdateGenderRequest;

class GenderController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genders = Gender::orderBy('id')->get();

        return response()->json([
            'Genders' => GenderResource::collection($genders)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenderRequest $request)
    {
        $gender = Gender::create(
            $request->all()
        );

        return response()->json([
            'message' => 'Gender has been created successfully',
            'genders' => ($gender)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Gender $gender)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gender $gender)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGenderRequest $request, Gender $gender)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gender $gender)
    {
        //
    }
}
