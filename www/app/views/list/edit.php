<?php
require_once 'header.php'; 
$linkBack =  $_SERVER['HTTP_REFERER'];

if(isset($_GET['action']) and $_GET['action'] == "edit"){
    $id = $_GET['id'];
    $_db = DB::getInstanse();
    $result = $_db->query("SELECT * FROM `list` WHERE id={$id}");
    $res = $result->fetchAll(PDO::FETCH_OBJ);
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <form action="" method="POST">
		<div class="form-group">
			<label> Name </label>
			<input id="name" class="form-control" type="text" name="name" placeholder="Enter name" value="<?=$res[0]->name?>">
		</div>
		
		<div class="form-group">
			<label for="">VLAN</label>
			<input id="vlan" class="form-control" type="text" name="vlan" placeholder="Enter VLAN" value="<?=$res[0]->vlan?>">
		</div class="form-group">
		
		<div class="form-group">
			<label for="">IP</label>
			<input id="ip" class="form-control" type="text" name="ip" placeholder="Enter IP" value="<?=$res[0]->ip?>">
		</div class="form-group">
		
		<div class="form-group">
			<label for="">Comment</label>
			<input id="comment" class="form-control" type="text" name="comment" placeholder="Enter Comment" value="<?=$res[0]->comment?>">
        </div class="form-group">
        
        <div class="form-group">
            <label for="">Category</label>
            <select id="category"  name='category' class='form-control'>
                <?php
                    $result_opt = $_db->query("SELECT * FROM `id_type` WHERE tab = 'list'");
                    $res_opt = $result_opt->fetchAll(PDO::FETCH_OBJ);
                    foreach ($res_opt as $opt){
                        $selected = ($res[0]->cat_id == $opt->id)?"selected":"";
                        $option .= "<option {$selected} value='{$opt->id}'>{$opt->type}</option>";
                    }
                    echo $option;
                ?>
            </select>
        </div>
				
		<div class="alert alert-danger mt-2" id="errorBlock"></div>

		<button type="button" id="edit" class="btn btn-success">Edit</button>
		<a href="<?=$linkBack?>" class="btn btn-dark" >Back</a>

	</form>

    <!-- AJAX -->
    <script>
    $('#errorBlock').hide();
    $('#edit').click(function (){
            
        var name = $('#name').val();
        var vlan = $('#vlan').val();
        var ip = $('#ip').val();
        var comment = $('#comment').val();
        var category = $('#category').val();
      
        var id = <?=$res[0]->id?>;
        var mess = 'OK';
        $.ajax({
            url: '/ajax/editList', 
            type: 'POST',
            cache: false,
            data: {'name' :name, 'vlan' :vlan, 'ip' : ip, 'comment' : comment, 'category' :category,  'id':id},
            dataType: 'html',
            success: function(data){        
                if(data == mess) {
                    $('#edit').text('Done');
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