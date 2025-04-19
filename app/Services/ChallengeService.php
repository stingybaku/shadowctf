<?php

namespace App\Services;

use App\Models\Challenge;
use App\Models\Submission;
use App\Models\Character;
use Illuminate\Support\Facades\DB;

class ChallengeService
{
    public function submitFlag(Character $character, Challenge $challenge, string $flag): Submission
    {
        return DB::transaction(function () use ($character, $challenge, $flag) {
            $isCorrect = trim($flag) === trim($challenge->flag);
            // Create submission record
            $submission = Submission::create([
                'character_id'    => $character->id,
                'challenge_id'    => $challenge->id,
                'submitted_flag'  => $flag,
                'is_correct'      => $isCorrect,
            ]);

            // Reward XP if correct and not previously completed
            $alreadyCompleted = Submission::where('character_id', $character->id)
                ->where('challenge_id', $challenge->id)
                ->where('is_correct', true)
                ->exists();

            if ($isCorrect && !$alreadyCompleted) {
                $character->experience += $challenge->xp_reward;
                $character->save();

                // TODO: You could trigger level up logic here
            }

            return $submission;

        });
    }
}