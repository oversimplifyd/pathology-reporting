<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReportTest extends TestCase
{

    use DatabaseMigrations;

    public function testCanCreateReport()
    {
        $report = factory(Pathology\Report::class)->create();
        $report->userTests()->create([
            'description' => 'Testing for recurring nasal pains',
            'purpose' => 'To test for recurring nasal pains',
            'result' => 'Yes',
            'received_at' => '2016-11-16',
            'completed_at' => '2016-10-13'
        ]);

        $this->seeInDatabase('reports', [
            'id' => $report->id,
            'summary' => $report->summary
        ]);

        $this->seeInDatabase('tests', [
            'description' => 'Testing for recurring nasal pains',
            'purpose' => 'To test for recurring nasal pains',
            'result' => \Pathology\Report::find($report->id)->userTests()->first()->result,
            'received_at' => '2016-11-16',
            'completed_at' => '2016-10-13'
        ]);

    }

    /**
     *  Test to determine if report can have multiple tests
     */
    public function testReportCanHaveMultipleTests()
    {
        $report = factory(Pathology\Report::class)->create();

        $tests = [
            [
                'description' => 'Testing for an eye defect',
                'purpose' => 'To see if an eye defect exists or not',
                'result' => 'No',
                'received_at' => '2016-10-16',
                'completed_at' => '2016-10-12'
            ],
            [
                'description' => 'Testing abdominal issues',
                'purpose' => 'Test to see if there is an issue with the abdomen',
                'result' => 'Yes',
                'received_at' => '2016-11-16',
                'completed_at' => '2016-10-13'
            ],
        ];

        foreach ($tests as $test)
            $report->userTests()->create($test);

        $foundReport = \Pathology\Report::find(1);

        $this->assertEquals($foundReport->userTests()->first()->description, 'Testing for an eye defect');
        $this->seeInDatabase('tests', [
            'description' => 'Testing for an eye defect',
            'purpose' => 'To see if an eye defect exists or not',
            'result' => 'No',
            'received_at' => '2016-10-16',
            'completed_at' => '2016-10-12',
        ]);
    }

    public function testCanUpdateReport()
    {
        $report = factory(Pathology\Report::class)->create();
        $report->userTests()->create([
            'description' => 'Testing for recurring nasal pains',
            'purpose' => 'To test for recurring nasal pains',
            'result' => 'Yes',
            'received_at' => '2016-11-16',
            'completed_at' => '2016-10-13'
        ]);

        $report->summary = 'Updated Summary';
        $test = \Pathology\Report::find($report->id)->userTests()->first();
        $test->description = 'Updated Description';
        $test->result = 'No';

        $report->save();
        $test->save();

        $this->seeInDatabase('reports', [
            'summary' => 'Updated Summary'
        ]);

        $this->seeInDatabase('tests', [
            'description' => 'Updated Description',
            'result' => 'No',
            'report_id' => $report->id
        ]);
    }
}
