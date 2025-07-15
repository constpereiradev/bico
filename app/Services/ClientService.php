<?php

namespace App\Services;
use App\Models\Client;
use App\Models\User;
use App\Repositories\ClientRepository;
use Illuminate\Http\Request;

class ClientService 
{
    private $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function store(Request $request, User $user): Client
    {
        $this->validateFields($request);
        $client = $this->clientRepository->store($request, $user);

        return $client;
    }

    public function validateFields(Request $request)
    {
        $request->validate([
            //'birth_date' => 'required|date',    
        ]);
    }
}