<?php

header('Content-type:text/css');
?>
body {
font-family: 'Open Sans', sans-serif !important;
font-weight: 400;
color: #808080;
font-size: 14px;
line-height: 24px;
position: relative;
letter-spacing:0.5px;
}
.d-none{
display: none;
}
.easy-autocomplete-container{
width: 250px !important;
}
#searchText{
margin-left: -11px;
width: 251px;
}
.show_div_product{
background-color:#26262638;
}
.borderless td, .borderless th, .borderless thead{
border: 1px solid #d4d4d400!important;
}
/*.table>thead>tr>th {
vertical-align: bottom;
border-bottom: 2px solid #d4d4d400;
}*/
#search_input{
padding-left:55px;width:240px;border:1px solid #f5f5f5;
font-size:13px;color:gray;
background-image:url('https://i47.tinypic.com/r02vbq.png');
background-repeat:no-repeat;
background-position:left center;outline:0;
}
.d-none{display:none;}
@keyframes hienralike{
from{opacity: 0;transform: translateX(-200px);}
to{opacity: 1;transform: translateX(0px);}
}
@keyframes hienraadd{
from{opacity: 0;transform: translateX(200px);}
to{opacity: 1;transform: translateX(0px);}
}
#cart-total {
background: url(<?php echo 'https://' . $_SERVER['HTTP_HOST']; ?>/app/webroot/img/cart.png) no-repeat;
padding: 4px 0 12px 60px;
float:left;
}
:focus {
outline: none !important;
}
h1, h2, h3, h4, h5, h6 {
color: #000;
}
/* default font size */
.fa {
font-size: 16px;
}
/* Override the bootstrap defaults */
.accordion {
width: 100%;
max-width: 1080px;
height: 250px;
overflow: hidden;
margin: 50px auto;
}
.accordion ul {
width: 100%;
display: table;
table-layout: fixed;
margin: 0;
padding: 0;
}
.accordion ul li {
display: table-cell;
vertical-align: bottom;
position: relative;
width: 16.666%;
height: 250px;
background-repeat: no-repeat;
background-position: center center;
transition: all 500ms ease;
}
.accordion ul li div {
display: block;
overflow: hidden;
width: 100%;
}
.accordion ul li div a {
display: block;
height: 250px;
width: 100%;
position: relative;
z-index: 3;
vertical-align: bottom;

box-sizing: border-box;
color: #fff;
text-decoration: none;
font-family: Open Sans, sans-serif;
transition: all 200ms ease;
}
.accordion ul li div a * {
opacity: 0;
margin: 0;
width: 100%;
text-overflow: ellipsis;
position: relative;
z-index: 5;
white-space: nowrap;
overflow: hidden;
-webkit-transform: translateX(-20px);
transform: translateX(-20px);
-webkit-transition: all 400ms ease;
transition: all 400ms ease;
}
.accordion ul li div a h2 {
font-family: Montserrat, sans-serif;
text-overflow: clip;
font-size: 24px;
text-transform: uppercase;
margin-bottom: 2px;
top: 160px;
color: white;
}
.accordion ul li div a p {
top: 160px;
font-size: 13.5px;
}
.accordion ul li:nth-child(1) {
background-image: url("../img/tab1.jpg");
}
.accordion ul li:nth-child(2) {
background-image: url("../img/tab2.jpg");
}
.accordion ul li:nth-child(3) {
background-image: url("../img/tab3.jpg");
}
.accordion ul li:nth-child(4) {
background-image: url("../img/tab4.jpg");
}
.accordion ul li:nth-child(5) {
background-image: url("../img/tab5.jpg");
}
.accordion ul li:nth-child(6) {
background-image: url("../img/tab6.jpg");
}
.accordion ul:hover li, .accordion ul:focus-within li {
width: 8%;
}
.accordion ul li:focus {
outline: none;
}
.accordion ul:hover li:hover,
.accordion ul li:focus, .accordion ul:focus-within li:focus {
width: 60%;
}
.accordion ul:hover li:hover a,
.accordion ul li:focus a, .accordion ul:focus-within li:focus a {
background: rgba(0, 0, 0, 0.4);
}
.accordion ul:hover li:hover a *,
.accordion ul li:focus a *, .accordion ul:focus-within li:focus a * {
opacity: 1;
-webkit-transform: translateX(0);
transform: translateX(0);
}
.accordion ul:hover li {
width: 8% !important;
}
.accordion ul:hover li a * {
opacity: 0 !important;
}
.accordion ul:hover li:hover {
width: 60% !important;
}
.accordion ul:hover li:hover a {
background: rgba(0, 0, 0, 0.4);
}
.accordion ul:hover li:hover a * {
opacity: 1 !important;
-webkit-transform: translateX(0);
transform: translateX(0);
}

@media screen and (max-width: 600px) {
body {
margin: 0;
}

.accordion {
height: auto;
}
.accordion ul li, .accordion ul li:hover, .accordion ul:hover li, .accordion ul:hover li:hover {
position: relative;
display: table;
table-layout: fixed;
width: 100%;
-webkit-transition: none;
transition: none;
}
}
h1 {
font-size: 18px;
}
h2 {
font-size: 16px;
}
h3 {
font-size: 15px;
}
h4 {
font-size: 14px;
}
h5 {
font-size: 13px;
}
h6 {
font-size: 12px;
}
ul li{list-style:none;}
a {
color: #000;
text-decoration: none;
}
a:hover {
text-decoration: none;
color: #ef8829;
}
legend {
font-size: 14px;
font-family: "Roboto",Arial,Helvetica,sans-serif;
text-transform: uppercase;
padding: 5px 0px 5px;
display: block;
width: 100%;
margin-bottom: 20px;
color: #666;
border: 0;
border-bottom: 1px solid #e5e5e5;
}
.mainbanner canvas {
height: 480px !important;
}
label {
font-size: 14px;
}
.box {
margin: 0 -10px;
}
select.form-control, textarea.form-control, input[type="text"].form-control, input[type="password"].form-control, input[type="datetime"].form-control, input[type="datetime-local"].form-control, input[type="date"].form-control, input[type="month"].form-control, input[type="time"].form-control, input[type="week"].form-control, input[type="number"].form-control, input[type="email"].form-control, input[type="url"].form-control, input[type="search"].form-control, input[type="tel"].form-control, input[type="color"].form-control {
font-size: 14px;
-moz-appearance: none;
appearance: none;
-webkit-appearance: none;
}
.input-group input, .input-group select, .input-group .dropdown-menu, .input-group .popover {
font-size: 12px;
}
.input-group .input-group-addon {
font-size: 12px;
height: 30px;
}
/* Fix some bootstrap issues */
span.hidden-xs, span.hidden-sm, span.hidden-md, span.hidden-lg {
display: inline;
}
.nav-tabs {
margin-bottom: 15px;
}
div.required .control-label:before {
content: '* ';
color: #F00;
font-weight: bold;
}
/* Gradient to all drop down menus */
.dropdown-menu li > a:hover {
text-decoration: none;
color: #ffffff;
background-color: #000;
background-image: linear-gradient(to bottom, #3b5998, #1f90bb);
background-repeat: repeat-x;
}
/* top */
.btn.btn-link.dropdown-toggle > img {
margin: 0 10px 2px 0;
}
#top .container {
padding: 0 20px;
}
#top #currency .currency-select {
text-align: left;
}
#top #currency .currency-select:hover {
text-shadow: none;
color: #ffffff;
background-color: #3b5998;
background-image: linear-gradient(to bottom, #3b5998, #1f90bb);
background-repeat: repeat-x;
}
#top .btn-link, #top-links a {
text-decoration: none;
padding: 5px 8px 0;
display: inline-block;
}
#wishlist-total {
color: #808080;
}
.dropdown a {
color: #808080 ;
}
#top-links li .fa {
font-size: 12px;
margin: 0 5px 0 0;
}
#top-links > li {
padding: 0 11px;
}
#top .btn-link:hover, #top-links a:hover {
color: #000 !important;
}
#top-links .dropdown-menu a {
text-shadow: none;
}
#top-links .dropdown-menu a:hover {
color: #FFF;
}
#top .btn-link strong {
font-size: 14px;
line-height: 14px;
}
#top-links {
float: none;
display: inline-block;
vertical-align: top;
}
#top-links ul {
margin: 0;
top: 38px;
float:left;
}
#top-links a + a {
margin-left: 15px;
}
/* CSS for Header Start */
header {
background-image:url(<?php echo 'https://' . $_SERVER['HTTP_HOST']; ?>/app/webroot/img/heaer-ptn.jpg);
}

