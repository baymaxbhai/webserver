### Archiving Nginx access log ###
#!/bin/bash
logfile=/var/log/nginx/access.log
if [ ! -f $logfile ]; then
 echo "log file not found $logfile"
 exit 1
fi
timestamp=`date +%Y%m%d`
newlogfile=$logfile.$timestamp
mv $logfile $newlogfile
kill -USR1 `cat /var/run/nginx.pid` ##nginx will re-open its logs in response to the USR1 signal.##
sleep 1
gzip -f -9 $newlogfile
mv /var/log/nginx/access.*.gz /var/log/nginx/archive
rm -rf $newlogfile
### Archiving Nginx error log ###
#!/bin/bash
logfile=/var/log/nginx/error.log
if [ ! -f $logfile ]; then
 echo "log file not found $logfile"
 exit 1
fi
timestamp=`date +%Y%m%d`
newlogfile=$logfile.$timestamp
mv $logfile $newlogfile
kill -USR1 `cat /var/run/nginx.pid` ##nginx will re-open its logs in response to the USR1 signal.##
gzip -f -9 $newlogfile
mv /var/log/nginx/error.*.gz /var/log/nginx/archive
rm -rf $newlogfile
exit
