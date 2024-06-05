<?php
/**
 *  define routes with its controllers and actions 
 */
const routes = array(
    '/'             => array('eventController', 'home'),
    '/information'             => array('baseController', 'information'),
    '/testimony'             => array('baseController', 'testimony'),
    '/booking'             => array('eventController', 'booking'),
    '/helpandvolunteer'             => array('baseController', 'helpandvolunteer'),
    '/volunteer'             => array('baseController', 'volunteer'),
    '/praticalinfos'             => array('baseController', 'praticalinfos'),
    '/giftshop'             => array('giftshopController', 'giftshop'),
);
