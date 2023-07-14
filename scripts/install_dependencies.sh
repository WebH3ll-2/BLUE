#!/bin/bash
# install apache if not already installed
if [ $(dpkg-query -W -f='${Status}' apache2 2>/dev/null | grep -c "ok installed") -eq 0 ];
then
  apt-get install apache2;
fi
