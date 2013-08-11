<?php

function post($field, $return_value = false)
{
	if (isset($_POST[$field]))
	{
		if ($return_value)
		{
			return $_POST[$field];
		}
		else
		{
			echo $_POST[$field];
		}
	}
}

function validation_error($field)
{
	global $validation;

	if (!empty($validation[$field]))
	{
		echo 'error';
	}
}

function is_valid($field)
{
	global $validation;
	return empty($validation[$field]);
}