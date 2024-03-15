<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\commentaires>
 */
class CommentaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $Messages_uuid = Message::inRandomOrder()->first()->id; // random de los mensajes existentes en la BD
        $userId = User::inRandomOrder()->first()->id; // random de los usurios existentes en la BD

        return [
            'message' => fake()->paragraph(),
            'messages_uuid' => $Messages_uuid,
            'users_id' => $userId,
        ];
    }
}
