<?php
/**
 *  define routes with its controllers and actions 
 */
const routes = array(
    '/'             => array('BaseController', 'home'),
    '/information'             => array('BaseController', 'information'),
    '/testimony'             => array('BaseController', 'testimony'),
    '/visit'             => array('BaseController', 'booking'),
    '/helpandvolunteer'             => array('BaseController', 'helpandvolunteer'),
);
