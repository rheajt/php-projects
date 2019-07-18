<?php 

/**
* 
*/
class SchoolYear {

    private $holidays = array();

    function __construct($start, $end) {
        $start = date_create($start);
        $this->start = date_format($start, 'M j, Y');
        
        $end = date_create($end);
        $this->end = date_format($end, 'M j, Y');
    }

    function getYear() {

        echo 'Start of the year: '.$this->start.'<br>';
        echo 'End of the year: '.$this->end.'<br>';
    }

    function setHoliday($holidayName, $holidayDate) {
        $this->holidays[] = array($holidayName => $holidayDate);
    }

    function getHolidays() {
        if(isset($this->holidays)) {
            foreach($this->holidays as $key => $h) {
                echo '<h3>'.$key.' on '.$h.'</h3>';
            }
        } else {
            echo '<h3>No holidays scheduled</h3>';
        }
    }
}