#!/bin/bash
#
# Test piping output through sed and overwriting lines
#

echo "Usage: $0 | sed '/^Filter.*/d'"

echo 'Filter this line'

echo -ne '#####                     (33%)\r'
sleep 1
echo -ne '#############             (66%)\r'
sleep 1
echo -ne '#######################   (100%)\r'
echo -ne '\n'
