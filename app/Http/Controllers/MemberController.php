<?php

namespace App\Http\Controllers;

use App\Models\AssignedTo;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->has('showMemberTags')) {
            $members = Member::with('member_tags')->get();
            return response()->json($members);
        }
        $members = Member::all();
        return response()->json($members);
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
                'email' => ['email', 'required', Rule::unique('members')],
                'name' => ['string', 'required'],
                'surname' => ['string', 'required'],
                'date_of_birth' => ['date', 'required', 'date_format:Y-m-d'],
                'member_tags' => ['array', 'nullable'],
                'member_tags.*' => 'exists:member_tags,id',
            ],
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        }

        $member = Member::create($request->all());
        $member->member_tags()->attach($request->member_tags);
        
        $member->load('member_tags');
        return response()->json($member);
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        if (request()->has('showMemberTags')) {
            $foundMember = Member::with('member_tags')->findOrFail($member->id);
        } else {
            $foundMember = Member::find($member->id);
        }
        if (!$foundMember) {
            return response()->json(['message' => 'Member not found'], 404);
        }
        return response()->json($foundMember);
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
        $foundMember = Member::find($member->id);
        if (!$foundMember) {
            return response()->json(['message' => 'Member not found'], 404);
        }

        $validator = Validator::make(
            $request->all(),
            [
                'email' => ['email', Rule::unique('members')],
                'name' => 'string',
                'surname' => 'string',
                'date_of_birth' => ['date', 'date_format:Y-m-d'],
                'member_tags' => ['array', 'nullable'],
                'member_tags.*' => 'exists:member_tags,id',
            ],
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        }

        $foundMember->update($request->all());
        $foundMember->member_tags()->sync($request->member_tags);

        $foundMember->load('member_tags');
        return response()->json($foundMember);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $foundMember = Member::find($member->id);
        if (!$foundMember) {
            return response()->json(['message' => 'Member not found'], 404);
        }

        $member->delete();

        return response()->json(['message' => 'Member deleted']);
    }
}
