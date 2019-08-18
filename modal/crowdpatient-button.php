
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- Edit NOT VALIDATE -->
<div class="modal fade" id="edit<?php echo $row['patient_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title" id="myModalLabel">Update</label>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<?php
					$edit=mysqli_query($conn, "SELECT * FROM patient INNER JOIN disease ON patient.disease_id = disease.disease_id WHERE patient.status = 0");
                    $erow=mysqli_fetch_array($edit);
                    $id = $erow['patient_id']; 
                    $disease = $erow['disease_name']; 
                    $name = $erow['firstname'] . ' ' . $erow['lastname']; 
				?>
				<div class="container-fluid">
				<form method="POST" action="edit-crowdpatient.php?id=<?=$id?>" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-12">
							<label style="position:relative; top:7px;">Do you want to validate <b><?=$name?></b> to have <b><?=$disease?></b>?</label>
                            <input type="text" name="status" value="1"/>
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
<!-- Edit VALIDATED -->
<div class="modal fade" id="edit_validated<?php echo $row['patient_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title" id="myModalLabel">Update</label>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<?php
					$edit=mysqli_query($conn, "SELECT * FROM patient INNER JOIN disease ON patient.disease_id = disease.disease_id WHERE patient.status = 1");
                    $erow=mysqli_fetch_array($edit);
                    $id = $erow['patient_id']; 
                    $disease = $erow['disease_name']; 
                    $name = $erow['firstname'] . ' ' . $erow['lastname']; 
				?>
				<div class="container-fluid">
				<form method="POST" action="edit-crowdpatient.php?Vid=<?=$id?>" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-12">
							<label style="position:relative; top:7px;">Do you want to validate <b><?=$name?></b> to have <b><?=$disease?></b>?</label>
                            <input type="text" name="status" value="1"/>
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
