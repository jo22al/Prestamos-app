<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'dpi' => $this->faker->randomNumber(8, true),
            'nombres' => $this->faker->name(),
            'apellidos' => $this->faker->lastName(),
            'telefono_trabajo' => $this->faker->randomNumber(8, true),
            'telefono_domiciliar' => $this->faker->randomNumber(8, true),
            'celular' => $this->faker->randomNumber(8, true),
            'nombres_conyugue' => $this->faker->name(),
            'apellidos_conyugue' => $this->faker->lastName(),
            'alquila' => $this->faker->boolean(),
            'lugar_trabajo' => 'Quetzaltenango',
            'direccion_trabajo' => 'Quetzaltenango',
            'direccion_personal' => 'Quetzaltenango',
            'correo' => $this->faker->unique()->safeEmail(),
            'facebook' => 'https://www.facebook.com/perfil',
            'foto' => $this->faker->imageUrl(640, 480, 'animals', true),
            'referencia_nombres' => $this->faker->name(),
            'referencia_apellidos' => $this->faker->lastName(),
            'referencia_correo' => $this->faker->unique()->safeEmail(),
            'referencia_telefono' => $this->faker->randomNumber(8, true),
        ];
    }
}
