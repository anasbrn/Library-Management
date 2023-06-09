<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Support\Facades\Gate;
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

        if(Gate::denies('manage-gender')){
            return response()->json([
                'message' => 'You are not authorized to create a gender',
            ], 401);
        }

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
    public function show($gender)
    {
        $gender = Gender::find($gender);

        if (!$gender){
            return response()->json([
                'message' => 'Gender not found'
            ], 404);
        }

      
        return new GenderResource($gender);
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
    public function update(UpdateGenderRequest $request, $gender)
    {

        if(Gate::denies('manage-gender')){
            return response()->json([
                'message' => 'You are not authorized to update this gender',
            ], 401);
        }

        $gender = Gender::find($gender);
        if(!$gender) {
             return response()->json([
                 'message' => "Gender not found"
                ], 404);
            }
            
        $gender->update($request->all());
        return response()->json([
            'status' => true,
            'message' => "Gender has been updated successfully",
            'gender' => $gender,
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($gender)
    {

        if(Gate::denies('manage-gender')){
            return response()->json([
                'message' => 'You are not authorized to destroy this gender',
            ], 401);
        }

        $gender = Gender::find($gender);
    
        if(!$gender){
            return response()->json([
                'message' => 'Gender not found'
            ], 404);
        }

        $gender->delete();

        return response()->json([
            'message' => 'The gender has been deleted successfully'
        ], 200);
    }
}
