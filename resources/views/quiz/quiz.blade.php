@extends('layouts.master-quiz')
@section('content')
    <div class="top_content_area pt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="logo_area ms-5">
                        <a href="index.html">
                            <img src="{{ asset('quiz/assets/images/logo/logo.png') }}" style="width: 30%;"
                                alt="image_not_found">
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <form class="multisteps_form position-relative overflow-hidden mt-5" id="wizard" method="POST" action="">
            <!-- Form-header-content -->
            <div class="form_header_content text-center pt-4">
                <h2>Questionnaire</h2>
                <span>Fill out this Questionnaire quiz for fun!</span>
            </div>
            <!------------------------- Step-1 ----------------------------->
            <div class="multisteps_form_panel step">
                <!-- Form-content -->
                <span class="question_number text-uppercase mb-3 float-end">QUESTION 1/4</span>
                <div class="progress rounded-pill">
                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
                <h1 class="question_title px-5 py-3 animate__animated animate__fadeInRight animate_25ms">Does your
                    company have a drafted safety manual (CSM)? If so,
                    please attach a copy of the document?</h1>
                <!-- Form-items -->
                <div class="form_items ps-5">
                    <ul class="list-unstyled p-0">

                        <li class="step_1 ps-5 rounded-pill animate__animated animate__fadeInRight animate_100ms active">
                            <input type="file" id="opt_2" name="stp_1_select_option">
                            <label for="opt_2">Attach File</label>
                        </li>

                    </ul>
                </div>
            </div>
            <!------------------------- Step-2 ----------------------------->
            <div class="multisteps_form_panel step">
                <!-- Form-content -->
                <span class="question_number text-uppercase mb-3 float-end">QUESTION 2/4</span>
                <div class="progress rounded-pill">
                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
                <h1 class="question_title px-5 py-3 animate__animated animate__fadeInRight animate_25ms">Does your
                    company safety manual specify the preventative measures
                    for specific work practices to be implemented at the site to avoid
                    heat-related illness during periods of high heat stress potential?</h1>
                <!-- Form-items -->
                <div class="form_items ps-5">
                    <ul class="list-unstyled p-0">
                        <li class="step_2 ps-5 rounded-pill animate__animated animate__fadeInRight animate_50ms">
                            <input type="radio" id="opt_5" name="stp_2_select_option" value="Option 1" />
                            <label for="opt_5">Option 1</label>
                        </li>
                        <li class="step_2 ps-5 rounded-pill animate__animated animate__fadeInRight animate_100ms">
                            <input type="radio" id="opt_6" name="stp_2_select_option" value="Option 2" />
                            <label for="opt_6">Option 2</label>
                        </li>
                        <li class="step_2 ps-5 rounded-pill animate__animated animate__fadeInRight animate_150ms">
                            <input type="radio" id="opt_7" name="stp_2_select_option" value="Option 3" />
                            <label for="opt_7">Option 3</label>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="multisteps_form_panel step">
                <!-- Form-content -->
                <span class="question_number text-uppercase mb-3 float-end">QUESTION 3/4</span>
                <div class="progress rounded-pill">
                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
                <h1 class="question_title px-5 py-3 animate__animated animate__fadeInRight animate_25ms">Does the
                    Safety Officer conducts checks on the Program using this checklist?</h1>
                <!-- Form-items -->
                <div class="form_items ps-5">

                    <textarea name="stp_3_select_option" id="opt_8" cols="130" rows="10"></textarea>

                </div>
            </div>




    </div>
    </form>
    <!---------- Form Button ---------->
    <div class="form_btn py-5 text-center">
        <button type="button" class="f_btn disable text-uppercase rounded-pill text-white" id="prevBtn"
            onclick="nextPrev(-1)"><span><i class="fas fa-arrow-left"></i></span> Last Question</button>
        <button type="button" class="f_btn active text-uppercase rounded-pill text-white" id="nextBtn"
            onclick="nextPrev(1)"> Next Question <i class="fas fa-arrow-right"></i></button>
        <button type="submit" class="f_btn active text-uppercase rounded-pill text-white" id="submitBtn">Save It
            Later</button>
    </div>
@endsection
