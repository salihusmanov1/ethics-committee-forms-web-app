<?php

namespace App\Http\Controllers;

use App\Models\ChecklistForm;
use App\Models\AppStatus;
use Illuminate\Http\Request;

class ChecklistFormController extends Controller
{
    public function submitForm(Request $request)
    {
        

        $questions = json_encode([
            'form_list' => $request->input('form_list'),
            'parent_consent_form' => $request->input('parent_consent_form'),
            'debriefing_form' => $request->input('debriefing_form'),
            'data_checklist' => $request->input('data_checklist'),
            'title' => $request->input('title'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'date' => $request->input('date'),
            'signature' => $request->input('signature')
        ]);

        $question2 = json_encode([
            'a' => $request->input('question_2_a'),
            'b' => $request->input('question_2_b')

        ]);

        $question3 = json_encode([
            'a' => $request->input('question_3_a'),
            'b' => $request->input('question_3_b'),
            'c' => $request->input('question_3_c'),
            'd' => $request->input('question_3_d'),
            'e' => $request->input('question_3_e'),
            'f' => $request->input('question_3_f'),
            'g' => $request->input('question_3_g'),
            'h' => $request->input('question_3_h'),
            'i' => $request->input('question_3_i'),
            'j' => $request->input('question_3_j'),
            'k' => $request->input('question_3_k')
        ]);

        $question7 = json_encode([
            '0' => $request->input('question_7'),
            'a' => $request->input('question_7_a'),
            'b' => $request->input('question_7_b'),
            'c' => $request->input('question_7_c'),
        ]);

        $question8 = json_encode([
            '0' => $request->input('question_8'),
            'a' => $request->input('question_8_a'),
            'b' => $request->input('question_8_b'),
            'c' => $request->input('question_8_c'),
            'i' => $request->input('question_8_d_i'),
            'ii' => $request->input('question_8_d_ii'),
            'iii' => $request->input('question_8_d_iii')
        ]);

        $form3 = [
            'user_id' => auth()->user()->id,
            'questions' => $questions,
            'question_1' => $request->input('question_1'),
            'question_2' => $question2,
            'question_3' => $question3,
            'question_4' => $request->input('question_4'),
            'question_5' => $request->input('question_5'),
            'question_6' => $request->input('question_6'),
            'question_7' => $question7,
            'question_8' => $question8,
            'question_9' => $request->input('question_9'),
            'question_10' => $request->input('question_10'),
            'question_11' => $request->input('question_11')
        ];


        $checklist = ChecklistForm::create($form3);


        $form_id = $request->input('forms_to_attach');

        $app_status = AppStatus::where('id', $form_id)->first();

        $app_status->update( [
            'checklist_form_id' => $checklist->id,
        ]);

        return redirect('checklist_form')->with('success', 'Your form has been submitted successfully.');
    }

    public function update(Request $request)
    {

        $id = session('appId');
        $checklist = ChecklistForm::where('app_id', $id);

        if ($checklist) {
            $questions = json_encode([
                'form_list' => $request->input('form_list'),
                'parent_consent_form' => $request->input('parent_consent_form'),
                'debriefing_form' => $request->input('debriefing_form'),
                'data_checklist' => $request->input('data_checklist'),
                'title' => $request->input('title'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'date' => $request->input('date'),
                'signature' => $request->input('signature')
            ]);

            $question2 = json_encode([
                'a' => $request->input('question_2_a'),
                'b' => $request->input('question_2_b')

            ]);

            $question3 = json_encode([
                'a' => $request->input('question_3_a'),
                'b' => $request->input('question_3_b'),
                'c' => $request->input('question_3_c'),
                'd' => $request->input('question_3_d'),
                'e' => $request->input('question_3_e'),
                'f' => $request->input('question_3_f'),
                'g' => $request->input('question_3_g'),
                'h' => $request->input('question_3_h'),
                'i' => $request->input('question_3_i'),
                'j' => $request->input('question_3_j'),
                'k' => $request->input('question_3_k')
            ]);

            $question7 = json_encode([
                '0' => $request->input('question_7'),
                'a' => $request->input('question_7_a'),
                'b' => $request->input('question_7_b'),
                'c' => $request->input('question_7_c'),
            ]);

            $question8 = json_encode([
                '0' => $request->input('question_8'),
                'a' => $request->input('question_8_a'),
                'b' => $request->input('question_8_b'),
                'c' => $request->input('question_8_c'),
                'i' => $request->input('question_8_d_i'),
                'ii' => $request->input('question_8_d_ii'),
                'iii' => $request->input('question_8_d_iii')
            ]);

            $checklist->update([
                'questions' => $questions,
                'question_1' => $request->input('question_1'),
                'question_2' => $question2,
                'question_3' => $question3,
                'question_4' => $request->input('question_4'),
                'question_5' => $request->input('question_5'),
                'question_6' => $request->input('question_6'),
                'question_7' => $question7,
                'question_8' => $question8,
                'question_9' => $request->input('question_9'),
                'question_10' => $request->input('question_10'),
                'question_11' => $request->input('question_11')
            ]);

            return redirect('checklist_form')->with('success', 'Your form has been submitted successfully.');
            session()->forget('appId');
        }

        else {
            return redirect('checklist_form')->with('error', 'Error updating the form.');
        }
    }
}
