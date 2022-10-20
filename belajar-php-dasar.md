Belajar PHP Dasar

Tipe data number

Decimal (base 10)

	1234

Octal (base 8)

0123

Bilangan octal pada bahasa pemrograman php diawali dengan angka 0

Hexadecimal (base 16)

	0x1A

	Bilangan octal diawali dengan 0x

Binary (base 2)

	0b111110

	Bilangan binary diawali dengan 0b


Menggunakan underscore pada tipe data number

1_500_000

Underscore disini hanya untuk mempermudah saat dibaca dan akan ter ignore pada saat eksekusi script nya. (tested in web)



In cli i got this err message



Untuk bilangan negatif kita tambahkan - diawal

$nilai = 7000000;

var_dump(-$nilai);


Floating Point

1.234


Floating Point & E plus notation

1.7e3 atau 1.7 x 1000


Floating Point & E minus notation

1.7e-3 atau 1.7 x 0.001

Menggunakan underscore pada tipe data float

1_799.400 atau 1799.400

Integer Overflow

var_dump(PHP_INT_MAX);




PHP_INT_MAX (int)

The largest integer supported in this build of PHP. Usually int(2147483647) in 32 bit systems and int(9223372036854775807) in 64 bit systems.

ref: php.net

Jikalau melebihi kapasitas maksimalnya, php akan otomatis mengkonversi nilai tersebut menjadi floating point


Tipe data boolean

var_dump(true); // benar

var_dump(false); // salah

Tipe data string

Petik satu

echo ‘Marino Imola’

Menggunakan petik satu kita hanya bisa melakukan escape sequence untuk singe quote itu sendiri

echo ‘Hari jum\’at’;

Petik dua

echo “Marino Imola";

Dengan menggunakan petik dua kita bisa melakukan escape sequence untuk beberapa hal, seperti \n untuk ENTER, \t untuk TAB, dan \” untuk double quote

echo “”;

echo “Marino\t Imola\n”  // Marino	Imola

Menggunakan petik dua juga bisa untuk parsing variabel

$name = “Marino Imola”

echo “Hello {$name}”;


Heredoc

Dengan menggunakan heredoc, kita tidak perlu menuliskan escape sequence seperti pada petik dua

$past = “loved”;

echo <<<LOVESONG
Who knows howlong i’ve $past you
You know i love you still
Will i wait a lonely lifetime
If you want me to, I will
LOVESONG;



Nowdoc

Mirip seperti heredoc, namun nowdoc tidak bisa melakukan parsing variabel

$singular = “moves”;

echo <<<’LOVESONG’
Something in the way she $singular
Attracts me like no other lover
Something in the way she woos me
LOVESONG;





Variable

Variable merupakan tempat untuk menyimpan data yang bisa digunakan ulang di kode program selanjutnya.

Di PHP kita bisa menggunakan berbagai jenis tipe data

Format penulisannya menggunakan $

Variable Variables

Membuat nama variable menggunakan string value dari variable lain


$name = “Marino”
$$name = “Imola”

$Marino

Constant

Ketika kita ingin membuat variable yang sifat nya immutable atau tidak bisa dirubah, kita bisa menggunakan constant. Kita bisa membuat constant dengan menggunakan define(). Best practice nya kita bisa menggunakan uppercase untuk penamaannya

define(“APP_VERSION”, 100);


Data NULL

Data null merepresentasikan sebuah variable tanpa nilai

$name = NULL;

Untuk mengecek apakah sebuah variable bernilai null atau tidak, kita bisa menggunakan is_null()

is_null($name) 

Tetapi kalau kita tidak yakin apakah sebuah variable itu ada dan ingin mengecek isinya null atau tidak, lebih aman kalau pake isset()

isset($name)

Is_null & isset mengembalikan nilai boolean

Selain merubah nilai menjadi null

Kita juga bisa menghapus variable nya dengan menggunakan unset()

Array

Array dapat berisikan kosong atau banyak data, array di PHP dapat berisikan  nilai dengan tipe data yang berbeda-beda, array di PHP memiliki panjang dinamis, artinya tidak dibatasi kapasitasnya

