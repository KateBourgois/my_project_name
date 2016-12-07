<?php

class define_ {

    var $first = "1000x vouchers van 10 euro op napoleongames.be";
    var $second = "100x vouchers van 100 euro op napoleongames.be";
    var $third = "10x vouchers van 200 euro op napoleongames.be";
    var $fourth = "1x reis naar Las Vegas";

    /*
       public function spin() {
        $array = array($this->first, $this->second, $this->third, $this->fourth);
        $result = $array[rand(0, count($array) - 1)];
        return $result;
    }

    public function sort_results() {
        $array = array();
        for ($count = 1; $count < 11; $count++) {
            $spin = 'spin' . $count;
            $$spin = $this->spin();
            $array[] = $$spin;
        }
        asort($array);
        return $array;
    }

    public function win() {
        $array = $this->sort_results();
        $win = '';
       
        foreach (array_count_values($array) as $value => $count) {
            if ($count >= 7 && $value == $this->fourth) $win = $value;
            elseif ($count >= 6 && $value == $this->third)  $win = $value;
            elseif ($count >= 5 && $value == $this->second) $win = $value;
            elseif ($count >= 3 && $value == $this->first) $win = $value;
        }
        
        return $win;
    }
    */
   public function spin($array) {
        $result = $array[rand(0, count($array) - 1)];
        return $result;
    }

    public function sort_results($what, $count_till) {
        $array = array();
        for ($count = 1; $count < $count_till; $count++) {
            $spin = 'spin' . $count;
            $$spin = $what;
            $array[] = $$spin;
        }
        asort($array);
        return $array;
    }

    public function win() {
        $array1 = $this->sort_results($this->first,500);
        $array2 = $this->sort_results($this->second,200);
        $array3 = $this->sort_results($this->third,50);
        $array4 = $this->sort_results($this->fourth,5);
        $result = array_merge($array1, $array2, $array3, $array4);
        $win = $this->spin($result);
        return $win;
    }
    
    
}

echo "<div style='margin-left:40%;margin-top:30%'>";
$a = new define_();
$win = $a->win();
echo $win;


echo "</div>";

