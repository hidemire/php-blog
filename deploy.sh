#!/bin/bash -xe 

echo "Deploy"
echo ""

echo "Build docker image"
docker build -t hidemire/php-blog:latest .
echo "Done !!!"

echo "Push docker image"
docker push hidemire/php-blog:latest
echo "Done !!!"

echo "Helm upgrade"
helm upgrade -i app-php ./helm/app-chart
echo "Done !!!"
