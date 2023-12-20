<?php

class Animal
{

    public function givesVoice($voice) 
    {
        echo $voice;
    }
    
    private function run($run)
    {
        echo $run;
    }
}

class Lion extends Animal
{

}

class Mammoth extends Animal
{

}

class Monkey extends Animal
{

}

class Shark extends Lion
{

}

$animal = new Animal;
$lion = new Lion;
$mammoth = new Mammoth;
$monkey = new Monkey;
$shark = new Shark;

$animal->givesVoice("meow"); // echo 'meow'
$shark->givesVoice("meow"); // echo 'meow' -_-

$animal->run("go"); //Fatal error: Uncaught Error: Call to private method Animal::run() from global scope...