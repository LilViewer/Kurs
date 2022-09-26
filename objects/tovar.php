<?php
class Tovar {

    // подключение к базе данных и имя таблицы 
    private $conn;
    private $table_name = "tovar";

    // // свойства объекта 
    // public $id;
    // public $name;
    // public $price;
    // public $timestamp;
    // public $image;

    public function __construct($db) {
        $this->conn = $db;
    }

    function readAll() {
        // запрос MySQL 
        $query = "SELECT id_tovar, name,price,discount, description
        FROM  " . $this->table_name . "
        ORDER BY name ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }  
    function readNameOne(){
        $query = "SELECT name,price,discount,id_tovar FROM " . $this->table_name . " 
        ORDER BY name
        LIMIT 5";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();


        return $stmt;
    }
    function tovar_day(){
        $query = "SELECT id_tovar,name,price,discount FROM " . $this->table_name . " WHERE name='TOM CLANCYS THE DIVISION'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function slider_tovar($id){
        $query = "SELECT tovar.id_tovar,name,price,discount,date_release,description,min_OS,min_Processor,min_RAM,min_Video_Card,rec_OS,rec_Processor,rec_RAM,rec_Video_Card,Size
        FROM tovar
        WHERE tovar.id_tovar={$id}
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function readGenre($id){
        $query = "SELECT name_genre,tovar_genre.id_genre
        FROM tovar
        JOIN tovar_genre ON tovar.id_tovar = tovar_genre.id_tovar
        JOIN genre ON tovar_genre.id_genre = genre.id_genre 
        WHERE tovar.id_tovar = {$id}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;

    }
    function readDeveloper($id){
        $query = "SELECT name_developer,tovar_developer.id_developer
        FROM tovar
        JOIN tovar_developer ON tovar.id_tovar = tovar_developer.id_tovar
        JOIN developer ON tovar_developer.id_developer = developer.id_developer
        WHERE tovar.id_tovar = {$id}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function readKey($id){
        $query = "SELECT key_
        FROM tovar
        JOIN tovar_key ON tovar.id_tovar = tovar_key.id_tovar
        JOIN key_ ON tovar_key.id_key = key_.id_key
        WHERE tovar.id_tovar = {$id}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function readPublisher($id){
        $query = "SELECT name_publisher,tovar_publisher.id_publisher
        FROM tovar
        JOIN tovar_publisher ON tovar.id_tovar = tovar_publisher.id_tovar
        JOIN publisher ON tovar_publisher.id_publisher = publisher.id_publisher
        WHERE tovar.id_tovar = {$id}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function readComm($id){
        $query = "SELECT author_comm,text_comm,date 
        FROM otziv
        WHERE id_tovar = {$id}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function createComm($id,$author,$text,$date){
        $query = "INSERT INTO `otziv`(`id_tovar`,`author_comm`,`text_comm`,`date`)
        VALUES({$id},'{$author}','{$text}','{$date}')";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function id_minecraft_one(){
        $query = "SELECT id_tovar
        FROM tovar
        WHERE name = 'Minecraft полный доступ'";

        $stmt = $this->conn->query($query);
        $stmt = $stmt->FETCH(PDO::FETCH_ASSOC);

        return $stmt;
    }
    function kol_basket($idUser){
        $query = "SELECT id_tovar
        FROM users_basket
        WHERE user_id = {$idUser}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function kol_basketTwo($idUser){
        $query = "SELECT id_akk
        FROM user_basket_akk
        WHERE user_id = {$idUser}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function kol_hearth($idUser){
        $query = "SELECT id_tovar
        FROM user_hearth
        WHERE user_id = {$idUser}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function kol_hearthTwo($idUser){
        $query = "SELECT id_akk
        FROM user_hearth_akk
        WHERE user_id = {$idUser}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function tovar_hearth($idUser,$idTovar){
        $query = "SELECT id_tovar
        FROM user_hearth
        WHERE user_id = {$idUser} AND id_tovar = {$idTovar}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }


    function create_hearth($idUser,$idTovar){
        $query = "INSERT INTO `user_hearth`(`user_id`,`id_tovar`)
        VALUES ({$idUser},{$idTovar})
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function tovar_hearth_yes($idUser,$idTovar){
        $query = "SELECT user_id,id_tovar
        FROM user_hearth
        WHERE user_id = {$idUser} AND id_tovar = {$idTovar}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function tovar_hearth_delet($idUser,$idTovar){
        $query = "DELETE FROM user_hearth WHERE user_id = {$idUser} AND id_tovar = {$idTovar}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function create_basket($idUser,$idTovar){
        $query = "INSERT INTO `users_basket`(`user_id`,`id_tovar`)
        VALUES ({$idUser},{$idTovar})
        ";

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

    function tovar_basket_delet($idUser,$idTovar){
        $query = "DELETE FROM users_basket WHERE user_id = {$idUser} AND id_tovar = {$idTovar}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function tovar_basket_yes($idUser,$idTovar){
        $query = "SELECT user_id,id_tovar
        FROM users_basket
        WHERE user_id = {$idUser} AND id_tovar = {$idTovar}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function zakazy($idUser){
        $query = "SELECT tovar.id_tovar,name,price,discount,description
        FROM users
        JOIN users_basket ON users.user_id = users_basket.user_id
        JOIN tovar ON users_basket.id_tovar = tovar.id_tovar
        WHERE users_basket.user_id = {$idUser}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function cupon(){
        $query = "SELECT *
        FROM cupon";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function history_buy($idUser,$idTovar,$discount,$cupon){
        $query = "INSERT INTO user_history(user_id,id_tovar,date,discount_tovar,cupon)
        VALUES ({$idUser},$idTovar,NOW(),{$discount},{$cupon})";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function users($idUser){
        $query = "SELECT *
        FROM users
        WHERE user_id = {$idUser}
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function hearth($idUser){
        $query = "SELECT tovar.id_tovar,name,price,discount,description
        FROM users
        JOIN user_hearth ON users.user_id = user_hearth.user_id
        JOIN tovar ON user_hearth.id_tovar = tovar.id_tovar
        WHERE user_hearth.user_id = {$idUser}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function count_buy($idUser){
        $query = "SELECT id
        FROM user_history
        WHERE user_id = {$idUser}
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }


    function history($idUser){
        $query = "SELECT price,name,DATE_FORMAT(date, '%Y-%m-%d') as date,discount_tovar,cupon,`keys`
        FROM user_history
        JOIN tovar ON user_history.id_tovar = tovar.id_tovar 
        WHERE user_id = {$idUser}
        ORDER BY date DESC 
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function search($Search){
        $query = "SELECT id_tovar
        FROM tovar 
        WHERE name = {$Search}
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function readPublisherCat($ID){
        // запрос MySQL 
        $query = "SELECT tovar.id_tovar, name,price,discount, description,name_publisher
        FROM tovar
        JOIN tovar_publisher ON tovar.id_tovar = tovar_publisher.id_tovar
        JOIN publisher ON tovar_publisher.id_publisher = publisher.id_publisher
        WHERE tovar_publisher.id_publisher ={$ID}";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function readDeveloperCat($ID){
        // запрос MySQL 
        $query = "SELECT tovar.id_tovar, name,price,discount, description,name_developer
        FROM tovar
        JOIN tovar_developer ON tovar.id_tovar = tovar_developer.id_tovar
        JOIN developer ON tovar_developer.id_developer = developer.id_developer
        WHERE tovar_developer.id_developer ={$ID}";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function readGenreCat($ID){
        // запрос MySQL 
        $query = "SELECT tovar.id_tovar, name,price,discount, description,name_genre
        FROM tovar
        JOIN tovar_genre ON tovar.id_tovar = tovar_genre.id_tovar
        JOIN genre ON tovar_genre.id_genre = genre.id_genre
        WHERE tovar_genre.id_genre ={$ID}";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function readGenreAll(){
        // запрос MySQL 
        $query = "SELECT tovar.id_tovar, name,price,discount, description,name_genre,tovar_genre.id_genre
        FROM tovar
        JOIN tovar_genre ON tovar.id_tovar = tovar_genre.id_tovar
        JOIN genre ON tovar_genre.id_genre = genre.id_genre
        GROUP BY name_genre";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function readDeveloperAll(){
        // запрос MySQL 
        $query = "SELECT tovar.id_tovar, name,price,discount, description,name_developer,tovar_developer.id_developer
        FROM tovar
        JOIN tovar_developer ON tovar.id_tovar = tovar_developer.id_tovar
        JOIN developer ON tovar_developer.id_developer = developer.id_developer
        GROUP BY name_developer";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function readPublisherAll(){
        // запрос MySQL 
        $query = "SELECT tovar.id_tovar, name,price,discount, description,name_publisher,tovar_publisher.id_publisher
        FROM tovar
        JOIN tovar_publisher ON tovar.id_tovar = tovar_publisher.id_tovar
        JOIN publisher ON tovar_publisher.id_publisher = publisher.id_publisher
        GROUP BY name_publisher";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function AllGenre(){
        $query = "SELECT name_genre,id_genre
        FROM genre";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function AllPublisher(){
        $query = "SELECT name_publisher,id_publisher
        FROM publisher";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function AllDeveloper(){
        $query = "SELECT name_developer,id_developer
        FROM developer";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function UpdateTovar($id,$name,$price,$discount,$date_release,$description,$min_OS,$min_Processor,$min_RAM,$min_Video_Card,$rec_OS,$rec_Processor,$rec_RAM,$rec_Video_Card,$size){
        $query = "UPDATE tovar
        SET name = '{$name}',price = '{$price}',discount='{$discount}',date_release='{$date_release}',description='{$description}',min_OS='{$min_OS}',min_Processor='{$min_Processor}',min_RAM='{$min_RAM}',min_Video_Card='{$min_Video_Card}',rec_OS='{$rec_OS}',rec_Processor='{$rec_Processor}',rec_RAM='{$rec_RAM}',rec_Video_Card='{$rec_Video_Card}',Size='{$size}'
        WHERE id_tovar = {$id}
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function UpdateTovarGenre($idTovar,$idGenre){
        $query = "INSERT INTO tovar_genre(id_tovar,id_genre) VALUES ({$idTovar},{$idGenre})
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function UpdateTovarPublisher($idTovar,$idPublisher){
        $query = "INSERT INTO tovar_publisher(id_tovar,id_publisher) VALUES ({$idTovar},{$idPublisher})
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function UpdateTovarDeveloper($idTovar,$iddeveloper){
        $query = "INSERT INTO tovar_developer(id_tovar,id_developer) VALUES ({$idTovar},{$iddeveloper})
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function DeletGenre($idTovar){
        $query = "DELETE FROM tovar_genre 
        WHERE id_tovar = {$idTovar}
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function DeletPublisher($idTovar){
        $query = "DELETE FROM tovar_publisher 
        WHERE id_tovar = {$idTovar}
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function DeletDeveloper($idTovar){
        $query = "DELETE FROM tovar_developer
        WHERE id_tovar = {$idTovar}
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function DeletTovar($idTovar){
        $query = "DELETE FROM tovar
        WHERE id_tovar = {$idTovar}
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function CreateTovar($name,$price,$discount,$date_release,$description,$min_OS,$min_Processor,$min_RAM,$min_Video_Card,$rec_OS,$rec_Processor,$rec_RAM,$rec_Video_Card,$size){
        $query = "INSERT INTO `tovar` (`id_tovar`, `name`, `price`, `discount`, `date_release`, `description`, `min_OS`, `min_Processor`, `min_RAM`, `min_Video_Card`, `rec_OS`, `rec_Processor`, `rec_RAM`, `rec_Video_Card`, `Size`) VALUES (NULL, '{$name}', '{$price}', '{$discount}', '{$date_release}', '{$description}', '{$min_OS}', '{$min_Processor}', '{$min_RAM}', '{$min_Video_Card}', '{$rec_OS}', '{$rec_Processor}', '{$rec_RAM}', '{$rec_Video_Card}', '$size')";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function createGenre($nameGenre){
        $query = "INSERT INTO `genre`(`id_genre`,`name_genre`)
        VALUES (NULL,'{$nameGenre}')
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function createPublisher($namePublisher){
        $query = "INSERT INTO `publisher`(`id_publisher`,`name_publisher`)
        VALUES (NULL,'{$namePublisher}')
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function createDeveloper($nameDeveloper){
        $query = "INSERT INTO `developer`(`id_developer`,`name_developer`)
        VALUES (NULL,'{$nameDeveloper}')
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function DeletGenres($idGenre){
        $query = "DELETE FROM genre
        WHERE id_genre = {$idGenre}
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function DeletPublishers($idPublisher){
        $query = "DELETE FROM publisher
        WHERE id_publisher = {$idPublisher}
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function DeletDevelopers($idDeveloper){
        $query = "DELETE FROM developer
        WHERE id_developer = {$idDeveloper}
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function UpdateGenre($idGenre,$nameGenre){
        $query = "UPDATE genre SET name_genre='{$nameGenre}' 
        WHERE id_genre = {$idGenre}
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function UpdatePublisher($idPublisher,$namePublisher){
        $query = "UPDATE publisher SET name_publisher='{$namePublisher}' 
        WHERE id_publisher = {$idPublisher}
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function UpdateDeveloper($idDeveloper,$nameDeveloper){
        $query = "UPDATE developer SET name_developer='{$nameDeveloper}' 
        WHERE id_developer = {$idDeveloper}
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function CreateKeyOne($key){
        $query = "INSERT INTO `key_`(`id_key`,`key_`)
        VALUES (NULL,'{$key}')
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function SELECTKey($key){
        $query = "SELECT id_key
        FROM key_
        WHERE key_ ='{$key}'
        ORDER BY id_key DESC
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function CreateKeyTwo($idtovar,$idkey){
        $query = "INSERT INTO `tovar_key`(`id_tovar`,`id_key`)
        VALUES ('{$idtovar}','{$idkey}')
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function readKeysvaz(){
        $query = "SELECT id_tovar,id_key
        FROM tovar_key
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function readKeyAll(){
        $query = "SELECT key_,id_key
        FROM key_
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function readTovarKey($id){
        $query = "SELECT name_developer,tovar_key.id_key
        FROM tovar
        JOIN tovar_key ON tovar.id_tovar = tovar_key.id_key
        JOIN key_ ON tovar_key.id_key = key_.id_key
        WHERE tovar.id_tovar = {$id}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function DeletKey($idTovar){
        $query = "DELETE FROM tovar_key
        WHERE id_tovar = {$idTovar}
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function UpdateTovarKey($idTovar,$idkey){
        $query = "INSERT INTO tovar_key(id_tovar,id_key) VALUES ('{$idTovar}','{$idkey}')
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function help($idUser,$text){
        $query = "INSERT INTO help(text,user_id,date) VALUES ('{$text}','{$idUser}',NOW())
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function helpUser($idUser){
        $query = "SELECT date,text,user_login
        FROM help
        JOIN users ON help.user_id = users.user_id
        WHERE help.user_id = '{$idUser}'
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function cuponcreate($name,$discount){
        $query = "INSERT INTO cupon(cupon,discount) VALUES ('{$name}','{$discount}')
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function cuponread(){
        $query = "SELECT cupon,discount,id
        FROM cupon
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    function DeletCupon($idCupon){
        $query = "DELETE FROM cupon
        WHERE id = {$idCupon}
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}   
?>


