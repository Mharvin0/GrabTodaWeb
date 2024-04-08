<?php

namespace App\Services\Auth;

class AdminIdentifier {

    public function check($id){
        return \App\Models\Admin::where('user_id', $id)->exists();
    }
}
