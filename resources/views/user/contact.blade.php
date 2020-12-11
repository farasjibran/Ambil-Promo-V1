<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('include.styleuser')

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/contact_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/contact_responsive.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.1/sweetalert2.css">

</head>

<body>

    <div class="super_container">

        <!-- Header -->

        @extends('parcial.navbar')

        <div class="container contact_container">
            <div class="row">
                <div class="col">

                    <!-- Breadcrumbs -->

                    <div class="breadcrumbs d-flex flex-row align-items-center">
                        <ul>
                            <li><a href="{{ url('/')}}">Home</a></li>
                            <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Contact</a></li>
                        </ul>
                    </div>

                </div>
            </div>

            <!-- Map Container -->

            <div class="row">
                <div class="col">
                    <div id="google_map">
                        <div class="map_container">
                            <div id="map"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Us -->

            <div class="row">

                <div class="col-lg-6 contact_col">
                    <div class="contact_contents">
                        <h1>Contact Us</h1>
                        <p>There are many ways to contact us. You may drop us a line, give us a call or send an email, choose what suits you the most.</p>
                        <div>
                            <p>(0812) 1351-7643</p>
                            <p>ambilpromo@gmail.com</p>
                        </div>
                        <div>
                            <p>Open hours: 8.00-18.00 Mon-Fri</p>
                            <p>Sunday: Closed</p>
                        </div>
                    </div>

                    <!-- Follow Us -->

                    <div class="follow_us_contents">
                        <h1>Follow Us</h1>
                        <ul class="social d-flex flex-row">
                            <li><a href="#" style="background-color: #3a61c9"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#" style="background-color: #41a1f6"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#" style="background-color: #fb4343"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="#" style="background-color: #8f6247"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>

                </div>

                <div class="col-lg-6 get_in_touch_col">
                    <div class="get_in_touch_contents">
                        <h1>Get In Touch With Us!</h1>
                        <p>Fill out the form below to recieve a free and confidential.</p>
                        <form id="formkirimpesan" method="post">
                            @csrf
                            <div>
                                <input id="input_name" class="form_input input_name input_ph" type="text" name="name" placeholder="Name" required="required" data-error="Name is required.">
                                <input id="input_email" class="form_input input_email input_ph" type="email" name="email" placeholder="Email" required="required" data-error="Valid email is required.">
                                <input id="input_website" class="form_input input_website input_ph" type="url" name="website" placeholder="Website">
                                <textarea id="input_message" class="input_ph input_message" name="message" placeholder="Message" rows="3" required data-error="Please, write us a message."></textarea>
                            </div>
                            <div>
                                <input type="hidden" name="action" class="btn btn-success" value="Add" />
                                <!-- <input id="review_submit" type="submit" class="red_button message_submit_btn trans_300" name="action" value="Send Message"> -->
                                <input type="submit" value="Add" name="action" class="red_button message_submit_btn trans_300" />
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <!-- Footer -->

        @extends('parcial.footer')

    </div>

    @include('include.jsuser')

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLs8F-N6c-cHjZY5NHslavcXlHDKkz-UI&callback=initMap&libraries=&v=weekly" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.1/sweetalert2.all.min.js"></script>

    <script>
        // Tambah Feedback Ajax

        $(document).on('submit', '#formkirimpesan', function(event) {
            event.preventDefault();
            var name = $('#input_name').val();
            var email = $('#input_email').val();
            var website = $('#input_website').val();
            var message = $('#input_message').val();

            if (name != '' && email != '' && message != '') {
                $.ajax({
                    type: "post",
                    url: "addfeedback",
                    beforeSend: function() {
                        swal({
                            title: 'Menunggu',
                            html: 'Memproses data',
                            onOpen: () => {
                                swal.showLoading();
                            }
                        });
                    },
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function() {
                        swal({
                            type: 'success',
                            title: 'Mengirim Pesan Ke Admin',
                            text: 'Anda Berhasil Mengirimkan Pesan Anda'
                        });
                        $('#formkirimpesan')[0].reset();
                    },
                });
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Bother fields are required!',
                });
            }
        });
    </script>

</body>


</html>