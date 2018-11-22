Localadmin module
=================

Finds admin users using `dscl` and `dsmemberutil`

The table provides the following information per 'item':

* id (int) Unique id
* serial_number (string) Serial Number
* users (string) List of admin users	   

The widget/report only shows computers that have more than one admin account.  This is assuming the first admin account is the default admin account for system administration so only those with 2 or more admins is interesting.

Configuration
-------------

Local Admin Threshold Value
This value specifies the minimum number of local admin accounts needed to
list the computer in the Local Admin Report.  Default is 2.
```
LOCALADMIN_THRESHOLD=2
```