
<?php 
    class NetworkBlock  {
        public $numBlock;
        public $numSwith;
        public $dbQuery;
        
            private $_db = null;
                public function __construct() {
                    $this->_db = DB::getInstanse();
                }
            
            // Функция структруры таблицы
            public function getSwTable($q){
                foreach ($q as $el){
                    $swRow .=  "
                        
                        <tr>
                            <th scope='row'>SW {$el->SW}</th>
                            <td>{$el->Port}</td>
                            <td>{$el->PP}</td>
                            <td>{$el->Location}</td>
                            <td>{$el->type}</td>
                            <td>{$el->Name}</td> 
                            <td>{$el->IP}</td>
                            <td>{$el->commentary}</td>
                            <td><a href='/Network/edit?action=edit&id={$el->id}'>Edit</a></td>
                        </tr>
                        ";
                }
                $swTable = "
                    <table id='example' class='display' style='width:100%'>
                    <thead>
                        <tr>
                            <th scope='col'>SW</th>
                            <th scope='col'>Port</th>
                            <th scope='col'>Patch Panel</th>
                            <th scope='col'>Location</th>
                            <th scope='col'>Type</th>
                            <th scope='col'>Name</th>
                            <th scope='col'>IP</th>
                            <th scope='col'>Comment</th>
                            <th scope='col'>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        {$swRow}
                    </tbody>
                    </table>
                    ";
                return $swTable;
            }

            public function getSwAll(){
                $result = $this->_db->query("SELECT network.*, id_type.type FROM `network` JOIN id_type ON network.id_type = id_type.id");
                $this->dbQuery = $result->fetchAll(PDO::FETCH_OBJ);
                return $this->getSwTable($this->dbQuery);
            }

            public function getSwBlock(){

                if($this->numSwith === 'All'){
                    $result = $this->_db->query("SELECT network.*, id_type.type FROM `network` JOIN id_type ON network.id_type = id_type.id WHERE Block = '$this->numBlock'");
                }else{
                    $sw = substr($this->numSwith, -1); 
                    $result = $this->_db->query("SELECT network.*, id_type.type FROM `network` JOIN id_type ON network.id_type = id_type.id WHERE Block = '$this->numBlock' AND SW = '$sw'");
                }
                $this->dbQuery = $result->fetchAll(PDO::FETCH_OBJ);
                
                // Передаем массив из БД и в функции getSwTable формируем таблицу
                $swTable = $this->getSwTable($this->dbQuery);
                
                /*START*/
                // Визуальное отбражение как подключены SW и PP
                $swTab = '';
                if($this->numSwith != 'All'){
                    foreach ($this->dbQuery as $btn){

                        $swBtn .= "
                                <div><button type='button' class='btn btn-outline-success btn-sm btn-block'>{$btn->PP}</button></div>
                                <div><a tabindex='0' class='btn btn-outline-danger btn-sm btn-block' data-toggle='popover' data-trigger='focus' title='SW: {$btn->SW}  Port: {$btn->Port} Patch Panel: {$btn->PP}' data-content='Type: {$btn->device} \n Location: {$btn->Location} Name: {$btn->Name} IP: {$btn->IP} Commentary: {$btn->commentary}'>{$btn->Port}</a></div>     
                                ";
                    }
                    $swTab = "
                        <div class='col'>
                        <div  class='row grid-sw'>{$swBtn}</div>
                        </div>
                        ";
                }
                /*END*/

                /*START*/
                // Кнопки навигации по SW

                if($this->dbQuery[0]->Block != ''){
                    switch($this->dbQuery[0]->Block){
                        case "A":
                            $sw = '5';
                            break;
                        case "B":
                            $sw = '4';
                            break;
                        case "V":
                            $sw = '4';
                            break;
                        case "G":
                            $sw = '3';
                            break;
                        case "D":
                            $sw = '1';
                            break;
                        
                    }
                    for($i = 0; $i <= $sw; $i++){
                        // задаем имя кнопки
                        $n = ($i == 0) ? 'All': $i;
                        // Ссылка кнопки, добавляем SW для красивого отображения Title страницы
                        $l = ($i == 0) ? '': 'SW-'.$i;
                        // Формируем кнопки
                        $nav .= " <li class='nav-item mb-2 mr-2'>
                                    <a class='nav-link btn btn-outline-primary' href='/Network/block/{$this->dbQuery[0]->Block}/{$l}'>SW-{$n}</a>
                                </li>";
                    }
                    $swNav = "
                        <ul class='nav nav-pills nav-fill'>
                        {$nav}
                        </ul>
                    ";
                }
                /*END*/

                // Передаем все параметры в виде массив в View
                return $netWork =[$swTab,$swTable,$swNav];
                
            }
            

           
    }
    