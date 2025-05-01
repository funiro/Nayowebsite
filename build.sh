#!/bin/bash

# Create dist directory
mkdir -p dist

# Copy HTML files
cp index.html events.html event-details.html dist/

# Copy CSS files
cp -r css dist/

# Copy JS files
cp -r js dist/

# Copy images
cp -r images dist/

# Copy PHP files
cp -r php dist/
