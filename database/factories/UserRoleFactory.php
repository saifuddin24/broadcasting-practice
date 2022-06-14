<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserRoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserRole::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $num = $this->faker->unique()->numberBetween(1,5);

        return [
            'id' => $this->faker->unique()->uuid,
            'role_type' => $num,
            'abilities' => $this->getAbilities($num),
        ];
    }

    private function getAbilities( $num ):string{
        switch ($num) {
            case 1:
                return json_encode(['user:update']);
            case 2:
                return json_encode(['user:delete']);
            case 3:
                return json_encode(['user:edit']);
            case 4:
                return json_encode(['news:edit']);
            case 5:
                return json_encode(['news:delete']);
            default:
                return json_encode([]);
        }

    }

}
