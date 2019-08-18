<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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
					$edit=mysqli_query($conn,"select * from announcements where ID='".$row['ID']."'");
					$erow=mysqli_fetch_array($edit);
				?>
				<div class="container-fluid">
				<form method="POST" action="edit-announcement.php?id=<?php echo $erow['ID']; ?>" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">What:</label>
						</div>
						<div class="col-lg-10">
                            <input type="text" name="what" class="form-control" value="<?php echo $erow['a_what']?>">
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Where:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="where" class="form-control" value="<?php echo $erow['a_where']; ?>" required>
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">When:</label>
						</div>
						<div class="col-lg-10">
							<input type="date" id="edit_when" name="when" class="form-control" value="<?php echo date("Y-m-d", strtotime($erow['a_when']));?>" required>
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Who:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="who" class="form-control" value="<?php echo $erow['a_who']; ?>" required>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Image: </label>
						</div>
						<div class="col-lg-10" style="overflow:hidden;">
							<input type="file" name="image">
							<input type="hidden" name="old_img" class="form-control" value="<?php echo $erow['image']; ?>" required>
							<small> <?php echo $erow['image']; ?> </small>
						</div>
					</div>
					<br>
					<small style="float:right;">Last updated: <?php  echo date('M d, Y h:s A',strtotime($erow['date_created'])); ?></small>
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

<!-- Add -->
<div class="modal fade" id="add_disease" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add New Disease</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST" action="add-disease.php" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-3">
							<label style="position:relative; top:7px;">Name:</label>
						</div>
						<div class="col-lg-9">
                            <input type="text" name="name" class="form-control" required>
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
                            <input type="checkbox" name="symptoms[]" value="<?=  $row["symptoms_id"];?>"> <?= $symptoms?> &nbsp;
                        <?php }} ?>
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


<!-- Add -->
<div class="modal fade" id="add_symptoms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add New Symptoms</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST" action="add-symptoms.php" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-3">
							<label style="position:relative; top:7px;">Name:</label>
						</div>
						<div class="col-lg-9">
                            <input type="text" name="name" class="form-control" required>
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
