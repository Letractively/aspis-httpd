#                                               -*- Autoconf -*-
# Process this file with autoconf to produce a configure script.

AC_PREREQ([2.68])
AC_INIT([Aspis], [0.5], [ilguido@users.sf.net])
AC_CONFIG_SRCDIR([src/index_dir.c])
AC_CONFIG_HEADERS([config.h])
AC_CONFIG_FILES([Makefile src/Makefile doc/Makefile])
AM_INIT_AUTOMAKE([foreign])

# Checks for programs.
AC_PROG_CC

# Checks for libraries.

# Checks for header files.
AC_CHECK_HEADERS([arpa/inet.h fcntl.h limits.h netdb.h netinet/in.h shadow.h stddef.h stdlib.h string.h sys/socket.h sys/time.h unistd.h])

# Checks for typedefs, structures, and compiler characteristics.
AC_TYPE_UID_T
AC_TYPE_OFF_T
AC_TYPE_PID_T
AC_TYPE_SIZE_T

# Checks for library functions.
AC_FUNC_FORK
AC_FUNC_MALLOC
AC_FUNC_MMAP
AC_FUNC_REALLOC
AC_CHECK_FUNCS([dup2 getcwd gethostbyname gethostname inet_ntoa memchr memmove memset munmap select socket strcasecmp strchr strcspn strdup strerror strncasecmp strrchr strstr strtol tzset])

# Options
AC_ARG_ENABLE([utf8],[AS_HELP_STRING([--enable-utf8],[UTF-8 encoded URLs])],USE_UNICODE="yes", USE_UNICODE="no")
AC_ARG_ENABLE([auth],[AS_HELP_STRING([--enable-auth],[basic authentication support])],USE_AUTH="yes", USE_AUTH="no")
AC_ARG_ENABLE([inet6],[AS_HELP_STRING([--enable-inet6],[ipv6 addressing])],USE_INET6="yes", USE_INET6="no")
AC_ARG_ENABLE([gunzip],[AS_HELP_STRING([--enable-gunzip],[compressed web pages])],USE_GUNZIP="yes", USE_GUNZIP="no")
AC_ARG_ENABLE([ac],[AS_HELP_STRING([--enable-ac],[support for access control])],USE_AC="yes", USE_AC="no")

if test $USE_UNICODE = yes ; then 
  CFLAGS="$CFLAGS -DUSE_UNICODE"
  AC_MSG_RESULT([url encoding with utf-8... enabled])
else
  USE_UNICODE=0
fi

if test $USE_AUTH = yes ; then 
  CFLAGS="$CFLAGS -DUSE_AUTH"
  LIBS="$LIBS -lcrypt"
  AM_CONDITIONAL([USE_AUTH], [test xtrue = xtrue])
  AC_MSG_RESULT([basic authentication... enabled])
else
  AM_CONDITIONAL([USE_AUTH], [test xtrue = xfalse])
  USE_AUTH=0
fi

if test $USE_INET6 = yes ; then 
  CFLAGS="$CFLAGS -DUSE_INET6"
  AC_MSG_RESULT([IP version 6... enabled])
else
  USE_INET6=0
fi

if test $USE_GUNZIP = yes ; then 
  CFLAGS="$CFLAGS -DUSE_GUNZIP"
  AC_MSG_RESULT([http compression... enabled])
else
  USE_GUNZIP=0
fi

if test $USE_AC = yes ; then 
  CFLAGS="$CFLAGS -DUSE_AC"
  AC_MSG_RESULT([access control... enabled])
  AC_CHECK_HEADER(fnmatch.h, [have_fnmatch="yes"], [have_fnmatch="no"])
  if test $have_fnmatch = no ; then
    AC_MSG_ERROR([could not find fnmatch.h (needed by access control)])
  fi
  AM_CONDITIONAL([USE_AC], [test xtrue = xtrue])
else
  USE_AC=0
  AM_CONDITIONAL([USE_AC], [test xtrue = xtrue])
fi

if test x$uname == xSunOS; then
  CFLAGS="$CFLAGS -DSOLARIS"
fi 

AC_OUTPUT
