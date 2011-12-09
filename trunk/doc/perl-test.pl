#!/usr/bin/perl

print <<EOH;

<html>
<header>
<title>Index.pl</title>
</header>

<body>
<h1> Perl test </h1>
EOH

exec('perl -v');

print "</body></html>";