.header-top {
background-color: rgba(0, 0, 0, 0.1);
}
.language .btn.btn-link.dropdown-toggle {
padding-left: 0;
}
.language, .currency {
float: left;
}

.respo-header-middle, .top-toggle {
display: none;
}
.header-inner {
text-align: center;
padding: 26px 0;
}
.header-inner .header-left,.header-inner .header-right {
padding: 0;
margin: 18px 0;
}
.header-inner .header-middle {
padding: 0;
display: inline-block;
float: none;
}
.header-inner .header-right {

float: right;
}
/* logo */
#logo {
margin: 0;
display: inline-block;
}
.shipping-img, .returns-img {
background: url(<?php echo 'https://' . $_SERVER['HTTP_HOST']; ?>/app/webroot/img/shipping.png) no-repeat scroll 0 -79px;
height: 41px;
width: 50px;
float: left;
}
.shipping {
text-align: left;
font-family: "Roboto",Arial,Helvetica,sans-serif;
padding: 0;
}
.shipping-text {
color: #000;
line-height:20px;
font-size: 17px;
overflow: hidden;
font-weight: 600;
}
.shipping-detail {
float: left;
clear: left;
font-size: 13px;
font-weight: normal;
color: #000;
}
/* search */
.header-right #search .input-lg {
height: 36px;
line-height: 20px;
border-radius: 0;
border: 0;
background-color: #fff;
width: 340px;
}

.header-right #search .btn-lg {
line-height: 21px;
padding: 5px 7px 6px 10px;
text-shadow: none;
background: #e7553f;
border-radius: 0;
border: 0;
color: #323131;
float: left;
margin: 3px;
}
.search-box {
float: left;
}
.search-box input.input-text {
border: 1px solid #ccc;
opacity: 0;
padding: 6px;
position: absolute;
right: 47px;
transition: all 0.4s ease 0s;
width: 0;
}

.search-box:hover input.input-text, .search-box input.input-text:focus {
opacity: 1;
width: 250px;
}
.search-btn {
background: transparent none repeat scroll 0 0;
margin: 5px;
z-index:99;
}

/* Cart */
#cart {
margin-bottom: 10px;
}
#cart > .btn {
font-size: 12px;
line-height: 18px;
color: #FFF;
}
#cart > .btn:hover .fa {
color: #666;
}
#cart .img-thumbnail {
max-width: none;
width: auto;
}
.header-right #cart > .btn {
font-size: 15px;
line-height: 18px;
color: #000;
background: none;
border: 0;
text-shadow: none;
padding: 8px 5px 10px;
margin: 0 auto;
width: auto;
text-align:left;
}
.header-right #cart {
float: right;
margin: 0;
}
.header-right #cart .dropdown-menu {
margin: 0;
}
.header-right .fa-caret-down {
padding: 0px 0px 0 10px;
color: #aaabab;
}
.header-right .fa-caret-down:hover {
color: #fff;
}
.header-right #search {
float: right;
clear: right;
margin: 0;
border: 1px solid #e5e5e5;
}
.header-right #search .btn-lg:hover .fa {
color: #666;
}
.cart-title {
font-size: 16px;
font-weight: 700;
}
#cart.open > .btn {
background-image: none;
background-color: #FFFFFF;
color: #666;
box-shadow: none;
text-shadow: none;
}
#cart.open > .btn:hover {
color: #444;
}
#cart .dropdown-menu {
background: #fff;
z-index: 1001;
}
#cart .dropdown-menu {
width: 300px;
padding: 10px;
}
#cart .dropdown-menu table {
margin-bottom: 10px;
}
#cart .dropdown-menu table.table-bordered, #cart .dropdown-menu table.table-bordered td, #cart .dropdown-menu table.table-striped td {
border: none;
padding: 4px;
vertical-align: top;
background: none;
}
#cart .dropdown-menu table.table-bordered {
border-top: 1px solid #ddd;
}
#cart .dropdown-menu table.table-striped .btn-danger {
padding: 0px 3px;
background: none;
border: none
}
#cart .dropdown-menu table.table-striped .btn-danger .fa, #cart .dropdown-menu table.table-striped .btn-danger:hover .fa {
font-size: 12px;
color: red;
}
@media (max-width: 478px) {
#cart .dropdown-menu li > div {
min-width: 100%;
}
}
#cart .dropdown-menu li p {
padding: 10px 0;
margin: 0;
}
#cart .btn-viewcart a, #cart .btn-checkout a {
color: #fff;
background: #ef8829;
display: inline-block;
padding: 6px 15px;
}
#cart .btn-viewcart a:hover, #cart .btn-checkout a:hover {
background: #000;
}
#cart strong {
font-weight: 500;
}
.header-contact {
display: inline-block;
}
.shipping{
margin: 10px 0;
}
.header-middle-top {
float: none;
display: inline-block;
width: 100%;
}
.header-middle-top .shipping {
border-left: 1px solid #ccc;
padding-left: 50px;
}
.header-middle-top .returns, .header-middle-top .shipping {
float: none;
display: inline-block;
}
.language .dropdown-menu {
left: 0;
margin: 0;
right: auto;
top: 38px;
text-align: left;
}
.currency .dropdown-menu {
left: 0;
margin: 0;
right: auto;
top: 38px;
text-align: left;
}
.language li a, .currency li .btn-link {
padding: 2px 10px;
}
.language li a:hover, .currency li .btn-link:hover {
color: #000;
}
.currency .btn-link {
text-align: left;
width: 100%;
}
.language .dropdown-menu li > a:hover {
background: none;
}
.currency .btn-link, .language .btn-link, .currency .btn-link:hover {
background: none;
text-decoration: none;
color:000;
}
.language .btn-link, .language .btn-link:active {
background-image: url(<?php echo 'https://' . $_SERVER['HTTP_HOST']; ?>/app/webroot/img/pipe.jpg);
background-position: right center;
background-repeat: no-repeat;
}
.currency .btn-link:hover, .language .btn-link:hover {
color: #000;
}
.header-middle-right .currency .btn-link, .header-middle-right .language .btn-link {
padding: 0;
margin: 6px 8px;
}
.currency .btn-link .fa, .language .btn-link .fa {
margin: 0 10px;
}

.header-middle-right .currency li .btn-block, .header-middle-right .language li a {
padding: 3px 5px;
display: inline-block;
width: 100%;
text-align: left;
margin: 0;
}
.header-middle-right .currency li .btn-block:hover, .header-middle-right .language li a:hover {
background: none;
color: #333;
}
.contact-top .telephone {
color: #cacaca;
font-weight: bold;
}
.contact-top > span {
color: #aaabab;
}
.contact-top {
padding: 8px 7px 0;
}
#top-links .dropdown-menu {
text-align: left;
}
#top-links .dropdown-menu li a {
padding: 3px 10px;
}
#top-links .dropdown-menu li a:hover {
background: none;
color: #333;
}
#top-links .dropdown.open .dropdown-toggle {
background: none;
}
/* CSS for Header End */


/* Menu */
#menu {
background: rgb(125, 180, 50);
background: -moz-linear-gradient(90deg, rgb(125, 180, 50) 100%, rgb(141, 196, 69) 0%);
background: -webkit-linear-gradient(90deg, rgb(125, 180, 50) 100%, rgb(141, 196, 69) 0%);
background: -o-linear-gradient(90deg, rgb(125, 180, 50) 100%, rgb(141, 196, 69) 0%);
background: -ms-linear-gradient(90deg, rgb(125, 180, 50) 100%, rgb(141, 196, 69) 0%);
background: linear-gradient(180deg, rgb(125, 180, 50) 100%, rgb(141, 196, 69) 0%); min-height: 56px;
border-radius: 0px;

}
#menu .nav > li > a {
color: #fff;
text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
padding: 10px 15px 10px 15px;
min-height: 15px;
background-color: transparent;
}
#menu .nav > li > a:hover, #menu .nav > li.open > a {
background-color: rgba(0, 0, 0, 0.1);
}
#menu .dropdown-menu {
padding-bottom: 0;
}
#menu .dropdown-inner {
display: table;
}
#menu .dropdown-inner ul {
display: table-cell;
}
#menu .dropdown-inner a {
min-width: 160px;
display: block;
padding: 3px 20px;
clear: both;
line-height: 20px;
color: #333333;
font-size: 12px;
}
#menu .dropdown-inner li a:hover {
color: #FFFFFF;
}
#menu .see-all {
display: block;
margin-top: 0.5em;
border-top: 1px solid #DDD;
padding: 3px 20px;
-webkit-border-radius: 0 0 4px 4px;
-moz-border-radius: 0 0 4px 4px;
border-radius: 0 0 3px 3px;
font-size: 12px;
}
#menu .see-all:hover, #menu .see-all:focus {
text-decoration: none;
color: #ffffff;
background-color: #3b5998;
background-image: linear-gradient(to bottom, #3b5998, #1f90bb);
background-repeat: repeat-x;
}
#menu #category {
float: left;
font-size: 16px;
line-height: 26px;
font-weight: 700;
color: #fff;
text-transform: uppercase;
}
#menu .btn-navbar .fa {
font-size: 24px;
line-height: 20px;
vertical-align: -4px;
}

