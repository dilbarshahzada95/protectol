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
            @csrf
            <div class="form_header_content text-center pt-4">
                <h2>Questionnaire</h2>
                <span>Fill out this Questionnaire quiz for fun!</span>
            </div>
            @php
                $i = 1;
            @endphp

            @foreach ($remainingQuestions as $question)
                @php
                    $questionID = $question->id;
                @endphp
                <div class="multisteps_form_panel step" style="{{ $i === 1 ? 'display: block;' : 'display: none;' }}">
                    <span class="question_number text-uppercase mb-3 float-end">QUESTION
                        {{ $i + $completedQuestions }}/{{ $totalQuestions }}</span>
                    <div class="progress rounded-pill">
                        <div class="progress-bar" role="progressbar"
                            style="width: {{ (($i + $completedQuestions) / $totalQuestions) * 100 }}%;" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h1 class="question_title px-5 py-3 animate__animated animate__fadeInRight animate_25ms">
                        {{ $question->question }}</h1>
                    @if ($question->type == 'upload')
                        <div class="form_items ps-5">
                            <ul class="list-unstyled p-0">
                                <div class="form-group">
                                    <li
                                        class="step_1 ps-5 rounded-pill animate__animated animate__fadeInRight animate_100ms active">
                                        <input type="file" id="file_{{ $questionID }}" name="file"
                                            data-question-id="{{ $questionID }}" data-question-type="upload">
                                        <label for="file_{{ $questionID }}">Attach File</label>
                                    </li>
                                    <label for="comments_{{ $questionID }}">Comments</label>
                                    <textarea class="form-control" id="comments_{{ $questionID }}" name="comments[{{ $questionID }}]" cols="130"
                                        rows="5" style="width:90%"></textarea>
                                </div>
                            </ul>
                        </div>
                    @elseif ($question->type == 'radio')
                        <div class="form_items ps-5">
                            <ul class="list-unstyled p-0">
                                @foreach ($question->options as $option)
                                    <li class="step_2 ps-5 rounded-pill animate__animated animate__fadeInRight animate_50ms"
                                        onclick="selectOption({{ $questionID }}, {{ $option->id }})">
                                        <input type="radio" id="opt_{{ $option->id }}"
                                            name="answer[{{ $questionID }}]" value="{{ $option->id }}"
                                            data-question-id="{{ $questionID }}" data-question-type="radio">
                                        <label for="opt_{{ $option->id }}">{{ $option->option }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @elseif ($question->type == 'textarea')
                        <div class="form_items ps-5">
                            <textarea name="comments[{{ $questionID }}]" id="comments_{{ $questionID }}" cols="130" rows="10"
                                data-question-id="{{ $questionID }}" data-question-type="textarea"></textarea>
                        </div>
                    @endif
                </div>
                @php
                    $i++;
                @endphp
            @endforeach
        </form>
    </div>
    <div class="form_btn py-5 text-center">
        <button type="button" class="f_btn active text-uppercase rounded-pill text-white" id="nextBtn"
            onclick="nextPrev(1)">Next & Save Question <i class="fas fa-arrow-right"></i></button>
        <button type="submit" class="f_btn active text-uppercase rounded-pill text-white" id="saveLaterBtn">Save It
            Later</button>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            const uuid = "{{ request()->segment(2) }}";
            let currentStepIndex = 0;
            const steps = $('.multisteps_form_panel.step');

            $('#nextBtn').on('click', function() {
                var currentStep = $(steps[currentStepIndex]);
                if (currentStep.length > 0) {
                    var questionId = currentStep.find('[data-question-id]').data('question-id');
                    var questionType = currentStep.find('[data-question-id]').data('question-type');
                    var formData = new FormData();

                    if (currentStep.find('input[type="file"]').length > 0) {
                        var fileInput = currentStep.find('input[type="file"]')[0];
                        if (fileInput.files.length > 0) {
                            formData.append('file', fileInput.files[0]);
                        }
                    }

                    var commentsTextarea = currentStep.find('textarea');
                    if (commentsTextarea.length > 0) {
                        formData.append('comments[' + questionId + ']', commentsTextarea.val());
                    }

                    var radioInput = currentStep.find('input[type="radio"]:checked');
                    if (radioInput.length > 0) {
                        formData.append('radio[' + questionId + ']', radioInput.val());
                    }

                    formData.append('question_id', questionId);
                    formData.append('type', questionType);

                    formData.append('uuid', uuid);
                    formData.append('_token', '{{ csrf_token() }}');

                    $.ajax({
                        url: '/questionnaire/update',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.status === 'success') {
                                nextPrev(1);
                            } else if (response.status === 'completed') {
                                nextPrev(1);
                                Swal.fire({
                                    icon: "success",
                                    title: "Success!",
                                    text: response.message,
                                }).then(() => {
                                    window.location.href = '/';
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Validation Error",
                                    html: response.message
                                });
                            }
                        },
                        error: function(xhr) {
                            let errorMessage = "Something went wrong!";
                            if (xhr.status === 422) {
                                let errors = xhr.responseJSON.message;
                                errorMessage = Object.values(errors).map(error => error
                                    .join(' ')).join('<br>');
                            }
                            Swal.fire({
                                icon: "error",
                                title: "Validation Error",
                                html: errorMessage,
                            });

                        }
                    });
                }
            });

            function nextPrev(n) {
                var currentStep = $(steps[currentStepIndex]);
                currentStep.hide();
                currentStepIndex += n;
                if (currentStepIndex >= 0 && currentStepIndex < steps.length) {
                    var nextStep = $(steps[currentStepIndex]);
                    nextStep.show();
                }
            }

        });

        function selectOption(questionId, optionId) {
            $('input[type="radio"][data-question-id="' + questionId + '"]').prop('checked', false);
            $('input[type="radio"][data-question-id="' + questionId + '"][value="' + optionId + '"]').prop('checked', true);
        }

        $('#saveLaterBtn').on('click', function() {
            const uuid = "{{ request()->segment(2) }}";
            $.ajax({
                url: '/questionnaire/save-later',
                type: 'POST',
                data: {
                    uuid: uuid,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: response.message,
                        }).then(() => {
                            window.location.href = '/';
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: response.message,
                        });
                    }
                },
                error: function(xhr) {
                    let errorMessage = "Something went wrong!";
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.message;
                        errorMessage = Object.values(errors).map(error => error
                            .join(' ')).join('<br>');
                    }
                    Swal.fire({
                        icon: "error",
                        title: "Validation Error",
                        html: errorMessage,
                    });

                }
            });
        });
    </script>
@endsection
