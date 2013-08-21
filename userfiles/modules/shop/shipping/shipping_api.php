<?php


//api_expose('shipping_api');

class shipping_api
{

    // singleton instance
    public $here;
    public $modules_list;

    // private constructor function
    // to prevent external instantiation
    function __construct()
    {
        $this->here = dirname(__FILE__) . DS . 'gateways' . DS;
        ;
        $here = $this->here;


        $this->modules_list = modules_list("cache_group=modules/global&dir_name={$here}");
    }

    // getInstance method
    function save($data)
    {
        if (is_admin() == false) {
            error('Must be admin');

        }

        if (isset($data['shiping_country'])) {
            if ($data['shiping_country'] == 'none') {
                error('Please choose country');
            }
            if (isset($data['id']) and intval($data['id']) > 0) {

            } else {
                $check = mw('db')->get('shiping_country=' . $data['shiping_country']);
                if ($check != false and is_array($check[0]) and isset($check[0]['id'])) {
                    $data['id'] = $check[0]['id'];
                }
            }
        }


        $data = mw('db')->save($this->table, $data);
        return ($data);
    }

    function get_active()
    {
        $active = array();
        $m = $this->modules_list;
        foreach ($m as $item) {
            if (mw('option')->get('shipping_gw_' . $item['module'], 'shipping') == 'y') {
                $active [] = $item;
            }
        }
        return $active;
    }


    function get($params = false)
    {

        return $this->modules_list;

    }

    function delete($data)
    {

        $adm = is_admin();
        if ($adm == false) {
            error('Error: not logged in as admin.' . __FILE__ . __LINE__);
        }

        if (isset($data['id'])) {
            $c_id = intval($data['id']);
            mw('db')->delete_by_id($this->table, $c_id);

            //d($c_id);
        }
    }

    function reorder($data)
    {

        $adm = is_admin();
        if ($adm == false) {
            mw_error('Error: not logged in as admin.' . __FILE__ . __LINE__);
        }

        $table = $this->table;


        foreach ($data as $value) {
            if (is_array($value)) {
                $indx = array();
                $i = 0;
                foreach ($value as $value2) {
                    $indx[$i] = $value2;
                    $i++;
                }

                db_update_position($table, $indx);
                return true;
                // d($indx);
            }
        }
    }


}