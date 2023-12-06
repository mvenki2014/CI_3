#!/bin/bash

./scripts/build-ci-app.sh

./scripts/push-ci-app.sh

./k8s/deploy.sh
