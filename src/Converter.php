<?php

namespace Src;

class Converter
{
	static public function revertCharacters(string $str): string
	{
		$substrs = explode(' ', $str);
		$upcasePos = [];
		foreach (mb_str_split($str) as $k => $v) {
			if (preg_match('/^[A-ZА-Я]/u', $v)) {
				$upcasePos[] = $k;
			}
		}
		foreach ($substrs as $substr) {
			$arr = mb_str_split($substr);
			if (ctype_punct($arr[count($arr) - 1])) {
				array_unshift($arr, $arr[count($arr) - 1]);
				unset($arr[count($arr) - 1]);
			}
			for ($i = count($arr) - 1; $i >= 0; $i--) {
				$copyArr[] = $arr[$i];
			}
			$copyArr[] = ' ';
		}
		unset($copyArr[count($copyArr) - 1]);
		$res = implode($copyArr);
		$res = mb_convert_case($res, MB_CASE_LOWER);
		foreach ($copyRes = mb_str_split($res) as $k => $v) {
			foreach ($upcasePos as $upcasePo) {
				if ($upcasePo == $k) {
					$copyRes[$k] = mb_strtoupper($v);
				}
			}
		}
		return implode($copyRes);
	}
}