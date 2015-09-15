<?php

class DateTimeView {


	public function show() {

		$timeString = date("l, the dS of M, The time is: Y G:i a");;
		$day = date("l, ");
		$dayDate = date("dS ");
		$month = date("F ");
		$year = date("Y, ");
		$time = date("H:i:s ");

		return '<p>' . $day . 'the ' . $dayDate . 'of ' . $month . $year . 'The time is: ' . $time . '</p>';
	}
}