
<?php 
    class WikiTable  {
        public $typeWiki;
        
        
        private $_db = null;
            public function __construct() {
                $this->_db = DB::getInstanse();
            }
            
            public function getInfo(){

                    if($this->typeWiki == ''){
                        $result = $this->_db->query("SELECT wikipass.*, id_type.type FROM `wikipass` JOIN id_type ON id_categoty = id_type.id");
                    }else{
                        $result = $this->_db->query("SELECT wikipass.*, id_type.type FROM `wikipass` JOIN id_type ON id_categoty = id_type.id WHERE `type` = '{$this->typeWiki}'");
                    }


                    $res = $result->fetchAll(PDO::FETCH_OBJ);
                    $linkBlock = '';
                    foreach ($res as $link){
                        $linkBlock .=  "
                            
                            <tr>
                                <th scope='row'>{$link->name}</th>
                                <td>{$link->host}</td>
                                <td>{$link->login}</td>
                                <td>{$link->pass}</td>
                                <td>
                                    <a href='/wiki/edit?action=edit&id={$link->id}'>Edit</a>
                                    | <a href='?action=delete&id={$link->id}' onclick='return confirm(\"Вы дейстиветельно хотите удалить - $link->name\")'>del</a>
                                </td>
                                
                            </tr>
                            ";
                    }
                    $tableAll = "
                        <table id='example' class='display' style='width:100%'>
                        <thead>
                            <tr>
                                <th scope='col'>Name</th>
                                <th scope='col'>Host</th>
                                <th scope='col'>Login</th>
                                <th scope='col'>Password</th>
                                <th scope='col'>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            {$linkBlock}
                        </tbody>
                        </table>
                        ";

                    $result1 = $this->_db->query("SELECT * FROM `type_categoty` ORDER BY `id` ASC ");
                    $res1 = $result1->fetchAll(PDO::FETCH_OBJ);
                    $count = count($res1);    
                    
                    foreach ($res1 as $btn){
                        $navBtn .=  " <li class='nav-item mb-2 mr-2'>
                                        <a class='nav-link btn btn-outline-primary' href='/Wiki/Category/{$btn->categoty}'>{$btn->categoty}</a>
                                    </li>";
                    }

                    $wikiNav = "
                        <ul class='nav nav-pills nav-fill'>
                        {$navBtn}
                        </ul>
                    ";
                    $wiki = [$wikiNav,$tableAll];
                    return $wiki;
                }
            
            

           
    }
    