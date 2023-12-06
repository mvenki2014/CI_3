#!/bin/bash

source scripts/variables.sh

echo "Build ci-app #$COMMIT and latest"
cd ci-app
docker image build -f "Dockerfile" . \
  --build-arg "app_name=ci-app" \
  -t "$REGISTRY_BASE_PATH/ci-app:${COMMIT}" \
  -t "$REGISTRY_BASE_PATH/ci-app:latest"

cd ..
