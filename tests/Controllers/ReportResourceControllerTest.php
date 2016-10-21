<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReportResourceControllerTest extends TestCase
{

    use DatabaseMigrations;
    use WithoutMiddleware;

    public function testSample()
    {

    }
   /* public function testIndexMethodReturnsAllReports()
    {
        factory(Pathology\Test::class, 2)->create();
        $reports = \Pathology\Report::all();

        $this
                ->get(route('operator.reports.index'))
                ->seeStatusCode(200);

        foreach($reports as $report) {
            $this->seeJson([
               'id' => $report->id,
                'summary' => $report->summary,
                'user_id' => $report->user_id
            ]);
        }
    }

    public function testShowMethodReturnsAReport()
    {
        factory(Pathology\Test::class)->create();
        factory(Pathology\User::class)->create();
        $report = \Pathology\Report::find(1);

        $this
            ->get(route('operator.reports.show', [$report->id]))
            ->seeStatusCode(200)
            ->seeJson([
               'summary' => $report->summary
            ]);
    }*/
}

