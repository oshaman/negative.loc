<?php

namespace Oshaman\Publication\Repositories;

use Oshaman\Publication\User;

class UsersRepository extends Repository {
	
	
	public function __construct(User $user)
    {
		$this->model = $user;
	}

    public function updateUser($request, $user)
    {	
        if (Gate::denies('edit',$this->model)) {
            abort(403);
        }
		
		$data = $request->all();
		
		if(isset($data['password'])) {
			$data['password'] = bcrypt($data['password']);
		}
		
		$user->fill($data)->update();
		$user->roles()->sync([$data['role_id']]);
		
		return ['status' => 'Пользователь изменен'];
		
	}
	
	public function deleteUser($user)
    {
		if (Gate::denies('edit',$this->model)) {
            abort(403);
        }
		
		$user->roles()->detach();
		
		if($user->delete()) {
			return ['status' => 'Пользователь удален'];	
		}
	}
}

?>