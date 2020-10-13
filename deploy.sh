docker image build -t api -f Dockerfile.deploy .
docker save -o api-image.tar api:latest
gzip -f api-image.tar
scp api-image.tar.gz api:~
rm api-image.tar.gz
ssh api 'docker rm $(docker stop $(docker ps -a -q --filter ancestor=api:latest --format="{{.ID}}"))'
ssh api 'docker load -i api-image.tar.gz'
ssh api 'docker run --restart always --publish 80:80 --publish 443:443 --detach api:latest'
