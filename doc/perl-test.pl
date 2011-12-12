#!/usr/bin/perl

print <<EOH;

<html>
<header>
<title>Index.pl</title>
</header>

<body>
<h1> Perl test </h1>
EOH

print '<pre>';
exec('perl -v');
print '</pre>';

print "</body></html>";