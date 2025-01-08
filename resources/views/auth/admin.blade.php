<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customized Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .card {
            border-radius: 10px;
            overflow: hidden;
        }

        .card-header {
            font-weight: bold;
            font-size: 1.5rem;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white text-center">
                        <h3><i class="fas fa-user-plus me-2"></i>Register Here</h3>
                    </div>
                    <div class="card-body">
                        <form id="form1" action="{{Route('admin.submit')}}" method="post" class="needs-validation"
                            novalidate>
                            @csrf
                            <div class="mb-4">
                                <label for="fname" class="form-label"><i class="fas fa-user me-2"></i>First Name</label>
                                <input type="text" class="form-control" name="fname" id="fname"
                                    placeholder="Enter your first name" required>
                                <div class="invalid-feedback">First name is required.</div>
                            </div>
                            <div class="mb-4">
                                <label for="lname" class="form-label"><i class="fas fa-user-tag me-2"></i>Last
                                    Name</label>
                                <input type="text" class="form-control" name="lname" id="lname"
                                    placeholder="Enter your last name" required>
                                <div class="invalid-feedback">Last name is required.</div>
                            </div>
                            <div class="mb-4">
                                <label for="number" class="form-label"><i
                                        class="fas fa-phone-alt me-2"></i>Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                    placeholder="Enter your phone number" required>
                                <div class="invalid-feedback">Phone number is required and must be valid.</div>
                            </div>
                            <div class="mb-4">
                                <label for="address" class="form-label"><i
                                        class="fas fa-map-marker-alt me-2"></i>Address</label>
                                <textarea class="form-control" name="address" id="address" rows="3"
                                    placeholder="Enter your address" required></textarea>
                                <div class="invalid-feedback">Address is required.</div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-100 py-2">
                                    <i class="fas fa-paper-plane me-2"></i>Submit
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted text-center">
                        Already registered? <a href="#" class="text-primary">Log in here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Bootstrap form validation
        (function () {
            'use strict';
            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();

        // AJAX submission with error handling
        $("#form1").on('submit', function (e) {
            e.preventDefault();
            if (!this.checkValidity()) return;

            var formData = new FormData(this);

            $.ajax({
                url: "{{Route('admin.submit')}}",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                success: function (data) {
                    alert('Form submitted successfully!');
                    $("#form1")[0].reset();

                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        for (let field in errors) {
                            $(`#${field}`).addClass('is-invalid')
                                .next('.invalid-feedback').text(errors[field].join(', '));
                        }
                    } else {
                        alert('An unexpected error occurred.');
                    }
                }
            });
        });
    </script>
</body>

</html>