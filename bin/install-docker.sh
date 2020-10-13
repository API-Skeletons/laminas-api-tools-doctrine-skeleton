##
# Configure Server
#
# This script is to be ran on a fresh ubuntu install to install Docker
##

apt-get update
apt-get install -y apt-transport-https ca-certificates curl \
    gnupg-agent software-properties-common
    
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | apt-key add -
add-apt-repository \
   "deb [arch=amd64] https://download.docker.com/linux/ubuntu \
   $(lsb_release -cs) \
   stable"
apt-get update
apt-get install -y docker-ce docker-ce-cli containerd.io docker-compose

apt -y install ruby ruby-dev
gem install docker-sync

apt-get install -y docker docker-compose
apt-get install -y mysql-client pv

service docker start