#menu .btn-navbar {
font-size: 15px;
font-stretch: expanded;
color: #fff;
padding: 0;
float: right;
margin: 0;
background: none;
position: absolute;
top: 0;
left: 0;
right: 0;
text-align: right;
border: none;
width: 100%;
padding: 23px 0;
}
#menu .btn-navbar:hover, #menu .btn-navbar:focus, #menu .btn-navbar:active, #menu .btn-navbar.disabled, #menu .btn-navbar[disabled] {
}
.testimonial-desc{
margin: 0 0 10px;
}
@media (min-width: 768px) {
#menu .dropdown:hover .dropdown-menu {
display: block;
}
.header-inner .header-left,.header-inner .header-right {
padding: 0;
margin: 0;
}
}
@media (max-width: 767px) {
#menu div.dropdown-inner > ul.list-unstyled {
display: block;
}
#menu div.dropdown-menu {
margin-left: 0 !important;
padding-bottom: 10px;
background-color: rgba(0, 0, 0, 0.1);
}
#menu .dropdown-inner {
display: block;
}
#menu .dropdown-inner a {
width: 100%;
color: #fff;
}
#menu .dropdown-menu a:hover, #menu .dropdown-menu ul li a:hover {
background: rgba(0, 0, 0, 0.1);
}
#menu .see-all {
margin-top: 0;
border: none;
border-radius: 0;
color: #fff;
}

}


/* prlx start*/
.parallax {
background-image: url(<?php echo 'https://' . $_SERVER['HTTP_HOST']; ?>/app/webroot/img/prlx.jpg);
background-size: auto;
background-position: 50% 50%;
padding: 70px 0;
margin: 50px 0 20px;
text-align: center;
}

/*testimonial*/

#testimonial {
background: transparent none repeat scroll 0 0;
}
.testimonial-desc {
line-height: normal;
color: #404040;
margin: 0 190px 40PX;
font-size: 14px;
line-height: 24px;
}
.testimonial-name h2 {
font-size: 18px;
margin: 0;
}
.testimonial-name
{
margin-top: 20px;
}

#testimonial .owl-controls .owl-page {
padding: 3px;
border: 1px solid #000;
}
#testimonial .owl-controls .owl-page span {
background: #000;
height: 5px;
width: 5px;
}
#testimonial .owl-controls .owl-page.active span, #testimonial .owl-controls .owl-page span:hover {
background: #ef8829;
}
#testimonial .owl-controls .owl-page:hover, #testimonial .owl-controls .owl-page.active {
border: 1px solid #ef8829;
}
.home-slider .owl-controls .owl-page.active span {
cursor: default;
}
#testimonial .owl-pagination{
position: absolute;
top: 60px;
right: 20px;

}
#testimonial .owl-controls .owl-page{
margin: 10px 6px;
display: block;
}
/* testimonial end*/
/* prlx end*/


/* footer */

#footer_id {
background:#262626;
margin-top: 35px;
padding: 65px 0;
color: #aaabab;

}
.footer-bottom {
background: #6FB33B;
padding: 5px 0;
color: #fff;
}
.footer-bottom a {
float: left;
clear: both;
}
footer hr {
border-top: none;
border-bottom: 1px solid #666;
}
footer, footer a, .footer-bottom a {
color: #808080;
}
.footer-bottom a {
float: right;
margin-left: 0px;
}
footer a:hover {
color: #ef8829;
}
footer h5 {
font-family: "Roboto",Arial,Helvetica,sans-serif;
font-size: 18px;
color: #fff;
line-height:25px;
font-weight: 600;
}
footer ul {
margin: 15px 0 0;
padding: 0;
}
footer ul li {
padding: 1px 0;
}
.copyright a{
color:#fff;
}
/* alert */
.alert {
padding: 8px 14px 8px 14px;
}
/* breadcrumb */
.breadcrumb {
margin:20px 0;
padding: 10px 15px;
background: #F5F5F5;
}
.breadcrumb li a {
font-family: "Roboto",Arial,Helvetica,sans-serif;
color: #949494;
}
.breadcrumb li a:hover {
color: #333645;
}
.breadcrumb i {
font-size: 15px;
}
.breadcrumb > li {
text-shadow: 0 1px 0 #FFF;
position: relative;
white-space: nowrap;
}
.pagination {
margin: 0;
}
/* buttons */
.buttons {
margin: 1em 0;
}
.btn {
padding: 6px 10px;
font-size: 14px;
background: #454851;
}
.btn-xs {
font-size: 9px;
}
.btn-sm {
font-size: 10.2px;
}
.btn-lg {
padding: 6px 15px;
font-size: 12px;
}

.btn-group > .btn-xs {
font-size: 9px;
}
.btn-group > .btn-sm {
font-size: 10.2px;
}
.btn-group > .btn-lg {
font-size: 14px;
}
.btn-default {
background: #000;
color: white;
border: none;
}
.btn-primary {
color: #ffffff;
background: #ef8829;
border: none;
}
.btn-primary:hover, .btn-primary:active, .btn-primary.active, .btn-primary.disabled, .btn-primary[disabled] {
background: #000;
color: #ffffff;
}
.btn-warning {
color: #ffffff;
text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
background-color: #faa732;
background-image: linear-gradient(to bottom, #fbb450, #f89406);
background-repeat: repeat-x;
}
.btn-warning:hover, .btn-warning:active, .btn-warning.active, .btn-warning.disabled, .btn-warning[disabled] {
box-shadow: inset 0 1000px 0 rgba(0, 0, 0, 0.1);
}
.btn-danger {
color: #ffffff;
background-color: #000;
border: none;
}
.btn-danger:hover, .btn-danger:active, .btn-danger.active, .btn-danger.disabled, .btn-danger[disabled] {
background-color: #ef8829;
}
.btn-success {
color: #ffffff;
background-color: #5bb75b;
}
.btn-info {
background: #39AAB0;
color: #fff;
}
.btn-info:hover, .btn-info:active, .btn-info.active, .btn-info.disabled, .btn-info[disabled] {
background: #454851;
color: #fff
}
/* list group */
#column-left .list-group a, #column-right .list-group a {
border-width: 0 0 1px;
border-style: solid;
border-color: #ddd;
padding: 5px 0;
}
#column-left .list-group a.last, #column-right .list-group a.last {
border: none;
}
.list-group a {
border: 1px solid #DDDDDD;
color: #404040;
padding: 8px 12px;
}
.list-group a.active, .list-group a.active:hover, .list-group a:hover {
color: #ef8829;
background: none;
border: none;
}
/* carousel */
.carousel-caption {
color: #FFFFFF;
text-shadow: 0 1px 0 #000000;
}
.carousel-control .icon-prev:before {
content: '\f053';
font-family: FontAwesome;
}
.carousel-control .icon-next:before {
content: '\f054';
font-family: FontAwesome;
}
/* product list */
.product-thumb {
margin: 0 10px 20px;
overflow: hidden;
}
.product-thumb .image {
text-align: center;
}
/*.product-thumb img.img-responsive{
min-height: 300px !important;
height: 300px !important;
max-height: 300px !important;
}*/
.product-thumb .image a {
display: block;
}
img.img-responsive {
width: 100%;
}
.product-thumb .image a:hover {
opacity: 0.8;
}
.product-grid .product-thumb .image {
float: none;
}
.product-list .product-thumb .image {
float: left;
background: #F5F5F5;
margin: 0 20px 0 0;
}
.product-thumb .product-name {
font-weight: 600;
margin: 10px 0 5px;
}
.product-list .product-thumb .product-name {
margin: 0 0 10px;
}
.product-list .product-desc {
margin: 0 0 10px;
}
.product-thumb .caption {
padding: 0;
}
.product-list .product-thumb .caption {
float: left;
padding: 0;
width:65%;
}
#content .product-list .product-thumb .product-price {
float: none;
margin: 0 0 10px;
}

