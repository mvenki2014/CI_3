#!/bin/bash

source scripts/variables.sh

echo "Build worker #$COMMIT and latest"

cd worker
docker image build -f "Dockerfile" . \
  --build-arg "app_name=worker" \
  -t "$REGISTRY_BASE_PATH/worker:${COMMIT}" \
  -t "$REGISTRY_BASE_PATH/worker:latest"
cd ..
