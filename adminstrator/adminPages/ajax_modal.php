<?php 
require '../action.php';
$id = $_GET['id'];
$cname = $_GET['cname'];
$category = $_GET['category'];
?>

<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
  <div class="panel panel-info" style="text-align:center;">
    <div class="panel-heading">
      <h4>Send Email</h4>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <p>
            <?php
            $results = mysqli_query($con, "SELECT * From categories WHERE id = $category");
            while($data = mysqli_fetch_array($results)){
              $category = $data['name'];
            }
            echo "<form action='../../app/action.php?company=$cname&id=$id&category=$category' method='POST'>"?>
                <input type='email' name='email' placeholder='Email Address' required/>
                <input type='submit' name='mail' value='Send' />
            </form>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>