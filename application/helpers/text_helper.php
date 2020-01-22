<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('email_clickable')) {
	function email_clickable($text)
	{
		$pattern = "/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i";
		$text = make_clickable($text, $pattern, "mailto");
		return $text;
	}
}

if (!function_exists('phone_clickable')) {
	function phone_clickable($text)
	{
		$pattern = "/^((\+|00(\s|\s?\-\s?)?)31(\s|\s?\-\s?)?(\(0\)[\-\s]?)?|0)[1-9]((\s|\s?\-\s?)?[0-9])((\s|\s?-\s?)?[0-9])((\s|\s?-\s?)?[0-9])\s?[0-9]\s?[0-9]\s?[0-9]\s?[0-9]\s?[0-9]$/";
		return make_clickable($text, $pattern, "tel");
	}
}

if (!function_exists('make_clickable')) {
	function make_clickable($text, $pattern, $type)
	{
		preg_match_all($pattern, $text, $matches);
		if ($matches[0]) {
			foreach ($matches[0] as $match) {
				$close_tag = "</a>";
				$text = substr_replace($text, $close_tag, strpos($text, $match) + strlen($match), 0);
				$open_tag = "<a href='{$type}:{$match}'>";
				$text = substr_replace($text, $open_tag, strpos($text, $match), 0);
			}
		}
		return $text;
	}
}
