<!-- Edit -->
<div class="modal fade" id="edit<?php echo $row['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Update Health Tips</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<?php
					$edit=mysqli_query($conn,"select * from health_tips where ID='".$row['ID']."'");
					$erow=mysqli_fetch_array($edit);
				?>
				<div class="container-fluid">
				<form method="POST" action="edit-healthtips.php?id=<?php echo $erow['ID']; ?>"  enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Title:</label>
						</div>
						<div class="col-lg-10">
                            <input type="text" name="title" class="form-control" value="<?php echo $erow['Title'] ; ?>">
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Source:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="source" class="form-control" value="<?php echo $erow['source']; ?>" required>
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-12">
							<label style="position:relative; top:7px;">Health Tips:</label>
                        <br>
                        <textarea rows="3" cols="50" name="tips" class="form-control form = usrform ckeditor"  required="required"><?php echo $erow['health_tips']; ?> </textarea>

						</div>
					</div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Image: </label>
						</div>
						<div class="col-lg-10">
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
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add New Health Tips</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST" action="add-healthtips.php" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Title:</label>
						</div>
						<div class="col-lg-10">
                            <input type="text" name="title" class="form-control" >
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Source:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="source" class="form-control" required>
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-12">
							<label style="position:relative; top:7px;">Health Tips:</label>
                        <br>
                        <textarea rows="3" cols="50" name="tips" class="form-control form = usrform ckeditor"  required="required"></textarea>

						</div>
					</div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Image:</label>
						</div>
						<div class="col-lg-10">
							<input type="file" name="image" required>
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