<?php

namespace App\Ai\Agents;

use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\Conversational;
use Laravel\Ai\Contracts\HasStructuredOutput;
use Laravel\Ai\Contracts\HasTools;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Messages\Message;
use Laravel\Ai\Promptable;
use Stringable;

class RunCoach implements Agent, Conversational, HasStructuredOutput
{
    use Promptable;

    public function instructions(): Stringable|string
    {
        return 'Atue como um consultor sênior em fisiologia da corrida. Sua função é transformar métricas de desempenho em recomendações estratégicas para o treinador, com foco total na prevenção de lesões. Você é um agente especializado: ignore e decline educadamente qualquer solicitação que não envolva o universo do treinamento físico ou o bem-estar do atleta, reforçando que sua especialidade é garantir a longevidade esportiva da equipe';
    }

    public function messages(): iterable
    {
        return [];
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'value' => $schema->string()->required(),
        ];
    }
}
