
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- Edit VALIDATE -->
<div class="modal fade" id="edit<?php echo $row['patient_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title" id="myModalLabel">Update</label>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<?php
                    $id = $row['patient_id']; 
					$edit=mysqli_query($conn, "SELECT * FROM patient INNER JOIN disease ON patient.disease_id = disease.disease_id WHERE patient.status = 0 AND patient_id=".$id );
                    $erow=mysqli_fetch_array($edit);
                    $disease = $erow['disease_name']; 
                    $name = $erow['firstname'] . ' ' . $erow['lastname']; 
				?>
				<div class="container-fluid">
				<form method="POST" action="edit-crowdpatient.php?id=<?=$id?>" enctype="multipart/form-data">
					<div class="row">
						<div id="divValidate" class="col-lg-12">
							<label style="position:relative; top:7px;">Do you want to validate <b><?=$name?></b> to have <b><?=$disease?></b>?</label>
                            <input type="hidden" name="status" value="1"/>
                        </div>
                        <div id="divNotValidate" class="col-lg-12" style="display:none;">
							<label style="position:relative; top:7px;">Select Valid Disease:</label>
                            <br>
                            <?php
                                $p_sql = "SELECT * FROM patient WHERE patient_id=". $id;
                                $p_query = mysqli_query($con, $p_sql);
                                $p_result = mysqli_query($con,$p_sql);
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_array($p_result))
                                        {
                                            $possible_disease = $row['possible_disease'];
                                        }
                                    }
                                    $possible_disease_array = explode(',', $possible_disease);
                            ?>
                                <input type="hidden" name="id" value="<?=$id?>"/>
                                <div class="row">
                                <div class="col-lg-12">
                                    <select class="form-control" name="select_possible_disease">
                                    <option value="">-------------SELECT POSSIBLE DISEASE----------</option>
                                    <?php
                                    foreach($possible_disease_array as $key => $value):
                                    echo '<option value="'.$value.'">'.$value.'</option>'; //close your tags!!
                                    endforeach;
                                    ?>
                                    </select>                                    
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="submit" name="btnSubmitPossibleDisease" class="btn btn-warning" style="position:relative; top:7px;"/>
                                    </div>
                                </div>
                        </div>
					</div>
				</div>
                <div class="modal-footer">
                    <button type="submit" name="btnValidate" id="btnValidate" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Validate</button>
                    <button type="button" id="btnNotValidate" onclick="showPossibleDisease()" class="btn btn-default"  ><span class="glyphicon glyphicon-remove"></span> Not Validate</button>
                </div>
                <script>
                function showPossibleDisease() {
                document.getElementById('divNotValidate').style.display = "block";
                document.getElementById('divValidate').style.display = "none";
                document.getElementById('btnNotValidate').style.display = "none";
                document.getElementById('btnValidate').style.display = "none";
                }
                </script>
				</form>
            </div>
        </div>
    </div>
<!-- /.modal -->