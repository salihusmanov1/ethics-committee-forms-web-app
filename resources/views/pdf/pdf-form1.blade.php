<html>

<body>


    <div class="container">
        <div class="header">
            <h1>FINAL INTERNATIONAL UNIVERSITY</h1>
        </div>




        <form class="main" _lpchecked="1" method="POST" action="{{ route('edit-form1') }}">
            <h3>ETHICS COMMITTEE APPLICATION FORM</h3>
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            @csrf
            <!-- 1 -->
            <div class="mb-3 row">
                <div class="col">
                    <label class="form-label">1. Title Of Study</label>
                    <input value="{{ $study->title }}" name="title_of_study" type="text" class="form-control"
                        placeholder="">
                </div>
            </div>
            <!-- 2 -->
            <div class="mb-3 row">
                <label class="form-label">2. Type Of Study</label>
                <div class="form-check">
                    <input class="form-check-input" id="acRadio" type="radio" value="Academic Staff Study"
                        name="flexRadioDefault" {{ $study->type === 'Academic Staff Study' ? 'checked' : '' }}>
                    <label class="form-label-small" for="flexCheckDefault">
                        Academic Staff Study
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="Doctorate Thesis" name="flexRadioDefault"
                        {{ $study->type === 'Doctorate Thesis' ? 'checked' : '' }}>
                    <label class="form-label-small" for="flexCheckChecked">
                        Doctorate Thesis
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="Master Thesis" name="flexRadioDefault"
                        {{ $study->type === 'Master Thesis' ? 'checked' : '' }}>
                    <label class="form-label-small" for="flexCheckChecked">
                        Master Thesis
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="other" name="flexRadioDefault"
                        id="otherRadio" {{ $study->type === 'other' ? 'checked' : '' }}>
                    <label class="form-label-small" for="flexCheckChecked">
                        Other (Specify):
                    </label>
                </div>
                <div id="inputContainer">

                </div>
            </div>


            <div class="mb-3 row">
                <!-- 3 -->
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
                        $name = json_decode($other_researchers->name);
                        $institute = json_decode($other_researchers->institute);
                    @endphp
                    @if ($name && $institute)
                        @foreach ($name as $key => $res_name)
                            <div class="row inputs">
                                <div class="col">
                                    <input value="{{ $res_name }}" type="text" class="form-control"
                                        name="res_name[]" placeholder="Name">
                                </div>

                                <div class="col">
                                    <input value="{{ $institute[$key] }}" type="text" class="form-control"
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
                    5. Advisor’s/Supervising Faculty Member’s <i>(Undergraduate students conducting research must have
                        an
                        academic advisor/instructor supervising their research):</i>
                </label>

                <div class="col">
                    <label class="form-label-small">Title:</label>
                    <select class="form-control form-select form-select-lg" name="titles_options"
                        aria-label=".form-select-lg">
                        <option value="Prof. Dr." {{ $advisor->title === 'Prof. Dr.' ? 'selected' : '' }}> Prof. Dr.
                        </option>
                        <option value="Assoc. Pro. Dr." {{ $advisor->title === 'Assoc. Pro. Dr.' ? 'selected' : '' }}>
                            Assoc. Pro. Dr.</option>
                        <option value="Asst. Prof. Dr."{{ $advisor->title === 'Asst. Prof. Dr.' ? 'selected' : '' }}>
                            Asst.
                            Prof. Dr.</option>
                        <option value="Dr." {{ $advisor->title === 'Dr.' ? 'selected' : '' }}>Dr.</option>
                        <option value="Sen. Instr." {{ $advisor->title === 'Sen. Instr.' ? 'selected' : '' }}>Sen.
                            Instr.
                        </option>
                        <option value="Instr." {{ $advisor->title === 'Instr.' ? 'selected' : '' }}>Instr.</option>
                    </select>


                    <label class="form-label-small">Name and surname:</label>
                    <input value="{{ $advisor->name }}" name="a_name" type="text" class="form-control">
                    <label class="form-label-small">Department:</label>
                    <input value="{{ $advisor->department }}" name="a_department" type="text"
                        class="form-control">

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

                <div class="form-label">6. Expected time frame of the study:</div>

                <div class="col">
                    <label class="form-label-small">Start:</label>
                    <input value="{{ $study->expected_start }}" class="form-control" type="date"
                        name="Expected_Start" max="2040-12-31" min="1995-01-01">
                </div>
                <div class="col">
                    <label class="form-label-small">End:</label>
                    <input value="{{ $study->expected_end }}" class="form-control" type="date"
                        name="Expected_End" max="2040-12-31" min="1995-01-01">
                </div>

                <p>
                    <span style="color: red">The start date of the study should be at least three weeks from your date
                        of
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
                        $name = json_decode($organization->name);
                    @endphp

                    @if ($name)
                        @foreach ($name as $key => $org_name)
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
                    <input {{ $other->permission === 'no' ? 'checked' : '' }} class="form-check-input" type="radio"
                        value="no" name="flexRadioDefault1">
                    <label class="form-label-small" for="flexCheckDefault1">No</label>
                </div>
                <div class="form-check">
                    <input {{ $other->permission !== 'no' ? 'checked' : '' }} class="form-check-input" id="yesRadio"
                        type="radio" value="yes" name="flexRadioDefault1">
                    <label class="form-label-small" for="flexCheckDefault1">Yes(specify)</label>
                </div>

                <div class="col" id="inputContainer5">
                    @if ($other->permission !== 'no')
                        <input value="{{ $other->permission }}" name="if_required" type="text"
                            class="form-control" placeholder="">
                    @endif
                </div>

            </div>
            <!-- 9 -->
            <div class="mb-3 row">
                <label for="" class="form-label">9. Whether the project is supported/funded or not:</label>
                <div class="form-check">
                    <input {{ $other->is_supported === 'Supported' ? 'checked' : '' }} class="form-check-input"
                        value="Supported" type="radio" name="flexRadioDefault2">
                    <label class="form-label-small" for="flexCheckDefault2">Supported</label>
                </div>
                <div class="form-check">
                    <input {{ $other->is_supported === 'Not Supported' ? 'checked' : '' }} class="form-check-input"
                        value="Not Supported" type="radio" name="flexRadioDefault2">
                    <label class="form-label-small" for="flexCheckDefault2">Not Suported</label>
                </div>

                <label for="" class="form-label">If supported, specify institution:</label>
                <div class="form-check">
                    <input {{ $other->institutions === 'University' ? 'checked' : '' }} class="form-check-input"
                        value="University" type="radio" name="flexRadioDefault3">
                    <label class="form-label-small" for="flexCheckDefault3">University</label>
                </div>
                <div class="form-check">
                    <input {{ $other->institutions === 'TUBITAK' ? 'checked' : '' }} class="form-check-input"
                        value="TUBITAK" type="radio" name="flexRadioDefault3">
                    <label class="form-label-small" for="flexCheckDefault3">TUBITAK</label>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-check">
                            <label class="form-label-small" for="flexCheckDefault3">International (please
                                specify)</label>
                            <input {{ $other->institutions === 'international' ? 'checked' : '' }}
                                class="form-check-input" id="international" value="international" type="radio"
                                name="flexRadioDefault3">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <label class="form-label-small" for="flexCheckDefault3">Other (please specify)</label>
                            <input {{ $other->institutions === 'other' ? 'checked' : '' }} class="form-check-input"
                                id="other" value="other" type="radio" name="flexRadioDefault3">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col" id="inputContainer6">
                        @if ($other->institutions === 'international')
                            <input value="{{ $other->specify }}" name="specify_international" type="text"
                                class="form-control" placeholder="">
                        @endif
                    </div>
                    <div class="col" id="inputContainer7">
                        @if ($other->institutions === 'other')
                            <input value="{{ $other->specify }}" name="specify_other" type="text"
                                class="form-control" placeholder="">
                        @endif
                    </div>
                </div>

                <label for="" class="form-label">Will the ethical approval be used for a project submission
                    (TUBITAK, EU
                    projects etc.)?</label>
                <div class="row">
                    <div class="form-check">
                        <input {{ $other->pr_submission === 'no' ? 'checked' : '' }} class="form-check-input"
                            type="radio" value="no" name="flexRadioDefault4">
                        <label class="form-label-small" for="flexCheckDefault4">No</label>
                    </div>
                    <div class="form-check">
                        <input {{ $other->pr_submission !== 'no' ? 'checked' : '' }} class="form-check-input"
                            id="if_used_yes" type="radio" value="yes" name="flexRadioDefault4">
                        <label class="form-label-small" for="flexCheckDefault4">Yes(specify)</label>
                    </div>

                    <div class="col-6" id="inputContainer8">
                        @if ($other->pr_submission !== 'no')
                            <input value="{{ $other->pr_submission }}" name="if_approved_specify" type="text"
                                class="form-control" placeholder="">
                        @endif
                    </div>
                </div>
            </div>
            <!-- 10 -->
            <div class="mb-3 row">
                <div class="form-label">10. Status of the application:</div>
                <div class="form-check">
                    <input id="new" {{ $other->status_of_app === 'New' ? 'checked' : '' }}
                        class="form-check-input" value="New" type="radio" name="flexRadioDefault5">
                    <label class="form-label-small" for="flexCheckDefault6">New</label>
                </div>
                <div class="form-check">
                    <input id="revised" {{ $other->status_of_app === 'Revised' ? 'checked' : '' }}
                        class="form-check-input" value="Revised" type="radio" name="flexRadioDefault5">
                    <label class="form-label-small" for="flexCheckDefault6">Revised</label>
                </div>


                <div class="form-check">
                    <input {{ $other->status_of_app === 'Reporting Changes' ? 'checked' : '' }} id="rpchanges"
                        class="form-check-input" value="Reporting Changes" type="radio" name="flexRadioDefault5">
                    <label class="form-label-small" for="flexCheckDefault6">Reporting Changes</label>
                </div>
                <div class="form-check">
                    <input {{ $other->status_of_app === 'Extension of a Previous Study Changes' ? 'checked' : '' }}
                        id="extension" class="form-check-input" value="Extension of a Previous Study Changes"
                        type="radio" name="flexRadioDefault5">
                    <label class="form-label-small">Extension of a Previous Study</label>
                </div>



                <fieldset class="mt-4" id="extension-of-previous-study-form" style="display: none">

                    <div class="mb-3 row">
                        <div class="col-6">
                            <label class="form-label">Protocol No (this is on your approval letter):</label>
                            <input value="{{ $extension->protocol_no }}" name="protocol_no" style="width: 50%"
                                type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-6">
                            <label class="form-label">The new expected date of completion:</label>
                            <input value="{{ $extension->completion_date }}" name="date_completion"
                                style="width: 50%" type="date" class="form-control" placeholder="">
                        </div>

                        <label class="form-label">If this is an extension of a previous project, does the current study
                            show any differences from
                            the previously
                            approved one?</label>
                        <div class="form-check">
                            <input {{ $extension->any_differences === 'no' ? 'checked' : '' }}
                                class="form-check-input" type="radio" value="no" name="flexRadioDefault7">
                            <label class="form-label-small" for="flexCheckDefault7">No</label>
                        </div>
                        <div class="form-check">
                            <input {{ $extension->any_differences === 'yes' ? 'checked' : '' }}
                                class="form-check-input" id="diff_if_yes" type="radio" value="yes"
                                name="flexRadioDefault7">
                            <label class="form-label-small" for="flexCheckDefault7">Yes</label>
                        </div>
                </fieldset>

                <fieldset class="mb-3" id="reporting-changes-form" style="display: none">
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


                        <textarea name="if-harm-yes" type="text" class="form-control" placeholder="" rows="3">{{ $reporting->if_could_harm_participants }}</textarea>

                        <div class="inputContainer4"></div>



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
                    <textarea type="text" name="purpose_of_study" class="form-control" placeholder="" rows="3">{{ $new->purpose_of_study }}</textarea>
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
                    <textarea type="text" name="data_collection" class="form-control" placeholder="" rows="3">{{ $new->data_collection }}</textarea>
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
                        <input {{ $new->if_aim_incorrect_info === 'no' ? 'checked' : '' }} class="form-check-input"
                            type="radio" value="no" name="flexRadioDefault9">
                        <label class="form-label-small" for="flexCheckDefault">No</label>
                    </div>
                    <div class="form-check">
                        <input {{ $new->if_aim_incorrect_info === 'yes' ? 'checked' : '' }} class="form-check-input"
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
                        <input {{ $new->if_harmful === 'no' ? 'checked' : '' }} class="form-check-input"
                            type="radio" value="no" name="flexRadioDefault9">
                        <label class="form-label-small" for="flexCheckDefault">No</label>
                    </div>
                    <div class="form-check">
                        <input {{ $new->if_harmful !== 'no' ? 'checked' : '' }} class="form-check-input"
                            type="radio" value="yes" name="flexRadioDefault9">
                        <label class="form-label-small" for="flexCheckDefault">Yes</label>
                    </div>

                    @if ($new->if_harmful !== 'no')
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
                        <textarea type="text" class="form-control" placeholder="" rows="3">{{ $new->if_harmful }}</textarea>
                    @endif

                </div>


                {{-- 15 --}}

                <div class="mb-3 row">
                    <div class="col">
                        <label class="form-label">15. The expected number of
                            participants:</label>
                        <input value="{{ $new->number_of_participants }}" name="number_of_participants"
                            style="width: 15%" type="number" class="form-control">
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
                        <input {{ $new->if_cgroup_used === 'no' ? 'checked' : '' }} class="form-check-input"
                            type="radio" value="no" name="flexRadioDefault10">
                        <label class="form-label-small" for="flexCheckDefault">No</label>
                    </div>
                    <div class="form-check">
                        <input {{ $new->if_cgroup_used === 'yes' ? 'checked' : '' }} class="form-check-input"
                            type="radio" value="yes" name="flexRadioDefault10">
                        <label class="form-label-small" for="flexCheckDefault">Yes</label>
                    </div>
                </div>
                {{-- 17 --}}
                @php
                    $types = json_decode($new->type_of_participants);
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
                            <input {{ in_array('University students', $types) ? 'checked' : '' }}
                                class="form-check-input" name="type_of_participants[]" type="checkbox"
                                value="University students" id="flexCheckDefault">
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
                            <input {{ in_array('Unemployed adults', $types) ? 'checked' : '' }}
                                class="form-check-input" name="type_of_participants[]" type="checkbox"
                                value="Unemployed adults" id="flexCheckDefault">
                            <label class="form-label-small" for="flexCheckDefault">
                                Unemployed adults
                            </label>
                        </div>
                        <div class="form-check">
                            <input {{ in_array('Preschool children', $types) ? 'checked' : '' }}
                                class="form-check-input" name="type_of_participants[]" type="checkbox"
                                value="Preschool children" id="flexCheckChecked">
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
                            <input {{ $new->verbal_consent_children === 'no' ? 'checked' : '' }}
                                class="form-check-input" type="radio" value="no" name="flexRadioDefault11">
                            <label class="form-label-small" for="flexCheckDefault">No</label>
                        </div>
                        <div class="form-check">
                            <input {{ $new->verbal_consent_children === 'yes' ? 'checked' : '' }}
                                class="form-check-input" type="radio" value="yes" name="flexRadioDefault11">
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
                            <input {{ $new->verbal_consent_pupils === 'no' ? 'checked' : '' }}
                                class="form-check-input" type="radio" value="no" name="flexRadioDefault12">
                            <label class="form-label-small" for="flexCheckDefault">No</label>
                        </div>
                        <div class="form-check">
                            <input {{ $new->verbal_consent_pupils === 'yes' ? 'checked' : '' }}
                                class="form-check-input" type="radio" value="yes" name="flexRadioDefault12">
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
                            <input
                                {{ in_array('Physically disabled/challenged individuals', $types) ? 'checked' : '' }}
                                class="form-check-input" name="type_of_participants[]" type="checkbox"
                                value="Physically disabled/challenged individuals" id="flexCheckDefault">
                        </div>
                        <div class="form-check">
                            <label class="form-label-small">
                                Prisoners
                            </label>
                            <input {{ in_array('Prisoners', $types) ? 'checked' : '' }} class="form-check-input"
                                name="type_of_participants[]" type="checkbox" value="Prisoners"
                                id="flexCheckDefault">
                        </div>
                        <div class="form-check">
                            <label class="form-label-small">
                                Other (please specify):
                            </label>
                            <input {{ in_array('Other', $types) ? 'checked' : '' }} name="type_of_participants[]"
                                class="form-check-input" type="checkbox" value="Other" id="flexCheckDefault">
                        </div>

                        <input style="width: 30%; margin-left:10px;" class="form-control" type="text"
                            value="{{ $new->other_type }}" name="other_type">
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
                    <textarea name="descr_of_particip" type="text" class="form-control" placeholder="" rows="3">{{ $new->descr_of_particip }}</textarea>
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
                    <textarea name="expl_of_invitation" type="text" class="form-control" placeholder="" rows="3">{{ $new->expl_of_invitation }}</textarea>
                </div>

                {{-- 20 --}}

                @php
                    $methods = json_decode($new->methods);
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
                                class="form-check-input" type="checkbox" value="Video/film recording"
                                name="methods[]" id="flexCheckDefault">
                        </div>
                    </div>


                    <div class="col">
                        <div class="form-check">
                            <label class="form-label-small">
                                Voice recording
                            </label>
                            <input {{ in_array('Voice recording', $methods) ? 'checked' : '' }}
                                class="form-check-input" type="checkbox" value="Voice recording" name="methods[]"
                                id="flexCheckDefault">
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
                            <input {{ in_array('Biological sample', $methods) ? 'checked' : '' }}
                                class="form-check-input" type="checkbox" value="Biological sample" name="methods[]"
                                id="flexCheckDefault">
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
                <div class="row">
                    <div class="col">
                        <div class="form-check">
                            <label class="form-label-small">
                                Other (Please specify):
                            </label>
                            <input {{ in_array('Other', $methods) ? 'checked' : '' }} class="form-check-input"
                                type="checkbox" value="Other" name="methods[]" id="flexCheckDefault">
                        </div>
                        <input style="width: 30%; margin-left:10px;" class="form-control" type="text"
                            value="{{ $new->other_method }}" name="other_method">
                    </div>
                </div>

                {{-- 21 --}}
                <div class="mb-3 row">
                    <label class="form-label">21. Write down the possible contribution of this work to your field
                        and/or
                        society(one
                        paragraph at most.)</label>
                    <textarea name="possible_contributions" type="text" class="form-control" placeholder="" rows="3">{{ $new->possible_contributions }}</textarea>
                </div>



                <div class="mb-3 row">
                    <label class="form-label" for="">I confirm that the information I have given above is
                        accurate
                        to the best of my knowledge</label>
                    <div class="col">
                        <label class="form-label">Supervisor's (if any) Name and Surname:</label>
                        <input value="" name="supervisor_name" class="form-control" type="text">
                    </div>
                    <div class="col">
                        <label class="form-label">Date:</label>
                        <input name="sdate" class="form-control" type="date">
                    </div>
                    <label class="form-label" for="">Signature:</label>
                </div>


                <div class="mb-3 row">
                    <div class="col">
                        <label class="form-label">Researcher's Name and Surname:</label>
                        <input name="researcher_name" class="form-control" type="text">
                    </div>
                    <div class="col">
                        <label class="form-label">Date:</label>
                        <input name="rdate" class="form-control" type="date">
                    </div>
                    <label class="form-label" for="">Signature:</label>
                </div>


            </fieldset>



            <div class="button d-flex flex-row align-items-center justify-content-end">
                <button id="submit" type="submit" class="btn submit btn-primary">Submit</button>
            </div>
        </form>


    </div>

</body>

</html>
