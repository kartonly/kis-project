<?php


namespace App;


use App\Models\Clients;
use Illuminate\Support\Facades\DB;

class ClientManager
{
    private ?Clients $client;

    public function __construct(?Clients $client = null)
    {
        $this->client = $client;
    }

    public function create(array $params): Clients
    {
        try {
            DB::beginTransaction();

            $this->client = app(Clients::class);
            $this->client->fill($params);
            $this->client->save();
            DB::commit();

            return $this->client;
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new \Exception($exception->getMessage());
        }
    }

    public function update(array $params): Clients
    {
        $this->client->fill($params);
        $this->client->save();

        return $this->client;
    }

    public function delete(){
        $this->client->agreement()->delete();
        $this->client->preagreement()->delete();
        $this->client->passport()->delete();
        $this->client->intPassport()->delete();
        $this->client->delete();
    }
}
