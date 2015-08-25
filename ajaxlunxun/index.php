<?php
if(isset($_COOKIE['username'])){
	require_once "home.html";
}else{
	require_once "login.html";
}
