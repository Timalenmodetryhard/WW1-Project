<?php
/**
 *  define routes with its controllers and actions 
 */
const routes = array(
    ''             => array('BaseController', 'home'),
    'giftshop'             => array('GiftshopController', 'giftshop'),
    'giftshop_add'             => array('GiftshopController', 'new_item'),
    'giftshop_edit'             => array('GiftshopController', 'edit_item'),
    'giftshop_delete'             => array('GiftshopController', 'delete_item'),
    'event_add'             => array('EventController', 'new_event'),
    'event_edit'             => array('EventController', 'edit_event'),
    'event_delete'             => array('EventController', 'delete_event'),
    'schedule_edit'             => array('ScheduleController', 'edit_day'),
);
