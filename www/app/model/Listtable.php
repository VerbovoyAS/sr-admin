
<?php 
    class Listtable  {
        public $typeList;
        
        private $_db = null;
            public function __construct() {
                $this->_db = DB::getInstanse();
            }
            
            public function getInfo(){

                    if($this->typeList == ''){
                        $result = $this->_db->query("SELECT list.*, id_type.type FROM `list` JOIN id_type ON list.cat_id = id_type.id");
                    }else{
                        $result = $this->_db->query("SELECT list.*, id_type.type FROM `list` JOIN id_type ON list.cat_id = id_type.id WHERE `type` = '{$this->typeList}'");
                    }

                    $res = $result->fetchAll(PDO::FETCH_OBJ);
                    $i = 1;
                    foreach ($res as $link){
                        $ic = $i++;
                        $linkBlock .=  "
                            
                            <tr>
                                <th scope='row'>{$ic}</th>
                                <td>{$link->name}</td>
                                <td>{$link->vlan}</td>
                                <td>{$link->ip}</td>
                                <td>{$link->comment}</td>
                                <td>
                                <a href='/ListSrv/edit?action=edit&id={$link->id}'>Edit</a>
                                | <a href='?action=delete&id={$link->id}' onclick='return confirm(\"Вы дейстиветельно хотите удалить - $link->name\")'>del</a> 
                                </td>
                            </tr>
                            ";
                    }
                    $tableAll = "
                        <table id='example' class='display' style='width:100%'>
                        <thead>
                            <tr>
                                <th scope='col'>№</th>
                                <th scope='col'>Name</th>
                                <th scope='col'>VLAN</th>
                                <th scope='col'>IP</th>
                                <th scope='col'>Comment</th>
                                <th scope='col'>Operation</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            {$linkBlock}
                        </tbody>
                        </table>
                        ";

                    $result1 = $this->_db->query("SELECT * FROM `cat_list` ORDER BY `cat_list`.`id` ASC");
                    $res1 = $result1->fetchAll(PDO::FETCH_OBJ);
                    $count = count($res1);    
                    
                    foreach ($res1 as $btn){
                        $navBtn .=  " <li class='nav-item mb-2 mr-2'>
                                        <a class='nav-link btn btn-outline-primary' href='/ListSrv/Category/{$btn->cat}'>{$btn->cat}</a>
                                    </li>";
                    }

                    $listNav = "
                        <ul class='nav nav-pills nav-fill'>
                        {$navBtn}
                        </ul>
                    ";
                    $list = [$listNav,$tableAll];
                    return $list;
                }
            
            

           
    }
    