
<!-- Edit -->
<div class="modal fade" id="edit_disease<?php echo $row['disease_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Update Disease</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<?php
					$edit=mysqli_query($conn,"select * from disease where disease_id='".$row['disease_id']."'");
					$erow=mysqli_fetch_array($edit);
				?>
				<div class="container-fluid">
				<form method="POST" action="edit-disease-symptoms.php" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-3">
							<label style="position:relative; top:7px;">Name:</label>
						</div>
						<div class="col-lg-9">
                            <input type="hidden" name="id" class="form-control" value="<?=$erow['disease_id']?>" required>
                            <input type="text" name="disease_name" class="form-control" value="<?=$erow['disease_name']?>" required>
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-3">
							<label style="position:relative; top:7px;">Symptoms:</label>
						</div>

						<div class="col-lg-9">
                        <?php
                            //

                            $sql = "SELECT * FROM disease_symptoms ds INNER JOIN symptoms s ON ds.symptoms_id = s.symptoms_id WHERE ds.disease_id=" . $erow['disease_id'];
                            $result = $con->query($sql);

                            $selected_symptoms_array = array();

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    //array_push($selected_symptoms_array, $row["symptoms_name"]);
                                    $selected_symptoms_array[$row['symptoms_id']]= $row["symptoms_name"];
                                }
                            } 

                            //
                            $s_sql = "SELECT * FROM symptoms";
                            $s_result = $con->query($s_sql);

                            //create array to sort the symptoms checkbox
                            $symptoms_sorted_array = array();
                            if ($s_result->num_rows > 0) {
                                while($row = $s_result->fetch_assoc()) {
                                    array_push($symptoms_sorted_array, $row["symptoms_name"]);
                                }
                            } 
                            //sort array
                            sort($symptoms_sorted_array);

                            $checked_value = "";
                            $checked = false;
                            foreach($symptoms_sorted_array as $symptoms_id => $symptoms_name){
                                foreach($selected_symptoms_array as $select_symptoms){
                                    if($select_symptoms == $symptoms_name ) {
                                        $check_box = "<input type='checkbox' checked='checked' name='symptoms[]' value='$symptoms_id'> $symptoms_name &nbsp;";
                                        echo $check_box;
                                        $checked = true;
                                    }
                                }
                               
                                if (!$checked){
                                    $check_box = "<input type='checkbox' name='symptoms[]' value='$symptoms'> $symptoms &nbsp;";
                                    echo $check_box;
                                }
                                $checked = false;
                            }  
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
