[![](http://web.tiscali.it/in_medio_stat_virtus/banner.png)](https://code.google.com/p/aspis-httpd)

Aspis is a lightweight, reasonably secure web server born as a fork of the old Boa http server. New features include PHP support, UTF-8 paths, custom error pages, a more simple and secure chroot and others.

## Technical Details ##
Aspis is written in C and it should compile even on BSD/Solaris, though its primary target OS is Linux.

### Features ###
The ~90 kB Aspis binary features:

  * single thread
  * virtual hosts
  * alias
  * CGI 1.1 compliance
  * PHP support through PHP-CGI
  * Unicode encoded URLs
  * simple but effective chroot
  * http compression
  * custom error pages
  * basic authentication
  * access control

There are also the following limits: 4GB maximum file size, no SSL (however you can use [Pound](http://www.apsis.ch/pound) as an SSL wrapper), no mod\_rewrite.

### To do ###
FastCGI is the next step.

## Documentation ##
You can find the full Aspis web server documentation at http://widooc.altervista.org/ .

### Installation ###
See the ["Install"](https://code.google.com/p/aspis-httpd/wiki/Install) wiki page.

### Configuration ###
See the ["Configuration"](https://code.google.com/p/aspis-httpd/wiki/PageName) wiki page.

### Invocation ###
aspis `[`-c serverroot`]` `[`-f configfile`]` `[`-r chroot`]` `[`-d`]` `[`-l debug\_level`]`

By default Aspis reads its configuration from /etc/aspis/aspis.conf . Otherwise from "serverroot"/aspis.conf .

### Content management ###
Perl and PHP Content Management Systems should work, the only caveat is, since Aspis does not support mod\_rewrite rules, those CMS relying on mod\_rewrite do not work (most notably Wordpress and Habari). Known working content management systems, web frameworks and wiki engines:

**(AWK)** [awkiawki](http://awkiawki.bogosoft.com/) - [tinytim](http://awk.info/?tools/tinytim) - [yawk](http://www.awk-scripting.de/cgi-bin/wiki.cgi/yawk/00-WikiIndex)

**(Perl)** [blosxom](http://blosxom.sourceforge.net/) - [movable type](http://movabletype.org/) - [yabb](http://www.yabbforum.com/) - [bimp](bimp.md) - [oddmuse](http://www.oddmuse.org/) - [myblog](http://fuzzymonkey.net/software/blog/) - [yawps](http://yawps.sourceforge.net/) - [openjournal](http://grohol.com/downloads/oj/)

**(PHP)** [drupal](http://www.drupal.org) - [pluck](http://www.pluck-cms.org) - [gpeasy](http://www.gpeasy.com) - [dokuwiki](http://www.dokuwiki.org) - [pmwiki](http://www.pmwiki.org) - [frog](http://www.madebyfrog.com) - [pivotx](http://pivotx.net/) - [cmsimple](http://www.cmsimple.org) - [nanomus](http://www.php-nanomus.org/) - [nanocms](http://www.nanocms.co.uk/) - [phpsqlitecms](http://phpsqlitecms.net/) - [lotus cms](http://www.lotuscms.org/) - [razor cms](http://www.razorcms.co.uk/)

**last edited:** 15th January 2012