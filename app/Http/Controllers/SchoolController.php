<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\SchoolName;
use App\Rules\GraduationYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    if (!SchoolName::where('name', $value)->exists()) {
                        $fail('The selected school name is invalid.');
                    }
                },
            ],
            'faculty' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'graduation_year' => ['required', new GraduationYear()],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $school = School::create($request->all());
        return response()->json([
            'message' => 'School created successfully',
            'school' => $school,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, School $school)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        //
    }



    public function getSchoolNames()
    {
        $schoolNames = SchoolName::all();
        return response()->json($schoolNames);
    }

}
