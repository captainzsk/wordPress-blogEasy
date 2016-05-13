# 目的：自动执行脚本
git checkout master
git pull
 
# 先执行脚本，生成html文件
/usr/local/php/bin/php index.php

# 执行同步html至GitHub的脚本
cd crontab;sh auto.sh;