.product-list .product-thumb .product-imageblock .button-group {
display: none;
}


#content .product-list .product-thumb .rating {
float: none;
display: inline-block;
margin: 0 0 10px;
}
.product-list .product-thumb {
margin: 0 0 20px;
padding: 0 0 20px;
border-width: 0 0 1px;
border-color: #ddd;
border-style: solid;
}
@media (max-width: 1200px) {
.product-grid .product-thumb .caption {
padding: 0 10px;

}

}
@media (max-width: 980px) {
.product-grid .product-thumb .caption {
padding: 0 10px;

}

}
@media (max-width: 767px) {
.product-list .product-thumb .caption {
min-height: 0;
margin-left: 0;
}
.product-grid .product-thumb .caption {
min-height: 0;
}
}
.product-thumb .rating {
}
.rating .fa-stack {
font-size: 8px;
vertical-align: 1px;
}
.rating .fa-star-o {
color: #999;
font-size: 15px;
}
.rating .fa-star {
color: #FC0;
font-size: 15px;
}
.rating .fa-star + .fa-star-o {
color: #E69500;
}
h2.price {
margin: 0;
}
.product-thumb .price {
color: #444;
font-weight:600;
font-size:16px;
}
#content .product-thumb .product-price {
float: left;
}
#content .product-thumb .rating {
float: right;
}
.product-thumb .price-new {
font-weight: 600;
}
.product-thumb .price-old {
color: #999;
font-size:13px;
font-weight:400;
text-decoration: line-through;
}
.product-thumb .price-tax {
color: #999;
font-size: 12px;
display: none;
}
.product-thumb .button-group {
background: none;
overflow: auto;
text-align: center;
}
.tab-content .product-grid .product-thumb > .button-group, #content .product-slider .product-thumb > .button-group, #content .product-grid .product-thumb > .button-group, .column-left .product-grid .product-thumb .product-imageblock .button-group, .column-right .product-grid .product-thumb .product-imageblock .button-group, .column-left .product-slider .product-thumb .product-imageblock .button-group, .column-right .product-slider .product-thumb .product-imageblock .button-group {
display: none;
}
#content .product-slider .product-thumb .product-imageblock .button-group, #content .product-grid .product-thumb .product-imageblock .button-group {
opacity: 0;
transition: all 0.3s ease;
-webkit-transition: all 0.3s ease;
-moz-transition: all 0.3s ease;
-ms-transition: all 0.3s ease;
-o-transition: all 0.3s ease;
position: absolute;
left: 0;
width: 100%;
bottom: -38px;
margin-bottom: 20px;

}
#content .product-thumb:hover .product-imageblock .button-group {
opacity: 1;
transition: all 0.3s ease;
-webkit-transition: all 0.3s ease;
-moz-transition: all 0.3s ease;
-ms-transition: all 0.3s ease;
-o-transition: all 0.3s ease;
bottom: 0px;
}
.product-slider .product-thumb .product-imageblock, #content .product-grid .product-thumb .product-imageblock {
position: relative;
overflow: hidden;
}
.product-list .product-thumb .button-group {
float: left;
}
#content .product-grid .product-grid-item {
padding: 0;
}
@media (max-width: 768px) {
.product-list .product-thumb .button-group {
border-left: none;
}
}
.product-thumb .button-group button {
width: 60%;
border: none;
display: inline-block;
background-color: #eee;
color: #888;
text-align: center;
}
.product-thumb .button-group button:hover {
color: #444;
background-color: #ddd;
text-decoration: none;
cursor: pointer;
}
.product-thumb .button-group .addtocart-btn {
background: #ef8829;
display: inline-block;
padding: 8px 17px;
font-weight:500;
float: none;
width: auto;
color: #ffffff;
margin:0 2px;
}
.product-thumb .button-group .addtocart-btn:hover {
background: #000;
color: #ffffff;
}
.product-thumb .button-group .wishlist, .product-thumb .button-group .compare {
height: 40px;
width: 40px;
background: #ef8829;
padding: 0;
}
.product-thumb .button-group .wishlist:hover, .product-thumb .button-group .compare:hover {
background: #000;
}

.product-thumb .button-group .wishlist .fa, .product-thumb .button-group .compare .fa {
color: #ffffff;
}
@media (max-width: 1200px) {
.product-thumb .button-group button, .product-thumb .button-group button + button {
width: 33.33%;
}
.testimonial-desc{
margin: 0 50px 10px;
}
}
@media (max-width: 767px) {
.product-thumb .button-group button, .product-thumb .button-group button + button {
width: 33.33%;
}
.testimonial-desc{
margin: 0 50px 10px;
}
}
.thumbnails {
clear: both;
list-style: none;
padding: 0;
margin: 0;
}
.thumbnails > img {
width: 100%;
}
.image-additional a {
margin-bottom: 20px;
display: block;
border: 1px solid #ddd;
}
.image-additional {
max-width: 78px;
}
.thumbnails .image-additional {
display: inline-block;
}
#product-thumbnail .item {
text-align: center;
}

/* fixed colum left + content + right*/
@media (min-width: 768px) {
#column-left .product-layout .col-md-3 {
width: 100%;
}
#column-left + #content .product-layout .col-md-3 {
width: 50%;
}
#column-left + #content + #column-right .product-layout .col-md-3 {
width: 100%;
}
#content + #column-right .product-layout .col-md-3 {
width: 100%;
}
}
.qty-label {
float: left;
margin: 5px 5px 5px 0;
}
.productpage-qty {
width: 50px;
}
.productpage-title {
font-weight: bold;
}
.product-slider.owl-carousel {
border: none;
box-shadow: none;
border-radius: 0;
margin-bottom: 0;
overflow: visible;
}
#content .blog-wrapper .owl-buttons, .product-slider.owl-carousel .owl-buttons {
position: absolute;
top: -60px;
width: 100%;
}
.product-slider.owl-carousel .owl-buttons div {
opacity: 1;
font-size: 0;
}
.product-slider.owl-carousel .owl-buttons > div {
background: url(<?php echo 'https://' . $_SERVER['HTTP_HOST']; ?>/app/webroot/img/sprite.png) no-repeat 0 0;
height: 20px;
width: 20px
}
#content .blog-wrapper .owl-buttons > div.owl-next, .product-slider.owl-carousel .owl-buttons > div.owl-next {
border:1px solid #ddd;
background-position: -11px -101px;
right: 10px;
left: auto;
height: 35px;
width: 35px;
opacity: 1;
}
#content .blog-wrapper .owl-buttons > div.owl-next:hover, .product-slider.owl-carousel .owl-buttons > div.owl-next:hover {
background-position: -11px -136px;
border-color: #ef8829;
}
#content .blog-wrapper .owl-buttons > div.owl-prev, .product-slider.owl-carousel .owl-buttons > div.owl-prev {
border:1px solid #ddd;
background-position: -13px -33px;
left: auto;
right: 50px;
height: 35px;
width: 35px;
opacity: 1;
}
#content .blog-wrapper .owl-buttons > div.owl-prev:hover, .product-slider.owl-carousel .owl-buttons > div.owl-prev:hover {
background-position: -13px -67px;
border-color: #ef8829;
}
.col-2 #product-thumbnail.owl-carousel {
width: 460px;
}
.col-3 #product-thumbnail.owl-carousel {
width: 330px;
}
#product-thumbnail.owl-carousel {
border: none;
box-shadow: none;
border-radius: 0;
margin: 0 auto;
width: 700px;
}
#product-thumbnail.owl-carousel .owl-buttons {
position: absolute;
top: 40%;
width: 100%;
}
#product-thumbnail.owl-carousel .owl-buttons div {
opacity: 0;
font-size: 0;
height: 20px;
width: 15px;
}
#product-thumbnail.owl-carousel:hover .owl-buttons div {
opacity: 1;
}
#product-thumbnail.owl-carousel .owl-buttons > div:before {
font-family: 'FontAwesome';
font-size: 25px;
font-weight: normal;
padding: 0 7px;
border: 1px solid #ddd;
color: #ddd;
}
#product-thumbnail.owl-carousel .owl-buttons > div.owl-next:before {
content: '\f105';
}
#product-thumbnail.owl-carousel .owl-buttons > div.owl-prev:before {
content: '\f104';
}
#product-thumbnail.owl-carousel .owl-buttons > div.owl-next:hover:before, #product-thumbnail.owl-carousel .owl-buttons > div.owl-prev:hover:before {
color: #ef8829;
border-color: #ef8829;
}
#product-thumbnail.owl-carousel .owl-buttons .owl-next, #product-thumbnail.owl-carousel:hover .owl-buttons .owl-next {
right: 0;
left: auto;
}
#product-thumbnail.owl-carousel .owl-buttons .owl-prev, #product-thumbnail.owl-carousel:hover .owl-buttons .owl-prev {
left: 0;
}
#product-thumbnail.owl-carousel .image-additional a {
margin-bottom: 0;
}
/* CSS for Custom Tab */
.customtab-wrapper {
border-bottom: 1px solid #e5e5e5;
display: inline-block;
vertical-align: top;
margin:58px 0 25px;
width: 100%;
}
.customtab-wrapper ul {
margin: 0;
}
.customtab .tab {
float: left;
list-style-type: none;
margin:0 10px -1px 0;
}
.tab a {
padding: 10px 15px;
display: inline-block;
/*font-family: "Roboto",Arial,Helvetica,sans-serif;*/
font-size: 20px;
font-weight: 500;
margin: 0 3px 0 0;
border:1px solid #ddd;

}

