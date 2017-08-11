<?php
class report {
	function print_a_type(){
		print "This is A-type Report</br>\n";
		}
}
class newreport extends report{
	function print_a_type(){
		report::print_a_type();
		}
	}
?>