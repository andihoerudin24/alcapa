<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function dmy($date)
{
	$list_month 	= array('Januari','Februari','Maret','April','Mei','Juni',
	'Juli','Agustus','September','Oktober','November','Desember');
	$year 	= substr($date,0,4);
	$month 	= substr($date,5,2);
	$date 	= substr($date,8,2);
	$result = $date.' '.$list_month[(int)$month-1].' '.$year;
	return $result;
}

function dmy_short_month($date)
{
	$list_month 	= array('Januari','Februari','Maret','April','Mei','Juni',
	'Juli','Agustus','September','Oktober','November','Desember');
	$month 	= substr($date,5,2);
	$result = $list_month[(int)$month-1];
	return $result;
}

function dmy_date($date)
{
	$date 	= substr($date,8,2);
	return $date;
}

function dmy_month($date)
{
	$list_month 	= array('Januari','Februari','Maret','April','Mei','Juni',
	'Juli','Agustus','September','Oktober','November','Desember');
	$month 	= substr($date,5,2);
	$result = $list_month[(int)$month-1];
	return $result;
}

function dmy_year($date)
{
	$year 	= substr($date,0,4);
	return $year;
}
?>