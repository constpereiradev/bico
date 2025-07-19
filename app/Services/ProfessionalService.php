<?php

namespace App\Services;

use App\Models\Professional;
use App\Models\User;
use App\Repositories\ProfessionalRepository;
use Illuminate\Http\Request;

class ProfessionalService
{
    private $professionalRepository;

    public function __construct(ProfessionalRepository $professionalRepository)
    {
        $this->professionalRepository = $professionalRepository;
    }

    public function store(Request $request, User $user): Professional
    {
        $this->validateFields($request);
        $professional = $this->professionalRepository->store($request, $user);

        return $professional;
    }

    public function validateFields(Request $request)
    {
        $request->validate([
            'bio' => 'required|string',    
            'average_price' => 'required|int',    
            'category_id' => 'required|int',    
            'profile_picture' => 'required|string',    
        ]);
    }

    public function getProfessionalByUser(User $user): Professional
    {
        return $this->professionalRepository->getProfessionalByUserId($user->id);
    }
}
