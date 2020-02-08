
<div class="form-group">

    <label for="phoneNumber">Phone Number</label>
    <input type="text" name="phoneNumber" id="phonenumber" value="{{old('phoneNumber')}}" class="form-control">
</div>

<div class="form-group">

    <label for="email_address">Email Address</label>
    <input type="text" name="emailAddress" id="email_address" value="{{old('emailAddress')}}" class="form-control">
</div>



<div class="form-group">
    <label for="location">Location Description</label>
    <textarea id="location" name="location" class="form-control"  rows="4">{{old('location')}}</textarea>
</div>
