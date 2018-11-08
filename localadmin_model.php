<?php
class Localadmin_model extends \Model
{

    public function __construct($serial = '')
    {
        parent::__construct('id', 'localadmin'); //primary key, tablename
        $this->rs['id'] = '';
        $this->rs['serial_number'] = $serial;
        $this->rs['users'] = '';
        $this->rs['user_count'] = 0;

        if ($serial) {
            $this->retrieve_record($serial);
        }

        $this->serial = $serial;
    }

    // ------------------------------------------------------------------------

     public function get_localadmin()
     {
        $out = array();
        //Check if config threshold is set for number of admins to show
        $threshold=2;
        if(conf('local_admin_threshold') != '') {
            $threshold = (int) conf('local_admin_threshold');
        }
        $filter = get_machine_group_filter();
        $sql = "SELECT machine.serial_number, computer_name,
                    user_count AS count,
                    users
                    FROM localadmin
                    LEFT JOIN machine USING (serial_number)
                    LEFT JOIN reportdata USING (serial_number)
                    $filter
                    AND user_count >= $threshold
                    ORDER BY count DESC";

        foreach ($this->query($sql) as $obj) {
                $obj->users = $obj->users ? $obj->users : 'Unknown';
                $out[] = $obj;
        }
        return $out;
     }

    /**
     * Process data sent by postflight
     *
     * @param string data
     * @author AvB
     **/
    public function process($data)
    {
        $this->users = trim($data);
        // Match words not enclosed in ()
        $this->user_count = preg_match_all('/\w+(?![^\(]*\))/', $this->users);
        $this->save();
    }
}

