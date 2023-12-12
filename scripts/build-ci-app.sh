#!/bin/bash

source scripts/variables.sh

echo "Build and push ci-app #$COMMIT and latest"
cd ci-app
#docker image build -f "Dockerfile" . \
#  --build-arg "app_name=ci-app" \
#  -t "$REGISTRY_BASE_PATH/ci-app:${COMMIT}" \
#  -t "$REGISTRY_BASE_PATH/ci-app:latest"


az acr build --file "Dockerfile" \
  --build-arg "app_name=ci-app" \
  --image "$REGISTRY_BASE_PATH/ci-app:${COMMIT}" \
  --image "$REGISTRY_BASE_PATH/ci-app:latest" \
  --registry waazcr \

cd ..
