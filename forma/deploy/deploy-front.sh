#!/usr/bin/env bash

echo "NVM NPM NODE ANGULAR"

echo "INSTALL LATEST NVM"
git clone https://github.com/creationix/nvm.git ~/.nvm && cd ~/.nvm && git checkout `git describe --abbrev=0 --tags`
source ~/.nvm/nvm.sh
echo "source ~/.nvm/nvm.sh" >> ~/.bashrc

echo "INSTALL LATEST NODE NPM"
nvm install stable &> /dev/null
nvm alias default stable
source ~/.profile

echo "ANGULAR CLI!"
npm install -g @angular/cli
# https://docs.npmjs.com/getting-started/fixing-npm-permissions
# nvm use --delete-prefix v9.11.1 --silent