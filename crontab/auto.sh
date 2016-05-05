if [ ! -d newlubin.github.io ];then
    git clone git@newlubin.github.io:newlubin/newlubin.github.io.git;
fi;

cd newlubin.github.io;
cp ../../blogHtml/* ./ -rf;

git add -A;
git commit -m "sync blog";
git push origin master;
