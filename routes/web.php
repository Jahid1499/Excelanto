<?php

use App\Candidate;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'bangladesh-admin/', 'namespace' => 'BangladeshAdmin', 'as' => 'BangladeshAdmin.'], function () {
    Route::get('/dashboard', 'BangladeshAdminDashboardController@dashboard')->name('dashboard');

    //    Recruiting agency
    Route::get('company_request', 'RecruitingAgencieController@company_request')->name('company_request');
    Route::get('company-approved-request', 'RecruitingAgencieController@company_approved_request')->name('company_approved_request');
    Route::get('company-rejected-request', 'RecruitingAgencieController@company_rejected_request')->name('company_rejected_request');

    //    one stop services
    Route::get('oss-company-request', 'OneStopServiceController@request')->name('request');
    Route::get('oss-approved-request', 'OneStopServiceController@approved')->name('approved');
    Route::get('oss-rejected-request', 'OneStopServiceController@rejected')->name('oneStopService.rejected');

    //    Welfare service centers
    Route::get('welfare-company-request', 'WelfareServiceCenterController@request')->name('welfareServiceCenter.request');
    Route::get('welfare-approved-request', 'WelfareServiceCenterController@approved')->name('welfareServiceCenter.approved');
    Route::get('welfare-rejected-request', 'WelfareServiceCenterController@rejected')->name('welfareServiceCenter.rejected');

    //    Bangladesh Embassy
    Route::get('bangladesh-embassy-request', 'BangladeshEmbassyController@request')->name('bangladeshEmbassy.request');
    Route::get('bangladesh-embassy-approved-request', 'BangladeshEmbassyController@approved')->name('bangladeshEmbassy.approved');
    Route::get('bangladesh-embassy-rejected-request', 'BangladeshEmbassyController@rejected')->name('bangladeshEmbassy.rejected');

    //job posts
    Route::get('total-job-post', 'JobPostController@index')->name('total_job_post.index');
    Route::get('vacancy_approval', 'JobPostController@vacancy_approval')->name('vacancy_approval');

    //Candidate
    Route::get('candidate-requests', 'CandidateController@requests')->name('candidate.requests');
    Route::get('candidate-forwarded', 'CandidateController@forwarded')->name('candidate.forwarded');
    Route::get('candidate-reviewed', 'CandidateController@reviewed')->name('candidate.reviewed');
    Route::get('candidate-finalized', 'CandidateController@finalized')->name('candidate.finalized');
    Route::get('tickets-booked-List', 'CandidateController@tickets_booked_List')->name('candidate.tickets_booked_List');

    //Visa Process
    Route::get('visa-process-requests', 'VisaProcessController@requests')->name('visa_process.requests');
    Route::get('visa-process-approved', 'VisaProcessController@approved')->name('visa_process.approved');
    Route::get('visa-process-rejected', 'VisaProcessController@rejected')->name('visa_process.rejected');
});


// recruiting agency route
Route::group(['prefix' => 'recruiting-agency/', 'namespace' => 'RecruitingAgency', 'as' => 'RecruitingAgency.'], function () {
    Route::get('/dashboard', 'RecruitingAgencyDashboardController@dashboard')->name('dashboard');

    //Job Posts
    Route::get('all-job-post', 'JobPostController@all')->name('jobPost.all');
    Route::get('applied-job-post', 'JobPostController@applied')->name('jobPost.applied');

    //Candidates
    Route::get('new-candidates', 'CandidateController@new')->name('candidate.new');
    Route::get('all-candidates', 'CandidateController@all')->name('candidate.all');
    Route::get('selected-candidates', 'CandidateController@selected')->name('candidate.selected');
    Route::get('view-selected-candidates', 'CandidateController@viewSelected')->name('candidate.viewSelected');
});

// Welfare Company route
Route::group(['prefix' => 'welfare_centre/', 'namespace' => 'WelfareCentre', 'as' => 'WelfareCentre.'], function () {

    Route::get('/dashboard', 'WelfareDashboardController@dashboard')->name('dashboard');

    //Job Approval
    Route::get('/new-job-posts', 'JobApprovalController@NewJobPost')->name('NewJobPost');
    Route::get('/job-approved', 'JobApprovalController@jobApproved')->name('jobApproved');

    //Travel Candidates
    Route::get('/travel_received_list', 'TravelCandidatesController@TravelCandidates')->name('TravelCandidates');

    //awareness event
    Route::get('/create-awareness-event', 'AwarenessEventController@create')->name('awarenessevent.create');
    Route::get('/upcoming-events', 'AwarenessEventController@upcoming_events')->name('awarenessevent.upcoming_events');
    Route::get('/total-events', 'AwarenessEventController@total_events')->name('awarenessevent.total_events');
});

