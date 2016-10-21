<?php

namespace Pathology\Http\Controllers;

use Illuminate\Http\Request;

use Pathology\Http\Requests;

use Pathology\Repositories\ReportRepository;

use Pathology\User;

use Pathology\Report;

use Pathology\Test;

class ReportResourceController extends Controller
{

    protected $reports;

    /**
     * @param ReportRepository $users
     */
    public function __construct(ReportRepository $reports) {

        $this->reports = $reports;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return $this->reports->allReports();

        return view('operator.report.index', [
            'reports' => $this->reports->allReports()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operator.report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $report = new Report();
        $user = User::where('patient_id', $request->input('user_id'))->first();

        if ($user) {
            $report = $report->create([
                "user_id" => $user->id,
                "summary" => $request->input('summary')
            ]);

            for ($i = 0; $i < $request->input('test_count'); $i++) {
                $index = $i + 1;

                $report->userTests()->create([
                    'description' => $request->input('description'.$index),
                    'purpose' => $request->input('purpose'.$index),
                    'result' => $request->input('result'.$index),
                    'report_id' => $report->id,
                    'received_at' => $request->input('received_at'.$index),
                    'completed_at' => $request->input('completed_at'.$index),
                ]);
            }

            $request->session()->flash('success', 'Report was successful added!');
            return redirect()->route("operator.reports.create");
        }
        $request->session()->flash('error', 'Unable to add Report!');
        return redirect()->route("operator.reports.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return Report::find($id);

        $report = Report::find($id);
        return view('operator.report.show')->with('report', $report);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = Report::find($id);
        return view('operator.report.edit')->with('report', $report);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $report = Report::find($id);
        $report->summary = $request->input('summary');

        for ($i = 0; $i < $request->input('test_count'); $i++) {
            $index = $i + 1;
            $test = Test::find($request->input('test_id'.$index));
            $test->description = $request->input('description'.$index);
            $test->purpose = $request->input('purpose'.$index);
            $test->result = $request->input('result'.$index);
            $test->received_at = $request->input('received_at'.$index);
            $test->created_at = $request->input('created_at'.$index);
            $test->save();
        }

        $report->save();

        $request->session()->flash('success', 'Report was successful updated!');
        return redirect()->route("operator.reports.edit", ['id' => $report->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = Report::find($id);
        if ($report->delete())
            return redirect()->route("operator.reports.index");
    }
}
