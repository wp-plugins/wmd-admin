<?php
/**
 * @package WDM_Admin
 * @author Thomas Pelletier
 * @version 1.0
 */
/*
Plugin Name: WP WMD Admin
Plugin URI: http://bitbucket.org/Kizlum/wp-wmd-admin/
Description: Replace the Wordpress admin textarea with WMD.
Version: 1.0
Author: Thomas
Author URI: http://thomas.pelletier.im/

Copyright (c) 2010 Thomas Pelletier

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/

    require_once('wmd-admin-class.php');
    
    add_action('admin_footer', array(&$wmd_admin, 'add_admin_footer'));
    register_activation_hook(basename(dirname(__FILE__)).'/' . basename(__FILE__), array(&$markitup, 'activate'));
    register_deactivation_hook(basename(dirname(__FILE__)).'/' . basename(__FILE__), array(&$markitup, 'deactivate'));
?>