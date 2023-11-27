<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form1;
use App\Models\AppStatus;

use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\Support\ValidatedData;

class Form1Controller extends Controller
{
    public function submitForm(Request $request)
    {



        $optionValue = $request->input('flexRadioDefault');
        if ($optionValue === 'other') {
            $optionValue = $request->input('otherInput');
        }

        $researchers = json_encode([
            'name' => $request->input('r_name'),
            'department' => $request->input('r_department'),
            'institution' => $request->input('r_institution'),
            'phone' => $request->input('r_phone'),
            'address' => $request->input('r_address'),
            'email' => $request->input('r_email'),
        ]);

        $otherResearchers = json_encode($request->input('other_researchers'));

        $advisors = json_encode([
            'title' => $request->input('titles_options'),
            'name' => $request->input('a_name'),
            'department' => $request->input('a_department'),
            'phone' => $request->input('a_phone'),
            'address' => $request->input('a_address'),
            'email' => $request->input('a_email')
        ]);

        $expected_time_frame = json_encode([
            'expected_start' => $request->input('Expected_Start'),
            'expected_end' => $request->input('Expected_End'),
        ]);

        $orgname = json_encode($request->org_name);



        $question8 = $request->input('flexRadioDefault1');
        if ($question8 === "yes") {
            $question8 = $request->input('if_required');
        }

        $optionValue1 = $request->input('flexRadioDefault3');
        if ($optionValue1 === 'international') {
            $other = '';
            $international = $request->input('specify_international');
        } elseif ($optionValue1 === 'other') {
            $international = '';
            $other = $request->input('specify_other');
        } else {
            $international = '';
            $other = '';
        }


        $optionValue2 = $request->input('flexRadioDefault4');
        if ($optionValue2 === "yes") {
            $optionValue2 = $request->input('if_approved_specify');
        }


        $question9 = json_encode([
            'is_supported' => $request->input('flexRadioDefault2'),
            'institution' => $optionValue1,
            'international' => $international,
            'other' => $other,
            'pr_submission' => $optionValue2
        ]);

        $optionValue4 = $request->input('flexRadioDefault8');
        if ($optionValue4 === "yes") {
            $optionValue4 = $request->input('if-harm-yes');
        }

        $report_changes = json_encode([
            'protocol_no' => $request->input('protocol_no1'),
            'explanation_of_changes' => $request->input('explanation_of_changes'),
            'if_could_harm_participants' => $optionValue4
        ]);

        $extension = json_encode([
            'protocol_no' => $request->input('protocol_no'),
            'completion_date' => $request->input('date_completion'),
            'any_differences' => $request->input('flexRadioDefault7'),
        ]);


        $optionValue5 = $request->input('flexRadioDefault10');
        if ($optionValue5 === 'yes') {
            $optionValue5 = $request->input('neg_effect');
        }

        $form1 = [
            'user_id' => auth()->user()->id,
            'title_of_study' => $request->input('title_of_study'),
            'type_of_study' => $optionValue,
            'researchers' => $researchers,
            'advisors' => $advisors,
            'other_researchers' => $otherResearchers,
            'expected_time_frame' => $expected_time_frame,
            'org_inst' => $orgname,
            'question_8' => $question8,
            'question_9' => $question9,
            'status' => $request->input('flexRadioDefault5'),
            'reporting_changes' => $report_changes,
            'extension_pr_study' => $extension,
            'question_11' => $request->input('purpose_of_study'),
            'question_12' => $request->input('data_collection'),
            'question_13' => $request->input('flexRadioDefault9'),
            'question_14' =>  $optionValue5,
            'question_15' => $request->input('number_of_participants'),
            'question_16' => $request->input('flexRadioDefault11'),
            'question_17' => json_encode($request->input('type_of_participants')),
            'question_17_1' => $request->input('flexRadioDefault12'),
            'question_17_2' => $request->input('flexRadioDefault13'),
            'question_18' => $request->input('descr_of_particip'),
            'question_19' => $request->input('expl_of_invitation'),
            'question_20' => json_encode($request->input('methods')),
            'question_21' => $request->input('possible_contributions'),
            'rname' => $request->input('researcher_name'),
            'rdate' => $request->input('rdate'),
            'sname' => $request->input('supervisor_name'),
            'sdate' => $request->input('sdate')
        ];


        $form = Form1::create($form1);


        $app_status = [
            'user_id' => auth()->user()->id,
            'form_id' => $form->id,
            'form_type' => 1,
            'checklist_form_id' => null,
            'status' => 'New',
            'user_email' => auth()->user()->email
        ];

        AppStatus::create($app_status);

        return redirect('form1')->with('success', 'Your form has been submitted successfully.');
    }



