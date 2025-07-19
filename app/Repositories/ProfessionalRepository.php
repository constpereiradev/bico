<?php

namespace App\Repositories;

use App\Models\Professional;
use App\Models\User;
use Illuminate\Http\Request;

class ProfessionalRepository
{
    public function store(Request $request, User $user): Professional
    {
        $professional = Professional::create([
            'user_id' => $user->id,
            'bio' => $request->bio,
            'average_price' => $request->average_price,
            'category_id' => $request->category_id,
            'profile_picture' => $request->profile_picture,
        ]);

        return $professional;
    }

    public function getProfessionalByUserId(int $userId): Professional
    {
        return Professional::where('user_id', $userId)->first();
    }
}
