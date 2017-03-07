#!/usr/bin/env bash

commit=$1
if [ -z ${commit} ]; then
    commit=$(git tag | tail -n 1)
    if [ -z ${commit} ]; then
        commit="master";
    fi
fi

# Remove old release
rm -rf WbmViewportResizer WbmViewportResizer-*.zip

# Build new release
mkdir -p WbmViewportResizer
git archive ${commit} | tar -x -C WbmViewportResizer
composer install --no-dev -n -o -d WbmViewportResizer
zip -r WbmViewportResizer-${commit}.zip WbmViewportResizer