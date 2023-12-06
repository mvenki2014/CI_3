#!/bin/bash

generate_random_string() {
    local length=$1
    if [ -z "$length" ]; then
        length=12  # default length if not specified
    fi

    # Generate random bytes and convert to base64
    random_bytes=$(openssl rand -base64 $((length * 3 / 4)) | tr -d '=' | tr -d '+/')

    # Print the desired length of the random string
    echo "${random_bytes:0:length}"
}

#COMMIT=$(git rev-parse --verify HEAD)
COMMIT=$(generate_random_string 16)

echo "Commit #$COMMIT"

if [ -z "${REGISTRY_BASE_PATH+x}" ]; then
  export REGISTRY_BASE_PATH="public.ecr.aws/q3b8h4t9"
else
  export REGISTRY_BASE_PATH="$REGISTRY_BASE_PATH"
fi
echo "REGISTRY_BASE_PATH: $REGISTRY_BASE_PATH"