$fruits = array(“Mango”, “Banana”, “Strawberry”, “Grape”);

$numbers = array(1, 2, 3, 4, 5.5, 6);

$names = [“Eko”, “Bara”, “Virgianto”, “Tito”, “Prasetio”, “Cryan”, “Shadam”, “Marino”];

Mengakses data didalam array bisa menggunakan index, index array pada PHP dimulai dari 0

echo $names[0];  ⇐== Eko

Untuk menghapus datanya kita bisa menggunakan unset

unset($names[0]); ⇐== menghapus index dan datanya

Untuk menambahkan data baru

$names[] = “Imola”;

Out: 

[“Bara”, “Virgianto”, “Tito”, “Prasetio”, “Cryan”, “Shadam”, “Marino”, “Imola"]
Untuk menghitung jumlah data didalam array

count($names); ⇐== 8

Kita juga bisa menyimpan array didalam array (array multidimensi)

[0, 2, 5, 6, [1, 3, 4]

Array sebagai map

Array di PHP bisa dibuat dengan pasangan key dan value

$identity = array(
	“name” => “Marino Imola,
“age” => 18,
);

Untuk mengaksesnya kita bisa menuliskan key sebagai index nya

echo $identity[“name”];

Untuk menyimpan nested array

$identity = array(
	“name” => “Marino Imola”,
	“age” => 18,
	“address” => [
	“street” => “Jl. Cijahe no. 1 rt02/rw01”,
		“kelurahan” => “Curug Mekar”
]
)

Aritmatika

Untuk merepresentasikan nilai negatif kita menambahkan minus (-) diawal

$angka = 5;

echo -$angka;

Kita juga bisa merubah nilai negatif menjadi positif dengan menambahkan plus (+) diawal

echo +$angka;


Operator Aritmatika


Operator
Keterangan
-$variable
Negatif
+$variable
Positif
$variable + $variable
Penambahan
$variable - $variable
Pengurangan
$variable * $variable
Perkalian
$variable / $variable
Pembagian
$variable % $variable
Sisa bagi
$variable ** $variable
Perpangkatan



Operator Perbandingan


Operator
Keterangan
==
Sama dengan
===
Identik
!=
Tidak sama dengan
<>
Tidak sama dengan
!==
Tidak identik
<
Kurang dari
<=
Kurang dari atau sama dengan
>
Lebih dari
>=
Lebih dari atau sama dengan




Operator Logika


Operator
Keterangan
&&
And
and
And
||
Or
or
Or
!
Not
xor
Xor


IF Statement

If (condition) :

elseif:  // gaboleh pake spasi else if

else:

endif;


Increment & Decrement

Post Increment

$a++;

Pre Increment

++$a;

Post Decrement

$a–;

Pre Decrement

–$a;



Operator Array



Operator
Nama
Keterangan
+
Union
Menggabungkan array
==
Equality
True jika key-value sama
===
Identity
True jika key-value dan posisi sama
!=
Inequality
True jika key-value tidak sama
<>
Inequality
True jika key-value tidak sama
!==
Nonidentity
True jika key-value dan posisi tidak sama


Concatenation

Untuk menggabungkan dua string kita bisa menggunakan dot operator ‘.’

$string = “Hello” . “World!”;

Sebenernya bisa juga pake + tapi ketika yang di gabungkan nilai nya integer nanti akan berubah nilainya, jadi disarankan pake dot operator ‘.’

$string = “10” + 10;

Out: 20

Konversi int ke string & sebaliknya


$string = (string)100;

$int = (int)”100”;

$float = (float)”100.50”;

Mengakses Karakter

$name = “Marino”;

echo $name[0] . PHP_EOL; // out: M

echo $name[1] . PHP_EOL; // out: a

Parsing variable

Khusus double quote dan heredoc, kita bisa menggunakan $ untuk mengakses variable. Ini memudahkan kita ketika ingin menggabungkan string dengan variable

$name = “Marino”;

echo “Hi $name”;

echo<<<NAME
Hi $name
NAME;

Adakalanya kita ingin menambahkan string tanpa menambahkan spasi pada saat memparsing variable, kita bisa menggunakan kurung kurawal untuk itu.

echo “Hi {$name}s”; // Hi Marinos


Null coalescing operator

Kita bisa mempersingkat

If (isset($a[“name”])) {
	$name = $a[“name”];
} else {
	$name = NULL;
}

Menjadi

$name = $a[“name”] ?? NULL;


Perulangan

FOR

Syntax :

for(init statement; condition; post statement) {

}

for(init statement; condition; post statement) :
endfor;


https://www.php.net/manual/en/control-structures.alternative-syntax.php#:~:text=PHP%20offers%20an%20alternative%20syntax,%2C%20or%20endswitch%3B%20%2C%20respectively.


Penggunaan break dan continue pada perulangan

$counter = 1;

while(true) {
	echo $counter;
	$counter++;

	If ($counter > 10) {
		break;
	}
}


for($i = 1; $i <= 100; $i++) {
	If ($i % 2 == 0) {
		continue;
	}
}

For untuk mengakses array
Foreach
Foreach dengan key


Goto operator

Memungkinkan kita untuk berpindah pindah dari satu bagian ke bagian kode yang lain, tetapi jika terlalu banyak digunakan akan membuat kode sulit dibaca

goto a;
echo “this will be skipped”;

a:
echo “Hello world!”;


Goto juga bisa untuk menghentikan perulangan kalau ternyata label yang di tuju ada diluar perulangan

a: ⇐== ini adalah label
echo “Hello world!”;


$counter = 1;

while(true) {
	$counter++;
	If ($counter > 10) {
		goto end;
	}
}

end:
echo “The end”;



Function 

Merupakan block kode program yang akan berjalan saat kita panggil, di PHP kita bebas membuat function dimana saja, bisa didalam if statement, di dalam function dsb.

Function argument

function hello($name) {
	echo “Hello $name” . PHP_EOL;
}

hello();

Default argument value

function hello($name = “Marino”) {
	echo “Hello $name”;
}

Kalau kita panggil hello(); // out: “Hello Marino”;
Tetapi kalau kita panggil hello(“Imola”); // out: “Hello Imola”;


Kesalahan default argument value

Kalau kita taro default argument di awal tidak terlalu berguna.

function hello($first=”Marino”, $last) {
	echo “Hello $last”;
}

Kita ga bisa panggil hello(, “Imola);

Type Declaration

Kita juga bisa menambahkan tipe data pada argument function, PHP akan mencoba melakukan konversi tipe data secara otomatis, 

misal kita membuat function dan menerima parameter bertipe data int, tetapi kita mengirimkan string, PHP akan mencoba mengkonversi nilai tersebut menjadi int.

Valid types


Type
Keterangan
Class / Interface
Parameter harus bertipe class / interface
Self
Parameter harus sama dengan Class dimana function ini dibuat
Array
Parameter harus array
Callable
Parameter harus callable
Bool
Parameter harus boolean
Float
Parameter harus floating point
Int
Parameter harus integer number
String
Parameter harus string
Interable
Parameter harus tipe array atau traversable
Object
Parameter harus sebuah object

Variable-length argument lists

Membuat fungsi hitung total dengan variable array

function sum(array $values) {
$total = 0;
foreach($values as $value) {
	$total += $value;
}	
return $total;
}

sum( [1,5,10,20] );

$values = [1, 5, 10, 20];

sum($values);

Dengan variable argument list

function sum(...$values) {
	$total = 0;
foreach($values as $value) {
	$total += $value;
}	
return $total;
}

sum(1, 5, 10, 20);

$values = [1, 5, 10, 20];

sum(...$values);


ref: https://www.php.net/manual/en/functions.arguments.php 


Return type declaration

Jikalau kita ingin mendeklarasikan tipe data yang dikembalikan dari sebuah function, kita bisa menambahkan tipe data setelah kurung penutup function.


function sum(...$values): int {
	$total = 0;
foreach($values as $value) {
	$total += $value;
}	
return $total;
}


Variable Function

Di PHP kita bisa memanggil function menggunakan variable yang di beri nilai string nama function nya.

function sayHello(string $name): string {
	return “Hello $name”;
}

$hello = “sayHello”;

$hello(“Marino”);

Kita juga bisa mengirimkannya melalui argument function

function manipulate(string $name, $filter): string {
	$finalName = $filter($name);
}

manipulate(“Imola”, “strtoupper”);

manipulate(“Imola”, “strtolower”);


Anonymous Function (Closure)

Kita bisa membuat function tanpa mendefinisikan namanya

$foo = function($name) {
	return “Hi {$name}!”;
};

$foo(“Imola”);

Bisa juga dikirimkan saat memanggil function melalui argument function tersebut
function sayGoodBye(string $name, $filter) {
	return $filter($name);
}

sayGoodBye(“Imola”, function(string $name): string {
	return strtoupper($name);
});

Atau bisa juga

$filterFn = function(string $name): string {
	return strtoupper($name);
};

sayGoodBye(“Imola”, $filterFn);

String Functions


Nama
Keterangan
join() / implode()
menggabungkan array menjadi string (bisa dengan pemisah)
explode()
memecah string menjadi array dengan menggunakan pemisah
strtoupper()
merubah string menjadi uppercase
strtolower()
merubah string menjadi lowercase
trim()
menghapus whitespace (spasi) di kiri dan kanan string (tidak menghapus whitespace di tengah tengah string)
substr()
Memotong bagian dari string


ref: https://www.php.net/manual/en/ref.strings.php 

Array Functions

Nama
Keterangan
array_keys()
mengambil semua index / key milik array
array_values()
mengambil semua values milik array
array_map()
merubah semua data array dengan callback
sort()
mengurutkan array (Ascending)
rsort()
mengurutkan array terbalik (Descending)
shuffle()
mengubah posisi array secara acak


ref: https://www.php.net/manual/en/ref.array.php 

is_function

Require vs Include PHP

Require akan mengembalikan error dan menghentikan program ketika fungsi yang dipanggil tidak ada didalam file yang di require.

require ‘functions.php’;

Sedangkan Include akan mengembalikan warning dan program akan tetap berjalan

require_once & include_once

dengan menggunakan keyword tambahan _once, dapat membantu kita menghandle error ketika mendeklarasikan file yang sama (redeclare)

Include_once ‘functions.php’;
Include_once ‘functions.php’;

Global, Local & Static variable scope

Saat kita mendefinisikan sebuah variable di php otomatis akan termasuk kedalam global scope

$name = “Imola”;

Local

Pada saat kita membuat variable didalam function, variable tersebut akan termasuk kedalam local scope.
function greeting() {
	$name = “Marino Imola”;
	return true;
}

$age = 18;

function greeting() {
	$name = “Marino Imola”;
	return true;
}

Static

Pada saat kita membuat function didalam variable, saat function tersebut selesai, maka siklus hidup variable nya pun berhenti, tetapi dengan menggunakan static keyword, variable akan tetap mempunyai nilai sebelumnya.

Static scope hanya bisa diterapkan pada local scope

Jadi saat fungsi tersebut dijalankan lagi, maka static variable tersebut akan memiliki value yang sama dari sebelumnya.


Global

Secara default, kita tidak bisa mengakses global variable didalam function, tetapi dengan menggunakan keyword Global, hal tersebut menjadi dapat dilakukan.

$age = 18;

function greeting() {
	global $age;
	echo $age;
}

Reference

Assign by reference

Ketika kita membuat variable yang sama dan mengambil value dari variable lainnya dan kita merubah value dari variable tersebut, maka variable yang dijadikan referensi untuk nilai nya tidak akan ikut berubah. Tetapi di PHP kita bisa menggunakan keyword &$variable (didepan variable) agar variable yang dijadikan sebagai referensi akan ikut berubah saat variable lain yang mengakses nya berubah nilainya

$name = “Marino”;

$otherName = &$name;
$otherName = “Imola”;

echo $name; // Marino

Pass by reference

Mengirim data ke function menggunakan reference	

$name = “Marino Imola

function changeName(string &$name) {
	$name = “Imola”;
}

changeName();

echo $name = “Imola”;

Returning reference

Kita bisa mengembalikan nilai reference untuk function, tetapi hati-hati karena dapat membingunkan program kita.

$value = 100;

function &getValue() {
	$value = 200;
	return $value;
}

$a = &getValue();
$a = 200;

$b = &getValue();

echo $b . PHP_EOL









PHP: OBJECT ORIENTED PROGRAMMING

Object adalah data yang berisi field / properties / attributes dan method / function / behavior

Class adalah blueprint, prototype atau cetakan untuk membuat object

Class berisikan deklarasi semua properties dan functions yang dimiliki oleh object

Setiap object selalu dibuat dari class

Dan sebuah class bisa membuat object tanpa batas

Class dan Object: Person



Class dan Object: Car



Membuat Class

<?php
class Person
{
	// properties
	public $name;

	// methods
	function set_name($name)
	{
		$this->name = $name;
}

function get_name($name)
	{
		return $this->name;
}
}

$person1 = new Person();
$person1->set_name = “Marino”;
$person2->set_name = “Imola”;

echo $person1->get_name() . PHP_EOL;
echo $person2->get_name() . PHP_EOL;

PHP - The $this Keyword

The $this keyword refers to the current object, and is only available inside methods.

Example:

<?php
class Fruit {
  public $name;
}
$apple = new Fruit();
?>

So, where can we change the value of the $name property? There are two ways

1. Inside the class (by adding a set_name() method and use $this):

<?php
class Fruit {
  public $name;
  function set_name($name) {
    $this->name = $name;
  }
}
$apple = new Fruit();
$apple->set_name("Apple");

echo $apple->name;
?>

2. Outside the class (by directly changing the property value):

<?php
class Fruit {
  public $name;
}
$apple = new Fruit();
$apple->name = "Apple";

echo $apple->name;
?>

PHP - instanceof

You can use the instanceof keyword to check if an object belongs to a specific class:

<?php
$apple = new Fruit();
var_dump($apple instanceof Fruit);
?>

Object
Properties
Constant
Function
Constructor -> Dipanggil ketika object dibuat
Destructor -> Dipanggil ketika object dihapus dari memory
Inheritance -> Extends -> cuma bisa punya 1 parent, tapi 1 parent bisa punya banyak child
‘Void’ keyword, 
Namespace

Kita bisa membuat nama class yang sama didalam 1 file php, jadi si namespace ini tempat kita menaruh class (seperti folder)

<?php
namespace Data\One {
	class Conflict {

}
}

namespace Data\Two {
	class Conflict {

}
}

Dan untuk mengakses class nya kita harus menuliskan namespace nya

$conflict1 = new Data\One\Conflict();
$conflict2 = new Data\Two\Conflict();

Namespace untuk function dan constant

<?php
namespace Helper;

Function helpMe()
{
	echo “help me” .PHP_EOL;
}

Const APPLICATION = “Belajar PHP”;

===============================================

<?php
echo Helper\APPLICATION . PHP_EOL;

Helper\helpMe();


Global namespace

secara default saat kita membuat kode php, sebenarnya itu ditaro di global namespace

namespace {

}

‘Use’ keyword

Use Data\One\Conflict;
Use function Helper\helpMe;
Use const helper\APPLICATION;

$conflict1 = new Conflict();
$conflict2 = new Conflict();

helpMe();

echo APPLICATION . PHP_EOL;

use Data\One\Conflict;
use Data\Two\Conflict;     ←- ini error


Harusnya pake alias

Jadi si use ini mempermudah pemanggilan menggunakan namespace, especially kalau namespace nya sama

Alias

use Data\One\Conflict as conflict1;
use Data\Two\Conflict as conflict2;

use function Helper\helpMe as help;
use const Helper\APPLICATION as APP;

$conflict1 = new Conflict1();
$conflict2 = new Conflict2();

help();

echo APP . PHP_EOL;

Group use declaration

Untuk melakukan import banyak hal disatu namespace yang sama.

use Data\One\{Conflict as Conflict1, Conflict as Conflict2};

use function Helper\{helpMe as help};

use const Helper\{APPLICATION as APP};

$conflict1 = new Conflict1();
$conflict2 = new Conflict2();

help();

echo APP . PHP_EOL;


Polymorphism

Kemampuan sebuah object untuk memiliki banyak bentuk, banyak bentuk disini yaitu ketika parent class memiliki child-childnya, class parent tersebut dapat dimasukkan data child child nya, kita bisa ngeset data data child nya melalui parent tersebut

<?php

class Programmer
{
	public string $name;
	
	public function __construct(string $name)
	{
		$this->name = $name;
}
}

class BackendProgrammer extends Programmer
{
}

class FrontendProgrammer extends Programmer
{
}

class Company
{
	public Programmer $programmer; // ini bisa berubah bentuk
}

Walaupun disitu kita ngeset tipe datanya si class Programmer, tapi kita juga bisa mengakses class turunannya


<?php

$company = new Company();

$company->programmer = new Programmer(“Marino”);
var_dump($company);

$company->programmer = new BackendProgrammer(“Marino”);
var_dump($company);

$company->programmer = new FrontendProgrammer(“Marino”);
var_dump($company);


Out:

object(Company)#1 (1) {
	[“programmer”] => 
	object(Programmer)#2 (1) => {
		[“name”] => 
		string(6) “Marino”
	}
}

