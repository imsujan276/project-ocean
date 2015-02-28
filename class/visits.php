<?PHP
    //Copyright محمد مصطفي شهركي @ http://www.ncis.ir
    class Visits
    {
        private $now;

        public function Visits()
        {
            $this->Today();
        }

        private function Today()
        {
            $this->now = new DateTime('now');
        }

        private function Connect()
        {
            mysql_connect('localhost','root','');
            mysql_select_db('visits');
            mysql_query('SET NAMES \'utf8\'');
        }

        public function Count()
        {
            $this->Connect();
            $this->Today();
            $now = $this->now;
            $now = $now->format('Y-m-d');
            $result = mysql_query("SELECT * FROM `counter` WHERE (`vdate`='$now') ORDER BY `id`");
            switch(mysql_num_rows($result))
            {
                case -1:
                    echo '<P dir="ltr" align="left">'.mysql_error().'</P>'."\n";
                    break;
                case 0:
                    $result = mysql_query('SELECT * FROM `counter` ORDER BY `id` DESC LIMIT 1');
                    $id = 0;
                    if(mysql_num_rows($result) > 0)
                    {
                        $id = mysql_result($result, 0, 0);
                    }
                    $id++;
                    mysql_query("INSERT INTO `counter` VALUES ('$id','$now','1')");
                    break;
                default:
                    while($row = mysql_fetch_assoc($result))
                    {
                        $id = $row['id'];
                        mysql_query("UPDATE `counter` SET `count`=`count`+1 WHERE (`id`='$id')");
                    }
                    break;
            }
        }

        public function GetAll()
        {
            $this->Connect();
            $result = mysql_query('SELECT * FROM `counter` ORDER BY `id`');
            $visits = 0;
            if(mysql_num_rows($result) > 0)
            {
                while($row=mysql_fetch_assoc($result))
                {
                    $visits += $row['count'];
                }
            }
            return $visits;
        }

        public function GetLastDays($days)
        {
            $this->Connect();
            $this->Today();
            $now = $this->now;
            $result = mysql_query('SELECT * FROM `counter` ORDER BY `id`');
            $visits = 0;
            if(mysql_num_rows($result) > 0)
            {
                while($row=mysql_fetch_assoc($result))
                {
                    $vdate = new DateTime($row['vdate']);
                    $interval = -1;
                    while($vdate <= $now)
                    {
                        $vdate->add(new DateInterval('P1D'));
                        $interval++;
                    }
                    if($interval < $days)
                    {
                        $visits += $row['count'];
                    }
                }
            }
            return $visits;
        }

        public function GetLastDay($day)
        {
            $this->Connect();
            $this->Today();
            $now = $this->now;
            $result = mysql_query('SELECT * FROM `counter` ORDER BY `id`');
            $visits = 0;
            if(mysql_num_rows($result) > 0)
            {
                while($row=mysql_fetch_assoc($result))
                {
                    $vdate = new DateTime($row['vdate']);
                    $interval = -1;
                    while($vdate <= $now)
                    {
                        $vdate->add(new DateInterval('P1D'));
                        $interval++;
                    }
                    if($interval == $day)
                    {
                        $visits += $row['count'];
                    }
                }
            }
            return $visits;
        }

        public function GetToday()
        {
            $this->Connect();
            $this->Today();
            $now = $this->now;
            $now = $now->format('Y-m-d');
            $result = mysql_query("SELECT * FROM `counter` WHERE (`vdate`='$now') ORDER BY `id`");
            $visits = 0;
            if(mysql_num_rows($result) > 0)
            {
                while($row=mysql_fetch_assoc($result))
                {
                    $visits += $row['count'];
                }
            }
            return $visits;
        }
    }
?>