.tab a.selected, .tab a:hover {
background: #EF8829;
color: #fff;
border-color:#EF8829;
}
.customtab-inner {
padding: 0;
}
.customtab .product-slider.owl-carousel .owl-buttons {
top: -60px;
}
/* CSS for Menu start */
.navbar{
border:none;
}
.main-navigation > li {
display: inline-block;
list-style-type: none;
position: relative;
margin-top:3px;
}

.main-navigation > li:first-child{
background:none;

}
/* CSS for Menu level-1 */
.main-navigation li a {
color: #fff;
font-size: 16px;
font-weight: 400;
letter-spacing: 0.5px;
}
.main-navigation li li a {
font-family: "Roboto",Arial,Helvetica,sans-serif;
font-size: 14px;
font-weight: 200;
text-shadow: 0px 0px;
}
.main-navigation li a:hover,.main-navigation li a:active {
color: #fff;
background: #6ea22b none repeat scroll 0 0;
}
.main-navigation li > a {
font-weight: 500;
padding: 25px;
position: relative;
text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
text-transform: uppercase;
}

ul.main-navigation {
display: inline-block;
width: 100%;
padding: 20px 0;
margin: 0;
vertical-align: top;
text-align: center;
}
.main-navigation li ul {
position: absolute;
left: 0;
top: 45px;
padding: 0;
background: #6EA22B;
z-index: 9;
width: 220px;
text-align: left;
display: none;


}
.main-navigation li:hover > ul {
display: block;
}
.main-navigation li:hover > ul:hover .main-navigation li > a {

color: #fff;
background: #6EA22B;

}
/* CSS for Menu level-2 */

.main-navigation li li a {
color: #fff;
display: block;
padding: 10px 25px;
background: #6ea22b;
text-transform: capitalize;
}
.main-navigation li li a:hover {
color: #fff;
background: #8dc73d;
}
.main-navigation li ul ul {
left: 220px;
display: none;
top: 0;
}
.main-navigation li.last-menu ul ul {
left: auto;
right: 220px;
}
ul.main-navigation > li.menu-last ul {
left: auto;
right: 0;
}
ul.main-navigation > li.menu-last ul ul {
left: auto;
right: 220px;
}
.main-navigation li li {
display: inline-block;
list-style-type: none;
width: 100%;
position: relative;
transition: 200ms;
-moz-transition: 200ms;
-webkit-transition: 200ms;
-o-transition: 200ms;
}
.main-navigation li li:hover {
background: #ef8829;
transition: 300ms;
-moz-transition: 300ms;
-webkit-transition: 300ms;
-o-transition: 300ms;
}
.main-navigation li li:hover > a {
color: #fff;
}
/* CSS for Menu end */




/* CSS for sidebar product block start */

.column-left .product-grid .product-grid-item, .column-right .product-grid .product-grid-item {
width: 100%;
padding: 0;
}
.column-left .product-grid .wishlist, .column-left .product-grid .compare, .column-right .product-grid .wishlist, .column-right .product-grid .compare, .column-left .product-grid .price-tax, .column-right .product-grid .price-tax, .column-left .product-slider .wishlist, .column-left .product-slider .compare, .column-right .product-slider .wishlist, .column-right .product-slider .compare, .column-left .product-slider .price-tax, .column-right .product-slider .price-tax {
display: none;
}
.column-left .product-grid .product-imageblock, .column-right .product-grid .product-imageblock, .column-left .product-slider .product-imageblock, .column-right .product-slider .product-imageblock {
float: left;
margin: 0 15px 0 0;
min-height: 70px;
}
.column-left .columnblock-title, .column-right .columnblock-title {
font-size: 18px;
background: #ef8829;
color: #fff;
margin: 0;
padding: 13px 20px 11px;
font-weight: 500;
text-transform:uppercase;
}
.filter-block .btn-primary{
float: none;
}
#column-left .blog .blog-heading h3, #column-right .blog .blog-heading h3, .column-left .productblock-title, .column-right .productblock-title, .column-left .cms-title, .column-right .cms-title {
font-size: 18px;
background: #000;
color: #fff;
margin: 0;
padding: 13px 20px 11px;
}
.column-left .product-grid .product-imageblock > a, .column-right .product-grid .product-imageblock > a, .column-left .product-slider .product-imageblock > a, .column-right .product-slider .product-imageblock > a {
border: 1px solid #ddd;
display: inline-block;
}
.column-left .product-grid .product-thumb, .column-right .product-grid .product-thumb, .column-left .product-slider .product-thumb, .column-right .product-slider .product-thumb {
margin: 0 0 20px;
border: none;
padding: 0 0 10px;
border-bottom: 1px solid #D9D9D9;
}
.column-left .product-grid .last .product-thumb, .column-right .last .product-grid .product-thumb, .column-left .product-slider .last .product-thumb, .column-right .last .product-slider .product-thumb {
margin: 0;
padding: 0;
border: none;
}
.column-left .product-grid .caption.product-detail, .column-right .product-grid .caption.product-detail, .column-left .product-slider .caption.product-detail, .column-right .product-slider .caption.product-detail {
float: left;
padding: 0;
width: 55%;
}
.column-left .product-grid .button-group, .column-right .product-grid .button-group, .column-left .product-slider .button-group, .column-right .product-slider .button-group {
float: left;
margin: 0;
background: none;
border: 0;
}
.column-left .product-grid .button-group .addtocart-btn, .column-right .product-grid .button-group .addtocart-btn, .column-left .product-slider .button-group .addtocart-btn, .column-right .product-slider .button-group .addtocart-btn {
background: none;
border: 0;
width: auto;
padding: 0;
line-height: 22px;
font-weight: normal;
text-transform: capitalize;
color: #666666;
}
.column-left .product-grid .button-group .addtocart-btn:hover, .column-right .product-grid .button-group .addtocart-btn:hover {
color: #ef8829;
}
.column-left .product-grid .product-price, .column-right .product-grid .product-price, .column-left .product-slider .product-price, .column-right .product-slider .product-price {
margin: 0;
color: #404040;
}
.column-left .product-slider.owl-carousel, .column-right .product-slider.owl-carousel {
display: block;
}
.column-left .product-grid, .column-right .product-grid, .column-left .product-slider.owl-carousel, .column-right .product-slider.owl-carousel {
border: 1px solid #ddd;
margin: 0 0 20px;
padding: 20px;
}
.column-left .product-grid .product-detail .product-name, .column-right .product-grid .product-detail .product-name, .column-left .product-slider .product-detail .product-name, .column-right .product-slider .product-detail .product-name {
margin: 0;
padding: 0 0 5px 0;
font-weight: normal;
}
/* CSS for sidebar product block end */

.column-left .list-group, .column-right .list-group {
margin: 0 0 20px;
}
/* CSS for Testimonial Start */
.testimonial.owl-carousel {
border-radius: 0;
border: 1px solid #ddd;
background: #F5F5F5;
margin: 0 0 20px;
box-shadow: none;
-webkit-box-shadow: none;
-moz-box-shadow: none;
}
.testimonial .owl-pagination {
top: -15px;
}
.testimonial-item {
padding: 20px 20px;
text-align: center;
}
.testimonial .owl-controls .owl-page span {
border-radius: 0;
height: 6px;
width: 6px;
}
.testimonial .owl-controls .owl-page.active span {
background: #39abb0;
}
.testimonial-item .test-name {
width: 100%;
display: inline-block;
margin: 10px 0 0;
text-align: center;
color: #000000;
}
.testimonial-item .test-desig {
width: 100%;
display: inline-block;
font-size: 11px;
text-transform: uppercase;
color: #39abb0;
font-style: italic;
text-align: center;
}
.testimonial-item .test-desc {
display: inline-block;
width: 100%;
margin: 10px 0;
font-style: italic;
line-height: 18px;
}
.testimonial-item .test-image img {
width: 100%;
}
/* CSS for Testimonial End */

