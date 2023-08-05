<?php

class FormContr extends Form
{
    public function deleteStore($id)
    {
        $this->setdeleteStmt($id);
    }
}
