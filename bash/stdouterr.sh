#!/bin/bash
#
# Test parsing stdout and stderr
#

function parse-stdouterr() {
    local name="$1"
    local handle=$2
    while IFS='' read -r line
    do
        echo -e "[ ${name}: ${line} ]" >&${handle}
    done
}

# Output some messages and attempt to parse them
(
    echo "1: Normal message"
    echo "2: Error" >&2
    echo "3: Normal message"
    echo "4: Error" >&2
) 2> >(parse-stdouterr "stderr" 2) > >(parse-stdouterr "stdout" 1)

