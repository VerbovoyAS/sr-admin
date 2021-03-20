<?php
require_once 'header.php'; 
$linkBack =  $_SERVER['HTTP_REFERER'];
$_db = DB::getInstanse();
// if(isset($_GET['action']) and $_GET['action'] == "edit"){
//     $id = $_GET['id'];
//     $_db = DB::getInstanse();
//     $result = $_db->query("SELECT * FROM `wikipass` WHERE id={$id}");
//     $res = $result->fetchAll(PDO::FETCH_OBJ);
// }
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <form action="" method="POST">
		<div class="form-group">
			<label> Название </label>
			<input id="name" class="form-control" type="text" name="name" placeholder="Введите название" value="">
		</div>
		
		<div class="form-group">
			<label for="">Host</label>
			<input id="host" class="form-control" type="text" name="host" placeholder="Введите Host" value="">
		</div class="form-group">
		
		<div class="form-group">
			<label for="">Login</label>
			<input id="login" class="form-control" type="text" name="login" placeholder="Введите Login" value="">
		</div class="form-group">
		
		<div class="form-group">
			<label for="">Pass</label>
			<input id="pass" class="form-control" type="text" name="pass" placeholder="Введите Pass" value="">
        </div class="form-group">
        
        <div class="form-group">
            <label for="">Category</label>
            <select id="category"  name='category' class='form-control'>
                <?php
                    $result_opt = $_db->query("SELECT * FROM `id_type` WHERE tab = 'wiki'");
                    $res_opt = $result_opt->fetchAll(PDO::FETCH_OBJ);
                    foreach ($res_opt as $opt){
                        $option .= "<option value='{$opt->id}'>{$opt->type}</option>";
                    }
                    echo $option;
                ?>
            </select>
        </div>
				
		<div class="alert alert-danger mt-2" id="errorBlock"></div>

		<button type="button" id="addWiki" class="btn btn-success">add</button>
		<a href="<?=$linkBack?>" class="btn btn-dark" >Back</a>

	</form>

    <!-- AJAX -->
    <script>
    $('#errorBlock').hide();
    $('#addWiki').click(function (){
            
        var name = $('#name').val();
        var host = $('#host').val();
        var login = $('#login').val();
        var pass = $('#pass').val();
        var category = $('#category').val();
      
        var mess = 'OK';
        $.ajax({
            url: '/ajax/addWiki', 
            type: 'POST',
            cache: false,
            data: {'name' :name, 'host' :host, 'login' : login, 'pass' : pass, 'category' :category},
            dataType: 'html',
            success: function(data){        
                if(data == mess) {
                    $('#addWiki').text('Done');
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