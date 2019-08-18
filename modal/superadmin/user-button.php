<!-- Edit -->
<div class="modal fade" id="edit<?php echo $row['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Update</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<?php
					$edit=mysqli_query($conn,"select * from admin where ID='".$row['ID']."'");
					$erow=mysqli_fetch_array($edit);
				?>
				<div class="container-fluid">
				<form method="POST" action="edit.php?id=<?php echo $erow['ID']; ?>">
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Name:</label>
						</div>
						<div class="col-lg-10">
                            <input type="text" name="firstname" class="form-control" value="<?php echo $erow['first_name'] . " ". $erow['last_name'] ; ?>" readonly>
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Username:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="username" class="form-control" value="<?php echo $erow['username']; ?>" required>
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Email:</label>
						</div>
						<div class="col-lg-10">
							<input type="email" name="email" class="form-control" value="<?php echo $erow['email_address']; ?>" required>
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Brgy:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="brgy" class="form-control" value="<?php echo $erow['brgy']; ?>" required>
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Landline:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" id="land_line" name="land_line" class="form-control" value="<?php echo $erow['land_line']; ?>" maxlength="13">
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Contact Number:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="contact_no" id="contact_no" class="form-control" value="<?php echo $erow['contact_no']; ?>" maxlength="13" required>
							<script>
								$(document).ready(function(){
									$('[id^=contact_no]').keypress(validateNumber);
								});

								function validateNumber(event) {
									var key = window.event ? event.keyCode : event.which;
									if (event.keyCode === 8 || event.keyCode === 46) {
										return true;
									} else if ( key < 48 || key > 57 ) {
										return false;
									} else {
										return true;
									}
								};
							</script>
                        </div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Address:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="address" class="form-control" value="<?php echo $erow['address']; ?>" required>
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Status:</label>
						</div>
						<div class="col-lg-10">
							<label style="position:relative; top:7px;"> 
								<?php if($erow['status'] == 1){ echo "Active"; } 
									  if($erow['status'] == 0){ echo "Inactive"; } ?> 
							</label>
						</div>
					</div>
					
                    <div class="row">
						<div class="col-lg-12">
							<a href="modal/superadmin/status-update.php?id=<?=$erow['ID']?>" style="position:relative; top:7px;color:blue;">Do you want to 
							<?php if($erow['status'] == 0){ echo "activate this account?"; } 
								  if($erow['status'] == 1){ echo "deactivate this account?"; } ?>
							</a>
						</div>
					</div>
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                </div>
				</form>
            </div>
        </div>
    </div>
<!-- /.modal -->