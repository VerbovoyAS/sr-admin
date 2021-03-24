<?php
require_once 'header.php'; 
$linkBack =  $_SERVER['HTTP_REFERER'];
$_db = DB::getInstanse();

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <form action="" method="POST">
		
    <div class="form-group">
			<label> Header </label>
			<input class="form-control" id="header" type="text" name="header" placeholder="Enter header" value="" >
		</div>
		
		<div class="form-group">
			<label for="">Task</label>
			<input class="form-control" id="text" type="text" name="text" placeholder="Enter text task" value="" >
		</div>
		
		<!-- <div class="form-group">
			<label for="">Status</label>
			<input class="form-control" id="status" type="text" name="status" placeholder="Enter status" value="" >
		</div> -->

        <div class="form-group">
			<label for="">Status</label>
			<select class="custom-select"  id="status">
                <option selected>Select Status</option>
                <option value="1">Активное</option>
                <option value="2">Выполнено</option>
                <option value="3">Просрочено</option>
            </select>
		</div>

        
		
		<div class="form-group">
			<label for="">User</label>
			<input class="form-control" id="user" type="text" name="user" placeholder="avto user" value="<?=$_COOKIE['login']?>" disabled>
		</div>

		<div class="form-group">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="telegram" name ="remember">
                <label class="custom-control-label" for="telegram">Alert in telegram</label>
            </div>
        </div>

        <div class="form-group">
			<label for="">Time Create</label>
			<input class="form-control" id="time_create" type="datetime-local" name="time_create" placeholder="Enter Commentary" value="<?=date('Y-m-d\TH:i')?>" disabled>
		</div>

		<div class="form-group">
			<label for="">Time Alert</label>
			<input class="form-control" id="time_alert_start" type="datetime-local" name="time_alert_start" placeholder="Enter Commentary" value="">
		</div>
				
		<div class="alert alert-danger mt-2" id="errorBlock"></div>

		<button type="button" id="addTask" class="btn btn-success">Add</button>
		<a href="<?=$linkBack?>" class="btn btn-dark" >Back</a>
        
	</form>

    <!-- AJAX -->
    <script>
    $('#errorBlock').hide();
    $('#addTask').click(function (){
            
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
      
        var mess = 'OK';
        $.ajax({
            url: '/ajax/addTask', 
            type: 'POST',
            cache: false,
            data: {'header' :header, 'text' :text, 'status' : status, 'user' : user, 'telegram' :telegram, "time_create" : time_create, "time_alert_start" : time_alert_start},
            dataType: 'html',
            success: function(data){        
                if(data == mess) {
                    $('#addTask').text('Done');
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