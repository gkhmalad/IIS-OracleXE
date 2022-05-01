# IIS-OracleXE

## About
This is a sample project. It works with IIS and Oracle database on Windows machines. It is a simple notetaking application that allows the creation of multiple users, and notes by these users. It is intended to demonstrate the use of stored procedures with the Oracle XE database.

## Specifications
- Windows 11 IIS
- Oracle Database XE 21c
- PHP 8 from IIS Web Platform Installer
- PHP Manager for enabling oci-8 (oracle database connection)
- Plain HTML

## Includes
- Files for the webiste to function
- DDL for the database

## Setting Up
IIS should be configured with PHP manager application form the web platform installer to allow oci-8 for PHP integration with Oracle database. PHP 8 should be installed from the web platform installer as well. The website uses a specific username/password combination which should be changed in all of the files where it is present. The database name and host should also be changed, in the default case the database is XE on localhost. After this everything should run as intended.