/* CSS for content Start */
.col-2 #content{width:80%;}

#column-left, .single-blog #column-right, .blog #column-right {
width: 20%;
}
.category_block, .filter-block, .account-block, .affiliate-block, .information-block {
padding: 10px 20px 20px;;
border-width: 0 1px 1px;
border-color: #D8D9D9;
border-style: solid;
}
.column-block {
margin: 0 0 20px;
}
.category_block ul {
padding: 0;
margin: 0;
}
.category_block ul ul {
padding: 0 0 0 15px;
}
.category_block ul li {
list-style-type: none;
padding: 5px 0;
border-bottom: 1px solid #ddd;
}
.category_block ul li:last-child {
border-bottom: none;
}
.category_block ul li a.list-group-item {
display: inline-block;
border: none;
padding: 5px 0;
width: 100%;
}
.category_block .list-group-item:hover {
background: none;
}
.information-block ul li {
padding: 5px 0;
border-width: 0 0 1px;
border-style: solid;
border-color: #ddd;
}
.category_block .hitarea {
float: right;
border: solid black;
border-width: 0 3px 3px 0;
transform: rotate(-135deg);
-webkit-transform: rotate(-135deg);
cursor: pointer;
}
.category_block .hitarea.expandable-hitarea {
height: 13px;
width: 13px;
z-index: 9;
text-align: center;
cursor: pointer;
position: static;
border: solid black;
border-width: 0 3px 3px 0;
transform: rotate(45deg);
-webkit-transform: rotate(45deg);
}
.category_block .hitarea.collapsable-hitarea {
height: 13px;
width: 13px;
z-index: 9;
text-align: center;
cursor: pointer;
position: static;
}
/*.category_block .hitarea.expandable-hitarea:before {
font-family: 'FontAwesome';
content: '\f067';
color: #999999;
font-weight: normal;
font-size: 10px;
vertical-align: top;
}*/
/*.category_block .hitarea.collapsable-hitarea:before {
font-family: 'FontAwesome';
content: '\f068';
color: #999999;
font-weight: normal;
font-size: 10px;
vertical-align: top;
}*/
.filter-block .list-group a {
padding: 5px 0;
border-style: solid;
border-width: 0 0 1px;
border-color: #ddd;
}
.panel-default.filter {
border: none;
}
.filter .panel-footer {
padding: 0;
}
.filter-block .checkbox {
margin: 6px 0;
font-weight: normal;
}
.filter-block .checkbox:hover {
color: #ef8829;
}
.product-thumb .product-name a {
font-size: 15px;
color: #404040;
font-weight: normal;
}
.product-list .product-thumb .product-name a {
font-size: 15px;
}
.product-thumb:hover .product-name a {
color: #000;
}
.product-grid .product-desc {
display: none;
}
.category-title {
text-transform: uppercase;
}
.category-banner .img-thumbnail {
border: none;
padding: 0;
}
.category-banner .category-desc {
margin: 20px 0;
}
.category-page-wrapper {
border-bottom: 1px solid #D9D9D9;
display: inline-block;
padding: 5px 0;
width: 100%;
}
.list-grid-wrapper {
float: left;
padding: 0;
width: auto;
}
.page-wrapper, .sort-wrapper {
float: right;
padding: 0;
margin: 5px 0 0;
}
.category-page-wrapper .control-label {
float: left;
margin: 1px 10px;
}
.limit, .sort-inner {
float: left;
}
/*.limit::before, .sort-inner:before {
content: "\f107";
font-family: fontawesome;
position: absolute;
right: 10px;
top: 2px;
}*/
.page-wrapper {
width: auto;
padding: 0;
}
#input-sort:before {
content: "\f054";
font-family: "Fontawesome";
}
.sort-wrapper {
width: auto;
margin: 5px 10px 0 0;
padding: 0 0px 0 0;
border: none;
}
.pagination-inner {
float: right;
}
.result-inner {
float: left;
margin: 10px;
}
.grid-list-wrapper .product-grid {
padding: 0;
}
.grid-list-wrapper {
margin: 15px -10px;
}
.btn-list-grid #list-view, .btn-list-grid #grid-view {
background: none;
padding: 6px 15px 0 0;
}
.btn-list-grid #list-view .fa, .btn-list-grid #grid-view .fa {
color: #999;
font-size: 18px;
}
.btn-list-grid #list-view.active .fa, .btn-list-grid #grid-view.active .fa, .btn-list-grid #list-view:hover .fa, .btn-list-grid #grid-view:hover .fa {
color: #ef8829;
}
.category-page-wrapper .form-control {
padding: 0;
height: 28px;
border: 1px solid #eee;
}
.category-page-wrapper .page-wrapper .form-control {
width: 60px;
padding:0 0 0 10px;
}
.category-page-wrapper .sort-wrapper .form-control {
width: 140px;
padding:0 10px;
}
.productblock-title, #content .blog-heading h3{
font-size: 20px;
clear: both;
margin: 28px 0 25px;
display: inline-block;
width: 100%;
padding: 12px 0;
border-bottom: 1px solid #e5e5e5;
font-weight: 500;
text-transform:uppercase;
}
#column-left .productblock-title{
border-bottom: 1px solid #000;
}

#column-left .banner {
float: left;
margin: 0 0 30px;
}

div#subbanner4 {
float: left;
margin: 0 0 36px;
overflow: hidden;
}
div#subbanner5 {
float: right;
margin: 0 0 30px;
overflow: hidden;
}
.brand-logo.owl-carousel {
box-shadow: none;
margin-bottom: 15px;
border: none;
}
.brand-logo.owl-carousel .img-responsive {
display: inline-block;
}
.box .img-responsive{
min-height: 350px !important;
height: 350px !important;
max-height: 350px !important;
object-fit: cover;
}
#product .addtocart {
margin: 0 10px;
}
span.review-count, span.review-edit {
margin: 0px 5px;
display: inline-block;
}
.rating.product .fa-stack {
vertical-align: 1px;
}
.productinfo-tab {
margin: 25px 0 25px;
}
.nav-tabs {
padding: 0;
margin: 0;
}
.productinfo-tab .tab-content {
padding: 25px;
border-width: 1px 0 0;
border-style: solid;
border-color: #ddd;
overflow: hidden;
}
.label-title {
font-weight: bold;
margin: 0 5px 0 0;
}
.productinfo-details-top, .productinfo-details-bottom {
line-height: 25px;
overflow: hidden;
}
#input-quantity {
float: left;
margin-right: 10px;
}
#product {
clear: both;
margin-top: 25px;
}

.product .product_info li label {
font-weight: bold;
width: 85px;
}
.product .product_info li span {
font-weight: normal;
margin-left: 20px;
}
.productinfo-special, .productpage-price {
font-size: 15px;
color: #000;
font-weight: bold;
}
#product {
clear: both;
}
.brand-block {
margin: 0 0 20px;
}
.brandproduct-title {
background: #f1f1f1;
padding: 8px;
}

.box-block {
border: 1px solid #ddd;
padding: 10px;
background: #F5F5F5;
margin: 0 0 10px;
}
/* CSS for content End */

/* CSS for CMS-Banner Start */
.cms_banner {
display: inline-block;
margin-bottom: 15px;
}
.md2 {
margin-top: 20px;
}
/* CSS for CMS-Banner End */

