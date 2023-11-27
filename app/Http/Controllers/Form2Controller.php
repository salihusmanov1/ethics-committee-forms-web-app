<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form2;
use App\Models\AppStatus;
use Symfony\Component\Console\Input\Input;

class Form2Controller extends Controller
{
    public function submitForm2(Request $request)
    {


        $yes_no1 = $request->input('flexRadioDefault2_0');

        if ($yes_no1  === 'yes') {
            $optionValue = $request->input('text_1');
        } else {
            $optionValue = '';
        }

        $yes_no2 = $request->input('flexRadioDefault2_1');

        if ($yes_no2 === 'yes') {
            $optionValue1 = $request->input('text_2');
        } else {
            $optionValue1 = '';
        }

        $yes_no3 = $request->input('flexRadioDefault2_2');

        if ($yes_no3 === 'yes') {
            $optionValue2 = $request->input('text_3');
        } else {
            $optionValue2 = '';
        }


        $data = [
            'user_id' => auth()->user()->id,
            'description' => $request->input('description'),
            'data_col_plan' => $request->input('data_col_plan'),
            'exp_result' => $request->input('exp_result'),
            'yes_no1' => $yes_no1,
            'if_involve' => $optionValue,
            'yes_no2' => $yes_no2,
            'partic_kept_uniformed' => $optionValue1,
            'poten_contr' => $request->input('poten_contr'),
            'yes_no3' => $yes_no3,
            'research_before' => $optionValue2,
            'rname' => $request->input('rname'),
            'sname' => $request->input('sname')
        ];

        $form = Form2::create($data);
        
        $app_status = [
            'user_id' => auth()->user()->id,
            'form_id' => $form->id,
            'form_type' => 2,
            'checklist_form_id' => null,
            'status' => 'New',
            'user_email' => auth()->user()->email
        ];

        AppStatus::create($app_status);

        return redirect('form2')->with('success', 'Your form has been submitted successfully.');
    }

    public function update(Request $request)
    {
        $id = session('appId');
        $data = Form2::where('app_id', $id);


        if ($data) {
            $yes_no1 = $request->input('flexRadioDefault2_0');

            if ($yes_no1 === 'yes') {
                $optionValue = $request->input('text_1');
            } else {
                $optionValue = '';
            }

            $yes_no2 = $request->input('flexRadioDefault2_1');

            if ($yes_no2 === 'yes') {
                $optionValue1 = $request->input('text_2');
            } else {
                $optionValue1 = '';
            }

            $yes_no3 = $request->input('flexRadioDefault2_2');

            if ($yes_no3 === 'yes') {
                $optionValue2 = $request->input('text_3');
            } else {
                $optionValue2 = '';
            }
            $data->update([
                'description' => $request->input('description'),
                'data_col_plan' => $request->input('data_col_plan'),
                'exp_result' => $request->input('exp_result'),
                'yes_no1' => $yes_no1,
                'if_involve' => $optionValue,
                'yes_no2' => $yes_no2,
                'partic_kept_uniformed' => $optionValue1,
                'poten_contr' => $request->input('poten_contr'),
                'yes_no3' => $yes_no3,
                'research_before' => $optionValue2,
                'rname' => $request->input('rname'),
                'sname' => $request->input('sname')
            ]);


            return redirect('form2')->with('success', 'Your form has been submitted successfully.');
            session()->forget('appId');
        }
    }
}
