
<!-- Add -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add New Outbreak</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST" action="add-outbreak.php" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-4">
							<label style="position:relative; top:7px;">Disease:</label>
						</div>
						<div class="col-lg-8">
                            <!-- <input type="text" name="name" class="form-control" required> -->
                            <select name="disease_name" class="form-control">
                            <?php 
                                $sql = "SELECT * FROM disease";
                                $query = mysqli_query($con, $sql);
                                $result = mysqli_query($con,$sql);
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            echo "<option value='".$row['disease_name']."'>".$row['disease_name']."</option>";
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
                            <input type="text" pattern="\d*" maxlength="3" name="total_cases" class="form-control" required>
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

