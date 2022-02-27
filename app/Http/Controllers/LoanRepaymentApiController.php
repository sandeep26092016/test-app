<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoanRepayment;

class LoanRepaymentApiController extends Controller
{

    public function index($loanApplicationId)
    {
        return LoanRepayment::where(
            [
                'loan_application_id' => $loanApplicationId,
                'payment_status' => 'pending',
            ]
        )->OrderBy('week','asc')->first();
    }


    public function update($applicationId)
    {
        $application = LoanRepayment::find($applicationId);

        request()->validate([
            'payment_status' => 'required',
        ]);

        $success = $application->update([
            'payment_status' => request('payment_status'),
        ]);

        return [
            'success' => $success
        ];
    }

}
