#!/usr/bin/env python

import cgi
import cgitb
import os

# debugging
cgitb.enable()

print("Content-Type: text/html; charset=UTF-8")
print("")

try:
        print(os.environ["REQUEST_METHOD"]);
except KeyError:
        pass
print("hello");
