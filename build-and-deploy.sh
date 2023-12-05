#!/bin/bash

./scripts/build-worker.sh

./scripts/push-worker.sh

./k8s/deploy.sh
