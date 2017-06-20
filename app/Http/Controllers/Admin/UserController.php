<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index()
    {
        $allRoles = Role::all();
        $roles = array();
        $users = User::paginate(8);
        foreach ($users as $user){
            foreach($user->roles()->get() as $role) {
                $roles[] =  $role;
            }
        }
        return view('admin.users.show', compact('users', 'roles', 'allRoles'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('title', 'id');

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(User $user, UserRequest $request)
    {
        $data = $request->all();
        $user->update($data);
        $this->syncTags($user, $request->input('role_list'));
        return redirect('admin_panel/users')->with([
            'flash_message' => 'Данные обновленны!',
            'flash_message_important' => true
        ]);
    }
    /**
     * Show the page to create a new User
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::pluck('title', 'id');
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Save a new User
     *
     * @param UserRequest $request
     * @return Response
     */

    public function store(UserRequest $request)
    {
        $this->createUser($request);
        return redirect('admin_panel/users')->with([
            'flash_message' => 'Пользователь был создан!',
            'flash_message_important' => true
        ]);
    }


    /**
     *
     * Save a new user.
     * @param UserRequest $request
     * @return User
     */
    private function createUser(UserRequest $request)
    {
        $user = new User($request->all());
        $user->save();
        $this->syncRoles($user, $request->input('role_list'));
        return $user;
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect('admin_panel/users')->with([
            'flash_message' => 'Пользователь удален!',
            'flash_message_important' => true
        ]);
    }

    /**
     * Sync up the list of roles in the database.
     *
     * @param User $user
     * @param array $roles
     */
    private function syncRoles(User $user, array $roles)
    {
        $user->roles()->sync($roles);
    }

    public function changeRole(Request $request){
        $requestData = $request->all();
        $userRole = explode('_', $requestData["userRole"]);
        $user = User::findOrFail($userRole[0]);
        if($requestData["status"] == 'true'){
            $user->roles()->attach($userRole[1]);
        }else{
            $user->roles()->detach($userRole[1]);
        }
    }
}
