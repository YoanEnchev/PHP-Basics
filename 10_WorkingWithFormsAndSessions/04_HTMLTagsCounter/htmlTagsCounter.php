<html>
<head>
</head>
<body>
<form action="">
    <label>
        Enter HTML tags:
        <input type="text" name="tag" required>
    </label>

    <input type="submit" name="output-validation">
</form>
</body>
</html>

<?php
$tags = "<a>
<abbr>
<acronym>
<address>
<applet>
<area>
<article>
<aside>
<audio>
<b>
<base>
<basefont>
<bdi>
<bdo>
<bgsound>
<big>
<blink>
<blockquote>
<body>
<br>
<button>
<canvas>
<caption>
<center>
<cite>
<code>
<col>
<colgroup>
<command>
<content>
<data>
<datalist>
<dd>
<del>
<details>
<dfn>
<dialog>
<dir>
<div>
<dl>
<dt>
<element>
<em>
<embed>
<fieldset>
<figcaption>
<figure>
<font>
<footer>
<form>
<frame>
<frameset>
<h1>
<head>
<header>
<hgroup>
<hr>
<html>
<i>
<iframe>
<image>
<img>
<input>
<ins>
<isindex>
<kbd>
<keygen>
<label>
<legend>
<li>
<link>
<listing>
<main>
<map>
<mark>
<marquee>
<menu>
<menuitem>
<meta>
<meter>
<multicol>
<nav>
<nextid>
<nobr>
<noembed>
<noframes>
<noscript>
<object>
<ol>
<optgroup>
<option>
<output>
<p>
<param>
<picture>
<plaintext>
<pre>
<progress>
<q>
<rp>
<rt>
<rtc>
<ruby>
<s>
<samp>
<script>
<section>
<select>
<shadow>
<slot>
<small>
<source>
<spacer>
<span>
<strike>
<strong>
<style>
<sub>
<summary>
<sup>
<table>
<tbody>
<td>
<template>
<textarea>
<tfoot>
<th>
<thead>
<time>
<title>
<tr>
<track>
<tt>
<u>
<ul>
<var>
<video>
<wbr>
<xmp>";

session_start();

if(!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

$tagList = preg_split('/<|>/', $tags);
$tagList = array_slice($tagList, 1, -1);

if(!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

if(isset($_GET['output-validation'])) {
    $input = $_GET['tag'];

    if(in_array($input, $tagList)) {
        $_SESSION['score']++;
        echo  "<h1>Valid HTML tag!</h1>";
    }
    else {
        echo  "<h1>Invalid HTML tag!</h1>";
    }

    echo  "<h1>Score: {$_SESSION['score']}</h1>";
}
?>