<?php

use App\Models\Sob;
use App\Casters\CastBuilder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CasterTest extends TestCase
{
    use DatabaseTransactions, DatabaseMigrations;

    protected $caster, $cast, $sob;

    public function setUp()
    {
        parent::setUp();

        $this->sob = factory(Sob::class)->create();
        $this->caster = new TestCaster(new CastBuilder);
        $this->cast = $this->caster->cast($this->sob);
    }

    /** @test */
    public function it_changes_the_name_of_database_column()
    {
        $this->assertArrayHasKey('name', $this->cast);
        $this->assertEquals($this->sob->sob, $this->cast['name']);
    }

    /** @test */
    public function it_changes_contents_of_a_field_with_a_closure()
    {
        $this->assertArrayHasKey('test', $this->cast);
        $this->assertEquals(1, $this->cast['test']);
    }

    /** @test */
    public function it_changes_contents_of_a_field_with_a_method()
    {
        $this->assertArrayHasKey('active', $this->cast);
        $this->assertEquals(2, $this->cast['active']);
    }

    /** @test */
    public function it_changes_contents_of_a_field_with_a_query_string()
    {
        $this->assertArrayHasKey('test2', $this->cast);
        $this->assertEquals(true, $this->cast['test2']);
    }
}

class TestCaster extends App\Casters\Caster
{
    protected function castRules()
    {
        return [
            'sob' => 'name',
            'test' => function (Sob $sob) {
                return 1;
            },
            'active' => '@active',
            'id' => '!name:test2|type:bool',
        ];
    }

    public function active()
    {
        return 2;
    }
}
