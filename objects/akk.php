<?php
class Akk{

    // подключение к базе данных и имя таблицы 
    private $conn;
    private $table_name = "akk";

    // свойства объекта 
    public $id;
    public $name;
    public $price;
    public $timestamp;
    public $image;

    public function __construct($db) {
        $this->conn = $db;
    }
   
	function readAll() {
        // запрос MySQL 
        $query = "SELECT *
                FROM  " . $this->table_name . "
                ORDER BY name ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    
        return $stmt;
    }  
    function readOne($id) {
        // запрос MySQL 
        $query = "SELECT *
                FROM  akk
                WHERE id_akk = {$id}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    
        return $stmt;
    } 
    function slider_tovar($id){
        $query = "SELECT *
        FROM akk
        WHERE akk.id_akk={$id}
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function readGenre($id){
        $query = "SELECT name_genre 
        FROM akk
        JOIN akk_genre ON akk.id_akk = akk_genre.id_akk
        JOIN genre ON akk_genre.id_genre = genre.id_genre 
        WHERE akk.id_akk = {$id}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;

    }
    function readDeveloper($id){
        $query = "SELECT name_developer 
        FROM akk
        JOIN akk_developer ON akk.id_akk = akk_developer.id_akk
        JOIN developer ON akk_developer.id_developer = developer.id_developer
        WHERE akk.id_akk = {$id}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function readKey($id){
        $query = "SELECT log 
        FROM akk
        JOIN akk_log_akk ON akk.id_akk = akk_log_akk.id_akk
        JOIN log_akk ON akk_log_akk.id_log_akk = log_akk.id_log_akk
        WHERE akk.id_akk = {$id}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function readPublisher($id){
        $query = "SELECT name_publisher 
        FROM akk
        JOIN akk_publisher ON akk.id_akk = akk_publisher.id_akk
        JOIN publisher ON akk_publisher.id_publisher = publisher.id_publisher
        WHERE akk.id_akk = {$id}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function readComm($id){
        $query = "SELECT author_comm,text_comm,date 
        FROM otziv_akk
        WHERE id_akk = {$id}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function createComm($id,$author,$text,$date){
        $query = "INSERT INTO `otziv_akk`(`id_akk`,`author_comm`,`text_comm`,`date`)
        VALUES({$id},'{$author}','{$text}','{$date}')";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function tovar_basket($idUser,$idTovar){
        $query = "SELECT id_tovar
        FROM users_basket
        WHERE user_id = {$idUser} AND id_tovar = {$idTovar}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function akk_basket_yes($idUser,$idTovar){
        $query = "SELECT user_id,id_akk
        FROM user_basket_akk
        WHERE user_id = {$idUser} AND id_akk = {$idTovar}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function readAkk($id){
        $query = "SELECT log,pas
        FROM akk
        JOIN akk_log_akk ON akk.id_akk = akk_log_akk.id_akk
        JOIN log_akk ON akk_log_akk.id_log_akk = log_akk.id_log_akk
        WHERE akk.id_akk = {$id}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function create_basket_akk($idUser,$idTovar){
        $query = "INSERT INTO `user_basket_akk`(`user_id`,`id_akk`)
        VALUES ({$idUser},{$idTovar})
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function create_hearth_akk($idUser,$idTovar){
        $query = "INSERT INTO `user_hearth_akk`(`user_id`,`id_akk`)
        VALUES ({$idUser},{$idTovar})
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function akk_hearth_yes($idUser,$idTovar){
        $query = "SELECT user_id,id_akk
        FROM user_hearth_akk
        WHERE user_id = {$idUser} AND id_akk = {$idTovar}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function akk_hearth_delet($idUser,$idTovar){
        $query = "DELETE FROM user_hearth_akk WHERE user_id = {$idUser} AND id_akk = {$idTovar}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function akk_hearth($idUser,$idTovar){
        $query = "SELECT id_akk
        FROM user_hearth_akk
        WHERE user_id = {$idUser} AND id_akk = {$idTovar}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function zakazy_akk($idUser){
        $query = "SELECT akk.id_akk,name,price_standart,description,discount
        FROM users
        JOIN user_basket_akk ON users.user_id = user_basket_akk.user_id
        JOIN akk ON user_basket_akk.id_akk = akk.id_akk
        WHERE user_basket_akk.user_id = {$idUser}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

     function akk_basket_delet($idUser,$idTovar){
        $query = "DELETE FROM user_basket_akk WHERE user_id = {$idUser} AND id_akk = {$idTovar}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function hearth_akk($idUser){
        $query = "SELECT akk.id_akk,name,price_standart,description,discount
        FROM users
        JOIN user_hearth_akk ON users.user_id = user_hearth_akk.user_id
        JOIN akk ON user_hearth_akk.id_akk = akk.id_akk
        WHERE user_hearth_akk.user_id = {$idUser}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function history_akk($idUser){
        $query = "SELECT price_standart,name,DATE_FORMAT(date, '%Y-%m-%d') as date,discount_tovar,cupon,log,pas
        FROM user_history
        JOIN akk ON user_history.id_akk = akk.id_akk 
        WHERE user_id = {$idUser}
        ORDER BY date DESC
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
     function UpdateAkk($id,$name,$price,$discount,$date_release,$description,$min_OS,$min_Processor,$min_RAM,$min_Video_Card,$rec_OS,$rec_Processor,$rec_RAM,$rec_Video_Card,$size){
        $query = "UPDATE tovar
        SET name = '{$name}',price = '{$price}',discount='{$discount}',date_release='{$date_release}',description='{$description}',min_OS='{$min_OS}',min_Processor='{$min_Processor}',min_RAM='{$min_RAM}',min_Video_Card='{$min_Video_Card}',rec_OS='{$rec_OS}',rec_Processor='{$rec_Processor}',rec_RAM='{$rec_RAM}',rec_Video_Card='{$rec_Video_Card}',Size='{$size}'
        WHERE id_akk = {$id}
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function CreateAkkOne($log,$pas){
        $query = "INSERT INTO `log_akk`(`id_log_akk`,`log`,`pas`)
        VALUES (NULL,'{$log}','{$pas}')
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function SELECTAkk($log,$pas){
        $query = "SELECT id_log_akk
        FROM log_akk
        WHERE log ='{$log}' AND pas = '{$pas}' 
        ORDER BY id_log_akk DESC
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function CreateAkkTwo($idAkk,$idLog){
        $query = "INSERT INTO `akk_log_akk`(`id_akk`,`id_log_akk`)
        VALUES ('{$idAkk}','{$idLog}')
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function readAkksvaz(){
        $query = "SELECT id_akk,id_log_akk
        FROM akk_log_akk
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function readAkkAll(){
        $query = "SELECT log,pas,id_log_akk
        FROM log_akk
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
     function Deletakk($idTovar){
        $query = "DELETE FROM akk_log_akk
        WHERE id_akk = {$idTovar}
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function readTovarAkk($id){
            $query = "SELECT log,pas,akk_log_akk.id_log_akk
            FROM akk
            JOIN akk_log_akk ON akk.id_akk = akk_log_akk.id_log_akk
            JOIN log_akk ON akk_log_akk.id_log_akk = log_akk.id_log_akk
            WHERE akk.id_akk = {$id}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function UpdateTovarKey($idTovar,$idkey){
        $query = "INSERT INTO akk_log_akk(id_akk,id_log_akk) VALUES ('{$idTovar}','{$idkey}')
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}
?>

