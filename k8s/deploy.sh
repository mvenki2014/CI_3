#!/bin/bash

cd k8s

COMMIT=$(git rev-parse --verify HEAD)

echo "Commit #$COMMIT"

if [ -z "${REGISTRY_BASE_PATH+x}" ]; then
  export REGISTRY_BASE_PATH="waazcr.azurecr.io"
else
  export REGISTRY_BASE_PATH="$REGISTRY_BASE_PATH"
fi
echo "REGISTRY_BASE_PATH: $REGISTRY_BASE_PATH"

cat ci-app.yaml | sed "s/{{COMMIT}}/$COMMIT/g" | sed "s/{{REGISTRY_BASE_PATH}}/$REGISTRY_BASE_PATH/g" | kubectl apply -f-
cat phpmyadmin.yaml | sed "s/{{COMMIT}}/$COMMIT/g" | sed "s/{{REGISTRY_BASE_PATH}}/$REGISTRY_BASE_PATH/g" | kubectl apply -f-
cat mysql-storage.yaml | sed "s/{{COMMIT}}/$COMMIT/g" | sed "s/{{REGISTRY_BASE_PATH}}/$REGISTRY_BASE_PATH/g" | kubectl apply -f-
cat mysql.yaml | sed "s/{{COMMIT}}/$COMMIT/g" | sed "s/{{REGISTRY_BASE_PATH}}/$REGISTRY_BASE_PATH/g" | kubectl apply -f-