object(Company)#1 (1) {
	[“programmer”] => 
	object(BackendProgrammer)#3 (1) => {
		[“name”] => 
		string(6) “Marino”
	}
}

object(Company)#1 (1) {
	[“programmer”] => 
	object(FrontendProgrammer)#2 (1) => {
		[“name”] => 
		string(6) “Marino”
	}
}


Polymorphism dimana sebuah properti atau data dapat berubah-ubah bentuk tipe datanya, biasanya diset dari parent tipe datanya, otomatis dia bisa diset dari turunannya

Polymorphism juga bisa di function argument

function  sayHelloProgrammer(new Programmer $programmer) {
	return “Hello $programmer->name“;
}

Type check & casts

Instanceof mengembalikan nilai dengan tipe data boolean

If ($programmer instanceof BackendProgrammer) {
	return “Hello Backend Programmer $programmer->name” . PHP_EOL;
} else If ($programmer instanceof FrontendProgrammer) {
	return “Hello Frontend Programmer $programmer->name” . PHP_EOL;
} else If ($programmer instanceof Programmer) {
	return “Hello Programmer $programmer->name” . PHP_EOL;
}

Abstract Class

Abstract class hanya bisa diinstansiasi dengan class child nya

Abstract classes and methods are when the parent class has a named method, but need its child class(es) to fill out the tasks.
An abstract class is a class that contains at least one abstract method. An abstract method is a method that is declared, but not implemented in the code.
An abstract class or method is defined with the abstract keyword:
<?php
// Parent class
abstract class Car {
  public $name;
  public function __construct($name) {
	$this->name = $name;
  }
  abstract public function intro() : string;
}
 
