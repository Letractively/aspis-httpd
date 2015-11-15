## Introduction ##
Aspis relies on the sole aspis.conf file for its configuration. A mime.types file is optional, though strongly recommended.


The Aspis configuration file is parsed with a lex/yacc or flex/bison generated parser.  If it reports an error, the line number will be provided. The syntax of each of these rules is very simple, and they can occur in any order.  Where possible, these directives mimic those of NCSA httpd 1.3.


## Preliminary notes ##

A quick list of preliminary notions about executing CGI and PHP-CGI scripts, restricted environments and SSL.

### Perl ###

Your Perl scripts must be executables and their first line must be #!/usr/bin/perl, given that /usr/bin/perl is the path to your Perl interpreter. If you want to execute Perl scripts outside of a Script Alias directory ( e.g. cgi-bin/ ), be sure to use the MIME type "application/x-httpd-cgi" for your script files.

### PHP ###

First and above all: be sure that your PHP interpreter is compiled with CGI support (usually it's /usr/bin/php-cgi on Linux). PHP files must have the "application/x-httpd-php" MIME type. Moreover you need to set the option "cgi.redirect\_status\_env" from "php.ini" to 200 and you need to set "RedirectStatus" from aspis.conf to the same value. Be sure that the directive "session.save\_path" from php.ini points to a writeable directory, you can set it to "/tmp" if unsure (but it is better a conscious choice).

### Restricted environment (chroot) ###

For a quick guide see the [AspisInJail](https://code.google.com/p/aspis-httpd/wiki/AspisInJail) wiki page.

### SSL ###

Aspis does not support SSL, however you can run Aspis behind the [Pound](http://www.apsis.ch/pound) proxy server, that can be used as a lightweight SSL interpreter (and much more...).

## Directives of aspis.conf ##
Not all the directives are required and some of them are incompatible.

  * Port < integer >
This is the port that Aspis runs on.  The default port for http servers is 80.
If it is less than 1024, the server must be started as root.
  * User < user name or UID >
The name or UID the server should run as.  For Aspis to attempt this, the
server must be started as root.
  * Group < group name or GID >
The group name or GID the server should run as.  For Aspis to attempt this,
the server must be started as root.
  * ServerAdmin < email address >
The email address where server problems should be sent.
Note: this is not currently used.
  * ErrorDocument < string > < file >
Use this for custom error pages, e.g. ErrorDocument 404 /var/www/404.htm . Only static content is allowed at the moment.
  * PidFile < filename >
Where to put the pid of the process.
Comment out to write no pid file.
Note: Because Aspis drops privileges at startup, and the
pid file is written by the UID/GID before doing so, Aspis
does not attempt removal of the pid file.
  * ErrorLog < filename >
The location of the error log file.  If this does not start with
/, it is considered relative to the server root.
Set to /dev/null if you don't want errors logged.
  * AccessLog < filename >
The location of the access log file.  If this does not start with /, it is
considered relative to the server root.
Comment out or set to /dev/null (less effective) to disable access logging.
  * VerboseCGILogs
This is a logical switch and does not take any parameters.
Comment out to disable.
  * CGILog < filename >
The location of the CGI error log file.  If this does not start with /, it
is considered relative to the server root. If specified, this is the file
that the stderr of CGIs is tied to, **instead** of to the ErrorLog.
  * CGIumask < umask >
The CGIumask is set immediately before execution of the CGI.
The default value is 027. The number must be interpretable
unambiguously by the C function strtol. No base is specified,
so one may use a hexadecimal, decimal, or octal number if
it is prefixed accordingly.
  * ServerName < server\_name >
The name of this server that should be sent back to
clients if different than that returned by gethostname.
  * VirtualHost
This is a logical switch and does not take any parameters.
Comment out to disable.
Given DocumentRoot /var/www, requests on interface 'A' or IP 'IP-A'
become /var/www/IP-A.
Example: http://localhost/ becomes /var/www/127.0.0.1
  * VHostRoot < directory >
The root location for all virtually hosted data, comment out to disable.
Incompatible with 'Virtualhost' and 'DocumentRoot'. Given VHostRoot /var/www, requests to host foo.bar.com, where foo.bar.com is ip a.b.c.d,
become /var/www/a.b.c.d/foo.bar.com . Hostnames are "cleaned", and must conform to the rules specified in rfc1034, which are be summarized here:

Hostnames must start with a letter, end with a letter or digit,
and have as interior characters only letters, digits, and hyphen.
Hostnames must not exceed 63 characters in length.
  * DefaultVHost < hostname >
Define this in order to have a default hostname when the client does not
specify one, if using VirtualHostName. If not specified, the word
"default" will be used for compatibility with older clients.
  * DocumentRoot < directory >
The root directory of the HTML documents. If this does not start with
/, it is considered relative to the server root.
  * UserDir < directory >
The name of the directory which is appended onto a user's home directory if a
~user request is received.
  * DirectoryIndex < filename > `[` filename ... `]`
List of the file names to use as a pre-written HTML directory index, up to four.  Please  make and use these files.  On the fly creation of directory indexes can be slow.
  * DirectoryMaker < file >
Name of the program used to generate on-the-fly directory listings. The program must take one or two command-line arguments, the first being the directory to index (absolute), and the second, which is optional, contains what Aspis would have the "title" of the document be. If this does not start with /, it is considered relative to the server root.
  * DirectoryCache < directory >
Path to the directory used as cache by the internal directory listing generator. This directive is superseded by DirectoryMaker. Comment out this and DirectoryMaker if you don't want on the fly directory listings.
  * KeepAliveMax < integer >
Number of KeepAlive requests to allow per connection.  Comment out, or set to 0 to disable keepalive processing.
  * KeepAliveTimeout < integer >
Number of seconds to wait before keepalive connections time out.
  * MimeTypes < file >
The location of the mime.types
file.  If this does not start with /, it is considered relative to
the server root. Set to /dev/null if you do not want to load a mime types
file. Do **not** comment out (better use AddType!)
  * DefaultType < mime type >
MIME type used if the file extension is unknown, or there is no file extension.
  * AddType < mime type > < extension > `[`extension...`]`
Associates a MIME type with an extension or extensions. Use the MIME types "application/x-httpd-cgi" for CGI scripts (including Perl) and "application/x-httpd-php" for PHP files.
  * RedirectStatus < string >
PHP needs this. If you don't use PHP you can safely comment out.
  * PhpHandler < file >
Path to the php interpreter. Default is /usr/bin/php-cgi.
  * Redirect, Alias, and ScriptAlias < path1 > < path2 >
Redirect, Alias, and ScriptAlias all have the same semantics \-\- they
match the beginning of a request and take appropriate action.  Use
Redirect for other servers, Alias for the same server, and ScriptAlias to
enable directories for script execution.

Redirect allows you to tell clients about documents which used to exist
in your server's namespace, but do not anymore.  This allows you tell
the clients where to look for the relocated document.

Alias aliases one path to another.  Of course, symbolic links in the
file system work fine too.

ScriptAlias maps a virtual path to a directory for serving scripts.