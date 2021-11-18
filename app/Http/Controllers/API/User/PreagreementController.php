<?php


namespace App\Http\Controllers\API\User;


use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Preagreement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreagreementController extends Controller
{
    public function index(Request $request)
    {
        $user = User::all()->find(Auth::user());
        $org=$user->organisation;
        $preagreements = Preagreement::where('organisationId', $org)->get();
        return $preagreements;
    }
}
