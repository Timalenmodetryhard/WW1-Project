<?php
/**
 *  define routes with its controllers and actions 
 */
const routes = array(
    '/'             => array('EventController', 'home'),
    '/information'             => array('BaseController', 'information'),
    '/testimony'             => array('BaseController', 'testimony'),
    '/booking'             => array('EventController', 'booking'),
    '/helpandvolunteer'             => array('BaseController', 'helpandvolunteer'),
    '/volunteer'             => array('BaseController', 'volunteer'),
    '/praticalinfos'             => array('BaseController', 'praticalinfos'),
    '/giftshop'             => array('GiftshopController', 'giftshop'),
);
