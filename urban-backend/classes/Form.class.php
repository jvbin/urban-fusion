<?php

class Form extends Dbh
{

    protected function getStore()
    {
        $sql = "SELECT * FROM stores;";
        $stmt = $this->connect()->query($sql);
        $row = $stmt->fetchAll();
        return $row;
    }

    protected function setdeleteStmt($id)
    {
        $sql = "DELETE FROM stores WHERE id= ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        header("Location: ../grid.php?status=deleted");
    }
}