// UAE Admin route
Route::group(['prefix' => 'uae-admin/', 'namespace' => 'UAEAdmin', 'as' => 'UAEAdmin.'], function () {
    Route::get('/dashboard', 'UAEAdminDashboardController@dashboard')->name('dashboard');

    // Employer Requests
    Route::get('new-employer-request', 'EmployerRequestController@new')->name('employerRequest.new');
    Route::get('approved-employer-request', 'EmployerRequestController@approved')->name('employerRequest.approved');
    Route::get('rejected-employer-request', 'EmployerRequestController@rejected')->name('employerRequest.rejected');

    // UAE Embassy
    Route::get('new-uae-embassy-request', 'UAEEmbassyController@new')->name('UAEEmbassy.new');
    Route::get('approved-uae-embassy-request', 'UAEEmbassyController@approved')->name('UAEEmbassy.approved');
    Route::get('rejected-uae-embassy-request', 'UAEEmbassyController@rejected')->name('UAEEmbassy.rejected');

    // job category route
    Route::resource('jobCategory', 'JobCategoryController');

    // Visa Process
    Route::get('requested-visa', 'VisaRequestController@requested')->name('visa.requested');
    Route::get('approved-visa', 'VisaRequestController@approved')->name('visa.approved');
    Route::get('rejected-visa', 'VisaRequestController@rejected')->name('visa.rejected');

    // candidates --- ready to travel
    Route::get('travel-received-candidates', 'CandidateController@travelReceived')->name('candidate.travelReceived');
});

// One Stop Service route
Route::group(['prefix' => 'one-stop-service/', 'namespace' => 'OneStopService', 'as' => 'OneStopService.'], function () {
    Route::get('/dashboard', 'OneStopServiceDashboardController@dashboard')->name('dashboard');


    // child oss agency
    Route::get('child-osc-request', 'OSCAgencyController@request')->name('childOsc.request');
    Route::get('approved-child-osc', 'OSCAgencyController@approved')->name('childOsc.approved');
    Route::get('rejected-child-osc', 'OSCAgencyController@rejected')->name('childOsc.rejected');

    // medical-agency
    Route::get('medical-agency-request', 'MedicalAgencyController@request')->name('medicalAgency.request');
    Route::get('approved-medical-agency', 'MedicalAgencyController@approved')->name('medicalAgency.approved');
    Route::get('rejected-medical-agency', 'MedicalAgencyController@rejected')->name('medicalAgency.rejected');

    // training-agency
    Route::get('training-agency-request', 'TrainingAgencyController@request')->name('trainingAgency.request');
    Route::get('approved-training-agency', 'TrainingAgencyController@approved')->name('trainingAgency.approved');
    Route::get('rejected-training-agency', 'TrainingAgencyController@rejected')->name('trainingAgency.rejected');

    // travel-agency
    Route::get('travel-agency-request', 'TravelAgencyController@request')->name('travelAgency.request');
    Route::get('approved-travel-agency', 'TravelAgencyController@approved')->name('travelAgency.approved');
    Route::get('rejected-travel-agency', 'TravelAgencyController@rejected')->name('travelAgency.rejected');

    // biometric-agency
    Route::get('biometric-agency-request', 'BiometricAgencyController@request')->name('biometricAgency.request');
    Route::get('approved-biometric-agency', 'BiometricAgencyController@approved')->name('biometricAgency.approved');
    Route::get('rejected-biometric-agency', 'BiometricAgencyController@rejected')->name('biometricAgency.rejected');

    // candidate
    Route::get('selected-candidate', 'CandidateController@selected')->name('candidate.request');
    Route::get('interview-candidate', 'CandidateController@interview')->name('candidate.approved');
    Route::get('finalized-candidate', 'CandidateController@finalized')->name('candidate.rejected');
    Route::get('ticket-booked-candidate', 'CandidateController@ticketBooked')->name('candidate.ticketBooked');

    // Visa Process
    Route::get('approved-visa', 'VisaProcessController@approved')->name('visa.approved');
    Route::get('rejected-visa', 'VisaProcessController@rejected')->name('visa.rejected');

    // Travel  enquiry
    Route::get('ready-to-travel', 'TravelEnquiryController@readyToTravel')->name('travelEnquiry.readyToTravel');
    Route::get('new-travel-enquiry', 'TravelEnquiryController@newTravel')->name('travelEnquiry.newTravel');
    Route::get('posted-travel-enquiry', 'TravelEnquiryController@postedTravel')->name('travelEnquiry.postedTravel');

    // Travel  quotations
    Route::get('received-travel-quotations', 'TravelQuotationController@received')->name('travelQuotation.received');
    Route::get('approved-travel-quotations', 'TravelQuotationController@approved')->name('travelQuotation.approved');
    Route::get('ticket-booked-travel-enquiry', 'TravelQuotationController@ticketBooked')->name('travelQuotation.ticketBooked');
});
