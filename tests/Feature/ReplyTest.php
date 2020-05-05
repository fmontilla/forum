<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReplyTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testListagemDeRespostasPorTopico()
    {
        $user = factory(\App\Models\User::class)->create();
        $this->seed('RepliesTableSeeder');

        $replies = \App\Models\Reply::where('thread_id', 2)
            ->get();
        $response = $this->actingAs($user)
            ->json('GET', '/replies/2');

        $response->assertStatus(200)
            ->assertJson($replies->toArray());
    }

    public function testInclusaoDeNovaResposta()
    {
        $user = factory(\App\Models\User::class)->create();
        $thread = factory(\App\Models\Thread::class)->create();

        $response = $this->actingAs($user)
            ->json('POST', '/replies', [
                'body'=>'Eu sou uma respsota no forum',
                'thread_id' => $thread->id
            ]);

        $reply = \App\Models\Reply::find(1);

        $response->assertStatus(200)
            ->assertJsonFragment(['body' => 'Eu sou uma respsota no forum']);
    }
}
