#!/bin/bash
###########################
# switch to branch you want to use
# add all added/modified files
git add .
# commit changes
git commit -am "made changes"
git remote add origin git@github.com:Natawon/auto-push.git

# push to git remote repository
git push origin master
###########################
echo pushffd
read