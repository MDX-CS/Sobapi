<?php

use Carbon\Carbon;
use App\Models\Sob;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CrudTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions, WithoutMiddleware, MakesRequestsWithHeaders;

    protected $sobs;

    public function setUp()
    {
        parent::setUp();

        $this->sobs = factory(Sob::class, 10)->create();
    }

    /** @test */
    public function it_fetches_all_sobs()
    {
        $sobs = $this->request('GET', '/api/sobs');

        $this->assertResponseOk();
        $this->assertEquals(
            count(json_decode($sobs->content())->data),
            $this->sobs->count()
        );
    }

    /** @test */
    public function it_fetches_a_sob_by_its_id()
    {
        $sob = $this->request('GET', '/api/sobs/1');

        $this->assertResponseOk();
        $this->assertEquals(
            json_decode($sob->content())->data->id, 1
        );
    }

    /** @test */
    public function it_deletes_a_sob_by_given_id()
    {
        $count = Sob::all()->count();
        $sob = $this->request('DELETE', '/api/sobs/1');

        $this->assertResponseOk();
        $this->assertCount(--$count, Sob::all());
    }

    /** @test */
    public function it_inserts_a_sob()
    {
        $count = Sob::all()->count();

        $sob = $this->request('POST', '/api/sobs', [
            'sob' => 'Test sob',
            'url' => 'http://test.dev',
            'level_id' => 1,
            'topic_id' => 1,
            'expected_start_date' => Carbon::now(),
            'expected_completion_date' => Carbon::now()->addHours(2),
        ]);

        $sob = Sob::orderBy('id', 'desc')->first();

        $this->assertResponseStatus(201);
        $this->assertCount(++$count, Sob::all());
        $this->seeInDatabase('sobs', ['sob' => 'Test sob']);
    }

    /** @test */
    public function it_updates_a_sob()
    {
        $sob = $this->request('PATCH', '/api/sobs/1', [
            'sob' => 'Another test sob',
            'url' => 'http://test.dev',
        ]);

        $sob = Sob::find(1);

        $this->assertResponseStatus(202);
        $this->seeInDatabase('sobs', ['sob' => 'Another test sob']);
    }

    /** @test */
    public function it_validates_data_when_storing_a_sob()
    {
        $sob = $this->request('POST', '/api/sobs', [
            'sob' => 'Test sob',
            'url' => 'adfaasdf',
            'expected_start_date' => Carbon::now(),
            'expected_completion_date' => Carbon::now()->addHours(2),
        ]);

        $this->assertResponseStatus(422);
    }

    /** @test */
    public function it_validates_data_when_updating_a_sob()
    {
        $sob = $this->request('PATCH', '/api/sobs/1', [
            'url' => 'asdf',
        ]);

        $this->assertResponseStatus(422);
    }

    /** @test */
    public function it_properly_fails_when_non_existent_resource_is_requested()
    {
        $this->request('GET', '/api/sobs/100');

        $this->assertResponseStatus(404);

        $this->request('PATCH', '/api/sobs/100');

        $this->assertResponseStatus(404);
    }
}
