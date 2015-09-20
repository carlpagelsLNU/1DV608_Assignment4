<?php

class DateTimeView {


	public function show() {

		$day = date("l, "); // The day printed in full
		$dayDate = date("dS "); // The daydate followed by "th, nd" etc.
		$month = date("F "); // The month printed in full
		$year = date("Y, "); // The year
		$time = date("H:i:s "); // The time printed in 24h format

		return '<p>' . $day . 'the ' . $dayDate . 'of ' . $month . $year . 'The time is ' . $time . '</p>';
	}
}