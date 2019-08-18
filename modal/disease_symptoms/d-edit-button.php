
<!-- Edit -->
<div class="modal fade" id="edit_disease<?php echo $row['disease_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Update</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<?php
					$edit=mysqli_query($conn,"select * from disease where disease_id='".$row['disease_id']."'");
					$erow=mysqli_fetch_array($edit);
				?>
				<div class="container-fluid">
				<form method="POST" action="edit-disease.php" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-3">
							<label style="position:relative; top:7px;">Name:</label>
						</div>
						<div class="col-lg-9">
                            <input type="text" name="name" class="form-control" value="<?=$erow['disease_name']?>" required>
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-3">
							<label style="position:relative; top:7px;">Symptoms:</label>
						</div>

						<div class="col-lg-9">
                            <?php
                            //select distinct disease and its count
                            $sql = "SELECT * FROM symptoms";
                            $result = $con->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $symptoms = $row["symptoms_name"];
                            ?>
                            <input type="checkbox" <?php echo 'checked="checked"';?> name="symptoms[]" value="<?=  $row["symptoms_id"];?>"> <?= $symptoms?> &nbsp;
                        <?php }} 
                        ?>
						</div>
					</div>
				</div> 
			
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" name="btnSubmitDisease" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                </div>
				</form>
            </div>
        </div>
    </div>
<!-- /.modal -->


<!-- Edit -->
<div class="modal fade" id="edit_symptoms<?php echo $row['symptoms_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Update</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<?php
					$edit=mysqli_query($conn,"select * from symptoms where symptoms_id='".$row['symptoms_id']."'");
					$erow=mysqli_fetch_array($edit);
				?>
				<div class="container-fluid">
				<form method="POST" action="edit-disease.php" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-3">
							<label style="position:relative; top:7px;">Name:</label>
						</div>
						<div class="col-lg-9">
                            <input type="text" name="name" class="form-control" value="<?=$erow['disease_name']?>" required>
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