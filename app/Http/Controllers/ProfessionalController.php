<?php

namespace App\Http\Controllers;

use App\Models\Professional;
use Illuminate\Http\Request;

use App\Services\ProfessionalService;
use Illuminate\Http\JsonResponse;

class ProfessionalController extends Controller
{
    private $professionalService;

    public function __construct(ProfessionalService $professionalService)
    {
        $this->professionalService = $professionalService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'birth_date' => 'required|date',
        ]);

        $professional = $this->professionalService->store($request);

        if (!$professional) {
            return response()->json([
                'message' => 'Erro ao cadastrar profissional',
            ], 500);
        }

        return response()->json([
            'message' => 'Profissional cadastrado com sucesso',
            'data' => $professional
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Professional $professional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Professional $professional)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Professional $professional)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Professional $professional)
    {
        //
    }
}
