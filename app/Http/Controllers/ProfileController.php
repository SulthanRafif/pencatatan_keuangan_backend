<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\ProfileRequest;
use App\Http\Resources\Profile\ProfileCollection;
use App\Http\Resources\Profile\ProfileShowResource;
use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the profiles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::paginate(5);

        // return ProfileIndexResource::collection($profiles);

        if ($profiles) {
            return new ProfileCollection($profiles);
        }

        return response()->json(['message' => 'Profiles data not found', 'status' => false], 401);
    }

    /**
     * Display the specified profile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $profile = auth()->user()->profile()->first();

        return new ProfileShowResource($profile);
    }

    /**
     * Update the specified profile in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request)
    {
        $profile = auth()->user()->profile();

        if (!$profile) {
            return response()->json([
                'status' => false,
                'message' => 'Profile not found'
            ], 400);
        }

        $updated = $profile->update($this->profileStore($request));

        if ($updated) {
            return response()->json([
                'status' => true,
                'data' => $profile->first()->toArray(),
                'message' => 'success'
            ], 400);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Profile can not be updated'
            ]);
        }
    }

    public function profileStore(ProfileRequest $request)
    {
        return [
            'fullname' => $request->fullname,
            'address' => $request->address,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'profession' => $request->profession,
            'gender' => $request->gender
        ];
    }
}
