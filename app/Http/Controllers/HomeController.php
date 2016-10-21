<?php

namespace Pathology\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use Pathology\Http\Requests;

use Pathology\Report;

use Pathology\Repositories\ReportRepository;

class HomeController extends Controller
{

    protected $reports;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ReportRepository $reports)
    {
        $this->middleware('auth')->except('getNames');
        $this->reports = $reports;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('patient.home', [
                "reports" => $this->reports->forUser($request->user())
        ]);
    }

    public function showReport($reportId)
    {
        return view('patient.report', [
                "report" => Report::find((int) $reportId)
        ]);
    }

    public function getNames()
    {
        return User::all()->pluck('name')->toJson();
    }

    public function emailReport(Request $request, $reportId)
    {
        $report = Report::find($reportId);
        $username = $report->user->name;
        $reportDate = $report->created_at->diffForHumans();

        $startTag = "<html><body>";
        $endTag = "</body></html>";

        $startTag .= "<h4>Report Details</h4>";
        $startTag .= "<p>Name: $username | Date: $reportDate</p>";
        $startTag .= "<h5>Summary</h5><p>$report->summary</p></div><h3>Test Results</h3>";

        if (count($report->userTests) > 0 ) {
            $startTag .= "<div><table border='1'>
                        <thead>
                        <tr>
                        <th>Description</th>
                        <th>Purpose</th>
                        <th> Result</th>
                        <th> Received</th>
                        <th> Completed</th>
                        </tr>
                        </thead><tbody";
            foreach ($report->userTests as $test) {
                $startTag .= " <tr>
                                <td>{{$test->description}}</td>
                                <td>{{$test->purpose}}</td>
                                <td>{{$test->result}}</td>
                                <td>{{$test->received_at}}</td>
                                <td> {{$test->completed_at}}</td>
                                </tr>";
            }
            $startTag .= "</tbody></table></div>";
        }
        $startTag .= "<p>Thank You</p>";
        $startTag .= $endTag;
        $message = $startTag;

        if ( ! \Pathology\Http\Controllers\Mailer::sendMail([
            "name" => $username,
            "address" => $request->input('email'),
            "message" => $message,
            "subject" => "Pathology Test Report"
        ])) return redirect()->back()->with('message_error', "Unable to email report");
        return redirect()->back()->with('message', "Report sent successfully.");
    }
}
