@extends('layouts.vl_admin')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--end row-->
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h6 class="mb-0 text-uppercase">Registrasi User koko</h6>
                    <hr />
                    <form name="form" id="form" method="post">
                        <div class="card border-top border-0 border-4 border-info">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                                        </div>
                                        <h5 class="mb-0 text-info">User Registration</h5>
                                    </div>
                                    <hr />
                                    <div class="row mb-3">
                                        <label for="name" class="col-sm-3 col-form-label">Enter Your Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter Your Name">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="email" class="col-sm-3 col-form-label">Email Address</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="password" class="col-sm-3 col-form-label">Choose Password</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="password" id="password"
                                                placeholder="Choose Password">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-info px-5" id="submit"
                                                name="submit">Register</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!--end row-->
        </div>
    </div>
    <!--end page wrapper -->
@endsection

<script src="vertical/assets/js/jquery.min.js"></script>
<script>
    if ($("#form").length > 0) {
        $("#form").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 50
                },
                email: {
                    required: true,
                    maxlength: 50,
                    email: true,
                },
                password: {
                    required: true,
                    maxlength: 300
                },
            },
            messages: {
                name: {
                    required: "Please enter name",
                    maxlength: "Your name maxlength should be 50 characters long."
                },
                email: {
                    required: "Please enter valid email",
                    email: "Please enter valid email",
                    maxlength: "The email name should less than or equal to 50 characters",
                },
                password: {
                    required: "Please enter message",
                    maxlength: "Your message name maxlength should be 300 characters long."
                },
            },
            submitHandler: function(form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#submit').html('Please Wait...');
                $("#submit").attr("disabled", true);
                $.ajax({
                    url: "{{ url('user') }}",
                    type: "POST",
                    data: $('#form').serialize(),
                    success: function(response) {
                        $('#submit').html('Submit');
                        $("#submit").attr("disabled", false);
                        alert('Ajax form has been submitted successfully');
                        document.getElementById("contactUsForm").reset();
                    }
                });
            }
        })
    }
</script>
