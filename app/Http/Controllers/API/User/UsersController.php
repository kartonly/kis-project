<?php


namespace App\Http\Controllers\API\User;


use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoRequest;
use App\Http\Resources\UserResource;
use App\Models\Organisation;
use App\UserManager;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    public function index(Request $request)
    {
        $user = User::all()
            ->find(Auth::user());
        $user->photo = $user->getFirstMediaUrl('avatar', 'thumb');
        $org=$user->organisation;
        $user->organisation=Organisation::where('id', $org)->first();

        return new UserResource($user);
    }

    public function update(Request $request, User $user)
    {

        $userManager = app(UserManager::class, ['user' => Auth::user()]);
        $user = $userManager->update($request->all());

        return new UserResource($user);
    }

    public function setAvatar(PhotoRequest $request)
    {
        $file = app(UserManager::class, ['user' => Auth::user()])->updateAvatar($request->file('photo'));

        return new JsonResponse($file->base64);
    }

    public function setMedia(Request $request){
        $file = app(UserManager::class, ['user' => Auth::user()])->updateMedia($request->file('avatar'));

        return new JsonResponse($file->base64);
    }
}
