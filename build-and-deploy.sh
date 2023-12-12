#!/bin/bash

./scripts/build-ci-app.sh

./k8s/deploy.sh