    public function update(Request $request)
    {
        $data = session('appId');
        $form1 = Form1::where('app_id', $data)->first();


        if ($form1) {
            $optionValue = $request->input('flexRadioDefault');
            if ($optionValue === 'other') {
                $optionValue = $request->input('otherInput');
            }

            $researchers = json_encode([
                'name' => $request->input('r_name'),
                'department' => $request->input('r_department'),
                'institution' => $request->input('r_institution'),
                'phone' => $request->input('r_phone'),
                'address' => $request->input('r_address'),
                'email' => $request->input('r_email'),
            ]);

            $otherResearchers = json_encode($request->input('other_researchers'));

            $advisors = json_encode([
                'title' => $request->input('titles_options'),
                'name' => $request->input('a_name'),
                'department' => $request->input('a_department'),
                'phone' => $request->input('a_phone'),
                'address' => $request->input('a_address'),
                'email' => $request->input('a_email')
            ]);

            $expected_time_frame = json_encode([
                'expected_start' => $request->input('Expected_Start'),
                'expected_end' => $request->input('Expected_End'),
            ]);

            $orgname = json_encode($request->org_name);



            $question8 = $request->input('flexRadioDefault1');
            if ($question8 === "yes") {
                $question8 = $request->input('if_required');
            }

            $optionValue1 = $request->input('flexRadioDefault3');
            if ($optionValue1 === 'international') {
                $other = '';
                $international = $request->input('specify_international');
            } elseif ($optionValue1 === 'other') {
                $international = '';
                $other = $request->input('specify_other');
            } else {
                $international = '';
                $other = '';
            }


            $optionValue2 = $request->input('flexRadioDefault4');
            if ($optionValue2 === "yes") {
                $optionValue2 = $request->input('if_approved_specify');
            }


            $question9 = json_encode([
                'is_supported' => $request->input('flexRadioDefault2'),
                'institution' => $optionValue1,
                'international' => $international,
                'other' => $other,
                'pr_submission' => $optionValue2
            ]);

            $optionValue4 = $request->input('flexRadioDefault8');
            if ($optionValue4 === "yes") {
                $optionValue4 = $request->input('if-harm-yes');
            }

            $report_changes = json_encode([
                'protocol_no' => $request->input('protocol_no1'),
                'explanation_of_changes' => $request->input('explanation_of_changes'),
                'if_could_harm_participants' => $optionValue4
            ]);

            $extension = json_encode([
                'protocol_no' => $request->input('protocol_no'),
                'completion_date' => $request->input('date_completion'),
                'any_differences' => $request->input('flexRadioDefault7'),
            ]);


            $optionValue5 = $request->input('flexRadioDefault10');
            if ($optionValue5 === 'yes') {
                $optionValue5 = $request->input('neg_effect');
            }

            $form1->update([
                'title_of_study' => $request->input('title_of_study'),
                'type_of_study' => $optionValue,
                'researchers' => $researchers,
                'advisors' => $advisors,
                'other_researchers' => $otherResearchers,
                'expected_time_frame' => $expected_time_frame,
                'org_inst' => $orgname,
                'question_8' => $question8,
                'question_9' => $question9,
                'status' => $request->input('flexRadioDefault5'),
                'reporting_changes' => $report_changes,
                'extension_pr_study' => $extension,
                'question_11' => $request->input('purpose_of_study'),
                'question_12' => $request->input('data_collection'),
                'question_13' => $request->input('flexRadioDefault9'),
                'question_14' =>  $optionValue5,
                'question_15' => $request->input('number_of_participants'),
                'question_16' => $request->input('flexRadioDefault11'),
                'question_17' => json_encode($request->input('type_of_participants')),
                'question_17_1' => $request->input('flexRadioDefault12'),
                'question_17_2' => $request->input('flexRadioDefault13'),
                'question_18' => $request->input('descr_of_particip'),
                'question_19' => $request->input('expl_of_invitation'),
                'question_20' => json_encode($request->input('methods')),
                'question_21' => $request->input('possible_contributions'),
                'rname' => $request->input('researcher_name'),
                'rdate' => $request->input('rdate'),
                'sname' => $request->input('supervisor_name'),
                'sdate' => $request->input('sdate')
            ]);



            return redirect('form1')->with('success', 'Your form has been updated successfully.');

            session()->forget('appId');
        }

        return redirect('form1')->with('error', 'Error updating the form.');
    }
}
