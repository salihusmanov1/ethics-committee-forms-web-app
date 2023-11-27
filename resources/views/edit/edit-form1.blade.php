@include('auth.header')


<link rel="stylesheet" href="../css/form.css">
</head>

<link rel="stylesheet" href="../fonts/fontawesome-free-6.4.0-web/css/all.css" />

@include('auth.navigation')

<div class="container">
    <div class="header">
        <h1>FINAL INTERNATIONAL UNIVERSITY</h1>
    </div>

    <form class="main" _lpchecked="1" method="POST" action="{{ route('edit-form1') }}">
        <div style="margin: 20px" class="d-flex justify-content-between">
            <label style="font-size: 20px">№{{$data->id}}</label>
            <label style="font-size: 20px">{{$data->user_email}}</label>
        </div>
        <div class="d-flex justify-content-center">
            <img style="width: 15%" src="\images\logo6.png" alt="">
        </div>
        <h3>ETHICS COMMITTEE APPLICATION FORM</h3>
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        @csrf
        <!-- 1 -->
        <div class="mb-3 row">
            <div class="col">
                <label class="form-label">1. Title Of Study</label>
                <input value="{{ $form1->title_of_study }}" name="title_of_study" type="text" class="form-control"
                    placeholder="">
            </div>
        </div>
        <!-- 2 -->
        <div class="mb-3 row">
            <label class="form-label">2. Type Of Study</label>
            <div class="form-check">
                <input class="form-check-input" id="acRadio" type="radio" value="Academic Staff Study"
                    name="flexRadioDefault" {{ $form1->type_of_study === 'Academic Staff Study' ? 'checked' : '' }}>
                <label class="form-label-small" for="flexCheckDefault">
                    Academic Staff Study
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="Doctorate Thesis" name="flexRadioDefault"
                    {{ $form1->type_of_study === 'Doctorate Thesis' ? 'checked' : '' }}>
                <label class="form-label-small" for="flexCheckChecked">
                    Doctorate Thesis
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="Master Thesis" name="flexRadioDefault"
                    {{ $form1->type_of_study === 'Master Thesis' ? 'checked' : '' }}>
                <label class="form-label-small" for="flexCheckChecked">
                    Master Thesis
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="other" name="flexRadioDefault"
                    id="otherRadio"{{ $form1->type_of_study === 'Doctorate Thesis' || $form1->type_of_study === 'Master Thesis' || $form1->type_of_study === 'Academic Staff Study' ? '' : 'checked' }}>
                <label class="form-label-small" for="flexCheckChecked">
                    Other (Specify):
                </label>
            </div>

            <div id="inputContainer">
                <input value="{{ $form1->type_of_study }}" name="otherInput" type="text" class="form-control"
                    placeholder="">
            </div>

        </div>


        <div class="mb-3 row">
            <!-- 3 -->
            @php
                $researchers = json_decode($form1->researchers);
            @endphp
            <label class="form-label">3. Researcher's</label>
            <div class="col">
                <label class="form-label-small">Name and surname:</label>
                <input value="{{ $researchers->name }}" name="r_name" type="text" class="form-control"
                    placeholder="">
                <label class="form-label-small">Department:</label>
                <input value="{{ $researchers->department }}" name="r_department" type="text"
                    class="form-control" placeholder="">
                <label class="form-label-small">Institute:</label>
                <input value="{{ $researchers->institution }}" name="r_institution" type="text"
                    class="form-control" placeholder="">
                <label class="form-label-small">Phone:</label>
                <input value="{{ $researchers->phone }}" name="r_phone" type="text" class="form-control"
                    placeholder="">
                <label class="form-label-small">Address:</label>
                <textarea name="r_address" type="text" class="form-control" placeholder="" rows="3">{{ $researchers->address }}</textarea>
                <label class="form-label-small">Email:</label>
                <input value="{{ $researchers->email }}" name="r_email" type="text" class="form-control"
                    placeholder="">
            </div>
        </div>
        <!-- 4 -->
        <div class="mb-3 row">
            <label class="form-label">4. Other Researchers (if any)</label>
            <div class="col" style="margin: 10px">
                <a id="addInput" class="btn btn-light w-25">Add</a>
            </div>
            <div id="inputContainer1">
                @php
                    $other_researchers = json_decode($form1->other_researchers);
                @endphp
                @if ($other_researchers)
                    @foreach ($other_researchers as $key => $researchers)
                        <div class="row inputs">
                            <div class="col">
                                <input value="{{ $researchers->name }}" type="text" class="form-control"
                                    name="res_name[]" placeholder="Name">
                            </div>

                            <div class="col">
                                <input value="{{ $researchers->institute }}" type="text" class="form-control"
                                    name="res_institute[]" placeholder="Institute">
                            </div>

                            <div class="col">
                                <a class="btn btn-danger removeInput">Remove</a>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>

        <!-- 5 -->
        <div class="mb-3 row" id="section-5">
            <label class="form-label">
                5. Advisor’s/Supervising Faculty Member’s <i>(Undergraduate students conducting research must have an
                    academic advisor/instructor supervising their research):</i>
            </label>
            @php
                $advisor = json_decode($form1->advisors);
            @endphp
            <div class="col">
                <label class="form-label-small">Title:</label>
                <select class="form-control form-select form-select-lg" name="titles_options"
                    aria-label=".form-select-lg">
                    <option value="Prof. Dr." {{ $advisor->title === 'Prof. Dr.' ? 'selected' : '' }}> Prof. Dr.
                    </option>
                    <option value="Assoc. Pro. Dr." {{ $advisor->title === 'Assoc. Pro. Dr.' ? 'selected' : '' }}>
                        Assoc. Pro. Dr.</option>
                    <option value="Asst. Prof. Dr."{{ $advisor->title === 'Asst. Prof. Dr.' ? 'selected' : '' }}>Asst.
                        Prof. Dr.</option>
                    <option value="Dr." {{ $advisor->title === 'Dr.' ? 'selected' : '' }}>Dr.</option>
                    <option value="Sen. Instr." {{ $advisor->title === 'Sen. Instr.' ? 'selected' : '' }}>Sen. Instr.
                    </option>
                    <option value="Instr." {{ $advisor->title === 'Instr.' ? 'selected' : '' }}>Instr.</option>
                </select>


                <label class="form-label-small">Name and surname:</label>
                <input value="{{ $advisor->name }}" name="a_name" type="text" class="form-control">
                <label class="form-label-small">Department:</label>
                <input value="{{ $advisor->department }}" name="a_department" type="text" class="form-control">

            </div>
            <div class="col">
                <label class="form-label-small">Phone:</label>
                <input value="{{ $advisor->phone }}" name="a_phone" type="text" class="form-control"
                    placeholder="+xx xxx xxx xx">
                <label class="form-label-small">Address:</label>
                <input value="{{ $advisor->address }}" name="a_address" type="text" class="form-control"
                    name="Address:">
                <label class="form-label-small">E-mail:</label>
                <input value="{{ $advisor->email }}" name="a_email" type="text" class="form-control"
                    name="E-mail:" placeholder="example@gmail.com">
            </div>
        </div>
        <!-- 6 -->
        <div class="mb-3 row">
            @php
                $date = json_decode($form1->expected_time_frame);
            @endphp
            <div class="form-label">6. Expected time frame of the study:</div>

            <div class="col">
                <label class="form-label-small">Start:</label>
                <input value="{{ $date->expected_start }}" class="form-control" type="date"
                    name="Expected_Start" max="2040-12-31" min="1995-01-01">
            </div>
            <div class="col">
                <label class="form-label-small">End:</label>
                <input value="{{ $date->expected_end }}" class="form-control" type="date" name="Expected_End"
                    max="2040-12-31" min="1995-01-01">
            </div>

            <p>
                <span style="color: red">The start date of the study should be at least three weeks from your date of
                    application.</span>
            </p>
        </div>
        <!-- 7 -->
        <div class="mb-3 row">
            <label class="form-label">7. Organizations, institutions in which data collection is planned to be
                accomplished:</label>

            <div class="col" style="margin: 10px">
                <a id="addOrgInput" class="btn btn-light w-25">Add</a>
            </div>
            <div id="inputContainer3">
                @php
                    $org = json_decode($form1->org_inst);
                @endphp

                @if ($org)
                    @foreach ($org as $key => $org_name)
                        <div class="row org_inputs">
                            <div class="col">
                                <input value="{{ $org_name }}" type="text" class="form-control"
                                    name="org_name[]" placeholder="Name">
                            </div>


                            <div class="col">
                                <a class="btn btn-danger removeOrgInput">Remove</a>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>

        </div>

        <!-- 8 -->
        <div class="mb-3 row">
            <label for="" class="form-label">8. Is the approval/permission of an institution or
                organization other than IFU required for data
                collection?</label>
            <div class="form-check">
                <input {{ $form1->question_8 === 'no' ? 'checked' : '' }} class="form-check-input" type="radio"
                    value="no" name="flexRadioDefault1">
                <label class="form-label-small" for="flexCheckDefault1">No</label>
            </div>
            <div class="form-check">
                <input {{ $form1->question_8 !== 'no' ? 'checked' : '' }} class="form-check-input" id="yesRadio"
                    type="radio" value="yes" name="flexRadioDefault1">
                <label class="form-label-small" for="flexCheckDefault1">Yes(specify)</label>
            </div>

            <div class="col" id="inputContainer5">
                @if ($form1->question_8 !== 'no')
                    <input value="{{ $form1->question_8 }}" name="if_required" type="text" class="form-control"
                        placeholder="">
                @endif
            </div>

        </div>
        <!-- 9 -->
        @php
            $question9 = json_decode($form1->question_9);

        @endphp
        <div class="mb-3 row">
            <label for="" class="form-label">9. Whether the project is supported/funded or not:</label>
            <div class="form-check">
                <input {{ $question9->is_supported === 'Supported' ? 'checked' : '' }} class="form-check-input"
                    value="Supported" type="radio" name="flexRadioDefault2">
                <label class="form-label-small" for="flexCheckDefault2">Supported</label>
            </div>
            <div class="form-check">
                <input {{ $question9->is_supported === 'Not Supported' ? 'checked' : '' }} class="form-check-input"
                    value="Not Supported" type="radio" name="flexRadioDefault2">
                <label class="form-label-small" for="flexCheckDefault2">Not Suported</label>
            </div>

            <label for="" class="form-label">If supported, specify institution:</label>
            <div class="form-check">
                <input {{ $question9->institution === 'University' ? 'checked' : '' }} class="form-check-input"
                    value="University" type="radio" name="flexRadioDefault3">
                <label class="form-label-small" for="flexCheckDefault3">University</label>
            </div>
            <div class="form-check">
                <input {{ $question9->institution === 'TUBITAK' ? 'checked' : '' }} class="form-check-input"
                    value="TUBITAK" type="radio" name="flexRadioDefault3">
                <label class="form-label-small" for="flexCheckDefault3">TUBITAK</label>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-check">
                        <label class="form-label-small" for="flexCheckDefault3">International (please specify)</label>
                        <input {{ $question9->institution === 'international' ? 'checked' : '' }}
                            class="form-check-input" id="international" value="international" type="radio"
                            name="flexRadioDefault3">
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <label class="form-label-small" for="flexCheckDefault3">Other (please specify)</label>
                        <input {{ $question9->institution === 'other' ? 'checked' : '' }} class="form-check-input"
                            id="other" value="other" type="radio" name="flexRadioDefault3">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col" id="inputContainer6">
                    @if ($question9->institution === 'international')
                        <input value="{{ $question9->international }}" name="specify_international" type="text"
                            class="form-control" placeholder="">
                    @endif
                </div>
                <div class="col" id="inputContainer7">
                    @if ($question9->institution === 'other')
                        <input value="{{ $question9->other }}" name="specify_other" type="text"
                            class="form-control" placeholder="">
                    @endif
                </div>
            </div>

            <label for="" class="form-label">Will the ethical approval be used for a project submission
                (TUBITAK, EU
                projects etc.)?</label>
            <div class="row">
                <div class="form-check">
                    <input {{ $question9->pr_submission === 'no' ? 'checked' : '' }} class="form-check-input"
                        type="radio" value="no" name="flexRadioDefault4">
                    <label class="form-label-small" for="flexCheckDefault4">No</label>
                </div>
                <div class="form-check">
                    <input {{ $question9->pr_submission !== 'no' ? 'checked' : '' }} class="form-check-input"
                        id="if_used_yes" type="radio" value="yes" name="flexRadioDefault4">
                    <label class="form-label-small" for="flexCheckDefault4">Yes(specify)</label>
                </div>

                <div class="col-6" id="inputContainer8">
                    @if ($question9->pr_submission !== 'no')
                        <input value="{{ $question9->pr_submission }}" name="if_approved_specify" type="text"
                            class="form-control" placeholder="">
                    @endif
                </div>
            </div>
        </div>
        <!-- 10 -->
        <div class="mb-3 row">
            <div class="form-label">10. Status of the application:</div>
            <div class="form-check">
                <input id="new" {{ $form1->status === 'New' ? 'checked' : '' }} class="form-check-input"
                    value="New" type="radio" name="flexRadioDefault5">
                <label class="form-label-small" for="flexCheckDefault6">New</label>
            </div>
            <div class="form-check">
                <input id="revised" {{ $form1->status === 'Revised' ? 'checked' : '' }} class="form-check-input"
                    value="Revised" type="radio" name="flexRadioDefault5">
                <label class="form-label-small" for="flexCheckDefault6">Revised</label>
            </div>


            <div class="form-check">
                <input {{ $form1->status === 'Reporting Changes' ? 'checked' : '' }} id="rpchanges"
                    class="form-check-input" value="Reporting Changes" type="radio" name="flexRadioDefault5">
                <label class="form-label-small" for="flexCheckDefault6">Reporting Changes</label>
            </div>
            <div class="form-check">
                <input {{ $form1->status === 'Extension of a Previous Study' ? 'checked' : '' }}
                    id="extension" class="form-check-input" value="Extension of a Previous Study"
                    type="radio" name="flexRadioDefault5">
                <label class="form-label-small">Extension of a Previous Study</label>
            </div>



            <fieldset class="mt-4" id="extension-of-previous-study-form" style="display: none">
                @php
                    $extension = json_decode($form1->extension_pr_study);
                @endphp

                <div class="mb-3 row">
                    <div class="col-6">
                        <label class="form-label">Protocol No (this is on your approval letter):</label>
                        <input value="{{ $extension->protocol_no }}" name="protocol_no" style="width: 50%"
                            type="text" class="form-control" placeholder="">
                    </div>
                    <div class="col-6">
                        <label class="form-label">The new expected date of completion:</label>
                        <input value="{{ $extension->completion_date }}" name="date_completion" style="width: 50%"
                            type="date" class="form-control" placeholder="">
                    </div>

                    <label class="form-label">If this is an extension of a previous project, does the current study
                        show any differences from
                        the previously
                        approved one?</label>
                    <div class="form-check">
                        <input {{ $extension->any_differences === 'no' ? 'checked' : '' }} class="form-check-input"
                            type="radio" value="no" name="flexRadioDefault7">
                        <label class="form-label-small" for="flexCheckDefault7">No</label>
                    </div>
                    <div class="form-check">
                        <input {{ $extension->any_differences === 'yes' ? 'checked' : '' }} class="form-check-input"
                            id="diff_if_yes" type="radio" value="yes" name="flexRadioDefault7">
                        <label class="form-label-small" for="flexCheckDefault7">Yes</label>
                    </div>
            </fieldset>

            <fieldset class="mb-3" id="reporting-changes-form" style="display: none">
                @php
                    $reporting = json_decode($form1->reporting_changes);
                @endphp
                <div class="mb-3 row">
                    <label class="form-label">Protocol No:</label>
                    <input value="{{ $reporting->protocol_no }}" name="protocol_no1" style="width: 50%"
                        type="text" class="form-control" placeholder="">

                    <label class="form-label">Please explain the changes you want to make (e.g., adding a
                        new researcher to
                        the
                        research team,
                        adding a
                        new measure, adding a new study similar to your approved study) in a simple language so
                        that
                        people
                        with
                        no expertise in the field can understand (two paragraphs maximum). If, your change(s)
                        will be
                        new
                        informed
                        consent form, debriefing form, etc., submit these forms together with the revised
                        application to
                        the
                        Ethics
                        Committee.</label>
                    <textarea name="explanation_of_changes" type="text" class="form-control" placeholder="" rows="3">{{ $reporting->explanation_of_changes }}</textarea>
                    <label class="form-label">Is the reason for the proposed changes an unexpected
                        situation that happens to a
                        participant in the
                        study
                        (e.g., an event that could harm the participant's psychological or physical
                        health)?</label>

                    <div class="form-check">
                        <input {{ $reporting->if_could_harm_participants === 'no' ? 'checked' : '' }}
                            class="form-check-input" type="radio" value="no" name="flexRadioDefault8">
                        <label class="form-label-small" for="flexCheckDefault">No</label>
                    </div>
                    <div class="form-check">
                        <input {{ $reporting->if_could_harm_participants !== 'no' ? 'checked' : '' }}
                            class="form-check-input" type="radio" value="yes" name="flexRadioDefault8">
                        <label class="form-label-small" for="flexCheckDefault">Yes</label>
                    </div>


                    <label class="form-label">If your answer is yes; describe the unexpected situation that
                        requires you to
                        make
                        changes. Please indicate
                        what measures you have taken to prevent similar situations from occurring in the
                        future.</label>

                    <textarea type="text" class="form-control" placeholder="" rows="3">{{ $reporting->if_could_harm_participants }}</textarea>


                </div>
            </fieldset>
        </div>

        {{-- 11 --}}
        <fieldset id="new-or-revised-form" style="display: none">
            <div class="mb-3 row">
                <label class="form-label" for="">11. Please explain the purpose of your study and the
                    research question you
                    are
                    trying to
                    answer with this study.
                    Write it in a simple language so that people without expertise in the field can understand
                    (maximum
                    of two
                    paragraphs).</label>
                <textarea type="text" name="purpose_of_study" class="form-control" placeholder="" rows="3">{{ $form1->question_11 }}</textarea>
            </div>

            {{-- 12 --}}
            <div class="mb-3 row">
                <label class="form-label" for="">12. Write down your data collection process, including
                    the method, scale,
                    tools
                    and
                    techniques to be used.
                    (Submit a copy of any measure or questionnaire used in the research with this
                    document.)</label>
                <textarea type="text" name="data_collection" class="form-control" placeholder="" rows="3">{{ $form1->question_11 }}</textarea>
            </div>
            {{-- 13 --}}
            <div class="mb-3 row">
                <label class="form-label" for="">13. Does the study aim to partially/completely provide
                    the participants
                    with
                    incorrect
                    information in any way. Is
                    there deception? Does the study require secrecy?</label>
                <div class="form-check">
                    <input {{ $form1->question_13 === 'no' ? 'checked' : '' }} class="form-check-input"
                        type="radio" value="no" name="flexRadioDefault9">
                    <label class="form-label-small" for="flexCheckDefault">No</label>
                </div>
                <div class="form-check">
                    <input {{ $form1->question_13 === 'yes' ? 'checked' : '' }} class="form-check-input"
                        type="radio" value="yes" name="flexRadioDefault9">
                    <label class="form-label-small" for="flexCheckDefault">Yes</label>
                </div>
            </div>

            {{-- 14 --}}
            <div class="mb-3 row">
                <label class="form-label" for="" class="mt-2">14. Beyond the minimum stress and
                    discomfort that
                    participants
                    may encounter
                    in their
                    daily lives, does your
                    work contain elements that threaten their physical and/or mental health or that may be a
                    source
                    of
                    stress for
                    them?</label>
                <div class="form-check">
                    <input {{ $form1->question_14 === 'no' ? 'checked' : '' }} class="form-check-input"
                        type="radio" value="no" name="flexRadioDefault10">
                    <label class="form-label-small" for="flexCheckDefault">No</label>
                </div>
                <div class="form-check">
                    <input {{ $form1->question_14 !== 'no' ? 'checked' : '' }} class="form-check-input"
                        type="radio" value="yes" name="flexRadioDefault10">
                    <label class="form-label-small" for="flexCheckDefault">Yes</label>
                </div>

                @if ($form1->question_14 !== 'no')
                    <label class="form-label" for="" class="mt-2">If your answer is yes, what negative
                        effects does your
                        work
                        have
                        on the
                        physical and/or
                        mental health of
                        the participants? Please explain in detail. Please write down the measures taken in order to
                        eliminate or
                        minimize the effects of these elements.
                    </label>
                    <textarea type="text" class="form-control" placeholder="" rows="3">{{ $form1->question_14 }}</textarea>
                @endif

            </div>


            {{-- 15 --}}

            <div class="mb-3 row">
                <div class="col">
                    <label class="form-label">15. The expected number of
                        participants:</label>
                    <input value="{{ $form1->question_15 }}" name="number_of_participants" style="width: 15%"
                        type="number" class="form-control">
                </div>
            </div>

            {{-- 16 --}}
            <div class="mb-3 row">
                <label class="form-label">16. If you are doing an education or intervention study, will a
                    control
                    group
                    be
                    used?</label>
                <div class="form-check">
                    <input {{ $form1->question_16 === 'no' ? 'checked' : '' }} class="form-check-input"
                        type="radio" value="no" name="flexRadioDefault11">
                    <label class="form-label-small" for="flexCheckDefault">No</label>
                </div>
                <div class="form-check">
                    <input {{ $form1->question_16 === 'yes' ? 'checked' : '' }} class="form-check-input"
                        type="radio" value="yes" name="flexRadioDefault11">
                    <label class="form-label-small" for="flexCheckDefault">Yes</label>
                </div>
            </div>
            {{-- 17 --}}
            @php

                $types = json_decode($form1->question_17, true);

                if ($types == null) {
                    $types = [];
                }

            @endphp
            <div class="mb-3 row">
                <label class="form-label">17. From the list presented below, tick the options that best
                    describe
                    the
                    participants:</label>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-check">
                        <input {{ in_array('University students', $types) ? 'checked' : '' }} class="form-check-input"
                            name="type_of_participants[]" type="checkbox" value="University students"
                            id="flexCheckDefault">
                        <label class="form-label-small" for="flexCheckDefault">
                            University students
                        </label>
                    </div>
                    <div class="form-check">
                        <input {{ in_array('Adults in employment', $types) ? 'checked' : '' }}
                            class="form-check-input" name="type_of_participants[]" type="checkbox"
                            value="Adults in employment" id="flexCheckChecked">
                        <label class="form-label-small" for="flexCheckChecked">
                            Adults in
                            employment
                        </label>
                    </div>
                    <div class="form-check">
                        <input {{ in_array('Unemployed adults', $types) ? 'checked' : '' }} class="form-check-input"
                            name="type_of_participants[]" type="checkbox" value="Unemployed adults"
                            id="flexCheckDefault">
                        <label class="form-label-small" for="flexCheckDefault">
                            Unemployed adults
                        </label>
                    </div>
                    <div class="form-check">
                        <input {{ in_array('Preschool children', $types) ? 'checked' : '' }} class="form-check-input"
                            name="type_of_participants[]" type="checkbox" value="Preschool children"
                            id="flexCheckChecked">
                        <label class="form-label-small" for="flexCheckChecked">
                            Preschool children*
                        </label>
                    </div>
                    <br>
                    <label class="form-label-small">Will you obtain verbal consent from the children participating
                        in
                        the
                        study?</label>

                    <div class="form-check">
                        <input {{ $form1->question_17_1 === 'no' ? 'checked' : '' }} class="form-check-input"
                            type="radio" value="no" name="flexRadioDefault12">
                        <label class="form-label-small" for="flexCheckDefault">No</label>
                    </div>
                    <div class="form-check">
                        <input {{ $form1->question_17_1 === 'yes' ? 'checked' : '' }} class="form-check-input"
                            type="radio" value="yes" name="flexRadioDefault12">
                        <label class="form-label-small" for="flexCheckDefault">Yes</label>
                    </div>
                </div>


                <div class="col">
                    <div class="form-check">

                        <input {{ in_array('Highschool students', $types) ? 'checked' : '' }}
                            style="margin-left: 15px" class="form-check-input" name="type_of_participants[]"
                            type="checkbox" value="Highschool students" id="flexCheckDefault">
                        <label class="form-label-small">
                            Highschool
                            students**
                        </label>
                    </div>
                    <div class="form-check">
                        <input {{ in_array('Primary school pupils', $types) ? 'checked' : '' }}
                            style="margin-left: 15px" class="form-check-input" name="type_of_participants[]"
                            type="checkbox" value="Primary school pupils" id="flexCheckDefault">
                        <label class="form-label-small">
                            Primary school
                            pupils*
                        </label>
                    </div>
                    <div class="form-check">

                        <input {{ in_array('Child workers', $types) ? 'checked' : '' }} style="margin-left: 15px"
                            class="form-check-input" name="type_of_participants[]" type="checkbox"
                            value="Child workers" id="flexCheckDefault">
                        <label class="form-label-small">
                            Child workers**
                        </label>
                    </div>
                    <div class="form-check">
                        <input {{ in_array('The elderly', $types) ? 'checked' : '' }} style="margin-left: 15px"
                            class="form-check-input" name="type_of_participants[]" type="checkbox"
                            value="The elderly" id="flexCheckDefault">
                        <label class="form-label-small">
                            The elderly
                        </label>
                    </div>
                    <br>
                    <label class="form-label-small">Will you obtain verbal consent from the pupils participating in
                        the
                        study?</label>

                    <div class="form-check">
                        <input {{ $form1->question_17_2 === 'no' ? 'checked' : '' }} class="form-check-input"
                            type="radio" value="no" name="flexRadioDefault13">
                        <label class="form-label-small" for="flexCheckDefault">No</label>
                    </div>
                    <div class="form-check">
                        <input {{ $form1->question_17_2 === 'yes' ? 'checked' : '' }} class="form-check-input"
                            type="radio" value="yes" name="flexRadioDefault13">
                        <label class="form-label-small" for="flexCheckDefault">Yes</label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <div class="form-check">
                        <label class="form-label-small">
                            Mentally
                            disabled/challenged
                            individuals*
                        </label>
                        <input {{ in_array('Mentally disabled/challenged individuals', $types) ? 'checked' : '' }}
                            class="form-check-input" name="type_of_participants[]" type="checkbox"
                            value="Mentally disabled/challenged individuals" id="flexCheckDefault">
                    </div>
                    <div class="form-check">
                        <label class="form-label-small">
                            Physically
                            disabled/challenged
                            individuals
                        </label>
                        <input {{ in_array('Physically disabled/challenged individuals', $types) ? 'checked' : '' }}
                            class="form-check-input" name="type_of_participants[]" type="checkbox"
                            value="Physically disabled/challenged individuals" id="flexCheckDefault">
                    </div>
                    <div class="form-check">
                        <label class="form-label-small">
                            Prisoners
                        </label>
                        <input {{ in_array('Prisoners', $types) ? 'checked' : '' }} class="form-check-input"
                            name="type_of_participants[]" type="checkbox" value="Prisoners" id="flexCheckDefault">
                    </div>

                    <label class="form-label-small">
                        Other (please specify):
                    </label>

                    @if (array_key_exists('other', $types))
                        <input style="width: 30%; margin-left:10px;" class="form-control" type="text"
                            value="{{ $types['other'] }}" name="other_type">
                    @endif
                </div>
            </div>

            <div class="mb-3 row">
                <label class="form-label-small" style="color: red" for="">Please submit the Parental
                    Approval Form with your
                    application. <br><br>
                    Please submit the Parental Approval Form in addition to the Informed Consent Form that
                    the
                    students are expected to sign, with your application.</label>
            </div>

            {{-- 18 --}}
            <div class="mb-3 row">
                <label class="form-label">18. Briefly describe the sample characteristics, special restrictions
                    and
                    conditions
                    for
                    participation (for example,
                    age group restriction, whether there is a requirement to be a member of a certain social
                    group,
                    etc.) Please
                    explain.</label>
                <textarea name="descr_of_particip" type="text" class="form-control" placeholder="" rows="3">{{ $form1->question_18 }}</textarea>
            </div>

            {{-- 19 --}}
            <div class="mb-3 row">
                <label class="form-label" for="">19. Explain how you will invite participants to the
                    study. If the invitation will be via
                    e-mail,
                    social media,
                    various websites, and similar channels like this, you should insert the text of the
                    announcement
                    into the
                    application false. Please add the text in the textbox below.</label>
                <textarea name="expl_of_invitation" type="text" class="form-control" placeholder="" rows="3">{{ $form1->question_19 }}</textarea>
            </div>

            {{-- 20 --}}

            @php
                $methods = json_decode($form1->question_20, true);
                if ($methods == null) {
                    $methods = [];
                }

            @endphp
            <div class="mb-3 row">
                <label class="form-label">20. Please tick the method(s) to be used:</label>
            </div>

            <div class="mb-3 row">
                <div class="col">
                    <div class="form-check">
                        <label class="form-label-small">
                            Survey
                        </label>
                        <input {{ in_array('Survey', $methods) ? 'checked' : '' }} class="form-check-input"
                            type="checkbox" value="Survey" name="methods[]" id="flexCheckDefault">
                    </div>


                    <div class="form-check">
                        <label class="form-label-small">
                            Interview
                        </label>
                        <input {{ in_array('Interview', $methods) ? 'checked' : '' }} class="form-check-input"
                            type="checkbox" value="Interview" name="methods[]" id="flexCheckDefault">
                    </div>


                    <div class="form-check">
                        <label class="form-label-small">
                            Observation
                        </label>
                        <input {{ in_array('Observation', $methods) ? 'checked' : '' }} class="form-check-input"
                            type="checkbox" value="Observation" name="methods[]" id="flexCheckDefault">
                    </div>


                    <div class="form-check">
                        <label class="form-label-small">
                            Computer test
                        </label>
                        <input {{ in_array('Computer test', $methods) ? 'checked' : '' }} class="form-check-input"
                            type="checkbox" value="Computer test" name="methods[]" id="flexCheckDefault">
                    </div>


                    <div class="form-check">
                        <label class="form-label-small">
                            Video/film
                            recording
                        </label>
                        <input {{ in_array('Video/film recording', $methods) ? 'checked' : '' }}
                            class="form-check-input" type="checkbox" value="Video/film recording" name="methods[]"
                            id="flexCheckDefault">
                    </div>
                </div>


                <div class="col">
                    <div class="form-check">
                        <label class="form-label-small">
                            Voice recording
                        </label>
                        <input {{ in_array('Voice recording', $methods) ? 'checked' : '' }} class="form-check-input"
                            type="checkbox" value="Voice recording" name="methods[]" id="flexCheckDefault">
                    </div>

                    <div class="form-check">
                        <label class="form-label-small">
                            Physiological
                            measurement
                        </label>
                        <input {{ in_array('Physiological measurement', $methods) ? 'checked' : '' }}
                            class="form-check-input" type="checkbox" value="Physiological measurement"
                            name="methods[]" id="flexCheckDefault">
                    </div>

                    <div class="form-check">
                        <label class="form-label-small">
                            Biological sample
                        </label>
                        <input {{ in_array('Biological sample', $methods) ? 'checked' : '' }} class="form-check-input"
                            type="checkbox" value="Biological sample" name="methods[]" id="flexCheckDefault">
                    </div>

                    <div class="form-check">
                        <label class="form-label-small">
                            Making participants use
                            alcohol,
                            drugs or any other
                            chemical substance
                        </label>
                        <input
                            {{ in_array('Making participants use alcohol, drugs or any other chemical substance', $methods) ? 'checked' : '' }}
                            class="form-check-input" type="checkbox"
                            value="Making participants use alcohol, drugs or any other chemical substance"
                            name="methods[]" id="flexCheckDefault">
                    </div>

                    <div class="form-check">
                        <label class="form-label-small">
                            Exposure to high
                            simulation
                            (such
                            as light,
                            sound)
                        </label>
                        <input
                            {{ in_array('Exposure to high simulation (such as light, sound)', $methods) ? 'checked' : '' }}
                            class="form-check-input" type="checkbox"
                            value="Exposure to high simulation (such as light, sound)" name="methods[]"
                            id="flexCheckDefault">
                    </div>
                </div>
            </div>

            <div class="col">

                <label class="form-label-small">
                    Other (Please specify):
                </label>
                @if (array_key_exists('other', $methods))
                    <input style="width: 50%; margin-left:10px;" class="form-control" type="text"
                        value="{{ $methods['other'] }}" name="other_method">
                @endif
            </div>

            {{-- 21 --}}
            <div class="mb-3 row">
                <label class="form-label">21. Write down the possible contribution of this work to your field
                    and/or
                    society(one
                    paragraph at most.)</label>
                <textarea name="possible_contributions" type="text" class="form-control" placeholder="" rows="3">{{ $form1->question_21 }}</textarea>
            </div>

        </fieldset>

        <div class="mb-3 row">
            <label class="form-label" for="">I confirm that the information I have given above is accurate
                to the best of my knowledge</label>
            <div class="col">
                <label class="form-label">Supervisor's (if any) Name and Surname:</label>
                <input value="{{ $form1->sname }}" name="supervisor_name" class="form-control"
                    type="text">
            </div>
            <div class="col">
                <label class="form-label">Date:</label>
                <input value="{{ $form1->sdate }}" name="sdate" class="form-control" type="date">
            </div>

        </div>


        <div class="mb-3 row">
            <div class="col">
                <label class="form-label">Researcher's Name and Surname:</label>
                <input value="{{ $form1->rname }}" name="researcher_name" class="form-control"
                    type="text">
            </div>
            <div class="col">
                <label class="form-label">Date:</label>
                <input value="{{ $form1->rdate }}" name="rdate" class="form-control" type="date">
            </div>

        </div>

        <div class="button d-flex flex-row align-items-center justify-content-end">
            <button id="submit" type="submit" class="btn submit btn-primary">Submit</button>
        </div>
    </form>

