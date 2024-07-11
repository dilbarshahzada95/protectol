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
                        <form id="steps" method="post" enctype="multipart/form-data">
                            <!-- step 1 -->
                            <div id="step1" class="form-inner lightSpeedIn">
                                <div class="input-field">
                                    <label><i class="fa-regular fa-user"></i>Name
                                        <span>*</span></label>
                                    <input required type="text" name="name" id="mail-name" placeholder="Type Name" />
                                    <span></span>
                                </div>
                                <div class="input-field">
                                    <label for="company"><i class="fa-regular fa-paper-plane"></i>Company
                                        <span>*</span></label>
                                    <input required type="text" name="company" id="company"
                                        placeholder="Type company name" />
                                    <span></span>
                                </div>
                                <div class="input-field">
                                    <label for="country">
                                        <i class="fa fa-map-marker"></i>

                                        Country
                                        <span>*</span></label>
                                    <input required type="text" name="country" id="country"
                                        placeholder="Type country name" />
                                    <span></span>
                                </div>
                                <div class="input-field">
                                    <label for="phone"><i class="fa-solid fa-phone"></i>Phone
                                        <span>*</span></label>
                                    <input type="text" name="phone" id="phone" placeholder="Type Phone Number" />
                                    <span></span>
                                </div>
                                <div class="input-field">
                                    <label><i class="fa-regular fa-envelope"></i>Email Address
                                        <span>*</span></label>
                                    <input required type="text" name="mail" id="mail-email"
                                        placeholder="Type email address" />
                                    <span></span>
                                </div>
                                <div class="input-field">
                                    <label for="message"><i class="fa-solid fa-message"></i>How can we help
                                        <span>*</span></label>
                                    <input type="text" name="message" id="message"
                                        placeholder="A brief Description here" />
                                    <span></span>
                                </div>
                            </div>

                            <!-- step Button -->
                            <div class="submit">
                                <button type="button" id="sub">
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
