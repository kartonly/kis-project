<?php

namespace App\Http\Controllers\API\User;

use App\ClientManager;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Models\Clients;
use Facade\FlareClient\Http\Client;
use http\Env\Response;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index(Request $request){
        $clients=Clients::all();
        return ClientResource::collection($clients)->toArray($request);
    }

    public function item($client){
        $item = Clients::where('id', $client)->first();

        return new ClientResource($item);
    }

    public function update(Request $request, Clients $client)
    {
        $clientManager = app(ClientManager::class, ['client' => $client]);
        $client = $clientManager->update($request->all());

        return new ClientResource($client);
    }

    public function delete(Clients $client)
    {
        app(ClientManager::class, ['client' => $client])->delete();
        return new Response([]);
    }
}