// Child classes
class Audi extends Car {
  public function intro() : string {
    return "Choose German quality! I'm an $this->name!";
  }
}
 
class Volvo extends Car {
  public function intro() : string {
    return "Proud to be Swedish! I'm a $this->name!";
  }
}
 
class Citroen extends Car {
  public function intro() : string {
    return "French extravagance! I'm a $this->name!";
  }
}
 
// Create objects from the child classes
$audi = new audi("Audi");
echo $audi->intro();
echo "<br>";
 
$volvo = new volvo("Volvo");
echo $volvo->intro();
echo "<br>";
 
$citroen = new citroen("Citroen");
echo $citroen->intro();
?>
 
Abstract Function
Sama halnya dengan abstract class, abstract function wajib di override di class turunannya
 
<?php
abstract class ParentClass {
  // Abstract method with an argument
  abstract protected function prefixName($name);
}

class ChildClass extends ParentClass {
  public function prefixName($name) {
    if ($name == "John Doe") {
  	$prefix = "Mr.";
    } elseif ($name == "Jane Doe") {
  	$prefix = "Mrs.";
	} else {
      $prefix = "";
	}
    return "{$prefix} {$name}";
  }
}

$class = new ChildClass;
echo $class->prefixName("John Doe");
echo "<br>";
echo $class->prefixName("Jane Doe");
?>
