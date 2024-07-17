## Making composer.json file for composer package manager which is similar to npm package manager in nodejs. Adding details in it like project name, description, author name and email, autoload specification including it's type and namespaces defined
## Downloading and installing composer after selecting php file from 'C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64' as default path. This video helped with it 'https://www.youtube.com/watch?v=R2fWIvCDi_M' 
## Restarting visual studio then in terminal cmd, running command 'composer' to see if it's installed then run 'composer install' to install. A composer.lock file and vendor folder will be created which'll include things we'll install from composer


## In public/index.php on most top, will require autoload.php from directory/vendor. Will comment out old custom autoloader
## Won't work for now since namespaces defined in composer.json doesn't hold any meaning until it's library is installed