## Introduction ##

Tested on a GNU/Linux system. This simple tutorial is just for serving static pages.
Aspis chroot is a bit different from Boa chroot.


## Set up the environment ##

Make a directory that you will use as a jail for Aspis.

e.g.: mkdir /path/to/jail

Set up the following environment inside the jail directory. The asterisk marks customizable and optional paths.

dev/
> null
> udp
lib/
> ld-xxx.so
> libc.so.6
`*`bin/
> `*`aspis\_indexer
`*`var/
> `*`log/

> `*`tmp/

> `*`www/

The character devices null and udp should be created with "mknod -m 666 dev/null c 1 3".
Your lib (or lib64, it depends on your system) directory should contain the libraries needed by Aspis, run "ldd aspis" to know that for sure.

The aspis executable, the aspis.conf file and the mime.types file should be kept outside of the jail.

For directory listing you can use either the external binary aspis\_indexer or the faster uglier internal one. The latter option needs for a directory like var/tmp/ for caching, however you can get rid of the bin directory and aspis\_indexer file.


## Set up the config file ##

All your path must be relative to your jail dir, e.g. "DocumentRoot /var/www/" or "ErrorLog /var/log/error.log", if their real paths are "/path/to/jail/var/www/" and
"/path/to/jail/var/log/error.log".
It is mandatory to set the User and Group options if you run this as root.

If you use the directory indexer be sure to copy the binary file inside the jail,
if you prefer to let aspis list directory content comment out DirectoryMaker and set
DirectoryCache to a valid path inside the jail, e.g. /var/tmp.


## Invocation and final notes ##

Now you should run aspis with the command:
aspis -c /path/to/aspis.conf-dir/ -r /path/to/jail/

Aspis reads the configuration file, then changes its root dir, then switches to a new (not root) user, then starts the server.
All the files in the jail should be owned by root, whenever possible.
You should run aspis as a low privileged user (using the User and Group directives of aspis.conf).