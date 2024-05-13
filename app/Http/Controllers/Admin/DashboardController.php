<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //__index
    public function index() {
        $features = Feature::all()->count();
        $members = TeamMember::all()->count();
        return view('admin.index',compact('features','members'));
    }
}
