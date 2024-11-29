<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Models\School;
use App\Models\User;
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
      

    //get association members

    public function getAssociationMembers(Request $request){
        $user = $request->user();

        if(!$user->association_id){
            return response()->json([
                'message' => 'User is not part of any association',
            ], 403);
        }

        //fetch all users in the same association
        $users = User::select(
            'users.id as user_id',
            'users.first_name',
            'users.last_name',
            'users.email',
            'schools.name as school_name',
            'schools.faculty as school_faculty',
            'schools.department as school_department',
            'schools.graduation_year as school_graduation_year',
            'associations.name as association_name'
        )
        ->join('association_user', 'users.id', '=', 'association_user.user_id')
        ->join('associations', 'associations.id', '=', 'association_user.association_id')
        ->join('schools', 'users.school_id', '=', 'schools.id') // Join using users.school_id
        ->where('association_user.association_id', $user->association_id) // Explicit table name
        ->get();

        return response()->json([
            'message' => 'Association members fetched successfully.',
            'users' => $users,
        ], 200);
    }
}
