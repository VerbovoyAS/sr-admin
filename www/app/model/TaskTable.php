  
<?php 
    class taskTable  {

        public $dbQuery;
        
            private $_db = null;
                public function __construct() {
                    $this->_db = DB::getInstanse();
                }
            
           

            public function taskTable(){
                $result = $this->_db->query("SELECT * FROM `task` ORDER BY `task`.`id` ASC");
                $res = $result->fetchAll(PDO::FETCH_OBJ);
                // return $this->dbQuery;
                $taskTab = '';
                foreach ($res as $task){
                    $taskTab .=  "
                        
                        <tr>
                            <th scope='row'>{$task->header}</th>
                            <td>{$task->text}</td>
                            <td>{$task->status}</td>
                            <td>{$task->user}</td>
                            <td>{$task->telegram}</td>
                            <td>{$task->time_create}</td>
                            <td>{$task->time_alert_start}</td>

                            <td>
                                <a href='/task/edit?action=edit&id={$task->id}'>Edit</a>
                                | <a href='?action=delete&id={$task->id}' onclick='return confirm(\"Вы дейстиветельно хотите удалить - $task->header\")'>del</a>
                            </td>
                            
                        </tr>
                        ";
                }
                $tableAll = "
                    <table id='example' class='display' style='width:100%'>
                    <thead>
                        <tr>
                            <th scope='col'>Header</th>
                            <th scope='col'>task's</th>
                            <th scope='col'>Status</th>
                            <th scope='col'>User</th>
                            <th scope='col'>Telegram</th>
                            <th scope='col'>Time Create</th>
                            <th scope='col'>Time Alert</th>
                            <th scope='col'>Option</th>

                        </tr>
                    </thead>
                    <tbody>
                        {$taskTab}
                    </tbody>
                    </table>
                    ";
                return $tableAll;
            }

          

           
    }
    