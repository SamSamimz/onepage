<?php  
namespace App\Helper;

use App\Models\Feature;
use Illuminate\Support\Facades\Redirect;

class FeatureHelper {

    public function store($feature) {
        Feature::create($feature);
        $this->showToast('Create');
    }

    public function update($value, $feature) {
        $feature->update($value);
        $this->showToast('Update');
    }
   
    public function delete($feature) {
        $feature->delete();
        $this->showToast('Delete');
    }
    
    
    // Trigger the toast
    public function showToast($message) {
        toastr()
        ->timeOut(1500)
        ->closeButton(true)
        ->positionClass('toast-bottom-right')
        ->addSuccess('Menu has been '.$message.'d.');
    }
    
    
}



?>
