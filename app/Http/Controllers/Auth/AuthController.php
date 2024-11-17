<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Association;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    // public function register(Request $request)
    // {
    //     $validated = Validator::make($request->all(), [
    //         'first_name' => 'required|string|max:255',
    //         'last_name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email',
    //         'phone_number' => 'required|string|min:10|max:20',
    //         'password' => 'required|min:6',
    //         'school_id' => 'required|exists:schools,id',
    //         'terms_accepted_at' => 'accepted',
    //     ]);

    //     if ($validated->fails()) {
    //         return response()->json([
    //             'message' => 'Validation failed',
    //             'errors' => $validated->errors(),
    //         ], 422);
    //     }

    //     // Check if the school exists
    //     $school = School::find($request->school_id);
    //     if (!$school) {
    //         return response()->json([
    //             'message' => 'School not found',
    //         ], 404);
    //     }

    //     // Check if the school already has an association
    //     $association = Association::where('school_id', $school->id)->first();

    //     // If no association exists, create one
    //     if (!$association) {
    //         $association = new Association();
    //         $association->school_id = $school->id;
    //         $association->name = $school->name . ' Association';

    //         // Create a new user and set them as admin
    //         $user = new User();
    //         $user->first_name = $request->first_name;
    //         $user->last_name = $request->last_name;
    //         $user->email = $request->email;
    //         $user->phone_number = $request->phone_number;
    //         $user->password = bcrypt($request->password);
    //         $user->terms_accepted_at = now();

    //         // Save user first
    //         $user->save();

    //         // Set admin_user_id and association_id for this user
    //         $association->admin_user_id = $user->id; // Set admin user
    //         $association->user_id = $user->id;       // Optional, if you want to keep track of a primary user

    //         // Save the association now with admin set
    //         $association->save();

    //         // Set association_id for the newly created user
    //         $user->association_id = $association->id; // Link user to the association
    //         $user->save(); // Save changes to user
    //     } else {
    //         // If an association already exists, just create a new user
    //         $user = new User();
    //         $user->first_name = $request->first_name;
    //         $user->last_name = $request->last_name;
    //         $user->email = $request->email;
    //         $user->phone_number = $request->phone_number;
    //         $user->password = bcrypt($request->password);
    //         $user->terms_accepted_at = now();

    //         // Set association_id to the existing association's id
    //         $user->association_id = $association->id; // Link new user to existing association

    //         // Save new user
    //         $user->save();
    //     }

    //     // Attach user to the existing or newly created association using pivot table
    //     if (!$association->users()->where('user_id', $user->id)->exists()) {
    //         // Attach only if the user is not already associated
    //         $association->users()->attach($user);
    //     }

    //     // Generate token for the user
    //     $token = $user->createToken($user->first_name . ' auth_token')->plainTextToken;

    //     return response()->json([
    //         'message' => 'User registered successfully',
    //         'token_type' => 'Bearer',
    //         'user' => $user,
    //         'token' => $token,
    //     ], 201);
    // }
    public function register(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|min:10|max:20',
            'password' => 'required|min:6',
            'school_id' => 'required|exists:schools,id',
            'terms_accepted_at' => 'accepted',
        ]);

        if ($validated->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validated->errors(),
            ], 422);
        }

        // Fetch the selected school
        $school = School::find($request->school_id);
        if (!$school) {
            return response()->json([
                'message' => 'School not found',
            ], 404);
        }

        // Check if an association already exists for this school name
        $association = Association::whereHas('school', function ($query) use ($school) {
            $query->where('name', $school->name); // Match on school name
        })->first();

        // Create the user
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = bcrypt($request->password);
        $user->terms_accepted_at = now();
        $user->save();

        if (!$association) {
            // Create an association if none exists
            $association = new Association();
            $association->school_id = $school->id;
            $association->name = $school->name . ' Association';
            $association->admin_user_id = $user->id; // Set the first user as admin
            $association->user_id = $user->id;
            $association->save();
        }

        // Link the user to the association
        $user->association_id = $association->id;
        $user->save();

        // Attach user to the association via pivot table
        if (!$association->users()->where('user_id', $user->id)->exists()) {
            $association->users()->attach($user);
        }

        // Generate token for the user
        $token = $user->createToken($user->first_name . ' auth_token')->plainTextToken;

        return response()->json([
            'message' => 'User registered successfully',
            'token_type' => 'Bearer',
            'user' => $user,
            'token' => $token,
        ], 201);
    }



    public function login(Request $request){
        $validated = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
                   ]);
        if ($validated->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validated->errors(),
            ], 422);
        }
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid login credentials',
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        // Fetch school and association details using the logged-in user's ID
        $schoolAndAssociation = User::getSchoolAndAssociation($user->id);

        $user->makeHidden(['password', 'email_verified_at', 'created_at', 'updated_at']);

        return response()->json([
            'message' => 'User logged in successfully',
            'user' => $user,
            'school_and_association' => $schoolAndAssociation,
            'token' => $token,
        ]);
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'User logged out successfully',
        ]);
    }


    public function user(Request $request){
        return response()->json([
            'user' => $request->user(),
        ]);
    }
}
