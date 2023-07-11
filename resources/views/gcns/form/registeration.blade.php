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
                        <h3 class="title">Registration</h3>
                        <div class="lgx-registration-form">
                            <input name="text" value="" class="wpcf7-form-control form-control" placeholder="First Name" type="text">
                            <input name="text" value="" class="wpcf7-form-control form-control" placeholder="Last Name" type="text">
                            <input name="email" value="" class="wpcf7-form-control form-control" placeholder="Your E-mail ..." type="email">
                            <input name="text" value="" class="wpcf7-form-control form-control" placeholder="Mobile Number ..." type="text">
                            <input name="text" value="" class="wpcf7-form-control form-control" placeholder="Occupation" type="text">
                            <input name="text" value="" class="wpcf7-form-control form-control" placeholder="Current Organisation" type="text">
                            
                            <br>
                            <p style="color: white;">Registering for which days</p>
                            <br>
                            <div class="dspflex">
                            
                                <div class="radiobtn mr">
                                    <input type="radio" id="day1"
                                                name="drone" value="day1" checked />
                                    <label for="day1">Day One</label>
                                </div>
                            
                                <div class="radiobtn mr">
                                    <input type="radio" id="day2"
                                                name="drone" value="day2" />
                                    <label for="day2">Day Two</label>
                                </div>
                            
                                <div class="radiobtn">
                                    <input type="radio" id="both"
                                                name="drone" value="both" />
                                    <label for="both">Both</label>
                                </div>
                            </div>
                            <!--
                            <div class="g-recaptcha dspflex" data-sitekey="6LcaDOEcAAAAAMMMjj-8-BQorfN6X5DJIScfRuFz"></div>
                            -->
                            <input value="Register Now" class="wpcf7-form-control wpcf7-submit lgx-submit" type="submit">
                                
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</div> <!-- //.Modal-->