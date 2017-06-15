<?php

//we start with initializing the class
class Firstone
{
	private $_name;
	private $_job;
	private $_age;

	public function _construct($_name,$_job,$_age)
	{
		$this->_name= $name;
		$this->_job= $job;
		$this->age= $age;
	}

	public function changejob($newjob)
	{
		$this->_job = $newjob;
	}

	public function happybirthday()
	{
		++$this->_age;
	}

	//create two new people
	$person1=new Person("Winnie", "Software Engineer", 25);
	$person2=new Person("Kirui","Plumber", 22);

	//output their starting point
	echo "<pre>Person 1: ",print_r($person1,TRUE),"</pre>";
	echo "<pre>Person2: ",print_r($person2,TRUE),"</pre>";

}




?>