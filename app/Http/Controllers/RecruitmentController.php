<?php

namespace App\Http\Controllers;

use App\Models\Recruitment;
use Illuminate\Http\Request;
use App\Http\Requests\ApplyRecruitmentRequest;

class RecruitmentController extends Controller
{
    /**
     * Apply the recruiment.
     * 
     * @param  App\Http\Requests\ApplyRecruitmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function apply(ApplyRecruitmentRequest $request)
    {
        $cvPath = $request->file('cv')->store('recruitments');
        $jobApplicationPath = $request->file('job_application')->store('recruitments');
        $idFrontsidePath = $request->file('id_frontside')->store('recruitments');
        $idBacksidePath = $request->file('id_backside')->store('recruitments');
        $licenseFrontsidePath = $request->file('license_frontside')->store('recruitments');
        $licenseBacksidePath = $request->file('license_backside')->store('recruitments');

        Recruitment::create([
            'cv_path' => $cvPath,
            'job_application_path' => $jobApplicationPath,
            'working_time' => $request->working_time,
            'id_frontside_path' => $idFrontsidePath,
            'id_backside_path' => $idBacksidePath,
            'license_frontside_path' => $licenseFrontsidePath,
            'license_backside_path' => $licenseBacksidePath,
        ]);

        return response()->json([
            'message' => __('Đơn ứng tuyển đã được gửi, vui lòng đợi chúng tôi liên hệ lại')
        ]);
    }
}
