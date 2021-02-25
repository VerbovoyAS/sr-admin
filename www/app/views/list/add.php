<?php
require_once 'header.php'; 
$linkBack =  $_SERVER['HTTP_REFERER'];
$_db = DB::getInstanse();

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <form action="" method="POST">
		<div class="form-group">
			<label> Name </label>
			<input id="name" class="form-control" type="text" name="name" placeholder="Введите название" value="">
		</div>
		
		<div class="form-group">
			<label for="">VLAN</label>
			<input id="vlan" class="form-control" type="text" name="vlan" placeholder="Введите Host" value="">
		</div class="form-group">
		
		<div class="form-group">
			<label for="">IP</label>
			<input id="ip" class="form-control" type="text" name="ip" placeholder="Enter IP" value="">
		</div class="form-group">
		
		<div class="form-group">
			<label for="">Comment</label>
			<input id="comment" class="form-control" type="text" name="comment" placeholder="Enter Comment" value="">
        </div class="form-group">
        
        <div class="form-group">
            <label for="">Category</label>
            <select id="category"  name='category' class='form-control'>
                <?php
                    $result_opt = $_db->query("SELECT * FROM `id_type` WHERE tab = 'list'");
                    $res_opt = $result_opt->fetchAll(PDO::FETCH_OBJ);
                    
                    foreach ($res_opt as $opt){
                        $option .= "<option value='{$opt->id}'>{$opt->type}</option>";
                    }
                    echo $option;
                ?>
            </select>
        </div>
				
		<div class="alert alert-danger mt-2" id="errorBlock"></div>

		<button type="button" id="addList" class="btn btn-success">Add</button>
		<a href="<?=$linkBack?>" class="btn btn-dark" >Back</a>

	</form>

    <!-- AJAX -->
    <script>
    $('#errorBlock').hide();
    $('#addList').click(function (){
            
        var name = $('#name').val();
        var vlan = $('#vlan').val();
        var ip = $('#ip').val();
        var comment = $('#comment').val();
        var category = $('#category').val();
      
        var mess = 'OK';
        $.ajax({
            url: 'http://localhost/ajax/addList', 
            type: 'POST',
            cache: false,
            data: {'name' :name, 'vlan' :vlan, 'ip' : ip, 'comment' : comment, 'category' :category},
            dataType: 'html',
            success: function(data){        
                if(data == mess) {
                    $('#addList').text('Done');
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