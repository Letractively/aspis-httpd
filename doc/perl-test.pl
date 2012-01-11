#!/usr/bin/perl

print <<EOH;

<html>
<header>
<title>Perl test</title>
</header>

<body>
<h1> Perl test </h1>
EOH

print '<pre>';
exec('perl -v');
print '</pre>';

print "</body></html>";