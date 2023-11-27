<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Session;
use App\Models\AppStatus;
use App\Models\Form2;
use App\Models\Form1;
use App\Models\Forms;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\New_;
use Ramsey\Uuid\Type\Integer;
use Barryvdh\DomPDF\Facade\Pdf;

class NavController extends Controller
{


    public function form1()
    {
        $pageName = "ETHICS COMMITTEE";
        return view("auth.form1")->with('pageName', $pageName);
    }

    public function form2()
    {
        $pageName = "ECPIF";
        return view("auth.form2")->with('pageName', $pageName);
    }

    public function checklist_form()
    {     
        $data = AppStatus::where('user_id', auth()->user()->id)->get();
        $forms = Forms::all();
        $pageName = "ECAC";
        return view("auth.checklist_form", ['data' => $data, 'forms' => $forms])->with('pageName', $pageName);
    }

    public function dashboard()
    {
        $pageName = "HOME";
        return view("auth.dashboard")->with('pageName', $pageName);
    }

    public function appstatus()
    {
        if (auth()->user()->role_id == 1) {
            $datas = AppStatus::where('user_id', auth()->user()->id)->get();
        } else {
            $datas = AppStatus::all();
        }

        $pageName = "APP STATUS";
        return view("auth.appstatus", ['datas' => $datas])->with('pageName', $pageName);
    }


    public function admin_dashboard()
    {
        $apps = AppStatus::all();
        $newapps = 0;
        $approvedapps = 0;
        $pendingapps = 0;
        foreach ($apps as $app) {
            if ($app->status === 'New') {
                $newapps++;
            }
            if ($app->status === 'Approved') {
                $approvedapps++;
            }
            if ($app->status === 'Pending') {
                $pendingapps++;
            }
        }

        $users = User::where('role_id', 1)->latest('created_at')->get();

        $pageName = "ADMIN DASHBOARD";
        return view('auth.admin_dashboard')->with(['pageName' => $pageName, 'newapps' => $newapps, 'approvedapps' => $approvedapps, 'pendingapps' => $pendingapps, 'users' => $users]);
    }


    // public function generatePdf(Request $request, $id)
    // {
        
    //         $data = app_status::find($id);

    //         if ($data->type === "ETHICS COMMITTEE PROJECT INFORMATION FORM")
    //         {
    //             $form2 = Form2::where('app_id', $data->id)->first();
    //             $pdfView = view('pdf.pdf-form2', ['form2' => $form2])->render();
        
    //             $pdf = Pdf::loadHTML($pdfView);
    //             return $pdf->stream('form2-pdf.pdf');
    //         }
      
    //         if ($data->type === "ETHICS COMMITTEE APPLICATION FORM")
    //         {
    //             $study = Study::where('app_id', $data->id)->first();
    //             $researchers = Researchers::where('app_id', $data->id)->first();
    //             $other_researchers = Other_Researchers::where('app_id', $data->id)->first();
    //             $advisor = Advisor_Supervisor::where('app_id', $data->id)->first();
    //             $organization = Organizations::where('app_id', $data->id)->first();
    //             $other = Other_Questions::where('app_id', $data->id)->first();
    //             $extension = extension_of_previous_study::where('app_id', $data->id)->first();
    //             $reporting = reporting_changes::where('app_id', $data->id)->first();
    //             $new = new_or_revised::where('app_id', $data->id)->first();

    //             $pdfView = view('pdf.pdf-form1', [
    //                 'study' => $study,
    //                 'researchers' => $researchers,
    //                 'other_researchers' => $other_researchers,
    //                 'advisor' => $advisor,
    //                 'organization' => $organization,
    //                 'other' => $other,
    //                 'extension' => $extension,
    //                 'reporting' => $reporting,
    //                 'new' => $new
    //             ])->render();

    //             $pdf = Pdf::loadHTML($pdfView);
    //             return $pdf->stream('form1-pdf.pdf');
    //         }

    // }
}
