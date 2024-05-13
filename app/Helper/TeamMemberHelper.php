<?php 
namespace App\Helper;

use App\Models\TeamMember;

class TeamMemberHelper  {

    public function store($teamMember, $user) {
        $image_name = time()."_member.".$teamMember['image']->getClientOriginalExtension();
        $teamMember['image']->storeAs('public/members',$image_name);
        TeamMember::create([
            'user_id' => $user['id'],
            'name' => $teamMember['name'],
            'title' => $teamMember['title'],
            'image' => $image_name,
        ]);
        $this->showToast('create');
    }

    public function delete($teamMember) {
        if($teamMember['image']) {
            file_exists(public_path('storage/members/'.$teamMember['image'])) ? unlink(public_path('storage/members/'.$teamMember['image'])) : false;
        }
        $teamMember->delete();
        $this->showToast('delete');
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