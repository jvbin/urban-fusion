<?php

class UpdateContr extends UpdateStore
{
    public function getStore($id, $store_name, $store_address, $zip_code, $contact_info, $shop_status, $selected_default, $latitude, $longitude)
    {
        $this->setStore($id, $store_name, $store_address, $zip_code, $contact_info, $shop_status, $selected_default, $latitude, $longitude);
    }
}
