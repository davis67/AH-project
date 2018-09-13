
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import './off-canvas';
import './hoverable-collapse';
import './settings';
import './todolist';
import './dashboard';
import './fusioncharts';
import './fusioncharts.charts';
import './fusioncharts.theme.fint';
$(document).ready( function () {
    $('.examples').DataTable({
    	"pageLength": 5
    });
     $('.example').DataTable();
} );


