<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Services\ChallengeService;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    protected $service;

    public function __construct(ChallengeService $service)
    {
        $this->service = $service;
    }

    public function submit(Request $request, $id)
    {
        $request->validate([
            'flag' => 'required|string',
        ]);

        $character = auth()->user()->character;
        $challenge = Challenge::findOrFail($id);

        $submission = $this->service->submitFlag($character, $challenge, $request->flag);

        return response()->json([
            'success' => $submission->is_correct,
            'message' => $submission->is_correct ? 'Correct flag! XP awarded.' : 'Incorrect flag.',
            'xp_reward' => $submission->is_correct ? $challenge->xp_reward : 0,
        ]);
    }

}
