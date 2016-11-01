<?php

use App\Models\Sob;
use App\Models\Staff;
use App\Models\Capability;
use App\Casters\CastBuilder;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FilterTest extends TestCase
{
    use DatabaseTransactions, DatabaseMigrations, WithoutMiddleware, MakesRequestsWithHeaders;

    protected $sobs;

    public function setUp()
    {
        parent::setUp();

        $user = factory(Staff::class)->create();
        factory(Capability::class, 6)->create()->each(function (Capability $c) use ($user) {
            $c->users()->attach($user);
        });
        auth()->login($user);

        $this->sobs = factory(Sob::class, 10)->create();
    }

    /** @test */
    public function it_orders_by_specified_column()
    {
        $this->request('GET', '/api/sobs?id=desc');

        $filter = new TestFilter(request());
        $filtered = Sob::filter($filter)->get();

        $this->assertResponseStatus(200);

        $this->assertEquals($filtered->first()->sob_id, 10);
        $this->assertEquals($filtered->last()->sob_id, 1);
    }

    /** @test */
    public function it_searches_in_given_columns()
    {
        $this->request('GET', '/api/sobs?search=a');

        $filter = new TestFilter(request());
        $filtered = Sob::filter($filter)->get();

        $this->assertResponseStatus(200);

        foreach ($filtered as $sob) {
            $this->assertContains('a', $sob->sob);
        }
    }
}

class TestFilter extends App\Filters\Filter
{
    protected $searchable = ['sob'];

    protected $orderable = [
        'id' => 'sob_id',
        'sob' => 'sob',
    ];
}
