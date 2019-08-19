
<!-- Edit -->
<div class="modal fade" id="edit<?php echo $row['outbreak_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Update Outbreak</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST" action="edit-outbreak.php" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-4">
							<label style="position:relative; top:7px;">Disease: </label>
						</div>
						<div class="col-lg-8">
                        
                        <?php
                            $edit=mysqli_query($conn,"select * from outbreak where outbreak_id=".$row['outbreak_id']);
                            $erow=mysqli_fetch_array($edit);
                            $selected_disease = $erow['disease_name'];
                            $total_case = $row['total_cases'];
                        ?>
                            <input type="hidden" name="outbreak_id" class="form-control" value="<?php echo $row['outbreak_id']?>" required>
                            <!-- <input type="text" name="name" class="form-control" required> -->
                            <select name="disease_name" class="form-control">
                            <?php 
                                $sql = "SELECT * FROM disease";
                                $query = mysqli_query($con, $sql);
                                $result = mysqli_query($con,$sql);
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            if($selected_disease == $row['disease_name']){
                                                echo "<option value='".$row['disease_name']."' selected>".$row['disease_name']."</option>";
                                            } else {
                                                echo "<option value='".$row['disease_name']."'>".$row['disease_name']."</option>";
                                            }
                                        }
                                    }
                            ?>
                            </select>
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-4">
							<label style="position:relative; top:7px;">Total Cases:</label>
						</div>
						<div class="col-lg-8">
                            <input type="text" pattern="\d*" maxlength="3" name="total_cases" value="<?php echo $total_case?>" class="form-control" required>
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

