<?php

namespace App\Http\Controllers;

use App\Helper\FeatureHelper;
use App\Http\Requests\FeaturePost;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FeatureController extends Controller
{
    public $feature;
    public function __construct(FeatureHelper $feature)
    {
        $this->feature = $feature;
    }

    public function index()
    {
        $features = Feature::paginate(5);
        return view('admin.features.index',compact('features'));
    }


    public function create()
    {
        return view('admin.features.create_feature');
    }

    public function store(FeaturePost $request)
    {
        $this->feature->store($request->validated());
        return Redirect::route('features.index');
    }

    public function show(Feature $feature)
    {
        abort(403);
    }

    public function edit(Feature $feature)
    {
        return view('admin.features.edit_feature',compact('feature'));
    }

    public function update(FeaturePost $request, Feature $feature)
    {
        $this->feature->update($request->all(),$feature);
        return Redirect::route('features.index');
    }

    public function destroy(Feature $feature)
    {
        $this->feature->delete($feature);
        return Redirect::route('features.index');
    }

    // Status change 
    public function status(Feature $feature) {
        $feature->status = $feature->status == 'active' ? 'deactive' : 'active';
        $feature->save();
        return back();
    }

}
