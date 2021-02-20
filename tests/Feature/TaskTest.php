<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
//use PHPUnit\Framework\TestCase;


class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use DatabaseMigrations, RefreshDatabase;
    use WithFaker;


    public function test_call_url_get_all_task()
    {

        $this->actingAs(User::factory()->create());
        $response = $this->get('tasks');
        $response->assertStatus(200);

    }


    public function test_a_user_can_read_all_task()
    {

        $this->actingAs(User::factory()->create());
        $allTask = Task::factory()->create();
        $response = $this->get('/tasks');
        $response->assertSee($allTask->title);

    }


    public function test_a_user_can_read_single_task()
    {

        $this->actingAs(User::factory()->create());
        $task = Task::factory()->create();
        $response = $this->get('/tasks/'.$task->id);
        $response->assertSee($task->title)
            ->assertSee($task->description)
            ->assertStatus(200);

    }


    public function test_user_auth_can_create_task()
    {

        //1- login user
        $this->actingAs(User::factory()->create());

        //2- create obj model
        $task = Task::factory()->make();

        //3- submit request and store in db
        $response = $this->post('tasks', $task->toArray());

        //4- count all record in db
        $this->assertEquals(1, Task::all()->count());
        //OR for step4
       // $this->assertCount(1, Task::all());

    }


    public function test_user_auth_can_delete_a_task()
    {

        $this->actingAs(User::factory()->create());
        $task = Task::factory()->create();
        $this->delete('/tasks/delete/' .$task->id, $task->toArray())
            ->assertRedirect('/tasks');

    }


    public function test_required_title_in_create_task()
    {

        //TODO: all of the below codes are correct!

        $this->actingAs(User::factory()->create());
        $task = Task::factory()->make()->toArray();
        $response = $this->post('/tasks',array_merge($task, ['title' => '']));
        $response->assertSessionHasErrors('title');

        /*$data = [
            'title'       => $this->faker->name,
            'description' => $this->faker->text,
            'user_id'     => $this->actingAs(User::factory()->create())
        ];

        $response = $this->post('/tasks', array_merge($data , ['title'=>'']));
        $response->assertSessionHasErrors('title');*/


        /* $attributes = Task::factory()->raw(['title' => null]);
         $this->post('/tasks', $attributes);
         $this->assertEquals('true','true');*/


        /* $user = User::factory()->make();
         $response = $this->post('tasks', [
             'user_id' => $this->actingAs($user) ,
             'description' => 'summary description',
             'title' => null
         ]);
         $response->assertSessionHasErrors('title');*/

    }


    public function test_unauthenticated_user_cannot_create_a_task()
    {

        $task = Task::factory()->make();
        $response = $this->post('tasks', $task->toArray());
        $response->assertRedirect('/login');

    }


    public function test_unauthenticated_user_cannot_update_a_task()
    {

        $task = Task::factory()->make();
        $response = $this->post('/tasks'.$task->id, $task->toArray());
        $response->assertRedirect('/login');

    }


    public function test_unauthenticated_user_cannot_deleted_a_task()
    {

        $task = Task::factory()->create();
        $this->delete('/tasks/delete/' .$task->id, $task->toArray())
            ->assertRedirect('/login');

    }


}
