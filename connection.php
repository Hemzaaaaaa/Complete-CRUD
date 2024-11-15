<?php
class curd{
    public static function conect()
    {
        try {
            $con = new PDO('mysql:localhost=host; dbname=curdsystem', 'root', '');
            return $con;
        } catch(PDOException $error1){
            echo 'Something went wrong, for connecting to database'.$error1->getMessage();
        } catch(Exception $error2){
            echo 'Generic error'.$error2->getMessage();
        }
    }
    public static function selectdata()
    {
        $data = array();
        $p = curd::conect()->prepare('SELECT * FROM curdtable');
        $p->execute();
        $data = $p->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function delete($id)
    {
        $p=curd::conect()->prepare('DELETE FROM curdtable WHERE id=:id');
        $p->bindValue(':id',$id);
        $p->execute();
    }
}





?>