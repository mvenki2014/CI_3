#!/bin/bash

source scripts/variables.sh

echo "Build and push ci-app #$COMMIT and latest"
#cd ci-app
#docker image build -f "Dockerfile" . \
#  --build-arg "app_name=ci-app" \
#  -t "$REGISTRY_BASE_PATH/ci-app:${COMMIT}" \
#  -t "$REGISTRY_BASE_PATH/ci-app:latest"

az acr build \
		--image "$REGISTRY_BASE_PATH/ci-app:${COMMIT}" \
		--image "$REGISTRY_BASE_PATH/ci-app:latest" \
		--registry "$REGISTRY_BASE_PATH" ./ci-app/.

cd ..
