## Introduction ##
How to compile and install Aspis from sources.

## Quick installation instructions ##

Run from console:

$ ./configure

$ make

$ make install



## Configure options ##

Besides the usual standard options:

  * --enable-utf8
This option enables the support for URLs with Unicode characters (e.g. umlauts, accents).

  * --enable-auth
If you need for basic authentication (not extensively tested).

  * --enable-ipv6
Self explicatory, it enables ipv6 support.

  * --enable-gunzip
You can serve gzipped pages.

Run "./configure --help", without the quotation marks, for more informations about configure options.

E.g.
$ ./configure --prefix=/usr --enable-utf8 --enable-ipv6


## Install options ##

You can run "make install-strip", without the quotation marks, to install the stripped executables. This is recommended if you don't want to debug Aspis.


## Post installation ##

You can find a sample setup in "$(prefix)/share/aspis", where prefix is your installation path. You can change this with the "--prefix=/my/path" option of configure. Afterwards you should put your Aspis configuration file in "/etc/aspis" and your html docs in "/var/www".


## CHROOT (Aspis put in jail) ##

If you want to run Aspis in a restricted enviroment, please refer to the [chroot](AspisInJail.md) and [configuration](PageName.md) wiki page.