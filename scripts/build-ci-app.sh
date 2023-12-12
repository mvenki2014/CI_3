#!/bin/bash

source scripts/variables.sh

echo "Build and push ci-app #$COMMIT and latest"

if [ $REGISTRY_BASE_PATH == "localhost:5000" ]
then
		cd ci-app
    docker image build -f "Dockerfile" . \
      --build-arg "app_name=ci-app" \
      -t "$REGISTRY_BASE_PATH/ci-app:${COMMIT}" \
      -t "$REGISTRY_BASE_PATH/ci-app:latest"

		./scripts/push-ci-app.sh
else
   az acr build \
   		--image "$REGISTRY_BASE_PATH/ci-app:${COMMIT}" \
   		--image "$REGISTRY_BASE_PATH/ci-app:latest" \
   		--registry "$REGISTRY_BASE_PATH" ./ci-app/.
fi

cd ..
