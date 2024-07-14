@extends('layouts.master-registration')
@section('content')
    <div class="logo">
        <div class="logo-icon">
            <img src="{{ asset('registration/assets/images/logo.png') }}" style="width: 170px" alt="logo" />
        </div>
    </div>
    <div class="container">
        <div class="wrapper">
            <div class="row">
                <div class="c-order tab-sm-100 col-md-6">
                    <!-- side -->
                    <div class="left">
                        <article class="side-text">
                            <h2>Let's register and quiz together!</h2>
                            <p>For support <span>dilbar@fms.com</span></p>
                        </article>
                        <div class="left-img">
                            <img src="{{ asset('registration/assets/images/left-bg.gif') }}" alt="gif" />
                        </div>
                    </div>
                </div>
                <div class="tab-sm-100 offset-md-1 col-md-5">
                    <div class="right">
                        <!-- form -->
                        <form id="regForms" method="post" enctype="multipart/form-data">
                            <!-- step 1 -->
                            <div id="step1" class="form-inner lightSpeedIn">
                                <div class="input-field">
                                    <label><i class="fa-regular fa-user"></i>Name
                                        <span>*</span></label>
                                    <input required type="text" name="name" id="name" placeholder="Type Name" />
                                    <span class="error-message"></span>
                                </div>
                                <div class="input-field">
                                    <label for="company"><i class="fa-regular fa-paper-plane"></i>Company
                                        <span>*</span></label>
                                    <input required type="text" name="company_name" id="company_name"
                                        placeholder="Type company name" />
                                    <span class="error-message"></span>
                                </div>
                                <div class="input-field">
                                    <label for="country">
                                        <i class="fa fa-map-marker"></i>
                                        Country
                                        <span>*</span></label>
                                    <input required type="text" name="country" id="country"
                                        placeholder="Type country name" />
                                    <span class="error-message"></span>
                                </div>
                                <div class="input-field">
                                    <label for="phone"><i class="fa-solid fa-phone"></i>Phone
                                        <span>*</span></label>
                                    <input type="text" name="phone" id="phone" placeholder="Type Phone Number" />
                                    <span class="error-message"></span>
                                </div>
                                <div class="input-field">
                                    <label><i class="fa-regular fa-envelope"></i>Email Address
                                        <span>*</span></label>
                                    <input required type="email" name="email" id="email"
                                        placeholder="Type email address" />
                                    <span class="error-message"></span>
                                </div>
                                <div class="input-field">
                                    <label for="message"><i class="fa-solid fa-message"></i>How can we help
                                        <span>*</span></label>
                                    <input type="text" name="comments" id="comments"
                                        placeholder="A brief Description here" />
                                    <span class="error-message"></span>
                                </div>
                            </div>

                            <!-- step Button -->
                            <div class="submit">
                                <button type="button" id="regData">
                                    Register<span><i class="fa-solid fa-thumbs-up"></i></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#regData').click(function() {
                let valid = true;
                $('.error-message').text('');
                var name = $('#name').val();
                var company_name = $('#company_name').val();
                var country = $('#country').val();
                var phone = $('#phone').val();
                var email = $('#email').val();
                var comments = $('#comments').val();

                if (name === "") {
                    $('#name').next('.error-message').text('Name is required.');
                    valid = false;
                }
                if (company_name === "") {
                    $('#company_name').next('.error-message').text('Company name is required.');
                    valid = false;
                }
                if (country === "") {
                    $('#country').next('.error-message').text('Country is required.');
                    valid = false;
                }
                if (phone === "") {
                    $('#phone').next('.error-message').text('Phone number is required.');
                    valid = false;
                }
                if (email === "") {
                    $('#email').next('.error-message').text('Email is required.');
                    valid = false;
                } else if (!validateEmail(email)) {
                    $('#email').next('.error-message').text('Invalid email format.');
                    valid = false;
                }
                if (comments === "") {
                    $('#comments').next('.error-message').text('Comments are required.');
                    valid = false;
                }

                if (!valid) {
                    return; // Stop form submission if validation fails
                }

                let timerInterval;
                Swal.fire({
                    title: "Registering...",
                    html: "Please wait.",
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                        const timer = Swal.getHtmlContainer().querySelector("b");
                        timerInterval = setInterval(() => {
                            timer.textContent = Swal.getTimerLeft();
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    }
                }).then((result) => {
                    $.ajax({
                        url: "/quiz/registration",
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            name: name,
                            company_name: company_name,
                            country: country,
                            phone: phone,
                            email: email,
                            comments: comments
                        },
                        success: function(response) {
                            if (response.status === true) {
                                Swal.fire({
                                    icon: "success",
                                    title: "Success!",
                                    text: response.message,
                                }).then(() => {
                                    window.open(response.url, '_blank');
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: response.message,
                                });
                            }

                            $('#regForms').trigger("reset");

                        },
                        error: function(xhr, status, error) {
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
            });

            function validateEmail(email) {
                const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
                return re.test(String(email).toLowerCase());
            }
        });
    </script>
@endsection
