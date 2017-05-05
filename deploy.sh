#!/bin/bash
echo "== deploiment =="

HTDOCS_DIR=/opt/lampp/htdocs/eleves/msf

rm -rf $HTDOCS_DIR
mkdir $HTDOCS_DIR
cp -r ./ $HTDOCS_DIR

