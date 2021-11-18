<?php


namespace App\Http\Controllers\API\Admin;


use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Organisation;
use App\Models\User;
use App\UserManager;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();

        return UserResource::collection($users)->toArray($request);
    }

    public function item($user)
    {
        $item = User::where('id', $user)->first();
        $item->photo = $item->getFirstMediaUrl('avatar', 'thumb');
        $org=$item->organisation;
        $item->organisation=Organisation::where('id', $org)->first();

        return new UserResource($item);
    }

    public function update(Request $request, User $user)
    {
        $userManager = app(UserManager::class, ['user' => $user]);
        $user = $userManager->update($request->all());

        return new UserResource($user);
    }

    public function delete(User $user)
    {
        app(UserManager::class, ['user' => $user])->delete();
        return $this->noContentResponse();
    }
}
