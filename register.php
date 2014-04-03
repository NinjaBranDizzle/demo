<h1>Register</h1>
<div class="form-group clearfix">
	<label for="Health" class="col-sm-4 control-label">Username</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
    </div>
</div>
<div class="form-group clearfix">
	<label for="Health" class="col-sm-4 control-label">Password</label>
    <div class="col-sm-4">
        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
    </div>
</div>
<div class="form-group clearfix">
	<label for="Health" class="col-sm-4 control-label">Repeat Password</label>
    <div class="col-sm-4">
        <input type="password" class="form-control" id="repeatpassword" placeholder="Repeat Password" name="repeatpassword">
    </div>
</div>
<input type="submit" id="registerSubmit" name="submit" class="btn btn-primary btn-small" style="margin-left:0;" value="Register">
<?php if(isset($response)) echo "<h4 class='alert'>". $response  ."</h4>"; ?>
