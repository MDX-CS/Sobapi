<?php

use Carbon\Carbon;
use App\Models\Staff;
use App\Models\Lesson;
use App\Models\Student;
use App\Models\Capability;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AttendanceTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions, WithoutMiddleware, MakesRequestsWithHeaders;

    protected $students, $lessons;

    public function setUp()
    {
        parent::setUp();

        // $user = factory(Staff::class)->create();
        // factory(Capability::class, 6)->create()->each(function (Capability $c) use ($user) {
        //     $c->users()->attach($user);
        // });
        // auth()->login($user);

        // $this->students = factory(Student::class, 10)->create();
        // $this->lessons = factory(Lesson::class, 10)->create();
    }

    /** @test */
    public function it_fetches_atttendance_of_given_student()
    {
        // $this->students->first()->toggleAttendance($this->lessons->first());

        // $sobs = $this->request('GET', '/api/students/1/lessons');

        // $this->assertResponseOk();
        // $this->assertEquals(
        //     count(json_decode($sobs->content())->data),
        //     1
        // );
    }
}