.fa-stack {
width: 9px;
height: 10px;
}
.rating .fa-star + .fa-star-o, .productinfo-tab .fa-star + .fa-star-o {
color: #ef8829;
}
.rating .fa-star-o {
color: #000;
}
.rating .fa-star {
color: transparent;
line-height: 20px;
}
.rating .fa-star-o {
font-size: 11px;
}
#scrollup {
background: url(<?php echo 'https://' . $_SERVER['HTTP_HOST']; ?>/app/webroot/img/scroll.png) no-repeat;
width: 50px;
height: 80px;
position: fixed;
bottom: 20px;
right: 20px;
display: none;
text-indent: -9999px;
cursor: pointer;
z-index: 9999;
}
/* CSS for Footer-Top CMS start */
.footer-top-cms {
display: inline-block;
width: 100%;
color: #aaabab;
border-bottom: 1px solid #808080;
padding: 0 0 45px;
margin: 0 0 30px 0;
}
.footer-logo {
float: left;
}
.footer-desc {
width: 710px;
display: inline-block;
margin: 0 0 0 50px;
}
.newslatter input {
height: 48px;
width: 390px !important;
border-color: #808080 ;
border-right: 0 none;
}
.newslatter .btn.btn-large.btn-primary {
padding: 12px 28px;
font-size:18px;
}
.footer-social {
float: right;
}
.newslatter h5,.footer-social h5 {
margin: 0 0 10px;
}
.footer-social ul {
padding: 0;
margin: 0;
}
.footer-social li {
float: left;
list-style-type: none;
margin: 0 8px 0 0;
}
.footer-social li a {
border: 1px solid #808080;
height: 48px;
width: 48px;
display: block;
text-align: center;
line-height: 50px;
color: white;
font-size: 35px;
}
.footer-social li a:hover {
border: 1px solid #ef8829;
color: #ef8829;
}
.footer-social li a .fa{
font-size:20px;
}
/* CSS for Footer-Top CMS end */

/* CSS for Footer-Top CMS start */
.footer-bottom-cms {
float: right;
width: auto;
margin: 9px 0 0;
}
.footer-bottom .copyright {
float: left;
margin:10px 0px;
}
/* CSS for Footer-Top CMS end */

/* CSS for Footer-Bottom CMS start */

.footer-payment ul {
margin: 0;
padding: 0;
}
.footer-payment li {
float: left;
margin: 0 5px 0 0;
list-style-type: none;
}
.footer-payment li:last-child {
margin: 0;
}
/* CSS for Footer-Bottom CMS end */

/* CSS for Footer-Right CMS start */
.footer-contact ul {
margin: 0;
padding: 0;
}
.footer-contact ul li {
list-style-type: none;
padding: 0
}
.footer-contact .fa {
margin: 0 5px 0 0;
float: left;
clear: both;
text-align:center;
line-height: 20px;
width: 15px;
}
.footer-contact .fa.fa-mobile {
font-size: 18px;
}
.footer-contact .fa.fa-map-marker {
font-size: 15px;
}
.footer-contact .fa.fa-envelope {
font-size: 11px;
}
.footer-contact span {
float: left;
}
/* CSS for Footer-Right CMS end */

/* CSS for Blog Start */
/* CSS for Blog Sidebar Start */
#column-left .blog .blog-heading, #column-right .blog .blog-heading {
padding: 0;
}
#column-left .blog .blog-inner, #column-right .blog .blog-inner {
border: 1px solid #ddd;
margin: 0 0 20px;
padding: 20px 20px;
background: #F5F5F5;
}
#column-left .blog-name h2, #column-right .blog-name h2 {
font-family: "Roboto",Arial,Helvetica,sans-serif;
font-size: 13px;
color: #1b1b1b;
text-transform: capitalize;
font-weight: normal;
margin: 0 0 5px;
}
#column-left .blog-name h2:hover, #column-right .blog-name h2:hover {
color: #ef8829;
}
#column-left .blog-image, #column-right .blog-image {
width: 70px;
height: auto;
margin: 0 15px 10px 0;
float: left
}
#column-left .blog-content, #column-right .blog-content {
overflow: hidden;
}
#column-left .blog-content .blog-desc, #column-left .blog-content .blog-more, #column-right .blog-content .blog-desc, #column-right .blog-content .blog-more {
display: none;
}
#column-left .blog-image img, #column-right .blog-image img {
width: 100%;
height: auto;
}
#column-left .blog-wrapper li, #column-right .blog-wrapper li {
margin: 0 0 20px;
padding: 0 0 10px;
border-bottom: 1px solid #D9D9D9;
width: 100%;
}
#column-left .blog-inner .seeall, #column-right .blog-inner .seeall {
margin: 0;
}
#column-left .blog-wrapper .blog-image .blog-date, #column-left .blog-wrapper .blog-image .blog-readmore, #column-left .blog-wrapper .blog-readmore, #column-right .blog-wrapper .blog-image .blog-date, #column-right .blog-wrapper .blog-image .blog-readmore, #column-right .blog-wrapper .blog-readmore {
display: none;
}
/* CSS for Blog Sidebar End */

/* CSS for Blog content Start */

#content .blog .blog-wrapper li {
padding: 0 10px 20px;
}

#content .blog-image img {
width: 100%;
height: auto;
}
#content .blog-wrapper .owl-buttons div, #content .blog-wrapper.owl-carousel:hover .owl-buttons div {
opacity: 1;
}
#content .blog-wrapper .owl-buttons > div {
background: url(<?php echo 'https://' . $_SERVER['HTTP_HOST']; ?>/app/webroot/img/sprite.png) no-repeat 0 0;
height: 20px;
width: 20px;
font-size: 0;
text-indent: -9999px;
}
#content .blog-wrapper .blog-name h2 {
margin: 15px 0 10px;
font-size:18px;
}
#content .blog-wrapper .blog-name h2:hover {
color: #ef8829;
}
#content .blog-wrapper .blog-image {
position: relative;
}
#content .blog-wrapper .blog-content {
text-align: left;
}
#content .blog-wrapper .blog-hover {
cursor: pointer;
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
background: rgba(0,0,0,0.5);
opacity: 0;
transition-duration: 500ms;
}
#content .blog-wrapper .item:hover .blog-hover {
opacity: 1;
transition-duration: 500ms;
}
#content .blog-wrapper .blog-readmore-outer {
position: absolute;
right: 0;
left: 0;
top: 45%;
text-align: center;
opacity: 0;
transition-duration: 500ms;
}
#content .blog-wrapper .item:hover .blog-readmore-outer {
opacity: 1;
font-weight:500;
transition-duration: 500ms;
}
#content .blog-wrapper .blog-readmore-outer .blog-readmore {
padding: 8px 15px;
background: #000000;
color: #fff;
}
#content .blog-wrapper .blog-image .blog-date {
padding: 7px 15px;
font-weight:500;
background: rgba(14, 16, 17, 0.5) none repeat scroll 0 0;
color: #ffffff;
position: absolute;
bottom: 0;
left: 0;
}
.blog_img > img {
max-width: 100%;
}
#content .blog-wrapper .blog-content .blog-date, #content .blog-wrapper .blog-content .blog-readmore {
display: none;
}
/* CSS for Blog content End */
/* CSS for Blog-List Start */
.blog-list-item {
margin: 0 0 20px;
}
.blog-list-item .blog-list-image img {
width: 100%;
height: auto;
}
.blog-list-item .blog-listname h2 {
margin: 20px 0 10px;
font-weight: bold;
}
.blog-list-item .blog-listname h2:hover {
color: #39AAB0;
}
.blog-list-image {
position: relative;
}
.blog-list-item .blog-list-image .blog-list-date {
padding: 7px 15px;
background: rgba(57, 170, 176, 0.5);
color: #ffffff;
position: absolute;
bottom: 0;
left: 0;
}
.blog-list-item .blog-list-image .blog-list-readmore {
position: absolute;
right: 0;
left: 0;
top: 45%;
text-align: center;
opacity: 0;
transition-duration: 500ms;
}
.blog-list-item:hover .blog-list-readmore {
opacity: 1;
transition-duration: 500ms;
}
.blog-list-item .blog-list-image .blog-list-readmore .readmore {
padding: 8px 15px;
background: #000000;
color: #fff;
}
.blog-list-item .blog-list-image .bloglist-hover {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
background: rgba(0,0,0,0.5);
opacity: 0;
transition-duration: 500ms;
}
.blog-list-item:hover .bloglist-hover {
opacity: 1;
transition-duration: 500ms;
}
/* CSS for Blog-List End */

/* CSS for Single-Blog-List Start */

.singleblog-desc {
margin: 20px 0;
}
.singleblog-image {
position: relative
}
.singleblog-image img {
max-width: 100%;
height: auto;
}
.singleblog-title {
margin: 10px 0 0;
font-weight: 600;
}
.single-blog-share {
margin: 0 0 10px;
}
.singleblog-date {
padding: 7px 15px;
background: rgba(57, 170, 176, 0.5);
color: #ffffff;
position: absolute;
bottom: 0;
left: 0;
}
.blog-comment .section-title {
padding-top: 20px;
}
/* CSS for Single-Blog-List End */

