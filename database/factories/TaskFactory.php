<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'user_id' =>  User::factory('id')->create()
            //'user_id' => factory('App\User')->create()->id,
            //'user_id' => User::factory()->create('id'),
            //'user_id' =>rand(1,User::count())
            //'user_id' => User::all()->random()->id
            //User::all()->random()->id

        ];
    }
}
