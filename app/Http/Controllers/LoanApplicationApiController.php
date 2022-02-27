<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoanApplication;
use App\Models\LoanRepayment;
use App\Models\User;
use Carbon\Carbon;

class LoanApplicationApiController extends Controller
{

    public function index($userId)
    {
        return LoanApplication::where('user_id', $userId)->first();
    }

    public function store()
    {

        $valid = request()->validate([
            'user_id' => 'required',
            'amount' => 'required',
            'term' => 'required',
        ]);

        $createResponse = LoanApplication::create([
            'user_id' => request('user_id'),
            'amount' => request('amount'),
            'term' => request('term'),
        ]);

        if($createResponse){
            $loanAmount = request('amount');
            $term = request('term');
            $totalEntries = $term * 4;
            $totalAmount = $loanAmount + ($loanAmount * 0.1 * $term);
            $equalAmount = round($totalAmount/$totalEntries, 2);
            $nowTime = Carbon::now();
            for ($i=1; $i <= $totalEntries; $i++){

                LoanRepayment::create([
                    'loan_application_id' => $createResponse['id'],
                    'payment_date' => $nowTime->addWeek(),
                    'week' => $i,
                    'payment_amount' => $equalAmount,
                    'payment_status' => 'pending',
                ]);
            }
        }

        return $createResponse;
    }

    public function update(LoanApplication $application)
    {
        request()->validate([
            'amount' => 'required',
            'term' => 'required',
        ]);

        $success = $application->update([
            'amount' => request('amount'),
            'term' => request('term'),
        ]);

        return [
            'success' => $success
        ];
    }

    public function destroy(LoanApplication $application)
    {
        $success = $application->delete();

        return [
            'success' => $success
        ];
    }
}
