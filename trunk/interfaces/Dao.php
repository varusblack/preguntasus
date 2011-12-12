<?php

interface DAO {

    public function getAll();

    public function getById($id);

    public function insert($elemento);

    public function update($elemento);

    public function delete($elemento);
}

?>
