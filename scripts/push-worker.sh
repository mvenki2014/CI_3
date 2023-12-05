#!/bin/bash

source scripts/variables.sh

echo "Pushing worker and latest #$COMMIT"

docker push $REGISTRY_BASE_PATH/worker:$COMMIT
docker push $REGISTRY_BASE_PATH/worker:latest
