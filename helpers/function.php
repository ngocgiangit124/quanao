<?php
    function getCustomer($date) {
        $customer = date('d-m-Y', strtotime($date));
        return $customer;
    }
    function getToday() {
        $today = date('d-m-Y');
        return $today;
    }
    function getTomorrow() {
        $tomorrow = date('d-m-Y', strtotime(date('d-m-Y') . ' +1 day'));
        return $tomorrow;
    }
    function getMonDay() {
        $monday = date('d-m-Y' ,strtotime( "previous monday"));
        return $monday;
    }
    function getSaturday() {
        $today = strtotime(date('d-m-Y'));
        $date_today = date('D');
        if ($date_today != 'Mon') {
            $saturday = date('d-m-Y', strtotime( "previous monday +5 day" ));

        } else {
            $saturday = date('d-m-Y', strtotime(date('d-m-Y') . ' +5 day'));
        }
        return $saturday;
    }
    function getSunday() {
        $date_today = date('D');
        if ($date_today != 'Mon') {
            $sunday = date('d-m-Y', strtotime( "previous monday +5 day" ));

        } else {
            $sunday = date('d-m-Y', strtotime(date('d-m-Y') . ' +5 day'));
        }
        return $sunday;
    }


