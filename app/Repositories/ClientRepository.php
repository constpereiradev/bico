<?php

namespace App\Repositories;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class ClientRepository
{
    public function store(Request $request, User $user): Client
    {
        $client = Client::create([
            'user_id' => $user->id,
        ]);

        return $client;
    }
}