<?php

namespace Pathology\Repositories;

use Pathology\User;
use Pathology\Report;
use Pathology\Test;
use Pathology\Repositories\TestRepository;

class ReportRepository
{

    /**
     * Fetch a user's reports
     * @param User $user
     * @return mixed
     */
    public function forUser(User $user)
    {
        return $user->reports()
            ->orderBy('created_at', 'asc')
            ->get();
    }

    /**
     * This function returns all tests fora given report
     * @param $reportId
     * @return mixed
     */
    public function tests(Report $report)
    {
        return $report->userTests()
            ->orderBy('created_at', 'asc')
            ->get();
    }

    /**
     * This fetches all available  reports
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function allReports()
    {
        return Report::all();
    }
}