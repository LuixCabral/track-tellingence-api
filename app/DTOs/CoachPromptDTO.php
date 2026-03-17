<?php

namespace App\DTOs;

use Illuminate\Http\Request;

readonly class CoachPromptDTO
{
    public function __construct(
        public string $prompt,
    )
    {
    }

    public static function fromRequest(Request $request):self
    {
        return new self(
            prompt:$request->prompt
        );
    }
}
