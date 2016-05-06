rm -rf blog; 
if [ ! -d newlubin.github.io ];then 
#    git clone git@newlubin.github.io:newlubin/newlubin.github.io.git blog; 
    git clone `php getGit.php` blog; 
fi; 

cd blog; 
cp ../../blogHtml/* ./ -rf; 

git add -A; 
git commit -m "sync blog"; 
git push origin master; 
