#!/bin/bash
#
# Test SIGPIPE error behavior
#
echo "Testing SIGPIPE behavior run with:"
echo
echo "  ./sigpipe.sh 2>&-"
echo
echo "Opening file X"
# Open file X ...
echo "Writing to stderr"
echo "An error" >2
echo "Closing file X"
# Close file X ...

