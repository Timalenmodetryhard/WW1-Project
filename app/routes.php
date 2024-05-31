<?php
/**
 *  define routes with its controllers and actions 
 */
const routes = array(
    '/'             => array('BaseController', 'home'),
    '/information'             => array('BaseController', 'information'),
    '/testimony'             => array('BaseController', 'testimony'),
    '/booking'             => array('BaseController', 'booking'),
    '/helpandvolunteer'             => array('BaseController', 'helpandvolunteer'),
    '/volunteer'             => array('BaseController', 'volunteer'),
    '/praticalinfos'             => array('BaseController', 'praticalinfos'),
    '/giftshop'             => array('BaseController', 'giftshop'),
);
