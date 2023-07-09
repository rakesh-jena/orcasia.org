@if ($errors->any())
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

        @error('fname')
            <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="lname">Last Name:</label>
        <input id="lname" type="text" name="lname" required>

        @error('lname')
            <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="email">Email:</label>
        <input id="email" type="email" name="email" required>

        @error('email')
            <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="phonenumber">Phone Number:</label>
        <input id="phonenumber" type="number" name="phonenumber"  required>

        @error('phonenumber')
            <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="occupation">Occupation:</label>
        <input id="occupation" type="text" name="occupation" required>

        @error('occupation')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="organization">Organization:</label>
        <input id="organization" type="text" name="organization" required>

        @error('organization')
            <span>{{ $message }}</span>
        @enderror
    </div>
    <?php $scheduleData = App\Models\Event\Schedule::orderBy('id', 'asc')->get(); 
    $counter = 0;?>
        @foreach($scheduleData as $schedule)
            <input type="radio" name="schedule" value="{{$schedule->id}}" {{ $counter == '0' ? 'checked' : '' }} > {{$schedule->title}}
            <?php $counter++ ;?>
        @endforeach
    <button type="submit">Register</button>
</form>
