<?php

namespace App\Http\Controllers;

use App\Helper\TeamMemberHelper;
use App\Http\Requests\TeamMemberPost;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TeamMemberController extends Controller
{
    
    public $teamMember;
    public function __construct(TeamMemberHelper $teamMemberHelper)
    {
        $this->teamMember = $teamMemberHelper;
    }
    
    public function index()
    {
        $members = TeamMember::paginate(5);
        return view('admin.team-members.index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.team-members.create_member');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamMemberPost $request)
    {
           $this->teamMember->store($request->validated(),$request->user());
           return Redirect::route('team-members.index');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(TeamMember $teamMember)
    {
        abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeamMember $teamMember)
    {
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeamMember $teamMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamMember $teamMember)
    {
        $this->teamMember->delete($teamMember);
        return Redirect::route('team-members.index');
    }

    public function status(TeamMember $teamMember) {
        $teamMember->status = $teamMember->status == 'hidden' ?  'vissible' : 'hidden';
        $teamMember->save();
        return back();
    }

}
