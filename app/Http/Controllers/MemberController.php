<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Member::all();
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
        $validator = Validator::make(
            $request->all(),
            [
                "email" => ['string', 'required', Rule::unique('members')],
            ],
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        }

        $member = new Member;
        $member->name = $request->name;
        $member->surname = $request->surname;
        $member->email = $request->email;
        $member->date_of_birth = $request->date_of_birth;
        $result = $member->save();

        if ($result) {
            return ["Result" => "Data has been saved"];
        }

        return ["Result" => "Saving data failed"];
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}
