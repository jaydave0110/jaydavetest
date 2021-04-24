  <div class="col-md-12">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Company Name:</label>
    <div class="col-sm-10">
      <input type="text" name="name" class="form-control" id="name" placeholder="Enter Company Name"  value="{{isset($data['companies']['name']) ? $data['companies']['name'] : ''}}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Email ID:</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control" id="pwd" placeholder="Enter Email ID" value="{{isset($data['companies']['email']) ? $data['companies']['email'] : ''}}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="website">Website:</label>
    <div class="col-sm-10">
      <input type="text"  name="website" class="form-control" id="website" placeholder="Enter website" value="{{isset($data['companies']['website']) ? $data['companies']['website'] : ''}}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="Logo">Logo:</label>
    <div class="col-sm-10">
      <input type="file" name="logo" class="form-control" id="Logo"  >
    </div>
    @if(isset($data['companies']['logo']))
      
    <img src="{{ url($data['companies']['logo']) }}" height="100" width="100">
    @endif
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="Logo"> </label>
    <div class="col-sm-10">
      <button class="btn btn-sm btn-primary ">Submit</button>
    </div>
  </div>
  </div>
 