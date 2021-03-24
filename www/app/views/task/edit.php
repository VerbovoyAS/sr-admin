<?php
require_once 'header.php'; 
$linkBack =  $_SERVER['HTTP_REFERER'];

if(isset($_GET['action']) and $_GET['action'] == "edit"){
    $id = $_GET['id'];
    $_db = DB::getInstanse();
    $result = $_db->query("SELECT * FROM `task` WHERE id={$id}");
    $res = $result->fetchAll(PDO::FETCH_OBJ);
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <form class="mb-5" action="" method="POST">
		<div class="form-group">
			<label> Header </label>
			<input class="form-control" id="header" type="text" name="header" placeholder="Enter Header" value="<?=$res[0]->header?>" >
		</div>
		
		<div class="form-group">
			<label for="">Task</label>
			<input class="form-control" id="text" type="text" name="text" placeholder="Enter text task" value="<?=$res[0]->text?>" >
		</div>
		
        <div class="form-group">
			<label for="">Status</label>
			<select class="custom-select"  id="status">
                <option value="1" <?php echo ($res[0]->status == 1)? "selected": "";?>>Активное</option>
                <option value="2" <?php echo ($res[0]->status == 2)? "selected": "";?>>Выполнено</option>
                <option value="3" <?php echo ($res[0]->status == 3)? "selected": "";?>>Просрочено</option>
            </select>
		</div>
		
		<div class="form-group">
			<label for="">User</label>
			<input class="form-control" id="user" type="text" name="user" value="admin" disabled>
		</div>
        
        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="telegram"  <?php echo ($res[0]->telegram == 1)? "checked": "";?>>
                <label class="custom-control-label" for="telegram">Alert in telegram</label>
            </div>
        </div>

        <div class="form-group">
			<label for="">Time Create</label>
			<input class="form-control" id="time_create" type="datetime-local" name="time_create" placeholder="" value="<?=$res[0]->time_create?>" disabled>
		</div>

		<div class="form-group">
			<label for="">Time Alert</label>
			<input class="form-control" id="time_alert_start" type="datetime-local" name="time_alert_start" placeholder="Enter Commentary" value="<?=$res[0]->time_alert_start?>">
		</div>


		<div class="alert alert-danger mt-2" id="errorBlock"></div>

		<button type="button" id="editTask" class="btn btn-success">Edit</button>
		<a href="<?=$linkBack?>" class="btn btn-dark" >Back</a>

		
	</form>
    
    <!-- AJAX -->
    <script>
    $('#errorBlock').hide();
    $('#editTask').click(function (){
            
        var header = $('#header').val();
        var text = $('#text').val();
        var status = $('#status').val();
        var user = $('#user').val();
        var time_create = $('#time_create').val();
        var time_alert_start = $('#time_alert_start').val();

        if($('#telegram').is(':checked')){
            var telegram = 1;
        }else{
            var telegram = 0;
        }
        var id = <?=$res[0]->id?>;
        var mess = 'OK';
        $.ajax({
            url: '/ajax/editTask', 
            type: 'POST',
            cache: false,
            data: {
                'header' :header,
                'text' :text, 
                'status' : status, 
                'user' : user, 
                'telegram' :telegram, 
                "time_create" : time_create, 
                "time_alert_start" : time_alert_start,
                "id" : id},
            dataType: 'html',
            success: function(data){        
                if(data == mess) {
                    $('#editTask').text('Done');
                    $('#errorBlock').hide();
                }
                else {
                    $('#errorBlock').show();
                    $('#errorBlock').text(data);
                }
            }
        });
    });
    </script>

<?php
require_once 'footer.php'; 
?>