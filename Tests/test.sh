#!/bin/bash
#Test script
#Check yaml files
#Installation yamllint
sudo apt-get update
sudo apt-get install yamllint -y
clear

/usr/bin/yamllint -c /Tests/configyamllint.yml /var/InstallationApplicationAWS


#Check if apache is installed
service=apache2

if (( $(ps -ef | grep -v grep | grep $service | wc -l) > 0 ))
then
  echo "$service is running!"
else
  echo "$service is not running/installed!"
  echo "Stop test"
exit 1
fi

#Check if site is up
STATUS=$(curl -s -o /dev/null -w '%{http_code}' localhost)

if [ $STATUS -eq 200 ]; then
  echo "200-code, Application is running"
else
  echo "Got $STATUS"
  echo "Stop test"
  exit 1
fi

#Check if bucket is mounted
if grep -qs '/var/InstallationApplicationAWS/bucket' /proc/mounts; then
  echo "Bucket is mounted."
else
  echo "Bucket is not mounted."
  echo "Stop test"
  exit 1
fi

echo "Tests done"
exit 0


