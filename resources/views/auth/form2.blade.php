@include('auth.header')



<link rel="stylesheet" href="../css/form.css">



@include('auth.navigation')


<div class="container">

    <div class="header">
        <h1>FINAL INTERNATIONAL UNIVERSITY</h1>

    </div>



    <div class="main">
        <div class="d-flex justify-content-center">
            <img style="width: 15%" src="images\logo6.png" alt="">
        </div>
        <h3>ETHICS COMMITTEE PROJECT INFORMATION FORM</h3>
        <form _lpchecked="1" method="POST" action="{{ route('submit-form2') }}">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
            @csrf
            <!-- 1 -->
            <div class="mb-3 row">
                <div class="col">
                    <label class="form-label">1. Briefly describe the study to be conducted, including the sub-research
                        questions, and hypotheses if any.</label>
                    <textarea name="description" type="text" class="form-control" placeholder="" rows="8" required></textarea>

                </div>
            </div>
            <!-- 2 -->
            <div class="mb-3 row">
                <div class="col">
                    <label class="form-label">2. Explain the data collection plan, specifying the methods, scales,
                        tools, and techniques to be used. (Please
                        hand in a copy of all types of instruments such as scales and questionnaires to be used in the
                        study along
                        with this document.</label>
                    <textarea name="data_col_plan" type="text" class="form-control" placeholder="" rows="8" required></textarea>

                </div>
            </div>
            <!-- 3 -->
            <div class="mb-3 row">
                <div class="col">
                    <label class="form-label">3. Write down the expected results of your study.</label>
                    <textarea name="exp_result" type="text" class="form-control" placeholder="" rows="8" required></textarea>

                </div>
            </div>
            <!-- 4 -->
            <div class="mb-3 row">
                <div class="col">
                    <label class="form-label">4. Does your study involve items/procedures that may jeopardize the
                        physical and/or psychological wellbeing
                        of the participants or that may be distressing for them?</label>
                    <div class="form-check">
                        <input id="yesRadio2_0" class="form-check-input" type="radio" value="yes"
                            name="flexRadioDefault2_0" required>
                        <label class="form-label-small" for="flexCheckDefault2_0">Yes</label>
                    </div>
                    <div class="form-check">
                        <input id="noRadio2_0" class="form-check-input" type="radio" value="no"
                            name="flexRadioDefault2_0" required>
                        <label class="form-label-small" for="flexCheckDefault2_0">No</label>
                    </div>

                    <div id="inputContainer2_0">


                    </div>

                </div>
            </div>
            <!-- 5 -->
            <div class="mb-3 row">
                <div class="col">
                    <label class="form-label">5. Will the participants be kept totally/partially uninformed of the aim
                        of the study (i.e. is there deception)? </label>
                    <div class="form-check">
                        <input id="yesRadio2_1" class="form-check-input" type="radio" value="yes"
                            name="flexRadioDefault2_1" required>
                        <label class="form-label-small" for="flexCheckDefault">Yes</label>
                    </div>
                    <div class="form-check">
                        <input id="noRadio2_1" class="form-check-input" type="radio" value="no"
                            name="flexRadioDefault2_1" required>
                        <label class="form-label-small" for="flexCheckDefault">No</label>
                    </div>



                    <div id="inputContainer2_1">
                        <div class="col">
                            <label id="q5_2" for="" class="form-label">If yes, explain why. Indicate how
                                this
                                will
                                be explained to the participants at the end of the data
                                collection in debriefing the participants.</label>

                        </div>
                    </div>


                </div>
            </div>

            <!-- 6 -->
            <div class="mb-3 row">
                <div class="col">
                    <label class="form-label">6. Indicate the potential contributions of the study to your research area
                        and/or the society.</label>
                    <textarea name="poten_contr" type="text" class="form-control" placeholder="" rows="8" required></textarea>
                </div>
            </div>
            <!-- 7 -->
            <div class="mb-3 row">
                <div class="col">
                    <label class="form-label"> 7. Have you completed any previous research project?</label>
                    <div class="form-check">
                        <input id="yesRadio2_2" class="form-check-input" type="radio" value="yes"
                            name="flexRadioDefault2_2" required>
                        <label class="form-label-small" for="flexCheckDefault">Yes</label>
                    </div>
                    <div class="form-check">
                        <input id="noRadio2_2" class="form-check-input" type="radio" value="no"
                            name="flexRadioDefault2_2" required>
                        <label class="form-label-small" for="flexCheckDefault">No</label>
                    </div>


                    <div id="inputContainer2_2">
                        <div class="col">
                            <label id="q6_2" for="" class="form-label">If your answer is yes, write down
                                the
                                titles, and dates of previous research projects you have conducted or
                                that you have taken part in and the names of funding institution(s) if any.</label>


                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label class="form-label">Researcher’s name and surname:</label>
                    <input name="rname" class="form-control" type="text" name="Name" required>

                    <br>
                    <br>
                    <br>
                </div>
                <div class="col">
                    <label class="form-label">Supervisor’s / Advisor’s name and surname:</label>
                    <input name="sname" class="form-control" type="text" name="name" required>

                    <br>
                    <br>
                    <br>
                </div>
            </div>

            <div class="button d-flex flex-row align-items-center justify-content-end">
                <button type="submit" class="btn submit btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>


<script>
    // custom data validation 



    $(document).ready(function() {
        $('input[name="flexRadioDefault2_0"]').change(function() {
            $('#inputContainer2_0').empty();
            if ($(this).val() === "yes") {
                var textarea =
                    `<textarea name="text_1" type="text" class="form-control" placeholder="" rows="8" required></textarea>`;
                $('#inputContainer2_0').append(textarea);
            }
        });
    });

    $(document).ready(function() {
        $('input[name="flexRadioDefault2_1"]').change(function() {
            $('#inputContainer2_1').empty();
            if ($(this).val() === "yes") {
                var textarea =
                    `<textarea name="text_2" type="text" class="form-control" placeholder="" rows="8" required></textarea>`;
                $('#inputContainer2_1').append(textarea);
            }
        });
    });

    $(document).ready(function() {
        $('input[name="flexRadioDefault2_2"]').change(function() {
            $('#inputContainer2_2').empty();
            if ($(this).val() === "yes") {
                var textarea =
                    `<textarea name="text_3" type="text" class="form-control" placeholder="" rows="8" required></textarea>`;
                $('#inputContainer2_2').append(textarea);
            }
        });
    });
</script>
</body>
