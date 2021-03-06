<?php

/*!
 * Tiny ORM Framework
 * 
 * MIT License
 * 
 * Copyright (c) 2020 - 2021 "Ildar Bikmamatov" <support@bayrell.org>
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace TinyORM;


class Connection
{
	
	public $host = "";
	public $port = "";
	public $login = "";
	public $password = "";
	public $database = "";
	public $prefix = "";
	public $connect_error = "";
	public $pdo = null;
	public $debug = false;
	
	
	/**
	 * Connect
	 */
	function connect()
	{
	}
	
	
	
	/**
	 * Connect
	 */
	function isConnected()
	{
		return false;
	}
	
	
	
	/**
	 * Get sql
	 */
	function getSQL($sql, $arr = [])
	{
		$search = array_keys($arr);
		$search = array_map( function($key){ return ":" . $key; }, $search );
		
		$replace = array_values($arr);
		$replace = array_map( function($value){
			$value = $this->pdo->quote($value);
			return $value;
		}, $replace );
		
		$sql = str_replace($search, $replace, $sql);
		return $sql;
	}
	
	
	
	/**
	 * Quote
	 */
	function quote($item)
	{
		return $this->pdo->quote($item);
	}
	
	
	
	/**
	 * Escape
	 */
	function escape($item)
	{
		return $item;
	}
}