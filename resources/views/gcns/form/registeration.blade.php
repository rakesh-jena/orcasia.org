<!-- @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST" action="{{ route('scheduleRegistration') }}">
    @csrf
    <div>
        <label for="fname">First Name:</label>
        <input id="fname" type="text" name="fname" required>
    </div>
    <div>
        <label for="lname">Last Name:</label>
        <input id="lname" type="text" name="lname" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input id="email" type="email" name="email" required>
    </div>
    <div>
        <label for="phonenumber">Phone Number:</label>
        <input id="phonenumber" type="number" name="phonenumber"  required>
    </div>
    <div>
        <label for="occupation">Occupation:</label>
        <input id="occupation" type="text" name="occupation" required>
    </div>
    <div>
        <label for="organization">Organization:</label>
        <input id="organization" type="text" name="organization" required>
    </div>
    <?php $scheduleData = App\Models\Event\Schedule::orderBy('id', 'asc')->get(); 
    $counter = 0;?>
        @foreach($scheduleData as $schedule)
            <input type="radio" name="schedule" value="{{$schedule->id}}" {{ $counter == '0' ? 'checked' : '' }} > {{$schedule->title}}
            <?php $counter++ ;?>
        @endforeach
    <button type="submit">Register</button>
</form> -->

 <!-- Modal-->
 <div id="lgx-modal-map" class="modal fade lgx-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                   
                    <div class="lgx-registration-form-box">
                    <div id="loader" class="spinner-border text-primary" role="status" style="display: none;">
                        <span class="sr-only">Loading...</span>
                    </div>
                       <h3 class="title">Registration Form</h3> 
                      <form method="POST" action="{{ route('scheduleRegistration') }}" id="myRegisterForm">
                            @csrf
                            <div class="lgx-registration-form">
                            <div class="form-group">
                                <input type="text" class="wpcf7-form-control form-control" id="fname" name="fname" placeholder="First Name" required>
                                <span class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="wpcf7-form-control form-control" id="lname" name="lname" placeholder="Last Name" required>
                                <span class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <input type="email" class="wpcf7-form-control form-control" id="email" name="email" placeholder="Your E-mail ..." required>
                                <span class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="wpcf7-form-control form-control" id="phonenumber" name="phonenumber" placeholder="Mobile Number ..." max="10" required>
                                <span class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="wpcf7-form-control form-control" id="occupation" name="occupation" placeholder="Occupation" required>
                                <span class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="wpcf7-form-control form-control" id="organization" name="organization" placeholder="Current Organisation" required>
                                <span class="text-danger"></span>
                            </div>
                                <br>
                                <p style="color: white;">Registering for which days</p>
                                <br>
                                <div class="form-group dspflex">
                                    <div class="form-check radiobtn mr">
                                        <input class="form-check-input" type="radio" name="schedule" id="day1" value="day1" checked>
                                        <label for="day1">Day One</label>
                                    </div>
                                    <div class="form-check radiobtn mr">
                                        <input class="form-check-input" type="radio" name="schedule" id="day2" value="day2">
                                        <label for="day2">Day Two</label>
                                    </div>
                                    <div class="form-check radiobtn mr">
                                        <input class="form-check-input" type="radio" name="schedule" id="both" value="both">
                                        <label for="both">Both</label>
                                    </div>
                                    <span class="text-danger"></span>
                                </div>
                               
                                <button type="button" class="btn btn-primarywpcf7-form-control wpcf7-submit lgx-submit" onclick="submitRegisterForm()">Register Now</button>
                               
                                    
                            </div>
                        </form> 
                    </div>
                
            </div>
        </div>
    </div>
</div> <!-- //.Modal-->

<script>
    function submitRegisterForm() {
        var form = document.getElementById('myRegisterForm');
        var formData = new FormData(form);
        var loader = document.getElementById('loader');
        loader.style.display = 'block';

        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            loader.style.display = 'none';
            if (data.data.length == 0) {
                // Handle success, e.g., close the modal, show success message, etc.
                $('#lgx-modal-map').modal('hide');
                $('#successModal').modal('show');
                form.reset();
            } else {
                // Handle validation errors
                var errors = data.data;
                console.log("errors",errors)
                Object.keys(errors).forEach(function (key) {
                    var errorField = document.getElementById(key);
                    var errorMessage = errors[key];
                    console.log("errorField",errorField,"errorMessage",errorMessage)
                    errorField.classList.add('is-invalid');
                    errorField.nextElementSibling.innerText = errorMessage;
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>
