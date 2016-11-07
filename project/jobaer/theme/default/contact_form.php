<?php

if (isset($_POST['submit'])) {
// echo "<pre/>";
// print_r($_POST);

  $to = "mohiuddintarek@gmail.com";
$subject = $_POST['InputName'];
$txt = $_POST['InputMessage'];
$headers = 'From:'.' '. $_POST['InputEmail'];


$mail=mail($to,$subject,$txt,$headers);
if ($mail) {
               echo "Success! Message sent. (If form ok!)";
               
    }else{
      echo "Error! Please check the inputs. (If form error!)";
              
    }
}


?> 


<div class="row">
  <div class="col-md-12">

    
  <form role="form" action="" method="post" >
    <div class="col-lg-6">
      <div class="well well-sm"><strong><i class="glyphicon glyphicon-ok form-control-feedback"></i> Required Field</strong></div>
      <div class="form-group">
        <label for="InputName">Your Name</label>
        <div class="input-group">
          <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Name" required>
          <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
      </div>
      <div class="form-group">
        <label for="InputEmail">Your Email</label>
        <div class="input-group">
          <input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Enter Email" required  >
          <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
      </div>
      <div class="form-group">
        <label for="InputMessage">Message</label>
        <div class="input-group">
          <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" required></textarea>
          <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
      </div>
      <div class="form-group">
        <label for="InputReal">What is 4+3? (Simple Spam Checker)</label>
        <div class="input-group">
          <input type="text" class="form-control" name="InputReal" id="InputReal" required>
          <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
      </div>
      <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
    </div>
  </form>
  <hr class="featurette-divider hidden-lg">
  <div class="col-lg-5 col-md-push-1">

  </div>
</div>
</div>
