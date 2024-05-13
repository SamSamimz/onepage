<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //__Index
    public function index() {
        $members = TeamMember::whereStatus('vissible')->take(3)->get();
        $features = Feature::whereStatus('active')->take(6)->get();
        return view('index',compact('features','members'));
    }
    
}
