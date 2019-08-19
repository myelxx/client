<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


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

                            //create array to sort the symptoms checkbox
                            //$symptoms_sorted_array = array();
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    //array_push($symptoms_sorted_array, $row["symptoms_name"]);
                            ?>
                                    <input type="checkbox" name="symptoms[]" value="<?=$row["symptoms_id"];?>"> <?= $row["symptoms_name"];?> &nbsp; 

                            <?php
                                }
                            } 
                                //sort array
                                //sort($symptoms_sorted_array);
                                // foreach($symptoms_sorted_array as $symptoms){}
                            ?>
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
