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
    public function eat($eat) 
    {
        echo $eat;
    }
}

class Mammoth extends Animal
{
    public function stomps($stomps) 
    {
        echo $stomps;
    }
}

class Monkey extends Animal
{
    public function climbs($climbs) 
    {
        echo $climbs;
    }
}

class Shark extends Lion
{
    public function swims($swims) 
    {
        echo $swims;
    }
}

$animal = new Animal;
$lion = new Lion;
$mammoth = new Shark;
$monkey = new Monkey;
$shark = new Shark;


$animal->givesVoice("meow"); // echo 'meow'
$shark->givesVoice("meow"); // echo 'meow' -_-
$mammoth->swims("elephant swims"); // echo 'elephant swims'