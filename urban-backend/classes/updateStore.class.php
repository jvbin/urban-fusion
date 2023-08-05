<?php

class UpdateStore extends Dbh
{
    protected function setStore($id, $store_name, $store_address, $zip_code, $contact_info, $shop_status, $selected_default, $latitude, $longitude)
    {
        $sql = "UPDATE stores SET store_name=?, store_address=?, zip_code=?, contact_info=?, shop_status=?, selected_default=?, latitude=?, longitude=? WHERE id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$store_name, $store_address, $zip_code, $contact_info, $shop_status, $selected_default, $latitude, $longitude, $id]);
    }
}
