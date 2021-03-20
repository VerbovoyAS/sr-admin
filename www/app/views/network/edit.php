<?php
require_once 'header.php'; 
$linkBack =  $_SERVER['HTTP_REFERER'];

if(isset($_GET['action']) and $_GET['action'] == "edit"){
    $id = $_GET['id'];
    $_db = DB::getInstanse();
    $result = $_db->query("SELECT * FROM `network` WHERE id={$id}");
    $res = $result->fetchAll(PDO::FETCH_OBJ);
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <form class="mb-5" action="" method="POST">
		<div class="form-group">
			<label> Block Name </label>
			<input class="form-control" id="block" type="text" name="Block" placeholder="Enter Block Name" value="<?=$res[0]->Block?>" disabled>
		</div>
		
		<div class="form-group">
			<label for="">SW</label>
			<input class="form-control" id="sw" type="text" name="SW" placeholder="Enter SW" value="<?=$res[0]->SW?>" disabled>
		</div>
		
		<div class="form-group">
			<label for="">Port</label>
			<input class="form-control" id="port" type="text" name="Port" placeholder="Enter Port" value="<?=$res[0]->Port?>" disabled>
		</div>
		
		<div class="form-group">
			<label for="">Patch Panel</label>
			<input class="form-control" id="pp" type="text" name="PP" placeholder="Enter Patch Panel" value="<?=$res[0]->PP?>" disabled>
		</div>
		
		<div class="form-group">
			<label for="">Location</label>
			<input class="form-control" id="location" type="text" name="Location" placeholder="Enter Location" value="<?=$res[0]->Location?>">
		</div>

		<div class="form-group">
			<label  for="">Type</label>
			<select id="type"  name='category' class='form-control'>
                <?php
                    $result_opt = $_db->query("SELECT * FROM `id_type` WHERE tab = 'network'");
                    $res_opt = $result_opt->fetchAll(PDO::FETCH_OBJ);
                    foreach ($res_opt as $opt){
                        $selected = ($res[0]->id_type == $opt->id)?"selected":"";
                        $option .= "<option {$selected} value='{$opt->id}'>{$opt->type}</option>";
                    }
                    echo $option;
                ?>
            </select>
		</div>
		
		<div class="form-group">
			<label for="">Name Device</label>
			<input class="form-control" id="name"  type="text" name="Name" placeholder="Enter Name Device" value="<?=$res[0]->Name?>">
		</div>

		<div class="form-group">
			<label for="">IP</label>
			<input class="form-control" id="ip"  type="text" name="IP" placeholder="Enter IP" value="<?=$res[0]->IP?>">
		</div>

		<div class="form-group">
			<label for="">Commentary</label>
			<input class="form-control" id="commentary" type="text" name="commentary" placeholder="Enter Commentary" value="<?=$res[0]->commentary?>">
		</div>
		<div class="alert alert-danger mt-2" id="errorBlock"></div>

		<button type="button" id="edit" class="btn btn-success">Edit</button>
		<a href="<?=$linkBack?>" class="btn btn-dark" >Back</a>

		
	</form>

    <!-- AJAX -->
    <script>
    $('#errorBlock').hide();
    $('#edit').click(function (){
            
        var block = $('#block').val();
        var sw = $('#sw').val();
        var port = $('#port').val();
        var pp = $('#pp').val();
        var location = $('#location').val();
        var type = $('#type').val();
        var name = $('#name').val();
        var ip = $('#ip').val();
        var commentary = $('#commentary').val();
        var id = <?=$res[0]->id?>;
        var mess = 'OK';
        $.ajax({
            url: '/ajax/editNetwork', 
            type: 'POST',
            cache: false,
            data: {'block' :block, 'sw' :sw, 'port' : port, 'pp' : pp, 'location' :location, 'type':type, 'name':name, 'ip':ip, 'commentary':commentary, 'id':id},
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