<div class="form-group">

    <label for="event_name">Event Name</label>
    <div> {{$errors->first('eventName')}}</div>
    <input type="text" name="eventName" id="event_name" value="{{old('eventName')}}"
           class="form-control">
</div>


<div class="form-group">
    <label for="event_date">Event Date and Time</label>

    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-clock"></i></span>
        </div>
        <input type="text" id="event_date" class="form-control float-right" name="eventDate">
    </div>

</div>


<div class="form-group">
    <label for="venue">Venue</label>
    <div> {{$errors->first('venue')}}</div>
    <input type="text" name="venue" id="venue" value="{{old('venue')}}"
           class="form-control">
</div>