/* CSS for Blog end */

/* CSS for Blog List More Start */
#blogList li {
display: none;
}
.load-more-wrapper {
display: inline-block;
text-align;
text-align: center;
width: 100%;
}
.loadMore, .showLess {
display: inline-block;
color: #ffffff;
background: #39AAB0;
}
.loadMore:hover, .showLess:hover {
background: #454851;
}
#loadMore, #showLess {
color: #fff;
cursor: pointer;
padding: 6px 15px;
}
.none {
display: none;
}
.blog-meta > li {
float: left;
margin-right: 15px;
list-style: none;
}
.u-url {
color: #ef8829;
text-transform: capitalize;
}
.p-name {
font-weight: 600;
font-size: 16px;
line-height: 30px;

}
.blog {
margin-bottom: 40px;
padding-bottom:20px;
}
.blog-meta {
padding: 0;
width: 100%;
}
.p-summary {
clear: both;
}
.blog-meta li i {
margin: 0 5px 0 0;
}
input, button, select, textarea {
border: 1px solid #e5e5e5;
}
.section-title {
font-size: 16px;
font-weight: 600;
margin: 20px 0;
}
.blog_img {
height: 400px;
overflow: hidden;
}
.video.blog_img {
height: auto;
}
video {
width: 100%;
}
#commentform input {
width: 385px;
}
#submit {
background: #ef8829none repeat scroll 0 0;
height: 32px;
border: none;
color: #fff;
width: 100px;
text-transform: capitalize;
float: right;
background:#ef8829;
}
#submit:hover {
background-color: #000;
}
#commentform label {
margin-bottom: 30px;
vertical-align: top;
width: 200px;
}
.btn-list-grid {
float: left;
margin-right: 15px;
}
#compare-total {
margin-top: 5px;
float: left;
}
.open > .dropdown-menu {
padding: 5px;
}
/* Slder Navigation Arrow */

.home-slider.owl-carousel {
border: none;
box-shadow: none;
background: none;
border-radius: 0;
margin: 0 0 20px;
}
.home-slider .owl-controls {
bottom: 15px;
position: absolute;
width: 100%;
}
.owl-carousel .owl-wrapper-outer {
border: none;
box-shadow: none;
border-radius: 0;
}
.home-slider .owl-pagination {
top: 0;
}
.home-slider .owl-controls .owl-page {
padding: 3px;
border: 1px solid #fff;
}
.home-slider .owl-controls .owl-page span {
background: #fff;
height: 5px;
width: 5px;
}
.home-slider .owl-controls .owl-page.active span, .home-slider .owl-controls .owl-page span:hover {
background: #ef8829;
}
.home-slider .owl-controls .owl-page:hover, .home-slider .owl-controls .owl-page.active {
border: 1px solid #ef8829;
}
.home-slider .owl-controls .owl-page.active span {
cursor: default;
}
.brand-logo.owl-carousel .owl-buttons div {
background: url(<?php echo 'https://' . $_SERVER['HTTP_HOST']; ?>/app/webroot/img/sprite.png) no-repeat 0 0;
font-size: 0;
height: 35px;
width: 35px;
top: 40%;
}
.brand-logo.owl-carousel .owl-buttons .owl-prev {
background-position: -11px -32px;
border:1px solid #ddd;
}
.brand-logo.owl-carousel .owl-buttons .owl-prev:hover {
background-position: -11px -65px;
border:1px solid #EF8829;
}
.brand-logo.owl-carousel .owl-buttons .owl-next {
border:1px solid #ddd;
background-position: -11px -101px;
}
.brand-logo.owl-carousel .owl-buttons .owl-next:hover {
border:1px solid #EF8829;
background-position: -11px -136px;
}
.contact .col-sm-4.left strong {
float: left;
width: 85px;
font-weight: normal;
color: #555;
}
.contact .col-sm-4.left .address {
padding-left: 85px;
}
/*about page start*/
ul {
padding: 0;
margin: 0;
}
.services {
margin: 50px 0 80px;
overflow: hidden;
}
.tf {
font-size: 18px;
color: #000;
margin: 0px;
margin: 0 0 15px;
}
.features .content {
margin: 20px 0;
}
.wrapar > #about-page-contain {
margin: 0 0 70px;
}
.skill .tf, .Experiences .tf, .work .tf, .team .tf {
margin: 50px 0 15px;
}
i.circle {
background-color: #000;
border-radius: 100%;
color: #fff;
display: inline-block;
font-size: 22px;
font-stretch: normal;
height: 70px;
margin: 0;
padding: 24px 0;
text-align: center;
width: 70px;
}
.wrapper .btn {
margin-top: 10px;
}
.wrapper tf {
margin-top: 0;
margin-bottom: 20px;
}
.skill span {
background: #000 none repeat scroll 0 0;
color: #fff;
float: left;
height: 45px;
padding: 10px;
width: 45px;
}
.skill li {
list-style: outside none none;
margin-bottom: 15px;
}
.exp-detail > h5 {
color: #000;
font-weight: 600;
line-height: 24px;
}
{
line-height: 24px;
} {
line-height: 24px;
}
.work li {
list-style: outside none none;
margin-bottom: 47px;
}
.work li > h5 {
color: #000;
font-weight: 600;
line-height: 10px;
margin: 10;
padding: 0;
font-size: 12px;
text-transform: uppercase;
}
.work li > span {
border-right: 1px solid #c1c1c1;
float: left;
height: 36px;
margin-right: 10px;
padding: 8px 15px 0 0;
}
.photo > h5 {
color: #4d90fe;
}
.team .name {
margin: 10px 0;
}
.team-social {
position: absolute;
left: 20px;
bottom: 45px;
display: none;
}
.team-social .fa.fa-facebook, .team-social .fa.fa-twitter, .team-social .fa.fa-google-plus, .team-social .fa.fa-linkedin, .team-social .fa.fa-pinterest-p, .team-social .fa.fa-instagram {
border-radius: 50%;
color: #fff;
display: inline-block;
font-size: 15px;
height: 33px;
line-height: 33px;
padding: 0;
text-align: center;
width: 33px;
}
.team-social .fa-facebook {
background: #3c5b9b none repeat scroll 0 0;
border: 2px solid #3c5b9b;
}
.team-social .fa-facebook:hover {
background: #fff none repeat scroll 0 0;
color: #3c5b9b
}
.team-social .fa-twitter {
background: #359bed none repeat scroll 0 0;
border: 2px solid #359bed;
}
.team-social .fa-twitter:hover {
background: #fff none repeat scroll 0 0;
color: #359bed;
}
.team-social .fa-google-plus {
background: #e33729 none repeat scroll 0 0;
border: 2px solid #e33729;
}
.team-social .fa-google-plus:hover {
background: #fff none repeat scroll 0 0;
color: #e33729;
}
.team-social .fa-linkedin {
background: #027ba5 none repeat scroll 0 0;
border: 2px solid #027ba5;
}
.team-social .fa-linkedin:hover {
background: #fff none repeat scroll 0 0;
color: #027ba5;
}
.team-social .fa-pinterest-p {
background: #cb2027 none repeat scroll 0 0;
border: 2px solid #cb2027;
}
.team-social .fa-pinterest-p:hover {
background: #fff none repeat scroll 0 0;
color: #cb2027;
}
.team-social .fa-instagram {
background: #3f729b none repeat scroll 0 0;
border: 2px solid #3f729b;
}
.team-social .fa-instagram:hover {
background: #fff none repeat scroll 0 0;
color: #3f729b;
}
.team .img-responsive {
border: 1px solid #dadada;
width: 100%;
}
.mainbanner.img-responsive{
height: 748px !important;
}
#progress1 > h5, #progress2 > h5, #progress3 > h5, #progress4 > h5 {
color: #000;
font-weight: 400;
margin: 0 0 -45px;
padding: 15px;
}
div.dioprogress_padding {
padding: 0;
}
div.dioprogress_size_l {
height: 5px;
}
.loader {
position: fixed;
width: 100%;
z-index: 99;
height: 100%;
background: #fff;
}
.preloader.loader > img {
height: 225px;
left: 0;
margin: 0 auto;
position: absolute;
right: 0;
top: 50%;
width: 300px;
}
/*about page end*/

.cms-banner-left:hover img, .md1:hover img, .md2:hover img,.cms-banner-right:hover img,.cms-banner-middle:hover img,#subbanner4:hover img{
opacity: 0.7;
.filter-block.irs-to {
	background-color: rgb(125, 180, 50) !important;
}
}

