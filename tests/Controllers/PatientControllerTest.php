<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PatientControllerTest extends TestCase
{

    use DatabaseMigrations;

    public function testCanGenerateSixDigitPassCode()
    {
        $passcode = \Pathology\Http\Controllers\PassCodeGenerator::generatePassCode();
        $this->assertTrue(strlen($passcode) == 6, "Pass code was generated successfully.");
    }
}
