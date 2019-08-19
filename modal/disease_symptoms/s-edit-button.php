
<!-- Edit -->
<div class="modal fade" id="edit_symptoms<?php echo $row['symptoms_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Update Symptoms</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<?php
					$edit=mysqli_query($conn,"select * from symptoms where symptoms_id='".$row['symptoms_id']."'");
					$erow=mysqli_fetch_array($edit);
				?>
				<div class="container-fluid">
				<form method="POST" action="edit-disease-symptoms.php" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-3">
							<label style="position:relative; top:7px;">Name:</label>
						</div>
						<div class="col-lg-9">
                            <input type="hidden" name="id" class="form-control" value="<?=$erow['symptoms_id']?>" required>
                            <input type="text" name="symptoms_name" class="form-control" value="<?=$erow['symptoms_name']?>" required>
						</div>
					</div>
				</div> 
			
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" name="btnSubmitSymptoms" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                </div>
				</form>
            </div>
        </div>
    </div>
<!-- /.modal -->
