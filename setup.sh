$!bin/bash

declare -a domains=("alif.host")

if [ `whoami` = root ]; then
    echo "ERROR: Please dont run this script as root";
    exit 1
fi

if ! openssl &> /dev/null; then
    echo "ERROR: Please install OpenSSL on your machine";
    exit 1
fi

for i in "${domains[@]}"; do
    IFS='.' read -ra domain <<< "$i"
    echo "PROCESS: Doing certificate for $i"
    openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout ./docker/nginx/cert/${domain[0]}.key -out ./docker/nginx/cert/${domain[0]}.crt -subj "/CN=$i"
    echo "COMPLETE: Done certificate for $i"
done

docker-compose up -d