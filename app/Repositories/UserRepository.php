<?php
namespace App\Repositories;

use App\Models\User;
//repositories : memisahkan logika data dengan controller, jadi isinya berupa ORM/eloquent dengan model

class UserRepository{
    public function getAlluser(){
        //mengambil dsemua data dengan pagination
        return User::paginate(10);

    }

    public function getSpecificuser($id){

        return User::find($id);
    }

    public function storeNewuser($data){
        return User::create($data);
    }

    public function updateuser(array $data, $id){

        User::where('id', $id)->update($data);
        return User::find($id);

}

    public function deleteuser($id){
        return User::where('id', $id)->delete();
    }

}

