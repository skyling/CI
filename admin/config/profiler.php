<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Profiler Sections
| -------------------------------------------------------------------------
| This file lets you determine whether or not various sections of Profiler
| data are displayed when the Profiler is enabled.
| Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/profiling.html
|
*/
//benchmarks	在各个计时点花费的时间以及总时间	TRUE
//config	CodeIgniter 配置变量	TRUE
//controller_info	被调用的method及其所属的控制器类	TRUE
//get	在request中传递的所有GET参数	TRUE
//http_headers	本次请求的 HTTP 头	TRUE
//memory_usage	本次请求消耗的内存（byte为单位）	TRUE
//post	在request中传递的所有POST参数	TRUE
//queries	列出执行的数据库操作语句及其消耗的时间	TRUE
//uri_string	本次请求的URI	TRUE
//query_toggle_count
$config['benchmarks'] = TRUE;
$config['config'] = TRUE;
$config['controller_info'] = TRUE;
$config['get'] = TRUE;
$config['memory_usage'] = TRUE;
$config['post'] = TRUE;
$config['queries'] = TRUE;
$config['uri_string'] = TRUE;
$config['query_toggle_count'] = 25;