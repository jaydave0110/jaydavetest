  <div class="col-md-12">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">First Name:</label>
    <div class="col-sm-10">
      <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter First Name"  value="{{isset($data['employees']['first_name']) ? $data['employees']['first_name'] : ''}}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Last Name:</label>
    <div class="col-sm-10">
      <input type="text" name="last_name" class="form-control" id="pwd" placeholder="Enter Last Name" value="{{isset($data['employees']['last_name']) ? $data['employees']['last_name'] : ''}}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="website">Company:</label>
    <div class="col-sm-10">
         {!! Form::select('company_id', $data['companylist'], isset($data['companylist']) ? $data['selectedCompany'] : '', ['class' => 'form-control brandselect2','id'=>'company_id','placeholder'=>'Select Company',]) !!}
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email"  name="email" class="form-control" id="email" placeholder="Enter email" value="{{isset($data['employees']['email']) ? $data['employees']['email'] : ''}}">
    </div>
  </div>
 <div class="form-group">
    <label class="control-label col-sm-2" for="phone">Phone:</label>
    <div class="col-sm-10">
      <input type="text"  name="phone" class="form-control" id="phone" placeholder="Enter phone" value="{{isset($data['employees']['phone']) ? $data['employees']['phone'] : ''}}" maxlength="10">
    </div>
  </div>
  
    <div class="form-group">
    <label class="control-label col-sm-2" for="Logo"> </label>
    <div class="col-sm-10">
      <button class="btn btn-sm btn-primary ">Submit</button>
    </div>
  </div>
  </div>
 