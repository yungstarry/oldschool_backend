<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AssociationController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Association $association)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Association $association)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Association $association)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Association $association)
    {
        //
    }

    public function checkAssociation(Request $request){
        $validated = Validator::make($request->all(), [
            'name' => 'required|exists:school_names,name',
        ]);
        if ($validated->fails()) {
            return response()->json([
                'message' => 'Invalid school name',
            ], 400);
        }

        $school = School::where('name', $request->name)->first();

        if (!$school) {
            return response()->json([
                'has_association' => false, // No school entry, hence no association
                'message' => 'School does not yet exist in the system',
            ], 200);
        }

        // Check if the school has an association
        $association = Association::where('school_id', $school->id)->first();

        return response()->json([
            'has_association' => $association ? true : false,
            'school_id' => $school->id,
            'message' => $association
                ? 'Association exists for the selected school'
                : 'No association found for the selected school',
        ], 200);
    }
      
}
