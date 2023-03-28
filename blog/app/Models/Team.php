<?php

//namespace App\Models;

// class Team
// {
//     protected $name;
//     protected $members;

//     public function __construct($name, $members = [])
//     {
//         $this->name = $name;
//         $this->members = $members;
//     }

//     public static function start(...$params)
//     {
//         return new static (...$params);
//     }

//     public function name()
//     {
//         return $this->name;
//     }

//     public function members()
//     {
//         return $this->members;
//     }

//     public function add($name)
//     {
//         $this->members[] = $name;
//     }

//     public function cancel()
//     {

//     }

//     public function manager()
//     {

//     }
// }

// class Member
// {
//     protected $name;

//     public function __construct($name)
//     {
//         $this->name = $name;
//     }

//     public function lastViewed()
//     {

//     }
    
// }


// $videotile = Team::start('VideoTile', [
//     new Member('Jordan Turner'), 
//     new Member('Mark Nuttall'), 
//     new Member('Darren Singleton'), 
//     new Member('Callum Stott')]);

// $videotile->add('Jordan Turner');
// $videotile->add('Mark Nuttall');
// $videotile->add('Darren Singleton');
// $videotile->add('Callum Stott');

//var_dump($videotile->members());


// class CoffeeMaker
// {
//     public function brew()
//     {
//         var_dump('Brewing coffee');
//     }
// }

// //inheritance - SpecialtyCoffeeMaker "is a" CoffeeMaker
// class SpecialtyCoffeeMaker extends CoffeeMaker
// {
//     public function brewLatte()
//     {
//         var_dump('Brewing a latte');
//     }
// }


// (new SpecialtyCoffeeMaker())->brewLatte();

class Collection
{
    protected array $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function sum($key)
    {
        //[60, 75, 50]
        return array_sum(array_column($this->items, $key));
    }
}

//"is a" - is VideosCollection a Collection?
class VideosCollection extends Collection
{
    public function length()
    {
        return $this->sum('length');
    }
}

class Video
{
    public $title;

    public $length;

    public function __construct($title, $length)
    {
        $this->title = $title;
        $this->length = $length;
    }
} 


$videos = new VideosCollection([
    new Video('Absestos Awareness', 60),
    new Video('Legionella Management', 75),
    new Video('Basic Fire Safety', 50),
]);


echo $videos->length();