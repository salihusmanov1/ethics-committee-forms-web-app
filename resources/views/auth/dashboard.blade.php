@include('auth.header')

<link rel="stylesheet" href="css/dashboard.css">


</head>

@include('auth.navigation')

<div class="container">
    @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
    <div class="larg">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h1> APPLICATION FORMS</h1>
                <div class="accordion-header" id="flush-headingOne">

                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">

                        <h3> ETHICS COMMITTEE APPLICATION FORM</h3>

                    </button>
                </div>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Studies conducted in Final International University (FIU) and/or studies
                        conducted by FIU
                        personnel/students, which involve collecting data from human participants, are subject to review
                        by the
                        FIU Ethics Committee (EC). Applicants should submit this application form to the FIU EC along
                        with
                        the other required documents (see the Application Check List). Approval of the EC is required
                        before the
                        start of data collection from human participants.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <div class="accordion-header" id="flush-headingTwo">

                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        <h3>ETHICS COMMITTEE PROJECT INFORMATION FORM</h3>
                    </button>
                </div>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body"> A standardized document used in research and academic institutions,
                        healthcare organizations, and other settings where research or projects involving human
                        participants are conducted. This form serves as a structured template for collecting essential
                        information about a proposed research study or project that requires ethical review and approval
                        from an ethics committee or review board.</div>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-header" id="flush-headingTwo">

                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        <h3>ETHICS COMMITTEE APPLICATION CHECKLIST</h3>
                    </button>
                </div>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body"> Researchers applying to the Final International University (FIU) Ethics
                        Committee to conduct a research
                        that requires data collection from people must have completed all the documents listed in the
                        Application
                        Checklist. </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>

</html>
