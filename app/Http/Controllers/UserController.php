<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\ClientService;
use App\Services\ProfessionalService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    private $clientService, $professionalService;

    public function __construct(
        ClientService $clientService,
        ProfessionalService $professionalService
    ) {
        $this->clientService = $clientService;
        $this->professionalService = $professionalService;
    }


    /**
     * Show the registration page.
     */
    public function create(): Response
    {
        return Inertia::render('auth/Register');
    }

    
public function store(Request $request): mixed
{
    $validated = $request->validate([
        'name'     => 'required|string',
        'email'    => 'required|email|unique:users',
        'password' => 'required|string|min:6',
        'type'     => 'required|string'
    ]);

    DB::beginTransaction();

    try {
        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        $route = 'dashboard';

        if ($request->type === 'client') {
            $this->clientService->store($request, $user);
            $route = 'client.dashboard';
        }

        if ($request->type === 'professional') {
            $this->professionalService->store($request, $user);
            $route = 'professional.dashboard';
        }

        event(new Registered($user));

        Auth::login($user);

        DB::commit();

        return to_route($route);

    } catch (\Exception $e) {
        DB::rollBack();

            return response()->json([
            'message' => 'Erro ao cadastrar usuário ou perfil: ' . $e->getMessage()
        ], 500);
    }
}
}
