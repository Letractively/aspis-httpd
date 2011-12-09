# programs
bin_PROGRAMS = aspis aspis_indexer

aspis_SOURCES = alias.c aspis.c buffer.c cgi.c cgi_header.c config.c escape.c \
		get.c hash.c ip.c log.c mmap_cache.c pipe.c queue.c range.c \
		read.c request.c response.c signals.c sublog.c timestamp.c util.c \
		select.c
if USE_AUTH
aspis_SOURCES += auth.c
endif
aspis_indexer_SOURCES = index_dir.c escape.c