</div>



<script>
    $(document).ready(function() {
        /////////////////// section-1 radio-buttons
        const radioButtons = $('input[name="flexRadioDefault"]');
        radioButtons.on("change", function() {
            if (!$("#otherRadio").is(":checked")) {
                $("#inputContainer").empty();
            } else {
                const newInput = $("<input>", {
                    type: "text",
                    name: "otherInput",
                    class: "form-control"
                });
                $("#inputContainer").append(newInput);
            }

            if (!$("#acRadio").is(":checked")) {
                $("#section-5").show();
            } else {
                $("#section-5").hide();
            }
        });
        //////////////////////////////////////////////////



        ///////////////////////////// section-4 add-button
        let res = 0;
        $('#addInput').click(function() {

            $('#inputContainer1').append(
                `<div class="row inputs">
                    <div class="col">
                        <input type="text" class="form-control" name="other_researchers[${res}][name]" placeholder="Name" required>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="other_researchers[${res}][institute]" placeholder="Institute" required>
                    </div>
                    <div class="col">
                        <a class="btn btn-danger removeInput">Remove</a>
                    </div>
                </div>`
            );
            res++;
        });


        $(document).on('click', '.removeInput', function() {
            $(this).parents('.inputs').remove();
            res--;
        });
        ////////////////////////////////////////////////////////////////


        //////////////////////////// section-7 add-button
        $('#addOrgInput').click(function() {
            $('#inputContainer3').append(
                `<div class="row org_inputs">
                    <div class="col">
                        <input type="text" class="form-control" name="org_name[]" placeholder="Name" required>
                    </div>
                    <div class="col">
                        <a class="btn btn-danger removeOrgInput">Remove</a>
    
                    </div>
                </div>`
            );

        });

        $(document).on('click', '.removeOrgInput', function() {
            $(this).parents('.org_inputs').remove();
        });
        //////////////////////////////////////////////////////////////////

    });
</script>




</body>

</html>
