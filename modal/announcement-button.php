<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!-- Edit -->
<div class="modal fade" id="edit<?php echo $row['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Update </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<?php
					$edit=mysqli_query($conn,"select * from announcements where ID=".$row['ID']."");
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

<!-- Edit -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">New Announcement</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST" action="add-announcement.php" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">What:</label>
						</div>
						<div class="col-lg-10">
                            <input type="text" name="what" class="form-control" required>
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Where:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="where" class="form-control" required>
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">When:</label>
						</div>
						<div class="col-lg-10">
							<input type="date" name="when" id="add_when" class="form-control" required>
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Who:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="who" class="form-control" required>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Image: </label>
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

<?php
//changes language set up of announcement
// $sid = $_SESSION['sid'];
// $sql = "SELECT * FROM announcement_details WHERE id=$sid";
// $d_result = mysqli_query($con,$sql);
// while($row = mysqli_fetch_array($d_result)){
// 	$key_name = $row['name'];
// }
?>

<!-- Settings -->
<div class="modal fade" id="announcement_settings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
			<div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Announcement Settings</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">					
					<div class="row">
						<div class="col-lg-5">
							<label>Current settings: </label>
						</div>
						<div class="col-lg-5" >
							<?php
								if($_SESSION['sid'] <= 2){
									echo '<p style="float:right;">Default ('.$key_name.')</p>';
								} 
								else {
									echo '<p style="float:right;">Custom ('.$key_name.')</p>';
								}
							?>	
						</div>
					</div>

					<div class="row">
						<div class="col-lg-10">
						<?php
							if($key_name == "EN"){
								echo '<a href="modal/announcement-settings.php?sid=2" style="color:blue;position:relative; top:7px;"> Change default to Tagalog </a>';
								echo '<br>';
								echo '<a href="#" style="color:blue;position:relative; top:7px;"> Change default to Custom </a>';
							} else if($key_name == "TG"){
								echo '<a href="modal/announcement-settings.php?sid=1" style="color:blue;position:relative; top:7px;"> Change default to English </a>';
								echo '<br>';
								echo '<a href="#" style="color:blue;position:relative; top:7px;"> Change default to Custom </a>';
							}
							else {
								echo '<a href="modal/announcement-settings.php?sid=2" style="color:blue;position:relative; top:7px;"> Change default to Tagalog </a>';
								echo '<br>';
								echo '<a href="modal/announcement-settings.php?sid=1" style="color:blue;position:relative; top:7px;"> Change default to English </a>';
							}
						?>
							
						</div>
					</div>
					

				</div> 
				

				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->
<!--disable previous date -->
<script>
$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
	$('#add_when').attr('min', maxDate);
	$('#edit_when').attr('min', maxDate);
});
</script>