@include('auth.header')


<link rel="stylesheet" href="../fonts/fontawesome-free-6.4.0-web/css/all.css" />
<link rel="stylesheet" href="../css/form.css">



@include('auth.navigation')

<div class="container px-4">
    @include('components.form-component')
    
    <div class="header">
        <h1>FINAL INTERNATIONAL UNIVERSITY</h1>

    </div>

    <div class="main">
        <div style="margin: 20px" class="d-flex justify-content-between">
            <label style="font-size: 20px">№{{ $data->id }}</label>
            <label style="font-size: 20px">{{ $data->user_email }}</label>
        </div>
        <div class="d-flex justify-content-center">
            <img style="width: 15%" src="\images\logo6.png" alt="">
        </div>

        <h3>ETHICS COMMITTEE PROJECT APPLICATION CHECKLIST</h3>
        <h4 class="form-description">Researchers applying to the Final International University (FIU) Ethics
            Committee to
            conduct a research
            that requires data collection from people must have completed all the documents listed in the
            Application
            Checklist. Please review the Application Checklist below. Fill this form and attach it to the beginning
            of your application list</h5>

            @php
                $questions = json_decode($form3->questions);
            @endphp

            <div class="row d-flex justify-content-between">
                <div class="col col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" value="" type="radio" name="form_list"
                            {{ $questions->form_list === 'Ethics Committee Application Form' ? 'checked' : '' }}>
                        <label class="form-label-small" for="form_list">
                            Ethics Committee Application Form
                        </label>
                    </div>
                </div>
                <div class="col col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" value="" type="radio" name="form_list"
                            {{ $questions->form_list === 'Project Information Form' ? 'checked' : '' }}>
                        <label class="form-label-small" for="form_list">
                            Project Information Form
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" value="" type="radio" name="form_list"
                            {{ $questions->form_list === 'Informed Consent Form' ? 'checked' : '' }}>
                        <label class="form-label-small" for="form_list">
                            Informed Consent Form
                        </label>
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="form-label">Parent/Guardian Consent Form</label>
                <div class="col-6 col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" value="Yes" type="radio" name="parent_consent_form"
                            {{ $questions->parent_consent_form === 'Yes' ? 'checked' : '' }}>
                        <label class="form-label-small" for="parent_consent_form">
                            Yes
                        </label>
                    </div>
                </div>
                <div class="col-6 col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" value="No" type="radio" name="parent_consent_form"
                            {{ $questions->parent_consent_form === 'No' ? 'checked' : '' }}>
                        <label class="form-label-small" for="parent_consent_form">
                            Not Needed
                        </label>
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="form-label">Debriefing Form</label>
                <div class="col-6 col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" value="Yes" type="radio" name="debriefing_form"
                            {{ $questions->debriefing_form === 'Yes' ? 'checked' : '' }}>
                        <label class="form-label-small" for="debriefing_form">
                            Yes
                        </label>
                    </div>
                </div>
                <div class="col-6 col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" value="No" type="radio" name="debriefing_form"
                            {{ $questions->debriefing_form === 'No' ? 'checked' : '' }}>
                        <label class="form-label-small" for="debriefing_form">
                            Not Needed
                        </label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" value="Yes" type="radio" name="data_checklist"
                            {{ $questions->data_checklist === 'Yes' ? 'checked' : '' }}>
                        <label class="form-label-small" for="data_checklist">
                            An example of data collection tools (including online forms, applications, etc.)
                        </label>
                    </div>
                </div>
                <div class="col col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" value="No" type="radio" name="data_checklist"
                            {{ $questions->data_checklist === 'No' ? 'checked' : '' }}>
                        <label class="form-label-small" for="data_checklist">
                            Checklist (this form)
                        </label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col"><label class="form-label" for="">Title:</label>
                    <input name="title" class="form-control" type="text" value="{{ $questions->title }}">

                    <label class="form-label" for="">Name and Surname:</label>
                    <input name="name" class="form-control" type="text" value="{{ $questions->name }}">
                </div>

                <div class="col"><label class="form-label" for="">Email:</label>
                    <input name="email" class="form-control" type="text" value="{{ $questions->email }}">

                    <label class="form-label" for="">Date:</label>
                    <input name="date" class="form-control" type="date" value="{{ $questions->date }}">
                </div>

            </div>

            <div class="row">
                <div class="col"><label class="form-label" for="">Signature:</label>
                    <textarea name="signature" class="form-control" type="text">{{ $questions->signature }}</textarea>
                </div>

            </div>




            <div class="row">

                <h4>POINTS TO BE CONSIDERED DURING ETHICAL ASSESSMENT</h4>
                <h4 style="color: red">THE N/A OPTION SHOULD BE USED FOR THOSE QUESTIONS NOT APPLICABLE
                    (For example, if archival records are not to be used, N/A should be marked in Question 1.)</h4
                    style="color: red">

            </div>
            <div class="row">
                <div class="col-7">

                </div>
                <div class="col-3 d-flex justify-content-between">
                    <label for="">Yes</label>
                    <label for="">No</label>
                    <label for="">Partly</label>
                    <label for="">N/A</label>
                </div>
            </div>
            <div class="row">
                <div class="col-7">
                    <label class="form-label">1.</label>
                </div>
                <div class="row">
                    <div class="col-7">
                        <label class="form-label-small">If archival records are to be used in the research, has the
                            relevant
                            legal
                            regulations been complied with and permission has been obtained?</label>
                    </div>
                    <div class="col-3 d-flex justify-content-between">
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Yes" type="radio" name="question_1"
                                {{ $form3->question_1 === 'Yes' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="No" type="radio" name="question_1"
                                {{ $form3->question_1 === 'No' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Partly" type="radio" name="question_1"
                                {{ $form3->question_1 === 'Partly' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="N/A" type="radio" name="question_1"
                                {{ $form3->question_1 === 'N/A' ? 'checked' : '' }}>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-7">
                    <label class="form-label">2. Random assignment</label>
                </div>
                @php
                    $question_2 = json_decode($form3->question_2);
                @endphp
                <div class="row">
                    <div class="col-7">
                        <label class="form-label-small">a. Is it clear that the selection/assignment of the
                            research
                            participants
                            will
                            be done randomly?</label>
                    </div>
                    <div class="col-3 d-flex justify-content-between">
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Yes" type="radio" name="question_2_a"
                                {{ $question_2->a === 'Yes' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="No" type="radio" name="question_2_a"
                                {{ $question_2->a === 'No' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Partly" type="radio" name="question_2_a"
                                {{ $question_2->a === 'Partly' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="N/A" type="radio" name="question_2_a"
                                {{ $question_2->a === 'N/A' ? 'checked' : '' }}>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-7">
                        <label class="form-label-small">b. If one or more control groups are used, is it clear that
                            the
                            assignment
                            of the participants to di erent groups (experimental and control groups)
                            will be done randomly?</label>
                    </div>
                    <div class="col-3 d-flex justify-content-between">
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Yes" type="radio" name="question_2_b"
                                {{ $question_2->b === 'Yes' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="No" type="radio" name="question_2_b"
                                {{ $question_2->b === 'No' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Partly" type="radio" name="question_2_b"
                                {{ $question_2->b === 'Partly' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="N/A" type="radio" name="question_2_b"
                                {{ $question_2->b === 'N/A' ? 'checked' : '' }}>
                        </div>
                    </div>

                </div>
            </div>




            <div class="row">
                <div class="col-7">
                    <label class="form-label">3. Does the informed consent form contain the following
                        items?</label>
                </div>
                @php
                    $question_3 = json_decode($form3->question_3);
                @endphp
                <div class="row">
                    <div class="col-7">
                        <label class="form-label-small">a. The purpose of the research</label>
                    </div>
                    <div class="col-3 d-flex justify-content-between">
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Yes" type="radio" name="question_3_a"
                                {{ $question_3->a === 'Yes' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="No" type="radio" name="question_3_a"
                                {{ $question_3->a === 'No' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Partly" type="radio" name="question_3_a"
                                {{ $question_3->a === 'Partly' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="N/A" type="radio" name="question_3_a"
                                {{ $question_3->a === 'N/A' ? 'checked' : '' }}>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-7">
                        <label class="form-label-small">b. Anticipated time for data collection</label>
                    </div>
                    <div class="col-3 d-flex justify-content-between">
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Yes" type="radio"
                                name="question_3_b"{{ $question_3->b === 'Yes' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="No" type="radio" name="question_3_b"
                                {{ $question_3->b === 'No' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Partly" type="radio" name="question_3_b"
                                {{ $question_3->b === 'Partly' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="N/A" type="radio" name="question_3_b"
                                {{ $question_3->b === 'N/A' ? 'checked' : '' }}>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-7">
                        <label class="form-label-small">c. What the participants are expected to do during the data
                            collection
                            process (for example, lling out a questionnaire, computer-based
                            application, etc.)</label>
                    </div>
                    <div class="col-3 d-flex justify-content-between">
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Yes" type="radio" name="question_3_c"
                                {{ $question_3->c === 'Yes' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="No" type="radio" name="question_3_c"
                                {{ $question_3->c === 'No' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Partly" type="radio" name="question_3_c"
                                {{ $question_3->c === 'Partly' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="N/A" type="radio" name="question_3_c"
                                {{ $question_3->c === 'N/A' ? 'checked' : '' }}>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-7">
                        <label class="form-label-small">d. Participation was on a voluntary basis</label>
                    </div>
                    <div class="col-3 d-flex justify-content-between">
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Yes" type="radio" name="question_3_d"
                                {{ $question_3->d === 'Yes' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="No" type="radio" name="question_3_d"
                                {{ $question_3->d === 'No' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Partly" type="radio" name="question_3_d"
                                {{ $question_3->d === 'Partly' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="N/A" type="radio" name="question_3_d"
                                {{ $question_3->d === 'N/A' ? 'checked' : '' }}>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-7">
                        <label class="form-label-small">e. The participants right to opt out after the research has
                            begun</label>
                    </div>
                    <div class="col-3 d-flex justify-content-between">
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Yes" type="radio" name="question_3_e"
                                {{ $question_3->e === 'Yes' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="No" type="radio" name="question_3_e"
                                {{ $question_3->e === 'No' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Partly" type="radio" name="question_3_e"
                                {{ $question_3->e === 'Partly' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="N/A" type="radio" name="question_3_e"
                                {{ $question_3->e === 'N/A' ? 'checked' : '' }}>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-7">
                        <label class="form-label-small">f. Possible consequences of giving up</label>
                    </div>
                    <div class="col-3 d-flex justify-content-between">
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Yes" type="radio" name="question_3_f"
                                {{ $question_3->f === 'Yes' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="No" type="radio" name="question_3_f"
                                {{ $question_3->f === 'No' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Partly" type="radio" name="question_3_f"
                                {{ $question_3->f === 'Partly' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="N/A" type="radio" name="question_3_f"
                                {{ $question_3->f === 'N/A' ? 'checked' : '' }}>
                        </div>
                    </div>

                </div>


                <div class="row">
                    <div class="col-7">
                        <label class="form-label-small">g. Potential risks, discomfort, or adverse e ects</label>
                    </div>
                    <div class="col-3 d-flex justify-content-between">
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Yes" type="radio" name="question_3_g"
                                {{ $question_3->g === 'Yes' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="No" type="radio" name="question_3_g"
                                {{ $question_3->g === 'No' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Partly" type="radio" name="question_3_g"
                                {{ $question_3->g === 'Partly' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="N/A" type="radio" name="question_3_g"
                                {{ $question_3->g === 'N/A' ? 'checked' : '' }}>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-7">
                        <label class="form-label-small">h. How and for what purpose the information obtained will
                            be
                            used</label>
                    </div>
                    <div class="col-3 d-flex justify-content-between">
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Yes" type="radio" name="question_3_h"
                                {{ $question_3->h === 'Yes' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="No" type="radio" name="question_3_h"
                                {{ $question_3->h === 'No' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Partly" type="radio" name="question_3_h"
                                {{ $question_3->h === 'Partly' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="N/A" type="radio" name="question_3_h"
                                {{ $question_3->h === 'N/A' ? 'checked' : '' }}>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-7">
                        <label class="form-label-small">i. How the participants identity and institution
                            information
                            will
                            be based
                            on con dentiality (anonymity) or how this information will be used and
                            protected by researchers in cases where identity/institution information
                            is required</label>
                    </div>
                    <div class="col-3 d-flex justify-content-between">
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Yes" type="radio" name="question_3_i"
                                {{ $question_3->i === 'Yes' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="No" type="radio" name="question_3_i"
                                {{ $question_3->i === 'No' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Partly" type="radio" name="question_3_i"
                                {{ $question_3->i === 'Partly' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="N/A" type="radio" name="question_3_i"
                                {{ $question_3->i === 'N/A' ? 'checked' : '' }}>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-7">
                        <label class="form-label-small">j. Incentives (if any) for participation</label>
                    </div>
                    <div class="col-3 d-flex justify-content-between">
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Yes" type="radio" name="question_3_j"
                                {{ $question_3->j === 'Yes' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="No" type="radio" name="question_3_j"
                                {{ $question_3->j === 'No' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Partly" type="radio" name="question_3_j"
                                {{ $question_3->j === 'Partly' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="N/A" type="radio" name="question_3_j"
                                {{ $question_3->j === 'N/A' ? 'checked' : '' }}>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-7">
                        <label class="form-label-small">k. By whom the research was conducted and how to reach them
                            (for
                            large
                            teams, only the name of the lead person may be written.)</label>
                    </div>
                    <div class="col-3 d-flex justify-content-between">
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Yes" type="radio" name="question_3_k"
                                {{ $question_3->k === 'Yes' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="No" type="radio" name="question_3_k"
                                {{ $question_3->k === 'No' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Partly" type="radio" name="question_3_k"
                                {{ $question_3->k === 'Partly' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="N/A" type="radio" name="question_3_k"
                                {{ $question_3->k === 'N/A' ? 'checked' : '' }}>
                        </div>
                    </div>

                </div>
            </div>



            <div class="row">
                <div class="col-7">
                    <label class="form-label">4.</label>
                </div>
                <div class="row">
                    <div class="col-7">
                        <label class="form-label-small">Does the researcher have a dual role in the research that
                            will
                            create a con ict
                            of interest?</label>
                    </div>
                    <div class="col-3 d-flex justify-content-between">
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Yes" type="radio" name="question_4"
                                {{ $form3->question_4 === 'Yes' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="No" type="radio" name="question_4"
                                {{ $form3->question_4 === 'No' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">

                        </div>
                        <div class="form-check mx-0">

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-7">
                    <label class="form-label">5.</label>
                </div>
                <div class="row">
                    <div class="col-7">
                        <label class="form-label-small"> If the information is to be collected in the research on
                            sensitive
                            issues (sexual
                            orientation, substance use, illegitimate behaviors, etc.), are measures taken to
                            protect the rights of the participants and ensure condentiality?</label>
                    </div>
                    <div class="col-3 d-flex justify-content-between">
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Yes" type="radio" name="question_5"
                                {{ $form3->question_5 === 'Yes' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="No" type="radio" name="question_5"
                                {{ $form3->question_5 === 'No' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Partly" type="radio" name="question_5"
                                {{ $form3->question_5 === 'Parlty' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="N/A" type="radio" name="question_5"
                                {{ $form3->question_5 === 'N/A' ? 'checked' : '' }}>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-7">
                    <label class="form-label">6.</label>
                </div>
                <div class="row">
                    <div class="col-7">
                        <label class="form-label-small"> If any audio or video recording is to be taken, is it
                            stated
                            that
                            prior permission
                            will be obtained?</label>
                    </div>
                    <div class="col-3 d-flex justify-content-between">
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Yes" type="radio" name="question_6"
                                {{ $form3->question_6 === 'Yes' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="No" type="radio" name="question_6"
                                {{ $form3->question_6 === 'No' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Partly" type="radio"
                                name="question_6"{{ $form3->question_6 === 'Partly' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="N/A" type="radio" name="question_6"
                                {{ $form3->question_6 === 'N/A' ? 'checked' : '' }}>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                @php
                    $question7 = json_decode($form3->question_7);

                @endphp
                <div class="col-7">
                    <label class="form-label">7. Will research be conducted with students or people working for the
                        researchers?
                        If the answer is no, or there are no incentives and no negative consequences of
                        their refusal to participate, skip to question 8.</label>
                </div>
                <div class="col-3 d-flex justify-content-between">
                    <div class="form-check mx-0">
                        <input class="form-check-input" value="Yes" type="radio" name="question_7"
                            {{ $question7->{0} === 'Yes' ? 'checked' : '' }}>
                    </div>
                    <div class="form-check mx-0">
                        <input class="form-check-input" value="No" id="no-7" type="radio"
                            name="question_7" {{ $question7->{0} === 'No' ? 'checked' : '' }}>
                    </div>
                    <div class="form-check mx-0">

                    </div>
                    <div class="form-check mx-0">

                    </div>
                </div>
                <div id="question-7-section">
                    <div class="row">
                        <div class="col-7">
                            <label class="form-label-small">a. Are measures taken to protect participants against
                                the
                                negative
                                consequences of their refusal to participate in the research or their
                                withdrawal?</label>
                        </div>
                        <div class="col-3 d-flex justify-content-between">
                            <div class="form-check mx-0">
                                <input class="form-check-input" value="Yes" type="radio" name="question_7_a"
                                    {{ $question7->a === 'Yes' ? 'checked' : '' }}>
                            </div>
                            <div class="form-check mx-0">
                                <input class="form-check-input" value="No" type="radio" name="question_7_a"
                                    {{ $question7->a === 'No' ? 'checked' : '' }}>
                            </div>
                            <div class="form-check mx-0">
                                <input class="form-check-input" value="Partly" type="radio" name="question_7_a"
                                    {{ $question7->a === 'Partly' ? 'checked' : '' }}>
                            </div>
                            <div class="form-check mx-0">
                                <input class="form-check-input" value="N/A" type="radio" name="question_7_a"
                                    {{ $question7->a === 'N/A' ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <label class="form-label-small">b. If participation in the research will provide extra
                                points
                                as required by
                                the course; are di erent options o ered to those who may choose not to
                                participate?</label>
                        </div>
                        <div class="col-3 d-flex justify-content-between">
                            <div class="form-check mx-0">
                                <input class="form-check-input" value="Yes" type="radio" name="question_7_b"
                                    {{ $question7->b === 'Yes' ? 'checked' : '' }}>
                            </div>
                            <div class="form-check mx-0">
                                <input class="form-check-input" value="No" type="radio" name="question_7_b"
                                    {{ $question7->b === 'No' ? 'checked' : '' }}>
                            </div>
                            <div class="form-check mx-0">
                                <input class="form-check-input" value="Partly" type="radio" name="question_7_b"
                                    {{ $question7->b === 'Partly' ? 'checked' : '' }}>
                            </div>
                            <div class="form-check mx-0">
                                <input class="form-check-input" value="N/A" type="radio" name="question_7_b"
                                    {{ $question7->b === 'N/A' ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-7">
                            <label class="form-label-small">c. Are the economic or other incentives (extra points
                                for
                                the course) to be
                                provided to the participants for participation in the research in amounts
                                that make participation compulsory?</label>
                        </div>
                        <div class="col-3 d-flex justify-content-between">
                            <div class="form-check mx-0">
                                <input class="form-check-input" value="Yes" type="radio" name="question_7_c"
                                    {{ $question7->c === 'Yes' ? 'checked' : '' }}>
                            </div>
                            <div class="form-check mx-0">
                                <input class="form-check-input" value="No" type="radio" name="question_7_c"
                                    {{ $question7->c === 'No' ? 'checked' : '' }}>
                            </div>
                            <div class="form-check mx-0">
                                <input class="form-check-input" value="Partly" type="radio" name="question_7_c"
                                    {{ $question7->c === 'Partly' ? 'checked' : '' }}>
                            </div>
                            <div class="form-check mx-0">
                                <input class="form-check-input" value="N/A" type="radio" name="question_7_c"
                                    {{ $question7->c === 'N/A' ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                @php
                    $question8 = json_decode($form3->question_8);
                @endphp
                <div class="row">
                    <div class="col-7">
                        <label class="form-label">8. Will deception be used? If your answer is no skip to question
                            9.</label>
                    </div>
                    <div class="col-3 d-flex justify-content-between">
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Yes" type="radio" name="question_8"
                                {{ $question8->{0} === 'Yes' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="No" id="no-8" type="radio"
                                name="question_8" {{ $question8->{0} === 'No' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Partly" type="radio" name="question_8"
                                {{ $question8->{0} === 'Partly' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">

                        </div>
                    </div>
                </div>
                <div id="question-8-section">
                    <div class="row">
                        <div class="col-7">
                            <label class="form-label-small">a. Will deception be used in a situation where it can
                                be
                                predicted to cause
                                physical pain or severe emotional distress to the participant?</label>
                        </div>
                        <div class="col-3 d-flex justify-content-between">
                            <div class="form-check mx-0">
                                <input class="form-check-input" value="Yes" type="radio" name="question_8_a"
                                    {{ $question8->a === 'Yes' ? 'checked' : '' }}>
                            </div>
                            <div class="form-check mx-0">
                                <input class="form-check-input" value="No" type="radio" name="question_8_a"
                                    {{ $question8->a === 'No' ? 'checked' : '' }}>
                            </div>
                            <div class="form-check mx-0">
                                <input class="form-check-input" value="Partly" type="radio" name="question_8_a"
                                    {{ $question8->a === 'Partly' ? 'checked' : '' }}>
                            </div>
                            <div class="form-check mx-0">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <label class="form-label-small">b. Is it stated that any deception necessary for the
                                healthy
                                conduct of
                                the research will be disclosed to the participants at the end of the
                                participation and as early as possible (debrie ng)?</label>
                        </div>
                        <div class="col-3 d-flex justify-content-between">
                            <div class="form-check mx-0">
                                <input class="form-check-input" value="Yes" type="radio" name="question_8_b"
                                    {{ $question8->b === 'Yes' ? 'checked' : '' }}>
                            </div>
                            <div class="form-check mx-0">
                                <input class="form-check-input" value="No" type="radio" name="question_8_b"
                                    {{ $question8->b === 'No' ? 'checked' : '' }}>
                            </div>
                            <div class="form-check mx-0">
                                <input class="form-check-input" value="Partly" type="radio" name="question_8_b"
                                    {{ $question8->b === 'Partly' ? 'checked' : '' }}>
                            </div>
                            <div class="form-check mx-0">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-7">
                            <label class="form-label-small">c. Has a debrie ng form been submitted in the case of
                                deception
                                in the
                                research?</label>
                        </div>
                        <div class="col-3 d-flex justify-content-between">
                            <div class="form-check mx-0">
                                <input class="form-check-input" value="Yes" type="radio" name="question_8_c"
                                    {{ $question8->c === 'Yes' ? 'checked' : '' }}>
                            </div>
                            <div class="form-check mx-0">
                                <input class="form-check-input" value="No" type="radio" name="question_8_c"
                                    {{ $question8->c === 'No' ? 'checked' : '' }}>
                            </div>
                            <div class="form-check mx-0">

                            </div>
                            <div class="form-check mx-0">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-7">
                            <label class="form-label-small">d. Does the Debrie ng Form contain the following items
                                (i-iii)?</label>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small">i. The real purpose of the research</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between">
                                <div class="form-check mx-0">
                                    <input class="form-check-input" value="Yes" type="radio"
                                        name="question_8_d_i" {{ $question8->i === 'Yes' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check mx-0">
                                    <input class="form-check-input" value="No" type="radio"
                                        name="question_8_d_i" {{ $question8->i === 'No' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check mx-0">
                                    <input class="form-check-input" value="Partly" type="radio"
                                        name="question_8_d_i" {{ $question8->i === 'Partly' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check mx-0">
                                    <input class="form-check-input" value="N/A" type="radio"
                                        name="question_8_d_i" {{ $question8->i === 'N/A' ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small">ii. Reason for deception</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between">
                                <div class="form-check mx-0">
                                    <input class="form-check-input" value="Yes" type="radio"
                                        name="question_8_d_ii" {{ $question8->ii === 'Yes' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check mx-0">
                                    <input class="form-check-input" value="No" type="radio"
                                        name="question_8_d_ii" {{ $question8->ii === 'No' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check mx-0">
                                    <input class="form-check-input" value="Partly" type="radio"
                                        name="question_8_d_ii" {{ $question8->ii === 'Partly' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check mx-0">
                                    <input class="form-check-input" value="N/A" type="radio"
                                        name="question_8_d_ii" {{ $question8->ii === 'N/A' ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small">iii. The participants potential questions or ideas
                                    can
                                    be
                                    forwarded to
                                    the researcher or FIU Ethical Committee.</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between">
                                <div class="form-check mx-0">
                                    <input class="form-check-input" value="Yes" type="radio"
                                        name="question_8_d_iii" {{ $question8->iii === 'Yes' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check mx-0">
                                    <input class="form-check-input" value="No" type="radio"
                                        name="question_8_d_iii" {{ $question8->iii === 'No' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check mx-0">
                                    <input class="form-check-input" value="Partly" type="radio"
                                        name="question_8_d_iii" {{ $question8->iii === 'Partly' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check mx-0">
                                    <input class="form-check-input" value="N/A" type="radio"
                                        name="question_8_d_iii" {{ $question8->iii === 'N/A' ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-7">
                    <label class="form-label">9.</label>
                </div>
                <div class="row">
                    <div class="col-7">
                        <label class="form-label-small"> If there are possible risks that may arise during the
                            research, have necessary
                            measures been explained to minimize or compensate for the harm done to the
                            participant if it is realized?</label>
                    </div>
                    <div class="col-3 d-flex justify-content-between">
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Yes" type="radio" name="question_9"
                                {{ $form3->question_9 === 'Yes' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="No" type="radio" name="question_9"
                                {{ $form3->question_9 === 'No' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Partly" type="radio" name="question_9"
                                {{ $form3->question_9 === 'Partly' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="N/A" type="radio" name="question_9"
                                {{ $form3->question_9 === 'N/A' ? 'checked' : '' }}>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-7">
                    <label class="form-label">10.</label>
                </div>
                <div class="row">
                    <div class="col-7">
                        <label class="form-label-small"> Is it speci ed how research data will be recorded
                            (consistent
                            with the principle
                            of condentiality)?</label>
                    </div>
                    <div class="col-3 d-flex justify-content-between">
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Yes" type="radio" name="question_10"
                                {{ $form3->question_10 === 'Yes' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="No" type="radio" name="question_10"
                                {{ $form3->question_10 === 'No' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Partly" type="radio" name="question_10"
                                {{ $form3->question_10 === 'Partly' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="N/A" type="radio" name="question_10"
                                {{ $form3->question_10 === 'N/A' ? 'checked' : '' }}>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-7">
                    <label class="form-label">11.</label>
                </div>
                <div class="row">
                    <div class="col-7">
                        <label class="form-label-small"> Is it speci ed how research data will be recorded
                            (consistent
                            with the principle
                            of condentiality)?</label>
                    </div>
                    <div class="col-3 d-flex justify-content-between">
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="Yes" type="radio" name="question_11"
                                {{ $form3->question_11 === 'Yes' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">
                            <input class="form-check-input" value="No" type="radio" name="question_11"
                                {{ $form3->question_11 === 'No' ? 'checked' : '' }}>
                        </div>
                        <div class="form-check mx-0">

                        </div>
                        <div class="form-check mx-0">

                        </div>
                    </div>
                </div>
            </div>
    </div>

    </form>
</div>



<script>
    $(document).ready(function() {
        const question_7 = $('input[name="question_7"]');
        const question_8 = $('input[name="question_8"]');

        question_7.on('change', function() {
            if ($('#no-7').is(':checked')) {
                $('#question-7-section').hide();
            } else {
                $('#question-7-section').show()
            }
        })
        if ($('#no-7').is(':checked')) {
            $('#question-7-section').hide();
        } else {
            $('#question-7-section').show()
        }

        question_8.on('change', function() {
            if ($('#no-8').is(':checked')) {
                $('#question-8-section').hide();
            } else {
                $('#question-8-section').show();
            }
        })

        $('.main input').prop('readonly', true)
        $('.main input[type=radio]').prop('disabled', true)
        $('.main textarea').prop('readonly', true)

    })
</script>
</body>
