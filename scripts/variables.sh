#!/bin/bash

COMMIT=$(git rev-parse --verify HEAD)

echo "Commit #$COMMIT"

if [ -z "${REGISTRY_BASE_PATH+x}" ]; then
  export REGISTRY_BASE_PATH="myregistry.azurecr.io"
else
  export REGISTRY_BASE_PATH="$REGISTRY_BASE_PATH"
fi
echo "REGISTRY_BASE_PATH: $REGISTRY_BASE_PATH"
