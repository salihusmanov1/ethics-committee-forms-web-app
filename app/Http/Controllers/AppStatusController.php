<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\AppStatus;
use App\Models\ChecklistForm;
use App\Models\Form2;
use App\Models\Form1;
use App\Models\Form3;

use Illuminate\Http\Request;

class AppStatusController extends Controller
{
    public function delete_appstatus($id)
    {

        $row = AppStatus::find($id);
        if ($row->status !== "Approved" && $row->status !== "Pending") {
            $row->delete();
            return redirect('appstatus')->with('status', 'Data removed successfully');
        } else {
            return redirect()->route('app-status')->with('error', "Cannot delete an approved/pending form");
        }
    }

    public function edit($id)
    {
        $data = AppStatus::find($id);

        if ($data->status !== "Approved") {

            if ($data->type === "ETHICS COMMITTEE PROJECT INFORMATION FORM") {
                $pageName = "ETHICS COMMITTEE";
                $form2 = Form2::where('app_id', $data->id)->first();
                Session::put('appId', $data->id);
                return view('edit.edit-form2', ['form2' => $form2, 'data' => $data])->with('pageName', $pageName);
            }
            if ($data->type === "ETHICS COMMITTEE APPLICATION FORM") {
                $form1 = Form1::where('app_id', $data->id)->first();

                Session::put('appId', $data->id);

                $pageName = "ETHICS COMMITTEE";
                return view('edit.edit-form1', compact(
                    'form1',
                    'data'
                ))->with('pageName', $pageName);
            }
            if ($data->type === "ETHICS COMMITTEE PROJECT APPLICATION CHECKLIST") {
                $checklist = ChecklistForm::where('app_id', $data->id)->first();

                Session::put('appId', $data->id);

                $pageName = "ETHICS COMMITTEE PROJECT APPLICATION CHECKLIST";
                return view('edit.edit-form3', compact(
                    'checklist',
                    'data'
                ))->with('pageName', $pageName);
            }
        } else {
            return redirect()->route('app-status')->with('error', "Cannot edit an approved form");
        }
    }

    public function show($id)
    {
        
        $data = AppStatus::find($id);
        if ($data->type === "ETHICS COMMITTEE PROJECT INFORMATION FORM") {
            $pageName = "ETHICS COMMITTEE PROJECT INFORMATION FORM";

            $form2 = Form2::where('app_id', $data->id)->first();
            return view('show.show-form2', ['form2' => $form2, 'data' => $data])->with('pageName', $pageName);
        }

        if ($data->type === "ETHICS COMMITTEE APPLICATION FORM") {
            $form1 = Form1::where('app_id', $data->id)->first();

            $pageName = "ETHICS COMMITTEE APPLICATION FORM";
            return view('show.show-form1', compact(
                'form1',
                'data'
            ))->with('pageName', $pageName);
        }

        if ($data->type === "ETHICS COMMITTEE PROJECT APPLICATION CHECKLIST") {
            $checklist = ChecklistForm::where('app_id', $data->id)->first();

            $pageName = "ETHICS COMMITTEE PROJECT APPLICATION CHECKLIST";
            return view('show.show-form3', compact(
                'checklist',
                'data'
            ))->with('pageName', $pageName);
        }
    }

    public function update_appstatus(Request $request)
    {

        $id = $request->input('app-id');
        $data = AppStatus::find($id);

        $data->update([
            'admin_comment' => $request->input('admin-comment'),
            'status' => $request->status_options
        ]);

       return redirect()->route('app-status')->with('success', 'You updated successfully');
    }
}
