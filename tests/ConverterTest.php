<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Src\Converter;

class ConverterTest extends TestCase
{
	public function testPassesWithCyrillicString()
	{
		$str = 'Кот играет, с Мячиком во двОре.';
		$revSrt = 'Ток теарги, с Мокичям ов ерОвд.';
		$this->assertEquals($revSrt, Converter::revertCharacters($str));
	}
	
	public function testPassesWithLatinicString()
	{
		$str = 'Somebody. Once Told Me, that world is gonna roll me!';
		$revStr = 'Ydobemos. Ecno Dlot Em, taht dlrow si annog llor em!';
		$this->assertEquals($revStr, Converter::revertCharacters($str));
	}
	
	public function testPassesWithEmptyString()
	{
		$str = '';
		$revStr = '';
		$this->assertEquals($revStr, Converter::revertCharacters($str));
	}
	
	public function testPassesWithSingleCharacter()
	{
		$str = 'r';
		$revStr = 'r';
		$this->assertEquals($revStr, Converter::revertCharacters($str));
	}
	
}