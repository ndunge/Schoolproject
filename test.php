<?php

class MyClass
{
	//properties of the class
	public $a= "I am testing the information";

	public function setProperty($newval)
	{
		$this->a= $newval;

	}

	public function getProperty()
	{
		return $this->a ."<br/>";
	}


}

$model= new MyClass;
$model->setProperty("I am learning");
echo $model->setProperty

echo $model->a;





?>