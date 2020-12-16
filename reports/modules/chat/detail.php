<?php
$query = "SELECT * FROM vicidial_closer_log WHERE comments='CHAT' AND lead_id = '" . $_GET['lead_id'] . "' AND uniqueid = '" . $_GET['U_ID'] . "'";

$data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);

$ChatID = $database->get('vicidial_chat_archive', 'chat_id', ['lead_id' => $_GET['lead_id'], 'ORDER' => ['chat_id' => 'DESC']]);

$ChatConversation = $database->select('vicidial_chat_log_archive', '*', ['chat_id' => $ChatID, 'ORDER' => ['message_time' => 'ASC']]);
?>

<div class="content-wrapper">
    <style>
	/*!
 * Fancytree "Win8" skin.
 *
 * DON'T EDIT THE CSS FILE DIRECTLY, since it is automatically generated from
 * the LESS templates.
 */
/*******************************************************************************
 * Common Styles for Fancytree Skins.
 *
 * This section is automatically generated from the `skin-common.less` template.
 *
 * Copyright (c) 2008-2019, Martin Wendt (http://wwWendt.de)
 * Released under the MIT license
 * https://github.com/mar10/fancytree/wiki/LicenseInfo
 *
 * @version 2.30.2
 * @date 2019-01-13T08:17:01Z
******************************************************************************/
/*------------------------------------------------------------------------------
 * Helpers
 *----------------------------------------------------------------------------*/
 
 .f-12{font-size:12px}
 .ml-20{margin-left:20px}
 .clearfix{clear:both;}
 .chat-wrapper{height:570px; overflow:scroll; overflow-x:auto}
 .recent-page::before {
    content: '';
    border-left: 1px solid black;
    top: 65px;
    bottom: 35px;
    left: 53px;
    position: absolute;
}
.recent-page>p::before {
    content: '';
    position: absolute;
    left: 51px;
    color: #333;
    width: 5px;
    height: 5px;
    background: green;
    margin-top: 10px;
}

.recent-page p strong {
    margin-right: 20px;
}

 .notify {
    background-color: #005aff;
    color: white;
    padding: 0px 7px;
    border: none;
    font-size: 10px;
    border-radius: 50px;
	float: right;
	margin:6px 0 0 0;
}

.notify1 {
    background-color: #005aff;
    color: white;
    padding: 0px 7px;
    border: none;
    font-size: 10px;
    border-radius: 50px;
	margin:6px 0 0 0;
}

 .text-primary {
  color: #7460ee !important;
}

.text-secondary {
  color: #e4e7ea !important;
}

.text-success {
  color: #26c6da !important;
}

.text-info {
  color: #1e88e5 !important;
}

.text-warning {
  color: #ffb22b !important;
}

.text-danger {
  color: #fc4b6c !important;
}

.text-pink {
  color: #FF69B4 !important;
}

.text-purple {
  color: #7c277d !important;
}

.text-brown {
  color: #8d6658 !important;
}

.text-cyan {
  color: #7FFFD4 !important;
}

.text-aqua {
  color: #00FFFF !important;
}

.text-yellow {
  color: #fcc525 !important;
}

.text-gray {
  color: #868e96 !important;
}

.text-dark {
  color: #465161 !important;
}

.text-facebook {
  color: #3b5998 !important;
}

.text-google {
  color: #dd4b39 !important;
}

.text-twitter {
  color: #00aced !important;
}

.text-linkedin {
  color: #007bb6 !important;
}

.text-pinterest {
  color: #cb2027 !important;
}

.text-git {
  color: #666666 !important;
}

.text-tumblr {
  color: #32506d !important;
}

.text-vimeo {
  color: #aad450 !important;
}

.text-youtube {
  color: #bb0000 !important;
}

.text-flickr {
  color: #ff0084 !important;
}

.text-reddit {
  color: #ff4500 !important;
}
.text-dribbble {
  color: #ea4c89 !important;
}

.text-skype {
  color: #00aff0 !important;
}

.text-instagram {
  color: #517fa4 !important;
}



.border-primary {
  border-color: #3f6ad8
}

.border-secondary {
  border-color: #6c757d
}

.border-success {
  border-color: #3ac47d
}

.border-info {
  border-color: #16aaff
}

.border-warning {
  border-color: #f7b924
}

.border-danger {
  border-color: #d92550
}

.border-light {
  border-color: #eee
}

.border-dark {
  border-color: #343a40
}

.border-focus {
  border-color: #444054
}

.border-alternate {
  border-color: #794c8a
}

.list-group-item-primary {
  color: #213770;
  background-color: #c9d5f4
}

.list-group-item-primary.list-group-item-action:hover,
.list-group-item-primary.list-group-item-action:focus {
  color: #213770;
  background-color: #b4c5f0
}

.list-group-item-primary.list-group-item-action.active {
  color: #fff;
  background-color: #213770;
  border-color: #213770
}

.list-group-item-secondary {
  color: #383d41;
  background-color: #d6d8db
}

.list-group-item-secondary.list-group-item-action:hover,
.list-group-item-secondary.list-group-item-action:focus {
  color: #383d41;
  background-color: #c8cbcf
}

.list-group-item-secondary.list-group-item-action.active {
  color: #fff;
  background-color: #383d41;
  border-color: #383d41
}

.list-group-item-success {
  color: #1e6641;
  background-color: #c8eedb
}

.list-group-item-success.list-group-item-action:hover,
.list-group-item-success.list-group-item-action:focus {
  color: #1e6641;
  background-color: #b5e8ce
}

.list-group-item-success.list-group-item-action.active {
  color: #fff;
  background-color: #1e6641;
  border-color: #1e6641
}

.list-group-item-info {
  color: #0b5885;
  background-color: #bee7ff
}

.list-group-item-info.list-group-item-action:hover,
.list-group-item-info.list-group-item-action:focus {
  color: #0b5885;
  background-color: #a5deff
}

.list-group-item-info.list-group-item-action.active {
  color: #fff;
  background-color: #0b5885;
  border-color: #0b5885
}

.list-group-item-warning {
  color: #806013;
  background-color: #fdebc2
}

.list-group-item-warning.list-group-item-action:hover,
.list-group-item-warning.list-group-item-action:focus {
  color: #806013;
  background-color: #fce3a9
}

.list-group-item-warning.list-group-item-action.active {
  color: #fff;
  background-color: #806013;
  border-color: #806013
}

.list-group-item-danger {
  color: #71132a;
  background-color: #f4c2ce
}

.list-group-item-danger.list-group-item-action:hover,
.list-group-item-danger.list-group-item-action:focus {
  color: #71132a;
  background-color: #f0acbd
}

.list-group-item-danger.list-group-item-action.active {
  color: #fff;
  background-color: #71132a;
  border-color: #71132a
}

.list-group-item-light {
  color: #7c7c7c;
  background-color: #fafafa
}

.list-group-item-light.list-group-item-action:hover,
.list-group-item-light.list-group-item-action:focus {
  color: #7c7c7c;
  background-color: #ededed
}

.list-group-item-light.list-group-item-action.active {
  color: #fff;
  background-color: #7c7c7c;
  border-color: #7c7c7c
}

.list-group-item-dark {
  color: #1b1e21;
  background-color: #c6c8ca
}

.list-group-item-dark.list-group-item-action:hover,
.list-group-item-dark.list-group-item-action:focus {
  color: #1b1e21;
  background-color: #b9bbbe
}

.list-group-item-dark.list-group-item-action.active {
  color: #fff;
  background-color: #1b1e21;
  border-color: #1b1e21
}

.list-group-item-focus {
  color: #23212c;
  background-color: #cbcacf
}

.list-group-item-focus.list-group-item-action:hover,
.list-group-item-focus.list-group-item-action:focus {
  color: #23212c;
  background-color: #bebdc3
}

.list-group-item-focus.list-group-item-action.active {
  color: #fff;
  background-color: #23212c;
  border-color: #23212c
}

.list-group-item-alternate {
  color: #3f2848;
  background-color: #d9cdde
}

.list-group-item-alternate.list-group-item-action:hover,
.list-group-item-alternate.list-group-item-action:focus {
  color: #3f2848;
  background-color: #cdbed4
}

.list-group-item-alternate.list-group-item-action.active {
  color: #fff;
  background-color: #3f2848;
  border-color: #3f2848
}

.bg-primary {
  background-color: #3f6ad8 !important
}

a.bg-primary:hover,
a.bg-primary:focus,
button.bg-primary:hover,
button.bg-primary:focus {
  background-color: #2651be !important
}

.bg-secondary {
  background-color: #6c757d !important
}

a.bg-secondary:hover,
a.bg-secondary:focus,
button.bg-secondary:hover,
button.bg-secondary:focus {
  background-color: #545b62 !important
}

.bg-success {
  background-color: #3ac47d !important
}

a.bg-success:hover,
a.bg-success:focus,
button.bg-success:hover,
button.bg-success:focus {
  background-color: #2e9d64 !important
}

.bg-info {
  background-color: #16aaff !important
}

a.bg-info:hover,
a.bg-info:focus,
button.bg-info:hover,
button.bg-info:focus {
  background-color: #0090e2 !important
}

.bg-warning {
  background-color: #f7b924 !important
}

a.bg-warning:hover,
a.bg-warning:focus,
button.bg-warning:hover,
button.bg-warning:focus {
  background-color: #e0a008 !important
}

.bg-danger {
  background-color: #d92550 !important
}

a.bg-danger:hover,
a.bg-danger:focus,
button.bg-danger:hover,
button.bg-danger:focus {
  background-color: #ad1e40 !important
}

.bg-light {
  background-color: #eee !important
}

a.bg-light:hover,
a.bg-light:focus,
button.bg-light:hover,
button.bg-light:focus {
  background-color: #d5d5d5 !important
}

.bg-dark {
  background-color: #343a40 !important
}

a.bg-dark:hover,
a.bg-dark:focus,
button.bg-dark:hover,
button.bg-dark:focus {
  background-color: #1d2124 !important
}

.bg-focus {
  background-color: #444054 !important
}

a.bg-focus:hover,
a.bg-focus:focus,
button.bg-focus:hover,
button.bg-focus:focus {
  background-color: #2d2a37 !important
}

.bg-alternate {
  background-color: #794c8a !important
}

a.bg-alternate:hover,
a.bg-alternate:focus,
button.bg-alternate:hover,
button.bg-alternate:focus {
  background-color: #5c3a69 !important
}

:root {
  --blue: #007bff;
  --indigo: #6610f2;
  --purple: #6f42c1;
  --pink: #e83e8c;
  --red: #dc3545;
  --orange: #fd7e14;
  --yellow: #ffc107;
  --green: #28a745;
  --teal: #20c997;
  --cyan: #17a2b8;
  --white: #fff;
  --gray: #6c757d;
  --gray-dark: #343a40;
  --primary: #3f6ad8;
  --secondary: #6c757d;
  --success: #3ac47d;
  --info: #16aaff;
  --warning: #f7b924;
  --danger: #d92550;
  --light: #eee;
  --dark: #343a40;
  --focus: #444054;
  --alternate: #794c8a;
  --breakpoint-xs: 0;
  --breakpoint-sm: 576px;
  --breakpoint-md: 768px;
  --breakpoint-lg: 992px;
  --breakpoint-xl: 1200px;
  --font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace
}

*,
*::before,
*::after {
  box-sizing: border-box
}

html {
  font-family: sans-serif;
  line-height: 1.15;
  -webkit-text-size-adjust: 100%;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0)
}

article,
aside,
figcaption,
figure,
footer,
header,
hgroup,
main,
nav,
section {
  display: block
}

body {
  margin: 0;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  font-size: .88rem;
  font-weight: 400;
  line-height: 1.5;
  color: #495057;
  text-align: left;
  background-color: #fff
}

[tabindex="-1"]:focus {
  outline: 0 !important
}

hr {
  box-sizing: content-box;
  height: 0;
  overflow: visible
}

h1,
h2,
h3,
h4,
h5,
h6 {
  margin-top: 0;
  margin-bottom: .5rem
}

p {
  margin-top: 0;
  margin-bottom: 1rem
}

abbr[title],
abbr[data-original-title] {
  text-decoration: underline;
  text-decoration: underline dotted;
  cursor: help;
  border-bottom: 0;
  text-decoration-skip-ink: none
}

address {
  margin-bottom: 1rem;
  font-style: normal;
  line-height: inherit
}

ol,
ul,
dl {
  margin-top: 0;
  margin-bottom: 1rem
}

ol ol,
ul ul,
ol ul,
ul ol {
  margin-bottom: 0
}

dt {
  font-weight: 700
}

dd {
  margin-bottom: .5rem;
  margin-left: 0
}

blockquote {
  margin: 0 0 1rem
}

b,
strong {
  font-weight: bolder
}

small {
  font-size: 80%
}

sub,
sup {
  position: relative;
  font-size: 75%;
  line-height: 0;
  vertical-align: baseline
}

sub {
  bottom: -.25em
}

sup {
  top: -.5em
}

a {
  color: #3f6ad8;
  text-decoration: none;
  background-color: transparent
}

a:hover {
  color: #0056b3;
  text-decoration: underline
}

a:not([href]):not([tabindex]) {
  color: inherit;
  text-decoration: none
}

a:not([href]):not([tabindex]):hover,
a:not([href]):not([tabindex]):focus {
  color: inherit;
  text-decoration: none
}

a:not([href]):not([tabindex]):focus {
  outline: 0
}

pre,
code,
kbd,
samp {
  font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
  font-size: 1em
}

pre {
  margin-top: 0;
  margin-bottom: 1rem;
  overflow: auto
}

figure {
  margin: 0 0 1rem
}

img {
  vertical-align: middle;
  border-style: none
}

svg {
  overflow: hidden;
  vertical-align: middle
}

table {
  border-collapse: collapse
}

caption {
  padding-top: .55rem;
  padding-bottom: .55rem;
  color: #6c757d;
  text-align: left;
  caption-side: bottom
}

th {
  text-align: inherit
}

label {
  display: inline-block;
  margin-bottom: .5rem
}

button {
  border-radius: 0
}

button:focus {
  outline: 1px dotted;
  outline: 5px auto -webkit-focus-ring-color
}

input,
button,
select,
optgroup,
textarea {
  margin: 0;
  font-family: inherit;
  font-size: inherit;
  line-height: inherit
}

button,
input {
  overflow: visible
}

button,
select {
  text-transform: none
}

button,
[type="button"],
[type="reset"],
[type="submit"] {
  -webkit-appearance: button
}

button::-moz-focus-inner,
[type="button"]::-moz-focus-inner,
[type="reset"]::-moz-focus-inner,
[type="submit"]::-moz-focus-inner {
  padding: 0;
  border-style: none
}

input[type="radio"],
input[type="checkbox"] {
  box-sizing: border-box;
  padding: 0
}

input[type="date"],
input[type="time"],
input[type="datetime-local"],
input[type="month"] {
  -webkit-appearance: listbox
}

textarea {
  overflow: auto;
  resize: vertical
}

fieldset {
  min-width: 0;
  padding: 0;
  margin: 0;
  border: 0
}

legend {
  display: block;
  width: 100%;
  max-width: 100%;
  padding: 0;
  margin-bottom: .5rem;
  font-size: 1.5rem;
  line-height: inherit;
  color: inherit;
  white-space: normal
}

progress {
  vertical-align: baseline
}

[type="number"]::-webkit-inner-spin-button,
[type="number"]::-webkit-outer-spin-button {
  height: auto
}

[type="search"] {
  outline-offset: -2px;
  -webkit-appearance: none
}

[type="search"]::-webkit-search-decoration {
  -webkit-appearance: none
}

::-webkit-file-upload-button {
  font: inherit;
  -webkit-appearance: button
}

output {
  display: inline-block
}

summary {
  display: list-item;
  cursor: pointer
}

template {
  display: none
}

[hidden] {
  display: none !important
}

h1,
h2,
h3,
h4,
h5,
h6,
.h1,
.h2,
.h3,
.h4,
.h5,
.h6 {
  margin-bottom: .5rem;
  font-family: inherit;
  font-weight: 400;
  line-height: 1.2;
  color: inherit
}

h1,
.h1 {
  font-size: 2.5rem
}

h2,
.h2 {
  font-size: 2rem
}

h3,
.h3 {
  font-size: 1.75rem
}

h4,
.h4 {
  font-size: 1.5rem
}

h5,
.h5 {
  font-size: 1.25rem
}

h6,
.h6 {
  font-size: 1rem
}

.lead {
  font-size: 1.25rem;
  font-weight: 300
}

.display-1 {
  font-size: 6rem;
  font-weight: 300;
  line-height: 1.2
}

.display-2 {
  font-size: 5.5rem;
  font-weight: 300;
  line-height: 1.2
}

.display-3 {
  font-size: 4.5rem;
  font-weight: 300;
  line-height: 1.2
}

.display-4 {
  font-size: 3.5rem;
  font-weight: 300;
  line-height: 1.2
}

hr {
  margin-top: 1rem;
  margin-bottom: 1rem;
  border: 0;
  border-top: 1px solid rgba(0, 0, 0, 0.1)
}

small,
.small {
  font-size: 80%;
  font-weight: 400
}

mark,
.mark {
  padding: .2em;
  background-color: #fcf8e3
}

.list-unstyled {
  padding-left: 0;
  list-style: none
}

.list-inline {
  padding-left: 0;
  list-style: none
}

.list-inline-item {
  display: inline-block
}

.list-inline-item:not(:last-child) {
  margin-right: .5rem
}

.initialism {
  font-size: 90%;
  text-transform: uppercase
}

.blockquote {
  margin-bottom: 1rem;
  font-size: 1.25rem
}

.blockquote-footer {
  display: block;
  font-size: 80%;
  color: #6c757d
}

.blockquote-footer::before {
  content: "\2014\00A0"
}

.img-fluid {
  max-width: 100%;
  height: auto
}

.img-thumbnail {
  padding: .25rem;
  background-color: #fff;
  border: 1px solid #dee2e6;
  border-radius: .25rem;
  max-width: 100%;
  height: auto
}

.figure {
  display: inline-block
}

.figure-img {
  margin-bottom: .5rem;
  line-height: 1
}

.figure-caption {
  font-size: 90%;
  color: #6c757d
}

code {
  font-size: 87.5%;
  color: #e83e8c;
  word-break: break-word
}

a>code {
  color: inherit
}

kbd {
  padding: .2rem .4rem;
  font-size: 87.5%;
  color: #fff;
  background-color: #212529;
  border-radius: .2rem
}

kbd kbd {
  padding: 0;
  font-size: 100%;
  font-weight: 700
}

pre {
  display: block;
  font-size: 87.5%;
  color: #212529
}

pre code {
  font-size: inherit;
  color: inherit;
  word-break: normal
}

.pre-scrollable {
  max-height: 340px;
  overflow-y: scroll
}

.container {
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto
}

@media (min-width: 576px) {
  .container {
    max-width: 540px
  }

  
}
@media (max-width: 576px) {

  .widget-chart.widget-chart-height.widget-chart-mb{
    margin-bottom:29px;
  }
}

@media (min-width: 768px) {
  .container {
    max-width: 720px
  }
}

@media (min-width: 992px) {
  .container {
    max-width: 960px
  }
}

@media (min-width: 1200px) {
  .container {
    max-width: 1140px
  }
}

.container-fluid {
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto
}

.row {
  display: flex;
  flex-wrap: wrap;
  margin-right: -15px;
  margin-left: -15px
}

.no-gutters {
  margin-right: 0;
  margin-left: 0
}

.no-gutters>.col,
.no-gutters>[class*="col-"] {
  padding-right: 0;
  padding-left: 0
}

.col-1,
.col-2,
.col-3,
.col-4,
.col-5,
.col-6,
.col-7,
.col-8,
.col-9,
.col-10,
.col-11,
.col-12,

.col,
.col-auto,
.col-sm-1,
.col-sm-2,
.col-sm-3,
.col-sm-4,
.col-sm-5,
.col-sm-6,
.col-sm-7,
.col-sm-8,
.col-sm-9,
.col-sm-10,
.col-sm-11,
.col-sm-12,
.col-sm,
.col-sm-auto,
.col-md-1,
.col-md-2,
.col-md-3,
.col-md-4,
.col-md-5,
.col-md-6,
.col-md-7,
.col-md-8,
.col-md-9,
.col-md-10,
.col-md-11,
.col-md-12,
.col-md,
.col-md-auto,
.col-lg-1,
.col-lg-2,
.col-lg-3,
.col-lg-4,
.col-lg-5,
.col-lg-6,
.col-lg-7,
.col-lg-8,
.col-lg-9,
.col-lg-10,
.col-lg-11,
.col-lg-12,
.col-lg,
.col-lg-auto,
.col-xl-1,
.col-xl-2,
.col-xl-3,
.col-xl-4,
.col-xl-5,
.col-xl-6,
.col-xl-7,
.col-xl-8,
.col-xl-9,
.col-xl-10,
.col-xl-11,
.col-xl-12,
.col-xl,
.col-xl-auto {
  position: relative;
  width: 100%;
  padding-right: 15px;
  padding-left: 15px
}

.col {
  flex-basis: 0;
  flex-grow: 1;
  max-width: 100%
}


.col-auto {
  flex: 0 0 auto;
  width: auto;
  max-width: 100%
}

.col-1 {
  flex: 0 0 8.33333%;
  max-width: 8.33333%
}

.col-2 {
  flex: 0 0 16.66667%;
  max-width: 16.66667%
}

.col-3 {
  flex: 0 0 25%;
  max-width: 25%
}

.col-4 {
  flex: 0 0 33.33333%;
  max-width: 33.33333%
}

.col-5 {
  flex: 0 0 41.66667%;
  max-width: 41.66667%
}

.col-6 {
  flex: 0 0 50%;
  max-width: 50%
}

.col-7 {
  flex: 0 0 58.33333%;
  max-width: 58.33333%
}

.col-8 {
  flex: 0 0 66.66667%;
  max-width: 66.66667%
}

.col-9 {
  flex: 0 0 75%;
  max-width: 75%
}

.col-10 {
  flex: 0 0 83.33333%;
  max-width: 83.33333%
}

.col-11 {
  flex: 0 0 91.66667%;
  max-width: 91.66667%
}

.col-12 {
  flex: 0 0 100%;
  max-width: 100%
}

.order-first {
  order: -1
}

.order-last {
  order: 13
}

.order-0 {
  order: 0
}

.order-1 {
  order: 1
}

.order-2 {
  order: 2
}

.order-3 {
  order: 3
}

.order-4 {
  order: 4
}

.order-5 {
  order: 5
}

.order-6 {
  order: 6
}

.order-7 {
  order: 7
}

.order-8 {
  order: 8
}

.order-9 {
  order: 9
}

.order-10 {
  order: 10
}

.order-11 {
  order: 11
}

.order-12 {
  order: 12
}

.offset-1 {
  margin-left: 8.33333%
}

.offset-2 {
  margin-left: 16.66667%
}

.offset-3 {
  margin-left: 25%
}

.offset-4 {
  margin-left: 33.33333%
}

.offset-5 {
  margin-left: 41.66667%
}

.offset-6 {
  margin-left: 50%
}

.offset-7 {
  margin-left: 58.33333%
}

.offset-8 {
  margin-left: 66.66667%
}

.offset-9 {
  margin-left: 75%
}

.offset-10 {
  margin-left: 83.33333%
}

.offset-11 {
  margin-left: 91.66667%
}

@media (min-width: 576px) {
  .col-sm {
    flex-basis: 0;
    flex-grow: 1;
    max-width: 100%
  }

  .col-sm-auto {
    flex: 0 0 auto;
    width: auto;
    max-width: 100%
  }

  .col-sm-1 {
    flex: 0 0 8.33333%;
    max-width: 8.33333%
  }

  .col-sm-2 {
    flex: 0 0 16.66667%;
    max-width: 16.66667%
  }

  .col-sm-3 {
    flex: 0 0 25%;
    max-width: 25%
  }

  .col-sm-4 {
    flex: 0 0 33.33333%;
    max-width: 33.33333%
  }

  .col-sm-5 {
    flex: 0 0 41.66667%;
    max-width: 41.66667%
  }

  .col-sm-6 {
    flex: 0 0 50%;
    max-width: 50%
  }

  .col-sm-7 {
    flex: 0 0 58.33333%;
    max-width: 58.33333%
  }

  .col-sm-8 {
    flex: 0 0 66.66667%;
    max-width: 66.66667%
  }

  .col-sm-9 {
    flex: 0 0 75%;
    max-width: 75%
  }

  .col-sm-10 {
    flex: 0 0 83.33333%;
    max-width: 83.33333%
  }

  .col-sm-11 {
    flex: 0 0 91.66667%;
    max-width: 91.66667%
  }

  .col-sm-12 {
    flex: 0 0 100%;
    max-width: 100%
  }

  .order-sm-first {
    order: -1
  }

  .order-sm-last {
    order: 13
  }

  .order-sm-0 {
    order: 0
  }

  .order-sm-1 {
    order: 1
  }

  .order-sm-2 {
    order: 2
  }

  .order-sm-3 {
    order: 3
  }

  .order-sm-4 {
    order: 4
  }

  .order-sm-5 {
    order: 5
  }

  .order-sm-6 {
    order: 6
  }

  .order-sm-7 {
    order: 7
  }

  .order-sm-8 {
    order: 8
  }

  .order-sm-9 {
    order: 9
  }

  .order-sm-10 {
    order: 10
  }

  .order-sm-11 {
    order: 11
  }

  .order-sm-12 {
    order: 12
  }

  .offset-sm-0 {
    margin-left: 0
  }

  .offset-sm-1 {
    margin-left: 8.33333%
  }

  .offset-sm-2 {
    margin-left: 16.66667%
  }

  .offset-sm-3 {
    margin-left: 25%
  }

  .offset-sm-4 {
    margin-left: 33.33333%
  }

  .offset-sm-5 {
    margin-left: 41.66667%
  }

  .offset-sm-6 {
    margin-left: 50%
  }

  .offset-sm-7 {
    margin-left: 58.33333%
  }

  .offset-sm-8 {
    margin-left: 66.66667%
  }

  .offset-sm-9 {
    margin-left: 75%
  }

  .offset-sm-10 {
    margin-left: 83.33333%
  }

  .offset-sm-11 {
    margin-left: 91.66667%
  }
}

@media (min-width: 768px) {
  .col-md {
    flex-basis: 0;
    flex-grow: 1;
    max-width: 100%
  }

  .col-md-auto {
    flex: 0 0 auto;
    width: auto;
    max-width: 100%
  }

  .col-md-1 {
    flex: 0 0 8.33333%;
    max-width: 8.33333%
  }

  .col-md-2 {
    flex: 0 0 16.66667%;
    max-width: 16.66667%
  }

  .col-md-3 {
    flex: 0 0 25%;
    max-width: 25%
  }

  .col-md-4 {
    flex: 0 0 33.33333%;
    max-width: 33.33333%
  }

  .col-md-5 {
    flex: 0 0 41.66667%;
    max-width: 41.66667%
  }

  .col-md-6 {
    flex: 0 0 50%;
    max-width: 50%
  }

  .col-md-7 {
    flex: 0 0 58.33333%;
    max-width: 58.33333%
  }

  .col-md-8 {
    flex: 0 0 66.66667%;
    max-width: 66.66667%
  }

  .col-md-9 {
    flex: 0 0 75%;
    max-width: 75%
  }

  .col-md-10 {
    flex: 0 0 83.33333%;
    max-width: 83.33333%
  }

  .col-md-11 {
    flex: 0 0 91.66667%;
    max-width: 91.66667%
  }

  .col-md-12 {
    flex: 0 0 100%;
    max-width: 100%
  }

  .order-md-first {
    order: -1
  }

  .order-md-last {
    order: 13
  }

  .order-md-0 {
    order: 0
  }

  .order-md-1 {
    order: 1
  }

  .order-md-2 {
    order: 2
  }

  .order-md-3 {
    order: 3
  }

  .order-md-4 {
    order: 4
  }

  .order-md-5 {
    order: 5
  }

  .order-md-6 {
    order: 6
  }

  .order-md-7 {
    order: 7
  }

  .order-md-8 {
    order: 8
  }

  .order-md-9 {
    order: 9
  }

  .order-md-10 {
    order: 10
  }

  .order-md-11 {
    order: 11
  }

  .order-md-12 {
    order: 12
  }

  .offset-md-0 {
    margin-left: 0
  }

  .offset-md-1 {
    margin-left: 8.33333%
  }

  .offset-md-2 {
    margin-left: 16.66667%
  }

  .offset-md-3 {
    margin-left: 25%
  }

  .offset-md-4 {
    margin-left: 33.33333%
  }

  .offset-md-5 {
    margin-left: 41.66667%
  }

  .offset-md-6 {
    margin-left: 50%
  }

  .offset-md-7 {
    margin-left: 58.33333%
  }

  .offset-md-8 {
    margin-left: 66.66667%
  }

  .offset-md-9 {
    margin-left: 75%
  }

  .offset-md-10 {
    margin-left: 83.33333%
  }

  .offset-md-11 {
    margin-left: 91.66667%
  }
}

@media (min-width: 992px) {
  .col-lg {
    flex-basis: 0;
    flex-grow: 1;
    max-width: 100%
  }

  .col-lg-auto {
    flex: 0 0 auto;
    width: auto;
    max-width: 100%
  }

  .col-lg-1 {
    flex: 0 0 8.33333%;
    max-width: 8.33333%
  }

  .col-lg-2 {
    flex: 0 0 16.66667%;
    max-width: 16.66667%
  }

  .col-lg-3 {
    flex: 0 0 25%;
    max-width: 25%
  }

  .col-lg-4 {
    flex: 0 0 33.33333%;
    max-width: 33.33333%
  }

  .col-lg-5 {
    flex: 0 0 41.66667%;
    max-width: 41.66667%
  }

  .col-lg-6 {
    flex: 0 0 50%;
    max-width: 50%
  }

  .col-lg-7 {
    flex: 0 0 58.33333%;
    max-width: 58.33333%
  }

  .col-lg-8 {
    flex: 0 0 66.66667%;
    max-width: 66.66667%
  }

  .col-lg-9 {
    flex: 0 0 75%;
    max-width: 75%
  }

  .col-lg-10 {
    flex: 0 0 83.33333%;
    max-width: 83.33333%
  }

  .col-lg-11 {
    flex: 0 0 91.66667%;
    max-width: 91.66667%
  }

  .col-lg-12 {
    flex: 0 0 100%;
    max-width: 100%
  }

  .order-lg-first {
    order: -1
  }

  .order-lg-last {
    order: 13
  }

  .order-lg-0 {
    order: 0

  }

  .order-lg-1 {
    order: 1
  }

  .order-lg-2 {
    order: 2
  }

  .order-lg-3 {
    order: 3
  }

  .order-lg-4 {
    order: 4
  }

  .order-lg-5 {
    order: 5
  }

  .order-lg-6 {
    order: 6
  }

  .order-lg-7 {
    order: 7
  }

  .order-lg-8 {
    order: 8
  }

  .order-lg-9 {
    order: 9
  }

  .order-lg-10 {
    order: 10
  }

  .order-lg-11 {
    order: 11
  }

  .order-lg-12 {
    order: 12
  }

  .offset-lg-0 {
    margin-left: 0
  }

  .offset-lg-1 {
    margin-left: 8.33333%
  }

  .offset-lg-2 {
    margin-left: 16.66667%
  }

  .offset-lg-3 {
    margin-left: 25%
  }

  .offset-lg-4 {
    margin-left: 33.33333%
  }

  .offset-lg-5 {
    margin-left: 41.66667%
  }

  .offset-lg-6 {
    margin-left: 50%
  }

  .offset-lg-7 {
    margin-left: 58.33333%
  }

  .offset-lg-8 {
    margin-left: 66.66667%
  }

  .offset-lg-9 {
    margin-left: 75%
  }

  .offset-lg-10 {
    margin-left: 83.33333%
  }

  .offset-lg-11 {
    margin-left: 91.66667%
  }
}

@media (min-width: 1200px) {
  .col-xl {
    flex-basis: 0;
    flex-grow: 1;
    max-width: 100%
  }

  .col-xl-auto {
    flex: 0 0 auto;
    width: auto;
    max-width: 100%
  }

  .col-xl-1 {
    flex: 0 0 8.33333%;
    max-width: 8.33333%
  }

  .col-xl-2 {
    flex: 0 0 16.66667%;
    max-width: 16.66667%
  }

  .col-xl-3 {
    flex: 0 0 25%;
    max-width: 25%
  }

  .col-xl-4 {
    flex: 0 0 33.33333%;
    max-width: 33.33333%
  }

  .col-xl-5 {
    flex: 0 0 41.66667%;
    max-width: 41.66667%
  }

  .col-xl-6 {
    flex: 0 0 50%;
    max-width: 50%
  }

  .col-xl-7 {
    flex: 0 0 58.33333%;
    max-width: 58.33333%
  }

  .col-xl-8 {
    flex: 0 0 66.66667%;
    max-width: 66.66667%
  }

  .col-xl-9 {
    flex: 0 0 75%;
    max-width: 75%
  }

  .col-xl-10 {
    flex: 0 0 83.33333%;
    max-width: 83.33333%
  }

  .col-xl-11 {
    flex: 0 0 91.66667%;
    max-width: 91.66667%
  }

  .col-xl-12 {
    flex: 0 0 100%;
    max-width: 100%
  }

  .order-xl-first {
    order: -1
  }

  .order-xl-last {
    order: 13
  }

  .order-xl-0 {
    order: 0
  }

  .order-xl-1 {
    order: 1
  }

  .order-xl-2 {
    order: 2
  }

  .order-xl-3 {
    order: 3
  }

  .order-xl-4 {
    order: 4
  }

  .order-xl-5 {
    order: 5
  }

  .order-xl-6 {
    order: 6
  }

  .order-xl-7 {
    order: 7
  }

  .order-xl-8 {
    order: 8
  }

  .order-xl-9 {
    order: 9
  }

  .order-xl-10 {
    order: 10
  }

  .order-xl-11 {
    order: 11
  }

  .order-xl-12 {
    order: 12
  }

  .offset-xl-0 {
    margin-left: 0
  }

  .offset-xl-1 {
    margin-left: 8.33333%
  }

  .offset-xl-2 {
    margin-left: 16.66667%
  }

  .offset-xl-3 {
    margin-left: 25%
  }

  .offset-xl-4 {
    margin-left: 33.33333%
  }

  .offset-xl-5 {
    margin-left: 41.66667%
  }

  .offset-xl-6 {
    margin-left: 50%
  }

  .offset-xl-7 {
    margin-left: 58.33333%
  }

  .offset-xl-8 {
    margin-left: 66.66667%
  }

  .offset-xl-9 {
    margin-left: 75%
  }

  .offset-xl-10 {
    margin-left: 83.33333%
  }

  .offset-xl-11 {
    margin-left: 91.66667%
  }
}

.btn {
  display: inline-block;
  font-weight: 400;
  color: #495057;
  text-align: center;
  vertical-align: middle;
  user-select: none;
  background-color: transparent;
  border: 1px solid transparent;
  padding: .375rem .75rem;
  font-size: 1rem;
  line-height: 1.5;
  border-radius: .25rem;
  transition: color 0.15s, background-color 0.15s, border-color 0.15s, box-shadow 0.15s
}

@media screen and (prefers-reduced-motion: reduce) {
  .btn {
    transition: none
  }
}

.btn:hover {
  color: #495057;
  text-decoration: none
}

.btn:focus,
.btn.focus {
  outline: 0;
  box-shadow: none
}

.btn.disabled,
.btn:disabled {
  opacity: .65
}

.btn:not(:disabled):not(.disabled) {
  cursor: pointer
}

a.btn.disabled,
fieldset:disabled a.btn {
  pointer-events: none
}

.btn-primary {
  color: #fff;
  background-color: #3f6ad8;
  border-color: #3f6ad8
}

.btn-primary:hover {
  color: #fff;
  background-color: #2955c8;
  border-color: #2651be
}

.btn-primary:focus,
.btn-primary.focus {
  box-shadow: 0 0 0 0 rgba(92, 128, 222, 0.5)
}

.btn-primary.disabled,
.btn-primary:disabled {
  color: #fff;
  background-color: #3f6ad8;
  border-color: #3f6ad8
}

.btn-primary:not(:disabled):not(.disabled):active,
.btn-primary:not(:disabled):not(.disabled).active,
.show>.btn-primary.dropdown-toggle {
  color: #fff;
  background-color: #2651be;
  border-color: #244cb3
}

.btn-primary:not(:disabled):not(.disabled):active:focus,
.btn-primary:not(:disabled):not(.disabled).active:focus,
.show>.btn-primary.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(92, 128, 222, 0.5)
}

.btn-secondary {
  color: #fff;
  background-color: #6c757d;
  border-color: #6c757d
}

.btn-secondary:hover {
  color: #fff;
  background-color: #5a6268;
  border-color: #545b62
}

.btn-secondary:focus,
.btn-secondary.focus {
  box-shadow: 0 0 0 0 rgba(130, 138, 145, 0.5)
}

.btn-secondary.disabled,
.btn-secondary:disabled {
  color: #fff;
  background-color: #6c757d;
  border-color: #6c757d
}

.btn-secondary:not(:disabled):not(.disabled):active,
.btn-secondary:not(:disabled):not(.disabled).active,
.show>.btn-secondary.dropdown-toggle {
  color: #fff;
  background-color: #545b62;
  border-color: #4e555b
}

.btn-secondary:not(:disabled):not(.disabled):active:focus,
.btn-secondary:not(:disabled):not(.disabled).active:focus,
.show>.btn-secondary.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(130, 138, 145, 0.5)
}

.btn-success {
  color: #fff;
  background-color: #3ac47d;
  border-color: #3ac47d
}

.btn-success:hover {
  color: #fff;
  background-color: #31a66a;
  border-color: #2e9d64
}

.btn-success:focus,
.btn-success.focus {
  box-shadow: 0 0 0 0 rgba(88, 205, 145, 0.5)
}

.btn-success.disabled,
.btn-success:disabled {
  color: #fff;
  background-color: #3ac47d;
  border-color: #3ac47d
}

.btn-success:not(:disabled):not(.disabled):active,
.btn-success:not(:disabled):not(.disabled).active,
.show>.btn-success.dropdown-toggle {
  color: #fff;
  background-color: #2e9d64;
  border-color: #2b935e
}

.btn-success:not(:disabled):not(.disabled):active:focus,
.btn-success:not(:disabled):not(.disabled).active:focus,
.show>.btn-success.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(88, 205, 145, 0.5)
}

.btn-info {
  color: #fff;
  background-color: #16aaff;
  border-color: #16aaff
}

.btn-info:hover {
  color: #fff;
  background-color: #0098ef;
  border-color: #0090e2
}

.btn-info:focus,
.btn-info.focus {
  box-shadow: 0 0 0 0 rgba(57, 183, 255, 0.5)
}

.btn-info.disabled,
.btn-info:disabled {
  color: #fff;
  background-color: #16aaff;
  border-color: #16aaff
}

.btn-info:not(:disabled):not(.disabled):active,
.btn-info:not(:disabled):not(.disabled).active,
.show>.btn-info.dropdown-toggle {
  color: #fff;
  background-color: #0090e2;
  border-color: #0087d5
}

.btn-info:not(:disabled):not(.disabled):active:focus,
.btn-info:not(:disabled):not(.disabled).active:focus,
.show>.btn-info.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(57, 183, 255, 0.5)
}

.btn-warning {
  color: #212529;
  background-color: #f7b924;
  border-color: #f7b924
}

.btn-warning:hover {
  color: #212529;
  background-color: #eca909;
  border-color: #e0a008
}

.btn-warning:focus,
.btn-warning.focus {
  box-shadow: 0 0 0 0 rgba(215, 163, 37, 0.5)
}

.btn-warning.disabled,
.btn-warning:disabled {
  color: #212529;
  background-color: #f7b924;
  border-color: #f7b924
}

.btn-warning:not(:disabled):not(.disabled):active,
.btn-warning:not(:disabled):not(.disabled).active,
.show>.btn-warning.dropdown-toggle {
  color: #212529;
  background-color: #e0a008;
  border-color: #d49808
}

.btn-warning:not(:disabled):not(.disabled):active:focus,
.btn-warning:not(:disabled):not(.disabled).active:focus,
.show>.btn-warning.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(215, 163, 37, 0.5)
}

.btn-danger {
  color: #fff;
  background-color: #d92550;
  border-color: #d92550
}

.btn-danger:hover {
  color: #fff;
  background-color: #b81f44;
  border-color: #ad1e40
}

.btn-danger:focus,
.btn-danger.focus {
  box-shadow: 0 0 0 0 rgba(223, 70, 106, 0.5)
}

.btn-danger.disabled,
.btn-danger:disabled {
  color: #fff;
  background-color: #d92550;
  border-color: #d92550
}

.btn-danger:not(:disabled):not(.disabled):active,
.btn-danger:not(:disabled):not(.disabled).active,
.show>.btn-danger.dropdown-toggle {
  color: #fff;
  background-color: #ad1e40;
  border-color: #a31c3c
}

.btn-danger:not(:disabled):not(.disabled):active:focus,
.btn-danger:not(:disabled):not(.disabled).active:focus,
.show>.btn-danger.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(223, 70, 106, 0.5)
}

.btn-light {
  color: #212529;
  background-color: #eee;
  border-color: #eee
}

.btn-light:hover {
  color: #212529;
  background-color: #dbdbdb;
  border-color: #d5d5d5
}

.btn-light:focus,
.btn-light.focus {
  box-shadow: 0 0 0 0 rgba(207, 208, 208, 0.5)
}

.btn-light.disabled,
.btn-light:disabled {
  color: #212529;
  background-color: #eee;
  border-color: #eee
}

.btn-light:not(:disabled):not(.disabled):active,
.btn-light:not(:disabled):not(.disabled).active,
.show>.btn-light.dropdown-toggle {
  color: #212529;
  background-color: #d5d5d5;
  border-color: #cecece
}

.btn-light:not(:disabled):not(.disabled):active:focus,
.btn-light:not(:disabled):not(.disabled).active:focus,
.show>.btn-light.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(207, 208, 208, 0.5)
}

.btn-dark {
  color: #fff;
  background-color: #343a40;
  border-color: #343a40
}

.btn-dark:hover {
  color: #fff;
  background-color: #23272b;
  border-color: #1d2124
}

.btn-dark:focus,
.btn-dark.focus {
  box-shadow: 0 0 0 0 rgba(82, 88, 93, 0.5)
}

.btn-dark.disabled,
.btn-dark:disabled {
  color: #fff;
  background-color: #343a40;
  border-color: #343a40
}

.btn-dark:not(:disabled):not(.disabled):active,
.btn-dark:not(:disabled):not(.disabled).active,
.show>.btn-dark.dropdown-toggle {
  color: #fff;
  background-color: #1d2124;
  border-color: #171a1d
}

.btn-dark:not(:disabled):not(.disabled):active:focus,
.btn-dark:not(:disabled):not(.disabled).active:focus,
.show>.btn-dark.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(82, 88, 93, 0.5)
}

.btn-focus {
  color: #fff;
  background-color: #444054;
  border-color: #444054
}

.btn-focus:hover {
  color: #fff;
  background-color: #322f3e;
  border-color: #2d2a37
}

.btn-focus:focus,
.btn-focus.focus {
  box-shadow: 0 0 0 0 rgba(96, 93, 110, 0.5)
}

.btn-focus.disabled,
.btn-focus:disabled {
  color: #fff;
  background-color: #444054;
  border-color: #444054
}

.btn-focus:not(:disabled):not(.disabled):active,
.btn-focus:not(:disabled):not(.disabled).active,
.show>.btn-focus.dropdown-toggle {
  color: #fff;
  background-color: #2d2a37;
  border-color: #272430
}

.btn-focus:not(:disabled):not(.disabled):active:focus,
.btn-focus:not(:disabled):not(.disabled).active:focus,
.show>.btn-focus.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(96, 93, 110, 0.5)
}

.btn-alternate {
  color: #fff;
  background-color: #794c8a;
  border-color: #794c8a
}

.btn-alternate:hover {
  color: #fff;
  background-color: #633e71;
  border-color: #5c3a69
}

.btn-alternate:focus,
.btn-alternate.focus {
  box-shadow: 0 0 0 0 rgba(141, 103, 156, 0.5)
}

.btn-alternate.disabled,
.btn-alternate:disabled {
  color: #fff;
  background-color: #794c8a;
  border-color: #794c8a
}

.btn-alternate:not(:disabled):not(.disabled):active,
.btn-alternate:not(:disabled):not(.disabled).active,
.show>.btn-alternate.dropdown-toggle {
  color: #fff;
  background-color: #5c3a69;
  border-color: #553561
}

.btn-alternate:not(:disabled):not(.disabled):active:focus,
.btn-alternate:not(:disabled):not(.disabled).active:focus,
.show>.btn-alternate.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(141, 103, 156, 0.5)
}

.btn-outline-primary {
  color: #3f6ad8;
  border-color: #3f6ad8
}

.btn-outline-primary:hover {
  color: #fff;
  background-color: #3f6ad8;
  border-color: #3f6ad8
}

.btn-outline-primary:focus,
.btn-outline-primary.focus {
  box-shadow: 0 0 0 0 rgba(63, 106, 216, 0.5)
}

.btn-outline-primary.disabled,
.btn-outline-primary:disabled {
  color: #3f6ad8;
  background-color: transparent
}

.btn-outline-primary:not(:disabled):not(.disabled):active,
.btn-outline-primary:not(:disabled):not(.disabled).active,
.show>.btn-outline-primary.dropdown-toggle {
  color: #fff;
  background-color: #3f6ad8;
  border-color: #3f6ad8
}

.btn-outline-primary:not(:disabled):not(.disabled):active:focus,
.btn-outline-primary:not(:disabled):not(.disabled).active:focus,
.show>.btn-outline-primary.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(63, 106, 216, 0.5)
}

.btn-outline-secondary {
  color: #6c757d;
  border-color: #6c757d
}

.btn-outline-secondary:hover {
  color: #fff;
  background-color: #6c757d;
  border-color: #6c757d
}

.btn-outline-secondary:focus,
.btn-outline-secondary.focus {
  box-shadow: 0 0 0 0 rgba(108, 117, 125, 0.5)
}

.btn-outline-secondary.disabled,
.btn-outline-secondary:disabled {
  color: #6c757d;
  background-color: transparent
}

.btn-outline-secondary:not(:disabled):not(.disabled):active,
.btn-outline-secondary:not(:disabled):not(.disabled).active,
.show>.btn-outline-secondary.dropdown-toggle {
  color: #fff;
  background-color: #6c757d;
  border-color: #6c757d
}

.btn-outline-secondary:not(:disabled):not(.disabled):active:focus,
.btn-outline-secondary:not(:disabled):not(.disabled).active:focus,
.show>.btn-outline-secondary.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(108, 117, 125, 0.5)
}

.btn-outline-success {
  color: #3ac47d;
  border-color: #3ac47d
}

.btn-outline-success:hover {
  color: #fff;
  background-color: #3ac47d;
  border-color: #3ac47d
}

.btn-outline-success:focus,
.btn-outline-success.focus {
  box-shadow: 0 0 0 0 rgba(58, 196, 125, 0.5)
}

.btn-outline-success.disabled,
.btn-outline-success:disabled {
  color: #3ac47d;
  background-color: transparent
}

.btn-outline-success:not(:disabled):not(.disabled):active,
.btn-outline-success:not(:disabled):not(.disabled).active,
.show>.btn-outline-success.dropdown-toggle {
  color: #fff;
  background-color: #3ac47d;
  border-color: #3ac47d
}

.btn-outline-success:not(:disabled):not(.disabled):active:focus,
.btn-outline-success:not(:disabled):not(.disabled).active:focus,
.show>.btn-outline-success.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(58, 196, 125, 0.5)
}

.btn-outline-info {
  color: #16aaff;
  border-color: #16aaff
}

.btn-outline-info:hover {
  color: #fff;
  background-color: #16aaff;
  border-color: #16aaff
}

.btn-outline-info:focus,
.btn-outline-info.focus {
  box-shadow: 0 0 0 0 rgba(22, 170, 255, 0.5)
}

.btn-outline-info.disabled,
.btn-outline-info:disabled {
  color: #16aaff;
  background-color: transparent
}

.btn-outline-info:not(:disabled):not(.disabled):active,
.btn-outline-info:not(:disabled):not(.disabled).active,
.show>.btn-outline-info.dropdown-toggle {
  color: #fff;
  background-color: #16aaff;
  border-color: #16aaff
}

.btn-outline-info:not(:disabled):not(.disabled):active:focus,
.btn-outline-info:not(:disabled):not(.disabled).active:focus,
.show>.btn-outline-info.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(22, 170, 255, 0.5)
}

.btn-outline-warning {
  color: #f7b924;
  border-color: #f7b924
}

.btn-outline-warning:hover {
  color: #212529;
  background-color: #f7b924;
  border-color: #f7b924
}

.btn-outline-warning:focus,
.btn-outline-warning.focus {
  box-shadow: 0 0 0 0 rgba(247, 185, 36, 0.5)
}

.btn-outline-warning.disabled,
.btn-outline-warning:disabled {
  color: #f7b924;
  background-color: transparent
}

.btn-outline-warning:not(:disabled):not(.disabled):active,
.btn-outline-warning:not(:disabled):not(.disabled).active,
.show>.btn-outline-warning.dropdown-toggle {
  color: #212529;
  background-color: #f7b924;
  border-color: #f7b924
}

.btn-outline-warning:not(:disabled):not(.disabled):active:focus,
.btn-outline-warning:not(:disabled):not(.disabled).active:focus,
.show>.btn-outline-warning.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(247, 185, 36, 0.5)
}

.btn-outline-danger {
  color: #d92550;
  border-color: #d92550
}

.btn-outline-danger:hover {
  color: #fff;
  background-color: #d92550;
  border-color: #d92550
}

.btn-outline-danger:focus,
.btn-outline-danger.focus {
  box-shadow: 0 0 0 0 rgba(217, 37, 80, 0.5)
}

.btn-outline-danger.disabled,
.btn-outline-danger:disabled {
  color: #d92550;
  background-color: transparent
}

.btn-outline-danger:not(:disabled):not(.disabled):active,
.btn-outline-danger:not(:disabled):not(.disabled).active,
.show>.btn-outline-danger.dropdown-toggle {
  color: #fff;
  background-color: #d92550;
  border-color: #d92550
}

.btn-outline-danger:not(:disabled):not(.disabled):active:focus,
.btn-outline-danger:not(:disabled):not(.disabled).active:focus,
.show>.btn-outline-danger.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(217, 37, 80, 0.5)
}

.btn-outline-light {
  color: #eee;
  border-color: #eee
}

.btn-outline-light:hover {
  color: #212529;
  background-color: #eee;
  border-color: #eee
}

.btn-outline-light:focus,
.btn-outline-light.focus {
  box-shadow: 0 0 0 0 rgba(238, 238, 238, 0.5)
}

.btn-outline-light.disabled,
.btn-outline-light:disabled {
  color: #eee;
  background-color: transparent
}

.btn-outline-light:not(:disabled):not(.disabled):active,
.btn-outline-light:not(:disabled):not(.disabled).active,
.show>.btn-outline-light.dropdown-toggle {
  color: #212529;
  background-color: #eee;
  border-color: #eee
}

.btn-outline-light:not(:disabled):not(.disabled):active:focus,
.btn-outline-light:not(:disabled):not(.disabled).active:focus,
.show>.btn-outline-light.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(238, 238, 238, 0.5)
}

.btn-outline-dark {
  color: #343a40;
  border-color: #343a40
}

.btn-outline-dark:hover {
  color: #fff;
  background-color: #343a40;
  border-color: #343a40
}

.btn-outline-dark:focus,
.btn-outline-dark.focus {
  box-shadow: 0 0 0 0 rgba(52, 58, 64, 0.5)
}

.btn-outline-dark.disabled,
.btn-outline-dark:disabled {
  color: #343a40;
  background-color: transparent
}

.btn-outline-dark:not(:disabled):not(.disabled):active,
.btn-outline-dark:not(:disabled):not(.disabled).active,
.show>.btn-outline-dark.dropdown-toggle {
  color: #fff;
  background-color: #343a40;
  border-color: #343a40
}

.btn-outline-dark:not(:disabled):not(.disabled):active:focus,
.btn-outline-dark:not(:disabled):not(.disabled).active:focus,
.show>.btn-outline-dark.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(52, 58, 64, 0.5)
}

.btn-outline-focus {
  color: #444054;
  border-color: #444054
}

.btn-outline-focus:hover {
  color: #fff;
  background-color: #444054;
  border-color: #444054
}

.btn-outline-focus:focus,
.btn-outline-focus.focus {
  box-shadow: 0 0 0 0 rgba(68, 64, 84, 0.5)
}

.btn-outline-focus.disabled,
.btn-outline-focus:disabled {
  color: #444054;
  background-color: transparent
}

.btn-outline-focus:not(:disabled):not(.disabled):active,
.btn-outline-focus:not(:disabled):not(.disabled).active,
.show>.btn-outline-focus.dropdown-toggle {
  color: #fff;
  background-color: #444054;
  border-color: #444054
}

.btn-outline-focus:not(:disabled):not(.disabled):active:focus,
.btn-outline-focus:not(:disabled):not(.disabled).active:focus,
.show>.btn-outline-focus.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(68, 64, 84, 0.5)
}

.btn-outline-alternate {
  color: #794c8a;
  border-color: #794c8a
}

.btn-outline-alternate:hover {
  color: #fff;
  background-color: #794c8a;
  border-color: #794c8a
}

.btn-outline-alternate:focus,
.btn-outline-alternate.focus {
  box-shadow: 0 0 0 0 rgba(121, 76, 138, 0.5)
}

.btn-outline-alternate.disabled,
.btn-outline-alternate:disabled {
  color: #794c8a;
  background-color: transparent
}

.btn-outline-alternate:not(:disabled):not(.disabled):active,
.btn-outline-alternate:not(:disabled):not(.disabled).active,
.show>.btn-outline-alternate.dropdown-toggle {
  color: #fff;
  background-color: #794c8a;
  border-color: #794c8a
}

.btn-outline-alternate:not(:disabled):not(.disabled):active:focus,
.btn-outline-alternate:not(:disabled):not(.disabled).active:focus,
.show>.btn-outline-alternate.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(121, 76, 138, 0.5)
}

.btn-link {
  font-weight: 400;
  color: #3f6ad8
}

.btn-link:hover {
  color: #0056b3;
  text-decoration: underline
}

.btn-link:focus,
.btn-link.focus {
  text-decoration: underline;
  box-shadow: none
}

.btn-link:disabled,
.btn-link.disabled {
  color: #6c757d;
  pointer-events: none
}

.btn-lg,
.btn-group-lg>.btn {
  padding: .5rem 1rem;
  font-size: 1.25rem;
  line-height: 1.5;
  border-radius: .3rem
}

.btn-sm,
.btn-group-sm>.btn {
  padding: .25rem .5rem;
  font-size: .875rem;
  line-height: 1.5;
  border-radius: .2rem
}

.btn-block {
  display: block;
  width: 100%
}

.btn-block+.btn-block {
  margin-top: .5rem
}

input[type="submit"].btn-block,
input[type="reset"].btn-block,
input[type="button"].btn-block {
  width: 100%
}

.fade {
  transition: opacity 0.15s linear
}

@media screen and (prefers-reduced-motion: reduce) {
  .fade {
    transition: none
  }
}

.fade:not(.show) {
  opacity: 0
}

.collapse:not(.show) {
  display: none
}

.collapsing {
  position: relative;
  height: 0;
  overflow: hidden;
  transition: height 0.35s ease
}

@media screen and (prefers-reduced-motion: reduce) {
  .collapsing {
    transition: none
  }
}

.dropup,
.dropright,
.dropdown,
.dropleft {
  position: relative
}

.dropdown-toggle::after {
  display: inline-block;
  margin-left: .255em;
  vertical-align: .255em;
  content: "";
  border-top: .3em solid;
  border-right: .3em solid transparent;
  border-bottom: 0;
  border-left: .3em solid transparent
}

.dropdown-toggle:empty::after {
  margin-left: 0
}

.dropdown-menu {
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1000;
  display: none;
  float: left;
  min-width: 15rem;
  padding: .65rem 0;
  margin: .125rem 0 0;
  font-size: .88rem;
  color: #495057;
  text-align: left;
  list-style: none;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid rgba(0, 0, 0, 0.15);
  border-radius: .25rem
}

.dropdown-menu-right {
  right: 0;
  left: auto
}

@media (min-width: 576px) {
  .dropdown-menu-sm-right {
    right: 0;
    left: auto
  }
}

@media (min-width: 768px) {
  .dropdown-menu-md-right {
    right: 0;
    left: auto
  }
}

@media (min-width: 992px) {
  .dropdown-menu-lg-right {
    right: 0;
    left: auto
  }
}

@media (min-width: 1200px) {
  .dropdown-menu-xl-right {
    right: 0;
    left: auto
  }
}

.dropdown-menu-left {
  right: auto;
  left: 0
}

@media (min-width: 576px) {
  .dropdown-menu-sm-left {
    right: auto;
    left: 0
  }
}

@media (min-width: 768px) {
  .dropdown-menu-md-left {
    right: auto;
    left: 0
  }
}

@media (min-width: 992px) {
  .dropdown-menu-lg-left {
    right: auto;
    left: 0
  }
}

@media (min-width: 1200px) {
  .dropdown-menu-xl-left {
    right: auto;
    left: 0
  }
}

.dropup .dropdown-menu {
  top: auto;
  bottom: 100%;
  margin-top: 0;
  margin-bottom: .125rem
}

.dropup .dropdown-toggle::after {
  display: inline-block;
  margin-left: .255em;
  vertical-align: .255em;
  content: "";
  border-top: 0;
  border-right: .3em solid transparent;
  border-bottom: .3em solid;
  border-left: .3em solid transparent
}

.dropup .dropdown-toggle:empty::after {
  margin-left: 0
}

.dropright .dropdown-menu {
  top: 0;
  right: auto;
  left: 100%;
  margin-top: 0;
  margin-left: .125rem
}

.dropright .dropdown-toggle::after {
  display: inline-block;
  margin-left: .255em;
  vertical-align: .255em;
  content: "";
  border-top: .3em solid transparent;
  border-right: 0;
  border-bottom: .3em solid transparent;
  border-left: .3em solid
}

.dropright .dropdown-toggle:empty::after {
  margin-left: 0
}

.dropright .dropdown-toggle::after {
  vertical-align: 0
}

.dropleft .dropdown-menu {
  top: 0;
  right: 100%;
  left: auto;
  margin-top: 0;
  margin-right: .125rem
}

.dropleft .dropdown-toggle::after {
  display: inline-block;
  margin-left: .255em;
  vertical-align: .255em;
  content: ""
}

.dropleft .dropdown-toggle::after {
  display: none
}

.dropleft .dropdown-toggle::before {
  display: inline-block;
  margin-right: .255em;
  vertical-align: .255em;
  content: "";
  border-top: .3em solid transparent;
  border-right: .3em solid;
  border-bottom: .3em solid transparent
}

.dropleft .dropdown-toggle:empty::after {
  margin-left: 0
}

.dropleft .dropdown-toggle::before {
  vertical-align: 0
}

.dropdown-menu[x-placement^="top"],
.dropdown-menu[x-placement^="right"],
.dropdown-menu[x-placement^="bottom"],
.dropdown-menu[x-placement^="left"] {
  right: auto;
  bottom: auto
}

.dropdown-divider {
  height: 0;
  margin: .5rem 0;
  overflow: hidden;
  border-top: 1px solid #e9ecef
}

.dropdown-item {
  display: block;
  width: 100%;
  padding: .4rem 1.5rem;
  clear: both;
  font-weight: 400;
  color: #212529;
  text-align: inherit;
  white-space: nowrap;
  background-color: transparent;
  border: 0;
  margin:4px 0px;
}

.dropdown-item:first-child {
  border-top-left-radius: calc(.25rem - 1px);
  border-top-right-radius: calc(.25rem - 1px)
}

.dropdown-item:last-child {
  border-bottom-right-radius: calc(.25rem - 1px);
  border-bottom-left-radius: calc(.25rem - 1px)
}

.dropdown-item:hover,
.dropdown-item:focus {
  color: #16181b;
  text-decoration: none;
  background-color: #e0f3ff
}

.dropdown-item.active,
.dropdown-item:active {
  color: #fff;
  text-decoration: none;
  background-color: #3f6ad8
}

.dropdown-item.disabled,
.dropdown-item:disabled {
  color: #6c757d;
  pointer-events: none;
  background-color: transparent
}

.dropdown-menu.show {
  display: block
}

.dropdown-header {
  display: block;
  padding: .65rem 1.5rem;
  margin-bottom: 0;
  font-size: .968rem;
  color: #6c757d;
  white-space: nowrap
}

.dropdown-item-text {
  display: block;
  padding: .4rem 1.5rem;
  color: #212529
}

.btn-group,
.btn-group-vertical {
  position: relative;
  display: inline-flex;
  vertical-align: middle
}

.btn-group>.btn,
.btn-group-vertical>.btn {
  position: relative;
  flex: 1 1 auto
}

.btn-group>.btn:hover,
.btn-group-vertical>.btn:hover {
  z-index: 1
}

.btn-group>.btn:focus,
.btn-group>.btn:active,
.btn-group>.btn.active,
.btn-group-vertical>.btn:focus,
.btn-group-vertical>.btn:active,
.btn-group-vertical>.btn.active {
  z-index: 1
}

.btn-toolbar {
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-start
}

.btn-toolbar .input-group {
  width: auto
}

.btn-group>.btn:not(:first-child),
.btn-group>.btn-group:not(:first-child) {
  margin-left: -1px
}

.btn-group>.btn:not(:last-child):not(.dropdown-toggle),
.btn-group>.btn-group:not(:last-child)>.btn {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0
}

.btn-group>.btn:not(:first-child),
.btn-group>.btn-group:not(:first-child)>.btn {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0
}

.dropdown-toggle-split {
  padding-right: .5625rem;
  padding-left: .5625rem
}

.dropdown-toggle-split::after,
.dropup .dropdown-toggle-split::after,
.dropright .dropdown-toggle-split::after {
  margin-left: 0
}

.dropleft .dropdown-toggle-split::before {
  margin-right: 0
}

.btn-sm+.dropdown-toggle-split,
.btn-group-sm>.btn+.dropdown-toggle-split {
  padding-right: .375rem;
  padding-left: .375rem
}

.btn-lg+.dropdown-toggle-split,
.btn-group-lg>.btn+.dropdown-toggle-split {
  padding-right: .75rem;
  padding-left: .75rem
}

.btn-group-vertical {
  flex-direction: column;
  align-items: flex-start;
  justify-content: center
}

.btn-group-vertical>.btn,
.btn-group-vertical>.btn-group {
  width: 100%
}

.btn-group-vertical>.btn:not(:first-child),
.btn-group-vertical>.btn-group:not(:first-child) {
  margin-top: -1px
}

.btn-group-vertical>.btn:not(:last-child):not(.dropdown-toggle),
.btn-group-vertical>.btn-group:not(:last-child)>.btn {
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0
}

.btn-group-vertical>.btn:not(:first-child),
.btn-group-vertical>.btn-group:not(:first-child)>.btn {
  border-top-left-radius: 0;
  border-top-right-radius: 0
}

.btn-group-toggle>.btn,
.btn-group-toggle>.btn-group>.btn {
  margin-bottom: 0
}

.btn-group-toggle>.btn input[type="radio"],
.btn-group-toggle>.btn input[type="checkbox"],
.btn-group-toggle>.btn-group>.btn input[type="radio"],
.btn-group-toggle>.btn-group>.btn input[type="checkbox"] {
  position: absolute;
  clip: rect(0, 0, 0, 0);
  pointer-events: none
}

.input-group {
  position: relative;
  display: flex;
  flex-wrap: wrap;
  align-items: stretch;
  width: 100%
}

.input-group>.form-control,
.input-group>.form-control-plaintext,
.input-group>.custom-select,
.input-group>.custom-file {
  position: relative;
  flex: 1 1 auto;
  width: 1%;
  margin-bottom: 0
}

.input-group>.form-control+.form-control,
.input-group>.form-control+.custom-select,
.input-group>.form-control+.custom-file,
.input-group>.form-control-plaintext+.form-control,
.input-group>.form-control-plaintext+.custom-select,
.input-group>.form-control-plaintext+.custom-file,
.input-group>.custom-select+.form-control,
.input-group>.custom-select+.custom-select,
.input-group>.custom-select+.custom-file,
.input-group>.custom-file+.form-control,
.input-group>.custom-file+.custom-select,
.input-group>.custom-file+.custom-file {
  margin-left: -1px
}

.input-group>.form-control:focus,
.input-group>.custom-select:focus,
.input-group>.custom-file .custom-file-input:focus~.custom-file-label {
  z-index: 3
}

.input-group>.custom-file .custom-file-input:focus {
  z-index: 4
}

.input-group>.form-control:not(:last-child),
.input-group>.custom-select:not(:last-child) {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0
}

.input-group>.form-control:not(:first-child),
.input-group>.custom-select:not(:first-child) {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0
}

.input-group>.custom-file {
  display: flex;
  align-items: center
}

.input-group>.custom-file:not(:last-child) .custom-file-label,
.input-group>.custom-file:not(:last-child) .custom-file-label::after {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0
}

.input-group>.custom-file:not(:first-child) .custom-file-label {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0
}

.input-group-prepend,
.input-group-append {
  display: flex
}

.input-group-prepend .btn,
.input-group-append .btn {
  position: relative;
  z-index: 2
}

.input-group-prepend .btn:focus,
.input-group-append .btn:focus {
  z-index: 3
}

.input-group-prepend .btn+.btn,
.input-group-prepend .btn+.input-group-text,
.input-group-prepend .input-group-text+.input-group-text,
.input-group-prepend .input-group-text+.btn,
.input-group-append .btn+.btn,
.input-group-append .btn+.input-group-text,
.input-group-append .input-group-text+.input-group-text,
.input-group-append .input-group-text+.btn {
  margin-left: -1px
}

.input-group-prepend {
  margin-right: -1px
}

.input-group-append {
  margin-left: -1px
}

.input-group-text {
  display: flex;
  align-items: center;
  padding: .375rem .75rem;
  margin-bottom: 0;
  font-size: .88rem;
  font-weight: 400;
  line-height: 1.5;
  color: #495057;
  text-align: center;
  white-space: nowrap;
  background-color: #eff9ff;
  border: 1px solid #ced4da;
  border-radius: .25rem
}

.input-group-text input[type="radio"],
.input-group-text input[type="checkbox"] {
  margin-top: 0
}

.input-group-lg>.form-control:not(textarea),
.input-group-lg>.custom-select {
  height: calc(2.875rem + 2px)
}

.input-group-lg>.form-control,
.input-group-lg>.custom-select,
.input-group-lg>.input-group-prepend>.input-group-text,
.input-group-lg>.input-group-append>.input-group-text,
.input-group-lg>.input-group-prepend>.btn,
.input-group-lg>.input-group-append>.btn {
  padding: .5rem 1rem;
  font-size: 1.25rem;
  line-height: 1.5;
  border-radius: .3rem
}

.input-group-sm>.form-control:not(textarea),
.input-group-sm>.custom-select {
  height: calc(1.8125rem + 2px)
}

.input-group-sm>.form-control,
.input-group-sm>.custom-select,
.input-group-sm>.input-group-prepend>.input-group-text,
.input-group-sm>.input-group-append>.input-group-text,
.input-group-sm>.input-group-prepend>.btn,
.input-group-sm>.input-group-append>.btn {
  padding: .25rem .5rem;
  font-size: .875rem;
  line-height: 1.5;
  border-radius: .2rem
}

.input-group-lg>.custom-select,
.input-group-sm>.custom-select {
  padding-right: 1.75rem
}

.input-group>.input-group-prepend>.btn,
.input-group>.input-group-prepend>.input-group-text,
.input-group>.input-group-append:not(:last-child)>.btn,
.input-group>.input-group-append:not(:last-child)>.input-group-text,
.input-group>.input-group-append:last-child>.btn:not(:last-child):not(.dropdown-toggle),
.input-group>.input-group-append:last-child>.input-group-text:not(:last-child) {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0
}

.input-group>.input-group-append>.btn,
.input-group>.input-group-append>.input-group-text,
.input-group>.input-group-prepend:not(:first-child)>.btn,
.input-group>.input-group-prepend:not(:first-child)>.input-group-text,
.input-group>.input-group-prepend:first-child>.btn:not(:first-child),
.input-group>.input-group-prepend:first-child>.input-group-text:not(:first-child) {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0
}

.custom-control {
  position: relative;
  display: block;
  min-height: 1.32rem;
  padding-left: 1.5rem
}

.custom-control-inline {
  display: inline-flex;
  margin-right: 1rem
}

.custom-control-input {
  position: absolute;
  z-index: -1;
  opacity: 0
}

.custom-control-input:checked~.custom-control-label::before {
  color: #fff;
  border-color: #007bff;
  background-color: #3f6ad8
}

.custom-control-input:focus~.custom-control-label::before {
  box-shadow: 0 0 0 .2rem rgba(0, 123, 255, 0.25)
}

.custom-control-input:focus:not(:checked)~.custom-control-label::before {
  border-color: #80bdff
}

.custom-control-input:not(:disabled):active~.custom-control-label::before {
  color: #fff;
  background-color: #d3ddf6;
  border-color: #b3d7ff
}

.custom-control-input:disabled~.custom-control-label {
  color: #6c757d
}

.custom-control-input:disabled~.custom-control-label::before {
  background-color: #e9ecef
}

.custom-control-label {
  position: relative;
  margin-bottom: 0;
  vertical-align: top
}

.custom-control-label::before {
  position: absolute;
  top: .16rem;
  left: -1.5rem;
  display: block;
  width: 1rem;
  height: 1rem;
  pointer-events: none;
  content: "";
  background-color: #fff;
  border: #adb5bd solid 1px
}

.custom-control-label::after {
  position: absolute;
  top: .16rem;
  left: -1.5rem;
  display: block;
  width: 1rem;
  height: 1rem;
  content: "";
  background-repeat: no-repeat;
  background-position: center center;
  background-size: 50% 50%
}

.custom-checkbox .custom-control-label::before {
  border-radius: .25rem
}

.custom-checkbox .custom-control-input:checked~.custom-control-label::after {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%23fff' d='M6.564.75l-3.59 3.612-1.538-1.55L0 4.26 2.974 7.25 8 2.193z'/%3e%3c/svg%3e")
}

.custom-checkbox .custom-control-input:indeterminate~.custom-control-label::before {
  border-color: #007bff;
  background-color: #3f6ad8
}

.custom-checkbox .custom-control-input:indeterminate~.custom-control-label::after {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 4'%3e%3cpath stroke='%23fff' d='M0 2h4'/%3e%3c/svg%3e")
}

.custom-checkbox .custom-control-input:disabled:checked~.custom-control-label::before {
  background-color: rgba(63, 106, 216, 0.5)
}

.custom-checkbox .custom-control-input:disabled:indeterminate~.custom-control-label::before {
  background-color: rgba(63, 106, 216, 0.5)
}

.custom-radio .custom-control-label::before {
  border-radius: 50%
}

.custom-radio .custom-control-input:checked~.custom-control-label::after {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='%23fff'/%3e%3c/svg%3e")
}

.custom-radio .custom-control-input:disabled:checked~.custom-control-label::before {
  background-color: rgba(63, 106, 216, 0.5)
}

.custom-switch {
  padding-left: 2.25rem
}

.custom-switch .custom-control-label::before {
  left: -2.25rem;
  width: 1.75rem;
  pointer-events: all;
  border-radius: .5rem
}

.custom-switch .custom-control-label::after {
  top: calc(.16rem + 2px);
  left: calc(-2.25rem + 2px);
  width: calc(1rem - 4px);
  height: calc(1rem - 4px);
  background-color: #adb5bd;
  border-radius: .5rem;
  transition: transform 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out
}

@media screen and (prefers-reduced-motion: reduce) {
  .custom-switch .custom-control-label::after {
    transition: none
  }
}

.custom-switch .custom-control-input:checked~.custom-control-label::after {
  background-color: #fff;
  transform: translateX(.75rem)
}

.custom-switch .custom-control-input:disabled:checked~.custom-control-label::before {
  background-color: rgba(63, 106, 216, 0.5)
}

.custom-select {
  display: inline-block;
  width: 100%;
  height: calc(2.25rem + 2px);
  padding: .375rem 1.75rem .375rem .75rem;
  font-weight: 400;
  line-height: 1.5;
  color: #495057;
  vertical-align: middle;
  background: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right .75rem center/8px 10px;
  background-color: #fff;
  border: 1px solid #ced4da;
  border-radius: .25rem;
  appearance: none
}

.custom-select:focus {
  border-color: #80bdff;
  outline: 0;
  box-shadow: 0 0 0 .2rem rgba(128, 189, 255, 0.5)
}

.custom-select:focus::-ms-value {
  color: #495057;
  background-color: #fff
}

.custom-select[multiple],
.custom-select[size]:not([size="1"]) {
  height: auto;
  padding-right: .75rem;
  background-image: none
}

.custom-select:disabled {
  color: #6c757d;
  background-color: #e9ecef
}

.custom-select::-ms-expand {
  opacity: 0
}

.custom-select-sm {
  height: calc(1.8125rem + 2px);
  padding-top: .25rem;
  padding-bottom: .25rem;
  padding-left: .5rem;
  font-size: .875rem
}

.custom-select-lg {
  height: calc(2.875rem + 2px);
  padding-top: .5rem;
  padding-bottom: .5rem;
  padding-left: 1rem;
  font-size: 1.25rem
}

.custom-file {
  position: relative;
  display: inline-block;
  width: 100%;
  height: calc(2.25rem + 2px);
  margin-bottom: 0
}

.custom-file-input {
  position: relative;
  z-index: 2;
  width: 100%;
  height: calc(2.25rem + 2px);
  margin: 0;
  opacity: 0
}

.custom-file-input:focus~.custom-file-label {
  border-color: #80bdff;
  box-shadow: 0 0 0 .2rem rgba(0, 123, 255, 0.25)
}

.custom-file-input:disabled~.custom-file-label {
  background-color: #e9ecef
}

.custom-file-input:lang(en)~.custom-file-label::after {
  content: "Browse"
}

.custom-file-input~.custom-file-label[data-browse]::after {
  content: attr(data-browse)
}

.custom-file-label {
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  z-index: 1;
  height: calc(2.25rem + 2px);
  padding: .375rem .75rem;
  font-weight: 400;
  line-height: 1.5;
  color: #495057;
  background-color: #fff;
  border: 1px solid #ced4da;
  border-radius: .25rem
}

.custom-file-label::after {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  z-index: 3;
  display: block;
  height: 2.25rem;
  padding: .375rem .75rem;
  line-height: 1.5;
  color: #495057;
  content: "Browse";
  background-color: #e9ecef;
  border-left: inherit;
  border-radius: 0 .25rem .25rem 0
}

.custom-range {
  width: 100%;
  height: calc(1rem + .4rem);
  padding: 0;
  background-color: transparent;
  appearance: none
}

.custom-range:focus {
  outline: none
}

.custom-range:focus::-webkit-slider-thumb {
  box-shadow: 0 0 0 1px #fff, 0 0 0 .2rem rgba(0, 123, 255, 0.25)
}

.custom-range:focus::-moz-range-thumb {
  box-shadow: 0 0 0 1px #fff, 0 0 0 .2rem rgba(0, 123, 255, 0.25)
}

.custom-range:focus::-ms-thumb {
  box-shadow: 0 0 0 1px #fff, 0 0 0 .2rem rgba(0, 123, 255, 0.25)
}

.custom-range::-moz-focus-outer {
  border: 0
}

.custom-range::-webkit-slider-thumb {
  width: 1rem;
  height: 1rem;
  margin-top: -.25rem;
  background-color: #3f6ad8;
  border: 0;
  border-radius: 1rem;
  transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  appearance: none
}

@media screen and (prefers-reduced-motion: reduce) {
  .custom-range::-webkit-slider-thumb {
    transition: none
  }
}

.custom-range::-webkit-slider-thumb:active {
  background-color: #d3ddf6
}

.custom-range::-webkit-slider-runnable-track {
  width: 100%;
  height: .5rem;
  color: transparent;
  cursor: pointer;
  background-color: #dee2e6;
  border-color: transparent;
  border-radius: 1rem
}

.custom-range::-moz-range-thumb {
  width: 1rem;
  height: 1rem;
  background-color: #3f6ad8;
  border: 0;
  border-radius: 1rem;
  transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  appearance: none
}

@media screen and (prefers-reduced-motion: reduce) {
  .custom-range::-moz-range-thumb {
    transition: none
  }
}

.custom-range::-moz-range-thumb:active {
  background-color: #d3ddf6
}

.custom-range::-moz-range-track {
  width: 100%;
  height: .5rem;
  color: transparent;
  cursor: pointer;
  background-color: #dee2e6;
  border-color: transparent;
  border-radius: 1rem
}

.custom-range::-ms-thumb {
  width: 1rem;
  height: 1rem;
  margin-top: 0;
  margin-right: .2rem;
  margin-left: .2rem;
  background-color: #3f6ad8;
  border: 0;
  border-radius: 1rem;
  transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  appearance: none
}

@media screen and (prefers-reduced-motion: reduce) {
  .custom-range::-ms-thumb {
    transition: none
  }
}

.custom-range::-ms-thumb:active {
  background-color: #d3ddf6
}

.custom-range::-ms-track {
  width: 100%;
  height: .5rem;
  color: transparent;
  cursor: pointer;
  background-color: transparent;
  border-color: transparent;
  border-width: .5rem
}

.custom-range::-ms-fill-lower {
  background-color: #dee2e6;
  border-radius: 1rem
}

.custom-range::-ms-fill-upper {
  margin-right: 15px;
  background-color: #dee2e6;
  border-radius: 1rem
}

.custom-range:disabled::-webkit-slider-thumb {
  background-color: #adb5bd
}

.custom-range:disabled::-webkit-slider-runnable-track {
  cursor: default
}

.custom-range:disabled::-moz-range-thumb {
  background-color: #adb5bd
}

.custom-range:disabled::-moz-range-track {
  cursor: default
}

.custom-range:disabled::-ms-thumb {
  background-color: #adb5bd
}

.custom-control-label::before,
.custom-file-label,
.custom-select {
  transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out
}

@media screen and (prefers-reduced-motion: reduce) {

  .custom-control-label::before,
  .custom-file-label,
  .custom-select {
    transition: none
  }
}

.nav {
  display: flex;
  flex-wrap: wrap;
  padding-left: 0;
  margin-bottom: 0;
  list-style: none
}

.nav-link {
  display: block;
  padding: .5rem 1rem
}

.nav-link:hover,
.nav-link:focus {
  text-decoration: none
}

.nav-link.disabled {
  color: #6c757d;
  pointer-events: none;
  cursor: default
}

.nav-tabs {
  border-bottom: 1px solid #dee2e6
}

.nav-tabs .nav-item {
  margin-bottom: -1px
}

.nav-tabs .nav-link {
  border: 1px solid transparent;
  border-top-left-radius: .25rem;
  border-top-right-radius: .25rem
}

.nav-tabs .nav-link:hover,
.nav-tabs .nav-link:focus {
  border-color: #e9ecef #e9ecef #dee2e6
}

.nav-tabs .nav-link.disabled {
  color: #6c757d;
  background-color: transparent;
  border-color: transparent
}

.nav-tabs .nav-link.active,
.nav-tabs .nav-item.show .nav-link {
  color: #495057;
  background-color: #fff;
  border-color: #dee2e6 #dee2e6 #fff
}

.nav-tabs .dropdown-menu {
  margin-top: -1px;
  border-top-left-radius: 0;
  border-top-right-radius: 0
}

.nav-pills .nav-link {
  border-radius: .25rem
}

.nav-pills .nav-link.active,
.nav-pills .show>.nav-link {
  color: #fff;
  background-color: #3f6ad8
}

.nav-fill .nav-item {
  flex: 1 1 auto;
  text-align: center
}

.nav-justified .nav-item {
  flex-basis: 0;
  flex-grow: 1;
  text-align: center
}

.tab-content>.tab-pane {
  display: none
}

.tab-content>.active {
  display: block
}

.navbar {
  position: relative;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  padding: .5rem 1rem
}

.navbar>.container,
.navbar>.container-fluid {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between
}

.navbar-brand {
  display: inline-block;
  padding-top: .3125rem;
  padding-bottom: .3125rem;
  margin-right: 1rem;
  font-size: 1.25rem;
  line-height: inherit;
  white-space: nowrap
}

.navbar-brand:hover,
.navbar-brand:focus {
  text-decoration: none
}

.navbar-nav {
  display: flex;
  flex-direction: column;
  padding-left: 0;
  margin-bottom: 0;
  list-style: none
}

.navbar-nav .nav-link {
  padding-right: 0;
  padding-left: 0
}

.navbar-nav .dropdown-menu {
  position: static;
  float: none
}

.navbar-text {
  display: inline-block;
  padding-top: .5rem;
  padding-bottom: .5rem
}

.navbar-collapse {
  flex-basis: 100%;
  flex-grow: 1;
  align-items: center
}

.navbar-toggler {
  padding: .25rem .75rem;
  font-size: 1.25rem;
  line-height: 1;
  background-color: transparent;
  border: 1px solid transparent;
  border-radius: .25rem
}

.navbar-toggler:hover,
.navbar-toggler:focus {
  text-decoration: none
}

.navbar-toggler:not(:disabled):not(.disabled) {
  cursor: pointer
}

.navbar-toggler-icon {
  display: inline-block;
  width: 1.5em;
  height: 1.5em;
  vertical-align: middle;
  content: "";
  background: no-repeat center center;
  background-size: 100% 100%
}

@media (max-width: 575.98px) {

  .navbar-expand-sm>.container,
  .navbar-expand-sm>.container-fluid {
    padding-right: 0;
    padding-left: 0
  }
}

@media (min-width: 576px) {
  .navbar-expand-sm {
    flex-flow: row nowrap;
    justify-content: flex-start
  }

  .navbar-expand-sm .navbar-nav {
    flex-direction: row
  }

  .navbar-expand-sm .navbar-nav .dropdown-menu {
    position: absolute
  }

  .navbar-expand-sm .navbar-nav .nav-link {
    padding-right: .5rem;
    padding-left: .5rem
  }

  .navbar-expand-sm>.container,
  .navbar-expand-sm>.container-fluid {
    flex-wrap: nowrap
  }

  .navbar-expand-sm .navbar-collapse {
    display: flex !important;
    flex-basis: auto
  }

  .navbar-expand-sm .navbar-toggler {
    display: none
  }
}

@media (max-width: 767.98px) {

  .navbar-expand-md>.container,
  .navbar-expand-md>.container-fluid {
    padding-right: 0;
    padding-left: 0
  }
}

@media (min-width: 768px) {
  .navbar-expand-md {
    flex-flow: row nowrap;
    justify-content: flex-start
  }

  .navbar-expand-md .navbar-nav {
    flex-direction: row
  }

  .navbar-expand-md .navbar-nav .dropdown-menu {
    position: absolute
  }

  .navbar-expand-md .navbar-nav .nav-link {
    padding-right: .5rem;
    padding-left: .5rem
  }

  .navbar-expand-md>.container,
  .navbar-expand-md>.container-fluid {
    flex-wrap: nowrap
  }

  .navbar-expand-md .navbar-collapse {
    display: flex !important;
    flex-basis: auto
  }

  .navbar-expand-md .navbar-toggler {
    display: none
  }
}

@media (max-width: 991.98px) {

  .navbar-expand-lg>.container,
  .navbar-expand-lg>.container-fluid {
    padding-right: 0;
    padding-left: 0
  }
}

@media (min-width: 992px) {
  .navbar-expand-lg {
    flex-flow: row nowrap;
    justify-content: flex-start
  }

  .navbar-expand-lg .navbar-nav {
    flex-direction: row
  }

  .navbar-expand-lg .navbar-nav .dropdown-menu {
    position: absolute
  }

  .navbar-expand-lg .navbar-nav .nav-link {
    padding-right: .5rem;
    padding-left: .5rem
  }

  .navbar-expand-lg>.container,
  .navbar-expand-lg>.container-fluid {
    flex-wrap: nowrap
  }

  .navbar-expand-lg .navbar-collapse {
    display: flex !important;
    flex-basis: auto
  }

  .navbar-expand-lg .navbar-toggler {
    display: none
  }
}

@media (max-width: 1199.98px) {

  .navbar-expand-xl>.container,
  .navbar-expand-xl>.container-fluid {
    padding-right: 0;
    padding-left: 0
  }
}

@media (min-width: 1200px) {
  .navbar-expand-xl {
    flex-flow: row nowrap;
    justify-content: flex-start
  }

  .navbar-expand-xl .navbar-nav {
    flex-direction: row
  }

  .navbar-expand-xl .navbar-nav .dropdown-menu {
    position: absolute
  }

  .navbar-expand-xl .navbar-nav .nav-link {
    padding-right: .5rem;
    padding-left: .5rem
  }

  .navbar-expand-xl>.container,
  .navbar-expand-xl>.container-fluid {
    flex-wrap: nowrap
  }

  .navbar-expand-xl .navbar-collapse {
    display: flex !important;
    flex-basis: auto
  }

  .navbar-expand-xl .navbar-toggler {
    display: none
  }
}

.navbar-expand {
  flex-flow: row nowrap;
  justify-content: flex-start
}

.navbar-expand>.container,
.navbar-expand>.container-fluid {
  padding-right: 0;
  padding-left: 0
}

.navbar-expand .navbar-nav {
  flex-direction: row
}

.navbar-expand .navbar-nav .dropdown-menu {
  position: absolute
}

.navbar-expand .navbar-nav .nav-link {
  padding-right: .5rem;
  padding-left: .5rem
}

.navbar-expand>.container,
.navbar-expand>.container-fluid {
  flex-wrap: nowrap
}

.navbar-expand .navbar-collapse {
  display: flex !important;
  flex-basis: auto
}

.navbar-expand .navbar-toggler {
  display: none
}

.navbar-light .navbar-brand {
  color: rgba(0, 0, 0, 0.9)
}

.navbar-light .navbar-brand:hover,
.navbar-light .navbar-brand:focus {
  color: rgba(0, 0, 0, 0.9)
}

.navbar-light .navbar-nav .nav-link {
  color: rgba(0, 0, 0, 0.5)
}

.navbar-light .navbar-nav .nav-link:hover,
.navbar-light .navbar-nav .nav-link:focus {
  color: rgba(0, 0, 0, 0.7)
}

.navbar-light .navbar-nav .nav-link.disabled {
  color: rgba(0, 0, 0, 0.3)
}

.navbar-light .navbar-nav .show>.nav-link,
.navbar-light .navbar-nav .active>.nav-link,
.navbar-light .navbar-nav .nav-link.show,
.navbar-light .navbar-nav .nav-link.active {
  color: rgba(0, 0, 0, 0.9)
}

.navbar-light .navbar-toggler {
  color: rgba(0, 0, 0, 0.5);
  border-color: rgba(0, 0, 0, 0.1)
}

.navbar-light .navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(0,0,0,0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e")
}

.navbar-light .navbar-text {
  color: rgba(0, 0, 0, 0.5)
}

.navbar-light .navbar-text a {
  color: rgba(0, 0, 0, 0.9)
}

.navbar-light .navbar-text a:hover,
.navbar-light .navbar-text a:focus {
  color: rgba(0, 0, 0, 0.9)
}

.navbar-dark .navbar-brand {
  color: #fff
}

.navbar-dark .navbar-brand:hover,
.navbar-dark .navbar-brand:focus {
  color: #fff
}

.navbar-dark .navbar-nav .nav-link {
  color: rgba(255, 255, 255, 0.5)
}

.navbar-dark .navbar-nav .nav-link:hover,
.navbar-dark .navbar-nav .nav-link:focus {
  color: rgba(255, 255, 255, 0.75)
}

.navbar-dark .navbar-nav .nav-link.disabled {
  color: rgba(255, 255, 255, 0.25)
}

.navbar-dark .navbar-nav .show>.nav-link,
.navbar-dark .navbar-nav .active>.nav-link,
.navbar-dark .navbar-nav .nav-link.show,
.navbar-dark .navbar-nav .nav-link.active {
  color: #fff
}

.navbar-dark .navbar-toggler {
  color: rgba(255, 255, 255, 0.5);
  border-color: rgba(255, 255, 255, 0.1)
}

.navbar-dark .navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(255,255,255,0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e")
}

.navbar-dark .navbar-text {
  color: rgba(255, 255, 255, 0.5)
}

.navbar-dark .navbar-text a {
  color: #fff
}

.navbar-dark .navbar-text a:hover,
.navbar-dark .navbar-text a:focus {
  color: #fff
}

.card {
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 1px solid rgba(26, 54, 126, 0.125);
  border-radius: .25rem
}

.card>hr {
  margin-right: 0;
  margin-left: 0
}

.card>.list-group:first-child .list-group-item:first-child {
  border-top-left-radius: .25rem;
  border-top-right-radius: .25rem
}

.card>.list-group:last-child .list-group-item:last-child {
  border-bottom-right-radius: .25rem;
  border-bottom-left-radius: .25rem
}

.card-body {
  flex: 1 1 auto;
  padding: 1.25rem
}

.card-title {
  margin-bottom: .75rem
}

.card-subtitle {
  margin-top: -.375rem;
  margin-bottom: 0
}

.card-text:last-child {
  margin-bottom: 0
}

.card-link:hover {
  text-decoration: none
}

.card-link+.card-link {
  margin-left: 1.25rem
}

.card-header {
  padding: .75rem 1.25rem 0 0;
  margin-bottom: 0;
  color: inherit;
  background-color: #fff;
  border-bottom: 1px solid rgba(26, 54, 126, 0.125)
}

.card-header:first-child {
  border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
}

.card-header+.list-group .list-group-item:first-child {
  border-top: 0
}

.card-footer {
  padding: .75rem 1.25rem;
  background-color: #fff;
  border-top: 1px solid rgba(26, 54, 126, 0.125)
}

.card-footer:last-child {
  border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px)
}

.card-header-tabs {
  margin-right: -.625rem;
  margin-bottom: -.75rem;
  margin-left: -.625rem;
  border-bottom: 0
}

.card-header-pills {
  margin-right: -.625rem;
  margin-left: -.625rem
}

.card-img-overlay {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1.25rem
}

.card-img {
  width: 100%;
  border-radius: calc(.25rem - 1px)
}

.card-img-top {
  width: 100%;
  border-top-left-radius: calc(.25rem - 1px);
  border-top-right-radius: calc(.25rem - 1px)
}

.card-img-bottom {
  width: 100%;
  border-bottom-right-radius: calc(.25rem - 1px);
  border-bottom-left-radius: calc(.25rem - 1px)
}

.card-deck {
  display: flex;
  flex-direction: column
}

.card-deck .card {
  margin-bottom: 15px
}

@media (min-width: 576px) {
  .card-deck {
    flex-flow: row wrap;
    margin-right: -15px;
    margin-left: -15px
  }

  .card-deck .card {
    display: flex;
    flex: 1 0 0%;
    flex-direction: column;
    margin-right: 15px;
    margin-bottom: 0;
    margin-left: 15px

  }
}

.card-group {
  display: flex;
  flex-direction: column
}

.card-group>.card {
  margin-bottom: 15px
}

@media (min-width: 576px) {
  .card-group {
    flex-flow: row wrap
  }

  .card-group>.card {
    flex: 1 0 0%;
    margin-bottom: 0
  }

  .card-group>.card+.card {
    margin-left: 0;
    border-left: 0
  }

  .card-group>.card:first-child {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0
  }

  .card-group>.card:first-child .card-img-top,
  .card-group>.card:first-child .card-header {
    border-top-right-radius: 0
  }

  .card-group>.card:first-child .card-img-bottom,
  .card-group>.card:first-child .card-footer {
    border-bottom-right-radius: 0
  }

  .card-group>.card:last-child {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0
  }

  .card-group>.card:last-child .card-img-top,
  .card-group>.card:last-child .card-header {
    border-top-left-radius: 0
  }

  .card-group>.card:last-child .card-img-bottom,
  .card-group>.card:last-child .card-footer {
    border-bottom-left-radius: 0
  }

  .card-group>.card:only-child {
    border-radius: .25rem
  }

  .card-group>.card:only-child .card-img-top,
  .card-group>.card:only-child .card-header {
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem
  }

  .card-group>.card:only-child .card-img-bottom,
  .card-group>.card:only-child .card-footer {
    border-bottom-right-radius: .25rem;
    border-bottom-left-radius: .25rem
  }

  .card-group>.card:not(:first-child):not(:last-child):not(:only-child) {
    border-radius: 0
  }

  .card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-img-top,
  .card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-img-bottom,
  .card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-header,
  .card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-footer {
    border-radius: 0
  }
}

.card-columns .card {
  margin-bottom: .75rem
}

@media (min-width: 576px) {
  .card-columns {
    column-count: 3;
    column-gap: 1.25rem;
    orphans: 1;
    widows: 1
  }

  .card-columns .card {
    display: inline-block;
    width: 100%
  }
}

.accordion .card {
  overflow: hidden
}

.accordion .card:not(:first-of-type) .card-header:first-child {
  border-radius: 0
}

.accordion .card:not(:first-of-type):not(:last-of-type) {
  border-bottom: 0;
  border-radius: 0
}

.accordion .card:first-of-type {
  border-bottom: 0;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0
}

.accordion .card:last-of-type {
  border-top-left-radius: 0;
  border-top-right-radius: 0
}

.accordion .card .card-header {
  margin-bottom: -1px
}

.breadcrumb {
  display: flex;
  flex-wrap: wrap;
  padding: .75rem 1rem;
  margin-bottom: 1rem;
  list-style: none;
  background-color: #e9ecef;
  border-radius: .25rem
}

.breadcrumb-item+.breadcrumb-item {
  padding-left: .5rem
}

.breadcrumb-item+.breadcrumb-item::before {
  display: inline-block;
  padding-right: .5rem;
  color: #6c757d;
  content: "/"
}

.breadcrumb-item+.breadcrumb-item:hover::before {
  text-decoration: underline
}

.breadcrumb-item+.breadcrumb-item:hover::before {
  text-decoration: none
}

.breadcrumb-item.active {
  color: #6c757d
}

.pagination {
  display: flex;
  padding-left: 0;
  list-style: none;
  border-radius: .25rem
}

.page-link {
  position: relative;
  display: block;
  padding: .5rem .75rem;
  margin-left: -1px;
  line-height: 1.25;
  color: #007bff;
  background-color: #fff;
  border: 1px solid #dee2e6
}

.page-link:hover {
  z-index: 2;
  color: #0056b3;
  text-decoration: none;
  background-color: #e9ecef;
  border-color: #dee2e6
}

.page-link:focus {
  z-index: 2;
  outline: 0;
  box-shadow: none
}

.page-link:not(:disabled):not(.disabled) {
  cursor: pointer
}

.page-item:first-child .page-link,
.pagination .page-number:first-child .page-link {
  margin-left: 0;
  border-top-left-radius: .25rem;
  border-bottom-left-radius: .25rem
}

.page-item:last-child .page-link,
.pagination .page-number:last-child .page-link {
  border-top-right-radius: .25rem;
  border-bottom-right-radius: .25rem
}

.page-item.active .page-link,
.pagination .active.page-number .page-link {
  z-index: 1;
  color: #fff;
  background-color: #3f6ad8;
  border-color: #007bff
}

.page-item.disabled .page-link,
.pagination .disabled.page-number .page-link {
  color: #6c757d;
  pointer-events: none;
  cursor: auto;
  background-color: #fff;
  border-color: #dee2e6
}

.pagination-lg .page-link {
  padding: .75rem 1.5rem;
  font-size: 1.1rem;
  line-height: 1.5
}

.pagination-lg .page-item:first-child .page-link,
.pagination-lg .pagination .page-number:first-child .page-link,
.pagination .pagination-lg .page-number:first-child .page-link {
  border-top-left-radius: .3rem;
  border-bottom-left-radius: .3rem
}

.pagination-lg .page-item:last-child .page-link,
.pagination-lg .pagination .page-number:last-child .page-link,
.pagination .pagination-lg .page-number:last-child .page-link {
  border-top-right-radius: .3rem;
  border-bottom-right-radius: .3rem
}

.pagination-sm .page-link {
  padding: .25rem .5rem;
  font-size: .968rem;
  line-height: 1.5
}

.pagination-sm .page-item:first-child .page-link,
.pagination-sm .pagination .page-number:first-child .page-link,
.pagination .pagination-sm .page-number:first-child .page-link {
  border-top-left-radius: .2rem;
  border-bottom-left-radius: .2rem
}

.pagination-sm .page-item:last-child .page-link,
.pagination-sm .pagination .page-number:last-child .page-link,
.pagination .pagination-sm .page-number:last-child .page-link {
  border-top-right-radius: .2rem;
  border-bottom-right-radius: .2rem
}

.badge {
  display: inline-block;
  padding: .25em .4em;
  font-size: 75%;
  font-weight: 700;
  line-height: 1;
  text-align: center;
  white-space: nowrap;
  vertical-align: baseline;
  border-radius: .25rem
}

a.badge:hover,
a.badge:focus {
  text-decoration: none
}

.badge:empty {
  display: none
}

.btn .badge {
  position: relative;
  top: -1px
}

.badge-pill {
  padding-right: .6em;
  padding-left: .6em;
  border-radius: 10rem
}

.badge-primary {
  color: #fff;
  background-color: #3f6ad8
}

a.badge-primary:hover,
a.badge-primary:focus {
  color: #fff;
  background-color: #2651be
}

.badge-secondary {
  color: #fff;
  background-color: #6c757d
}

a.badge-secondary:hover,
a.badge-secondary:focus {
  color: #fff;
  background-color: #545b62
}

.badge-success {
  color: #fff;
  background-color: #3ac47d
}

a.badge-success:hover,
a.badge-success:focus {
  color: #fff;
  background-color: #2e9d64
}

.badge-info {
  color: #fff;
  background-color: #16aaff
}

a.badge-info:hover,
a.badge-info:focus {
  color: #fff;
  background-color: #0090e2
}

.badge-warning {
  color: #212529;
  background-color: #f7b924
}

a.badge-warning:hover,
a.badge-warning:focus {
  color: #212529;
  background-color: #e0a008
}

.badge-danger {
  color: #fff;
  background-color: #d92550
}

a.badge-danger:hover,
a.badge-danger:focus {
  color: #fff;
  background-color: #ad1e40
}

.badge-light {
  color: #212529;
  background-color: #eee
}

a.badge-light:hover,
a.badge-light:focus {
  color: #212529;
  background-color: #d5d5d5
}

.badge-dark {
  color: #fff;
  background-color: #343a40
}

a.badge-dark:hover,
a.badge-dark:focus {
  color: #fff;
  background-color: #1d2124
}

.badge-focus {
  color: #fff;
  background-color: #444054
}

a.badge-focus:hover,
a.badge-focus:focus {
  color: #fff;
  background-color: #2d2a37
}

.badge-alternate {
  color: #fff;
  background-color: #794c8a
}

a.badge-alternate:hover,
a.badge-alternate:focus {
  color: #fff;
  background-color: #5c3a69
}

.jumbotron {
  padding: 2rem 1rem;
  margin-bottom: 2rem;
  background-color: #e9ecef;
  border-radius: .3rem
}

@media (min-width: 576px) {
  .jumbotron {
    padding: 4rem 2rem
  }
}

.jumbotron-fluid {
  padding-right: 0;
  padding-left: 0;
  border-radius: 0
}

.alert {
  position: relative;
  padding: .75rem 1.25rem;
  margin-bottom: 1rem;
  border: 1px solid transparent;
  border-radius: .25rem
}

.alert-heading {
  color: inherit
}

.alert-link {
  font-weight: 700
}

.alert-dismissible {
  padding-right: 4rem
}

.alert-dismissible .close {
  position: absolute;
  top: 0;
  right: 0;
  padding: .75rem 1.25rem;
  color: inherit
}

.alert-primary {
  color: #213770;
  background-color: #d9e1f7;
  border-color: #c9d5f4
}

.alert-primary hr {
  border-top-color: #b4c5f0
}

.alert-primary .alert-link {
  color: #152449
}

.alert-secondary {
  color: #383d41;
  background-color: #e2e3e5;
  border-color: #d6d8db
}

.alert-secondary hr {
  border-top-color: #c8cbcf
}

.alert-secondary .alert-link {
  color: #202326
}

.alert-success {
  color: #1e6641;
  background-color: #d8f3e5;
  border-color: #c8eedb
}

.alert-success hr {
  border-top-color: #b5e8ce
}

.alert-success .alert-link {
  color: #123f28
}

.alert-info {
  color: #0b5885;
  background-color: #d0eeff;
  border-color: #bee7ff
}

.alert-info hr {
  border-top-color: #a5deff
}

.alert-info .alert-link {
  color: #073956
}

.alert-warning {
  color: #806013;
  background-color: #fdf1d3;
  border-color: #fdebc2
}

.alert-warning hr {
  border-top-color: #fce3a9
}

.alert-warning .alert-link {
  color: #543f0c
}

.alert-danger {
  color: #71132a;
  background-color: #f7d3dc;
  border-color: #f4c2ce
}

.alert-danger hr {
  border-top-color: #f0acbd
}

.alert-danger .alert-link {
  color: #450c1a
}

.alert-light {
  color: #7c7c7c;
  background-color: #fcfcfc;
  border-color: #fafafa
}

.alert-light hr {
  border-top-color: #ededed
}

.alert-light .alert-link {
  color: #636363
}

.alert-dark {
  color: #1b1e21;
  background-color: #d6d8d9;
  border-color: #c6c8ca
}

.alert-dark hr {
  border-top-color: #b9bbbe
}

.alert-dark .alert-link {
  color: #040505
}

.alert-focus {
  color: #23212c;
  background-color: #dad9dd;
  border-color: #cbcacf
}

.alert-focus hr {
  border-top-color: #bebdc3
}

.alert-focus .alert-link {
  color: #0c0b0f
}

.alert-alternate {
  color: #3f2848;
  background-color: #e4dbe8;
  border-color: #d9cdde
}

.alert-alternate hr {
  border-top-color: #cdbed4
}

.alert-alternate .alert-link {
  color: #221627
}

@keyframes progress-bar-stripes {
  from {
    background-position: 1rem 0
  }

  to {
    background-position: 0 0
  }
}

.progress {
  display: flex;
  height: 1rem;
  overflow: hidden;
  font-size: .75rem;
  background-color: #e9ecef;
  border-radius: .25rem
}

.progress-bar {
  display: flex;
  flex-direction: column;
  justify-content: center;
  color: #fff;
  text-align: center;
  white-space: nowrap;
  background-color: #3f6ad8;
  transition: width 0.6s ease
}

@media screen and (prefers-reduced-motion: reduce) {
  .progress-bar {
    transition: none
  }
}

.progress-bar-striped {
  background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-size: 1rem 1rem
}

.progress-bar-animated {
  animation: progress-bar-stripes 1s linear infinite
}

.media {
  display: flex;
  align-items: flex-start
}

.media-body {
  flex: 1
}

.list-group {
  display: flex;
  flex-direction: column;
  padding-left: 0;
  margin-bottom: 0
}

.list-group-item-action {
  width: 100%;
  color: #495057;
  text-align: inherit
}

.list-group-item-action:hover,
.list-group-item-action:focus {
  color: #495057;
  text-decoration: none;
  background-color: #f8f9fa
}

.list-group-item-action:active {
  color: #212529;
  background-color: #e9ecef
}

.list-group-item {
  position: relative;
  display: block;
  padding: .75rem 1.25rem;
  margin-bottom: -1px;
  background-color: #fff;
  border: 1px solid rgba(0, 0, 0, 0.125)
}

.list-group-item:first-child {
  border-top-left-radius: .25rem;
  border-top-right-radius: .25rem
}

.list-group-item:last-child {
  margin-bottom: 0;
  border-bottom-right-radius: .25rem;
  border-bottom-left-radius: .25rem
}

.list-group-item:hover,
.list-group-item:focus {
  z-index: 1;
  text-decoration: none
}

.list-group-item.disabled,
.list-group-item:disabled {
  color: #6c757d;
  pointer-events: none;
  background-color: #fff
}

.list-group-item.active {
  z-index: 2;
  color: #fff;
  background-color: #3f6ad8;
  border-color: #007bff
}

.list-group-flush .list-group-item {
  border-right: 0;
  border-left: 0;
  border-radius: 0
}

.list-group-flush .list-group-item:last-child {
  margin-bottom: -1px
}

.list-group-flush:first-child .list-group-item:first-child {
  border-top: 0
}

.list-group-flush:last-child .list-group-item:last-child {
  margin-bottom: 0;
  border-bottom: 0
}

.list-group-item-primary {
  color: #213770;
  background-color: #c9d5f4
}

.list-group-item-primary.list-group-item-action:hover,
.list-group-item-primary.list-group-item-action:focus {
  color: #213770;
  background-color: #b4c5f0
}

.list-group-item-primary.list-group-item-action.active {
  color: #fff;
  background-color: #213770;
  border-color: #213770
}

.list-group-item-secondary {
  color: #383d41;
  background-color: #d6d8db
}

.list-group-item-secondary.list-group-item-action:hover,
.list-group-item-secondary.list-group-item-action:focus {
  color: #383d41;
  background-color: #c8cbcf
}

.list-group-item-secondary.list-group-item-action.active {
  color: #fff;
  background-color: #383d41;
  border-color: #383d41
}

.list-group-item-success {
  color: #1e6641;
  background-color: #c8eedb
}

.list-group-item-success.list-group-item-action:hover,
.list-group-item-success.list-group-item-action:focus {
  color: #1e6641;
  background-color: #b5e8ce
}

.list-group-item-success.list-group-item-action.active {
  color: #fff;
  background-color: #1e6641;
  border-color: #1e6641
}

.list-group-item-info {
  color: #0b5885;
  background-color: #bee7ff
}

.list-group-item-info.list-group-item-action:hover,
.list-group-item-info.list-group-item-action:focus {
  color: #0b5885;
  background-color: #a5deff
}

.list-group-item-info.list-group-item-action.active {
  color: #fff;
  background-color: #0b5885;
  border-color: #0b5885
}

.list-group-item-warning {
  color: #806013;
  background-color: #fdebc2
}

.list-group-item-warning.list-group-item-action:hover,
.list-group-item-warning.list-group-item-action:focus {
  color: #806013;
  background-color: #fce3a9
}

.list-group-item-warning.list-group-item-action.active {
  color: #fff;
  background-color: #806013;
  border-color: #806013
}

.list-group-item-danger {
  color: #71132a;
  background-color: #f4c2ce
}

.list-group-item-danger.list-group-item-action:hover,
.list-group-item-danger.list-group-item-action:focus {
  color: #71132a;
  background-color: #f0acbd
}

.list-group-item-danger.list-group-item-action.active {
  color: #fff;
  background-color: #71132a;
  border-color: #71132a
}

.list-group-item-light {
  color: #7c7c7c;
  background-color: #fafafa
}

.list-group-item-light.list-group-item-action:hover,
.list-group-item-light.list-group-item-action:focus {
  color: #7c7c7c;
  background-color: #ededed
}

.list-group-item-light.list-group-item-action.active {
  color: #fff;
  background-color: #7c7c7c;
  border-color: #7c7c7c
}

.list-group-item-dark {
  color: #1b1e21;
  background-color: #c6c8ca
}

.list-group-item-dark.list-group-item-action:hover,
.list-group-item-dark.list-group-item-action:focus {
  color: #1b1e21;
  background-color: #b9bbbe
}

.list-group-item-dark.list-group-item-action.active {
  color: #fff;
  background-color: #1b1e21;
  border-color: #1b1e21
}

.list-group-item-focus {
  color: #23212c;
  background-color: #cbcacf
}

.list-group-item-focus.list-group-item-action:hover,
.list-group-item-focus.list-group-item-action:focus {
  color: #23212c;
  background-color: #bebdc3
}

.list-group-item-focus.list-group-item-action.active {
  color: #fff;
  background-color: #23212c;
  border-color: #23212c
}

.list-group-item-alternate {
  color: #3f2848;
  background-color: #d9cdde
}

.list-group-item-alternate.list-group-item-action:hover,
.list-group-item-alternate.list-group-item-action:focus {
  color: #3f2848;
  background-color: #cdbed4
}

.list-group-item-alternate.list-group-item-action.active {
  color: #fff;
  background-color: #3f2848;
  border-color: #3f2848
}

.close {
  float: right;
  font-size: 1.5rem;
  font-weight: 700;
  line-height: 1;
  color: #000;
  text-shadow: 0 1px 0 #fff;
  opacity: .5
}

.close:hover {
  color: #000;
  text-decoration: none
}

.close:not(:disabled):not(.disabled) {
  cursor: pointer
}

.close:not(:disabled):not(.disabled):hover,
.close:not(:disabled):not(.disabled):focus {
  opacity: .75
}

button.close {
  padding: 0;
  background-color: transparent;
  border: 0;
  appearance: none
}

a.close.disabled {
  pointer-events: none
}

.toast {
  max-width: 350px;
  overflow: hidden;
  font-size: .875rem;
  background-color: rgba(255, 255, 255, 0.85);
  background-clip: padding-box;
  border: 1px solid rgba(0, 0, 0, 0.1);
  border-radius: .25rem;
  box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.1);
  backdrop-filter: blur(10px);
  opacity: 0
}

.toast:not(:last-child) {
  margin-bottom: .75rem
}

.toast.showing {
  opacity: 1
}

.toast.show {
  display: block;
  opacity: 1
}

.toast.hide {
  display: none
}

.toast-header {
  display: flex;
  align-items: center;
  padding: .25rem .75rem;
  color: #6c757d;
  background-color: rgba(255, 255, 255, 0.85);
  background-clip: padding-box;
  border-bottom: 1px solid rgba(0, 0, 0, 0.05)
}

.toast-body {
  padding: .75rem
}

.modal-open {
  overflow: hidden
}

.modal-open .modal {
  overflow-x: hidden;
  overflow-y: auto
}

.modal {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 1050;
  display: none;
  width: 100%;
  height: 100%;
  overflow: hidden;
  outline: 0
}

.modal-dialog {
  position: relative;
  width: auto;
  margin: .5rem;
  pointer-events: none
}

.modal.fade .modal-dialog {
  transition: transform 0.3s ease-out;
  transform: translate(0, -50px)
}

@media screen and (prefers-reduced-motion: reduce) {
  .modal.fade .modal-dialog {
    transition: none
  }
}

.modal.show .modal-dialog {
  transform: none
}

.modal-dialog-centered {
  display: flex;
  align-items: center;
  min-height: calc(100% - (.5rem * 2))
}

.modal-dialog-centered::before {
  display: block;
  height: calc(100vh - (.5rem * 2));
  content: ""
}

.modal-content {
  position: relative;
  display: flex;
  flex-direction: column;
  width: 100%;
  pointer-events: auto;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: .3rem;
  outline: 0
}

.modal-backdrop,
.blockOverlay {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 1040;
  width: 100vw;
  height: 100vh;
  background-color: #000
}

.modal-backdrop.fade,
.fade.blockOverlay {
  opacity: 0
}

.modal-backdrop.show,
.show.blockOverlay {
  opacity: .5
}

.modal-header {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  padding: 1rem 1rem;
  border-bottom: 1px solid #e9ecef;
  border-top-left-radius: .3rem;
  border-top-right-radius: .3rem
}

.modal-header .close {
  padding: 1rem 1rem;
  margin: -1rem -1rem -1rem auto
}

.modal-title {
  margin-bottom: 0;
  line-height: 1.5
}

.modal-body {
  position: relative;
  flex: 1 1 auto;
  padding: 1rem
}

.modal-footer {
  display: flex;
  align-items: center;
  justify-content: flex-end;
  padding: 1rem;
  border-top: 1px solid #e9ecef;
  border-bottom-right-radius: .3rem;
  border-bottom-left-radius: .3rem
}

.modal-footer>:not(:first-child) {
  margin-left: .25rem
}

.modal-footer>:not(:last-child) {
  margin-right: .25rem
}

.modal-scrollbar-measure {
  position: absolute;
  top: -9999px;
  width: 50px;
  height: 50px;
  overflow: scroll
}

@media (min-width: 576px) {
  .modal-dialog {
    max-width: 500px;
    margin: 1.75rem auto
  }

  .modal-dialog-centered {
    min-height: calc(100% - (1.75rem * 2))
  }

  .modal-dialog-centered::before {
    height: calc(100vh - (1.75rem * 2))
  }

  .modal-sm {
    max-width: 300px
  }
}

@media (min-width: 992px) {

  .modal-lg,
  .modal-xl {
    max-width: 800px
  }
}

@media (min-width: 1200px) {
  .modal-xl {
    max-width: 1140px
  }
}

.tooltip {
  position: absolute;
  z-index: 1070;
  display: block;
  margin: 0;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  font-style: normal;
  font-weight: 400;
  line-height: 1.5;
  text-align: left;
  text-align: start;
  text-decoration: none;
  text-shadow: none;
  text-transform: none;
  letter-spacing: normal;
  word-break: normal;
  word-spacing: normal;
  white-space: normal;
  line-break: auto;
  font-size: .875rem;
  word-wrap: break-word;
  opacity: 0
}

.tooltip.show {
  opacity: .9
}

.tooltip .arrow {
  position: absolute;
  display: block;
  width: .8rem;
  height: .4rem
}

.tooltip .arrow::before {
  position: absolute;
  content: "";
  border-color: transparent;
  border-style: solid
}

.bs-tooltip-top,
.bs-tooltip-auto[x-placement^="top"] {
  padding: .4rem 0
}

.bs-tooltip-top .arrow,
.bs-tooltip-auto[x-placement^="top"] .arrow {
  bottom: 0
}

.bs-tooltip-top .arrow::before,
.bs-tooltip-auto[x-placement^="top"] .arrow::before {
  top: 0;
  border-width: .4rem .4rem 0;
  border-top-color: #000
}

.bs-tooltip-right,
.bs-tooltip-auto[x-placement^="right"] {
  padding: 0 .4rem
}

.bs-tooltip-right .arrow,
.bs-tooltip-auto[x-placement^="right"] .arrow {
  left: 0;
  width: .4rem;
  height: .8rem
}

.bs-tooltip-right .arrow::before,
.bs-tooltip-auto[x-placement^="right"] .arrow::before {
  right: 0;
  border-width: .4rem .4rem .4rem 0;
  border-right-color: #000
}

.bs-tooltip-bottom,
.bs-tooltip-auto[x-placement^="bottom"] {
  padding: .4rem 0
}

.bs-tooltip-bottom .arrow,
.bs-tooltip-auto[x-placement^="bottom"] .arrow {
  top: 0
}

.bs-tooltip-bottom .arrow::before,
.bs-tooltip-auto[x-placement^="bottom"] .arrow::before {
  bottom: 0;
  border-width: 0 .4rem .4rem;
  border-bottom-color: #000
}

.bs-tooltip-left,
.bs-tooltip-auto[x-placement^="left"] {
  padding: 0 .4rem
}

.bs-tooltip-left .arrow,
.bs-tooltip-auto[x-placement^="left"] .arrow {
  right: 0;
  width: .4rem;
  height: .8rem
}

.bs-tooltip-left .arrow::before,
.bs-tooltip-auto[x-placement^="left"] .arrow::before {
  left: 0;
  border-width: .4rem 0 .4rem .4rem;
  border-left-color: #000
}

.tooltip-inner {
  max-width: 200px;
  padding: .25rem .5rem;
  color: #fff;
  text-align: center;
  background-color: #000;
  border-radius: .25rem
}

.popover {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 1060;
  display: block;
  max-width: 320px;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  font-style: normal;
  font-weight: 400;
  line-height: 1.5;
  text-align: left;
  text-align: start;
  text-decoration: none;
  text-shadow: none;
  text-transform: none;
  letter-spacing: normal;
  word-break: normal;
  word-spacing: normal;
  white-space: normal;
  line-break: auto;
  font-size: .875rem;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid rgba(26, 54, 126, 0.125);
  border-radius: .3rem
}

.popover .arrow {
  position: absolute;
  display: block;
  width: 1rem;
  height: .5rem;
  margin: 0 .3rem
}

.popover .arrow::before,
.popover .arrow::after {
  position: absolute;
  display: block;
  content: "";
  border-color: transparent;
  border-style: solid
}

.bs-popover-top,
.bs-popover-auto[x-placement^="top"] {
  margin-bottom: .5rem
}

.bs-popover-top .arrow,
.bs-popover-auto[x-placement^="top"] .arrow {
  bottom: calc((.5rem + 1px) * -1)
}

.bs-popover-top .arrow::before,
.bs-popover-auto[x-placement^="top"] .arrow::before,
.bs-popover-top .arrow::after,
.bs-popover-auto[x-placement^="top"] .arrow::after {
  border-width: .5rem .5rem 0
}

.bs-popover-top .arrow::before,
.bs-popover-auto[x-placement^="top"] .arrow::before {
  bottom: 0;
  border-top-color: rgba(0, 0, 0, 0.25)
}

.bs-popover-top .arrow::after,
.bs-popover-auto[x-placement^="top"] .arrow::after {
  bottom: 1px;
  border-top-color: #fff
}

.bs-popover-right,
.bs-popover-auto[x-placement^="right"] {
  margin-left: .5rem
}

.bs-popover-right .arrow,
.bs-popover-auto[x-placement^="right"] .arrow {
  left: calc((.5rem + 1px) * -1);
  width: .5rem;
  height: 1rem;
  margin: .3rem 0
}

.bs-popover-right .arrow::before,
.bs-popover-auto[x-placement^="right"] .arrow::before,
.bs-popover-right .arrow::after,
.bs-popover-auto[x-placement^="right"] .arrow::after {
  border-width: .5rem .5rem .5rem 0
}

.bs-popover-right .arrow::before,
.bs-popover-auto[x-placement^="right"] .arrow::before {
  left: 0;
  border-right-color: rgba(0, 0, 0, 0.25)
}

.bs-popover-right .arrow::after,
.bs-popover-auto[x-placement^="right"] .arrow::after {
  left: 1px;
  border-right-color: #fff
}

.bs-popover-bottom,
.bs-popover-auto[x-placement^="bottom"] {
  margin-top: .5rem
}

.bs-popover-bottom .arrow,
.bs-popover-auto[x-placement^="bottom"] .arrow {
  top: calc((.5rem + 1px) * -1)
}

.bs-popover-bottom .arrow::before,
.bs-popover-auto[x-placement^="bottom"] .arrow::before,
.bs-popover-bottom .arrow::after,
.bs-popover-auto[x-placement^="bottom"] .arrow::after {
  border-width: 0 .5rem .5rem .5rem
}

.bs-popover-bottom .arrow::before,
.bs-popover-auto[x-placement^="bottom"] .arrow::before {
  top: 0;
  border-bottom-color: rgba(0, 0, 0, 0.25)
}

.bs-popover-bottom .arrow::after,
.bs-popover-auto[x-placement^="bottom"] .arrow::after {
  top: 1px;
  border-bottom-color: #fff
}

.bs-popover-bottom .popover-header::before,
.bs-popover-auto[x-placement^="bottom"] .popover-header::before {
  position: absolute;
  top: 0;
  left: 50%;
  display: block;
  width: 1rem;
  margin-left: -.5rem;
  content: "";
  border-bottom: 1px solid #fff
}

.bs-popover-left,
.bs-popover-auto[x-placement^="left"] {
  margin-right: .5rem
}

.bs-popover-left .arrow,
.bs-popover-auto[x-placement^="left"] .arrow {
  right: calc((.5rem + 1px) * -1);
  width: .5rem;
  height: 1rem;
  margin: .3rem 0
}

.bs-popover-left .arrow::before,
.bs-popover-auto[x-placement^="left"] .arrow::before,
.bs-popover-left .arrow::after,
.bs-popover-auto[x-placement^="left"] .arrow::after {
  border-width: .5rem 0 .5rem .5rem
}

.bs-popover-left .arrow::before,
.bs-popover-auto[x-placement^="left"] .arrow::before {
  right: 0;
  border-left-color: rgba(0, 0, 0, 0.25)
}

.bs-popover-left .arrow::after,
.bs-popover-auto[x-placement^="left"] .arrow::after {
  right: 1px;
  border-left-color: #fff
}

.popover-header {
  padding: .5rem .75rem;
  margin-bottom: 0;
  font-size: .88rem;
  color: inherit;
  background-color: #fff;
  border-bottom: 1px solid #f2f2f2;
  border-top-left-radius: calc(.3rem - 1px);
  border-top-right-radius: calc(.3rem - 1px)
}

.popover-header:empty {
  display: none
}

.popover-body {
  padding: .5rem .75rem;
  color: #212529
}

.carousel {
  position: relative
}

.carousel.pointer-event {
  touch-action: pan-y
}

.carousel-inner {
  position: relative;
  width: 100%;
  overflow: hidden
}

.carousel-inner::after {
  display: block;
  clear: both;
  content: ""
}

.carousel-item {
  position: relative;
  display: none;
  float: left;
  width: 100%;
  margin-right: -100%;
  backface-visibility: hidden;
  transition: transform .6s ease-in-out
}

@media screen and (prefers-reduced-motion: reduce) {
  .carousel-item {
    transition: none
  }
}

.carousel-item.active,
.carousel-item-next,
.carousel-item-prev {
  display: block
}

.carousel-item-next:not(.carousel-item-left),
.active.carousel-item-right {
  transform: translateX(100%)
}

.carousel-item-prev:not(.carousel-item-right),
.active.carousel-item-left {
  transform: translateX(-100%)
}

.carousel-fade .carousel-item {
  opacity: 0;
  transition-property: opacity;
  transform: none
}

.carousel-fade .carousel-item.active,
.carousel-fade .carousel-item-next.carousel-item-left,
.carousel-fade .carousel-item-prev.carousel-item-right {
  z-index: 1;
  opacity: 1
}

.carousel-fade .active.carousel-item-left,
.carousel-fade .active.carousel-item-right {
  z-index: 0;
  opacity: 0;
  transition: 0s .6s opacity
}

@media screen and (prefers-reduced-motion: reduce) {

  .carousel-fade .active.carousel-item-left,
  .carousel-fade .active.carousel-item-right {
    transition: none
  }
}

.carousel-control-prev,
.carousel-control-next {
  position: absolute;
  top: 0;
  bottom: 0;
  z-index: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 15%;
  color: #fff;
  text-align: center;
  opacity: .5;
  transition: opacity 0.15s ease
}

@media screen and (prefers-reduced-motion: reduce) {

  .carousel-control-prev,
  .carousel-control-next {
    transition: none
  }
}

.carousel-control-prev:hover,
.carousel-control-prev:focus,
.carousel-control-next:hover,
.carousel-control-next:focus {
  color: #fff;
  text-decoration: none;
  outline: 0;
  opacity: .9
}

.carousel-control-prev {
  left: 0
}

.carousel-control-next {
  right: 0
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
  display: inline-block;
  width: 20px;
  height: 20px;
  background: transparent no-repeat center center;
  background-size: 100% 100%
}

.carousel-control-prev-icon {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3e%3c/svg%3e")
}

.carousel-control-next-icon {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3e%3cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3e%3c/svg%3e")
}

.carousel-indicators {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 15;
  display: flex;
  justify-content: center;
  padding-left: 0;
  margin-right: 15%;
  margin-left: 15%;
  list-style: none
}

.carousel-indicators li {
  box-sizing: content-box;
  flex: 0 1 auto;
  width: 30px;
  height: 3px;
  margin-right: 3px;
  margin-left: 3px;
  text-indent: -999px;
  cursor: pointer;
  background-color: #fff;
  background-clip: padding-box;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  opacity: .5;
  transition: opacity 0.6s ease
}

@media screen and (prefers-reduced-motion: reduce) {
  .carousel-indicators li {
    transition: none
  }
}

.carousel-indicators .active {
  opacity: 1
}

.carousel-caption {
  position: absolute;
  right: 15%;
  bottom: 20px;
  left: 15%;
  z-index: 10;
  padding-top: 20px;
  padding-bottom: 20px;
  color: #fff;
  text-align: center
}

@keyframes spinner-border {
  to {
    transform: rotate(360deg)
  }
}

.spinner-border {
  display: inline-block;
  width: 2rem;
  height: 2rem;
  vertical-align: text-bottom;
  border: .25em solid currentColor;
  border-right-color: transparent;
  border-radius: 50%;
  animation: spinner-border .75s linear infinite
}

.spinner-border-sm {
  width: 1rem;
  height: 1rem;
  border-width: .2em
}

@keyframes spinner-grow {
  0% {
    transform: scale(0)
  }

  50% {
    opacity: 1
  }
}

.spinner-grow {
  display: inline-block;
  width: 2rem;
  height: 2rem;
  vertical-align: text-bottom;
  background-color: currentColor;
  border-radius: 50%;
  opacity: 0;
  animation: spinner-grow .75s linear infinite
}

.spinner-grow-sm {
  width: 1rem;
  height: 1rem
}

.align-baseline {
  vertical-align: baseline !important
}

.align-top {
  vertical-align: top !important
}

.align-middle {
  vertical-align: middle !important
}

.align-bottom {
  vertical-align: bottom !important
}

.align-text-bottom {
  vertical-align: text-bottom !important
}

.align-text-top {
  vertical-align: text-top !important
}

.bg-primary {
  background-color: #3f6ad8 !important
}

a.bg-primary:hover,
a.bg-primary:focus,
button.bg-primary:hover,
button.bg-primary:focus {
  background-color: #2651be !important
}

.bg-secondary {
  background-color: #6c757d !important
}

a.bg-secondary:hover,
a.bg-secondary:focus,
button.bg-secondary:hover,
button.bg-secondary:focus {
  background-color: #545b62 !important
}

.bg-success {
  background-color: #3ac47d !important
}

a.bg-success:hover,
a.bg-success:focus,
button.bg-success:hover,
button.bg-success:focus {
  background-color: #2e9d64 !important
}

.bg-info {
  background-color: #16aaff !important
}

a.bg-info:hover,
a.bg-info:focus,
button.bg-info:hover,
button.bg-info:focus {
  background-color: #0090e2 !important
}

.bg-warning {
  background-color: #f7b924 !important
}

a.bg-warning:hover,
a.bg-warning:focus,
button.bg-warning:hover,
button.bg-warning:focus {
  background-color: #e0a008 !important
}

.bg-danger {
  background-color: #d92550 !important
}

a.bg-danger:hover,
a.bg-danger:focus,
button.bg-danger:hover,
button.bg-danger:focus {
  background-color: #ad1e40 !important
}

.bg-light {
  background-color: #eee !important
}

a.bg-light:hover,
a.bg-light:focus,
button.bg-light:hover,
button.bg-light:focus {
  background-color: #d5d5d5 !important
}

.bg-dark {
  background-color: #343a40 !important
}

a.bg-dark:hover,
a.bg-dark:focus,
button.bg-dark:hover,
button.bg-dark:focus {
  background-color: #1d2124 !important
}

.bg-focus {
  background-color: #444054 !important
}

a.bg-focus:hover,
a.bg-focus:focus,
button.bg-focus:hover,
button.bg-focus:focus {
  background-color: #2d2a37 !important
}

.bg-alternate {
  background-color: #794c8a !important
}

a.bg-alternate:hover,
a.bg-alternate:focus,
button.bg-alternate:hover,
button.bg-alternate:focus {
  background-color: #5c3a69 !important
}

.bg-white {
  background-color: #fff !important
}

.bg-purple{background:#191782!important}
.bg-orange{background:#dc6804!important}
.bg-red{background:#a20724!important}
.bg-blue{background:#0fb5bd!important}

.bg-transparent {
  background-color: transparent !important
}

.border {
  border: 1px solid #dee2e6 !important
}

.border-top {
  border-top: 1px solid #dee2e6 !important
}

.border-right {
  border-right: 1px solid #dee2e6 !important
}

.border-bottom {
  border-bottom: 1px solid #dee2e6 !important
}

.border-left {
  border-left: 1px solid #dee2e6 !important
}

.border-0 {
  border: 0 !important
}

.border-top-0 {
  border-top: 0 !important
}

.border-right-0 {
  border-right: 0 !important
}

.border-bottom-0 {
  border-bottom: 0 !important
}

.border-left-0 {
  border-left: 0 !important
}

.border-primary {
  border-color: #3f6ad8 !important
}

.border-secondary {
  border-color: #6c757d !important
}

.border-success {
  border-color: #3ac47d !important
}

.border-info {
  border-color: #16aaff !important
}

.border-warning {
  border-color: #f7b924 !important
}

.border-danger {
  border-color: #d92550 !important
}

.border-light {
  border-color: #eee !important
}

.border-dark {
  border-color: #343a40 !important
}

.border-focus {
  border-color: #444054 !important
}

.border-alternate {
  border-color: #794c8a !important
}

.border-white {
  border-color: #fff !important
}

.rounded {
  border-radius: .25rem !important
}

.rounded-top {
  border-top-left-radius: .25rem !important;
  border-top-right-radius: .25rem !important
}

.rounded-right {
  border-top-right-radius: .25rem !important;
  border-bottom-right-radius: .25rem !important
}

.rounded-bottom {
  border-bottom-right-radius: .25rem !important;
  border-bottom-left-radius: .25rem !important
}

.rounded-left {
  border-top-left-radius: .25rem !important;
  border-bottom-left-radius: .25rem !important
}

.rounded-circle {
  border-radius: 50% !important
}

.rounded-pill {
  border-radius: 50rem !important
}

.rounded-0 {
  border-radius: 0 !important
}

.clearfix::after {
  display: block;
  clear: both;
  content: ""
}

.d-none {
  display: none !important
}

.d-inline {
  display: inline !important
}

.d-inline-block {
  display: inline-block !important
}

.d-block {
  display: block !important
}

.d-table {
  display: table !important
}

.d-table-row {
  display: table-row !important
}

.d-table-cell {
  display: table-cell !important
}

.d-flex {
  display: flex !important
}

.d-inline-flex {
  display: inline-flex !important
}

@media (min-width: 576px) {
  .d-sm-none {
    display: none !important
  }

  .d-sm-inline {
    display: inline !important
  }

  .d-sm-inline-block {
    display: inline-block !important
  }

  .d-sm-block {
    display: block !important
  }

  .d-sm-table {
    display: table !important
  }

  .d-sm-table-row {
    display: table-row !important
  }

  .d-sm-table-cell {
    display: table-cell !important
  }

  .d-sm-flex {
    display: flex !important
  }

  .d-sm-inline-flex {
    display: inline-flex !important
  }
}

@media (min-width: 768px) {
  .d-md-none {
    display: none !important
  }

  .d-md-inline {
    display: inline !important
  }

  .d-md-inline-block {
    display: inline-block !important
  }

  .d-md-block {
    display: block !important
  }

  .d-md-table {
    display: table !important
  }

  .d-md-table-row {
    display: table-row !important
  }

  .d-md-table-cell {
    display: table-cell !important
  }

  .d-md-flex {
    display: flex !important
  }

  .d-md-inline-flex {
    display: inline-flex !important
  }
}

@media (min-width: 992px) {
  .d-lg-none {
    display: none !important
  }

  .d-lg-inline {
    display: inline !important
  }

  .d-lg-inline-block {
    display: inline-block !important
  }

  .d-lg-block {
    display: block !important
  }

  .d-lg-table {
    display: table !important
  }

  .d-lg-table-row {
    display: table-row !important
  }

  .d-lg-table-cell {
    display: table-cell !important
  }

  .d-lg-flex {
    display: flex !important
  }

  .d-lg-inline-flex {
    display: inline-flex !important
  }
}

@media (min-width: 1200px) {
  .d-xl-none {
    display: none !important
  }

  .d-xl-inline {
    display: inline !important
  }

  .d-xl-inline-block {
    display: inline-block !important
  }

  .d-xl-block {
    display: block !important
  }

  .d-xl-table {
    display: table !important
  }

  .d-xl-table-row {
    display: table-row !important
  }

  .d-xl-table-cell {
    display: table-cell !important
  }

  .d-xl-flex {
    display: flex !important
  }

  .d-xl-inline-flex {
    display: inline-flex !important
  }
}

@media print {
  .d-print-none {
    display: none !important
  }

  .d-print-inline {
    display: inline !important
  }

  .d-print-inline-block {
    display: inline-block !important
  }

  .d-print-block {
    display: block !important
  }

  .d-print-table {
    display: table !important
  }

  .d-print-table-row {
    display: table-row !important
  }

  .d-print-table-cell {
    display: table-cell !important
  }

  .d-print-flex {
    display: flex !important
  }

  .d-print-inline-flex {
    display: inline-flex !important
  }
}

.embed-responsive {
  position: relative;
  display: block;
  width: 100%;
  padding: 0;
  overflow: hidden
}

.embed-responsive::before {
  display: block;
  content: ""
}

.embed-responsive .embed-responsive-item,
.embed-responsive iframe,
.embed-responsive embed,
.embed-responsive object,
.embed-responsive video {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border: 0
}

.embed-responsive-21by9::before {
  padding-top: 42.85714%
}

.embed-responsive-16by9::before {
  padding-top: 56.25%
}

.embed-responsive-3by4::before {
  padding-top: 133.33333%
}

.embed-responsive-1by1::before {
  padding-top: 100%
}

.flex-row {
  flex-direction: row !important
}

.flex-column {
  flex-direction: column !important
}

.flex-row-reverse {
  flex-direction: row-reverse !important
}

.flex-column-reverse {
  flex-direction: column-reverse !important
}

.flex-wrap {
  flex-wrap: wrap !important
}

.flex-nowrap {
  flex-wrap: nowrap !important
}

.flex-wrap-reverse {
  flex-wrap: wrap-reverse !important
}

.flex-fill {
  flex: 1 1 auto !important
}

.flex-grow-0 {
  flex-grow: 0 !important
}

.flex-grow-1 {
  flex-grow: 1 !important
}

.flex-shrink-0 {
  flex-shrink: 0 !important
}

.flex-shrink-1 {
  flex-shrink: 1 !important
}

.justify-content-start {
  justify-content: flex-start !important
}

.justify-content-end {
  justify-content: flex-end !important
}

.justify-content-center {
  justify-content: center !important
}

.justify-content-between {
  justify-content: space-between !important
}

.justify-content-around {
  justify-content: space-around !important
}

.align-items-start {
  align-items: flex-start !important
}

.align-items-end {
  align-items: flex-end !important
}

.align-items-center {
  align-items: center !important
}

.align-items-baseline {
  align-items: baseline !important
}

.align-items-stretch {
  align-items: stretch !important
}

.align-content-start {
  align-content: flex-start !important
}

.align-content-end {
  align-content: flex-end !important
}

.align-content-center {
  align-content: center !important
}

.align-content-between {
  align-content: space-between !important
}

.align-content-around {
  align-content: space-around !important
}

.align-content-stretch {
  align-content: stretch !important
}

.align-self-auto {
  align-self: auto !important
}

.align-self-start {
  align-self: flex-start !important
}

.align-self-end {
  align-self: flex-end !important
}

.align-self-center {
  align-self: center !important
}

.align-self-baseline {
  align-self: baseline !important
}

.align-self-stretch {
  align-self: stretch !important
}

@media (min-width: 576px) {
  .flex-sm-row {
    flex-direction: row !important
  }

  .flex-sm-column {
    flex-direction: column !important
  }

  .flex-sm-row-reverse {
    flex-direction: row-reverse !important
  }

  .flex-sm-column-reverse {
    flex-direction: column-reverse !important
  }

  .flex-sm-wrap {
    flex-wrap: wrap !important
  }

  .flex-sm-nowrap {
    flex-wrap: nowrap !important
  }

  .flex-sm-wrap-reverse {
    flex-wrap: wrap-reverse !important
  }

  .flex-sm-fill {
    flex: 1 1 auto !important
  }

  .flex-sm-grow-0 {
    flex-grow: 0 !important
  }

  .flex-sm-grow-1 {
    flex-grow: 1 !important
  }

  .flex-sm-shrink-0 {
    flex-shrink: 0 !important
  }

  .flex-sm-shrink-1 {
    flex-shrink: 1 !important
  }

  .justify-content-sm-start {
    justify-content: flex-start !important
  }

  .justify-content-sm-end {
    justify-content: flex-end !important
  }

  .justify-content-sm-center {
    justify-content: center !important
  }

  .justify-content-sm-between {
    justify-content: space-between !important
  }

  .justify-content-sm-around {
    justify-content: space-around !important
  }

  .align-items-sm-start {
    align-items: flex-start !important
  }

  .align-items-sm-end {
    align-items: flex-end !important
  }

  .align-items-sm-center {
    align-items: center !important
  }

  .align-items-sm-baseline {
    align-items: baseline !important
  }

  .align-items-sm-stretch {
    align-items: stretch !important
  }

  .align-content-sm-start {
    align-content: flex-start !important
  }

  .align-content-sm-end {
    align-content: flex-end !important
  }

  .align-content-sm-center {
    align-content: center !important
  }

  .align-content-sm-between {
    align-content: space-between !important
  }

  .align-content-sm-around {
    align-content: space-around !important
  }

  .align-content-sm-stretch {
    align-content: stretch !important
  }

  .align-self-sm-auto {
    align-self: auto !important
  }

  .align-self-sm-start {
    align-self: flex-start !important
  }

  .align-self-sm-end {
    align-self: flex-end !important
  }

  .align-self-sm-center {
    align-self: center !important
  }

  .align-self-sm-baseline {
    align-self: baseline !important
  }

  .align-self-sm-stretch {
    align-self: stretch !important
  }
}

@media (min-width: 768px) {
  .flex-md-row {
    flex-direction: row !important
  }

  .flex-md-column {
    flex-direction: column !important
  }

  .flex-md-row-reverse {
    flex-direction: row-reverse !important
  }

  .flex-md-column-reverse {
    flex-direction: column-reverse !important
  }

  .flex-md-wrap {
    flex-wrap: wrap !important
  }

  .flex-md-nowrap {
    flex-wrap: nowrap !important
  }

  .flex-md-wrap-reverse {
    flex-wrap: wrap-reverse !important
  }

  .flex-md-fill {
    flex: 1 1 auto !important
  }

  .flex-md-grow-0 {
    flex-grow: 0 !important
  }

  .flex-md-grow-1 {
    flex-grow: 1 !important
  }

  .flex-md-shrink-0 {
    flex-shrink: 0 !important
  }

  .flex-md-shrink-1 {
    flex-shrink: 1 !important
  }

  .justify-content-md-start {
    justify-content: flex-start !important
  }

  .justify-content-md-end {
    justify-content: flex-end !important
  }

  .justify-content-md-center {
    justify-content: center !important
  }

  .justify-content-md-between {
    justify-content: space-between !important
  }

  .justify-content-md-around {
    justify-content: space-around !important
  }

  .align-items-md-start {
    align-items: flex-start !important
  }

  .align-items-md-end {
    align-items: flex-end !important
  }

  .align-items-md-center {
    align-items: center !important
  }

  .align-items-md-baseline {
    align-items: baseline !important
  }

  .align-items-md-stretch {
    align-items: stretch !important
  }

  .align-content-md-start {
    align-content: flex-start !important
  }

  .align-content-md-end {
    align-content: flex-end !important
  }

  .align-content-md-center {
    align-content: center !important
  }

  .align-content-md-between {
    align-content: space-between !important
  }

  .align-content-md-around {
    align-content: space-around !important
  }

  .align-content-md-stretch {
    align-content: stretch !important
  }

  .align-self-md-auto {
    align-self: auto !important
  }

  .align-self-md-start {
    align-self: flex-start !important
  }

  .align-self-md-end {
    align-self: flex-end !important
  }

  .align-self-md-center {
    align-self: center !important
  }

  .align-self-md-baseline {
    align-self: baseline !important
  }

  .align-self-md-stretch {
    align-self: stretch !important
  }
}

@media (min-width: 992px) {
  .flex-lg-row {
    flex-direction: row !important
  }

  .flex-lg-column {
    flex-direction: column !important
  }

  .flex-lg-row-reverse {
    flex-direction: row-reverse !important
  }

  .flex-lg-column-reverse {
    flex-direction: column-reverse !important
  }

  .flex-lg-wrap {
    flex-wrap: wrap !important
  }

  .flex-lg-nowrap {
    flex-wrap: nowrap !important
  }

  .flex-lg-wrap-reverse {
    flex-wrap: wrap-reverse !important
  }

  .flex-lg-fill {
    flex: 1 1 auto !important
  }

  .flex-lg-grow-0 {
    flex-grow: 0 !important
  }

  .flex-lg-grow-1 {
    flex-grow: 1 !important
  }

  .flex-lg-shrink-0 {
    flex-shrink: 0 !important
  }

  .flex-lg-shrink-1 {
    flex-shrink: 1 !important
  }

  .justify-content-lg-start {
    justify-content: flex-start !important
  }

  .justify-content-lg-end {
    justify-content: flex-end !important
  }

  .justify-content-lg-center {
    justify-content: center !important
  }

  .justify-content-lg-between {
    justify-content: space-between !important
  }

  .justify-content-lg-around {
    justify-content: space-around !important
  }

  .align-items-lg-start {
    align-items: flex-start !important
  }

  .align-items-lg-end {
    align-items: flex-end !important
  }

  .align-items-lg-center {
    align-items: center !important
  }

  .align-items-lg-baseline {
    align-items: baseline !important
  }

  .align-items-lg-stretch {
    align-items: stretch !important
  }

  .align-content-lg-start {
    align-content: flex-start !important
  }

  .align-content-lg-end {
    align-content: flex-end !important
  }

  .align-content-lg-center {
    align-content: center !important
  }

  .align-content-lg-between {
    align-content: space-between !important
  }

  .align-content-lg-around {
    align-content: space-around !important
  }

  .align-content-lg-stretch {
    align-content: stretch !important
  }

  .align-self-lg-auto {
    align-self: auto !important
  }

  .align-self-lg-start {
    align-self: flex-start !important
  }

  .align-self-lg-end {
    align-self: flex-end !important
  }

  .align-self-lg-center {
    align-self: center !important
  }

  .align-self-lg-baseline {
    align-self: baseline !important
  }

  .align-self-lg-stretch {
    align-self: stretch !important
  }
}

@media (min-width: 1200px) {
  .flex-xl-row {
    flex-direction: row !important
  }

  .flex-xl-column {
    flex-direction: column !important
  }

  .flex-xl-row-reverse {
    flex-direction: row-reverse !important
  }

  .flex-xl-column-reverse {
    flex-direction: column-reverse !important
  }

  .flex-xl-wrap {
    flex-wrap: wrap !important
  }

  .flex-xl-nowrap {
    flex-wrap: nowrap !important
  }

  .flex-xl-wrap-reverse {
    flex-wrap: wrap-reverse !important
  }

  .flex-xl-fill {
    flex: 1 1 auto !important
  }

  .flex-xl-grow-0 {
    flex-grow: 0 !important
  }

  .flex-xl-grow-1 {
    flex-grow: 1 !important
  }

  .flex-xl-shrink-0 {
    flex-shrink: 0 !important
  }

  .flex-xl-shrink-1 {
    flex-shrink: 1 !important
  }

  .justify-content-xl-start {
    justify-content: flex-start !important
  }

  .justify-content-xl-end {
    justify-content: flex-end !important
  }

  .justify-content-xl-center {
    justify-content: center !important
  }

  .justify-content-xl-between {
    justify-content: space-between !important
  }

  .justify-content-xl-around {
    justify-content: space-around !important
  }

  .align-items-xl-start {
    align-items: flex-start !important
  }

  .align-items-xl-end {
    align-items: flex-end !important
  }

  .align-items-xl-center {
    align-items: center !important
  }

  .align-items-xl-baseline {
    align-items: baseline !important
  }

  .align-items-xl-stretch {
    align-items: stretch !important
  }

  .align-content-xl-start {
    align-content: flex-start !important
  }

  .align-content-xl-end {
    align-content: flex-end !important
  }

  .align-content-xl-center {
    align-content: center !important
  }

  .align-content-xl-between {
    align-content: space-between !important
  }

  .align-content-xl-around {
    align-content: space-around !important
  }

  .align-content-xl-stretch {
    align-content: stretch !important
  }

  .align-self-xl-auto {
    align-self: auto !important
  }

  .align-self-xl-start {
    align-self: flex-start !important
  }

  .align-self-xl-end {
    align-self: flex-end !important
  }

  .align-self-xl-center {
    align-self: center !important
  }

  .align-self-xl-baseline {
    align-self: baseline !important
  }

  .align-self-xl-stretch {
    align-self: stretch !important
  }
}

.float-left {
  float: left !important
}

.float-right {
  float: right !important
}

.float-none {
  float: none !important
}

@media (min-width: 576px) {
  .float-sm-left {
    float: left !important
  }

  .float-sm-right {
    float: right !important
  }

  .float-sm-none {
    float: none !important
  }
}

@media (min-width: 768px) {
  .float-md-left {
    float: left !important
  }

  .float-md-right {
    float: right !important
  }

  .float-md-none {
    float: none !important
  }
}

@media (min-width: 992px) {
  .float-lg-left {
    float: left !important
  }

  .float-lg-right {
    float: right !important
  }

  .float-lg-none {
    float: none !important
  }
}

@media (min-width: 1200px) {
  .float-xl-left {
    float: left !important
  }

  .float-xl-right {
    float: right !important
  }

  .float-xl-none {
    float: none !important
  }
}

.overflow-auto {
  overflow: auto !important
}

.overflow-hidden {
  overflow: hidden !important
}

.position-static {
  position: static !important
}

.position-relative {
  position: relative !important
}

.position-absolute {
  position: absolute !important
}

.position-fixed {
  position: fixed !important
}

.position-sticky {
  position: sticky !important
}

.fixed-top {
  position: fixed;
  top: 0;
  right: 0;
  left: 0;
  z-index: 1030
}

.fixed-bottom {
  position: fixed;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1030
}

@supports (position: sticky) {
  .sticky-top {
    position: sticky;
    top: 0;
    z-index: 1020
  }
}

.sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  white-space: nowrap;
  border: 0
}

.sr-only-focusable:active,
.sr-only-focusable:focus {
  position: static;
  width: auto;
  height: auto;
  overflow: visible;
  clip: auto;
  white-space: normal
}

.shadow-sm {
  box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important
}

.shadow {
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important
}

.shadow-lg {
  box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important
}

.shadow-none {
  box-shadow: none !important
}

.w-25 {
  width: 25% !important
}

.w-50 {
  width: 50% !important
}

.w-75 {
  width: 75% !important
}

.w-100 {
  width: 100% !important
}

.w-auto {
  width: auto !important
}

.h-25 {
  height: 25% !important
}

.h-50 {
  height: 50% !important
}

.h-75 {
  height: 75% !important
}

.h-100 {
  height: 100% !important
}

.h-auto {
  height: auto !important
}

.mw-100 {
  max-width: 100% !important
}

.mh-100 {
  max-height: 100% !important
}

.min-vw-100 {
  min-width: 100vw !important
}

.min-vh-100 {
  min-height: 100vh !important
}

.vw-100 {
  width: 100vw !important
}

.vh-100 {
  height: 100vh !important
}

.m-0 {
  margin: 0 !important
}

.mt-0,
.my-0 {
  margin-top: 0 !important
}

.mr-0,
.mx-0 {
  margin-right: 0 !important
}

.mb-0,
.my-0 {
  margin-bottom: 0 !important
}

.ml-0,
.mx-0 {
  margin-left: 0 !important
}

.m-1 {
  margin: .25rem !important
}

.mt-1,
.my-1 {
  margin-top: .25rem !important
}

.mr-1,
.mx-1 {
  margin-right: .25rem !important
}

.mb-1,
.my-1 {
  margin-bottom: .25rem !important
}

.ml-1,
.mx-1 {
  margin-left: .25rem !important
}

.m-2 {
  margin: .5rem !important
}

.mt-2,
.my-2 {
  margin-top: .5rem !important
}

.mr-2,
.mx-2 {
  margin-right: .5rem !important
}

.mb-2,
.my-2 {
  margin-bottom: .5rem !important
}

.ml-2,
.mx-2 {
  margin-left: .5rem !important
}

.m-3 {
  margin: 1rem !important
}

.mt-3,
.my-3 {
  margin-top: 1rem !important
}

.mr-3,
.mx-3 {
  margin-right: 1rem !important
}

.mb-3,
.my-3 {
  margin-bottom: 1rem !important
}

.ml-3,
.mx-3 {
  margin-left: 1rem !important
}

.m-4 {
  margin: 1.5rem !important
}

.mt-4,
.my-4 {
  margin-top: 1.5rem !important
}

.mr-4,
.mx-4 {
  margin-right: 1.5rem !important
}

.mb-4,
.my-4 {
  margin-bottom: 1.5rem !important
}

.ml-4,
.mx-4 {
  margin-left: 1.5rem !important
}

.m-5 {
  margin: 3rem !important
}

.mt-5,
.my-5 {
  margin-top: 3rem !important
}

.mr-5,
.mx-5 {
  margin-right: 3rem !important
}

.mb-5,
.my-5 {
  margin-bottom: 3rem !important
}

.ml-5,
.mx-5 {
  margin-left: 3rem !important
}

.p-0 {
  padding: 0 !important
}

.pt-0,
.py-0 {
  padding-top: 0 !important
}

.pr-0,
.px-0 {
  padding-right: 0 !important
}

.pb-0,
.py-0 {
  padding-bottom: 0 !important
}

.pl-0,
.px-0 {
  padding-left: 0 !important
}

.p-1 {
  padding: .25rem !important
}

.pt-1,
.py-1 {
  padding-top: .25rem !important
}

.pr-1,
.px-1 {
  padding-right: .25rem !important
}

.pb-1,
.py-1 {
  padding-bottom: .25rem !important
}

.pl-1,
.px-1 {
  padding-left: .25rem !important
}

.p-2 {
  padding: .5rem !important
}

.pt-2,
.py-2 {
  padding-top: .5rem !important
}

.pr-2,
.px-2 {
  padding-right: .5rem !important
}

.pb-2,
.py-2 {
  padding-bottom: .5rem !important
}

.pl-2,
.px-2 {
  padding-left: .5rem !important
}

.p-3 {
  padding: 1rem !important
}

.pt-3,
.py-3 {
  padding-top: 1rem !important
}

.pr-3,
.px-3 {
  padding-right: 1rem !important
}

.pb-3,
.py-3 {
  padding-bottom: 1rem !important
}

.pl-3,
.px-3 {
  padding-left: 1rem !important
}

.p-4 {
  padding: 1.5rem !important
}

.pt-4,
.py-4 {
  padding-top: 1.5rem !important
}

.pr-4,
.px-4 {
  padding-right: 1.5rem !important
}

.pb-4,
.py-4 {
  padding-bottom: 1.5rem !important
}

.pl-4,
.px-4 {
  padding-left: 1.5rem !important
}

.p-5 {
  padding: 3rem !important
}

.pt-5,
.py-5 {
  padding-top: 3rem !important
}

.pr-5,
.px-5 {
  padding-right: 3rem !important
}

.pb-5,
.py-5 {
  padding-bottom: 3rem !important
}

.pl-5,
.px-5 {
  padding-left: 3rem !important
}

.m-n1 {
  margin: -.25rem !important
}

.mt-n1,
.my-n1 {
  margin-top: -.25rem !important
}

.mr-n1,
.mx-n1 {
  margin-right: -.25rem !important
}

.mb-n1,
.my-n1 {
  margin-bottom: -.25rem !important
}

.ml-n1,
.mx-n1 {
  margin-left: -.25rem !important
}

.m-n2 {
  margin: -.5rem !important
}

.mt-n2,
.my-n2 {
  margin-top: -.5rem !important
}

.mr-n2,
.mx-n2 {
  margin-right: -.5rem !important
}

.mb-n2,
.my-n2 {
  margin-bottom: -.5rem !important
}

.ml-n2,
.mx-n2 {
  margin-left: -.5rem !important
}

.m-n3 {
  margin: -1rem !important
}

.mt-n3,
.my-n3 {
  margin-top: -1rem !important
}

.mr-n3,
.mx-n3 {
  margin-right: -1rem !important
}

.mb-n3,
.my-n3 {
  margin-bottom: -1rem !important
}

.ml-n3,
.mx-n3 {
  margin-left: -1rem !important
}

.m-n4 {
  margin: -1.5rem !important
}

.mt-n4,
.my-n4 {
  margin-top: -1.5rem !important
}

.mr-n4,
.mx-n4 {
  margin-right: -1.5rem !important
}

.mb-n4,
.my-n4 {
  margin-bottom: -1.5rem !important
}

.ml-n4,
.mx-n4 {
  margin-left: -1.5rem !important
}

.m-n5 {
  margin: -3rem !important
}

.mt-n5,
.my-n5 {
  margin-top: -3rem !important
}

.mr-n5,
.mx-n5 {
  margin-right: -3rem !important
}

.mb-n5,
.my-n5 {
  margin-bottom: -3rem !important
}

.ml-n5,
.mx-n5 {
  margin-left: -3rem !important
}

.m-auto {
  margin: auto !important
}

.mt-auto,
.my-auto {
  margin-top: auto !important
}

.mr-auto,
.mx-auto {
  margin-right: auto !important

}

.mb-auto,
.my-auto {
  margin-bottom: auto !important
}

.ml-auto,
.mx-auto {
  margin-left: auto !important
}

@media (min-width: 576px) {
  .m-sm-0 {
    margin: 0 !important
  }

  .mt-sm-0,
  .my-sm-0 {
    margin-top: 0 !important
  }

  .mr-sm-0,
  .mx-sm-0 {
    margin-right: 0 !important
  }

  .mb-sm-0,
  .my-sm-0 {
    margin-bottom: 0 !important
  }

  .ml-sm-0,
  .mx-sm-0 {
    margin-left: 0 !important
  }

  .m-sm-1 {
    margin: .25rem !important
  }

  .mt-sm-1,
  .my-sm-1 {
    margin-top: .25rem !important
  }

  .mr-sm-1,
  .mx-sm-1 {
    margin-right: .25rem !important
  }

  .mb-sm-1,
  .my-sm-1 {
    margin-bottom: .25rem !important
  }

  .ml-sm-1,
  .mx-sm-1 {
    margin-left: .25rem !important
  }

  .m-sm-2 {
    margin: .5rem !important
  }

  .mt-sm-2,
  .my-sm-2 {
    margin-top: .5rem !important
  }

  .mr-sm-2,
  .mx-sm-2 {
    margin-right: .5rem !important
  }

  .mb-sm-2,
  .my-sm-2 {
    margin-bottom: .5rem !important
  }

  .ml-sm-2,
  .mx-sm-2 {
    margin-left: .5rem !important
  }

  .m-sm-3 {
    margin: 1rem !important
  }

  .mt-sm-3,
  .my-sm-3 {
    margin-top: 1rem !important
  }

  .mr-sm-3,
  .mx-sm-3 {
    margin-right: 1rem !important
  }

  .mb-sm-3,
  .my-sm-3 {
    margin-bottom: 1rem !important
  }

  .ml-sm-3,
  .mx-sm-3 {
    margin-left: 1rem !important
  }

  .m-sm-4 {
    margin: 1.5rem !important
  }

  .mt-sm-4,
  .my-sm-4 {
    margin-top: 1.5rem !important
  }

  .mr-sm-4,
  .mx-sm-4 {
    margin-right: 1.5rem !important
  }

  .mb-sm-4,
  .my-sm-4 {
    margin-bottom: 1.5rem !important
  }

  .ml-sm-4,
  .mx-sm-4 {
    margin-left: 1.5rem !important
  }

  .m-sm-5 {
    margin: 3rem !important
  }

  .mt-sm-5,
  .my-sm-5 {
    margin-top: 3rem !important
  }

  .mr-sm-5,
  .mx-sm-5 {
    margin-right: 3rem !important
  }

  .mb-sm-5,
  .my-sm-5 {
    margin-bottom: 3rem !important
  }

  .ml-sm-5,
  .mx-sm-5 {
    margin-left: 3rem !important
  }

  .p-sm-0 {
    padding: 0 !important
  }

  .pt-sm-0,
  .py-sm-0 {
    padding-top: 0 !important
  }

  .pr-sm-0,
  .px-sm-0 {
    padding-right: 0 !important
  }

  .pb-sm-0,
  .py-sm-0 {
    padding-bottom: 0 !important
  }

  .pl-sm-0,
  .px-sm-0 {
    padding-left: 0 !important
  }

  .p-sm-1 {
    padding: .25rem !important
  }

  .pt-sm-1,
  .py-sm-1 {
    padding-top: .25rem !important
  }

  .pr-sm-1,
  .px-sm-1 {
    padding-right: .25rem !important
  }

  .pb-sm-1,
  .py-sm-1 {
    padding-bottom: .25rem !important
  }

  .pl-sm-1,
  .px-sm-1 {
    padding-left: .25rem !important
  }

  .p-sm-2 {
    padding: .5rem !important
  }

  .pt-sm-2,
  .py-sm-2 {
    padding-top: .5rem !important
  }

  .pr-sm-2,
  .px-sm-2 {
    padding-right: .5rem !important
  }

  .pb-sm-2,
  .py-sm-2 {
    padding-bottom: .5rem !important
  }

  .pl-sm-2,
  .px-sm-2 {
    padding-left: .5rem !important
  }

  .p-sm-3 {
    padding: 1rem !important
  }

  .pt-sm-3,
  .py-sm-3 {
    padding-top: 1rem !important
  }

  .pr-sm-3,
  .px-sm-3 {
    padding-right: 1rem !important
  }

  .pb-sm-3,
  .py-sm-3 {
    padding-bottom: 1rem !important
  }

  .pl-sm-3,
  .px-sm-3 {
    padding-left: 1rem !important
  }

  .p-sm-4 {
    padding: 1.5rem !important
  }

  .pt-sm-4,
  .py-sm-4 {
    padding-top: 1.5rem !important
  }

  .pr-sm-4,
  .px-sm-4 {
    padding-right: 1.5rem !important
  }

  .pb-sm-4,
  .py-sm-4 {
    padding-bottom: 1.5rem !important
  }

  .pl-sm-4,
  .px-sm-4 {
    padding-left: 1.5rem !important
  }

  .p-sm-5 {
    padding: 3rem !important
  }

  .pt-sm-5,
  .py-sm-5 {
    padding-top: 3rem !important
  }

  .pr-sm-5,
  .px-sm-5 {
    padding-right: 3rem !important
  }

  .pb-sm-5,
  .py-sm-5 {
    padding-bottom: 3rem !important
  }

  .pl-sm-5,
  .px-sm-5 {
    padding-left: 3rem !important
  }

  .m-sm-n1 {

    margin: -.25rem !important
  }

  .mt-sm-n1,
  .my-sm-n1 {
    margin-top: -.25rem !important
  }

  .mr-sm-n1,
  .mx-sm-n1 {
    margin-right: -.25rem !important
  }

  .mb-sm-n1,
  .my-sm-n1 {
    margin-bottom: -.25rem !important
  }

  .ml-sm-n1,
  .mx-sm-n1 {
    margin-left: -.25rem !important
  }

  .m-sm-n2 {
    margin: -.5rem !important
  }

  .mt-sm-n2,
  .my-sm-n2 {
    margin-top: -.5rem !important
  }

  .mr-sm-n2,
  .mx-sm-n2 {
    margin-right: -.5rem !important
  }

  .mb-sm-n2,
  .my-sm-n2 {
    margin-bottom: -.5rem !important
  }

  .ml-sm-n2,
  .mx-sm-n2 {
    margin-left: -.5rem !important
  }

  .m-sm-n3 {
    margin: -1rem !important
  }

  .mt-sm-n3,
  .my-sm-n3 {
    margin-top: -1rem !important
  }

  .mr-sm-n3,
  .mx-sm-n3 {
    margin-right: -1rem !important
  }

  .mb-sm-n3,
  .my-sm-n3 {
    margin-bottom: -1rem !important
  }

  .ml-sm-n3,
  .mx-sm-n3 {
    margin-left: -1rem !important
  }

  .m-sm-n4 {
    margin: -1.5rem !important
  }

  .mt-sm-n4,
  .my-sm-n4 {
    margin-top: -1.5rem !important
  }

  .mr-sm-n4,
  .mx-sm-n4 {
    margin-right: -1.5rem !important
  }

  .mb-sm-n4,
  .my-sm-n4 {
    margin-bottom: -1.5rem !important
  }

  .ml-sm-n4,
  .mx-sm-n4 {
    margin-left: -1.5rem !important
  }

  .m-sm-n5 {
    margin: -3rem !important
  }

  .mt-sm-n5,
  .my-sm-n5 {
    margin-top: -3rem !important
  }

  .mr-sm-n5,
  .mx-sm-n5 {
    margin-right: -3rem !important
  }

  .mb-sm-n5,
  .my-sm-n5 {
    margin-bottom: -3rem !important
  }

  .ml-sm-n5,
  .mx-sm-n5 {
    margin-left: -3rem !important
  }

  .m-sm-auto {
    margin: auto !important
  }

  .mt-sm-auto,
  .my-sm-auto {
    margin-top: auto !important
  }

  .mr-sm-auto,
  .mx-sm-auto {
    margin-right: auto !important
  }

  .mb-sm-auto,
  .my-sm-auto {
    margin-bottom: auto !important
  }

  .ml-sm-auto,
  .mx-sm-auto {
    margin-left: auto !important
  }
}

@media (min-width: 768px) {
  .m-md-0 {
    margin: 0 !important
  }

  .mt-md-0,
  .my-md-0 {
    margin-top: 0 !important
  }

  .mr-md-0,
  .mx-md-0 {
    margin-right: 0 !important
  }

  .mb-md-0,
  .my-md-0 {
    margin-bottom: 0 !important
  }

  .ml-md-0,
  .mx-md-0 {
    margin-left: 0 !important
  }

  .m-md-1 {
    margin: .25rem !important
  }

  .mt-md-1,
  .my-md-1 {
    margin-top: .25rem !important
  }

  .mr-md-1,
  .mx-md-1 {
    margin-right: .25rem !important
  }

  .mb-md-1,
  .my-md-1 {
    margin-bottom: .25rem !important
  }

  .ml-md-1,
  .mx-md-1 {
    margin-left: .25rem !important
  }

  .m-md-2 {
    margin: .5rem !important
  }

  .mt-md-2,
  .my-md-2 {
    margin-top: .5rem !important
  }

  .mr-md-2,
  .mx-md-2 {
    margin-right: .5rem !important
  }

  .mb-md-2,
  .my-md-2 {
    margin-bottom: .5rem !important
  }

  .ml-md-2,
  .mx-md-2 {
    margin-left: .5rem !important

  }

  .m-md-3 {
    margin: 1rem !important
  }

  .mt-md-3,
  .my-md-3 {
    margin-top: 1rem !important
  }

  .mr-md-3,
  .mx-md-3 {
    margin-right: 1rem !important
  }

  .mb-md-3,
  .my-md-3 {
    margin-bottom: 1rem !important
  }

  .ml-md-3,
  .mx-md-3 {
    margin-left: 1rem !important
  }

  .m-md-4 {
    margin: 1.5rem !important
  }

  .mt-md-4,
  .my-md-4 {
    margin-top: 1.5rem !important
  }

  .mr-md-4,
  .mx-md-4 {
    margin-right: 1.5rem !important
  }

  .mb-md-4,
  .my-md-4 {
    margin-bottom: 1.5rem !important
  }

  .ml-md-4,
  .mx-md-4 {
    margin-left: 1.5rem !important
  }

  .m-md-5 {
    margin: 3rem !important
  }

  .mt-md-5,
  .my-md-5 {
    margin-top: 3rem !important
  }

  .mr-md-5,
  .mx-md-5 {
    margin-right: 3rem !important
  }

  .mb-md-5,
  .my-md-5 {
    margin-bottom: 3rem !important
  }

  .ml-md-5,
  .mx-md-5 {
    margin-left: 3rem !important
  }

  .p-md-0 {
    padding: 0 !important
  }

  .pt-md-0,
  .py-md-0 {
    padding-top: 0 !important
  }

  .pr-md-0,
  .px-md-0 {
    padding-right: 0 !important
  }

  .pb-md-0,
  .py-md-0 {
    padding-bottom: 0 !important
  }

  .pl-md-0,
  .px-md-0 {
    padding-left: 0 !important
  }

  .p-md-1 {
    padding: .25rem !important
  }

  .pt-md-1,
  .py-md-1 {
    padding-top: .25rem !important
  }

  .pr-md-1,
  .px-md-1 {
    padding-right: .25rem !important
  }

  .pb-md-1,
  .py-md-1 {
    padding-bottom: .25rem !important
  }

  .pl-md-1,
  .px-md-1 {
    padding-left: .25rem !important
  }

  .p-md-2 {
    padding: .5rem !important
  }

  .pt-md-2,
  .py-md-2 {
    padding-top: .5rem !important
  }

  .pr-md-2,
  .px-md-2 {
    padding-right: .5rem !important
  }

  .pb-md-2,
  .py-md-2 {
    padding-bottom: .5rem !important
  }

  .pl-md-2,
  .px-md-2 {
    padding-left: .5rem !important
  }

  .p-md-3 {
    padding: 1rem !important
  }

  .pt-md-3,
  .py-md-3 {
    padding-top: 1rem !important
  }

  .pr-md-3,
  .px-md-3 {
    padding-right: 1rem !important
  }

  .pb-md-3,
  .py-md-3 {
    padding-bottom: 1rem !important
  }

  .pl-md-3,
  .px-md-3 {
    padding-left: 1rem !important
  }

  .p-md-4 {
    padding: 1.5rem !important
  }

  .pt-md-4,
  .py-md-4 {
    padding-top: 1.5rem !important
  }

  .pr-md-4,
  .px-md-4 {
    padding-right: 1.5rem !important
  }

  .pb-md-4,
  .py-md-4 {
    padding-bottom: 1.5rem !important
  }

  .pl-md-4,
  .px-md-4 {
    padding-left: 1.5rem !important
  }

  .p-md-5 {
    padding: 3rem !important
  }

  .pt-md-5,
  .py-md-5 {
    padding-top: 3rem !important
  }

  .pr-md-5,
  .px-md-5 {
    padding-right: 3rem !important
  }

  .pb-md-5,
  .py-md-5 {
    padding-bottom: 3rem !important
  }

  .pl-md-5,
  .px-md-5 {
    padding-left: 3rem !important
  }

  .m-md-n1 {
    margin: -.25rem !important
  }

  .mt-md-n1,
  .my-md-n1 {
    margin-top: -.25rem !important
  }

  .mr-md-n1,
  .mx-md-n1 {
    margin-right: -.25rem !important
  }

  .mb-md-n1,
  .my-md-n1 {
    margin-bottom: -.25rem !important
  }

  .ml-md-n1,
  .mx-md-n1 {
    margin-left: -.25rem !important
  }

  .m-md-n2 {
    margin: -.5rem !important
  }

  .mt-md-n2,
  .my-md-n2 {
    margin-top: -.5rem !important
  }

  .mr-md-n2,
  .mx-md-n2 {
    margin-right: -.5rem !important
  }

  .mb-md-n2,
  .my-md-n2 {
    margin-bottom: -.5rem !important
  }

  .ml-md-n2,
  .mx-md-n2 {
    margin-left: -.5rem !important
  }

  .m-md-n3 {
    margin: -1rem !important
  }

  .mt-md-n3,
  .my-md-n3 {
    margin-top: -1rem !important
  }

  .mr-md-n3,
  .mx-md-n3 {
    margin-right: -1rem !important
  }

  .mb-md-n3,
  .my-md-n3 {
    margin-bottom: -1rem !important
  }

  .ml-md-n3,
  .mx-md-n3 {
    margin-left: -1rem !important
  }

  .m-md-n4 {
    margin: -1.5rem !important
  }

  .mt-md-n4,
  .my-md-n4 {
    margin-top: -1.5rem !important
  }

  .mr-md-n4,
  .mx-md-n4 {
    margin-right: -1.5rem !important
  }

  .mb-md-n4,
  .my-md-n4 {
    margin-bottom: -1.5rem !important
  }

  .ml-md-n4,
  .mx-md-n4 {
    margin-left: -1.5rem !important
  }

  .m-md-n5 {
    margin: -3rem !important
  }

  .mt-md-n5,
  .my-md-n5 {
    margin-top: -3rem !important
  }

  .mr-md-n5,
  .mx-md-n5 {
    margin-right: -3rem !important
  }

  .mb-md-n5,
  .my-md-n5 {
    margin-bottom: -3rem !important
  }

  .ml-md-n5,
  .mx-md-n5 {
    margin-left: -3rem !important
  }

  .m-md-auto {
    margin: auto !important
  }

  .mt-md-auto,
  .my-md-auto {
    margin-top: auto !important
  }

  .mr-md-auto,
  .mx-md-auto {
    margin-right: auto !important
  }

  .mb-md-auto,
  .my-md-auto {
    margin-bottom: auto !important
  }

  .ml-md-auto,
  .mx-md-auto {
    margin-left: auto !important
  }
}

@media (min-width: 992px) {
  .m-lg-0 {
    margin: 0 !important
  }

  .mt-lg-0,
  .my-lg-0 {
    margin-top: 0 !important
  }

  .mr-lg-0,
  .mx-lg-0 {
    margin-right: 0 !important
  }

  .mb-lg-0,
  .my-lg-0 {
    margin-bottom: 0 !important
  }

  .ml-lg-0,
  .mx-lg-0 {
    margin-left: 0 !important
  }

  .m-lg-1 {
    margin: .25rem !important
  }

  .mt-lg-1,
  .my-lg-1 {
    margin-top: .25rem !important
  }

  .mr-lg-1,
  .mx-lg-1 {
    margin-right: .25rem !important
  }

  .mb-lg-1,
  .my-lg-1 {
    margin-bottom: .25rem !important
  }

  .ml-lg-1,
  .mx-lg-1 {
    margin-left: .25rem !important
  }

  .m-lg-2 {
    margin: .5rem !important
  }

  .mt-lg-2,
  .my-lg-2 {
    margin-top: .5rem !important
  }

  .mr-lg-2,
  .mx-lg-2 {
    margin-right: .5rem !important
  }

  .mb-lg-2,
  .my-lg-2 {
    margin-bottom: .5rem !important
  }

  .ml-lg-2,
  .mx-lg-2 {
    margin-left: .5rem !important
  }

  .m-lg-3 {
    margin: 1rem !important
  }

  .mt-lg-3,
  .my-lg-3 {
    margin-top: 1rem !important
  }

  .mr-lg-3,
  .mx-lg-3 {
    margin-right: 1rem !important
  }

  .mb-lg-3,
  .my-lg-3 {
    margin-bottom: 1rem !important
  }

  .ml-lg-3,
  .mx-lg-3 {
    margin-left: 1rem !important
  }

  .m-lg-4 {
    margin: 1.5rem !important
  }

  .mt-lg-4,
  .my-lg-4 {
    margin-top: 1.5rem !important
  }

  .mr-lg-4,
  .mx-lg-4 {
    margin-right: 1.5rem !important
  }

  .mb-lg-4,
  .my-lg-4 {
    margin-bottom: 1.5rem !important
  }

  .ml-lg-4,
  .mx-lg-4 {
    margin-left: 1.5rem !important
  }

  .m-lg-5 {
    margin: 3rem !important
  }

  .mt-lg-5,
  .my-lg-5 {
    margin-top: 3rem !important
  }

  .mr-lg-5,
  .mx-lg-5 {
    margin-right: 3rem !important
  }

  .mb-lg-5,
  .my-lg-5 {
    margin-bottom: 3rem !important
  }

  .ml-lg-5,
  .mx-lg-5 {
    margin-left: 3rem !important
  }

  .p-lg-0 {
    padding: 0 !important
  }

  .pt-lg-0,
  .py-lg-0 {
    padding-top: 0 !important
  }

  .pr-lg-0,
  .px-lg-0 {
    padding-right: 0 !important
  }

  .pb-lg-0,
  .py-lg-0 {
    padding-bottom: 0 !important
  }

  .pl-lg-0,
  .px-lg-0 {
    padding-left: 0 !important
  }

  .p-lg-1 {
    padding: .25rem !important
  }

  .pt-lg-1,
  .py-lg-1 {
    padding-top: .25rem !important
  }

  .pr-lg-1,
  .px-lg-1 {
    padding-right: .25rem !important
  }

  .pb-lg-1,
  .py-lg-1 {
    padding-bottom: .25rem !important
  }

  .pl-lg-1,
  .px-lg-1 {
    padding-left: .25rem !important
  }

  .p-lg-2 {
    padding: .5rem !important
  }

  .pt-lg-2,
  .py-lg-2 {
    padding-top: .5rem !important
  }

  .pr-lg-2,
  .px-lg-2 {
    padding-right: .5rem !important
  }

  .pb-lg-2,
  .py-lg-2 {
    padding-bottom: .5rem !important
  }

  .pl-lg-2,
  .px-lg-2 {
    padding-left: .5rem !important
  }

  .p-lg-3 {
    padding: 1rem !important
  }

  .pt-lg-3,
  .py-lg-3 {
    padding-top: 1rem !important
  }

  .pr-lg-3,
  .px-lg-3 {
    padding-right: 1rem !important
  }

  .pb-lg-3,
  .py-lg-3 {
    padding-bottom: 1rem !important
  }

  .pl-lg-3,
  .px-lg-3 {
    padding-left: 1rem !important
  }

  .p-lg-4 {
    padding: 1.5rem !important
  }

  .pt-lg-4,
  .py-lg-4 {
    padding-top: 1.5rem !important
  }

  .pr-lg-4,
  .px-lg-4 {
    padding-right: 1.5rem !important
  }

  .pb-lg-4,
  .py-lg-4 {
    padding-bottom: 1.5rem !important
  }

  .pl-lg-4,
  .px-lg-4 {
    padding-left: 1.5rem !important
  }

  .p-lg-5 {
    padding: 3rem !important
  }

  .pt-lg-5,
  .py-lg-5 {
    padding-top: 3rem !important
  }

  .pr-lg-5,
  .px-lg-5 {
    padding-right: 3rem !important
  }

  .pb-lg-5,
  .py-lg-5 {
    padding-bottom: 3rem !important
  }

  .pl-lg-5,
  .px-lg-5 {
    padding-left: 3rem !important
  }

  .m-lg-n1 {
    margin: -.25rem !important
  }

  .mt-lg-n1,
  .my-lg-n1 {
    margin-top: -.25rem !important
  }

  .mr-lg-n1,
  .mx-lg-n1 {
    margin-right: -.25rem !important
  }

  .mb-lg-n1,
  .my-lg-n1 {
    margin-bottom: -.25rem !important
  }

  .ml-lg-n1,
  .mx-lg-n1 {
    margin-left: -.25rem !important
  }

  .m-lg-n2 {
    margin: -.5rem !important
  }

  .mt-lg-n2,
  .my-lg-n2 {
    margin-top: -.5rem !important
  }

  .mr-lg-n2,
  .mx-lg-n2 {
    margin-right: -.5rem !important
  }

  .mb-lg-n2,
  .my-lg-n2 {
    margin-bottom: -.5rem !important
  }

  .ml-lg-n2,
  .mx-lg-n2 {
    margin-left: -.5rem !important
  }

  .m-lg-n3 {
    margin: -1rem !important
  }

  .mt-lg-n3,
  .my-lg-n3 {
    margin-top: -1rem !important
  }

  .mr-lg-n3,
  .mx-lg-n3 {
    margin-right: -1rem !important
  }

  .mb-lg-n3,
  .my-lg-n3 {
    margin-bottom: -1rem !important
  }

  .ml-lg-n3,
  .mx-lg-n3 {
    margin-left: -1rem !important
  }

  .m-lg-n4 {
    margin: -1.5rem !important
  }

  .mt-lg-n4,
  .my-lg-n4 {
    margin-top: -1.5rem !important
  }

  .mr-lg-n4,
  .mx-lg-n4 {
    margin-right: -1.5rem !important
  }

  .mb-lg-n4,
  .my-lg-n4 {
    margin-bottom: -1.5rem !important
  }

  .ml-lg-n4,
  .mx-lg-n4 {
    margin-left: -1.5rem !important
  }

  .m-lg-n5 {
    margin: -3rem !important
  }

  .mt-lg-n5,
  .my-lg-n5 {
    margin-top: -3rem !important
  }

  .mr-lg-n5,
  .mx-lg-n5 {
    margin-right: -3rem !important
  }

  .mb-lg-n5,
  .my-lg-n5 {
    margin-bottom: -3rem !important
  }

  .ml-lg-n5,
  .mx-lg-n5 {
    margin-left: -3rem !important
  }

  .m-lg-auto {
    margin: auto !important
  }

  .mt-lg-auto,
  .my-lg-auto {
    margin-top: auto !important
  }

  .mr-lg-auto,
  .mx-lg-auto {
    margin-right: auto !important
  }

  .mb-lg-auto,
  .my-lg-auto {
    margin-bottom: auto !important
  }

  .ml-lg-auto,
  .mx-lg-auto {
    margin-left: auto !important
  }
}

@media (min-width: 1200px) {
  .m-xl-0 {
    margin: 0 !important
  }

  .mt-xl-0,
  .my-xl-0 {
    margin-top: 0 !important
  }

  .mr-xl-0,
  .mx-xl-0 {
    margin-right: 0 !important
  }

  .mb-xl-0,
  .my-xl-0 {
    margin-bottom: 0 !important
  }

  .ml-xl-0,
  .mx-xl-0 {
    margin-left: 0 !important
  }

  .m-xl-1 {
    margin: .25rem !important
  }

  .mt-xl-1,
  .my-xl-1 {
    margin-top: .25rem !important
  }

  .mr-xl-1,
  .mx-xl-1 {
    margin-right: .25rem !important
  }

  .mb-xl-1,
  .my-xl-1 {
    margin-bottom: .25rem !important
  }

  .ml-xl-1,
  .mx-xl-1 {
    margin-left: .25rem !important
  }

  .m-xl-2 {
    margin: .5rem !important
  }

  .mt-xl-2,
  .my-xl-2 {
    margin-top: .5rem !important
  }

  .mr-xl-2,
  .mx-xl-2 {
    margin-right: .5rem !important
  }

  .mb-xl-2,
  .my-xl-2 {
    margin-bottom: .5rem !important
  }

  .ml-xl-2,
  .mx-xl-2 {
    margin-left: .5rem !important
  }

  .m-xl-3 {
    margin: 1rem !important
  }

  .mt-xl-3,
  .my-xl-3 {
    margin-top: 1rem !important
  }

  .mr-xl-3,
  .mx-xl-3 {
    margin-right: 1rem !important
  }

  .mb-xl-3,
  .my-xl-3 {
    margin-bottom: 1rem !important
  }

  .ml-xl-3,
  .mx-xl-3 {
    margin-left: 1rem !important
  }

  .m-xl-4 {
    margin: 1.5rem !important
  }

  .mt-xl-4,
  .my-xl-4 {
    margin-top: 1.5rem !important
  }

  .mr-xl-4,
  .mx-xl-4 {
    margin-right: 1.5rem !important
  }

  .mb-xl-4,
  .my-xl-4 {
    margin-bottom: 1.5rem !important
  }

  .ml-xl-4,
  .mx-xl-4 {
    margin-left: 1.5rem !important
  }

  .m-xl-5 {
    margin: 3rem !important
  }

  .mt-xl-5,
  .my-xl-5 {
    margin-top: 3rem !important
  }

  .mr-xl-5,
  .mx-xl-5 {
    margin-right: 3rem !important
  }

  .mb-xl-5,
  .my-xl-5 {
    margin-bottom: 3rem !important
  }

  .ml-xl-5,
  .mx-xl-5 {
    margin-left: 3rem !important
  }

  .p-xl-0 {
    padding: 0 !important
  }

  .pt-xl-0,
  .py-xl-0 {
    padding-top: 0 !important
  }

  .pr-xl-0,
  .px-xl-0 {
    padding-right: 0 !important
  }

  .pb-xl-0,
  .py-xl-0 {
    padding-bottom: 0 !important
  }

  .pl-xl-0,
  .px-xl-0 {
    padding-left: 0 !important
  }

  .p-xl-1 {
    padding: .25rem !important
  }

  .pt-xl-1,
  .py-xl-1 {
    padding-top: .25rem !important
  }

  .pr-xl-1,
  .px-xl-1 {
    padding-right: .25rem !important
  }

  .pb-xl-1,
  .py-xl-1 {
    padding-bottom: .25rem !important
  }

  .pl-xl-1,
  .px-xl-1 {
    padding-left: .25rem !important
  }

  .p-xl-2 {
    padding: .5rem !important
  }

  .pt-xl-2,
  .py-xl-2 {
    padding-top: .5rem !important
  }

  .pr-xl-2,
  .px-xl-2 {
    padding-right: .5rem !important
  }

  .pb-xl-2,
  .py-xl-2 {
    padding-bottom: .5rem !important
  }

  .pl-xl-2,
  .px-xl-2 {
    padding-left: .5rem !important
  }

  .p-xl-3 {
    padding: 1rem !important
  }

  .pt-xl-3,
  .py-xl-3 {
    padding-top: 1rem !important
  }

  .pr-xl-3,
  .px-xl-3 {
    padding-right: 1rem !important
  }

  .pb-xl-3,
  .py-xl-3 {
    padding-bottom: 1rem !important
  }

  .pl-xl-3,
  .px-xl-3 {
    padding-left: 1rem !important
  }

  .p-xl-4 {
    padding: 1.5rem !important
  }

  .pt-xl-4,
  .py-xl-4 {
    padding-top: 1.5rem !important
  }

  .pr-xl-4,
  .px-xl-4 {
    padding-right: 1.5rem !important
  }

  .pb-xl-4,
  .py-xl-4 {
    padding-bottom: 1.5rem !important
  }

  .pl-xl-4,
  .px-xl-4 {
    padding-left: 1.5rem !important
  }

  .p-xl-5 {
    padding: 3rem !important
  }

  .pt-xl-5,
  .py-xl-5 {
    padding-top: 3rem !important
  }

  .pr-xl-5,
  .px-xl-5 {
    padding-right: 3rem !important
  }

  .pb-xl-5,
  .py-xl-5 {
    padding-bottom: 3rem !important
  }

  .pl-xl-5,
  .px-xl-5 {
    padding-left: 3rem !important
  }

  .m-xl-n1 {
    margin: -.25rem !important
  }

  .mt-xl-n1,
  .my-xl-n1 {
    margin-top: -.25rem !important
  }

  .mr-xl-n1,
  .mx-xl-n1 {
    margin-right: -.25rem !important
  }

  .mb-xl-n1,
  .my-xl-n1 {
    margin-bottom: -.25rem !important
  }

  .ml-xl-n1,
  .mx-xl-n1 {
    margin-left: -.25rem !important
  }

  .m-xl-n2 {
    margin: -.5rem !important
  }

  .mt-xl-n2,
  .my-xl-n2 {
    margin-top: -.5rem !important
  }

  .mr-xl-n2,
  .mx-xl-n2 {
    margin-right: -.5rem !important
  }

  .mb-xl-n2,
  .my-xl-n2 {
    margin-bottom: -.5rem !important
  }

  .ml-xl-n2,
  .mx-xl-n2 {
    margin-left: -.5rem !important
  }

  .m-xl-n3 {
    margin: -1rem !important
  }

  .mt-xl-n3,
  .my-xl-n3 {
    margin-top: -1rem !important
  }

  .mr-xl-n3,
  .mx-xl-n3 {
    margin-right: -1rem !important
  }

  .mb-xl-n3,
  .my-xl-n3 {
    margin-bottom: -1rem !important
  }

  .ml-xl-n3,
  .mx-xl-n3 {
    margin-left: -1rem !important
  }

  .m-xl-n4 {
    margin: -1.5rem !important
  }

  .mt-xl-n4,
  .my-xl-n4 {
    margin-top: -1.5rem !important
  }

  .mr-xl-n4,
  .mx-xl-n4 {
    margin-right: -1.5rem !important
  }

  .mb-xl-n4,
  .my-xl-n4 {
    margin-bottom: -1.5rem !important
  }

  .ml-xl-n4,
  .mx-xl-n4 {
    margin-left: -1.5rem !important
  }

  .m-xl-n5 {
    margin: -3rem !important
  }

  .mt-xl-n5,
  .my-xl-n5 {
    margin-top: -3rem !important
  }

  .mr-xl-n5,
  .mx-xl-n5 {
    margin-right: -3rem !important
  }

  .mb-xl-n5,
  .my-xl-n5 {
    margin-bottom: -3rem !important
  }

  .ml-xl-n5,
  .mx-xl-n5 {
    margin-left: -3rem !important
  }

  .m-xl-auto {
    margin: auto !important
  }

  .mt-xl-auto,
  .my-xl-auto {
    margin-top: auto !important
  }

  .mr-xl-auto,
  .mx-xl-auto {
    margin-right: auto !important
  }

  .mb-xl-auto,
  .my-xl-auto {
    margin-bottom: auto !important
  }

  .ml-xl-auto,
  .mx-xl-auto {
    margin-left: auto !important
  }
}

.text-monospace {
  font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace
}

.text-justify {
  text-align: justify !important
}

.text-wrap {
  white-space: normal !important
}

.text-nowrap {
  white-space: nowrap !important
}

.text-truncate {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap
}

.text-left {
  text-align: left !important
}

.text-right {
  text-align: right !important
}

.text-center {
  text-align: center !important
}

@media (min-width: 576px) {
  .text-sm-left {
    text-align: left !important
  }

  .text-sm-right {
    text-align: right !important
  }

  .text-sm-center {
    text-align: center !important
  }
}

@media (min-width: 768px) {
  .text-md-left {
    text-align: left !important
  }

  .text-md-right {
    text-align: right !important
  }

  .text-md-center {
    text-align: center !important
  }
}

@media (min-width: 992px) {
  .text-lg-left {
    text-align: left !important
  }

  .text-lg-right {
    text-align: right !important
  }

  .text-lg-center {
    text-align: center !important
  }
}

@media (min-width: 1200px) {
  .text-xl-left {
    text-align: left !important
  }

  .text-xl-right {
    text-align: right !important
  }

  .text-xl-center {
    text-align: center !important
  }
}

.text-lowercase {
  text-transform: lowercase !important
}

.text-uppercase {
  text-transform: uppercase !important
}

.text-capitalize {
  text-transform: capitalize !important
}

.font-weight-light {
  font-weight: 300 !important
}

.font-weight-lighter {
  font-weight: lighter !important
}

.font-weight-normal {
  font-weight: 400 !important
}

.font-weight-bold {
  font-weight: 700 !important
}

.font-weight-bolder {
  font-weight: bolder !important
}

.font-italic {
  font-style: italic !important
}

.text-white {
  color: #fff !important
}

.text-primary {
  color: #3f6ad8 !important
}

a.text-primary:hover,
a.text-primary:focus {
  color: #2248a8 !important
}

.text-secondary {
  color: #6c757d !important
}

a.text-secondary:hover,
a.text-secondary:focus {
  color: #494f54 !important
}

.text-success {
  color: #3ac47d !important
}

a.text-success:hover,
a.text-success:focus {
  color: #298957 !important
}

.text-info {
  color: #16aaff !important
}

a.text-info:hover,
a.text-info:focus {
  color: #007fc9 !important
}

.text-warning {
  color: #f7b924 !important
}

a.text-warning:hover,
a.text-warning:focus {
  color: #c78f07 !important
}

.text-danger {
  color: #d92550 !important
}

a.text-danger:hover,
a.text-danger:focus {
  color: #981a38 !important
}

.text-light {
  color: #eee !important
}

a.text-light:hover,
a.text-light:focus {
  color: #c8c8c8 !important
}

.text-dark {
  color: #343a40 !important
}

a.text-dark:hover,
a.text-dark:focus {
  color: #121416 !important
}

.text-focus {
  color: #444054 !important
}

a.text-focus:hover,
a.text-focus:focus {
  color: #211f29 !important
}

.text-alternate {
  color: #794c8a !important
}

a.text-alternate:hover,
a.text-alternate:focus {
  color: #4e3159 !important
}

.text-body {
  color: #495057 !important
}

.text-muted {
  color: #6c757d !important
}

.text-black-50 {
  color: rgba(0, 0, 0, 0.5) !important
}

.text-white-50 {
  color: rgba(255, 255, 255, 0.5) !important
}

.text-hide {
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0
}

.text-decoration-none {
  text-decoration: none !important
}

.text-reset {
  color: inherit !important
}

.visible {
  visibility: visible !important
}

.invisible {
  visibility: hidden !important
}

a,
button,
.btn {
  outline: none !important
}

.app-container {
  display: flex;
  min-height: 100vh;
  flex-direction: column;
  margin: 0
}

.icon-anim-pulse {
  animation: pulse_animation;
  animation-duration: 1000ms;
  animation-iteration-count: infinite;
  animation-timing-function: linear
}

@keyframes pulse_animation {
  0% {
    transform: scale(1)
  }

  30% {
    transform: scale(1.1)
  }

  40% {
    transform: scale(1.21)
  }

  50% {
    transform: scale(1)
  }

  60% {
    transform: scale(1)
  }

  70% {
    transform: scale(1.09)
  }

  80% {
    transform: scale(1.05)
  }

  100% {
    transform: scale(1)
  }
}

.SidebarAnimation-appear {
  transform: translateX(-30px);
  opacity: 0
}

.SidebarAnimation-appear.SidebarAnimation-appear-active {
  opacity: 1;
  transform: translateX(0);
  transition: all .4s linear
}

.HeaderAnimation-appear {
  transform: translateY(-30px);
  opacity: 0
}

.HeaderAnimation-appear.HeaderAnimation-appear-active {
  opacity: 1;
  transform: translateY(0);
  transition: all .4s linear
}

.MainAnimation-appear {
  transform: translateY(-30px);
  opacity: 0
}

.MainAnimation-appear.MainAnimation-appear-active {
  opacity: 1;
  transform: translateY(0);
  transition: all .4s linear
}

.app-header {
  height: 60px;
  display: flex;
  align-items: center;
  align-content: center;
  position: relative;
  z-index: 10;
  transition: all .2s
}

.app-header.header-shadow {
  box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03)
}

.app-header .app-header__content {
  display: flex;
  align-items: center;
  align-content: center;
  flex: 1;
  padding: 0 1.5rem;
  height: 60px
}

.app-header .app-header__content .app-header-left {
  display: flex;
  align-items: center
}

.app-header .app-header__content .app-header-right {
  align-items: center;
  display: flex;
  margin-left: auto
}

.app-header .header-user-info>.widget-heading,
.app-header .header-user-info>.widget-subheading {
  white-space: nowrap
}

.app-header .header-user-info>.widget-subheading {
  font-size: .8rem
}

.app-header__logo {
  padding: 0 1.5rem;
  height: 60px;
  width: 280px;
  display: flex;
  align-items: center;
  transition: width .2s
}

.app-header__logo .logo-src {
  height: 44px;
  width: 196px;
  background: url(assets/images/logo.jpg);
  background-repeat: no-repeat;
  
}

.app-header__menu,
.app-header__mobile-menu {
  display: none;
  padding: 0 1.5rem;
  height: 60px;
  align-items: center
}

.fixed-header .app-header {
  position: fixed;
  width: 100%;
  top: 0
}

.fixed-header .app-header .app-header__logo {
  visibility: visible
}

.fixed-header .app-main {
  padding-top: 60px
}

.fixed-header:not(.fixed-sidebar):not(.closed-sidebar) .app-sidebar .app-header__logo {
  visibility: hidden
}

.header-dots {
  margin-left: auto;
  display: flex
}

.header-dots>.dropdown {
  display: flex;
  align-content: center
}

.header-dots .icon-wrapper-alt {
  margin: 0;
  height: 44px;
  width: 44px;
  text-align: center;
  overflow: visible
}

.header-dots .icon-wrapper-alt .language-icon {
  border-radius: 30px;
  position: relative;
  z-index: 4;
  width: 32px;
  height: 32px;
  overflow: hidden;
  margin: 0 auto
}

.header-dots .icon-wrapper-alt .language-icon img {
  position: relative;
  top: 50%;
  left: 50%;
  margin: -22px 0 0 -20px
}

.header-dots .icon-wrapper-alt .icon-wrapper-bg {
  opacity: .1;
  transition: opacity .2s;
  border-radius: 40px
}

.header-dots .icon-wrapper-alt svg {
  margin: 0 auto
}

@-moz-document url-prefix() {
  .header-dots .icon-wrapper-alt svg {
    width: 50%
  }
}

.header-dots .icon-wrapper-alt i {
  font-size: 1.3rem
}

.header-dots .icon-wrapper-alt:hover {
  cursor: pointer
}

.header-dots .icon-wrapper-alt:hover .icon-wrapper-bg {
  opacity: .2
}

.header-dots .icon-wrapper-alt .badge-dot {
  top: 1px;
  right: 1px;
  border: 0
}

.header-megamenu.nav>li>.nav-link {
  color: #6c757d;
  padding-left: .66667rem;
  padding-right: .66667rem
}

.header-megamenu.nav>li>.nav-link .badge-pill {
  padding: 5px 7px
}

.header-megamenu.nav>li>.nav-link:hover {
  color: #343a40
}

.header-megamenu.nav>li>.nav-link .fa {
  margin-top: 3px
}

.header-btn-lg {
  padding: 0 0 0 1.5rem;
  margin-left: 1.5rem;
  display: flex;
  align-items: center;
  position: relative
}

.header-btn-lg::before {
  position: absolute;
  left: -1px;
  top: 50%;
  background: #dee2e6;
  width: 1px;
  height: 30px;
  margin-top: -15px;
  content: ''
}

.header-btn-lg .hamburger-inner,
.header-btn-lg .hamburger-inner::before,
.header-btn-lg .hamburger-inner::after {
  background: #6c757d
}

.app-header.header-text-light .app-header-left>.nav>li>.nav-link {
  color: rgba(255, 255, 255, 0.7)
}

.app-header.header-text-light .app-header-left>.nav>li>.nav-link .nav-link-icon {
  color: rgba(255, 255, 255, 0.8)
}

.app-header.header-text-light .app-header-left>.nav>li>.nav-link:hover {
  color: #fff
}

.app-header.header-text-light .app-header-right .icon-wrapper-alt .fa,
.app-header.header-text-light .app-header-right .icon-wrapper-alt .icon {
  color: rgba(255, 255, 255, 0.7) !important;
  transition: all .2s
}

.app-header.header-text-light .app-header-right .icon-wrapper-alt .icon-wrapper-bg {
  background: rgba(255, 255, 255, 0.1) !important;
  transition: all .2s;
  opacity: 1
}

.app-header.header-text-light .app-header-right .icon-wrapper-alt:hover .fa,
.app-header.header-text-light .app-header-right .icon-wrapper-alt:hover .icon {
  color: rgba(255, 255, 255, 0.9) !important
}

.app-header.header-text-light .app-header-right .icon-wrapper-alt:hover .icon-wrapper-bg {
  background: rgba(255, 255, 255, 0.15) !important
}

.app-header.header-text-light .app-header-right .icon-wrapper-alt .badge-dot {
  border-color: transparent
}

.app-header.header-text-light .app-header-right>.header-btn-lg .widget-content-left .btn-group>.btn,
.app-header.header-text-light .app-header-right>.header-btn-lg .widget-heading,
.app-header.header-text-light .app-header-right>.header-btn-lg .widget-subheading {
  color: rgba(255, 255, 255, 0.8)
}

.app-header.header-text-light .app-header-right>.header-btn-lg .header-user-info>.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(0, 0, 0, 0.1), 0 0.0625rem 0.125rem rgba(0, 0, 0, 0.2)
}

.app-header.header-text-light .search-wrapper .input-holder .search-icon {
  background: rgba(0, 0, 0, 0.1)
}

.app-header.header-text-light .search-wrapper .input-holder .search-input::placeholder,
.app-header.header-text-light .search-wrapper .input-holder .search-input::-webkit-input-placeholder,
.app-header.header-text-light .search-wrapper .input-holder .search-input:-ms-input-placeholder,
.app-header.header-text-light .search-wrapper .input-holder .search-input:-moz-placeholder,
.app-header.header-text-light .search-wrapper .input-holder .search-input::-moz-placeholder {
  color: rgba(255, 255, 255, 0.5) !important
}

.app-header.header-text-light .search-wrapper.active .input-holder {
  background: rgba(255, 255, 255, 0.1)
}

.app-header.header-text-light .search-wrapper.active .input-holder .search-input {
  color: rgba(255, 255, 255, 0.8)
}

.app-header.header-text-light .search-wrapper.active .input-holder .search-icon {
  background: rgba(255, 255, 255, 0.1)
}

.app-header.header-text-light .header-btn-lg::before {
  background: rgba(255, 255, 255, 0.2)
}

.app-header.header-text-light .header-btn-lg .hamburger-inner,
.app-header.header-text-light .header-btn-lg .hamburger.is-active .hamburger-inner,
.app-header.header-text-light .header-btn-lg .hamburger-inner::before,
.app-header.header-text-light .header-btn-lg .hamburger-inner::after,
.app-header.header-text-light .header__pane .hamburger-inner,
.app-header.header-text-light .header__pane .hamburger.is-active .hamburger-inner,
.app-header.header-text-light .header__pane .hamburger-inner::before,
.app-header.header-text-light .header__pane .hamburger-inner::after {
  background-color: rgba(255, 255, 255, 0.8) !important
}

.app-header.header-text-light .search-wrapper .input-holder .search-icon span::after {
  border-color: rgba(255, 255, 255, 0.8)
}

.app-header.header-text-light .search-wrapper .close::before,
.app-header.header-text-light .search-wrapper .close::after,
.app-header.header-text-light .search-wrapper .input-holder .search-icon span::before {
  background: rgba(255, 255, 255, 0.8)
}

.app-header.header-text-light .app-header__logo .logo-src {
  background: url(assets/images/logo.png)
}

.app-header.header-text-light .app-header__mobile-menu .hamburger-inner,
.app-header.header-text-light .app-header__mobile-menu .hamburger-inner::before,
.app-header.header-text-light .app-header__mobile-menu .hamburger-inner::after {
  background: rgba(255, 255, 255, 0.9)
}

.app-header.header-text-dark .app-header-left>.nav>li>.nav-link {
  color: rgba(0, 0, 0, 0.7)
}

.app-header.header-text-dark .app-header-left>.nav>li>.nav-link .nav-link-icon {
  color: rgba(0, 0, 0, 0.8)
}

.app-header.header-text-dark .app-header-left>.nav>li>.nav-link:hover {
  color: #000
}

.app-header.header-text-dark .app-header-right .icon-wrapper-alt .fa,
.app-header.header-text-dark .app-header-right .icon-wrapper-alt .icon {
  color: rgba(0, 0, 0, 0.7) !important;
  transition: all .2s
}

.app-header.header-text-dark .app-header-right .icon-wrapper-alt .icon-wrapper-bg {
  background: rgba(0, 0, 0, 0.1) !important;
  transition: all .2s;
  opacity: 1
}

.app-header.header-text-dark .app-header-right .icon-wrapper-alt:hover .fa,
.app-header.header-text-dark .app-header-right .icon-wrapper-alt:hover .icon {
  color: rgba(0, 0, 0, 0.95) !important
}

.app-header.header-text-dark .app-header-right .icon-wrapper-alt:hover .icon-wrapper-bg {
  background: rgba(0, 0, 0, 0.15) !important
}

.app-header.header-text-dark .app-header-right .icon-wrapper-alt .badge-dot {
  border-color: transparent
}

.app-header.header-text-dark .app-header-right>.header-btn-lg .widget-content-left .btn-group>.btn,
.app-header.header-text-dark .app-header-right>.header-btn-lg .widget-heading,
.app-header.header-text-dark .app-header-right>.header-btn-lg .widget-subheading {
  color: rgba(0, 0, 0, 0.8)
}

.app-header.header-text-dark .app-header-right>.header-btn-lg .header-user-info>.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(0, 0, 0, 0.1), 0 0.0625rem 0.125rem rgba(0, 0, 0, 0.2)
}

.app-header.header-text-dark .search-wrapper .input-holder .search-icon {
  background: rgba(0, 0, 0, 0.1)
}

.app-header.header-text-dark .search-wrapper.active .input-holder {
  background: rgba(0, 0, 0, 0.1)
}

.app-header.header-text-dark .search-wrapper.active .input-holder .search-input {
  color: rgba(0, 0, 0, 0.8)
}

.app-header.header-text-dark .search-wrapper.active .input-holder .search-icon {
  background: rgba(0, 0, 0, 0.1)
}

.app-header.header-text-dark .header-btn-lg::before {
  background: rgba(0, 0, 0, 0.2)
}

.app-header.header-text-dark .header-btn-lg .hamburger-inner,
.app-header.header-text-dark .header-btn-lg .hamburger.is-active .hamburger-inner,
.app-header.header-text-dark .header-btn-lg .hamburger-inner::before,
.app-header.header-text-dark .header-btn-lg .hamburger-inner::after,
.app-header.header-text-dark .header__pane .hamburger-inner,
.app-header.header-text-dark .header__pane .hamburger.is-active .hamburger-inner,
.app-header.header-text-dark .header__pane .hamburger-inner::before,
.app-header.header-text-dark .header__pane .hamburger-inner::after {
  background-color: rgba(0, 0, 0, 0.8) !important
}

.app-header.header-text-dark .search-wrapper .input-holder .search-icon span::after {
  border-color: rgba(0, 0, 0, 0.8)
}

.app-header.header-text-dark .search-wrapper .close::before,
.app-header.header-text-dark .search-wrapper .close::after,
.app-header.header-text-dark .search-wrapper .input-holder .search-icon span::before {
  background: rgba(0, 0, 0, 0.8)
}

.app-header.header-text-dark .app-header__logo .logo-src {
  background: url(assets/images/logo-inverse.png)
}

.app-sidebar {
  width: 280px;
  display: flex;
  z-index: 11;
  overflow: hidden;
  min-width: 280px;
  position: relative;
  flex: 0 0 280px;
  margin-top: -60px;
  padding-top: 60px;
  transition: all .2s
}

.app-sidebar .app-sidebar__inner {
  padding: 2px 1.5rem 1.5rem
}

.app-sidebar .scrollbar-sidebar {
  z-index: 15;
  width: 100%
}

.app-sidebar .app-sidebar-bg {
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  opacity: 0.05;
  background-size: cover;
  z-index: 10
}

.app-sidebar .app-header__logo {
  position: absolute;
  left: 0;
  top: 0;
  display: none;
  z-index: 11
}

.app-sidebar.sidebar-shadow {
  box-shadow: 7px 0 60px rgba(0, 0, 0, 0.05)
}

.app-sidebar__heading {
  text-transform: uppercase;
  font-size: .8rem;
  margin: .75rem 0;
  font-weight: bold;
  color: #3f6ad8;
  white-space: nowrap;
  position: relative
}

.sidebar-mobile-overlay {
  display: none;
  position: fixed;
  width: 100%;
  height: 100%;
  background: #333;
  opacity: .6;
  left: 0;
  top: 0;
  z-index: 12
}

.vertical-nav-menu {
  margin: 0;
  padding: 0;
  position: relative;
  list-style: none
}

.vertical-nav-menu::after {
  content: " ";
  pointer-events: none;
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  top: 0
}

.vertical-nav-menu .mm-collapse:not(.mm-show) {
  display: none
}

.vertical-nav-menu .mm-collapsing {
  position: relative;
  height: 0;
  overflow: hidden;
  transition-timing-function: ease;
  transition-duration: .25s;
  transition-property: height, visibility
}

.vertical-nav-menu ul {
  margin: 0;
  padding: 0;
  position: relative;
  list-style: none
}

.vertical-nav-menu:before {
  opacity: 0;
  transition: opacity 300ms
}

.vertical-nav-menu li a {
  display: block;
  line-height: 2.4rem;
  height: 2.4rem;
  padding: 0 1.5rem 0 45px;
  position: relative;
  border-radius: .25rem;
  color: #343a40;
  white-space: nowrap;
  transition: all .2s;
  margin: .1rem 0
}

.vertical-nav-menu li a:hover {
  background: #e0f3ff;
  text-decoration: none
}

.vertical-nav-menu li a:hover i.metismenu-icon {
  opacity: .6
}

.vertical-nav-menu li a:hover i.metismenu-state-icon {
  opacity: 1
}

.vertical-nav-menu li.mm-active>a {
  font-weight: bold
}

.vertical-nav-menu li.mm-active>a i.metismenu-state-icon {
  transform: rotate(-180deg)
}

.vertical-nav-menu li a.mm-active {
  color: #3f6ad8;
  background: #e0f3ff;
  font-weight: bold
}

.vertical-nav-menu i.metismenu-state-icon,
.vertical-nav-menu i.metismenu-icon {
  text-align: center;
  width: 34px;
  height: 34px;
  line-height: 34px;
  position: absolute;
  left: 5px;
  top: 50%;
  margin-top: -17px;
  font-size: 1.5rem;
  opacity: .3;
  transition: color 300ms
}

.vertical-nav-menu i.metismenu-state-icon {
  transition: transform 300ms;
  left: auto;
  right: 0
}

.vertical-nav-menu ul {
  transition: padding 300ms;
  padding: .5em 0 0 2rem
}

.vertical-nav-menu ul:before {
  content: '';
  height: 100%;
  opacity: 1;
  width: 3px;
  background: #e0f3ff;
  position: absolute;
  left: 20px;
  top: 0;
  border-radius: 15px
}

.vertical-nav-menu ul>li>a {
  color: #6c757d;
  height: 2rem;
  line-height: 2rem;
  padding: 0 1.5rem 0
}

.vertical-nav-menu ul>li>a:hover {
  color: #3f6ad8
}

.vertical-nav-menu ul>li>a .metismenu-icon {
  display: none
}

.vertical-nav-menu ul>li>a.mm-active {
  color: #3f6ad8;
  background: #e0f3ff;
  font-weight: bold
}

.app-sidebar.sidebar-text-light {
  border-right: 0 !important
}

.app-sidebar.sidebar-text-light .app-sidebar__heading {
  color: rgba(255, 255, 255, 0.6)
}

.app-sidebar.sidebar-text-light .app-sidebar__heading::before {
  background: rgba(255, 255, 255, 0.5) !important
}

.app-sidebar.sidebar-text-light .vertical-nav-menu li a {
  color: rgba(255, 255, 255, 0.7)
}

.app-sidebar.sidebar-text-light .vertical-nav-menu li a i.metismenu-icon {
  opacity: .5
}

.app-sidebar.sidebar-text-light .vertical-nav-menu li a i.metismenu-state-icon {
  opacity: .5
}

.app-sidebar.sidebar-text-light .vertical-nav-menu li a:hover {
  background: rgba(255, 255, 255, 0.15);
  color: #fff
}

.app-sidebar.sidebar-text-light .vertical-nav-menu li a:hover i.metismenu-icon {
  opacity: .8
}

.app-sidebar.sidebar-text-light .vertical-nav-menu li a:hover i.metismenu-state-icon {
  opacity: 1
}

.app-sidebar.sidebar-text-light .vertical-nav-menu li a.mm-active {
  color: rgba(255, 255, 255, 0.7);
  background: rgba(255, 255, 255, 0.15)
}

.app-sidebar.sidebar-text-light .vertical-nav-menu ul:before {
  background: rgba(255, 255, 255, 0.1)
}

.app-sidebar.sidebar-text-light .vertical-nav-menu ul>li>a {
  color: rgba(255, 255, 255, 0.6)
}

.app-sidebar.sidebar-text-light .vertical-nav-menu ul>li>a:hover {
  color: #fff
}

.app-sidebar.sidebar-text-light .vertical-nav-menu ul>li>a.mm-active {
  color: #fff;
  background: rgba(255, 255, 255, 0.15)
}

.app-sidebar.sidebar-text-light .ps__thumb-y {
  background: rgba(255, 255, 255, 0.3)
}

.app-sidebar.sidebar-text-light .ps__rail-y:hover .ps__thumb-y {
  background: rgba(255, 255, 255, 0.2)
}

.app-sidebar.sidebar-text-light .app-header__logo .logo-src {
  background: url(assets/images/logo.png)
}

.app-sidebar.sidebar-text-light .app-header__logo .hamburger-inner,
.app-sidebar.sidebar-text-light .app-header__logo .hamburger-inner::before,
.app-sidebar.sidebar-text-light .app-header__logo .hamburger-inner::after {
  background-color: rgba(255, 255, 255, 0.8)
}

.app-sidebar.sidebar-text-dark {
  border-right: 0 !important
}

.app-sidebar.sidebar-text-dark .app-sidebar__heading {
  color: rgba(0, 0, 0, 0.6)
}

.app-sidebar.sidebar-text-dark .app-sidebar__heading::before {
  background: rgba(0, 0, 0, 0.5) !important
}

.app-sidebar.sidebar-text-dark .vertical-nav-menu li a {
  color: rgba(0, 0, 0, 0.6)
}

.app-sidebar.sidebar-text-dark .vertical-nav-menu li a i.metismenu-icon {
  opacity: .5
}

.app-sidebar.sidebar-text-dark .vertical-nav-menu li a i.metismenu-state-icon {
  opacity: .5
}

.app-sidebar.sidebar-text-dark .vertical-nav-menu li a:hover {
  background: rgba(0, 0, 0, 0.15);
  color: rgba(0, 0, 0, 0.7)
}

.app-sidebar.sidebar-text-dark .vertical-nav-menu li a:hover i.metismenu-icon {
  opacity: .7
}

.app-sidebar.sidebar-text-dark .vertical-nav-menu li a:hover i.metismenu-state-icon {
  opacity: 1
}

.app-sidebar.sidebar-text-dark .vertical-nav-menu li a.mm-active {
  color: rgba(0, 0, 0, 0.7);
  background: rgba(0, 0, 0, 0.15)
}

.app-sidebar.sidebar-text-dark .vertical-nav-menu ul:before {
  background: rgba(0, 0, 0, 0.1)
}

.app-sidebar.sidebar-text-dark .vertical-nav-menu ul>li>a {
  color: rgba(0, 0, 0, 0.4)
}

.app-sidebar.sidebar-text-dark .vertical-nav-menu ul>li>a:hover {
  color: rgba(0, 0, 0, 0.7)
}

.app-sidebar.sidebar-text-dark .vertical-nav-menu ul>li>a.mm-active {
  color: rgba(0, 0, 0, 0.7);
  background: rgba(0, 0, 0, 0.15)
}

.app-sidebar.sidebar-text-dark .ps__thumb-y {
  background: rgba(0, 0, 0, 0.3)
}

.app-sidebar.sidebar-text-dark .ps__rail-y:hover .ps__thumb-y {
  background: rgba(0, 0, 0, 0.2)
}

.app-sidebar.sidebar-text-dark .app-header__logo .hamburger-inner,

.app-sidebar.sidebar-text-dark .app-header__logo .hamburger-inner::before,
.app-sidebar.sidebar-text-dark .app-header__logo .hamburger-inner::after {
  background-color: rgba(0, 0, 0, 0.8)
}

.fixed-sidebar .app-sidebar {
  position: fixed;
  height: 100vh
}

.fixed-sidebar .app-main .app-main__outer {
  z-index: 9;
  padding-left: 280px
}

.fixed-sidebar.fixed-header .app-sidebar .app-header__logo {
  display: none
}

.fixed-sidebar:not(.fixed-header) .app-sidebar .app-header__logo {
  display: flex
}

.fixed-sidebar:not(.fixed-header) .app-header {
  margin-left: 280px
}

.fixed-sidebar:not(.fixed-header) .app-header .app-header__logo {
  display: none
}

.fixed-sidebar.closed-sidebar:not(.fixed-header) .app-header {
  margin-left: 80px
}

.fixed-sidebar.closed-sidebar:not(.fixed-header) .app-sidebar .app-header__logo {
  width: 80px;
  padding: 0
}

.fixed-sidebar.closed-sidebar:not(.fixed-header) .app-sidebar .app-header__logo .logo-src {
  display: none
}

.fixed-sidebar.closed-sidebar:not(.fixed-header) .app-sidebar .app-header__logo .header__pane {
  margin-right: auto
}

.closed-sidebar .app-sidebar {
  transition: all .3s ease;
  width: 80px;
  min-width: 80px;
  flex: 0 0 80px;
  z-index: 13
}

.closed-sidebar .app-sidebar .app-sidebar__inner .app-sidebar__heading {
  text-indent: -999em
}

.closed-sidebar .app-sidebar .app-sidebar__inner .app-sidebar__heading::before {
  content: '';
  position: absolute;
  top: 50%;
  left: 0;
  width: 100%;
  height: 1px;
  background: #e0f3ff;
  text-indent: 1px
}

.closed-sidebar .app-sidebar .app-sidebar__inner ul li a {
  text-indent: -99rem;
  padding: 0
}

.closed-sidebar .app-sidebar .app-sidebar__inner .metismenu-icon {
  text-indent: 0;
  left: 50%;
  margin-left: -17px
}

.closed-sidebar .app-sidebar .app-sidebar__inner .metismenu-state-icon {
  visibility: hidden
}

.closed-sidebar .app-sidebar .app-sidebar__inner ul::before {
  display: none
}

.closed-sidebar .app-sidebar .app-sidebar__inner ul.mm-show {
  padding: 0
}

.closed-sidebar .app-sidebar .app-sidebar__inner ul.mm-show>li>a {
  height: 0
}

.closed-sidebar .app-sidebar:hover {
  flex: 0 0 280px !important;
  width: 280px !important
}

.closed-sidebar .app-sidebar:hover .app-sidebar__inner .app-sidebar__heading {
  text-indent: initial
}

.closed-sidebar .app-sidebar:hover .app-sidebar__inner .app-sidebar__heading::before {
  display: none
}

.closed-sidebar .app-sidebar:hover .app-sidebar__inner ul::before {
  display: block
}

.closed-sidebar .app-sidebar:hover .app-sidebar__inner ul li a {
  text-indent: initial;
  padding: 0 1.5rem 0 45px
}

.closed-sidebar .app-sidebar:hover .app-sidebar__inner .metismenu-icon {
  text-indent: initial;
  left: 5px;
  margin-left: 0
}

.closed-sidebar .app-sidebar:hover .app-sidebar__inner .metismenu-state-icon {
  visibility: visible
}

.closed-sidebar .app-sidebar:hover .app-sidebar__inner ul.mm-show {
  padding: .5em 0 0 2rem
}

.closed-sidebar .app-sidebar:hover .app-sidebar__inner ul.mm-show>li>a {
  height: 2.3em
}

.closed-sidebar .app-sidebar:hover .app-sidebar__inner ul ul li a {
  padding-left: 1em
}

.closed-sidebar:not(.sidebar-mobile-open) .app-sidebar .scrollbar-sidebar {
  position: static;
  height: auto;
  overflow: initial !important
}

.closed-sidebar:not(.sidebar-mobile-open) .app-sidebar:hover .scrollbar-sidebar {
  position: absolute;
  height: 100%;
  overflow: hidden !important
}

.closed-sidebar:not(.closed-sidebar-mobile) .app-header .app-header__logo {
  width: 80px
}

.closed-sidebar:not(.closed-sidebar-mobile) .app-header .app-header__logo .logo-src {
  display: none
}

.closed-sidebar:not(.closed-sidebar-mobile) .app-header .app-header__logo .header__pane {
  margin-right: auto
}

.closed-sidebar.fixed-sidebar .app-main__outer {
  padding-left: 80px
}

.closed-sidebar.fixed-header:not(.fixed-sidebar) .app-sidebar .app-header__logo {
  visibility: hidden
}

.closed-sidebar.closed-sidebar-mobile .app-sidebar .app-header__logo,
.closed-sidebar.closed-sidebar-mobile .app-header .app-header__logo {
  width: auto;
  display: flex
}

.closed-sidebar.closed-sidebar-mobile .app-sidebar .app-header__logo .header__pane,
.closed-sidebar.closed-sidebar-mobile .app-header .app-header__logo .header__pane {
  display: none
}

.closed-sidebar.closed-sidebar-mobile .app-sidebar .app-header__logo {
  display: flex;
  width: 80px;
  padding: 0 1.5rem !important
}

.closed-sidebar.closed-sidebar-mobile .app-sidebar .app-header__logo .logo-src {
  display: block !important;
  margin: 0 auto;
  width: 21px
}

.closed-sidebar.closed-sidebar-mobile .app-sidebar .app-header__logo .header__pane {
  display: none
}

.closed-sidebar.closed-sidebar-mobile .app-sidebar:hover .app-header__logo {
  width: 280px
}

.closed-sidebar.closed-sidebar-mobile .app-sidebar:hover .app-header__logo .logo-src {
  width: 97px;
  margin: 0
}

.closed-sidebar.closed-sidebar-mobile .app-header {
  margin-left: 0 !important
}

.closed-sidebar.fixed-footer .app-footer__inner {
  margin-left: 0 !important
}

.app-main {
  flex: 1;
  display: flex;
  z-index: 8;
  position: relative
}

.app-main .app-main__outer {
  flex: 1;
  flex-direction: column;
  display: flex;
  z-index: 12
}

.app-main .app-main__inner {
  padding: 30px 30px 0;
  flex: 1
}

.app-theme-white.app-container {
  background: #f1f4f6
}

.app-theme-white .app-sidebar {
  background: #fff
}

.app-theme-white .app-page-title {
  background: rgba(255, 255, 255, 0.45)
}

.app-theme-white .app-footer .app-footer__inner,
.app-theme-white .app-header {
  background: #fafbfc
}

.app-theme-white.fixed-header .app-header__logo {
  background: rgba(250, 251, 252, 0.1)
}

.app-theme-gray.app-container {
  background: #fff
}

.app-theme-gray .app-sidebar {
  background: #fff;
  border-right: #dee2e6 solid 1px
}

.app-theme-gray .app-page-title {
  background: rgba(0, 0, 0, 0.03)
}

.app-theme-gray .app-footer,
.app-theme-gray .app-header {
  background: #f8f9fa
}

.app-theme-gray .app-footer {
  border-top: #dee2e6 solid 1px
}

.app-theme-gray .app-header .app-header__logo {
  border-right: rgba(0, 0, 0, 0.1) solid 1px
}

.app-theme-gray.fixed-header .app-header__logo {
  background: rgba(0, 0, 0, 0.03)
}

.app-theme-gray .card {
  border-width: 1px
}

.app-theme-gray .main-card {
  box-shadow: 0 0 0 0 transparent !important
}

.app-theme-gray .main-card>.card-body>.card-title {
  text-transform: none;
  font-size: 1.1rem;
  font-weight: normal;
  border-bottom: #dee2e6 solid 1px;
  position: relative;
  padding: 0 0 1.125rem;
  margin: 0 0 1.125rem
}

.app-theme-gray .main-card>.card-body>.card-title::before {
  position: absolute;
  width: 40px;
  background: #3f6ad8;
  border-radius: 30px;
  height: 5px;
  left: 0;
  bottom: -2px;
  content: ""
}

.app-theme-gray .app-inner-layout__sidebar {
  border-left: 0 !important
}

.app-footer {
  height: 60px
}

.app-footer .app-footer__inner {
  padding: 0 1.5rem 0 .75rem;
  height: 60px;
  display: flex;
  align-content: center;
  align-items: center
}

.app-footer .app-footer__inner .app-footer-left {
  display: flex;
  align-items: center
}

.app-footer-left p{margin:0px}

.app-footer .app-footer__inner .app-footer-right {
  margin-left: auto;
  display: flex
}

.footer-dots {
  display: flex;
  align-items: center;
  align-content: center
}

.footer-dots .dots-separator {
  height: 40px;
  margin: 0 .6rem;
  width: 1px;
  background: #e9ecef
}

.dot-btn-wrapper {
  padding: .5rem;
  position: relative;
  display: flex;
  opacity: .7;
  transition: opacity .2s;
  cursor: pointer
}

.dot-btn-wrapper .badge-abs {
  right: 50%
}

.dot-btn-wrapper .badge-abs.badge-dot-sm {
  top: -2px;
  margin-right: -3px
}

.dot-btn-wrapper .dot-btn-icon {
  font-size: 1.8rem
}

.dot-btn-wrapper:hover {
  text-decoration: none;
  opacity: 1
}


.fixed-footer .app-footer {
  position: fixed;
  width: 100%;
  bottom: 0;
  left: 0;
  z-index: 7
}

.fixed-footer .app-footer .app-footer__inner {
  margin-left: 280px;
  box-shadow: 0.3rem -0.46875rem 2.1875rem rgba(4, 9, 20, 0.02), 0.3rem -0.9375rem 1.40625rem rgba(4, 9, 20, 0.02), 0.3rem -0.25rem 0.53125rem rgba(4, 9, 20, 0.04), 0.3rem -0.125rem 0.1875rem rgba(4, 9, 20, 0.02)
}

.fixed-footer .app-main .app-main__outer {
  padding-bottom: 60px
}

.app-page-title {
  padding: 30px;
  margin: -30px -30px 30px;
  position: relative
}

.app-page-title+.body-tabs-layout {
  margin-top: -30px !important
}

.app-page-title .page-title-wrapper {
  position: relative;
  display: flex;
  align-items: center
}

.app-page-title .page-title-heading,
.app-page-title .page-title-subheading {
  margin: 0;
  padding: 0
}

.app-page-title .page-title-heading {
  font-size: 1.25rem;
  font-weight: 400;
  display: flex;
  align-content: center;
  align-items: center
}

.app-page-title .page-title-subheading {
  padding: 3px 0 0;
  font-size: .88rem;
  opacity: .6
}

.app-page-title .page-title-subheading .breadcrumb {
  padding: 0;
  margin: 3px 0 0;
  background: transparent
}

.app-page-title .page-title-actions {
  margin-left: auto
}

.app-page-title .page-title-actions .breadcrumb {
  margin: 0;
  padding: 0;
  background: transparent
}

.app-page-title .page-title-icon {
  font-size: 2rem;
  display: flex;
  align-items: center;
  align-content: center;
  text-align: center;
  padding: .83333rem;
  margin: 0 30px 0 0;
  background: #fff;
  box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03);
  border-radius: .25rem;
  width: 60px;
  height: 60px;
  color:#000
}

.app-page-title .page-title-icon i {
  margin: auto
}

.app-page-title .page-title-icon.rounded-circle {
  margin: 0 20px 0 0
}

.app-page-title+.RRT__container {
  margin-top: -23.07692px
}

.app-page-title.app-page-title-simple {
  margin: 0;
  background: none !important;
  padding-left: 0;
  padding-right: 0;
  padding-top: 0
}

.page-title-icon-rounded .page-title-icon {
  border-radius: 50px
}

.search-wrapper {
  position: relative;
  margin-right: .66667rem
}

.search-wrapper .input-holder {
  height: 42px;
  width: 42px;
  overflow: hidden;
  position: relative;
  transition: all 0.3s ease-in-out
}

.search-wrapper .input-holder .search-input {
  width: 100%;
  padding: 0 70px 0 20px;
  opacity: 0;
  position: absolute;
  top: 0;
  left: 0;
  background: transparent;
  box-sizing: border-box;
  border: none;
  outline: none;
  transform: translate(0, 60px);
  transition: all 0.3s cubic-bezier(0, 0.105, 0.035, 1.57);
  transition-delay: 0.3s;
  font-size: .88rem
}

.search-wrapper .input-holder .search-icon {
  width: 42px;
  height: 42px;
  border: none;
  padding: 0;
  outline: none;
  position: relative;
  z-index: 2;
  float: right;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
  background: rgba(0, 0, 0, 0.06);
  border-radius: 30px
}

.search-wrapper .input-holder .search-icon span {
  width: 22px;
  height: 22px;
  display: inline-block;
  vertical-align: middle;
  position: relative;
  transform: rotate(45deg);
  transition: all 0.4s cubic-bezier(0.65, -0.6, 0.24, 1.65)
}

.search-wrapper .input-holder .search-icon span::before,
.search-wrapper .input-holder .search-icon span::after {
  position: absolute;
  content: ''
}

.search-wrapper .input-holder .search-icon span::before {
  width: 4px;
  height: 11px;
  left: 9px;
  top: 13px;
  border-radius: 2px;
  background: #3f6ad8
}

.search-wrapper .input-holder .search-icon span::after {
  width: 14px;
  height: 14px;
  left: 4px;
  top: 0;
  border-radius: 16px;
  border: 2px solid #3f6ad8
}

.search-wrapper .close {
  position: absolute;
  z-index: 1;
  top: 50%;
  left: 0;
  width: 20px;
  height: 20px;
  margin-top: -10px;
  cursor: pointer;
  opacity: 0 !important;
  transform: rotate(-180deg);
  transition: all 0.2s cubic-bezier(0.285, -0.45, 0.935, 0.11);
  transition-delay: 0.1s
}

.search-wrapper .close::before,
.search-wrapper .close::after {
  position: absolute;
  content: '';
  background: #3f6ad8;
  border-radius: 2px
}

.search-wrapper .close::before {
  width: 2px;
  height: 20px;
  left: 9px;
  top: 0
}

.search-wrapper .close::after {
  width: 20px;
  height: 2px;
  left: 0;
  top: 9px
}

.search-wrapper.active {
  width: 330px
}

.search-wrapper.active .input-holder {
  width: 290px;
  border-radius: 50px;
  background: rgba(0, 0, 0, 0.05);
  transition: all 0.5s cubic-bezier(0, 0.105, 0.035, 1.57)
}

.search-wrapper.active .input-holder .search-input {
  opacity: 1;
  transform: translate(0, 11px)
}

.search-wrapper.active .input-holder .search-icon {
  width: 42px;
  height: 42px;
  margin: 0;
  border-radius: 30px
}

.search-wrapper.active .input-holder .search-icon span {
  transform: rotate(-45deg)
}

.search-wrapper.active .close {
  left: 300px;
  opacity: .6 !important;
  transform: rotate(45deg);
  transition: all 0.6s cubic-bezier(0, 0.105, 0.035, 1.57);
  transition-delay: 0.5s
}

.search-wrapper.active .close:hover {
  opacity: 1 !important
}

.search-wrapper.active+.header-megamenu {
  opacity: 0
}

.opacity-01 {
  opacity: .01 !important
}

.opacity-02 {
  opacity: .02 !important
}

.opacity-03 {
  opacity: .03 !important
}

.opacity-04 {
  opacity: .04 !important
}

.opacity-05 {
  opacity: .05 !important
}

.opacity-06 {
  opacity: .06 !important
}

.opacity-07 {
  opacity: .07 !important
}

.opacity-08 {
  opacity: .08 !important
}

.opacity-09 {
  opacity: .09 !important
}

.opacity-1 {
  opacity: .1 !important
}

.opacity-15 {
  opacity: .15 !important
}

.opacity-2 {
  opacity: .2 !important
}

.opacity-3 {
  opacity: .3 !important
}

.opacity-4 {
  opacity: .4 !important
}

.opacity-5 {
  opacity: .5 !important
}

.opacity-6 {
  opacity: .6 !important
}

.opacity-7 {
  opacity: .7 !important
}

.opacity-8 {
  opacity: .8 !important
}

.opacity-9 {
  opacity: .9 !important
}

.opacity-10 {
  opacity: 1 !important
}

.filter-grayscale-5 {
  filter: grayscale(5%) !important
}

.filter-grayscale-10 {
  filter: grayscale(10%) !important
}

.filter-grayscale-20 {
  filter: grayscale(20%) !important
}

.filter-grayscale-30 {
  filter: grayscale(30%) !important
}

.filter-grayscale-40 {
  filter: grayscale(40%) !important
}

.filter-grayscale-50 {
  filter: grayscale(50%) !important
}

.filter-grayscale-80 {
  filter: grayscale(80%) !important
}

.filter-grayscale-100 {
  filter: grayscale(100%) !important
}

.br-tl {
  border-top-left-radius: .25rem !important
}

.br-tr {
  border-top-right-radius: .25rem !important
}

.br-bl {
  border-bottom-left-radius: .25rem !important
}

.br-br {
  border-bottom-right-radius: .25rem !important
}

.b-radius-0 {
  border-radius: 0 !important
}

.rm-border {
  border-width: 0 !important
}

.br-a {
  border-radius: .25rem
}

.text-truncate {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap
}

.flex-truncate {
  min-width: 0 !important
}

.margin-h-center {
  margin-left: auto !important;
  margin-right: auto !important
}

.center-svg {
  margin: 0 auto
}

.center-svg svg {
  margin: 0 auto
}

.apexcharts-canvas {
  margin: 0 auto
}

.apexcharts-donut {
  display: flex;
  align-items: center;
  align-content: center
}

.alert-dismissible .close {
  top: 0;
  right: 5px;
  padding: 5px
}

.icon-gradient {
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  text-fill-color: transparent
}

.font-size-xlg {
  font-size: 1.3rem !important
}

.font-size-md {
  font-size: .9rem !important
}

.font-size-lg {
  font-size: 1.1rem !important
}

.no-shadow {
  box-shadow: 0 0 0 transparent !important
}

.h-100 {
  height: 100vh !important
}

.he-auto {
  height: auto !important
}

.he-100 {
  height: 100%
}

.h-sm {
  height: 150px
}

.text-nowrap {
  white-space: nowrap
}

.fsize-1 {
  font-size: .95rem !important
}

.fsize-2 {
  font-size: 1.3rem !important
}

.fsize-3 {
  font-size: 1.6rem !important
}

.fsize-4 {
  font-size: 2rem !important
}

.z-index-6 {
  z-index: 6
}

.line-height-1 {
  line-height: 1
}

.center-elem {
  display: flex;
  align-items: center;
  align-content: center
}

.flex2 {
  flex: 2
}

.divider {
  margin-top: 1rem;
  margin-bottom: 1rem;
  height: 1px;
  overflow: hidden;
  background: #e9ecef
}

.list-group-item:hover {
  z-index: initial
}

.no-results {
  padding: 1.5rem;
  text-align: center
}

.no-results .results-title {
  color: #495057;
  font-size: 1.25rem
}

.no-results .results-subtitle {
  color: #adb5bd;
  font-size: 1.1rem
}

.bg-animation {
  animation: bg-pan-left 8s both
}

@-webkit-keyframes bg-pan-left {
  0% {
    background-position: 100% 50%
  }

  100% {
    background-position: 0% 50%
  }
}

@keyframes bg-pan-left {
  0% {
    background-position: 100% 50%
  }

  100% {
    background-position: 0% 50%
  }
}

.w-100 {
  width: 100%
}

.mb--2 {
  margin-bottom: -1.5rem
}

.mbg-3 {
  margin-bottom: 30px
}

.circle-progress {
  position: relative
}

.circle-progress small {
  position: absolute;
  height: 100%;
  width: 100%;
  font-weight: bold;
  left: 0;
  top: 0;
  vertical-align: middle;
  text-align: center;
  display: flex;
  align-items: center;
  align-content: center
}

.circle-progress small span {
  margin: 0 auto
}

.circle-progress canvas {
  display: block
}

.bg-warm-flame {
  background-image: linear-gradient(45deg, #ff9a9e 0%, #fad0c4 99%, #fad0c4 100%) !important
}

.bg-night-fade {
  background-image: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%) !important
}

.bg-sunny-morning {
  background-image: linear-gradient(120deg, #f6d365 0%, #fda085 100%) !important
}

.bg-tempting-azure {
  background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%) !important
}

.bg-amy-crisp {
  background-image: linear-gradient(120deg, #a6c0fe 0%, #f68084 100%) !important
}

.bg-heavy-rain {
  background-image: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%) !important
}

.bg-mean-fruit {
  background-image: linear-gradient(120deg, #fccb90 0%, #d57eeb 100%) !important
}

.bg-malibu-beach {
  background-image: linear-gradient(to right, #4facfe 0%, #00f2fe 100%) !important
}

.bg-deep-blue {
  background-image: linear-gradient(120deg, #e0c3fc 0%, #8ec5fc 100%) !important
}

.bg-ripe-malin {
  background-image: linear-gradient(120deg, #f093fb 0%, #f5576c 100%) !important
}

.bg-arielle-smile {
  background-image: radial-gradient(circle 248px at center, #16d9e3 0%, #30c7ec 47%, #46aef7 100%) !important
}

.bg-plum-plate {
  background-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important
}

.bg-happy-fisher {
  background-image: linear-gradient(120deg, #89f7fe 0%, #66a6ff 100%) !important
}

.bg-happy-itmeo {
  background-image: linear-gradient(180deg, #2af598 0%, #009efd 100%) !important
}

.bg-mixed-hopes {
  background-image: linear-gradient(to top, #c471f5 0%, #fa71cd 100%) !important
}

.bg-strong-bliss {
  background-image: linear-gradient(to right, #f78ca0 0%, #f9748f 19%, #fd868c 60%, #fe9a8b 100%) !important
}

.bg-grow-early {
  background-image: linear-gradient(to top, #0ba360 0%, #3cba92 100%) !important
}

.bg-love-kiss {
  background-image: linear-gradient(to top, #ff0844 0%, #ffb199 100%) !important
}

.bg-premium-dark {
  background-image: linear-gradient(to right, #434343 0%, black 100%) !important
}

.bg-happy-green {
  background-image: linear-gradient(to bottom, #00b09b, #96c93d) !important
}

.bg-vicious-stance {

  background-image: linear-gradient(60deg, #29323c 0%, #485563 100%) !important
}

.bg-midnight-bloom {
  background-image: linear-gradient(-20deg, #2b5876 0%, #4e4376 100%) !important
}

.bg-night-sky {
  background-image: linear-gradient(to top, #1e3c72 0%, #1e3c72 1%, #2a5298 100%) !important
}

.bg-slick-carbon {
  background-image: linear-gradient(to bottom, #323232 0%, #3F3F3F 40%, #1C1C1C 150%), linear-gradient(to top, rgba(255, 255, 255, 0.4) 0%, rgba(0, 0, 0, 0.25) 200%) !important;
  background-blend-mode: multiply
}

.bg-royal {
  background-image: linear-gradient(to right, #141e30, #243b55) !important
}

.bg-asteroid {
  background-image: linear-gradient(to right, #0f2027, #203a43, #2c5364) !important
}

.bg-transparent {
  background: transparent !important
}

/*!
Animate.css - http://daneden.me/animate
Licensed under the MIT license - http://opensource.org/licenses/MIT
Copyright (c) 2015 Daniel Eden
*/
body {
  -webkit-backface-visibility: hidden
}

.animated,
.TabsAnimation-appear {
  -webkit-animation-duration: calc(1s);
  animation-duration: calc(1s);
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both
}

.animated.infinite,
.infinite.TabsAnimation-appear {
  animation-iteration-count: infinite
}

.animated.hinge,
.hinge.TabsAnimation-appear {
  -webkit-animation-duration: calc(1s * 2);
  animation-duration: calc(1s * 2)
}

.animated.bounceIn,
.bounceIn.TabsAnimation-appear,
.animated.bounceOut,
.bounceOut.TabsAnimation-appear {
  -webkit-animation-duration: calc(1s * 0.75);
  animation-duration: calc(1s * 0.75)
}

.animated.flipOutX,
.flipOutX.TabsAnimation-appear,
.animated.flipOutY,
.flipOutY.TabsAnimation-appear {
  -webkit-animation-duration: calc(1s * 0.75);
  animation-duration: calc(1s * 0.75)
}

@-webkit-keyframes bounce {

  0%,
  20%,
  50%,
  80%,
  100% {
    -webkit-transform: translateY(0)
  }

  40% {
    -webkit-transform: translateY(-30px)
  }

  60% {
    -webkit-transform: translateY(-15px)
  }
}

@keyframes bounce {

  0%,
  20%,
  50%,
  80%,
  100% {
    transform: translateY(0)
  }

  40% {
    transform: translateY(-30px)
  }

  60% {
    transform: translateY(-15px)
  }
}

.bounce {
  -webkit-animation-name: bounce;
  animation-name: bounce
}

@-webkit-keyframes flash {

  0%,
  50%,
  100% {
    opacity: 1
  }

  25%,
  75% {
    opacity: 0
  }
}

@keyframes flash {

  0%,
  50%,
  100% {
    opacity: 1
  }

  25%,
  75% {
    opacity: 0
  }
}

.flash {
  -webkit-animation-name: flash;
  animation-name: flash
}

@-webkit-keyframes pulse {
  0% {
    -webkit-transform: scale(1)
  }

  50% {
    -webkit-transform: scale(1.1)
  }

  100% {
    -webkit-transform: scale(1)
  }
}

@keyframes pulse {
  0% {
    transform: scale(1)
  }

  50% {
    transform: scale(1.1)
  }

  100% {
    transform: scale(1)
  }
}

.pulse {
  -webkit-animation-name: pulse;
  animation-name: pulse
}

@-webkit-keyframes shake {

  0%,
  100% {
    -webkit-transform: translateX(0)
  }

  10%,
  30%,
  50%,
  70%,
  90% {
    -webkit-transform: translateX(-10px)
  }

  20%,
  40%,
  60%,
  80% {
    -webkit-transform: translateX(10px)
  }
}

@keyframes shake {

  0%,
  100% {
    transform: translateX(0)
  }

  10%,
  30%,
  50%,
  70%,
  90% {
    transform: translateX(-10px)
  }

  20%,
  40%,
  60%,
  80% {
    transform: translateX(10px)
  }
}

.shake {
  -webkit-animation-name: shake;
  animation-name: shake
}

@-webkit-keyframes swing {

  20%,
  40%,
  60%,
  80%,
  100% {
    -webkit-transform-origin: top center
  }

  20% {
    -webkit-transform: rotate(15deg)
  }

  40% {
    -webkit-transform: rotate(-10deg)
  }

  60% {
    -webkit-transform: rotate(5deg)
  }

  80% {
    -webkit-transform: rotate(-5deg)
  }

  100% {
    -webkit-transform: rotate(0deg)
  }
}

@keyframes swing {
  20% {
    transform: rotate(15deg)
  }

  40% {
    transform: rotate(-10deg)
  }

  60% {
    transform: rotate(5deg)
  }

  80% {
    transform: rotate(-5deg)
  }

  100% {
    transform: rotate(0deg)
  }
}

.swing {
  -webkit-transform-origin: top center;
  transform-origin: top center;
  -webkit-animation-name: swing;
  animation-name: swing
}

@-webkit-keyframes wiggle {
  0% {
    -webkit-transform: skewX(9deg)
  }

  10% {
    -webkit-transform: skewX(-8deg)
  }

  20% {
    -webkit-transform: skewX(7deg)
  }

  30% {
    -webkit-transform: skewX(-6deg)
  }

  40% {
    -webkit-transform: skewX(5deg)
  }

  50% {
    -webkit-transform: skewX(-4deg)
  }

  60% {
    -webkit-transform: skewX(3deg)
  }

  70% {
    -webkit-transform: skewX(-2deg)
  }

  80% {
    -webkit-transform: skewX(1deg)
  }

  90% {
    -webkit-transform: skewX(0deg)
  }

  100% {
    -webkit-transform: skewX(0deg)
  }
}

@keyframes wiggle {
  0% {
    transform: skewX(9deg)
  }

  10% {
    transform: skewX(-8deg)
  }

  20% {
    transform: skewX(7deg)
  }

  30% {
    transform: skewX(-6deg)
  }

  40% {
    transform: skewX(5deg)
  }

  50% {
    transform: skewX(-4deg)
  }

  60% {
    transform: skewX(3deg)
  }

  70% {
    transform: skewX(-2deg)
  }

  80% {
    transform: skewX(1deg)
  }

  90% {
    transform: skewX(0deg)
  }

  100% {
    transform: skewX(0deg)
  }
}

.wiggle {
  -webkit-animation-name: wiggle;
  animation-name: wiggle;
  -webkit-animation-timing-function: ease-in;
  animation-timing-function: ease-in
}

@-webkit-keyframes wobble {
  0% {
    -webkit-transform: translateX(0%)
  }

  15% {
    -webkit-transform: translateX(-25%) rotate(-5deg)
  }

  30% {
    -webkit-transform: translateX(20%) rotate(3deg)
  }

  45% {
    -webkit-transform: translateX(-15%) rotate(-3deg)
  }

  60% {
    -webkit-transform: translateX(10%) rotate(2deg)
  }

  75% {
    -webkit-transform: translateX(-5%) rotate(-1deg)
  }

  100% {
    -webkit-transform: translateX(0%)
  }
}

@keyframes wobble {
  0% {
    transform: translateX(0%)
  }

  15% {
    transform: translateX(-25%) rotate(-5deg)
  }

  30% {
    transform: translateX(20%) rotate(3deg)
  }

  45% {
    transform: translateX(-15%) rotate(-3deg)
  }

  60% {
    transform: translateX(10%) rotate(2deg)
  }

  75% {
    transform: translateX(-5%) rotate(-1deg)
  }

  100% {
    transform: translateX(0%)
  }
}

.wobble {
  -webkit-animation-name: wobble;
  animation-name: wobble
}

@-webkit-keyframes tada {
  0% {
    -webkit-transform: scale(1)
  }

  10%,
  20% {
    -webkit-transform: scale(0.9) rotate(-3deg)
  }

  30%,
  50%,
  70%,
  90% {
    -webkit-transform: scale(1.1) rotate(3deg)
  }

  40%,
  60%,
  80% {
    -webkit-transform: scale(1.1) rotate(-3deg)
  }

  100% {
    -webkit-transform: scale(1) rotate(0)
  }
}

@keyframes tada {
  0% {
    transform: scale(1)
  }

  10%,
  20% {
    transform: scale(0.9) rotate(-3deg)
  }

  30%,
  50%,
  70%,
  90% {
    transform: scale(1.1) rotate(3deg)
  }

  40%,
  60%,
  80% {
    transform: scale(1.1) rotate(-3deg)
  }

  100% {
    transform: scale(1) rotate(0)
  }
}

.tada {
  -webkit-animation-name: tada;
  animation-name: tada
}

@-webkit-keyframes bounceIn {
  0% {
    opacity: 0;
    -webkit-transform: scale(0.3)
  }

  50% {
    opacity: 1;
    -webkit-transform: scale(1.05)
  }

  70% {
    -webkit-transform: scale(0.9)
  }

  100% {
    -webkit-transform: scale(1)
  }
}

@keyframes bounceIn {
  0% {
    opacity: 0;
    transform: scale(0.3)
  }

  50% {
    opacity: 1;
    transform: scale(1.05)
  }

  70% {
    transform: scale(0.9)
  }

  100% {
    transform: scale(1)
  }
}

.bounceIn {
  -webkit-animation-name: bounceIn;
  animation-name: bounceIn
}

@-webkit-keyframes bounceInDown {
  0% {
    opacity: 0;
    -webkit-transform: translateY(-2000px)
  }

  60% {
    opacity: 1;
    -webkit-transform: translateY(30px)
  }

  80% {
    -webkit-transform: translateY(-10px)
  }

  100% {
    -webkit-transform: translateY(0)
  }
}

@keyframes bounceInDown {
  0% {
    opacity: 0;
    transform: translateY(-2000px)
  }

  60% {
    opacity: 1;
    transform: translateY(30px)
  }

  80% {
    transform: translateY(-10px)
  }

  100% {
    transform: translateY(0)
  }
}

.bounceInDown {
  -webkit-animation-name: bounceInDown;
  animation-name: bounceInDown
}

@-webkit-keyframes bounceInLeft {
  0% {
    opacity: 0;
    -webkit-transform: translateX(-2000px)
  }

  60% {
    opacity: 1;
    -webkit-transform: translateX(30px)
  }

  80% {
    -webkit-transform: translateX(-10px)
  }

  100% {
    -webkit-transform: translateX(0)
  }
}

@keyframes bounceInLeft {
  0% {
    opacity: 0;
    transform: translateX(-2000px)
  }

  60% {
    opacity: 1;
    transform: translateX(30px)
  }

  80% {
    transform: translateX(-10px)
  }

  100% {
    transform: translateX(0)
  }
}

.bounceInLeft {
  -webkit-animation-name: bounceInLeft;
  animation-name: bounceInLeft
}

@-webkit-keyframes bounceInRight {
  0% {
    opacity: 0;
    -webkit-transform: translateX(2000px)
  }

  60% {
    opacity: 1;
    -webkit-transform: translateX(-30px)
  }

  80% {
    -webkit-transform: translateX(10px)
  }

  100% {
    -webkit-transform: translateX(0)
  }
}

@keyframes bounceInRight {
  0% {
    opacity: 0;
    transform: translateX(2000px)
  }

  60% {
    opacity: 1;
    transform: translateX(-30px)
  }

  80% {
    transform: translateX(10px)
  }

  100% {
    transform: translateX(0)
  }
}

.bounceInRight {
  -webkit-animation-name: bounceInRight;
  animation-name: bounceInRight
}

@-webkit-keyframes bounceInUp {
  0% {
    opacity: 0;
    -webkit-transform: translateY(2000px)
  }

  60% {
    opacity: 1;
    -webkit-transform: translateY(-30px)
  }

  80% {
    -webkit-transform: translateY(10px)
  }

  100% {
    -webkit-transform: translateY(0)
  }
}

@keyframes bounceInUp {
  0% {
    opacity: 0;
    transform: translateY(2000px)
  }

  60% {
    opacity: 1;
    transform: translateY(-30px)
  }

  80% {
    transform: translateY(10px)
  }

  100% {
    transform: translateY(0)
  }
}

.bounceInUp {
  -webkit-animation-name: bounceInUp;
  animation-name: bounceInUp
}

@-webkit-keyframes bounceOut {
  0% {
    -webkit-transform: scale(1)
  }

  25% {
    -webkit-transform: scale(0.95)
  }

  50% {
    opacity: 1;
    -webkit-transform: scale(1.1)
  }

  100% {
    opacity: 0;
    -webkit-transform: scale(0.3)
  }
}

@keyframes bounceOut {
  0% {
    transform: scale(1)
  }

  25% {
    transform: scale(0.95)
  }

  50% {
    opacity: 1;
    transform: scale(1.1)
  }

  100% {
    opacity: 0;
    transform: scale(0.3)
  }
}

.bounceOut {
  -webkit-animation-name: bounceOut;
  animation-name: bounceOut
}

@-webkit-keyframes bounceOutDown {
  0% {
    -webkit-transform: translateY(0)
  }

  20% {
    opacity: 1;
    -webkit-transform: translateY(-20px)
  }

  100% {
    opacity: 0;
    -webkit-transform: translateY(2000px)
  }
}

@keyframes bounceOutDown {
  0% {
    transform: translateY(0)
  }

  20% {
    opacity: 1;
    transform: translateY(-20px)
  }

  100% {
    opacity: 0;
    transform: translateY(2000px)
  }
}

.bounceOutDown {
  -webkit-animation-name: bounceOutDown;
  animation-name: bounceOutDown
}

@-webkit-keyframes bounceOutLeft {
  0% {
    -webkit-transform: translateX(0)
  }

  20% {
    opacity: 1;
    -webkit-transform: translateX(20px)
  }

  100% {
    opacity: 0;
    -webkit-transform: translateX(-2000px)
  }
}

@keyframes bounceOutLeft {
  0% {
    transform: translateX(0)
  }

  20% {
    opacity: 1;
    transform: translateX(20px)
  }

  100% {
    opacity: 0;
    transform: translateX(-2000px)
  }
}

.bounceOutLeft {
  -webkit-animation-name: bounceOutLeft;
  animation-name: bounceOutLeft
}

@-webkit-keyframes bounceOutRight {
  0% {
    -webkit-transform: translateX(0)
  }

  20% {
    opacity: 1;
    -webkit-transform: translateX(-20px)
  }

  100% {
    opacity: 0;
    -webkit-transform: translateX(2000px)
  }
}

@keyframes bounceOutRight {
  0% {
    transform: translateX(0)
  }

  20% {
    opacity: 1;
    transform: translateX(-20px)
  }

  100% {
    opacity: 0;
    transform: translateX(2000px)
  }
}

.bounceOutRight {
  -webkit-animation-name: bounceOutRight;
  animation-name: bounceOutRight
}

@-webkit-keyframes bounceOutUp {
  0% {
    -webkit-transform: translateY(0)
  }

  20% {
    opacity: 1;
    -webkit-transform: translateY(20px)
  }

  100% {
    opacity: 0;
    -webkit-transform: translateY(-2000px)
  }
}

@keyframes bounceOutUp {
  0% {
    transform: translateY(0)
  }

  20% {
    opacity: 1;
    transform: translateY(20px)
  }

  100% {
    opacity: 0;
    transform: translateY(-2000px)
  }
}

.bounceOutUp {
  -webkit-animation-name: bounceOutUp;
  animation-name: bounceOutUp
}

@-webkit-keyframes fadeIn {
  0% {
    opacity: 0
  }

  100% {
    opacity: 1
  }
}

@keyframes fadeIn {
  0% {
    opacity: 0
  }

  100% {
    opacity: 1
  }
}

.fadeIn {
  -webkit-animation-name: fadeIn;
  animation-name: fadeIn
}

@-webkit-keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translateY(-20px)
  }

  100% {
    opacity: 1;
    -webkit-transform: translateY(0)
  }
}

@keyframes fadeInDown {
  0% {
    opacity: 0;
    transform: translateY(-20px)
  }

  100% {
    opacity: 1;
    transform: translateY(0)
  }
}

.fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown
}

@-webkit-keyframes fadeInDownBig {
  0% {
    opacity: 0;
    -webkit-transform: translateY(-2000px)
  }

  100% {
    opacity: 1;
    -webkit-transform: translateY(0)
  }
}

@keyframes fadeInDownBig {
  0% {
    opacity: 0;
    transform: translateY(-2000px)
  }

  100% {
    opacity: 1;
    transform: translateY(0)
  }
}

.fadeInDownBig {
  -webkit-animation-name: fadeInDownBig;
  animation-name: fadeInDownBig
}

@-webkit-keyframes fadeInLeft {
  0% {
    opacity: 0;
    -webkit-transform: translateX(-20px)
  }

  100% {
    opacity: 1;
    -webkit-transform: translateX(0)
  }
}

@keyframes fadeInLeft {
  0% {
    opacity: 0;
    transform: translateX(-20px)
  }

  100% {
    opacity: 1;
    transform: translateX(0)
  }
}

.fadeInLeft {
  -webkit-animation-name: fadeInLeft;
  animation-name: fadeInLeft
}

@-webkit-keyframes fadeInLeftBig {
  0% {
    opacity: 0;
    -webkit-transform: translateX(-2000px)
  }

  100% {
    opacity: 1;
    -webkit-transform: translateX(0)
  }
}

@keyframes fadeInLeftBig {
  0% {
    opacity: 0;
    transform: translateX(-2000px)
  }

  100% {
    opacity: 1;
    transform: translateX(0)
  }
}

.fadeInLeftBig {
  -webkit-animation-name: fadeInLeftBig;
  animation-name: fadeInLeftBig
}

@-webkit-keyframes fadeInRight {
  0% {
    opacity: 0;
    -webkit-transform: translateX(20px)
  }

  100% {
    opacity: 1;
    -webkit-transform: translateX(0)
  }
}

@keyframes fadeInRight {
  0% {
    opacity: 0;
    transform: translateX(20px)
  }

  100% {
    opacity: 1;
    transform: translateX(0)
  }
}

.fadeInRight {
  -webkit-animation-name: fadeInRight;
  animation-name: fadeInRight
}

@-webkit-keyframes fadeInRightBig {
  0% {
    opacity: 0;
    -webkit-transform: translateX(2000px)
  }

  100% {
    opacity: 1;
    -webkit-transform: translateX(0)
  }
}

@keyframes fadeInRightBig {
  0% {
    opacity: 0;
    transform: translateX(2000px)
  }

  100% {
    opacity: 1;
    transform: translateX(0)
  }
}

.fadeInRightBig {
  -webkit-animation-name: fadeInRightBig;
  animation-name: fadeInRightBig
}

@-webkit-keyframes fadeInUp {
  0% {
    opacity: 0;
    -webkit-transform: translateY(20px)
  }

  100% {
    opacity: 1;
    -webkit-transform: translateY(0)
  }
}

@keyframes fadeInUp {
  0% {
    opacity: 0;
    transform: translateY(20px)
  }

  100% {
    opacity: 1;
    transform: translateY(0)
  }
}

.fadeInUp,
.TabsAnimation-appear {
  -webkit-animation-name: fadeInUp;
  animation-name: fadeInUp
}

@-webkit-keyframes fadeInUpBig {
  0% {
    opacity: 0;
    -webkit-transform: translateY(2000px)
  }

  100% {
    opacity: 1;
    -webkit-transform: translateY(0)
  }
}

@keyframes fadeInUpBig {
  0% {
    opacity: 0;
    transform: translateY(2000px)
  }

  100% {
    opacity: 1;
    transform: translateY(0)
  }
}

.fadeInUpBig {
  -webkit-animation-name: fadeInUpBig;
  animation-name: fadeInUpBig
}

@-webkit-keyframes fadeOut {
  0% {
    opacity: 1
  }

  100% {
    opacity: 0
  }
}

@keyframes fadeOut {
  0% {
    opacity: 1
  }

  100% {
    opacity: 0
  }
}

.fadeOut {
  -webkit-animation-name: fadeOut;
  animation-name: fadeOut
}

@-webkit-keyframes fadeOutDown {
  0% {
    opacity: 1;
    -webkit-transform: translateY(0)
  }

  100% {
    opacity: 0;
    -webkit-transform: translateY(20px)
  }
}

@keyframes fadeOutDown {
  0% {
    opacity: 1;
    transform: translateY(0)
  }

  100% {
    opacity: 0;
    transform: translateY(20px)
  }
}

.fadeOutDown {
  -webkit-animation-name: fadeOutDown;
  animation-name: fadeOutDown
}

@-webkit-keyframes fadeOutDownBig {
  0% {
    opacity: 1;
    -webkit-transform: translateY(0)
  }

  100% {
    opacity: 0;
    -webkit-transform: translateY(2000px)
  }
}

@keyframes fadeOutDownBig {
  0% {
    opacity: 1;
    transform: translateY(0)
  }

  100% {
    opacity: 0;
    transform: translateY(2000px)
  }
}

.fadeOutDownBig {
  -webkit-animation-name: fadeOutDownBig;
  animation-name: fadeOutDownBig
}

@-webkit-keyframes fadeOutLeft {
  0% {
    opacity: 1;
    -webkit-transform: translateX(0)
  }

  100% {
    opacity: 0;
    -webkit-transform: translateX(-20px)
  }
}

@keyframes fadeOutLeft {
  0% {
    opacity: 1;
    transform: translateX(0)
  }

  100% {
    opacity: 0;
    transform: translateX(-20px)
  }
}

.fadeOutLeft {
  -webkit-animation-name: fadeOutLeft;
  animation-name: fadeOutLeft
}

@-webkit-keyframes fadeOutLeftBig {
  0% {
    opacity: 1;
    -webkit-transform: translateX(0)
  }

  100% {
    opacity: 0;
    -webkit-transform: translateX(-2000px)
  }
}

@keyframes fadeOutLeftBig {
  0% {
    opacity: 1;
    transform: translateX(0)
  }

  100% {
    opacity: 0;
    transform: translateX(-2000px)
  }
}

.fadeOutLeftBig {
  -webkit-animation-name: fadeOutLeftBig;
  animation-name: fadeOutLeftBig
}

@-webkit-keyframes fadeOutRight {
  0% {
    opacity: 1;
    -webkit-transform: translateX(0)
  }

  100% {
    opacity: 0;
    -webkit-transform: translateX(20px)
  }
}

@keyframes fadeOutRight {
  0% {
    opacity: 1;
    transform: translateX(0)
  }

  100% {
    opacity: 0;
    transform: translateX(20px)
  }
}

.fadeOutRight {
  -webkit-animation-name: fadeOutRight;
  animation-name: fadeOutRight
}

@-webkit-keyframes fadeOutRightBig {
  0% {
    opacity: 1;
    -webkit-transform: translateX(0)
  }

  100% {
    opacity: 0;
    -webkit-transform: translateX(2000px)
  }
}

@keyframes fadeOutRightBig {
  0% {
    opacity: 1;
    transform: translateX(0)
  }

  100% {
    opacity: 0;
    transform: translateX(2000px)
  }
}

.fadeOutRightBig {
  -webkit-animation-name: fadeOutRightBig;
  animation-name: fadeOutRightBig
}

@-webkit-keyframes fadeOutUp {
  0% {
    opacity: 1;
    -webkit-transform: translateY(0)
  }

  100% {
    opacity: 0;
    -webkit-transform: translateY(-20px)
  }
}

@keyframes fadeOutUp {
  0% {
    opacity: 1;
    transform: translateY(0)
  }

  100% {
    opacity: 0;
    transform: translateY(-20px)
  }
}

.fadeOutUp {
  -webkit-animation-name: fadeOutUp;
  animation-name: fadeOutUp
}

@-webkit-keyframes fadeOutUpBig {
  0% {
    opacity: 1;
    -webkit-transform: translateY(0)
  }

  100% {
    opacity: 0;
    -webkit-transform: translateY(-2000px)
  }
}

@keyframes fadeOutUpBig {
  0% {
    opacity: 1;
    transform: translateY(0)
  }

  100% {
    opacity: 0;
    transform: translateY(-2000px)
  }
}

.fadeOutUpBig {
  -webkit-animation-name: fadeOutUpBig;
  animation-name: fadeOutUpBig
}

@-webkit-keyframes flip {
  0% {
    -webkit-transform: perspective(400px) rotateY(0);
    -webkit-animation-timing-function: ease-out
  }

  40% {
    -webkit-transform: perspective(400px) translateZ(150px) rotateY(170deg);
    -webkit-animation-timing-function: ease-out
  }

  50% {
    -webkit-transform: perspective(400px) translateZ(150px) rotateY(190deg) scale(1);
    -webkit-animation-timing-function: ease-in
  }

  80% {
    -webkit-transform: perspective(400px) rotateY(360deg) scale(0.95);
    -webkit-animation-timing-function: ease-in
  }

  100% {
    -webkit-transform: perspective(400px) scale(1);
    -webkit-animation-timing-function: ease-in
  }
}

@keyframes flip {
  0% {
    transform: perspective(400px) rotateY(0);
    animation-timing-function: ease-out
  }

  40% {
    transform: perspective(400px) translateZ(150px) rotateY(170deg);
    animation-timing-function: ease-out
  }

  50% {
    transform: perspective(400px) translateZ(150px) rotateY(190deg) scale(1);
    animation-timing-function: ease-in
  }

  80% {
    transform: perspective(400px) rotateY(360deg) scale(0.95);
    animation-timing-function: ease-in
  }

  100% {
    transform: perspective(400px) scale(1);
    animation-timing-function: ease-in
  }
}

.flip {
  -webkit-transform-style: preserve-3d;
  transform-style: preserve-3d;
  -webkit-backface-visibility: visible !important;
  backface-visibility: visible !important;
  -webkit-animation-name: flip;
  animation-name: flip
}

@-webkit-keyframes flipInX {
  0% {
    -webkit-transform: perspective(400px) rotateX(90deg);
    opacity: 0
  }

  40% {
    -webkit-transform: perspective(400px) rotateX(-10deg)
  }

  70% {
    -webkit-transform: perspective(400px) rotateX(10deg)
  }

  100% {
    -webkit-transform: perspective(400px) rotateX(0deg);
    opacity: 1
  }
}

@keyframes flipInX {
  0% {
    transform: perspective(400px) rotateX(90deg);
    opacity: 0
  }

  40% {
    transform: perspective(400px) rotateX(-10deg)
  }

  70% {
    transform: perspective(400px) rotateX(10deg)
  }

  100% {
    transform: perspective(400px) rotateX(0deg);
    opacity: 1
  }
}

.flipInX {
  -webkit-backface-visibility: visible !important;
  backface-visibility: visible !important;
  -webkit-animation-name: flipInX;
  animation-name: flipInX
}

@-webkit-keyframes flipInY {
  0% {
    -webkit-transform: perspective(400px) rotateY(90deg);
    opacity: 0
  }

  40% {
    -webkit-transform: perspective(400px) rotateY(-10deg)
  }

  70% {
    -webkit-transform: perspective(400px) rotateY(10deg)
  }

  100% {
    -webkit-transform: perspective(400px) rotateY(0deg);
    opacity: 1
  }
}

@keyframes flipInY {
  0% {
    transform: perspective(400px) rotateY(90deg);
    opacity: 0
  }

  40% {
    transform: perspective(400px) rotateY(-10deg)
  }

  70% {
    transform: perspective(400px) rotateY(10deg)
  }

  100% {
    transform: perspective(400px) rotateY(0deg);
    opacity: 1
  }
}

.flipInY {
  -webkit-backface-visibility: visible !important;
  backface-visibility: visible !important;
  -webkit-animation-name: flipInY;
  animation-name: flipInY
}

@-webkit-keyframes flipOutX {
  0% {
    -webkit-transform: perspective(400px) rotateX(0deg);
    opacity: 1
  }

  100% {
    -webkit-transform: perspective(400px) rotateX(90deg);
    opacity: 0
  }
}

@keyframes flipOutX {
  0% {
    transform: perspective(400px) rotateX(0deg);
    opacity: 1
  }

  100% {
    transform: perspective(400px) rotateX(90deg);
    opacity: 0
  }
}

.flipOutX {
  -webkit-animation-name: flipOutX;
  animation-name: flipOutX;
  -webkit-backface-visibility: visible !important;
  backface-visibility: visible !important
}

@-webkit-keyframes flipOutY {
  0% {
    -webkit-transform: perspective(400px) rotateY(0deg);
    opacity: 1
  }

  100% {
    -webkit-transform: perspective(400px) rotateY(90deg);
    opacity: 0
  }
}

@keyframes flipOutY {
  0% {
    transform: perspective(400px) rotateY(0deg);
    opacity: 1
  }

  100% {
    transform: perspective(400px) rotateY(90deg);
    opacity: 0
  }
}

.flipOutY {
  -webkit-backface-visibility: visible !important;
  backface-visibility: visible !important;
  -webkit-animation-name: flipOutY;
  animation-name: flipOutY
}

@-webkit-keyframes lightSpeedIn {
  0% {
    -webkit-transform: translateX(100%) skewX(-30deg);
    opacity: 0
  }


  60% {
    -webkit-transform: translateX(-20%) skewX(30deg);
    opacity: 1
  }

  80% {
    -webkit-transform: translateX(0%) skewX(-15deg);
    opacity: 1
  }

  100% {
    -webkit-transform: translateX(0%) skewX(0deg);
    opacity: 1
  }
}

@keyframes lightSpeedIn {
  0% {
    transform: translateX(100%) skewX(-30deg);
    opacity: 0
  }

  60% {
    transform: translateX(-20%) skewX(30deg);
    opacity: 1
  }

  80% {
    transform: translateX(0%) skewX(-15deg);
    opacity: 1
  }

  100% {
    transform: translateX(0%) skewX(0deg);
    opacity: 1
  }
}

.lightSpeedIn {
  -webkit-animation-name: lightSpeedIn;
  animation-name: lightSpeedIn;
  -webkit-animation-timing-function: ease-out;
  animation-timing-function: ease-out
}

@-webkit-keyframes lightSpeedOut {
  0% {
    -webkit-transform: translateX(0%) skewX(0deg);
    opacity: 1
  }

  100% {
    -webkit-transform: translateX(100%) skewX(-30deg);
    opacity: 0
  }
}

@keyframes lightSpeedOut {
  0% {
    transform: translateX(0%) skewX(0deg);
    opacity: 1
  }

  100% {
    transform: translateX(100%) skewX(-30deg);
    opacity: 0
  }
}

.lightSpeedOut {
  -webkit-animation-name: lightSpeedOut;
  animation-name: lightSpeedOut;
  -webkit-animation-timing-function: ease-in;
  animation-timing-function: ease-in
}

@-webkit-keyframes rotateIn {
  0% {
    -webkit-transform-origin: center center;
    -webkit-transform: rotate(-200deg);
    opacity: 0
  }

  100% {
    -webkit-transform-origin: center center;
    -webkit-transform: rotate(0);
    opacity: 1
  }
}

@keyframes rotateIn {
  0% {
    transform-origin: center center;
    transform: rotate(-200deg);
    opacity: 0
  }

  100% {
    transform-origin: center center;
    transform: rotate(0);
    opacity: 1
  }
}

.rotateIn {
  -webkit-animation-name: rotateIn;
  animation-name: rotateIn
}

@-webkit-keyframes rotateInDownLeft {
  0% {
    -webkit-transform-origin: left bottom;
    -webkit-transform: rotate(-90deg);
    opacity: 0
  }

  100% {
    -webkit-transform-origin: left bottom;
    -webkit-transform: rotate(0);
    opacity: 1
  }
}

@keyframes rotateInDownLeft {
  0% {
    transform-origin: left bottom;
    transform: rotate(-90deg);
    opacity: 0
  }

  100% {
    transform-origin: left bottom;
    transform: rotate(0);
    opacity: 1
  }
}

.rotateInDownLeft {
  -webkit-animation-name: rotateInDownLeft;
  animation-name: rotateInDownLeft
}

@-webkit-keyframes rotateInDownRight {
  0% {
    -webkit-transform-origin: right bottom;
    -webkit-transform: rotate(90deg);
    opacity: 0
  }

  100% {
    -webkit-transform-origin: right bottom;
    -webkit-transform: rotate(0);
    opacity: 1
  }
}

@keyframes rotateInDownRight {
  0% {
    transform-origin: right bottom;
    transform: rotate(90deg);
    opacity: 0
  }

  100% {
    transform-origin: right bottom;
    transform: rotate(0);
    opacity: 1
  }
}

.rotateInDownRight {
  -webkit-animation-name: rotateInDownRight;
  animation-name: rotateInDownRight
}

@-webkit-keyframes rotateInUpLeft {
  0% {
    -webkit-transform-origin: left bottom;
    -webkit-transform: rotate(90deg);
    opacity: 0
  }

  100% {
    -webkit-transform-origin: left bottom;
    -webkit-transform: rotate(0);
    opacity: 1
  }
}

@keyframes rotateInUpLeft {
  0% {
    transform-origin: left bottom;
    transform: rotate(90deg);
    opacity: 0
  }

  100% {
    transform-origin: left bottom;
    transform: rotate(0);
    opacity: 1
  }
}

.rotateInUpLeft {
  -webkit-animation-name: rotateInUpLeft;
  animation-name: rotateInUpLeft
}

@-webkit-keyframes rotateInUpRight {
  0% {
    -webkit-transform-origin: right bottom;
    -webkit-transform: rotate(-90deg);
    opacity: 0
  }

  100% {
    -webkit-transform-origin: right bottom;
    -webkit-transform: rotate(0);
    opacity: 1
  }
}

@keyframes rotateInUpRight {
  0% {
    transform-origin: right bottom;
    transform: rotate(-90deg);
    opacity: 0
  }

  100% {
    transform-origin: right bottom;
    transform: rotate(0);
    opacity: 1
  }
}

.rotateInUpRight {
  -webkit-animation-name: rotateInUpRight;
  animation-name: rotateInUpRight
}

@-webkit-keyframes rotateOut {
  0% {
    -webkit-transform-origin: center center;
    -webkit-transform: rotate(0);
    opacity: 1
  }

  100% {
    -webkit-transform-origin: center center;
    -webkit-transform: rotate(200deg);
    opacity: 0
  }
}

@keyframes rotateOut {
  0% {
    transform-origin: center center;
    transform: rotate(0);
    opacity: 1
  }

  100% {
    transform-origin: center center;
    transform: rotate(200deg);
    opacity: 0
  }
}

.rotateOut {
  -webkit-animation-name: rotateOut;
  animation-name: rotateOut
}

@-webkit-keyframes rotateOutDownLeft {
  0% {
    -webkit-transform-origin: left bottom;
    -webkit-transform: rotate(0);
    opacity: 1
  }

  100% {
    -webkit-transform-origin: left bottom;
    -webkit-transform: rotate(90deg);
    opacity: 0
  }
}

@keyframes rotateOutDownLeft {
  0% {
    transform-origin: left bottom;
    transform: rotate(0);
    opacity: 1
  }

  100% {
    transform-origin: left bottom;
    transform: rotate(90deg);
    opacity: 0
  }
}

.rotateOutDownLeft {
  -webkit-animation-name: rotateOutDownLeft;
  animation-name: rotateOutDownLeft
}

@-webkit-keyframes rotateOutDownRight {
  0% {
    -webkit-transform-origin: right bottom;
    -webkit-transform: rotate(0);
    opacity: 1
  }

  100% {
    -webkit-transform-origin: right bottom;
    -webkit-transform: rotate(-90deg);
    opacity: 0
  }
}

@keyframes rotateOutDownRight {
  0% {
    transform-origin: right bottom;
    transform: rotate(0);
    opacity: 1
  }

  100% {
    transform-origin: right bottom;
    transform: rotate(-90deg);
    opacity: 0
  }
}

.rotateOutDownRight {
  -webkit-animation-name: rotateOutDownRight;
  animation-name: rotateOutDownRight
}

@-webkit-keyframes rotateOutUpLeft {
  0% {
    -webkit-transform-origin: left bottom;
    -webkit-transform: rotate(0);
    opacity: 1
  }

  100% {
    -webkit-transform-origin: left bottom;
    -webkit-transform: rotate(-90deg);
    opacity: 0
  }
}

@keyframes rotateOutUpLeft {
  0% {
    transform-origin: left bottom;
    transform: rotate(0);
    opacity: 1
  }

  100% {
    -transform-origin: left bottom;
    -transform: rotate(-90deg);
    opacity: 0
  }
}

.rotateOutUpLeft {
  -webkit-animation-name: rotateOutUpLeft;
  animation-name: rotateOutUpLeft
}

@-webkit-keyframes rotateOutUpRight {
  0% {
    -webkit-transform-origin: right bottom;
    -webkit-transform: rotate(0);
    opacity: 1
  }

  100% {
    -webkit-transform-origin: right bottom;
    -webkit-transform: rotate(90deg);
    opacity: 0
  }
}

@keyframes rotateOutUpRight {
  0% {
    transform-origin: right bottom;
    transform: rotate(0);
    opacity: 1
  }

  100% {
    transform-origin: right bottom;
    transform: rotate(90deg);
    opacity: 0
  }
}

.rotateOutUpRight {
  -webkit-animation-name: rotateOutUpRight;
  animation-name: rotateOutUpRight
}

@-webkit-keyframes slideInDown {
  0% {
    -webkit-transform: translate3d(0, -100%, 0);
    visibility: visible
  }

  100% {
    -webkit-transform: translate3d(0, 0, 0)
  }
}

@keyframes slideInDown {
  0% {
    transform: translate3d(0, -100%, 0);
    visibility: visible
  }

  100% {
    transform: translate3d(0, 0, 0)
  }
}

.slideInDown {
  -webkit-animation-name: slideInDown;
  animation-name: slideInDown
}

@-webkit-keyframes slideInLeft {
  0% {
    -webkit-transform: translate3d(-100%, 0, 0);
    visibility: visible
  }

  100% {
    -webkit-transform: translate3d(0, 0, 0)
  }
}

@keyframes slideInLeft {
  0% {
    transform: translate3d(-100%, 0, 0);
    visibility: visible
  }

  100% {
    transform: translate3d(0, 0, 0)
  }
}

.slideInLeft {
  -webkit-animation-name: slideInLeft;
  animation-name: slideInLeft
}

@-webkit-keyframes slideInRight {
  0% {
    -webkit-transform: translate3d(100%, 0, 0);
    visibility: visible
  }

  100% {
    -webkit-transform: translate3d(0, 0, 0)
  }
}

@keyframes slideInRight {
  0% {
    transform: translate3d(100%, 0, 0);
    visibility: visible
  }

  100% {
    transform: translate3d(0, 0, 0)
  }
}

.slideInRight {
  -webkit-animation-name: slideInRight;
  animation-name: slideInRight
}

@-webkit-keyframes slideInUp {
  0% {
    -webkit-transform: translate3d(0, 100%, 0);
    visibility: visible
  }

  100% {
    -webkit-transform: translate3d(0, 0, 0)
  }
}

@keyframes slideInUp {
  0% {
    transform: translate3d(0, 100%, 0);
    visibility: visible
  }

  100% {
    transform: translate3d(0, 0, 0)
  }
}

.slideInUp {
  -webkit-animation-name: slideInUp;
  animation-name: slideInUp
}

@-webkit-keyframes slideOutDown {
  0% {
    -webkit-transform: translate3d(0, 0, 0);
    visibility: visible
  }

  100% {
    -webkit-transform: translate3d(0, 100%, 0)
  }
}

@keyframes slideOutDown {
  0% {
    transform: translate3d(0, 0, 0);
    visibility: visible
  }

  100% {
    transform: translate3d(0, 100%, 0)
  }
}

.slideOutDown {
  -webkit-animation-name: slideOutDown;
  animation-name: slideOutDown
}

@-webkit-keyframes slideOutLeft {
  0% {
    -webkit-transform: translate3d(0, 0, 0);
    visibility: visible
  }

  100% {
    -webkit-transform: translate3d(-100%, 0, 0)
  }
}

@keyframes slideOutLeft {
  0% {
    transform: translate3d(0, 0, 0);
    visibility: visible
  }

  100% {
    transform: translate3d(-100%, 0, 0)
  }
}

.slideOutLeft {
  -webkit-animation-name: slideOutLeft;
  animation-name: slideOutLeft
}

@-webkit-keyframes slideOutRight {
  0% {
    -webkit-transform: translate3d(0, 0, 0);
    visibility: visible
  }

  100% {
    -webkit-transform: translate3d(100%, 0, 0)
  }
}

@keyframes slideOutRight {
  0% {
    transform: translate3d(0, 0, 0);
    visibility: visible
  }

  100% {
    transform: translate3d(100%, 0, 0)
  }
}

.slideOutRight {
  -webkit-animation-name: slideOutRight;
  animation-name: slideOutRight
}

@-webkit-keyframes slideOutUp {
  0% {
    -webkit-transform: translate3d(0, 0, 0);
    visibility: visible
  }

  100% {
    -webkit-transform: translate3d(0, -100%, 0)
  }
}

@keyframes slideOutUp {
  0% {
    transform: translate3d(0, 0, 0);
    visibility: visible
  }

  100% {
    transform: translate3d(0, -100%, 0)
  }
}

.slideOutUp {
  -webkit-animation-name: slideOutUp;
  animation-name: slideOutUp
}

@-webkit-keyframes hinge {
  0% {
    -webkit-transform: rotate(0);
    -webkit-transform-origin: top left;
    -webkit-animation-timing-function: ease-in-out
  }

  20%,
  60% {
    -webkit-transform: rotate(80deg);
    -webkit-transform-origin: top left;
    -webkit-animation-timing-function: ease-in-out
  }

  40% {
    -webkit-transform: rotate(60deg);
    -webkit-transform-origin: top left;
    -webkit-animation-timing-function: ease-in-out
  }

  80% {
    -webkit-transform: rotate(60deg) translateY(0);
    opacity: 1;
    -webkit-transform-origin: top left;
    -webkit-animation-timing-function: ease-in-out
  }

  100% {
    -webkit-transform: translateY(700px);
    opacity: 0
  }
}

@keyframes hinge {
  0% {
    transform: rotate(0);
    transform-origin: top left;
    animation-timing-function: ease-in-out
  }

  20%,
  60% {
    transform: rotate(80deg);
    transform-origin: top left;
    animation-timing-function: ease-in-out
  }

  40% {
    transform: rotate(60deg);
    transform-origin: top left;
    animation-timing-function: ease-in-out
  }

  80% {
    transform: rotate(60deg) translateY(0);
    opacity: 1;
    transform-origin: top left;
    animation-timing-function: ease-in-out
  }

  100% {
    transform: translateY(700px);
    opacity: 0

  }
}

.hinge {
  -webkit-animation-name: hinge;
  animation-name: hinge
}

@-webkit-keyframes rollIn {
  0% {
    opacity: 0;
    -webkit-transform: translateX(-100%) rotate(-120deg)
  }

  100% {
    opacity: 1;
    -webkit-transform: translateX(0px) rotate(0deg)
  }
}

@keyframes rollIn {
  0% {
    opacity: 0;
    transform: translateX(-100%) rotate(-120deg)
  }

  100% {
    opacity: 1;
    transform: translateX(0px) rotate(0deg)
  }
}

.rollIn {
  -webkit-animation-name: rollIn;
  animation-name: rollIn
}

@-webkit-keyframes rollOut {
  0% {
    opacity: 1;
    -webkit-transform: translateX(0px) rotate(0deg)
  }

  100% {
    opacity: 0;
    -webkit-transform: translateX(100%) rotate(120deg)
  }
}

@keyframes rollOut {
  0% {
    opacity: 1;
    transform: translateX(0px) rotate(0deg)
  }

  100% {
    opacity: 0;
    transform: translateX(100%) rotate(120deg)
  }
}

.rollOut {
  -webkit-animation-name: rollOut;
  animation-name: rollOut
}

@-webkit-keyframes zoomIn {
  0% {
    opacity: 0;
    -webkit-transform: scale3d(0.3, 0.3, 0.3)
  }

  50% {
    opacity: 1
  }
}

@keyframes zoomIn {
  0% {
    opacity: 0;
    transform: scale3d(0.3, 0.3, 0.3)
  }

  50% {
    opacity: 1
  }
}

.zoomIn {
  -webkit-animation-name: zoomIn;
  animation-name: zoomIn
}

@-webkit-keyframes zoomInDown {
  0% {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -1000px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19)
  }

  60% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1)
  }
}

@keyframes zoomInDown {
  0% {
    opacity: 0;
    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -1000px, 0);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19)
  }

  60% {
    opacity: 1;
    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1)
  }
}

.zoomInDown {
  -webkit-animation-name: zoomInDown;
  animation-name: zoomInDown
}

@-webkit-keyframes zoomInLeft {
  0% {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(-1000px, 0, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19)
  }

  60% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(10px, 0, 0);
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1)
  }
}

@keyframes zoomInLeft {
  0% {
    opacity: 0;
    transform: scale3d(0.1, 0.1, 0.1) translate3d(-1000px, 0, 0);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19)
  }

  60% {
    opacity: 1;
    transform: scale3d(0.475, 0.475, 0.475) translate3d(10px, 0, 0);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1)
  }
}

.zoomInLeft {
  -webkit-animation-name: zoomInLeft;
  animation-name: zoomInLeft
}

@-webkit-keyframes zoomInRight {
  0% {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(1000px, 0, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19)
  }

  60% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(-10px, 0, 0);
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1)
  }
}

@keyframes zoomInRight {
  0% {
    opacity: 0;
    transform: scale3d(0.1, 0.1, 0.1) translate3d(1000px, 0, 0);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19)
  }

  60% {
    opacity: 1;
    transform: scale3d(0.475, 0.475, 0.475) translate3d(-10px, 0, 0);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1)
  }
}

.zoomInRight {
  -webkit-animation-name: zoomInRight;
  animation-name: zoomInRight
}

@-webkit-keyframes zoomInUp {
  0% {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 1000px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19)
  }

  60% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1)
  }
}

@keyframes zoomInUp {
  0% {
    opacity: 0;
    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 1000px, 0);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19)
  }

  60% {
    opacity: 1;
    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1)
  }
}

.zoomInUp {
  -webkit-animation-name: zoomInUp;
  animation-name: zoomInUp
}

@-webkit-keyframes zoomOut {
  0% {
    opacity: 1
  }

  50% {
    opacity: 0;
    -webkit-transform: scale3d(0.3, 0.3, 0.3)
  }

  100% {
    opacity: 0
  }
}

@keyframes zoomOut {
  0% {
    opacity: 1
  }

  50% {
    opacity: 0;
    transform: scale3d(0.3, 0.3, 0.3)
  }

  100% {
    opacity: 0
  }
}

.zoomOut {
  -webkit-animation-name: zoomOut;
  animation-name: zoomOut
}

@-webkit-keyframes zoomOutDown {
  40% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19)
  }

  100% {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 2000px, 0);
    -webkit-transform-origin: center bottom;
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1)
  }
}

@keyframes zoomOutDown {
  40% {
    opacity: 1;
    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19)
  }

  100% {
    opacity: 0;
    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 2000px, 0);
    transform-origin: center bottom;
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1)
  }
}

.zoomOutDown {
  -webkit-animation-name: zoomOutDown;
  animation-name: zoomOutDown
}

@-webkit-keyframes zoomOutLeft {
  40% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(42px, 0, 0)
  }

  100% {
    opacity: 0;
    -webkit-transform: scale3d(0.1) translate3d(-2000px, 0, 0);
    -webkit-transform-origin: left center
  }
}

@keyframes zoomOutLeft {
  40% {
    opacity: 1;
    transform: scale3d(0.475, 0.475, 0.475) translate3d(42px, 0, 0)
  }

  100% {
    opacity: 0;
    transform: scale3d(0.1) translate3d(-2000px, 0, 0);
    transform-origin: left center
  }
}

.zoomOutLeft {
  -webkit-animation-name: zoomOutLeft;
  animation-name: zoomOutLeft
}

@-webkit-keyframes zoomOutRight {
  40% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(-42px, 0, 0)
  }

  100% {
    opacity: 0;
    -webkit-transform: scale3d(0.1) translate3d(2000px, 0, 0);
    -webkit-transform-origin: right center
  }
}

@keyframes zoomOutRight {
  40% {
    opacity: 1;
    transform: scale3d(0.475, 0.475, 0.475) translate3d(-42px, 0, 0)
  }

  100% {
    opacity: 0;
    transform: scale3d(0.1) translate3d(2000px, 0, 0);
    transform-origin: right center
  }
}

.zoomOutRight {
  -webkit-animation-name: zoomOutRight;
  animation-name: zoomOutRight
}

@-webkit-keyframes zoomOutUp {
  40% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19)
  }

  100% {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -2000px, 0);
    -webkit-transform-origin: center bottom;
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1)
  }
}

@keyframes zoomOutUp {
  40% {
    opacity: 1;
    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19)
  }

  100% {
    opacity: 0;
    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -2000px, 0);
    transform-origin: center bottom;
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1)
  }
}

.zoomOutUp {
  -webkit-animation-name: zoomOutUp;
  animation-name: zoomOutUp
}

.dropdown-menu.show {
  animation: fade-in2 0.2s cubic-bezier(0.39, 0.575, 0.565, 1) both
}

.popover:not([data-placement^="top"]).show {
  animation: fade-in2 0.2s cubic-bezier(0.39, 0.575, 0.565, 1) both
}

.dropdown-menu[data-placement^="top"].show {
  animation: fade-in3 0.2s cubic-bezier(0.39, 0.575, 0.565, 1) both;
  bottom: auto !important;
  top: auto !important
}

@keyframes fade-in2 {
  0% {
    margin-top: -50px;
    visibility: hidden;
    opacity: 0
  }

  100% {
    margin-top: 0px;
    visibility: visible;
    opacity: 1
  }
}

.form-control {
  transition: all .2s
}

.btn-outline-2x {
  border-width: 2px
}

.btn-group .btn {
  font-size: 0.8rem;
  font-weight: 500
}

.btn-group .btn-outline-2x+.btn-outline-2x {
  margin-left: -2px
}

.btn-group .btn-square {
  border-radius: 0
}

.btn {
  font-size: 0.8rem;
  font-weight: 500
}

.btn.btn-pill.btn-wide,
.btn.btn-pill {
  border-top-left-radius: 50px;
  border-bottom-left-radius: 50px;
  border-top-right-radius: 50px;
  border-bottom-right-radius: 50px
}

.btn-dashed {
  border-style: dashed
}

.btn-icon {
  vertical-align: bottom
}

.btn-icon.btn-icon-right .btn-icon-wrapper {
  margin-left: .5rem;
  margin-right: 0
}

.btn-icon .btn-icon-wrapper {
  margin-right: .5rem;
  margin-left: 0;
  margin-top: 0;
  font-size: 17px;
  vertical-align: middle;
  transition: color .1s;
  display: inline-block
}

.btn-icon.btn-link {
  text-decoration: none
}

.btn-icon.btn-lg:not(.btn-block) .btn-icon-wrapper,
.btn-group-lg>.btn-icon.btn:not(.btn-block) .btn-icon-wrapper {
  font-size: 25px
}

.btn-icon.btn-sm:not(.btn-block) .btn-icon-wrapper,
.btn-group-sm>.btn-icon.btn:not(.btn-block) .btn-icon-wrapper {
  font-size: 16px
}

.btn-icon-only .btn-icon-wrapper {
  margin-left: 0;
  margin-right: 0
}

.btn-hover-shine {
  position: relative
}

.btn-hover-shine:after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 0;
  height: 100%;
  background-color: rgba(255, 255, 255, 0.4);
  -webkit-transition: none;
  -moz-transition: none;
  transition: none
}

.btn-hover-shine:hover:after {
  width: 120%;
  background-color: rgba(255, 255, 255, 0);
  transition: all 0.4s ease-in-out
}

.btn-hover-shine.btn-pill::after {
  border-top-left-radius: 50px;
  border-bottom-left-radius: 50px;
  border-top-right-radius: 50px;
  border-bottom-right-radius: 50px
}

.btn-icon-vertical {
  padding-top: 1rem;
  padding-bottom: 1rem
}

.btn-icon-vertical .btn-icon-wrapper {
  display: block;
  font-size: 200%;
  margin: 5px 0;
  opacity: .6
}

.btn-icon-vertical.btn-link {
  text-decoration: none
}

.btn-icon-vertical.btn-lg:not(.btn-block) .btn-icon-wrapper,
.btn-group-lg>.btn-icon-vertical.btn:not(.btn-block) .btn-icon-wrapper {
  font-size: 25px
}

.btn-icon-vertical.btn-sm:not(.btn-block) .btn-icon-wrapper,
.btn-group-sm>.btn-icon-vertical.btn:not(.btn-block) .btn-icon-wrapper {
  font-size: 16px
}

.btn-icon-vertical:active .btn-icon-wrapper,
.btn-icon-vertical.active .btn-icon-wrapper,
.btn-icon-vertical:hover .btn-icon-wrapper {
  opacity: 1
}

.btn-icon-vertical.btn-icon-bottom .btn-icon-wrapper {
  margin: .2rem 0 5px
}

.btn-icon-vertical.btn-transition-text .btn-icon-wrapper {
  transition: all .2s !important
}

.btn-icon-vertical.btn-transition-text:hover .btn-icon-wrapper {
  transform: scale(1.3)
}

.btn-icon-vertical.btn-transition-text.btn-transition-alt:hover .btn-icon-wrapper {
  color: #fff !important
}

.btn-icon-lg {
  font-size: 2.5rem !important
}

.btn-transition {
  color: #6c757d;
  border-color: #e9ecef;
  background-color: none
}

.btn-transition.btn-outline-link {
  border-color: transparent;
  background-color: transparent
}

.btn-transition.btn-outline-link:hover {
  color: #3f6ad8;
  background: #f8f9fa
}

.btn-transition.disabled,
.btn-transition:disabled {
  color: #6c757d;
  border-color: #e9ecef
}

.btn-transition:hover .btn-icon-wrapper {
  transition: none
}

.btn-transition-alt:hover .icon-gradient {
  -webkit-background-clip: initial;
  -webkit-text-fill-color: initial;
  background-clip: initial;
  text-fill-color: initial;
  background: none !important;
  color: #fff
}

.btn-square {
  border-radius: 0 !important
}

.btn.btn-wide {
  padding: .375rem 1.5rem;
  font-size: .8rem;
  line-height: 1.5;
  border-radius: .25rem
}

.btn-lg.btn-wide,
.btn-group-lg>.btn-wide.btn {
  padding: .5rem 2rem;
  font-size: 1.1rem;
  line-height: 1.5;
  border-radius: .3rem
}

.btn-sm.btn-wide,
.btn-group-sm>.btn-wide.btn {
  padding: .25rem 1rem;
  font-size: .8rem;
  line-height: 1.5;
  border-radius: .2rem
}

.dropdown-toggle::after {
  position: relative;
  top: 2px;
  opacity: .8
}

.dropright .dropdown-toggle::after {
  top: 0
}

.dropdown-toggle-split {
  border-left: rgba(255, 255, 255, 0.1) solid 1px
}

.btn-gradient-primary {
  background-image: linear-gradient(140deg, #2248a8 -30%, #3f6ad8 90%);
  background-color: #2248a8;
  border-color: #2248a8;
  color: #fff
}

.btn-gradient-primary.active,
.btn-gradient-primary:active,
.btn-gradient-primary:not(:disabled):not(.disabled):hover {
  background-image: linear-gradient(120deg, #20429c 0%, #3260d5 100%);
  color: #fff;
  border-color: #1a367e
}

.btn-gradient-primary:focus,
.btn-gradient-primary.focus,
.btn-gradient-primary:active,
.btn-gradient-primary.active {
  color: #fff !important;
  border-color: #1e3f93 !important
}

.btn-gradient-primary.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(63, 106, 216, 0.4), 0 0.0625rem 0.125rem rgba(63, 106, 216, 0.5)
}

.btn-gradient-primary.btn-shadow:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(63, 106, 216, 0.5), 0 0.0625rem 0.125rem rgba(63, 106, 216, 0.6)
}

.btn-gradient-secondary {
  background-image: linear-gradient(140deg, #494f54 -30%, #6c757d 90%);
  background-color: #494f54;
  border-color: #494f54;
  color: #fff
}

.btn-gradient-secondary.active,
.btn-gradient-secondary:active,
.btn-gradient-secondary:not(:disabled):not(.disabled):hover {
  background-image: linear-gradient(120deg, #41474c 0%, #656d75 100%);
  color: #fff;
  border-color: #313539
}

.btn-gradient-secondary:focus,
.btn-gradient-secondary.focus,
.btn-gradient-secondary:active,
.btn-gradient-secondary.active {
  color: #fff !important;
  border-color: #3d4246 !important
}

.btn-gradient-secondary.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(108, 117, 125, 0.4), 0 0.0625rem 0.125rem rgba(108, 117, 125, 0.5)
}

.btn-gradient-secondary.btn-shadow:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(108, 117, 125, 0.5), 0 0.0625rem 0.125rem rgba(108, 117, 125, 0.6)
}

.btn-gradient-success {
  background-image: linear-gradient(140deg, #298957 -30%, #3ac47d 90%);
  background-color: #298957;
  border-color: #298957;
  color: #fff
}

.btn-gradient-success.active,
.btn-gradient-success:active,
.btn-gradient-success:not(:disabled):not(.disabled):hover {
  background-image: linear-gradient(120deg, #257d50 0%, #37b875 100%);
  color: #fff;
  border-color: #1d623e
}

.btn-gradient-success:focus,
.btn-gradient-success.focus,
.btn-gradient-success:active,
.btn-gradient-success.active {
  color: #fff !important;
  border-color: #23754b !important
}

.btn-gradient-success.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(58, 196, 125, 0.4), 0 0.0625rem 0.125rem rgba(58, 196, 125, 0.5)
}

.btn-gradient-success.btn-shadow:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(58, 196, 125, 0.5), 0 0.0625rem 0.125rem rgba(58, 196, 125, 0.6)
}

.btn-gradient-info {
  background-image: linear-gradient(140deg, #007fc9 -30%, #16aaff 90%);
  background-color: #007fc9;
  border-color: #007fc9;
  color: #fff
}

.btn-gradient-info.active,
.btn-gradient-info:active,
.btn-gradient-info:not(:disabled):not(.disabled):hover {
  background-image: linear-gradient(120deg, #0076b9 0%, #07a4ff 100%);
  color: #fff;
  border-color: #005f96
}

.btn-gradient-info:focus,
.btn-gradient-info.focus,
.btn-gradient-info:active,
.btn-gradient-info.active {
  color: #fff !important;
  border-color: #006faf !important
}

.btn-gradient-info.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(22, 170, 255, 0.4), 0 0.0625rem 0.125rem rgba(22, 170, 255, 0.5)
}

.btn-gradient-info.btn-shadow:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(22, 170, 255, 0.5), 0 0.0625rem 0.125rem rgba(22, 170, 255, 0.6)
}

.btn-gradient-warning {
  background-image: linear-gradient(140deg, #c78f07 -30%, #f7b924 90%);
  background-color: #c78f07;
  border-color: #c78f07;
  color: #fff
}

.btn-gradient-warning.active,
.btn-gradient-warning:active,
.btn-gradient-warning:not(:disabled):not(.disabled):hover {
  background-image: linear-gradient(120deg, #b88407 0%, #f6b415 100%);
  color: #fff;
  border-color: #966c05
}

.btn-gradient-warning:focus,
.btn-gradient-warning.focus,
.btn-gradient-warning:active,
.btn-gradient-warning.active {
  color: #fff !important;
  border-color: #af7d06 !important
}

.btn-gradient-warning.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(247, 185, 36, 0.4), 0 0.0625rem 0.125rem rgba(247, 185, 36, 0.5)
}

.btn-gradient-warning.btn-shadow:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(247, 185, 36, 0.5), 0 0.0625rem 0.125rem rgba(247, 185, 36, 0.6)
}

.btn-gradient-danger {
  background-image: linear-gradient(140deg, #981a38 -30%, #d92550 90%);
  background-color: #981a38;
  border-color: #981a38;
  color: #fff
}

.btn-gradient-danger.active,
.btn-gradient-danger:active,
.btn-gradient-danger:not(:disabled):not(.disabled):hover {
  background-image: linear-gradient(120deg, #8b1833 0%, #cc234b 100%);
  color: #fff;
  border-color: #6c1228
}

.btn-gradient-danger:focus,
.btn-gradient-danger.focus,
.btn-gradient-danger:active,
.btn-gradient-danger.active {
  color: #fff !important;
  border-color: #821630 !important
}

.btn-gradient-danger.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(217, 37, 80, 0.4), 0 0.0625rem 0.125rem rgba(217, 37, 80, 0.5)
}

.btn-gradient-danger.btn-shadow:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(217, 37, 80, 0.5), 0 0.0625rem 0.125rem rgba(217, 37, 80, 0.6)
}

.btn-gradient-focus {
  background-image: linear-gradient(140deg, #211f29 -30%, #444054 90%);
  background-color: #211f29;
  border-color: #211f29;
  color: #fff
}

.btn-gradient-focus.active,
.btn-gradient-focus:active,
.btn-gradient-focus:not(:disabled):not(.disabled):hover {
  background-image: linear-gradient(120deg, #1a1820 0%, #3d394b 100%);
  color: #fff;
  border-color: #09090c
}

.btn-gradient-focus:focus,
.btn-gradient-focus.focus,
.btn-gradient-focus:active,
.btn-gradient-focus.active {
  color: #fff !important;
  border-color: #15141a !important
}

.btn-gradient-focus.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(68, 64, 84, 0.4), 0 0.0625rem 0.125rem rgba(68, 64, 84, 0.5)
}

.btn-gradient-focus.btn-shadow:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(68, 64, 84, 0.5), 0 0.0625rem 0.125rem rgba(68, 64, 84, 0.6)
}

.btn-gradient-alternate {
  background-image: linear-gradient(140deg, #4e3159 -30%, #794c8a 90%);
  background-color: #4e3159;
  border-color: #4e3159;
  color: #fff
}

.btn-gradient-alternate.active,
.btn-gradient-alternate:active,
.btn-gradient-alternate:not(:disabled):not(.disabled):hover {
  background-image: linear-gradient(120deg, #452b4f 0%, #704780 100%);
  color: #fff;
  border-color: #311f38
}

.btn-gradient-alternate:focus,
.btn-gradient-alternate.focus,
.btn-gradient-alternate:active,
.btn-gradient-alternate.active {
  color: #fff !important;
  border-color: #3f2848 !important
}

.btn-gradient-alternate.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(121, 76, 138, 0.4), 0 0.0625rem 0.125rem rgba(121, 76, 138, 0.5)
}

.btn-gradient-alternate.btn-shadow:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(121, 76, 138, 0.5), 0 0.0625rem 0.125rem rgba(121, 76, 138, 0.6)
}

.btn-gradient-light {
  background-image: linear-gradient(140deg, #c8c8c8 -30%, #eee 90%);
  background-color: #c8c8c8;
  border-color: #c8c8c8;
  color: #212529
}

.btn-gradient-light.active,
.btn-gradient-light:active,
.btn-gradient-light:not(:disabled):not(.disabled):hover {
  background-image: linear-gradient(120deg, silver 0%, #e6e6e6 100%);
  color: #212529;
  border-color: #aeaeae
}

.btn-gradient-light:focus,
.btn-gradient-light.focus,
.btn-gradient-light:active,
.btn-gradient-light.active {
  color: #212529 !important;
  border-color: #bbb !important
}

.btn-gradient-light.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(238, 238, 238, 0.4), 0 0.0625rem 0.125rem rgba(238, 238, 238, 0.5)
}

.btn-gradient-light.btn-shadow:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(238, 238, 238, 0.5), 0 0.0625rem 0.125rem rgba(238, 238, 238, 0.6)
}

.btn-gradient-dark {
  background-image: linear-gradient(140deg, #121416 -30%, #343a40 90%);
  background-color: #121416;
  border-color: #121416;
  color: #fff
}

.btn-gradient-dark.active,
.btn-gradient-dark:active,
.btn-gradient-dark:not(:disabled):not(.disabled):hover {
  background-image: linear-gradient(120deg, #0b0c0d 0%, #2d3238 100%);
  color: #fff;
  border-color: #000
}

.btn-gradient-dark:focus,
.btn-gradient-dark.focus,
.btn-gradient-dark:active,
.btn-gradient-dark.active {
  color: #fff !important;
  border-color: #060708 !important
}

.btn-gradient-dark.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(52, 58, 64, 0.4), 0 0.0625rem 0.125rem rgba(52, 58, 64, 0.5)
}

.btn-gradient-dark.btn-shadow:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(52, 58, 64, 0.5), 0 0.0625rem 0.125rem rgba(52, 58, 64, 0.6)
}

.btn.btn-shadow.active {
  box-shadow: 0 0 0 0 transparent !important
}

.btn-primary {
  color: #fff;
  background-color: #3f6ad8;
  border-color: #3f6ad8
}

.btn-primary:hover {
  color: #fff;
  background-color: #2955c8;
  border-color: #2651be
}

.btn-primary:focus,
.btn-primary.focus {
  box-shadow: 0 0 0 0 rgba(92, 128, 222, 0.5)
}

.btn-primary.disabled,
.btn-primary:disabled {
  color: #fff;
  background-color: #3f6ad8;
  border-color: #3f6ad8
}

.btn-primary:not(:disabled):not(.disabled):active,
.btn-primary:not(:disabled):not(.disabled).active,
.show>.btn-primary.dropdown-toggle {
  color: #fff;
  background-color: #2651be;
  border-color: #244cb3
}

.btn-primary:not(:disabled):not(.disabled):active:focus,
.btn-primary:not(:disabled):not(.disabled).active:focus,
.show>.btn-primary.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(92, 128, 222, 0.5)
}

.btn-primary.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(63, 106, 216, 0.4), 0 0.0625rem 0.125rem rgba(63, 106, 216, 0.5)
}

.btn-primary.btn-shadow:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(63, 106, 216, 0.5), 0 0.0625rem 0.125rem rgba(63, 106, 216, 0.6)
}

.btn-secondary {
  color: #fff;
  background-color: #6c757d;
  border-color: #6c757d
}

.btn-secondary:hover {
  color: #fff;
  background-color: #5a6268;
  border-color: #545b62
}

.btn-secondary:focus,
.btn-secondary.focus {
  box-shadow: 0 0 0 0 rgba(130, 138, 145, 0.5)
}

.btn-secondary.disabled,
.btn-secondary:disabled {
  color: #fff;
  background-color: #6c757d;
  border-color: #6c757d
}

.btn-secondary:not(:disabled):not(.disabled):active,
.btn-secondary:not(:disabled):not(.disabled).active,
.show>.btn-secondary.dropdown-toggle {
  color: #fff;
  background-color: #545b62;
  border-color: #4e555b
}

.btn-secondary:not(:disabled):not(.disabled):active:focus,
.btn-secondary:not(:disabled):not(.disabled).active:focus,
.show>.btn-secondary.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(130, 138, 145, 0.5)
}

.btn-secondary.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(108, 117, 125, 0.4), 0 0.0625rem 0.125rem rgba(108, 117, 125, 0.5)
}

.btn-secondary.btn-shadow:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(108, 117, 125, 0.5), 0 0.0625rem 0.125rem rgba(108, 117, 125, 0.6)
}

.btn-success {
  color: #fff;
  background-color: #1b8c2e;
  border-color: #1b8c2e
}

.btn-success:hover {
  color: #fff;
  background-color: #31a66a;
  border-color: #2e9d64
}

.btn-success:focus,
.btn-success.focus {
  box-shadow: 0 0 0 0 rgba(88, 205, 145, 0.5)
}

.btn-success.disabled,
.btn-success:disabled {
  color: #fff;
  background-color: #3ac47d;
  border-color: #3ac47d
}

.btn-success:not(:disabled):not(.disabled):active,
.btn-success:not(:disabled):not(.disabled).active,
.show>.btn-success.dropdown-toggle {
  color: #fff;
  background-color: #2e9d64;
  border-color: #2b935e
}

.btn-success:not(:disabled):not(.disabled):active:focus,
.btn-success:not(:disabled):not(.disabled).active:focus,
.show>.btn-success.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(88, 205, 145, 0.5)
}

.btn-success.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(58, 196, 125, 0.4), 0 0.0625rem 0.125rem rgba(58, 196, 125, 0.5)
}

.btn-success.btn-shadow:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(58, 196, 125, 0.5), 0 0.0625rem 0.125rem rgba(58, 196, 125, 0.6)
}

.btn-info {
  color: #fff;
  background-color: #16aaff;
  border-color: #16aaff
}

.btn-info:hover {
  color: #fff;
  background-color: #0098ef;
  border-color: #0090e2
}

.btn-info:focus,
.btn-info.focus {
  box-shadow: 0 0 0 0 rgba(57, 183, 255, 0.5)
}

.btn-info.disabled,
.btn-info:disabled {
  color: #fff;
  background-color: #16aaff;
  border-color: #16aaff
}

.btn-info:not(:disabled):not(.disabled):active,
.btn-info:not(:disabled):not(.disabled).active,
.show>.btn-info.dropdown-toggle {
  color: #fff;
  background-color: #0090e2;
  border-color: #0087d5
}

.btn-info:not(:disabled):not(.disabled):active:focus,
.btn-info:not(:disabled):not(.disabled).active:focus,
.show>.btn-info.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(57, 183, 255, 0.5)
}

.btn-info.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(22, 170, 255, 0.4), 0 0.0625rem 0.125rem rgba(22, 170, 255, 0.5)
}

.btn-info.btn-shadow:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(22, 170, 255, 0.5), 0 0.0625rem 0.125rem rgba(22, 170, 255, 0.6)
}

.btn-warning {
  color: #fff;
  background-color: #f7b924;
  border-color: #f7b924
}

.btn-warning:hover {
  color: #212529;
  background-color: #eca909;
  border-color: #e0a008
}

.btn-warning:focus,
.btn-warning.focus {
  box-shadow: 0 0 0 0 rgba(215, 163, 37, 0.5)
}

.btn-warning.disabled,
.btn-warning:disabled {
  color: #212529;
  background-color: #f7b924;
  border-color: #f7b924
}

.btn-warning:not(:disabled):not(.disabled):active,
.btn-warning:not(:disabled):not(.disabled).active,
.show>.btn-warning.dropdown-toggle {
  color: #212529;
  background-color: #e0a008;
  border-color: #d49808
}

.btn-warning:not(:disabled):not(.disabled):active:focus,
.btn-warning:not(:disabled):not(.disabled).active:focus,
.show>.btn-warning.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(215, 163, 37, 0.5)
}

.btn-warning.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(247, 185, 36, 0.4), 0 0.0625rem 0.125rem rgba(247, 185, 36, 0.5)
}

.btn-warning.btn-shadow:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(247, 185, 36, 0.5), 0 0.0625rem 0.125rem rgba(247, 185, 36, 0.6)
}

.btn-danger {
  color: #fff;
  background-color: #d92550;
  border-color: #d92550
}

.btn-danger:hover {
  color: #fff;
  background-color: #b81f44;
  border-color: #ad1e40
}

.btn-danger:focus,
.btn-danger.focus {
  box-shadow: 0 0 0 0 rgba(223, 70, 106, 0.5)
}

.btn-danger.disabled,
.btn-danger:disabled {
  color: #fff;
  background-color: #d92550;
  border-color: #d92550
}

.btn-danger:not(:disabled):not(.disabled):active,
.btn-danger:not(:disabled):not(.disabled).active,
.show>.btn-danger.dropdown-toggle {
  color: #fff;
  background-color: #ad1e40;
  border-color: #a31c3c
}

.btn-danger:not(:disabled):not(.disabled):active:focus,
.btn-danger:not(:disabled):not(.disabled).active:focus,
.show>.btn-danger.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(223, 70, 106, 0.5)
}

.btn-danger.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(217, 37, 80, 0.4), 0 0.0625rem 0.125rem rgba(217, 37, 80, 0.5)
}

.btn-danger.btn-shadow:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(217, 37, 80, 0.5), 0 0.0625rem 0.125rem rgba(217, 37, 80, 0.6)
}

.btn-light {
  color: #212529;
  background-color: #eee;
  border-color: #eee
}

.btn-light:hover {
  color: #212529;
  background-color: #dbdbdb;
  border-color: #d5d5d5
}

.btn-light:focus,
.btn-light.focus {
  box-shadow: 0 0 0 0 rgba(207, 208, 208, 0.5)
}

.btn-light.disabled,
.btn-light:disabled {
  color: #212529;
  background-color: #eee;
  border-color: #eee
}

.btn-light:not(:disabled):not(.disabled):active,
.btn-light:not(:disabled):not(.disabled).active,
.show>.btn-light.dropdown-toggle {
  color: #212529;
  background-color: #d5d5d5;
  border-color: #cecece
}

.btn-light:not(:disabled):not(.disabled):active:focus,
.btn-light:not(:disabled):not(.disabled).active:focus,
.show>.btn-light.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(207, 208, 208, 0.5)
}

.btn-light.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(238, 238, 238, 0.4), 0 0.0625rem 0.125rem rgba(238, 238, 238, 0.5)
}

.btn-light.btn-shadow:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(238, 238, 238, 0.5), 0 0.0625rem 0.125rem rgba(238, 238, 238, 0.6)
}

.btn-dark {
  color: #fff;
  background-color: #343a40;
  border-color: #343a40
}

.btn-dark:hover {
  color: #fff;
  background-color: #23272b;
  border-color: #1d2124
}

.btn-dark:focus,
.btn-dark.focus {
  box-shadow: 0 0 0 0 rgba(82, 88, 93, 0.5)
}

.btn-dark.disabled,
.btn-dark:disabled {
  color: #fff;
  background-color: #343a40;
  border-color: #343a40
}

.btn-dark:not(:disabled):not(.disabled):active,
.btn-dark:not(:disabled):not(.disabled).active,
.show>.btn-dark.dropdown-toggle {
  color: #fff;
  background-color: #1d2124;
  border-color: #171a1d
}

.btn-dark:not(:disabled):not(.disabled):active:focus,
.btn-dark:not(:disabled):not(.disabled).active:focus,
.show>.btn-dark.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(82, 88, 93, 0.5)
}

.btn-dark.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(52, 58, 64, 0.4), 0 0.0625rem 0.125rem rgba(52, 58, 64, 0.5)
}

.btn-dark.btn-shadow:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(52, 58, 64, 0.5), 0 0.0625rem 0.125rem rgba(52, 58, 64, 0.6)
}

.btn-focus {
  color: #fff;
  background-color: #444054;
  border-color: #444054
}

.btn-focus:hover {
  color: #fff;
  background-color: #322f3e;
  border-color: #2d2a37
}

.btn-focus:focus,
.btn-focus.focus {
  box-shadow: 0 0 0 0 rgba(96, 93, 110, 0.5)
}

.btn-focus.disabled,
.btn-focus:disabled {
  color: #fff;
  background-color: #444054;
  border-color: #444054
}

.btn-focus:not(:disabled):not(.disabled):active,
.btn-focus:not(:disabled):not(.disabled).active,
.show>.btn-focus.dropdown-toggle {
  color: #fff;
  background-color: #2d2a37;
  border-color: #272430
}

.btn-focus:not(:disabled):not(.disabled):active:focus,
.btn-focus:not(:disabled):not(.disabled).active:focus,
.show>.btn-focus.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(96, 93, 110, 0.5)
}

.btn-focus.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(68, 64, 84, 0.4), 0 0.0625rem 0.125rem rgba(68, 64, 84, 0.5)
}

.btn-focus.btn-shadow:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(68, 64, 84, 0.5), 0 0.0625rem 0.125rem rgba(68, 64, 84, 0.6)
}

.btn-alternate {
  color: #fff;
  background-color: #794c8a;
  border-color: #794c8a
}

.btn-alternate:hover {
  color: #fff;
  background-color: #633e71;
  border-color: #5c3a69
}

.btn-alternate:focus,
.btn-alternate.focus {
  box-shadow: 0 0 0 0 rgba(141, 103, 156, 0.5)
}

.btn-alternate.disabled,
.btn-alternate:disabled {
  color: #fff;
  background-color: #794c8a;
  border-color: #794c8a
}

.btn-alternate:not(:disabled):not(.disabled):active,
.btn-alternate:not(:disabled):not(.disabled).active,
.show>.btn-alternate.dropdown-toggle {
  color: #fff;
  background-color: #5c3a69;
  border-color: #553561
}

.btn-alternate:not(:disabled):not(.disabled):active:focus,
.btn-alternate:not(:disabled):not(.disabled).active:focus,
.show>.btn-alternate.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(141, 103, 156, 0.5)
}

.btn-alternate.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(121, 76, 138, 0.4), 0 0.0625rem 0.125rem rgba(121, 76, 138, 0.5)
}

.btn-alternate.btn-shadow:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(121, 76, 138, 0.5), 0 0.0625rem 0.125rem rgba(121, 76, 138, 0.6)
}

.btn-shadow-primary:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(63, 106, 216, 0.4), 0 0.0625rem 0.125rem rgba(63, 106, 216, 0.5)
}

.btn-shadow-secondary:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(108, 117, 125, 0.4), 0 0.0625rem 0.125rem rgba(108, 117, 125, 0.5)
}

.btn-shadow-success:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(58, 196, 125, 0.4), 0 0.0625rem 0.125rem rgba(58, 196, 125, 0.5)
}

.btn-shadow-info:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(22, 170, 255, 0.4), 0 0.0625rem 0.125rem rgba(22, 170, 255, 0.5)
}

.btn-shadow-warning:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(247, 185, 36, 0.4), 0 0.0625rem 0.125rem rgba(247, 185, 36, 0.5)
}

.btn-shadow-danger:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(217, 37, 80, 0.4), 0 0.0625rem 0.125rem rgba(217, 37, 80, 0.5)
}

.btn-shadow-light:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(238, 238, 238, 0.4), 0 0.0625rem 0.125rem rgba(238, 238, 238, 0.5)
}

.btn-shadow-dark:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(52, 58, 64, 0.4), 0 0.0625rem 0.125rem rgba(52, 58, 64, 0.5)
}

.btn-shadow-focus:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(68, 64, 84, 0.4), 0 0.0625rem 0.125rem rgba(68, 64, 84, 0.5)
}

.btn-shadow-alternate:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(121, 76, 138, 0.4), 0 0.0625rem 0.125rem rgba(121, 76, 138, 0.5)
}

.btn-outline-primary {
  color: #3f6ad8;
  border-color: #3f6ad8
}

.btn-outline-primary:hover {
  color: #fff;
  background-color: #3f6ad8;
  border-color: #3f6ad8
}

.btn-outline-primary:focus,
.btn-outline-primary.focus {
  box-shadow: 0 0 0 0 rgba(63, 106, 216, 0.5)
}

.btn-outline-primary.disabled,
.btn-outline-primary:disabled {
  color: #3f6ad8;
  background-color: transparent
}

.btn-outline-primary:not(:disabled):not(.disabled):active,
.btn-outline-primary:not(:disabled):not(.disabled).active,
.show>.btn-outline-primary.dropdown-toggle {
  color: #fff;
  background-color: #3f6ad8;
  border-color: #3f6ad8
}

.btn-outline-primary:not(:disabled):not(.disabled):active:focus,
.btn-outline-primary:not(:disabled):not(.disabled).active:focus,
.show>.btn-outline-primary.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(63, 106, 216, 0.5)
}

.btn-outline-primary.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(63, 106, 216, 0.4), 0 0.0625rem 0.125rem rgba(63, 106, 216, 0.5)
}

.btn-outline-primary.btn-shadow.active:hover,
.btn-outline-primary.btn-shadow.disabled:hover,
.btn-outline-primary.btn-shadow:active:hover,
.btn-outline-primary.btn-shadow:disabled:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(63, 106, 216, 0.5), 0 0.0625rem 0.125rem rgba(63, 106, 216, 0.6)
}

.btn-outline-primary.btn-shadow:hover {
  box-shadow: 0px 5px 15px 2px rgba(63, 106, 216, 0.19)
}

.btn-outline-secondary {
  color: #6c757d;
  border-color: #6c757d
}

.btn-outline-secondary:hover {
  color: #fff;
  background-color: #6c757d;
  border-color: #6c757d
}

.btn-outline-secondary:focus,
.btn-outline-secondary.focus {
  box-shadow: 0 0 0 0 rgba(108, 117, 125, 0.5)
}

.btn-outline-secondary.disabled,
.btn-outline-secondary:disabled {
  color: #6c757d;
  background-color: transparent
}

.btn-outline-secondary:not(:disabled):not(.disabled):active,
.btn-outline-secondary:not(:disabled):not(.disabled).active,
.show>.btn-outline-secondary.dropdown-toggle {
  color: #fff;
  background-color: #6c757d;
  border-color: #6c757d
}

.btn-outline-secondary:not(:disabled):not(.disabled):active:focus,
.btn-outline-secondary:not(:disabled):not(.disabled).active:focus,
.show>.btn-outline-secondary.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(108, 117, 125, 0.5)
}

.btn-outline-secondary.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(108, 117, 125, 0.4), 0 0.0625rem 0.125rem rgba(108, 117, 125, 0.5)
}

.btn-outline-secondary.btn-shadow.active:hover,
.btn-outline-secondary.btn-shadow.disabled:hover,
.btn-outline-secondary.btn-shadow:active:hover,
.btn-outline-secondary.btn-shadow:disabled:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(108, 117, 125, 0.5), 0 0.0625rem 0.125rem rgba(108, 117, 125, 0.6)
}

.btn-outline-secondary.btn-shadow:hover {
  box-shadow: 0px 5px 15px 2px rgba(108, 117, 125, 0.19)
}

.btn-outline-success {
  color: #3ac47d;
  border-color: #3ac47d
}

.btn-outline-success:hover {
  color: #fff;
  background-color: #3ac47d;
  border-color: #3ac47d
}

.btn-outline-success:focus,
.btn-outline-success.focus {
  box-shadow: 0 0 0 0 rgba(58, 196, 125, 0.5)
}

.btn-outline-success.disabled,
.btn-outline-success:disabled {
  color: #3ac47d;
  background-color: transparent
}

.btn-outline-success:not(:disabled):not(.disabled):active,
.btn-outline-success:not(:disabled):not(.disabled).active,
.show>.btn-outline-success.dropdown-toggle {
  color: #fff;
  background-color: #3ac47d;
  border-color: #3ac47d
}

.btn-outline-success:not(:disabled):not(.disabled):active:focus,
.btn-outline-success:not(:disabled):not(.disabled).active:focus,
.show>.btn-outline-success.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(58, 196, 125, 0.5)
}

.btn-outline-success.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(58, 196, 125, 0.4), 0 0.0625rem 0.125rem rgba(58, 196, 125, 0.5)
}

.btn-outline-success.btn-shadow.active:hover,
.btn-outline-success.btn-shadow.disabled:hover,
.btn-outline-success.btn-shadow:active:hover,
.btn-outline-success.btn-shadow:disabled:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(58, 196, 125, 0.5), 0 0.0625rem 0.125rem rgba(58, 196, 125, 0.6)
}

.btn-outline-success.btn-shadow:hover {
  box-shadow: 0px 5px 15px 2px rgba(58, 196, 125, 0.19)
}

.btn-outline-info {
  color: #16aaff;
  border-color: #16aaff
}

.btn-outline-info:hover {
  color: #fff;
  background-color: #16aaff;
  border-color: #16aaff
}

.btn-outline-info:focus,
.btn-outline-info.focus {
  box-shadow: 0 0 0 0 rgba(22, 170, 255, 0.5)
}

.btn-outline-info.disabled,
.btn-outline-info:disabled {
  color: #16aaff;
  background-color: transparent
}

.btn-outline-info:not(:disabled):not(.disabled):active,
.btn-outline-info:not(:disabled):not(.disabled).active,
.show>.btn-outline-info.dropdown-toggle {
  color: #fff;
  background-color: #16aaff;
  border-color: #16aaff
}

.btn-outline-info:not(:disabled):not(.disabled):active:focus,
.btn-outline-info:not(:disabled):not(.disabled).active:focus,
.show>.btn-outline-info.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(22, 170, 255, 0.5)
}

.btn-outline-info.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(22, 170, 255, 0.4), 0 0.0625rem 0.125rem rgba(22, 170, 255, 0.5)
}

.btn-outline-info.btn-shadow.active:hover,
.btn-outline-info.btn-shadow.disabled:hover,
.btn-outline-info.btn-shadow:active:hover,
.btn-outline-info.btn-shadow:disabled:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(22, 170, 255, 0.5), 0 0.0625rem 0.125rem rgba(22, 170, 255, 0.6)
}

.btn-outline-info.btn-shadow:hover {
  box-shadow: 0px 5px 15px 2px rgba(22, 170, 255, 0.19)
}

.btn-outline-warning {
  color: #f7b924;
  border-color: #f7b924
}

.btn-outline-warning:hover {
  color: #212529;
  background-color: #f7b924;
  border-color: #f7b924
}

.btn-outline-warning:focus,
.btn-outline-warning.focus {
  box-shadow: 0 0 0 0 rgba(247, 185, 36, 0.5)
}

.btn-outline-warning.disabled,
.btn-outline-warning:disabled {
  color: #f7b924;
  background-color: transparent
}

.btn-outline-warning:not(:disabled):not(.disabled):active,
.btn-outline-warning:not(:disabled):not(.disabled).active,
.show>.btn-outline-warning.dropdown-toggle {
  color: #212529;
  background-color: #f7b924;
  border-color: #f7b924
}

.btn-outline-warning:not(:disabled):not(.disabled):active:focus,
.btn-outline-warning:not(:disabled):not(.disabled).active:focus,
.show>.btn-outline-warning.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(247, 185, 36, 0.5)
}

.btn-outline-warning.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(247, 185, 36, 0.4), 0 0.0625rem 0.125rem rgba(247, 185, 36, 0.5)
}

.btn-outline-warning.btn-shadow.active:hover,
.btn-outline-warning.btn-shadow.disabled:hover,
.btn-outline-warning.btn-shadow:active:hover,
.btn-outline-warning.btn-shadow:disabled:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(247, 185, 36, 0.5), 0 0.0625rem 0.125rem rgba(247, 185, 36, 0.6)
}

.btn-outline-warning.btn-shadow:hover {
  box-shadow: 0px 5px 15px 2px rgba(247, 185, 36, 0.19)
}

.btn-outline-danger {
  color: #d92550;
  border-color: #d92550
}

.btn-outline-danger:hover {
  color: #fff;
  background-color: #d92550;
  border-color: #d92550
}

.btn-outline-danger:focus,
.btn-outline-danger.focus {
  box-shadow: 0 0 0 0 rgba(217, 37, 80, 0.5)
}

.btn-outline-danger.disabled,
.btn-outline-danger:disabled {
  color: #d92550;
  background-color: transparent
}

.btn-outline-danger:not(:disabled):not(.disabled):active,
.btn-outline-danger:not(:disabled):not(.disabled).active,
.show>.btn-outline-danger.dropdown-toggle {
  color: #fff;
  background-color: #d92550;
  border-color: #d92550
}

.btn-outline-danger:not(:disabled):not(.disabled):active:focus,
.btn-outline-danger:not(:disabled):not(.disabled).active:focus,
.show>.btn-outline-danger.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(217, 37, 80, 0.5)
}

.btn-outline-danger.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(217, 37, 80, 0.4), 0 0.0625rem 0.125rem rgba(217, 37, 80, 0.5)
}

.btn-outline-danger.btn-shadow.active:hover,
.btn-outline-danger.btn-shadow.disabled:hover,
.btn-outline-danger.btn-shadow:active:hover,
.btn-outline-danger.btn-shadow:disabled:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(217, 37, 80, 0.5), 0 0.0625rem 0.125rem rgba(217, 37, 80, 0.6)
}

.btn-outline-danger.btn-shadow:hover {
  box-shadow: 0px 5px 15px 2px rgba(217, 37, 80, 0.19)
}

.btn-outline-light {
  color: #eee;
  border-color: #eee
}

.btn-outline-light:hover {
  color: #212529;
  background-color: #eee;
  border-color: #eee
}

.btn-outline-light:focus,
.btn-outline-light.focus {
  box-shadow: 0 0 0 0 rgba(238, 238, 238, 0.5)
}

.btn-outline-light.disabled,
.btn-outline-light:disabled {
  color: #eee;
  background-color: transparent
}

.btn-outline-light:not(:disabled):not(.disabled):active,
.btn-outline-light:not(:disabled):not(.disabled).active,
.show>.btn-outline-light.dropdown-toggle {
  color: #212529;
  background-color: #eee;
  border-color: #eee
}

.btn-outline-light:not(:disabled):not(.disabled):active:focus,
.btn-outline-light:not(:disabled):not(.disabled).active:focus,
.show>.btn-outline-light.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(238, 238, 238, 0.5)
}

.btn-outline-light.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(238, 238, 238, 0.4), 0 0.0625rem 0.125rem rgba(238, 238, 238, 0.5)
}

.btn-outline-light.btn-shadow.active:hover,
.btn-outline-light.btn-shadow.disabled:hover,
.btn-outline-light.btn-shadow:active:hover,
.btn-outline-light.btn-shadow:disabled:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(238, 238, 238, 0.5), 0 0.0625rem 0.125rem rgba(238, 238, 238, 0.6)
}

.btn-outline-light.btn-shadow:hover {
  box-shadow: 0px 5px 15px 2px rgba(238, 238, 238, 0.19)
}

.btn-outline-dark {
  color: #343a40;
  border-color: #343a40
}

.btn-outline-dark:hover {
  color: #fff;
  background-color: #343a40;
  border-color: #343a40
}

.btn-outline-dark:focus,
.btn-outline-dark.focus {
  box-shadow: 0 0 0 0 rgba(52, 58, 64, 0.5)
}

.btn-outline-dark.disabled,
.btn-outline-dark:disabled {
  color: #343a40;
  background-color: transparent
}

.btn-outline-dark:not(:disabled):not(.disabled):active,
.btn-outline-dark:not(:disabled):not(.disabled).active,
.show>.btn-outline-dark.dropdown-toggle {
  color: #fff;
  background-color: #343a40;
  border-color: #343a40
}

.btn-outline-dark:not(:disabled):not(.disabled):active:focus,
.btn-outline-dark:not(:disabled):not(.disabled).active:focus,
.show>.btn-outline-dark.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(52, 58, 64, 0.5)
}

.btn-outline-dark.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(52, 58, 64, 0.4), 0 0.0625rem 0.125rem rgba(52, 58, 64, 0.5)
}

.btn-outline-dark.btn-shadow.active:hover,
.btn-outline-dark.btn-shadow.disabled:hover,
.btn-outline-dark.btn-shadow:active:hover,
.btn-outline-dark.btn-shadow:disabled:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(52, 58, 64, 0.5), 0 0.0625rem 0.125rem rgba(52, 58, 64, 0.6)
}

.btn-outline-dark.btn-shadow:hover {
  box-shadow: 0px 5px 15px 2px rgba(52, 58, 64, 0.19)
}

.btn-outline-focus {
  color: #444054;
  border-color: #444054
}

.btn-outline-focus:hover {
  color: #fff;
  background-color: #444054;
  border-color: #444054
}

.btn-outline-focus:focus,
.btn-outline-focus.focus {
  box-shadow: 0 0 0 0 rgba(68, 64, 84, 0.5)
}

.btn-outline-focus.disabled,
.btn-outline-focus:disabled {
  color: #444054;
  background-color: transparent
}

.btn-outline-focus:not(:disabled):not(.disabled):active,
.btn-outline-focus:not(:disabled):not(.disabled).active,
.show>.btn-outline-focus.dropdown-toggle {
  color: #fff;
  background-color: #444054;
  border-color: #444054
}

.btn-outline-focus:not(:disabled):not(.disabled):active:focus,
.btn-outline-focus:not(:disabled):not(.disabled).active:focus,
.show>.btn-outline-focus.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(68, 64, 84, 0.5)
}

.btn-outline-focus.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(68, 64, 84, 0.4), 0 0.0625rem 0.125rem rgba(68, 64, 84, 0.5)
}

.btn-outline-focus.btn-shadow.active:hover,
.btn-outline-focus.btn-shadow.disabled:hover,
.btn-outline-focus.btn-shadow:active:hover,
.btn-outline-focus.btn-shadow:disabled:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(68, 64, 84, 0.5), 0 0.0625rem 0.125rem rgba(68, 64, 84, 0.6)
}

.btn-outline-focus.btn-shadow:hover {
  box-shadow: 0px 5px 15px 2px rgba(68, 64, 84, 0.19)
}

.btn-outline-alternate {
  color: #794c8a;
  border-color: #794c8a
}

.btn-outline-alternate:hover {
  color: #fff;
  background-color: #794c8a;
  border-color: #794c8a
}

.btn-outline-alternate:focus,
.btn-outline-alternate.focus {
  box-shadow: 0 0 0 0 rgba(121, 76, 138, 0.5)
}

.btn-outline-alternate.disabled,
.btn-outline-alternate:disabled {
  color: #794c8a;
  background-color: transparent
}

.btn-outline-alternate:not(:disabled):not(.disabled):active,
.btn-outline-alternate:not(:disabled):not(.disabled).active,
.show>.btn-outline-alternate.dropdown-toggle {
  color: #fff;
  background-color: #794c8a;
  border-color: #794c8a
}

.btn-outline-alternate:not(:disabled):not(.disabled):active:focus,
.btn-outline-alternate:not(:disabled):not(.disabled).active:focus,
.show>.btn-outline-alternate.dropdown-toggle:focus {
  box-shadow: 0 0 0 0 rgba(121, 76, 138, 0.5)
}

.btn-outline-alternate.btn-shadow {
  box-shadow: 0 0.125rem 0.625rem rgba(121, 76, 138, 0.4), 0 0.0625rem 0.125rem rgba(121, 76, 138, 0.5)
}

.btn-outline-alternate.btn-shadow.active:hover,
.btn-outline-alternate.btn-shadow.disabled:hover,
.btn-outline-alternate.btn-shadow:active:hover,
.btn-outline-alternate.btn-shadow:disabled:hover {
  box-shadow: 0 0.125rem 0.625rem rgba(121, 76, 138, 0.5), 0 0.0625rem 0.125rem rgba(121, 76, 138, 0.6)
}

.btn-outline-alternate.btn-shadow:hover {
  box-shadow: 0px 5px 15px 2px rgba(121, 76, 138, 0.19)
}

.btn {
  position: relative;
  transition: color 0.15s, background-color 0.15s, border-color 0.15s, box-shadow 0.15s
}

@media screen and (prefers-reduced-motion: reduce) {
  .btn {
    transition: none
  }
}

.btn-light {
  border-color: #dcdcdc
}

.btn-outline-light {
  color: #8f8f8f
}

.dropdown-menu {
  box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03);
  margin: .125rem
}

.dropdown-menu.dropdown-menu-right {
  right: 0 !important
}

.dropdown-menu .dropdown-header {
  text-transform: uppercase;
  font-size: .73333rem;
  color: #3f6ad8;
  font-weight: bold
}

.dropdown-menu .dropdown-item {
  font-size: .88rem;
  display: flex;
  align-items: center;
  transition: background-color 0.3s ease, color 0.3s ease;
  cursor: pointer;
  z-index: 6;
  position: relative
}

.dropdown-menu .dropdown-item .dropdown-icon {
  font-size: 1rem;
  margin-right: .325rem;
  width: 30px;
  text-align: center;
  opacity: .3;
  margin-left: -10px
}

.dropdown-menu .dropdown-item:hover .dropdown-icon {
  opacity: .7
}

.dropdown-menu.dropdown-menu-shadow {
  box-shadow: 0 0.66875rem 2.3875rem rgba(4, 9, 20, 0.03), 0 1.1375rem 1.60625rem rgba(4, 9, 20, 0.03), 0 0.45rem 0.73125rem rgba(4, 9, 20, 0.05), 0 0.325rem 0.3875rem rgba(4, 9, 20, 0.03)
}

.dropdown-menu-rounded {
  border-radius: 10px;
  padding: .65rem
}

.dropdown-menu-rounded .dropdown-item {
  border-radius: 30px
}

.dropdown-menu-rounded .dropdown-divider {
  margin-left: -.65rem;
  margin-right: -.65rem
}

.dropdown-menu-rounded .dropdown-menu-header {
  margin-left: -.65rem;
  margin-right: -.65rem;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px
}

.dropdown-menu-rounded .menu-header-image,
.dropdown-menu-rounded .dropdown-menu-header-inner {
  border-top-left-radius: 10px;
  border-top-right-radius: 10px
}

.dropdown-menu-hover-link .dropdown-item:hover {
  background: none;
  color: #3f6ad8
}

.dropdown-menu-hover-primary .dropdown-item:hover {
  background: #3f6ad8;
  color: #fff
}

.dropdown-menu.dropdown-menu-lg {
  min-width: 22rem
}

.dropdown-menu.dropdown-menu-xl {
  min-width: 25rem
}

.dropdown-menu .dropdown-menu-header,
.dropdown-menu .menu-header-image,
.dropdown-menu .dropdown-menu-header-inner {
  border-top-left-radius: .25rem;
  border-top-right-radius: .25rem
}

.dropdown-menu-header {
  color: #fff;
  margin-top: -.65rem;
  margin-bottom: .65rem;
  position: relative;
  z-index: 6
}

.dropdown-menu-header .dropdown-menu-header-inner {
  margin: -1px -1px 0;
  padding: 1.5rem .5rem;
  position: relative
}

.dropdown-menu-header .menu-header-image {
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  z-index: 8;
  opacity: .25;
  filter: grayscale(80%);
  background-size: cover
}

.dropdown-menu-header .menu-header-content {
  text-align: center;
  position: relative;
  z-index: 10
}

.dropdown-menu-header .menu-header-content.text-left {
  padding-left: .5rem
}

.dropdown-menu-header .menu-header-content.btn-pane-right {
  padding-left: .5rem;
  padding-right: .5rem;
  display: flex;
  align-content: center;
  align-items: center;
  text-align: left
}

.dropdown-menu-header .menu-header-content.btn-pane-right .menu-header-btn-pane {
  margin: 0 0 0 auto
}

.dropdown-menu-header .menu-header-content .menu-header-btn-pane {
  margin-top: 10px;
  margin-bottom: 3px
}

.dropdown-menu-header+.grid-menu {
  margin-top: -.65rem
}

.menu-header-title {
  font-weight: 500;
  font-size: 1.25rem;
  margin: 0
}

.menu-header-subtitle {
  font-size: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  margin: 5px 0 0;
  opacity: .8
}

.dropdown-menu .grid-menu {
  margin-bottom: -.65rem;
  padding: 1px
}

.dropdown-menu .grid-menu [class*="col-"] {
  padding: .65rem
}

.dropdown-menu .grid-menu-xl {
  margin-bottom: -.48148rem
}

.dropdown-menu .grid-menu-xl [class*="col-"] {
  padding: 0
}

.dropdown-toggle::after {
  position: relative;
  top: 2px;
  opacity: .8;
  margin-left: 5px
}

.dropdown-toggle-split::after {
  margin-left: 0
}

.dropright .dropdown-toggle::after {
  top: 0
}

.dropdown-toggle-split {
  border-left: rgba(255, 255, 255, 0.1) solid 2px
}

.dropdown-mega-menu {
  width: 56rem;
  padding: 1rem
}

.dropdown-mega-menu .nav-item.nav-item-header {
  text-transform: none;
  font-size: 1rem;
  padding-top: 0;
  font-weight: normal
}

.dropdown-mega-menu .grid-menu {
  margin-bottom: 0
}

.dropdown-mega-menu-sm {
  width: 40rem
}

body .dropdown-menu.dropdown-menu-inline {
  border: 0;
  position: static !important;
  box-shadow: 0 0 0 transparent;
  background: transparent;
  border-radius: 0;
  display: inline-block;
  float: none;
  left: 0 !important;
  top: 0 !important;
  width: 100% !important;
  transform: translateY(0) !important
}

body .dropdown-menu.dropdown-menu-inline::before,
body .dropdown-menu.dropdown-menu-inline::after {
  display: none
}

.nav-item .nav-link {
  font-weight: normal
}

.nav-link {
  display: flex;
  align-items: center;
  transition: background-color 0.3s ease, color 0.3s ease;
  cursor: pointer
}

.nav-link .nav-link-icon {
  color: #3f6ad8;
  font-size: 1rem;
  width: 30px;
  text-align: center;
  opacity: .45;
  margin-left: -10px
}

.nav-link:hover {
  color: #495057
}

.nav-link:hover .nav-link-icon {
  opacity: .9;
  color: #3f6ad8
}

.nav-link:disabled .nav-link-icon,
.nav-link.disabled .nav-link-icon {
  opacity: .3
}

.nav-item.nav-item-header {
  color: #313131;
  font-weight: normal;
  padding: .5rem 1rem 0rem;
  line-height:20px;
}

.nav-item.nav-item-header h5{margin:0px}

.nav-item.nav-item-btn {
  padding: .5rem 1rem
}

.nav-item.nav-item-divider {
  margin: .5rem 0;
  height: 1px;
  overflow: hidden;
  background: #dee2e6
}

.nav .badge {
  margin-left: 8px
}

.nav-pills .nav-link.active,
.nav-pills .nav-link.active:hover {
  color: #fff
}

.nav-pills .nav-link.active .nav-link-icon,
.nav-pills .nav-link.active:hover .nav-link-icon {
  color: #fff;
  opacity: .8
}

.nav-pills .nav-link:hover {
  color: #495057 !important
}

.nav-justified .nav-link .nav-text {
  display: block;
  width: 100%;
  text-align: center
}

.grid-menu [class*="col-"] {
  border-right: #dee2e6 solid 0;
  border-bottom: #dee2e6 solid 1px
}

.grid-menu [class*="col-"]:hover {
  z-index: 5
}

@media (min-width: 576px) {
  .grid-menu [class*="col-"]:nth-last-child(-n+2) {
    border-bottom-width: 0
  }

  .grid-menu [class*="col-"]:nth-child(1n) {
    border-right-width: 1px
  }

  .grid-menu [class*="col-"]:nth-child(2n) {
    border-right-width: 1
  }
}

.grid-menu [class*="col-"]:nth-last-child(-n+1) {
  border-bottom-width: 0
}

@media (min-width: 1200px) {
  .grid-menu.grid-menu-3col [class*="col-"]:nth-last-child(-n+3) {
    border-bottom-width: 0
  }

  .grid-menu.grid-menu-3col [class*="col-"]:nth-child(2n) {
    border-right-width: 1px
  }

  .grid-menu.grid-menu-3col [class*="col-"]:nth-child(3n) {
    border-right-width: 0
  }
}

.grid-menu .btn {
  display: block;
  border: 0;
  min-width: 100%
}

.badge-primary {
  color: #fff;
  background-color: #3f6ad8
}

a.badge-primary:hover,
a.badge-primary:focus {
  color: #fff;
  background-color: #2651be
}

.badge-secondary {
  color: #fff;
  background-color: #6c757d
}

a.badge-secondary:hover,
a.badge-secondary:focus {
  color: #fff;
  background-color: #545b62
}

.badge-success {
  color: #fff;
  background-color: #3ac47d
}

a.badge-success:hover,
a.badge-success:focus {
  color: #fff;
  background-color: #2e9d64
}

.badge-info {
  color: #fff;
  background-color: #16aaff
}

a.badge-info:hover,
a.badge-info:focus {
  color: #fff;
  background-color: #0090e2
}

.badge-warning {
  color: #212529;
  background-color: #f7b924
}

a.badge-warning:hover,
a.badge-warning:focus {
  color: #212529;
  background-color: #e0a008
}

.badge-danger {
  color: #fff;
  background-color: #d92550
}

a.badge-danger:hover,
a.badge-danger:focus {
  color: #fff;
  background-color: #ad1e40
}

.badge-light {
  color: #212529;
  background-color: #eee
}

a.badge-light:hover,
a.badge-light:focus {
  color: #212529;
  background-color: #d5d5d5
}

.badge-dark {
  color: #fff;
  background-color: #343a40
}

a.badge-dark:hover,
a.badge-dark:focus {
  color: #fff;
  background-color: #1d2124
}

.badge-focus {
  color: #fff;
  background-color: #444054
}

a.badge-focus:hover,
a.badge-focus:focus {
  color: #fff;
  background-color: #2d2a37
}

.badge-alternate {
  color: #fff;
  background-color: #794c8a
}

a.badge-alternate:hover,
a.badge-alternate:focus {
  color: #fff;
  background-color: #5c3a69
}

.badge {
  font-weight: bold;
  text-transform: uppercase;
  padding: 5px 10px;
  min-width: 19px
}

.badge-light {
  background: #fff
}

.badge-dot {
  text-indent: -999em;
  padding: 0;
  width: 8px;
  height: 8px;
  border: transparent solid 1px;
  border-radius: 30px;
  min-width: 2px
}

.badge-dot-lg {
  width: 10px;
  height: 10px
}

.badge-dot-xl {
  width: 18px;
  height: 18px;
  position: relative
}

.badge-dot-xl::before {
  content: '';
  width: 10px;
  height: 10px;
  border-radius: .25rem;
  position: absolute;
  left: 50%;
  top: 50%;
  margin: -5px 0 0 -5px;
  background: #fff
}

.badge-dot-sm {
  width: 6px;
  height: 6px
}

.btn .badge {
  margin-left: 8px
}

.btn .badge-dot {
  position: absolute;
  border: #fff solid 2px;
  top: -5px;
  right: -5px;
  width: 11px;
  height: 11px
}

.btn .badge-dot.badge-dot-lg {
  width: 14px;
  height: 14px
}

.btn .badge-dot.badge-dot-sm {
  width: 8px;
  height: 8px;
  border-width: 1px
}

.btn .badge-dot-inside {
  top: 10px;
  right: 10px
}

.btn-sm .badge-dot-sm,
.btn-group-sm>.btn .badge-dot-sm {
  top: 1px;
  right: 4px
}

.btn-sm .badge-dot,
.btn-group-sm>.btn .badge-dot {
  top: 0px;
  right: 2px
}

.btn-sm .badge-dot-lg,
.btn-group-sm>.btn .badge-dot-lg {
  top: -3px;
  right: -2px
}

.btn-sm .badge-pill,
.btn-group-sm>.btn .badge-pill {
  position: absolute;
  top: -4px;
  right: -4px
}

.badge-abs {
  position: absolute;
  right: -3px;
  top: -3px
}

.avatar-icon-wrapper {
  display: inline-block;
  margin-right: .1rem;
  position: relative
}

.avatar-icon-wrapper .badge {
  position: absolute;
  right: -2px;
  top: -2px
}

.avatar-icon-wrapper .badge:empty {
  display: block
}

.avatar-icon-wrapper .badge.badge-bottom {
  top: auto;
  right: -2px;
  bottom: -2px
}

.avatar-icon-wrapper .badge-dot {
  width: 10px;
  height: 10px;
  border: #fff solid 2px
}

.avatar-icon-wrapper .badge-dot.badge-dot-lg {
  width: 14px;
  height: 14px;
  border: #fff solid 2px;
  top: 0;
  right: 0
}

.avatar-icon-wrapper .badge-dot.badge-dot-lg.badge-bottom {
  top: auto;
  right: 0;
  bottom: 0
}

.avatar-icon-add .avatar-icon {
  background: #e0f3ff;
  border: #7f9be5 dashed 1px;
  color: #3f6ad8;
  text-align: center;
  opacity: .6
}

.avatar-icon-add .avatar-icon i {
  font-style: normal;
  vertical-align: middle;
  font-size: 1.5rem;
  display: block;
  height: 100%
}

.avatar-icon-add:hover {
  cursor: pointer
}

.avatar-icon-add:hover .avatar-icon {
  opacity: 1
}

a.avatar-icon-wrapper:hover .avatar-icon {
  opacity: .8
}

.avatar-icon {
  display: block;
  width: 44px;
  height: 44px;
  transition: all .2s;
  opacity: 1;
  border-radius: 50px
}

.avatar-icon.rounded {
  border-radius: .39rem !important
}

.avatar-icon-xl .avatar-icon {
  width: 64px;
  height: 64px
}

.avatar-icon-xl.avatar-icon-add i {
  font-size: 2rem
}

.avatar-icon-lg .avatar-icon {
  width: 54px;
  height: 54px
}

.avatar-icon-lg.avatar-icon-add i {
  font-size: 1.75rem
}

.avatar-icon-sm .avatar-icon {
  width: 34px;
  height: 34px
}

.avatar-icon-sm.avatar-icon-add i {
  font-size: 1.1rem
}

.avatar-icon-xs .avatar-icon {
  width: 26px;
  height: 26px;
  transition: transform .2s
}

.avatar-icon-xs.avatar-icon-add i {
  line-height: 26px;
  font-size: .88rem
}

.avatar-icon-xs:hover .avatar-icon {
  transform: scale(2)
}

.avatar-icon {
  border: #fff solid 3px;
  overflow: hidden
}

.avatar-icon img {
  width: 100%;
  height: 100%
}

.avatar-wrapper-overlap .avatar-icon-wrapper {
  z-index: 5;
  margin-left: -18px
}

.avatar-wrapper-overlap .avatar-icon-wrapper:hover {
  z-index: 7
}

.avatar-wrapper-overlap .avatar-icon-wrapper.avatar-icon-xl {
  margin-left: -30px
}

.avatar-wrapper-overlap .avatar-icon-wrapper.avatar-icon-lg {
  margin-left: -24px
}

.avatar-wrapper-overlap .avatar-icon-wrapper.avatar-icon-sm {
  margin-left: -14px
}

.avatar-wrapper-overlap .avatar-icon-wrapper.avatar-icon-xs {
  margin-left: -10px
}

.avatar-wrapper-overlap .avatar-icon-wrapper.avatar-icon-add,
.avatar-wrapper-overlap .avatar-icon-wrapper:first-child {
  margin-left: 0 !important
}

@-webkit-keyframes sploosh {
  0% {
    box-shadow: 0 0 0 0px rgba(51, 51, 51, 0.2)
  }

  100% {
    box-shadow: 0 0 0 8px rgba(51, 51, 51, 0)
  }
}

@-webkit-keyframes pulse {
  0% {
    -webkit-transform: scale(1)
  }

  16.5% {
    -webkit-transform: scale(1.2)
  }

  33% {
    -webkit-transform: scale(1.1)
  }

  100% {
    -webkit-transform: scale(1)
  }
}

.badge-pulse {
  -webkit-animation: pulse 2s ease-out;
  -webkit-animation-iteration-count: infinite;
  position: relative
}

.badge-pulse::before,
.badge-pulse::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  border: 0;
  width: 100%;
  height: 100%;
  border-radius: 50%;
  -webkit-animation: sploosh 2s cubic-bezier(0.165, 0.84, 0.44, 1);
  -webkit-animation-iteration-count: infinite
}

.badge-pulse::after {
  -webkit-animation-delay: .33s;
  -webkit-animation-duration: 2.2s
}

.card {
  box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03);
  border-width: 0;
  transition: all .2s
}

.card>.dropdown-menu-header {
  margin: 0
}

.card>.dropdown-menu-header .dropdown-menu-header-inner {
  border-top-left-radius: .25rem;
  border-top-right-radius: .25rem
}

.card.text-dark.text-white .card-footer,
.card.text-dark.text-white .card-header,
.card.text-white .card-footer,
.card.text-white .card-header {
  background: rgba(255, 255, 255, 0.1);
  color: rgba(255, 255, 255, 0.9)
}

.card.text-dark.text-white .card-footer,
.card.text-dark.text-white .card-header {
  color: rgba(0, 0, 0, 0.9)
}

.card .card-footer {
  display: flex;
  align-items: center
}

.btn-actions-pane-right {
  margin-left: auto;
  white-space: nowrap
}

.btn-actions-pane-right a {
  text-transform: none
}

.btn-actions-pane-left {
  margin-right: auto
}

.actions-icon-btn .btn-icon-only {
  padding-left: 0;
  padding-right: 0;
  color: #495057
}

.actions-icon-btn .btn-icon-only .btn-icon-wrapper {
  font-size: 1.3rem;
  width: 30px;
  text-align: center
}

.actions-icon-btn .btn-icon-only:hover {
  color: #3f6ad8
}

.card-header,
.card-title {
  text-transform: uppercase;
  color: rgba(13, 27, 62, 0.7);
  font-weight: bold;
  font-size: .88rem
}

.card-header {
  display: flex;
  align-items: center;
  border-bottom-width: 1px;
  padding-top: 0;
  padding-bottom: 0;
  padding-right: .625rem;
  height: 2.5rem
}

.card-header.no-border {
  border: 0;
  padding: 0;
  height: auto
}

.card-header .menu-header-subtitle {
  display: block
}

.card-header.card-header-tab .nav {
  width: auto;
  margin-left: auto
}

.card-header.card-header-tab .card-header-title {
  display: flex;
  align-items: center;
  white-space: nowrap
}

.card-header .header-icon {
  font-size: 1.65rem;
  margin-right: .625rem
}

.card-header>.nav {
  margin-left: -.625rem;
  height: 100%;
  width: 100%
}

.card-header>.nav .nav-item {
  position: relative;
  height: 100%;
  display: flex;
  align-items: center
}

.card-header>.nav .nav-link {
  text-transform: none;
  width: 100%;
  display: block;
  color: #495057
}

.card-header>.nav .nav-link::before {
  content: '';
  border-radius: 15px;
  background: #3f6ad8;
  transition: all .2s;
  height: 4px;
  width: 100%;
  position: absolute;
  left: 0;
  bottom: -2px;
  opacity: 0
}

.card-header>.nav .nav-link:hover {
  color: #3f6ad8
}

.card-header>.nav .nav-link.active {
  color: #3f6ad8
}

.card-header>.nav .nav-link.active::before {
  opacity: 1
}

.card-header.card-header-tab-animation .nav .nav-link::before {
  transform: scale(0);
  opacity: 1;
  width: 90%;
  left: 5%
}

.card-header.card-header-tab-animation .nav .nav-link.active::before,
.card-header.card-header-tab-animation .nav .nav-link:hover::before {
  transform: scale(1)
}

.card-border {
  box-shadow: 0 0 0 transparent;
  border-width: 1px
}

.card-hover-shadow:hover {
  box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03)
}

.card-hover-shadow-2x:hover {
  box-shadow: 0 0.66875rem 2.3875rem rgba(4, 9, 20, 0.03), 0 1.1375rem 1.60625rem rgba(4, 9, 20, 0.03), 0 0.45rem 0.73125rem rgba(4, 9, 20, 0.05), 0 0.325rem 0.3875rem rgba(4, 9, 20, 0.03)
}

.card-subtitle {
  margin-bottom: .75rem;
  font-size: .968rem;
  color: rgba(13, 27, 62, 0.55)
}

.card-shadow-primary {
  box-shadow: 0 0.46875rem 2.1875rem rgba(63, 106, 216, 0.03), 0 0.9375rem 1.40625rem rgba(63, 106, 216, 0.03), 0 0.25rem 0.53125rem rgba(63, 106, 216, 0.05), 0 0.125rem 0.1875rem rgba(63, 106, 216, 0.03)
}

.card-shadow-secondary {
  box-shadow: 0 0.46875rem 2.1875rem rgba(108, 117, 125, 0.03), 0 0.9375rem 1.40625rem rgba(108, 117, 125, 0.03), 0 0.25rem 0.53125rem rgba(108, 117, 125, 0.05), 0 0.125rem 0.1875rem rgba(108, 117, 125, 0.03)
}

.card-shadow-success {
  box-shadow: 0 0.46875rem 2.1875rem rgba(58, 196, 125, 0.03), 0 0.9375rem 1.40625rem rgba(58, 196, 125, 0.03), 0 0.25rem 0.53125rem rgba(58, 196, 125, 0.05), 0 0.125rem 0.1875rem rgba(58, 196, 125, 0.03)
}

.card-shadow-info {
  box-shadow: 0 0.46875rem 2.1875rem rgba(22, 170, 255, 0.03), 0 0.9375rem 1.40625rem rgba(22, 170, 255, 0.03), 0 0.25rem 0.53125rem rgba(22, 170, 255, 0.05), 0 0.125rem 0.1875rem rgba(22, 170, 255, 0.03)
}

.card-shadow-warning {
  box-shadow: 0 0.46875rem 2.1875rem rgba(247, 185, 36, 0.03), 0 0.9375rem 1.40625rem rgba(247, 185, 36, 0.03), 0 0.25rem 0.53125rem rgba(247, 185, 36, 0.05), 0 0.125rem 0.1875rem rgba(247, 185, 36, 0.03)
}

.card-shadow-danger {
  box-shadow: 0 0.46875rem 2.1875rem rgba(217, 37, 80, 0.03), 0 0.9375rem 1.40625rem rgba(217, 37, 80, 0.03), 0 0.25rem 0.53125rem rgba(217, 37, 80, 0.05), 0 0.125rem 0.1875rem rgba(217, 37, 80, 0.03)
}

.card-shadow-light {
  box-shadow: 0 0.46875rem 2.1875rem rgba(238, 238, 238, 0.03), 0 0.9375rem 1.40625rem rgba(238, 238, 238, 0.03), 0 0.25rem 0.53125rem rgba(238, 238, 238, 0.05), 0 0.125rem 0.1875rem rgba(238, 238, 238, 0.03)
}

.card-shadow-dark {
  box-shadow: 0 0.46875rem 2.1875rem rgba(52, 58, 64, 0.03), 0 0.9375rem 1.40625rem rgba(52, 58, 64, 0.03), 0 0.25rem 0.53125rem rgba(52, 58, 64, 0.05), 0 0.125rem 0.1875rem rgba(52, 58, 64, 0.03)
}

.card-shadow-focus {
  box-shadow: 0 0.46875rem 2.1875rem rgba(68, 64, 84, 0.03), 0 0.9375rem 1.40625rem rgba(68, 64, 84, 0.03), 0 0.25rem 0.53125rem rgba(68, 64, 84, 0.05), 0 0.125rem 0.1875rem rgba(68, 64, 84, 0.03)
}

.card-shadow-alternate {

  box-shadow: 0 0.46875rem 2.1875rem rgba(121, 76, 138, 0.03), 0 0.9375rem 1.40625rem rgba(121, 76, 138, 0.03), 0 0.25rem 0.53125rem rgba(121, 76, 138, 0.05), 0 0.125rem 0.1875rem rgba(121, 76, 138, 0.03)
}

.card-header-lg {
  padding: 1.5rem 2.5rem;
  height: auto
}

.sticky-active-class .sticky-inner-wrapper>div {
  box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03)
}

.nav-pills,
.nav-tabs {
  margin-bottom: 1rem
}

.nav-link {
  font-weight: bold
}

.nav-link:hover {
  cursor: pointer
}

.nav-tabs .nav-link:hover {
  color: #3f6ad8 !important
}

.nav-tabs .nav-link.active {
  color: #3f6ad8
}

.nav-pills .nav-link:hover {
  color: #3f6ad8 !important
}

.nav-pills .nav-link.active {
  background: #3f6ad8
}

.nav-pills .nav-link.active:hover {
  color: #fff !important
}

.popover .RRT__panel,
.dropdown-menu .RRT__panel {
  margin: 0;
  padding: 0;
  position: relative
}

.popover .RRT__panel::after,
.popover .RRT__panel::before,
.dropdown-menu .RRT__panel::after,
.dropdown-menu .RRT__panel::before {
  width: 100%;
  bottom: auto;
  top: 0;
  left: 0;
  height: 20px;
  position: absolute;
  z-index: 10;
  content: '';
  background: linear-gradient(to bottom, #fff 20%, rgba(255, 255, 255, 0) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#00ffffff', GradientType=0)
}

.popover .RRT__panel::after,
.dropdown-menu .RRT__panel::after {
  bottom: 0;
  top: auto;
  background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, #fff 80%);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00ffffff', endColorstr='#ffffff', GradientType=0)
}

.tabs-lg-alternate.card-header {
  padding: 0;
  height: auto
}

.tabs-lg-alternate.card-header .widget-number {
  font-size: 2rem;
  font-weight: 300
}

.tabs-lg-alternate.card-header .tab-subheading {
  padding: 5px 0 0;
  opacity: .6;
  transition: all .2s
}

.tabs-lg-alternate.card-header>.nav {
  margin: 0
}

.tabs-lg-alternate.card-header>.nav .nav-link {
  padding: 1.5rem 0;
  border-right: #e9ecef solid 1px;
  background: #f8f9fa
}

.tabs-lg-alternate.card-header>.nav .nav-link:hover {
  background: #fff
}

.tabs-lg-alternate.card-header>.nav .nav-link:hover .tab-subheading {
  color: #000;
  opacity: .9
}

.tabs-lg-alternate.card-header>.nav .nav-link::before {
  background: #fff;
  border-radius: 0
}

.tabs-lg-alternate.card-header>.nav .nav-link.active {
  background: #fff
}

.tabs-lg-alternate.card-header>.nav .nav-link.active .tab-subheading {
  color: #000;
  opacity: .9
}

.tabs-lg-alternate.card-header>.nav .nav-item:last-child .nav-link {
  border-right: 0
}

.tabs-animated .nav-link {
  position: relative;
  padding: 1rem;
  margin: 0 .75rem 0 0;
  color: #495057
}

.tabs-animated .nav-link::before {
  transform: scale(0);
  opacity: 1;
  width: 100%;
  left: 0;
  bottom: -2px;
  content: "";
  position: absolute;
  display: block;
  border-radius: .25rem;
  background: #3f6ad8;
  transition: all .2s;
  height: 4px
}

.tabs-animated .nav-link.active,
.tabs-animated .nav-link:hover {
  color: #3f6ad8
}

.tabs-animated .nav-link.active::before,
.tabs-animated .nav-link:hover::before {
  transform: scale(1)
}

.tabs-animated-shadow .nav-link {
  padding: .5rem .75rem;
  margin-bottom: .75rem
}

.tabs-animated-shadow .nav-link span {
  position: relative;
  z-index: 5;
  display: inline-block;
  width: 100%
}

.tabs-animated-shadow .nav-link::before {
  height: 100%;
  top: 0;
  z-index: 4;
  bottom: auto;
  box-shadow: 0 16px 26px -10px rgba(63, 106, 216, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(63, 106, 216, 0.2);
  border-radius: 100%;
  opacity: .5
}

.tabs-animated-shadow .nav-link.active,
.tabs-animated-shadow .nav-link:hover {
  color: #fff
}

.tabs-animated-shadow .nav-link.active::before,
.tabs-animated-shadow .nav-link:hover::before {
  border-radius: .25rem;
  opacity: 1
}

.tabs-animated-shadow .nav-item:last-child .nav-link {
  margin-right: 0
}

.tabs-animated-shadow.tabs-shadow-bordered {
  border-bottom: rgba(26, 54, 126, 0.125) solid 1px
}

.tabs-animated-shadow.tabs-shadow-bordered .nav-link {
  margin-bottom: 0
}

.body-tabs-shadow .body-tabs-animated {
  padding: .75rem 0
}

.body-tabs-shadow .body-tabs-animated .nav-link span {
  position: relative;
  z-index: 5
}

.body-tabs-shadow .body-tabs-animated .nav-link::before {
  height: 70%;
  top: 15%;
  z-index: 4;
  bottom: auto;
  box-shadow: 0 16px 26px -10px rgba(63, 106, 216, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(63, 106, 216, 0.2);
  border-radius: 100%;
  opacity: .5
}

.body-tabs-shadow .body-tabs-animated .nav-link.active,
.body-tabs-shadow .body-tabs-animated .nav-link:hover {
  color: #fff
}

.body-tabs-shadow .body-tabs-animated .nav-link.active::before,
.body-tabs-shadow .body-tabs-animated .nav-link:hover::before {
  border-radius: .25rem;
  opacity: 1
}

.body-tabs-line .body-tabs-layout {
  margin: 0 -30px;
  padding: 0 30px;
  margin-bottom: 30px;
  border-bottom: #dee2e6 solid 1px
}

.tabs-rounded-lg {
  border-radius: 120px;
  background: #fff;
  padding: .75rem;
  margin-bottom: 1.5rem
}

.tabs-rounded-lg .nav-link {
  margin-bottom: 0;
  font-size: 1.1rem;
  padding: .75rem .5rem
}

.tabs-rounded-lg .nav-link::before {
  border-radius: 120px !important;
  box-shadow: 0 0 0 0 transparent
}

.accordion-wrapper {
  border-radius: .25rem;
  border: #e9ecef solid 1px
}

.accordion-wrapper>.card {
  box-shadow: 0 0 0 0 transparent
}

.accordion-wrapper>.card>.card-header {
  padding: 1rem;
  height: auto
}

.accordion-wrapper>.card>.card-header .btn:active,
.accordion-wrapper>.card>.card-header .btn:focus,
.accordion-wrapper>.card>.card-header .btn:hover {
  text-decoration: none
}

.accordion-wrapper>.card>.card-header .form-heading p {
  margin: 0
}

.accordion-wrapper>.card .collapse {
  border-bottom: transparent solid 1px
}

.accordion-wrapper>.card .collapse.show {
  border-bottom-color: #e9ecef
}

.modal-header,
.modal-footer {
  background: #f8f9fa
}

.modal-footer {
  border-bottom-right-radius: .25rem;
  border-bottom-left-radius: .25rem
}

.modal-dialog {
  box-shadow: 0 0.76875rem 2.4875rem rgba(52, 58, 64, 0.3), 0 1.3375rem 1.70625rem rgba(52, 58, 64, 0.3), 0 0.55rem 0.53125rem rgba(0, 0, 0, 0.05), 0 0.225rem 0.4375rem rgba(52, 58, 64, 0.3);
  border-radius: .25rem
}

@keyframes scale {
  0% {
    transform: scale(1);
    opacity: 1
  }

  45% {
    transform: scale(0.1);
    opacity: 0.7
  }

  80% {
    transform: scale(1);
    opacity: 1
  }
}

.ball-pulse>div:nth-child(0) {
  animation: scale 0.75s -.36s infinite cubic-bezier(0.2, 0.68, 0.18, 1.08)
}

.ball-pulse>div:nth-child(1) {
  animation: scale 0.75s -.24s infinite cubic-bezier(0.2, 0.68, 0.18, 1.08)
}

.ball-pulse>div:nth-child(2) {
  animation: scale 0.75s -.12s infinite cubic-bezier(0.2, 0.68, 0.18, 1.08)
}

.ball-pulse>div:nth-child(3) {
  animation: scale 0.75s 0s infinite cubic-bezier(0.2, 0.68, 0.18, 1.08)
}

.ball-pulse>div {
  background-color: #3f6ad8;
  width: 15px;
  height: 15px;
  border-radius: 100%;
  margin: 2px;
  animation-fill-mode: both;
  display: inline-block
}

@keyframes ball-pulse-sync {
  33% {
    transform: translateY(10px)
  }

  66% {
    transform: translateY(-10px)
  }

  100% {
    transform: translateY(0)
  }
}

.ball-pulse-sync>div:nth-child(0) {
  animation: ball-pulse-sync 0.6s -.21s infinite ease-in-out
}

.ball-pulse-sync>div:nth-child(1) {
  animation: ball-pulse-sync 0.6s -.14s infinite ease-in-out
}

.ball-pulse-sync>div:nth-child(2) {
  animation: ball-pulse-sync 0.6s -.07s infinite ease-in-out
}

.ball-pulse-sync>div:nth-child(3) {
  animation: ball-pulse-sync 0.6s 0s infinite ease-in-out
}

.ball-pulse-sync>div {
  background-color: #3f6ad8;
  width: 15px;
  height: 15px;
  border-radius: 100%;
  margin: 2px;
  animation-fill-mode: both;
  display: inline-block
}

@keyframes ball-scale {
  0% {
    transform: scale(0)
  }

  100% {
    transform: scale(1);
    opacity: 0
  }
}

.ball-scale>div {
  background-color: #3f6ad8;
  width: 15px;
  height: 15px;
  border-radius: 100%;
  margin: 2px;
  animation-fill-mode: both;
  display: inline-block;
  height: 60px;
  width: 60px;
  animation: ball-scale 1s 0s ease-in-out infinite
}

@keyframes rotate {
  0% {
    transform: rotate(0deg)
  }

  50% {
    transform: rotate(180deg)
  }

  100% {
    transform: rotate(360deg)
  }
}

.ball-rotate {
  position: relative
}

.ball-rotate>div {
  background-color: #3f6ad8;
  width: 15px;
  height: 15px;
  border-radius: 100%;
  margin: 2px;
  animation-fill-mode: both;
  position: relative
}

.ball-rotate>div:first-child {
  animation: rotate 1s 0s cubic-bezier(0.7, -0.13, 0.22, 0.86) infinite
}

.ball-rotate>div:before,
.ball-rotate>div:after {
  background-color: #3f6ad8;
  width: 15px;
  height: 15px;
  border-radius: 100%;
  margin: 2px;
  content: "";
  position: absolute;
  opacity: 0.8
}

.ball-rotate>div:before {
  top: 0px;
  left: -28px
}

.ball-rotate>div:after {
  top: 0px;
  left: 25px
}

@keyframes rotate {
  0% {
    transform: rotate(0deg) scale(1)
  }

  50% {
    transform: rotate(180deg) scale(0.6)
  }

  100% {
    transform: rotate(360deg) scale(1)
  }
}

.ball-clip-rotate>div {
  background-color: #3f6ad8;
  width: 15px;
  height: 15px;
  border-radius: 100%;
  margin: 2px;
  animation-fill-mode: both;
  border: 2px solid #3f6ad8;
  border-bottom-color: transparent;
  height: 25px;
  width: 25px;
  background: transparent !important;
  display: inline-block;
  animation: rotate 0.75s 0s linear infinite
}

@keyframes rotate {
  0% {
    transform: rotate(0deg) scale(1)
  }

  50% {
    transform: rotate(180deg) scale(0.6)
  }

  100% {
    transform: rotate(360deg) scale(1)
  }
}

@keyframes scale {
  30% {
    transform: scale(0.3)
  }

  100% {
    transform: scale(1)
  }
}

.ball-clip-rotate-pulse {
  position: relative;
  transform: translateY(-15px)
}

.ball-clip-rotate-pulse>div {
  animation-fill-mode: both;
  position: absolute;
  top: 0px;
  left: 0px;
  border-radius: 100%
}

.ball-clip-rotate-pulse>div:first-child {
  background: #3f6ad8;
  height: 16px;
  width: 16px;
  top: 7px;
  left: -7px;
  animation: scale 1s 0s cubic-bezier(0.09, 0.57, 0.49, 0.9) infinite
}

.ball-clip-rotate-pulse>div:last-child {
  position: absolute;
  border: 2px solid #3f6ad8;
  width: 30px;
  height: 30px;
  left: -16px;
  top: -2px;
  background: transparent;
  border: 2px solid;
  border-color: #3f6ad8 transparent #3f6ad8 transparent;
  animation: rotate 1s 0s cubic-bezier(0.09, 0.57, 0.49, 0.9) infinite;
  animation-duration: 1s
}

@keyframes rotate {
  0% {
    transform: rotate(0deg) scale(1)
  }

  50% {
    transform: rotate(180deg) scale(0.6)
  }

  100% {
    transform: rotate(360deg) scale(1)
  }
}

.ball-clip-rotate-multiple {
  position: relative
}

.ball-clip-rotate-multiple>div {
  animation-fill-mode: both;
  position: absolute;
  left: -20px;
  top: -20px;
  border: 2px solid #3f6ad8;
  border-bottom-color: transparent;
  border-top-color: transparent;
  border-radius: 100%;
  height: 35px;
  width: 35px;
  animation: rotate 1s 0s ease-in-out infinite
}

.ball-clip-rotate-multiple>div:last-child {
  display: inline-block;
  top: -10px;
  left: -10px;
  width: 15px;
  height: 15px;
  animation-duration: 0.5s;
  border-color: #3f6ad8 transparent #3f6ad8 transparent;
  animation-direction: reverse
}

@keyframes ball-scale-ripple {
  0% {
    transform: scale(0.1);
    opacity: 1
  }

  70% {
    transform: scale(1);
    opacity: 0.7
  }

  100% {
    opacity: 0.0
  }
}

.ball-scale-ripple>div {
  animation-fill-mode: both;
  height: 50px;
  width: 50px;
  border-radius: 100%;
  border: 2px solid #3f6ad8;
  animation: ball-scale-ripple 1s 0s infinite cubic-bezier(0.21, 0.53, 0.56, 0.8)
}

@keyframes ball-scale-ripple-multiple {
  0% {
    transform: scale(0.1);
    opacity: 1
  }

  70% {
    transform: scale(1);
    opacity: 0.7
  }

  100% {
    opacity: 0.0
  }
}

.ball-scale-ripple-multiple {
  position: relative;
  transform: translateY(-25px)
}

.ball-scale-ripple-multiple>div:nth-child(0) {
  animation-delay: -.8s
}

.ball-scale-ripple-multiple>div:nth-child(1) {
  animation-delay: -.6s
}

.ball-scale-ripple-multiple>div:nth-child(2) {
  animation-delay: -.4s
}

.ball-scale-ripple-multiple>div:nth-child(3) {
  animation-delay: -.2s
}

.ball-scale-ripple-multiple>div {
  animation-fill-mode: both;
  position: absolute;
  top: -2px;
  left: -26px;
  width: 50px;
  height: 50px;
  border-radius: 100%;
  border: 2px solid #3f6ad8;
  animation: ball-scale-ripple-multiple 1.25s 0s infinite cubic-bezier(0.21, 0.53, 0.56, 0.8)
}

@keyframes ball-beat {
  50% {
    opacity: 0.2;
    transform: scale(0.75)
  }

  100% {
    opacity: 1;
    transform: scale(1)
  }
}

.ball-beat>div {
  background-color: #3f6ad8;
  width: 15px;
  height: 15px;
  border-radius: 100%;
  margin: 2px;
  animation-fill-mode: both;
  display: inline-block;
  animation: ball-beat 0.7s 0s infinite linear
}

.ball-beat>div:nth-child(2n-1) {
  animation-delay: -0.35s !important
}

@keyframes ball-scale-multiple {
  0% {
    transform: scale(0);
    opacity: 0
  }

  5% {
    opacity: 1
  }

  100% {
    transform: scale(1);
    opacity: 0
  }
}

.ball-scale-multiple {
  position: relative;
  transform: translateY(-30px)
}

.ball-scale-multiple>div:nth-child(2) {
  animation-delay: -.4s
}

.ball-scale-multiple>div:nth-child(3) {
  animation-delay: -.2s
}

.ball-scale-multiple>div {
  background-color: #3f6ad8;
  width: 15px;
  height: 15px;
  border-radius: 100%;
  margin: 2px;
  animation-fill-mode: both;
  position: absolute;
  left: -30px;
  top: 0px;
  opacity: 0;
  margin: 0;
  width: 60px;
  height: 60px;
  animation: ball-scale-multiple 1s 0s linear infinite
}

@keyframes ball-triangle-path-1 {
  33% {
    transform: translate(25px, -50px)
  }

  66% {
    transform: translate(50px, 0px)
  }

  100% {
    transform: translate(0px, 0px)
  }
}

@keyframes ball-triangle-path-2 {
  33% {
    transform: translate(25px, 50px)
  }

  66% {
    transform: translate(-25px, 50px)
  }

  100% {
    transform: translate(0px, 0px)
  }
}

@keyframes ball-triangle-path-3 {
  33% {
    transform: translate(-50px, 0px)
  }

  66% {
    transform: translate(-25px, -50px)
  }

  100% {
    transform: translate(0px, 0px)
  }
}

.ball-triangle-path {
  position: relative;
  transform: translate(-29.994px, -37.50938px)
}

.ball-triangle-path>div:nth-child(1) {
  animation-name: ball-triangle-path-1;
  animation-delay: 0;
  animation-duration: 2s;
  animation-timing-function: ease-in-out;
  animation-iteration-count: infinite
}

.ball-triangle-path>div:nth-child(2) {
  animation-name: ball-triangle-path-2;
  animation-delay: 0;
  animation-duration: 2s;
  animation-timing-function: ease-in-out;
  animation-iteration-count: infinite
}

.ball-triangle-path>div:nth-child(3) {
  animation-name: ball-triangle-path-3;
  animation-delay: 0;
  animation-duration: 2s;
  animation-timing-function: ease-in-out;
  animation-iteration-count: infinite
}

.ball-triangle-path>div {
  animation-fill-mode: both;
  position: absolute;
  width: 10px;
  height: 10px;
  border-radius: 100%;
  border: 1px solid #3f6ad8
}

.ball-triangle-path>div:nth-of-type(1) {
  top: 50px
}

.ball-triangle-path>div:nth-of-type(2) {
  left: 25px
}

.ball-triangle-path>div:nth-of-type(3) {
  top: 50px;
  left: 50px
}

@keyframes ball-pulse-rise-even {
  0% {
    transform: scale(1.1)
  }

  25% {
    transform: translateY(-30px)
  }

  50% {
    transform: scale(0.4)
  }

  75% {
    transform: translateY(30px)
  }

  100% {
    transform: translateY(0);
    transform: scale(1)
  }
}

@keyframes ball-pulse-rise-odd {
  0% {
    transform: scale(0.4)
  }

  25% {
    transform: translateY(30px)
  }

  50% {
    transform: scale(1.1)
  }

  75% {
    transform: translateY(-30px)
  }

  100% {
    transform: translateY(0);
    transform: scale(0.75)
  }
}

.ball-pulse-rise>div {
  background-color: #3f6ad8;
  width: 15px;
  height: 15px;
  border-radius: 100%;
  margin: 2px;
  animation-fill-mode: both;
  display: inline-block;
  animation-duration: 1s;
  animation-timing-function: cubic-bezier(0.15, 0.46, 0.9, 0.6);
  animation-iteration-count: infinite;
  animation-delay: 0
}

.ball-pulse-rise>div:nth-child(2n) {
  animation-name: ball-pulse-rise-even
}

.ball-pulse-rise>div:nth-child(2n-1) {
  animation-name: ball-pulse-rise-odd
}

@keyframes ball-grid-beat {
  50% {
    opacity: 0.7
  }

  100% {
    opacity: 1
  }
}

.ball-grid-beat {
  width: 57px
}

.ball-grid-beat>div:nth-child(1) {
  animation-delay: .36s;
  animation-duration: 1.46s
}

.ball-grid-beat>div:nth-child(2) {
  animation-delay: .72s;
  animation-duration: 1.18s
}

.ball-grid-beat>div:nth-child(3) {
  animation-delay: .79s;
  animation-duration: 1.44s
}

.ball-grid-beat>div:nth-child(4) {
  animation-delay: .48s;
  animation-duration: .78s
}

.ball-grid-beat>div:nth-child(5) {
  animation-delay: .56s;
  animation-duration: 1.26s
}

.ball-grid-beat>div:nth-child(6) {
  animation-delay: .26s;
  animation-duration: .95s
}

.ball-grid-beat>div:nth-child(7) {
  animation-delay: -.16s;
  animation-duration: 1.28s
}

.ball-grid-beat>div:nth-child(8) {
  animation-delay: -.13s;
  animation-duration: .96s
}

.ball-grid-beat>div:nth-child(9) {
  animation-delay: .46s;
  animation-duration: 1.34s
}

.ball-grid-beat>div {
  background-color: #3f6ad8;
  width: 15px;
  height: 15px;
  border-radius: 100%;
  margin: 2px;
  animation-fill-mode: both;
  display: inline-block;
  float: left;
  animation-name: ball-grid-beat;
  animation-iteration-count: infinite;
  animation-delay: 0
}

@keyframes ball-grid-pulse {
  0% {
    transform: scale(1)
  }

  50% {
    transform: scale(0.5);
    opacity: 0.7
  }

  100% {
    transform: scale(1);
    opacity: 1
  }
}

.ball-grid-pulse {
  width: 57px
}

.ball-grid-pulse>div:nth-child(1) {
  animation-delay: -.07s;
  animation-duration: .94s
}

.ball-grid-pulse>div:nth-child(2) {
  animation-delay: .09s;
  animation-duration: 1s
}

.ball-grid-pulse>div:nth-child(3) {
  animation-delay: .05s;
  animation-duration: .64s
}

.ball-grid-pulse>div:nth-child(4) {
  animation-delay: -.02s;
  animation-duration: 1.6s
}

.ball-grid-pulse>div:nth-child(5) {
  animation-delay: -.06s;
  animation-duration: 1.54s
}

.ball-grid-pulse>div:nth-child(6) {
  animation-delay: -.05s;
  animation-duration: .68s
}

.ball-grid-pulse>div:nth-child(7) {
  animation-delay: .69s;
  animation-duration: .78s
}

.ball-grid-pulse>div:nth-child(8) {
  animation-delay: .17s;
  animation-duration: 1.25s
}

.ball-grid-pulse>div:nth-child(9) {
  animation-delay: .52s;
  animation-duration: 1.37s
}

.ball-grid-pulse>div {
  background-color: #3f6ad8;
  width: 15px;
  height: 15px;
  border-radius: 100%;
  margin: 2px;
  animation-fill-mode: both;
  display: inline-block;
  float: left;
  animation-name: ball-grid-pulse;
  animation-iteration-count: infinite;
  animation-delay: 0
}

@keyframes ball-spin-fade-loader {
  50% {
    opacity: 0.3;
    transform: scale(0.4)
  }

  100% {
    opacity: 1;
    transform: scale(1)
  }
}

.ball-spin-fade-loader {
  position: relative;
  top: -10px;
  left: -10px
}

.ball-spin-fade-loader>div:nth-child(1) {
  top: 25px;
  left: 0;
  animation: ball-spin-fade-loader 1s -.96s infinite linear
}

.ball-spin-fade-loader>div:nth-child(2) {
  top: 17.04545px;
  left: 17.04545px;
  animation: ball-spin-fade-loader 1s -.84s infinite linear
}

.ball-spin-fade-loader>div:nth-child(3) {
  top: 0;
  left: 25px;
  animation: ball-spin-fade-loader 1s -.72s infinite linear
}

.ball-spin-fade-loader>div:nth-child(4) {
  top: -17.04545px;
  left: 17.04545px;
  animation: ball-spin-fade-loader 1s -.6s infinite linear
}

.ball-spin-fade-loader>div:nth-child(5) {
  top: -25px;
  left: 0;
  animation: ball-spin-fade-loader 1s -.48s infinite linear
}

.ball-spin-fade-loader>div:nth-child(6) {
  top: -17.04545px;
  left: -17.04545px;
  animation: ball-spin-fade-loader 1s -.36s infinite linear
}

.ball-spin-fade-loader>div:nth-child(7) {
  top: 0;
  left: -25px;
  animation: ball-spin-fade-loader 1s -.24s infinite linear
}

.ball-spin-fade-loader>div:nth-child(8) {
  top: 17.04545px;
  left: -17.04545px;
  animation: ball-spin-fade-loader 1s -.12s infinite linear
}

.ball-spin-fade-loader>div {
  background-color: #3f6ad8;
  width: 15px;
  height: 15px;
  border-radius: 100%;
  margin: 2px;
  animation-fill-mode: both;
  position: absolute
}

@keyframes ball-spin-loader {
  75% {
    opacity: 0.2
  }

  100% {
    opacity: 1
  }
}

.ball-spin-loader {
  position: relative
}

.ball-spin-loader>span:nth-child(1) {
  top: 45px;
  left: 0;
  animation: ball-spin-loader 2s .9s infinite linear
}

.ball-spin-loader>span:nth-child(2) {
  top: 30.68182px;
  left: 30.68182px;
  animation: ball-spin-loader 2s 1.8s infinite linear
}

.ball-spin-loader>span:nth-child(3) {
  top: 0;
  left: 45px;
  animation: ball-spin-loader 2s 2.7s infinite linear
}

.ball-spin-loader>span:nth-child(4) {
  top: -30.68182px;
  left: 30.68182px;
  animation: ball-spin-loader 2s 3.6s infinite linear
}

.ball-spin-loader>span:nth-child(5) {
  top: -45px;
  left: 0;
  animation: ball-spin-loader 2s 4.5s infinite linear
}

.ball-spin-loader>span:nth-child(6) {
  top: -30.68182px;
  left: -30.68182px;
  animation: ball-spin-loader 2s 5.4s infinite linear
}

.ball-spin-loader>span:nth-child(7) {
  top: 0;
  left: -45px;
  animation: ball-spin-loader 2s 6.3s infinite linear
}

.ball-spin-loader>span:nth-child(8) {
  top: 30.68182px;
  left: -30.68182px;
  animation: ball-spin-loader 2s 7.2s infinite linear
}

.ball-spin-loader>div {
  animation-fill-mode: both;
  position: absolute;
  width: 15px;
  height: 15px;
  border-radius: 100%;
  background: green
}

@keyframes ball-zig {
  33% {
    transform: translate(-15px, -30px)
  }

  66% {
    transform: translate(15px, -30px)
  }

  100% {
    transform: translate(0, 0)
  }
}

@keyframes ball-zag {
  33% {
    transform: translate(15px, 30px)
  }

  66% {
    transform: translate(-15px, 30px)
  }

  100% {
    transform: translate(0, 0)
  }
}

.ball-zig-zag {
  position: relative;
  transform: translate(-15px, -15px)
}

.ball-zig-zag>div {
  background-color: #3f6ad8;
  width: 15px;
  height: 15px;
  border-radius: 100%;
  margin: 2px;
  animation-fill-mode: both;
  position: absolute;
  margin-left: 15px;
  top: 4px;
  left: -7px
}

.ball-zig-zag>div:first-child {
  animation: ball-zig 0.7s 0s infinite linear
}

.ball-zig-zag>div:last-child {
  animation: ball-zag 0.7s 0s infinite linear
}

@keyframes ball-zig-deflect {
  17% {
    transform: translate(-15px, -30px)
  }

  34% {
    transform: translate(15px, -30px)
  }

  50% {
    transform: translate(0, 0)
  }

  67% {
    transform: translate(15px, -30px)
  }

  84% {
    transform: translate(-15px, -30px)
  }

  100% {
    transform: translate(0, 0)
  }
}

@keyframes ball-zag-deflect {
  17% {
    transform: translate(15px, 30px)
  }

  34% {
    transform: translate(-15px, 30px)
  }

  50% {
    transform: translate(0, 0)
  }

  67% {
    transform: translate(-15px, 30px)
  }

  84% {
    transform: translate(15px, 30px)
  }

  100% {
    transform: translate(0, 0)
  }
}

.ball-zig-zag-deflect {
  position: relative;
  transform: translate(-15px, -15px)
}

.ball-zig-zag-deflect>div {
  background-color: #3f6ad8;
  width: 15px;
  height: 15px;
  border-radius: 100%;
  margin: 2px;
  animation-fill-mode: both;
  position: absolute;
  margin-left: 15px;
  top: 4px;
  left: -7px
}

.ball-zig-zag-deflect>div:first-child {
  animation: ball-zig-deflect 1.5s 0s infinite linear
}

.ball-zig-zag-deflect>div:last-child {
  animation: ball-zag-deflect 1.5s 0s infinite linear
}

@keyframes line-scale {
  0% {
    transform: scaley(1)
  }

  50% {
    transform: scaley(0.4)
  }

  100% {
    transform: scaley(1)
  }
}

.line-scale>div:nth-child(1) {
  animation: line-scale 1s -.4s infinite cubic-bezier(0.2, 0.68, 0.18, 1.08)
}

.line-scale>div:nth-child(2) {
  animation: line-scale 1s -.3s infinite cubic-bezier(0.2, 0.68, 0.18, 1.08)
}

.line-scale>div:nth-child(3) {
  animation: line-scale 1s -.2s infinite cubic-bezier(0.2, 0.68, 0.18, 1.08)
}

.line-scale>div:nth-child(4) {
  animation: line-scale 1s -.1s infinite cubic-bezier(0.2, 0.68, 0.18, 1.08)
}

.line-scale>div:nth-child(5) {
  animation: line-scale 1s 0s infinite cubic-bezier(0.2, 0.68, 0.18, 1.08)
}

.line-scale>div {
  background-color: #3f6ad8;
  width: 4px;
  height: 35px;
  border-radius: 2px;
  margin: 2px;
  animation-fill-mode: both;
  display: inline-block
}

@keyframes line-scale-party {
  0% {
    transform: scale(1)
  }

  50% {
    transform: scale(.5)
  }

  100% {
    transform: scale(1)
  }
}

.line-scale-party>div:nth-child(1) {
  animation-delay: .37s;
  animation-duration: .96s
}

.line-scale-party>div:nth-child(2) {
  animation-delay: .78s;
  animation-duration: .42s
}

.line-scale-party>div:nth-child(3) {
  animation-delay: .78s;
  animation-duration: .72s
}

.line-scale-party>div:nth-child(4) {
  animation-delay: .14s;
  animation-duration: .71s
}

.line-scale-party>div {
  background-color: #3f6ad8;
  width: 4px;
  height: 35px;
  border-radius: 2px;
  margin: 2px;
  animation-fill-mode: both;
  display: inline-block;
  animation-name: line-scale-party;
  animation-iteration-count: infinite;
  animation-delay: 0
}

@keyframes line-scale-pulse-out {
  0% {
    transform: scaley(1)
  }

  50% {
    transform: scaley(0.4)
  }

  100% {
    transform: scaley(1)
  }
}

.line-scale-pulse-out>div {
  background-color: #3f6ad8;
  width: 4px;
  height: 35px;
  border-radius: 2px;
  margin: 2px;
  animation-fill-mode: both;
  display: inline-block;
  animation: line-scale-pulse-out 0.9s -.6s infinite cubic-bezier(0.85, 0.25, 0.37, 0.85)
}

.line-scale-pulse-out>div:nth-child(2),
.line-scale-pulse-out>div:nth-child(4) {
  animation-delay: -.4s !important
}

.line-scale-pulse-out>div:nth-child(1),
.line-scale-pulse-out>div:nth-child(5) {
  animation-delay: -.2s !important
}

@keyframes line-scale-pulse-out-rapid {
  0% {
    transform: scaley(1)
  }

  80% {
    transform: scaley(0.3)
  }

  90% {
    transform: scaley(1)
  }
}

.line-scale-pulse-out-rapid>div {
  background-color: #3f6ad8;
  width: 4px;
  height: 35px;
  border-radius: 2px;
  margin: 2px;
  animation-fill-mode: both;
  display: inline-block;
  vertical-align: middle;
  animation: line-scale-pulse-out-rapid 0.9s -0.5s infinite cubic-bezier(0.11, 0.49, 0.38, 0.78)
}

.line-scale-pulse-out-rapid>div:nth-child(2),
.line-scale-pulse-out-rapid>div:nth-child(4) {
  animation-delay: -0.25s !important
}

.line-scale-pulse-out-rapid>div:nth-child(1),
.line-scale-pulse-out-rapid>div:nth-child(5) {
  animation-delay: 0s !important
}

@keyframes line-spin-fade-loader {
  50% {
    opacity: 0.3
  }

  100% {
    opacity: 1
  }
}

.line-spin-fade-loader {
  position: relative;
  top: -10px;
  left: -4px
}

.line-spin-fade-loader>div:nth-child(1) {
  top: 20px;
  left: 0;
  animation: line-spin-fade-loader 1.2s -.84s infinite ease-in-out
}

.line-spin-fade-loader>div:nth-child(2) {
  top: 13.63636px;
  left: 13.63636px;
  transform: rotate(-45deg);
  animation: line-spin-fade-loader 1.2s -.72s infinite ease-in-out
}

.line-spin-fade-loader>div:nth-child(3) {
  top: 0;
  left: 20px;
  transform: rotate(90deg);
  animation: line-spin-fade-loader 1.2s -.6s infinite ease-in-out
}

.line-spin-fade-loader>div:nth-child(4) {
  top: -13.63636px;
  left: 13.63636px;
  transform: rotate(45deg);
  animation: line-spin-fade-loader 1.2s -.48s infinite ease-in-out
}

.line-spin-fade-loader>div:nth-child(5) {
  top: -20px;
  left: 0;
  animation: line-spin-fade-loader 1.2s -.36s infinite ease-in-out
}

.line-spin-fade-loader>div:nth-child(6) {
  top: -13.63636px;
  left: -13.63636px;
  transform: rotate(-45deg);
  animation: line-spin-fade-loader 1.2s -.24s infinite ease-in-out
}

.line-spin-fade-loader>div:nth-child(7) {
  top: 0;
  left: -20px;
  transform: rotate(90deg);
  animation: line-spin-fade-loader 1.2s -.12s infinite ease-in-out
}

.line-spin-fade-loader>div:nth-child(8) {
  top: 13.63636px;
  left: -13.63636px;
  transform: rotate(45deg);
  animation: line-spin-fade-loader 1.2s 0s infinite ease-in-out
}

.line-spin-fade-loader>div {
  background-color: #3f6ad8;
  width: 4px;
  height: 35px;
  border-radius: 2px;
  margin: 2px;
  animation-fill-mode: both;
  position: absolute;
  width: 5px;
  height: 15px
}

@keyframes triangle-skew-spin {
  25% {
    transform: perspective(100px) rotateX(180deg) rotateY(0)
  }

  50% {
    transform: perspective(100px) rotateX(180deg) rotateY(180deg)
  }

  75% {
    transform: perspective(100px) rotateX(0) rotateY(180deg)
  }

  100% {
    transform: perspective(100px) rotateX(0) rotateY(0)
  }
}

.triangle-skew-spin>div {
  animation-fill-mode: both;
  width: 0;
  height: 0;
  border-left: 20px solid transparent;
  border-right: 20px solid transparent;
  border-bottom: 20px solid #3f6ad8;
  animation: triangle-skew-spin 3s 0s cubic-bezier(0.09, 0.57, 0.49, 0.9) infinite
}

@keyframes square-spin {
  25% {
    transform: perspective(100px) rotateX(180deg) rotateY(0)
  }

  50% {
    transform: perspective(100px) rotateX(180deg) rotateY(180deg)
  }

  75% {
    transform: perspective(100px) rotateX(0) rotateY(180deg)
  }

  100% {
    transform: perspective(100px) rotateX(0) rotateY(0)
  }
}

.square-spin>div {
  animation-fill-mode: both;
  width: 50px;
  height: 50px;
  background: #3f6ad8;
  animation: square-spin 3s 0s cubic-bezier(0.09, 0.57, 0.49, 0.9) infinite
}

@keyframes rotate_pacman_half_up {
  0% {
    transform: rotate(270deg)
  }

  50% {
    transform: rotate(360deg)
  }

  100% {
    transform: rotate(270deg)
  }
}

@keyframes rotate_pacman_half_down {
  0% {
    transform: rotate(90deg)
  }

  50% {
    transform: rotate(0deg)
  }

  100% {
    transform: rotate(90deg)
  }
}

@keyframes pacman-balls {
  75% {
    opacity: 0.7
  }

  100% {
    transform: translate(-100px, -6.25px)
  }
}

.pacman {
  position: relative
}

.pacman>div:nth-child(2) {
  animation: pacman-balls 1s -.99s infinite linear
}

.pacman>div:nth-child(3) {
  animation: pacman-balls 1s -.66s infinite linear
}

.pacman>div:nth-child(4) {
  animation: pacman-balls 1s -.33s infinite linear
}

.pacman>div:nth-child(5) {
  animation: pacman-balls 1s 0s infinite linear
}

.pacman>div:first-of-type {
  width: 0px;
  height: 0px;
  border-right: 25px solid transparent;
  border-top: 25px solid #3f6ad8;
  border-left: 25px solid #3f6ad8;
  border-bottom: 25px solid #3f6ad8;
  border-radius: 25px;
  animation: rotate_pacman_half_up 0.5s 0s infinite;
  position: relative;
  left: -30px
}

.pacman>div:nth-child(2) {
  width: 0px;
  height: 0px;
  border-right: 25px solid transparent;
  border-top: 25px solid #3f6ad8;
  border-left: 25px solid #3f6ad8;
  border-bottom: 25px solid #3f6ad8;
  border-radius: 25px;
  animation: rotate_pacman_half_down 0.5s 0s infinite;
  margin-top: -50px;
  position: relative;
  left: -30px
}

.pacman>div:nth-child(3),
.pacman>div:nth-child(4),
.pacman>div:nth-child(5),
.pacman>div:nth-child(6) {
  background-color: #3f6ad8;
  width: 15px;
  height: 15px;
  border-radius: 100%;
  margin: 2px;
  width: 10px;
  height: 10px;
  position: absolute;
  transform: translate(0, -6.25px);
  top: 25px;
  left: 70px
}

@keyframes cube-transition {
  25% {
    transform: translateX(50px) scale(0.5) rotate(-90deg)
  }

  50% {
    transform: translate(50px, 50px) rotate(-180deg)
  }

  75% {
    transform: translateY(50px) scale(0.5) rotate(-270deg)
  }

  100% {
    transform: rotate(-360deg)
  }
}

.cube-transition {
  position: relative;
  transform: translate(-25px, -25px)
}

.cube-transition>div {
  animation-fill-mode: both;
  width: 10px;
  height: 10px;
  position: absolute;
  top: -5px;
  left: -5px;
  background-color: #3f6ad8;
  animation: cube-transition 1.6s 0s infinite ease-in-out
}

.cube-transition>div:last-child {
  animation-delay: -0.8s
}

@keyframes spin-rotate {
  0% {
    transform: rotate(0deg)
  }

  50% {
    transform: rotate(180deg)
  }

  100% {
    transform: rotate(360deg)
  }
}

.semi-circle-spin {
  position: relative;
  width: 35px;
  height: 35px;
  overflow: hidden
}

.semi-circle-spin>div {
  position: absolute;
  border-width: 0px;
  border-radius: 100%;
  animation: spin-rotate 0.6s 0s infinite linear;
  background-image: linear-gradient(transparent 0%, transparent 70%, #3f6ad8 30%, #3f6ad8 100%);
  width: 100%;
  height: 100%
}

.blockOverlay {
  display: block !important;
  opacity: .6;
  z-index: 55
}

.blockElement {
  display: flex;
  align-content: center;
  align-items: center;
  z-index: 66;
  height: 100%;
  width: 100%
}

.blockPage {
  left: 50%;
  top: 50%;
  z-index: 66
}

.blockPage .d-none {
  display: block !important
}

.blockPage .loader {
  background: #fff;
  border-radius: .25rem;
  box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03);
  padding: 1.5rem
}

.blockPage .ball-grid-pulse {
  min-height: 57px
}

.progress .progress-bar:last-child {
  border-top-right-radius: .25rem;
  border-bottom-right-radius: .25rem
}

.progress.progress-bar-sm {
  height: .5rem
}

.progress.progress-bar-xs {
  height: .3rem
}

.progress.progress-bar-rounded {
  border-radius: 30px
}

.progress-bar-animated-alt.progress-bar,
.progress-bar-animated-alt .progress-bar {
  position: relative
}

.progress-bar-animated-alt.progress-bar::after,
.progress-bar-animated-alt .progress-bar::after {
  content: '';
  opacity: 0;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: #fff;
  animation: progress-active 2s ease infinite
}

@keyframes progress-active {
  0% {
    opacity: .4;
    width: 0
  }

  100% {
    opacity: 0;
    width: 100%
  }
}

.vertical-timeline {
  width: 100%;
  position: relative;
  padding: 1.5rem 0 1rem
}

.vertical-timeline::after {
  content: '';
  display: table;
  clear: both
}

.vertical-timeline::before {
  content: '';
  position: absolute;
  top: 0;
  left: 25px;
  height: 100%;
  width: 4px;
  background: #e9ecef;
  border-radius: .25rem
}

.vertical-timeline-element {
  position: relative;
  margin: 0 0 1rem
}

.vertical-timeline-element:after {
  content: "";
  display: table;
  clear: both
}

.vertical-timeline-element:last-child {
  margin-bottom: 0
}

.vertical-timeline-element-content {
  position: relative;
  margin-left: 55px;
  font-size: 12px
}

.vertical-timeline-element-content:after {
  content: "";
  display: table;
  clear: both
}

.vertical-timeline-element-content .timeline-title {
  font-size: .8rem;
  text-transform: uppercase;
  margin: 0 0 .5rem;
  padding: 2px 0 0;
  font-weight: bold
}

.vertical-timeline-element-content p {
  color: #6c757d;
  margin: 0 0 .5rem
}

.vertical-timeline-element-content .vertical-timeline-element-date {
  display: block;
  position: absolute;
  left: -66px;
  top: 0;
  padding-right: 10px;
  text-align: right;
  color: #adb5bd;
  font-size: .7619rem;
  white-space: nowrap
}

.vertical-timeline-element-icon {
  position: absolute;
  top: 0;
  left: 18px
}

.vertical-timeline-element-icon .badge-dot-xl {
  box-shadow: 0 0 0 5px #fff
}

.vertical-timeline-element--no-children .vertical-timeline-element-content {
  background: 0 0;
  box-shadow: none
}

.vertical-timeline-element--no-children .vertical-timeline-element-content::before {
  display: none
}

.vertical-without-time::before {
  left: 11px
}

.vertical-without-time .vertical-timeline-element-content {
  margin-left: 36px
}

.vertical-without-time .vertical-timeline-element-icon {
  left: 4px
}

.vertical-time-icons {
  padding: 2rem 0 0
}

.vertical-time-icons::before {
  content: '';
  position: absolute;
  top: 0;
  left: 14px;
  height: 100%;
  width: 6px;
  background: #e9ecef;
  border-radius: .25rem
}

.vertical-time-icons .vertical-timeline-element {
  margin-bottom: 1rem
}

.vertical-time-icons .vertical-timeline-element-content {
  margin-left: 50px
}

.vertical-time-icons .vertical-timeline-element-icon {
  width: 34px;
  height: 34px;
  left: 0;
  top: -7px
}

.vertical-time-icons .vertical-timeline-element-icon .timeline-icon {
  width: 34px;
  height: 34px;
  background: #fff;
  border-radius: 50px;
  border-width: 2px;
  border-style: solid;
  box-shadow: 0 0 0 5px #fff;
  text-align: center;
  display: flex;
  align-items: center;
  align-content: center
}

.vertical-time-icons .vertical-timeline-element-icon .timeline-icon i {
  display: block;
  font-size: 1.1rem;
  margin: 0 auto
}

.vertical-time-icons .vertical-timeline-element-icon .timeline-icon svg {
  margin: 0 auto
}

.vertical-time-simple {
  padding: .5rem 0
}

.vertical-time-simple .vertical-timeline-element {
  margin: 0 0 .5rem
}

.vertical-time-simple .timeline-title {
  font-weight: normal;
  font-size: .91667rem;
  padding: 0
}

.vertical-time-simple .vertical-timeline-element-icon {
  height: 14px;
  width: 14px;
  background: #e9ecef;
  position: absolute;
  left: 6px;
  top: 2px;
  display: block;
  border-radius: 20px
}

.vertical-time-simple .vertical-timeline-element-icon::after {
  content: '';
  position: absolute;
  background: #fff;
  left: 50%;
  top: 50%;
  margin: -4px 0 0 -4px;
  display: block;
  width: 8px;
  height: 8px;
  border-radius: 20px
}

.vertical-time-simple .timeline-title {
  text-transform: none
}

.dot-primary .vertical-timeline-element-icon {
  background: #3f6ad8
}

.dot-secondary .vertical-timeline-element-icon {
  background: #6c757d
}

.dot-success .vertical-timeline-element-icon {
  background: #3ac47d
}

.dot-info .vertical-timeline-element-icon {
  background: #16aaff
}

.dot-warning .vertical-timeline-element-icon {
  background: #f7b924
}

.dot-danger .vertical-timeline-element-icon {
  background: #d92550
}

.dot-light .vertical-timeline-element-icon {
  background: #eee
}

.dot-dark .vertical-timeline-element-icon {
  background: #343a40
}

.dot-focus .vertical-timeline-element-icon {
  background: #444054
}

.dot-alternate .vertical-timeline-element-icon {
  background: #794c8a
}

.vertical-timeline--animate .vertical-timeline-element-icon.is-hidden {
  visibility: hidden
}

.vertical-timeline--animate .vertical-timeline-element-icon.bounce-in {
  visibility: visible;
  animation: cd-bounce-1 .8s
}

@-webkit-keyframes cd-bounce-1 {
  0% {
    opacity: 0;
    -webkit-transform: scale(0.5)
  }

  60% {
    opacity: 1;
    -webkit-transform: scale(1.2)
  }

  100% {
    -webkit-transform: scale(1)
  }
}

@-moz-keyframes cd-bounce-1 {
  0% {
    opacity: 0;
    -moz-transform: scale(0.5)
  }

  60% {
    opacity: 1;
    -moz-transform: scale(1.2)
  }

  100% {
    -moz-transform: scale(1)
  }
}

@keyframes cd-bounce-1 {
  0% {
    opacity: 0;
    -webkit-transform: scale(0.5);
    -moz-transform: scale(0.5);
    -ms-transform: scale(0.5);
    -o-transform: scale(0.5);
    transform: scale(0.5)
  }

  60% {
    opacity: 1;
    -webkit-transform: scale(1.2);
    -moz-transform: scale(1.2);
    -ms-transform: scale(1.2);
    -o-transform: scale(1.2);
    transform: scale(1.2)
  }

  100% {
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1)
  }
}

.vertical-timeline--animate .vertical-timeline-element-content.is-hidden {
  visibility: hidden
}

.vertical-timeline--animate .vertical-timeline-element-content.bounce-in {
  visibility: visible;
  -webkit-animation: cd-bounce-2 .6s;
  -moz-animation: cd-bounce-2 .6s;
  animation: cd-bounce-2 .6s
}

@media only screen and (min-width: 1170px) {

  .vertical-timeline--two-columns.vertical-timeline--animate .vertical-timeline-element.vertical-timeline-element--right .vertical-timeline-element-content.bounce-in,
  .vertical-timeline--two-columns.vertical-timeline--animate .vertical-timeline-element:nth-child(even):not(.vertical-timeline-element--left) .vertical-timeline-element-content.bounce-in {
    -webkit-animation: cd-bounce-2-inverse .6s;
    -moz-animation: cd-bounce-2-inverse .6s;
    animation: cd-bounce-2-inverse .6s
  }
}

@media only screen and (max-width: 1169px) {
  .vertical-timeline--animate .vertical-timeline-element-content.bounce-in {
    visibility: visible;
    -webkit-animation: cd-bounce-2-inverse .6s;
    -moz-animation: cd-bounce-2-inverse .6s;
    animation: cd-bounce-2-inverse .6s
  }
}

@-webkit-keyframes cd-bounce-2 {
  0% {
    opacity: 0;
    -webkit-transform: translateX(-100px)
  }

  60% {
    opacity: 1;
    -webkit-transform: translateX(20px)
  }

  100% {
    -webkit-transform: translateX(0)
  }
}

@-moz-keyframes cd-bounce-2 {
  0% {
    opacity: 0;
    -moz-transform: translateX(-100px)
  }

  60% {
    opacity: 1;
    -moz-transform: translateX(20px)
  }

  100% {
    -moz-transform: translateX(0)
  }
}

@keyframes cd-bounce-2 {
  0% {
    opacity: 0;
    -webkit-transform: translateX(-100px);
    -moz-transform: translateX(-100px);
    -ms-transform: translateX(-100px);
    -o-transform: translateX(-100px);
    transform: translateX(-100px)
  }

  60% {
    opacity: 1;
    -webkit-transform: translateX(20px);
    -moz-transform: translateX(20px);
    -ms-transform: translateX(20px);
    -o-transform: translateX(20px);
    transform: translateX(20px)
  }

  100% {
    -webkit-transform: translateX(0);
    -moz-transform: translateX(0);

    -ms-transform: translateX(0);
    -o-transform: translateX(0);
    transform: translateX(0)
  }
}

@-webkit-keyframes cd-bounce-2-inverse {
  0% {
    opacity: 0;
    -webkit-transform: translateX(100px)
  }

  60% {
    opacity: 1;
    -webkit-transform: translateX(-20px)
  }

  100% {
    -webkit-transform: translateX(0)
  }
}

@-moz-keyframes cd-bounce-2-inverse {
  0% {
    opacity: 0;
    -moz-transform: translateX(100px)
  }

  60% {
    opacity: 1;
    -moz-transform: translateX(-20px)
  }

  100% {
    -moz-transform: translateX(0)
  }
}

@keyframes cd-bounce-2-inverse {
  0% {
    opacity: 0;
    -webkit-transform: translateX(100px);
    -moz-transform: translateX(100px);
    -ms-transform: translateX(100px);
    -o-transform: translateX(100px);
    transform: translateX(100px)
  }

  60% {
    opacity: 1;
    -webkit-transform: translateX(-20px);
    -moz-transform: translateX(-20px);
    -ms-transform: translateX(-20px);
    -o-transform: translateX(-20px);
    transform: translateX(-20px)
  }

  100% {
    -webkit-transform: translateX(0);
    -moz-transform: translateX(0);
    -ms-transform: translateX(0);
    -o-transform: translateX(0);
    transform: translateX(0)
  }
}

.todo-list-wrapper .todo-indicator {
  position: absolute;
  width: 4px;
  height: 60%;
  border-radius: .3rem;
  left: .625rem;
  top: 20%;
  opacity: .6;
  transition: opacity .2s
}

.todo-list-wrapper .list-group-item:hover .todo-indicator {
  opacity: .9
}

.todo-list-wrapper .custom-control,
.todo-list-wrapper input[checkbox] {
  margin-left: .625rem
}

.list-group-flush+.card-footer {
  border-top: 0
}

.rm-list-borders .list-group-item {
  border: 0;
  padding: .5rem 0
}

.rm-list-borders-scroll .list-group-item {
  border: 0;
  padding-right: 1.125rem
}

.input-group .input-group-prepend div:not([class]) .react-datepicker__input-container .form-control,
.input-group .input-group-prepend+div .react-datepicker__input-container .form-control {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
  border-top-right-radius: .25rem !important;
  border-bottom-right-radius: .25rem !important
}

.input-group>div:not([class]) {
  position: relative;
  flex: 1 1 auto;
  width: 1%
}

.input-group>div:not([class]) .react-datepicker__input-container .form-control {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0
}

.input-group .input-group-prepend+div {
  position: relative;
  flex: 1 1 auto;
  width: 1%
}

.input-group>.react-datepicker-wrapper {
  position: relative;
  flex: 1 1 auto;
  width: 1%
}

.input-group>.react-datepicker-wrapper>.react-datepicker__input-container>.form-control {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0
}

legend {
  font-size: .88rem;
  font-weight: bold
}

.form-heading {
  font-size: 1.1rem;
  margin: 0;
  color: #3f6ad8
}

.form-heading p {
  color: #6c757d;
  padding: 0.3rem 0 0;
  font-size: .88rem
}

.custom-select {
  -webkit-appearance: none;
  -moz-appearance: none
}

.pagination li a {
  position: relative;
  display: block;
  padding: .5rem .75rem;
  margin-left: -1px;
  line-height: 1.25;
  color: #007bff;
  background-color: #fff;
  border: 1px solid #dee2e6
}

.pagination li a:hover {
  z-index: 2;
  color: #0056b3;
  text-decoration: none;
  background-color: #e9ecef;
  border-color: #dee2e6
}

.pagination li a:focus {
  z-index: 2;
  outline: 0;
  box-shadow: none
}

.pagination li a:not(:disabled):not(.disabled) {
  cursor: pointer
}

.pagination li:first-child a {
  margin-left: 0;
  border-top-left-radius: .25rem;
  border-bottom-left-radius: .25rem
}

.pagination li:last-child a {
  border-top-right-radius: .25rem;
  border-bottom-right-radius: .25rem
}

.pagination li.active a {
  z-index: 1;
  color: #fff;
  background-color: #3f6ad8;
  border-color: #007bff
}

.pagination li.active a:hover {
  color: #fff
}

.pagination li.disabled a {
  color: #6c757d;
  pointer-events: none;
  cursor: auto;
  background-color: #fff;
  border-color: #dee2e6
}

.pagination-rounded li a {
  border-radius: 50px !important;
  margin: 0 .3rem
}

.chat-box-wrapper {
  display: flex;
  clear: both;
  padding: .75rem
}

.chat-box-wrapper+.chat-box-wrapper {
  padding-top: 0
}

.chat-box-wrapper .chat-box {
  box-shadow: 0 0 0 transparent;
  position: relative;
  opacity: 1;
  background: #e0f3ff;
  border: 0;
  padding: .75rem 1.5rem;
  border-radius: 30px;
  border-top-left-radius: .25rem;
  flex: 1;
  display: flex;
  max-width: 50%;
  min-width: 100%;
  text-align: left
}

.chat-box-wrapper .chat-box+small {
  text-align: left;
  padding: .5rem 0 0;
  margin-left: 1.5rem;
  display: block
}

.chat-box-wrapper.chat-box-wrapper-right {
  text-align: right
}

.chat-box-wrapper.chat-box-wrapper-right .chat-box {
  border-radius: 30px;
  border-top-left-radius: 30px;
  border-top-right-radius: .25rem;
  margin-left: auto
}

.chat-box-wrapper.chat-box-wrapper-right .chat-box+small {
  text-align: right;
  margin-right: 1.5rem;
  margin-left: 0
}

.forms-wizard {
  margin: 0;
  padding: 0;
  list-style-type: none;
  width: 100%;
  display: table;
  table-layout: fixed;
  border-radius: .25rem;
  border: 0
}

.forms-wizard li {
  display: table-cell;
  vertical-align: middle;
  text-align: center;
  cursor: pointer;
  font-size: 1rem;
  padding: 1rem 0;
  color: #adb5bd;
  position: relative
}

.forms-wizard li .nav-link {
  display: block;
  padding: 0;
  color: #adb5bd
}

.forms-wizard li .nav-link:focus,
.forms-wizard li .nav-link:active,
.forms-wizard li .nav-link:hover {
  border-color: transparent;
  color: #495057 !important
}

.forms-wizard li::after,
.forms-wizard li::before {
  position: absolute;
  height: 4px;
  top: 50%;
  margin-top: -1rem;
  width: 50%;
  content: '';
  background: #dee2e6;
  z-index: 5;
  transition: all .2s
}

.forms-wizard li::after {
  left: 50%
}

.forms-wizard li::before {
  left: 0
}

.forms-wizard li:first-child::before {
  border-top-left-radius: 20px;
  border-bottom-left-radius: 20px
}

.forms-wizard li:last-child::after {
  border-top-right-radius: 20px;
  border-bottom-right-radius: 20px
}

.forms-wizard li em {
  font-style: normal;
  font-size: 1.5rem;
  background: #ced4da;
  color: #fff;
  text-align: center;
  padding: 0;
  width: 40px;
  height: 40px;
  line-height: 40px;
  border-radius: 50px;
  display: block;
  margin: 0 auto 0.5rem;
  position: relative;
  z-index: 7;
  transition: all .2s
}

.forms-wizard li.active .nav-link {
  color: #495057
}

.forms-wizard li.active em {
  background: #3f6ad8;
  color: #fff
}

.forms-wizard li.active::after,
.forms-wizard li.active::before {
  background: #3f6ad8
}

.forms-wizard li.done em {
  font-family: 'Linearicons-Free';
  background: #3ac47d;
  overflow: hidden
}

.forms-wizard li.done em::before {
  width: 42px;
  height: 42px;
  font-size: 1.2rem;
  line-height: 40px;
  text-align: center;
  display: block
}

.forms-wizard li.done::after,
.forms-wizard li.done::before {
  background: #3ac47d
}

.forms-wizard li.done:hover {
  color: #495057 !important
}

.forms-wizard li:hover {
  color: #6c757d
}

.forms-wizard-alt .forms-wizard li {
  font-size: .88rem
}

.forms-wizard-alt .forms-wizard li em {
  width: 14px;
  height: 14px;
  line-height: 14px;
  text-indent: -999rem;
  border: #fff solid 2px
}

.forms-wizard-vertical .forms-wizard {
  display: block;
  width: 30%;
  float: left;
  padding: 0 1.5rem 1.5rem 0
}

.forms-wizard-vertical .forms-wizard li {
  display: block;
  margin: 0;
  padding: 0
}

.forms-wizard-vertical .forms-wizard li::before,
.forms-wizard-vertical .forms-wizard li::after {
  display: none
}

.forms-wizard-vertical .forms-wizard li a {
  text-align: left;
  display: flex;
  align-items: center;
  align-content: flex-start;
  padding: .75rem;
  margin-bottom: .5rem;
  border-radius: .3rem;
  transition: all .2s
}

.forms-wizard-vertical .forms-wizard li a em {
  margin: 0 .75rem 0 0
}

.forms-wizard-vertical .forms-wizard li a:active,
.forms-wizard-vertical .forms-wizard li a:focus,
.forms-wizard-vertical .forms-wizard li a:hover {
  background: #e9ecef;
  color: #495057 !important
}

.forms-wizard-vertical .forms-wizard li.active a {
  background: #3f6ad8;
  color: #fff
}

.forms-wizard-vertical .forms-wizard li.active a:active,
.forms-wizard-vertical .forms-wizard li.active a:focus,
.forms-wizard-vertical .forms-wizard li.active a:hover {
  color: #fff !important
}

.forms-wizard-vertical .forms-wizard li.active a em {
  background: rgba(255, 255, 255, 0.2)
}

.forms-wizard-vertical .form-wizard-content {
  width: 70%;
  overflow: auto
}

.icon-wrapper {
  display: flex;
  align-content: center;
  align-items: center
}

.widget-chart {
  text-align: center;
  padding: 1rem;
  position: relative
}

.widget-chart .progress-sub-label {
  opacity: .8;
  padding: 5px 0 0
}

.widget-chart .progress-circle-wrapper {
  min-width: 68px;
  margin-right: 1rem
}

.widget-chart .progress-circle-wrapper .react-sweet-progress-symbol {
  font-size: .8rem
}

.widget-chart .widget-chart-content {
  position: relative;
  z-index: 5
}

.widget-chart .widget-chart-content-lg {
  padding: 2rem 0 1rem 2rem
}

.widget-chart .widget-chart-content-lg .widget-numbers {
  margin-bottom: 0
}

.widget-chart .widget-chart-wrapper {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  opacity: .25;
  z-index: 4;
  border-bottom-right-radius: .25rem;
  border-bottom-left-radius: .25rem;
  overflow: hidden
}

.widget-chart .widget-numbers {
  font-weight: bold;
  font-size: 20px;
  display: block;
  line-height: 1;
  margin: 1rem auto
}

.widget-chart .widget-numbers+.widget-chart-flex,
.widget-chart .widget-numbers+.widget-description,
.widget-chart .widget-numbers+.widget-subheading {
  margin-top: -.5rem
}

.widget-chart .widget-subheading {
  margin: -0.5rem 0 0;
  display: block;
  opacity: .6
}

.widget-chart .widget-subheading:first-child {
  margin-top: 0
}

.widget-chart .widget-subheading+.widget-numbers {
  margin-top: .5rem
}

.widget-chart .widget-description {
  margin: 1rem 0 0
}

.widget-chart.widget-chart-hover {
  transition: all .2s
}

.widget-chart.widget-chart-hover:hover {
  z-index: 15;
  transform: scale(1.15);
  box-shadow: 0 0.46875rem 4.1875rem rgba(4, 9, 20, 0.05), 0 0.9375rem 2.40625rem rgba(4, 9, 20, 0.05), 0 0.25rem 1.3125rem rgba(4, 9, 20, 0.06), 0 0.125rem 1.1875rem rgba(4, 9, 20, 0.06);
  cursor: pointer;
  background: #fff
}

.widget-chart .widget-chart-actions {
  position: absolute;
  right: .5rem;
  top: .5rem;
  z-index: 12
}

.widget-chart .widget-chart-actions .btn-link {
  font-size: 1.1rem;
  padding-top: 0;
  padding-bottom: 0;
  opacity: .6
}

.widget-chart .widget-progress-wrapper {
  margin-top: 1rem
}

.widget-chart .widget-progress-wrapper.progress-wrapper-bottom {
  position: absolute;
  left: 0;
  bottom: 0;
  width: 100%
}

.widget-chart .widget-progress-wrapper.progress-wrapper-bottom .progress {
  margin: 0 -1px -1px
}

.widget-chart .widget-progress-wrapper.progress-wrapper-bottom .progress {
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  border-bottom-right-radius: .25rem;
  border-bottom-left-radius: .25rem
}

.widget-chart .widget-progress-wrapper.progress-wrapper-bottom .progress .progress-bar {
  border-bottom-left-radius: .25rem
}

.widget-chart .widget-chart-flex {
  display: flex;
  align-items: center;
  align-content: center;
  margin-bottom: 1rem
}

.widget-chart .widget-chart-flex:last-child {
  margin-bottom: 0
}

.widget-chart .widget-chart-flex .widget-subheading {
  margin: 0
}

.widget-chart .widget-chart-flex .widget-description {
  margin-top: 0
}
.widget-chart.text-right {
  flex-direction: row;
  align-items: center
}

.widget-chart.text-left {
  flex-direction: row;
  align-items: center
}

.widget-chart.text-left .icon-wrapper {
  min-width: 54px;
  margin: 0 1rem 0 0
}

.widget-chart.text-left .widget-numbers {
  margin-left: 0
}

.widget-chart.text-left .widget-chart-content {
  display: flex;
  flex-direction: column;
  align-content: center;
  flex: 1;
  position: relative
}

.widget-chart.text-left .widget-chart-content>.widget-numbers:first-child {
  margin-top: 0
}

.widget-chart.text-left .widget-chart-content .widget-description {
  align-self: flex-start
}

.widget-chart.text-left .widget-chart-wrapper {
  height: 35%
}

.widget-chart.widget-chart-left {
  padding-bottom: 15%
}

.widget-chart .chart-wrapper-relative {
  position: relative;
  opacity: 1;
  margin-top: 1rem
}

.widget-chart-actions {
  position: absolute;
  right: 1rem;
  top: 1rem;
  z-index: 12
}

.widget-chart-actions .btn-link {
  font-size: 1.1rem;
  padding-top: 0;
  padding-bottom: 0;
  opacity: .6
}

.widget-chart:hover .widget-chart-actions .btn-link,
.widget-content:hover .widget-chart-actions .btn-link {
  opacity: 1
}

.grid-menu .widget-chart.widget-chart-hover:hover {
  background: #fff;
  border-radius: .25rem;
  height:188px;
}

.icon-wrapper {
  width: 54px;
  height: 54px;
  margin: 0 auto;
  position: relative;
  overflow: hidden
}

.icon-wrapper[class*="border-"] {
  border-width: 1px;
  border-style: solid
}

.icon-wrapper .icon-wrapper-bg {
  position: absolute;
  height: 100%;
  width: 100%;
  z-index: 3;
  opacity: .2
}

.icon-wrapper .icon-wrapper-bg.bg-light {
  opacity: .08
}

.icon-wrapper i {
  margin: 0 auto;
  font-size: 1.7rem;
  position: relative;
  z-index: 5
}

.icon-wrapper i:before {
  margin-top: -3px
}

.icon-wrapper .progress-circle-wrapper {
  width: 100%;
  margin-right: 0
}

.widget-chart2 .widget-chart-flex {
  display: flex;
  align-items: baseline;
  align-content: center;
  margin-bottom: 0
}

.widget-chart2 .widget-chart-flex .widget-subtitle {
  margin-left: auto
}

.widget-chart2 .widget-chart-flex .widget-numbers {
  font-weight: normal
}

.widget-chart2 .widget-chart-flex+.widget-chart-flex .widget-numbers {
  margin-bottom: 0
}

.widget-chart2 .widget-chat-wrapper-outer {
  display: flex;
  flex: 1;
  flex-direction: column;
  max-width: 100%
}

.widget-chart2 .widget-chat-wrapper-outer .widget-chart-wrapper {
  height: 70px;
  opacity: .8;
  position: relative;
  margin: 1rem auto -.5rem
}

.widget-chart2 .widget-chat-wrapper-outer .widget-chart-wrapper-lg {
  height: 130px
}

.widget-chart2 .widget-chat-wrapper-outer .widget-chart-wrapper-xlg {
  height: 160px
}

.card-btm-border {
  border-bottom: transparent solid 4px
}

.progress-box {
  text-align: center
}

.progress-box h4 {
  font-size: .88rem;
  font-weight: bold;
  opacity: .6;
  text-transform: uppercase;
  padding-bottom: .33333rem
}

.progress-box svg {
  margin: 0 auto
}

.svg-bg {
  position: absolute;
  width: 100%;
  height: 100%;
  opacity: .1
}

.svg-bg svg {
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  top: 0
}

.widget-numbers-sm {
  font-size: 1.5rem
}

.widget-content {
  padding: 1rem;
  flex-direction: row;
  align-items: center
}

.widget-content .widget-content-wrapper {
  display: flex;
  flex: 1;
  position: relative;
  align-items: center
}

.widget-content .widget-content-left .widget-heading {
  opacity: .8;
  font-weight: bold
}

.widget-content .widget-content-left .widget-subheading {
  opacity: .5
}

.widget-content .widget-content-right {
  margin-left: auto
}

.widget-content .widget-numbers {
  font-weight: bold;
  font-size: 1.8rem;
  display: block
}

.widget-content .widget-content-outer {
  display: flex;
  flex: 1;
  flex-direction: column
}

.widget-content .widget-progress-wrapper {
  margin-top: 1rem
}

.widget-content .widget-progress-wrapper .progress-sub-label {
  margin-top: .33333rem;
  opacity: .5;
  display: flex;
  align-content: center;
  align-items: center
}

.widget-content .widget-progress-wrapper .progress-sub-label .sub-label-right {
  margin-left: auto
}

.widget-content .widget-content-right.widget-content-actions {
  visibility: hidden;
  opacity: 0;
  transition: opacity .2s
}

.widget-content:hover .widget-content-right.widget-content-actions {
  visibility: visible;
  opacity: 1
}

.profile-block {
  position: relative;
  overflow: hidden
}

.profile-block .profile-blur {
  width: 100%;
  height: 100%;
  filter: blur(5px);
  transform: scale(1.8);
  position: absolute;
  left: -25%;
  top: -25%
}

.profile-block .profile-inner {
  position: absolute;
  width: 100%;
  height: 100%;
  opacity: .5;
  left: 0;
  top: 0
}

.profile-block .dropdown-menu-header .menu-header-content {
  padding: 3rem
}

.profile-block .dropdown-menu-header .menu-header-content .menu-header-title {
  margin: .75rem 0 0
}

.profile-block .dropdown-menu-header .menu-header-content .menu-header-subtitle {
  margin: .5rem 0 0
}

.profile-block .dropdown-menu-header .menu-header-btn-pane {
  margin: .5rem 0 0
}

.profile-block .dropdown-menu-header .menu-header-btn-pane .btn-icon {
  color: #fff;
  padding: 0;
  width: 44px;
  height: 44px;
  line-height: 37px;
  font-size: 1.1rem
}

.profile-block .dropdown-menu-header .menu-header-btn-pane .btn-icon:hover {
  background: rgba(255, 255, 255, 0.2)
}

.app-logo {
  height: 44px;
    width: 196px;
    background: url(assets/images/logo.jpg);
    background-repeat: no-repeat;
    margin-left: -14px;
}

.app-logo-inverse {
  height: 23px;
  width: 97px;
  background: url(assets/images/logo.png)
}

.app-login-box .app-logo {
  margin-bottom: 2rem
}

.app-login-box h4 {
  margin-bottom: 1.5rem;
  font-weight: normal
}

.app-login-box h4 div {
  opacity: .6
}

.app-login-box h4 span {
  font-size: 1.1rem
}

.app-inner-layout.rm-sidebar .app-inner-layout__wrapper .app-inner-layout__content {
  width: auto;
  float: none
}

.app-inner-layout .app-inner-layout__header {
  width: 100%;
  padding: 1.5rem;
  text-align: left;
  border-bottom: #e9ecef solid 1px
}

.app-inner-layout .app-inner-layout__header .app-page-title {
  margin: 0;
  padding: 0;
  background: transparent
}

.app-inner-layout .app-inner-layout__header-boxed {
  padding: 1.5rem
}

.app-inner-layout .app-inner-layout__header-boxed .app-inner-layout__header {
  border-radius: .3rem
}

.app-inner-layout .app-inner-layout__wrapper {
  position: relative;
  display: flex;
  flex-direction: row;
  
}

.app-inner-layout .app-inner-layout__wrapper .app-inner-layout__content {
  flex: 1;
  display: flex
}

.app-inner-layout .app-inner-layout__wrapper .app-inner-layout__content.card {
  box-shadow: 0 0 0 0 transparent;
  border-radius: 0;
  border: 0
}

.app-inner-layout .app-inner-layout__wrapper .app-inner-layout__content .app-inner-layout__top-pane {
  display: flex;
  align-content: center;
  align-items: center;
  text-align: left;
  padding: .75rem 1.5rem
}

.app-inner-layout .app-inner-layout__wrapper .app-inner-layout__content .pane-left {
  display: flex;
  align-items: center
}

.app-inner-layout .app-inner-layout__wrapper .app-inner-layout__content .pane-right {
  display: flex;
  align-items: center;
  margin-left: auto
}

.app-inner-layout .app-inner-layout__wrapper .app-inner-layout__content .app-inner-layout__bottom-pane {
  padding: 1.5rem 1rem;
  border-top: #e9ecef solid 1px
}

.app-inner-layout .app-inner-layout__wrapper .app-inner-layout__sidebar {
  width: 270px;
  list-style: none;
  text-align: left;
  order: -1;
  flex: 0 0 270px;
  display: flex;
  margin: 0;
  position: relative
}

.app-inner-layout .app-inner-layout__wrapper .app-inner-layout__sidebar-right {
  width: 270px;
  list-style: none;
  text-align: left;
  order: 0;
  flex: 0 0 270px;
  display: flex;
  margin: 0;
  position: relative
}

.app-inner-layout .app-inner-layout__wrapper .app-inner-layout__sidebar .dropdown-item {
  white-space: normal
}

.app-inner-layout .app-inner-layout__wrapper .app-inner-layout__sidebar.card {
  box-shadow: 0 0 0 0 transparent;
  border-radius: 0;
  background: #f8f9fa;
  border: 0;
  border-right: #e9ecef solid 1px;
  border-left: #e9ecef solid 1px
}

.app-inner-layout .app-inner-layout__wrapper .app-inner-layout__sidebar .app-inner-layout__sidebar-footer,
.app-inner-layout .app-inner-layout__wrapper .app-inner-layout__sidebar .app-inner-layout__sidebar-header {
  background: #f8f9fa
}

.app-inner-layout .app-inner-layout__wrapper .app-inner-layout__aside {
  width: 60px
}

.app-inner-layout .app-inner-layout__footer {
  width: 100%;
  height: 50px
}

.app-wrapper-footer .app-footer {
  border-top: #e9ecef solid 1px
}

.app-wrapper-footer .app-footer .app-footer__inner {
  border-left: #e9ecef solid 1px
}

.chat-layout.app-inner-layout .app-inner-layout__sidebar {
  width: 300px;
  flex: 0 0 300px
}

.chat-layout.app-inner-layout .app-inner-layout__sidebar-right {
  width: 320px;
  flex: 0 0 320px;
}

.chat-layout .app-inner-layout__top-pane h4 {
  font-size: 1.25rem
}

.chat-layout .app-inner-layout__top-pane h4 div {
  font-size: .88rem
}

.chat-layout .chat-box-wrapper {
  padding: 1.5rem
}

@media (max-width: 1199.98px) {
  .chat-layout.app-inner-layout .app-inner-layout__sidebar .widget-content .widget-content-left .widget-subheading {
    white-space: normal
  }
}

.mobile-app-menu-btn {
  display: none;
  margin: 3px 1.5rem 0 0
}

@media (max-width: 991.98px) {
  .app-inner-layout__sidebar {
    display: none !important
  }

  .mobile-app-menu-btn {
    display: block
  }

  .open-mobile-menu .app-inner-layout__sidebar {
    display: block !important
  }
}

.ps {
  overflow: hidden !important;
  overflow-anchor: none;
  touch-action: auto
}

.ps__rail-x {
  display: none !important;
  opacity: 0;
  transition: background-color .2s linear, opacity .2s linear;
  height: 15px;
  bottom: 0;
  position: absolute;
  z-index: 7
}

.ps__rail-y {
  display: none;
  opacity: 0;
  transition: background-color .2s linear, opacity .2s linear;
  width: 15px;
  right: 0;
  position: absolute;
  border-radius: 50px;
  z-index: 7
}

.ps--active-x>.ps__rail-x,
.ps--active-y>.ps__rail-y {
  display: block;
  background-color: transparent
}

.ps:hover>.ps__rail-x,
.ps:hover>.ps__rail-y,
.ps--focus>.ps__rail-x,
.ps--focus>.ps__rail-y,
.ps--scrolling-x>.ps__rail-x,
.ps--scrolling-y>.ps__rail-y {
  opacity: 0.6
}

.ps__rail-x:hover,
.ps__rail-y:hover,
.ps__rail-x:focus,
.ps__rail-y:focus {
  background-color: rgba(0, 0, 0, 0.1);
  opacity: 0.9
}

.ps__thumb-x {
  background-color: rgba(0, 0, 0, 0.1);
  border-radius: 6px;
  transition: background-color .2s linear, height .2s ease-in-out;
  height: 6px;
  bottom: 2px;
  position: absolute
}

.ps__thumb-y {
  background-color: rgba(0, 0, 0, 0.1);
  border-radius: 6px;
  transition: background-color .2s linear, width .2s ease-in-out;
  width: 6px;
  right: 2px;
  position: absolute
}

.ps__rail-x:hover>.ps__thumb-x,
.ps__rail-x:focus>.ps__thumb-x {
  background-color: rgba(0, 0, 0, 0.12);
  height: 11px
}

.ps__rail-y:hover>.ps__thumb-y,
.ps__rail-y:focus>.ps__thumb-y {
  background-color: rgba(0, 0, 0, 0.12);
  width: 11px
}

@supports (-ms-overflow-style: none) {
  .ps {
    overflow: auto !important
  }
}

@media screen and (-ms-high-contrast: active),
(-ms-high-contrast: none) {
  .ps {
    overflow: auto !important
  }
}

.scrollbar-sidebar,
.scrollbar-container {
  position: relative;
  height: 100%
}

.scroll-area {
  overflow-x: hidden;
  height: 400px
}

.scroll-area-xs {
  height: 150px;
  overflow-x: hidden
}

.scroll-area-sm {
  height: 200px;
  overflow-x: hidden
}

.scroll-area-md {
  height: 300px;
  overflow-x: hidden
}

.scroll-area-lg {
  height: 400px;
  overflow-x: hidden
}

.scroll-area-x {
  overflow-x: auto;
  width: 100%;
  max-width: 100%
}

.shadow-overflow {
  position: relative
}

.shadow-overflow::after,
.shadow-overflow::before {
  width: 100%;
  bottom: auto;
  top: 0;
  left: 0;
  height: 1.5rem;
  position: absolute;
  z-index: 10;
  content: '';
  background: linear-gradient(to bottom, #fff 20%, rgba(255, 255, 255, 0) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#00ffffff', GradientType=0)
}

.shadow-overflow::after {
  bottom: 0;
  top: auto;
  background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, #fff 80%);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00ffffff', endColorstr='#ffffff', GradientType=0)
}



.toast-title {
  font-weight: bold
}

.toast-message {
  -ms-word-wrap: break-word;
  word-wrap: break-word
}

.toast-message a,
.toast-message label {
  color: #fff
}

.toast-message a:hover {
  color: #cccccc;
  text-decoration: none
}

.toast-close-button {
  position: relative;
  right: -0.3em;
  top: -0.3em;
  float: right;
  font-weight: bold;
  color: #fff;
  opacity: 0.8
}

.toast-close-button:hover,
.toast-close-button:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
  opacity: 0.4
}

button.toast-close-button {
  padding: 0;
  cursor: pointer;
  background: transparent;
  border: 0;
  -webkit-appearance: none
}

.toast-top-center {
  top: 0;
  right: 0;
  width: 100%
}

.toast-bottom-center {
  bottom: 0;
  right: 0;
  width: 100%
}

.toast-top-full-width {
  top: 0;
  right: 0;
  width: 100%
}

.toast-bottom-full-width {
  bottom: 0;
  right: 0;
  width: 100%
}

.toast-top-left {
  top: 12px;
  left: 12px
}

.toast-top-right {
  top: 12px;
  right: 12px
}

.toast-bottom-right {
  right: 12px;
  bottom: 12px
}

.toast-bottom-left {
  bottom: 12px;
  left: 12px
}

#toast-container {
  position: fixed;
  z-index: 999999
}

#toast-container * {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box
}

#toast-container>div {
  position: relative;
  overflow: hidden;
  margin: 0 0 .6rem;
  padding: .6rem .6rem .6rem 50px;
  width: 300px;
  border-radius: .25rem;
  background-position: 15px center;
  background-repeat: no-repeat;
  box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03);
  color: #fff;
  opacity: 0.9
}

#toast-container>div:hover {
  opacity: 1;
  cursor: pointer
}

#toast-container>.toast-info {
  background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAGwSURBVEhLtZa9SgNBEMc9sUxxRcoUKSzSWIhXpFMhhYWFhaBg4yPYiWCXZxBLERsLRS3EQkEfwCKdjWJAwSKCgoKCcudv4O5YLrt7EzgXhiU3/4+b2ckmwVjJSpKkQ6wAi4gwhT+z3wRBcEz0yjSseUTrcRyfsHsXmD0AmbHOC9Ii8VImnuXBPglHpQ5wwSVM7sNnTG7Za4JwDdCjxyAiH3nyA2mtaTJufiDZ5dCaqlItILh1NHatfN5skvjx9Z38m69CgzuXmZgVrPIGE763Jx9qKsRozWYw6xOHdER+nn2KkO+Bb+UV5CBN6WC6QtBgbRVozrahAbmm6HtUsgtPC19tFdxXZYBOfkbmFJ1VaHA1VAHjd0pp70oTZzvR+EVrx2Ygfdsq6eu55BHYR8hlcki+n+kERUFG8BrA0BwjeAv2M8WLQBtcy+SD6fNsmnB3AlBLrgTtVW1c2QN4bVWLATaIS60J2Du5y1TiJgjSBvFVZgTmwCU+dAZFoPxGEEs8nyHC9Bwe2GvEJv2WXZb0vjdyFT4Cxk3e/kIqlOGoVLwwPevpYHT+00T+hWwXDf4AJAOUqWcDhbwAAAAASUVORK5CYII=") !important;
  box-shadow: 0 0.66875rem 2.3875rem rgba(22, 170, 255, 0.03), 0 1.1375rem 1.60625rem rgba(22, 170, 255, 0.03), 0 0.45rem 0.73125rem rgba(22, 170, 255, 0.05), 0 0.325rem 0.3875rem rgba(22, 170, 255, 0.03)
}

#toast-container>.toast-error {
  background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAHOSURBVEhLrZa/SgNBEMZzh0WKCClSCKaIYOED+AAKeQQLG8HWztLCImBrYadgIdY+gIKNYkBFSwu7CAoqCgkkoGBI/E28PdbLZmeDLgzZzcx83/zZ2SSXC1j9fr+I1Hq93g2yxH4iwM1vkoBWAdxCmpzTxfkN2RcyZNaHFIkSo10+8kgxkXIURV5HGxTmFuc75B2RfQkpxHG8aAgaAFa0tAHqYFfQ7Iwe2yhODk8+J4C7yAoRTWI3w/4klGRgR4lO7Rpn9+gvMyWp+uxFh8+H+ARlgN1nJuJuQAYvNkEnwGFck18Er4q3egEc/oO+mhLdKgRyhdNFiacC0rlOCbhNVz4H9FnAYgDBvU3QIioZlJFLJtsoHYRDfiZoUyIxqCtRpVlANq0EU4dApjrtgezPFad5S19Wgjkc0hNVnuF4HjVA6C7QrSIbylB+oZe3aHgBsqlNqKYH48jXyJKMuAbiyVJ8KzaB3eRc0pg9VwQ4niFryI68qiOi3AbjwdsfnAtk0bCjTLJKr6mrD9g8iq/S/B81hguOMlQTnVyG40wAcjnmgsCNESDrjme7wfftP4P7SP4N3CJZdvzoNyGq2c/HWOXJGsvVg+RA/k2MC/wN6I2YA2Pt8GkAAAAASUVORK5CYII=") !important;
  box-shadow: 0 0.66875rem 2.3875rem rgba(217, 37, 80, 0.03), 0 1.1375rem 1.60625rem rgba(217, 37, 80, 0.03), 0 0.45rem 0.73125rem rgba(217, 37, 80, 0.05), 0 0.325rem 0.3875rem rgba(217, 37, 80, 0.03)
}

#toast-container>.toast-success {
  background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAADsSURBVEhLY2AYBfQMgf///3P8+/evAIgvA/FsIF+BavYDDWMBGroaSMMBiE8VC7AZDrIFaMFnii3AZTjUgsUUWUDA8OdAH6iQbQEhw4HyGsPEcKBXBIC4ARhex4G4BsjmweU1soIFaGg/WtoFZRIZdEvIMhxkCCjXIVsATV6gFGACs4Rsw0EGgIIH3QJYJgHSARQZDrWAB+jawzgs+Q2UO49D7jnRSRGoEFRILcdmEMWGI0cm0JJ2QpYA1RDvcmzJEWhABhD/pqrL0S0CWuABKgnRki9lLseS7g2AlqwHWQSKH4oKLrILpRGhEQCw2LiRUIa4lwAAAABJRU5ErkJggg==") !important;
  box-shadow: 0 0.66875rem 2.3875rem rgba(58, 196, 125, 0.03), 0 1.1375rem 1.60625rem rgba(58, 196, 125, 0.03), 0 0.45rem 0.73125rem rgba(58, 196, 125, 0.05), 0 0.325rem 0.3875rem rgba(58, 196, 125, 0.03)
}

#toast-container>.toast-warning {
  background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAGYSURBVEhL5ZSvTsNQFMbXZGICMYGYmJhAQIJAICYQPAACiSDB8AiICQQJT4CqQEwgJvYASAQCiZiYmJhAIBATCARJy+9rTsldd8sKu1M0+dLb057v6/lbq/2rK0mS/TRNj9cWNAKPYIJII7gIxCcQ51cvqID+GIEX8ASG4B1bK5gIZFeQfoJdEXOfgX4QAQg7kH2A65yQ87lyxb27sggkAzAuFhbbg1K2kgCkB1bVwyIR9m2L7PRPIhDUIXgGtyKw575yz3lTNs6X4JXnjV+LKM/m3MydnTbtOKIjtz6VhCBq4vSm3ncdrD2lk0VgUXSVKjVDJXJzijW1RQdsU7F77He8u68koNZTz8Oz5yGa6J3H3lZ0xYgXBK2QymlWWA+RWnYhskLBv2vmE+hBMCtbA7KX5drWyRT/2JsqZ2IvfB9Y4bWDNMFbJRFmC9E74SoS0CqulwjkC0+5bpcV1CZ8NMej4pjy0U+doDQsGyo1hzVJttIjhQ7GnBtRFN1UarUlH8F3xict+HY07rEzoUGPlWcjRFRr4/gChZgc3ZL2d8oAAAAASUVORK5CYII=") !important;
  box-shadow: 0 0.66875rem 2.3875rem rgba(247, 185, 36, 0.03), 0 1.1375rem 1.60625rem rgba(247, 185, 36, 0.03), 0 0.45rem 0.73125rem rgba(247, 185, 36, 0.05), 0 0.325rem 0.3875rem rgba(247, 185, 36, 0.03);
  color: #212529
}

#toast-container.toast-top-center>div,
#toast-container.toast-bottom-center>div {
  width: 300px;
  margin-left: auto;
  margin-right: auto
}

#toast-container.toast-top-full-width>div,
#toast-container.toast-bottom-full-width>div {
  width: 96%;
  margin-left: auto;
  margin-right: auto
}

.toast {
  background-color: #343a40
}

.toast-success {
  background-color: #3ac47d
}

.toast-error {
  background-color: #d92550
}

.toast-info {
  background-color: #16aaff
}

.toast-warning {
  background-color: #f7b924
}

.toast-progress {
  position: absolute;
  left: 0;
  bottom: 0;
  height: 4px;
  background-color: #000;
  opacity: 0.4
}

@media all and (max-width: 240px) {
  #toast-container>div {
    padding: 8px 8px 8px 50px;
    width: 11em
  }

  #toast-container .toast-close-button {
    right: -0.2em;
    top: -0.2em
  }
}

@media all and (min-width: 241px) and (max-width: 480px) {
  #toast-container>div {
    padding: 8px 8px 8px 50px;
    width: 18em
  }

  #toast-container .toast-close-button {
    right: -0.2em;
    top: -0.2em
  }
}

@media all and (min-width: 481px) and (max-width: 768px) {
  #toast-container>div {
    padding: 15px 15px 15px 50px;
    width: 25em
  }
}

.slick-slider {
  position: relative;
  display: block;
  box-sizing: border-box;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -ms-touch-action: pan-y;
  touch-action: pan-y;
  -webkit-tap-highlight-color: transparent;
  max-width: 1400px;
  margin-left: auto;
  margin-right: auto
}

.slick-slider-sm .slick-slider {
  max-width: 450px
}

.slick-slider-sm .slick-slider .slick-prev {
  left: -20px
}

.slick-slider-sm .slick-slider .slick-next {
  right: -20px
}

.slick-slider-md .slick-slider {
  max-width: 650px;
  margin: 0 auto
}

.slick-slider-hover .slick-arrow {
  opacity: 0;
  background: #3f6ad8;
  color: #fff !important
}

.slick-slider-hover .slick-prev {
  left: -30px
}

.slick-slider-hover .slick-next {
  right: -30px
}

.slick-slider-hover:hover .slick-arrow {
  opacity: 1
}

.slick-list {
  position: relative;
  overflow: hidden;
  display: block;
  margin: 0;
  padding: 0
}

.slick-list:focus {
  outline: none
}

.slick-list.dragging {
  cursor: pointer;
  cursor: hand
}

.slick-slider .slick-track,
.slick-slider .slick-list {
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  -ms-transform: translate3d(0, 0, 0);
  -o-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0)
}

.slick-track {
  position: relative;
  left: 0;
  top: 0;
  display: block;
  margin-left: auto;
  margin-right: auto
}

.slick-track:before,
.slick-track:after {
  content: "";
  display: table
}

.slick-track:after {
  clear: both
}

.slick-loading .slick-track {
  visibility: hidden
}

.slick-slide {
  float: left;
  height: 100%;
  min-height: 1px;
  display: none
}

[dir="rtl"] .slick-slide {
  float: right
}

.slick-slide img {
  display: block
}

.slick-slide.slick-loading img {
  display: none
}

.slick-slide.dragging img {
  pointer-events: none
}

.slick-initialized .slick-slide {
  display: block
}

.slick-loading .slick-slide {
  visibility: hidden
}

.slick-vertical .slick-slide {
  display: block;
  height: auto;
  border: 1px solid transparent
}

.slick-arrow.slick-hidden {
  display: none
}

.slick-loading .slick-list {
  background: #fff slick-image-url(assets/images/ajax-loader.gif) center center no-repeat
}

.slick-prev,
.slick-next {
  position: absolute;
  display: block;
  height: 40px;
  width: 40px;
  cursor: pointer;
  color: #6c757d;
  top: 50%;
  transform: translate(0, -80%);
  padding: 0;
  border: none;
  outline: none;
  box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03);
  transition: all .2s;
  font-family: 'Pe-icon-7-stroke';
  border-radius: 50px;
  background: #fff;
  z-index: 6;
  overflow: hidden
}

.slick-prev::before,
.slick-next::before {
  font-size: 35px;
  height: 40px;
  line-height: 40px;
  width: 40px;
  display: block
}

.slick-prev:hover,
.slick-prev:focus,
.slick-next:hover,
.slick-next:focus {
  outline: none;
  box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175);
  color: #3f6ad8
}

.slick-prev.slick-disabled:before,
.slick-next.slick-disabled:before {
  opacity: .25
}

.slick-prev {
  left: 0
}

.slick-prev:before {
  content: ""
}

.slick-next {
  right: 0
}

.slick-next:before {
  content: ""
}

.slick-dots {
  list-style: none;
  display: block;
  text-align: center;
  padding: 0;
  margin: .75rem 0 0;
  width: 100%
}

.slick-dots li {
  position: relative;
  display: inline-block;
  padding: 0;
  margin: 0 5px;
  cursor: pointer;
  transform: scale(0.8);
  transition: all .2s
}

.slick-dots li button {
  border: 0;
  background: transparent;
  display: block;
  height: 14px;
  width: 14px;
  background: #3f6ad8;
  cursor: pointer;
  position: relative;
  border-radius: 20px;
  color: transparent
}

.slick-dots li button::before {
  content: '';
  position: absolute;
  background: #fff;
  left: 50%;
  top: 50%;
  margin: -4px 0 0 -4px;
  display: block;
  width: 8px;
  height: 8px;
  border-radius: 20px
}

.slick-dots li.slick-active {
  transform: scale(1.2)
}

.slick-center {
  transform: scale(1.1)
}

.slick-slider .slide-img-bg {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-size: cover;
  opacity: .4;
  z-index: 10
}

.slick-slider .slider-content {
  position: relative;
  z-index: 15;
  text-align: center;
  margin: 0 6rem
}

.slick-slider .slider-content h3 {
  font-size: 1.75rem;
  font-weight: normal;
  margin-bottom: 1.5rem
}

.slick-slider .slider-content p {
  font-size: 1rem;
  /* opacity: .7; */
}

.slider-light .slick-dots {
  position: absolute;
  bottom: 10px
}

.slider-light .slick-dots li button {
  background: rgba(255, 255, 255, 0.25)
}

.slider-light .slick-prev,
.slider-light .slick-next {
  background: transparent;
  color: #fff;
  box-shadow: 0 0 0 0 transparent
}

.slider-light .slick-prev:hover,
.slider-light .slick-next:hover {
  background: rgba(255, 255, 255, 0.15)
}

.slider-light .slick-next {
  right: 15px
}

.slider-light .slick-prev {
  left: 15px
}

.slider-light .slider-content {
  color: #fff
}

.popover,
.tooltip {
  opacity: 0;
  transition: opacity .2s ease
}

.popover.show,
.tooltip.show {
  opacity: 1
}

.popover {
  box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03)
}

.popover .grid-menu {
  margin-bottom: -.5rem;
  padding: 1px
}

.popover .grid-menu [class*="col-"] {
  padding: .5rem
}

.popover .grid-menu+.nav .nav-item-btn {
  margin-bottom: .5rem
}

.popover .grid-menu-xl {
  margin-bottom: -.37037rem
}

.popover .grid-menu-xl [class*="col-"] {
  padding: 0
}

.popover .popover-inner .dropdown-menu-header {
  border-top-left-radius: .3rem;
  border-top-right-radius: .3rem;
  overflow: hidden;
  margin-top: -1px;
  margin-left: -1px;
  margin-right: -1px
}

.rm-max-width .popover {
  max-width: initial !important
}

.rm-max-width .popover .popover-body {
  padding: 0
}

.rm-pointers .popover .arrow {
  display: none !important
}

.popover-primary {
  background-color: #3f6ad8 !important
}

.popover-secondary {
  background-color: #6c757d !important
}

.popover-success {
  background-color: #3ac47d !important
}

.popover-info {
  background-color: #16aaff !important
}

.popover-warning {
  background-color: #f7b924 !important
}

.popover-danger {
  background-color: #d92550 !important
}

.popover-light {
  background-color: #eee !important
}

.popover-dark {
  background-color: #343a40 !important
}

.popover-focus {
  background-color: #444054 !important
}

.popover-alternate {
  background-color: #794c8a !important
}

.popover-custom {
  min-width: 220px;
  max-width: none
}

.popover-custom .popover-body {
  padding-top: 0;
  padding-left: 0;
  padding-right: 0
}

.popover-custom .popover-body .dropdown-menu-header {
  margin-top: 0;
  border-top-left-radius: .3rem;
  border-top-right-radius: .3rem;
  overflow: hidden
}

.popover-custom .popover-body .dropdown-menu-header .menu-header-content {
  padding: 0 1.5rem
}

.popover-custom .popover-body .dropdown-menu-header .dropdown-menu-header-inner.bg-light {
  color: rgba(0, 0, 0, 0.8)
}

.popover-custom.popover-custom-lg {
  min-width: 22rem
}

.popover-custom.popover-custom-xl {
  min-width: 25rem
}

.popover-custom.popover-custom-sm {
  min-width: 15rem
}

.popover-bg {
  border: 0
}

.popover-bg .arrow {
  display: none
}

.popover-bg .popover-header {
  background: rgba(255, 255, 255, 0.1);
  border-bottom: 0;
  color: #fff
}

.popover-bg .popover-header::before {
  display: none
}

.popover-bg .popover-body {
  color: rgba(255, 255, 255, 0.7)
}

.popover-bg.text-dark .popover-header {
  color: rgba(0, 0, 0, 0.8)
}

.popover-bg.text-dark .popover-body {
  color: rgba(0, 0, 0, 0.7)
}

.tooltip.tooltip-light .tooltip-inner {
  background: #fff;
  color: #343a40;
  box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03);
  border: rgba(26, 54, 126, 0.125) solid 1px
}

.tooltip.tooltip-light .arrow {
  display: none
}



.fullscreen {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 1050;
  width: 100% !important;
  background: #FFF
}

.demo-editor {
  height: 275px !important;
  border: 1px solid #F1F1F1 !important;
  padding: 5px !important;
  border-radius: 2px !important
}

.btn-group-xs>.btn,
.btn-xs {
  padding: .35rem .4rem .25rem .4rem;
  font-size: .875rem;
  line-height: .5;
  border-radius: .2rem
}

.checkbox label .toggle,
.checkbox-inline .toggle {
  margin-left: -20px;
  margin-right: 5px
}

.toggle {
  position: relative;
  overflow: hidden;
  border-color: rgba(0, 0, 0, 0.2)
}

.toggle input[type="checkbox"] {
  display: none
}

.toggle-group {
  position: absolute;
  width: 200%;
  top: 0;
  bottom: 0;
  left: 0;
  transition: left 0.35s;
  -webkit-transition: left 0.35s;
  -moz-user-select: none;
  -webkit-user-select: none
}

.toggle.off .toggle-group {
  left: -100%
}

.toggle-on {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 50%;
  margin: 0;
  border: 0;
  border-radius: 0
}

.toggle-off {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 50%;
  right: 0;
  margin: 0;
  border: 0;
  border-radius: 0;
  box-shadow: none
}

.toggle-handle {
  position: relative;
  margin: 0 auto;
  padding-top: 0px;
  padding-bottom: 0px;
  height: 100%;
  width: 0px;
  border-width: 0;
  background-color: #fff
}

.toggle.btn {
  min-width: 59px;
  min-height: 34px
}

.toggle-on.btn {
  padding-right: 24px
}

.toggle-off.btn {
  padding-left: 24px
}

.toggle.btn-lg,
.btn-group-lg>.toggle.btn {
  min-width: 79px;
  min-height: 45px
}

.toggle-on.btn-lg,
.btn-group-lg>.toggle-on.btn {
  padding-right: 31px
}

.toggle-off.btn-lg,
.btn-group-lg>.toggle-off.btn {
  padding-left: 31px
}

.toggle-handle.btn-lg,
.btn-group-lg>.toggle-handle.btn {
  width: 40px
}

.toggle.btn-sm,
.btn-group-sm>.toggle.btn {
  min-width: 50px;
  min-height: 30px
}

.toggle-on.btn-sm,
.btn-group-sm>.toggle-on.btn {
  padding-right: 20px
}

.toggle-off.btn-sm,
.btn-group-sm>.toggle-off.btn {
  padding-left: 20px
}

.toggle.btn-xs {
  min-width: 45px;
  min-height: 22px
}

.toggle-on.btn-xs {
  padding-right: 12px
}

.toggle-off.btn-xs {
  padding-left: 12px
}

@media only screen and (max-width: 1320px) {
  .header-user-info {
    display: none
  }
}

@media (max-width: 991.98px) {
  .app-main {
    display: block
  }

  .dropdown-menu::before,
  .dropdown-menu::after {
    display: none
  }

  .app-sidebar {
    flex: 0 0 280px !important;
    width: 280px !important;
    transform: translateX(-280px);
    position: fixed
  }

  .app-sidebar .app-header__logo {
    display: none
  }

  .sidebar-mobile-open .app-sidebar {
    transform: translateX(0)
  }

  .sidebar-mobile-open .app-sidebar .app-sidebar__inner .app-sidebar__heading {
    text-indent: initial
  }

  .sidebar-mobile-open .app-sidebar .app-sidebar__inner .app-sidebar__heading::before {
    display: none
  }

  .sidebar-mobile-open .app-sidebar .app-sidebar__inner ul li a {
    text-indent: initial;
    padding: 0 1.5rem 0 45px
  }

  .sidebar-mobile-open .app-sidebar .app-sidebar__inner .metismenu-icon {
    text-indent: initial;
    left: 5px;
    margin-left: 0
  }

  .sidebar-mobile-open .app-sidebar .app-sidebar__inner .metismenu-state-icon {
    visibility: visible
  }

  .sidebar-mobile-open .app-sidebar .app-sidebar__inner ul::before {
    display: block
  }

  .sidebar-mobile-open .app-sidebar .app-sidebar__inner ul ul li a {
    padding-left: 1em
  }

  .sidebar-mobile-open .app-sidebar .app-sidebar__inner ul.mm-show {
    padding: .5em 0 0 2rem
  }

  .sidebar-mobile-open .app-sidebar .app-sidebar__inner ul.mm-show>li>a {
    height: 2rem;
    line-height: 2rem
  }

  .sidebar-mobile-open .app-sidebar .app-header__logo {
    width: auto !important
  }

  .sidebar-mobile-open .app-sidebar .app-header__logo .logo-src {
    width: 97px !important;
    margin-left: auto;
    margin-right: 0
  }

  .sidebar-mobile-open .fixed-sidebar .app-sidebar {
    height: 100%
  }

  .sidebar-mobile-open .sidebar-mobile-overlay {
    display: block
  }

  .app-main .app-main__outer {
    padding-left: 0 !important
  }

  .app-header {
    justify-content: space-between
  }

  .app-header .app-header__logo {
    display: none;
    order: 2;
    background: transparent !important;
    border: 0 !important
  }

  .app-header .app-header__content {
    visibility: hidden;
    opacity: 0;
    box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03);
    position: absolute;
    left: 5%;
    width: 90%;
    top: 0;
    transition: all .2s;
    background: #fff;
    border-radius: 50px;
    padding: 0 10px;
    overflow: hidden
  }

  .app-header .app-header__content .header-btn-lg {
    margin-left: .5rem;
    padding: 0 .5rem
  }

  .app-header .app-header__content .header-btn-lg .hamburger-box {
    margin-top: 5px
  }

  .app-header .app-header__content .header-btn-lg+.header-btn-lg {
    display: none
  }

  .app-header .app-header__content .app-header-left .nav {
    display: none
  }

  .app-header .app-header__content.header-mobile-open {
    visibility: visible;
    opacity: 1;
    top: 80px
  }

  .app-header .app-header__mobile-menu {
    display: flex;
    order: 1
  }

  .app-header .app-header__menu {
    display: flex;
    order: 3
  }

  .app-header.header-text-light .app-header__menu>span .btn,
  .app-header.header-text-light .app-header__menu>.btn {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.1)
  }

  .app-header.header-text-light .header-mobile-open {
    background: #343a40
  }

  .popover,
  .dropdown-menu {
    position: fixed !important;
    z-index: 50;
    left: 5% !important;
    top: 50% !important;
    width: 90% !important;
    transform: translateY(-50%) !important;
    min-width: 10px !important
  }

  .popover .btn-icon-vertical .btn-icon-wrapper,
  .dropdown-menu .btn-icon-vertical .btn-icon-wrapper {
    display: none
  }

  .popover {
    max-width: initial
  }

  .popover .arrow {
    display: none !important
  }

  .app-page-title {
    text-align: center
  }

  .app-page-title .page-title-heading,
  .app-page-title .page-title-wrapper {
    margin: 0 auto;
    display: block
  }

  .app-page-title .page-title-actions {
    margin: 15px auto 0
  }

  .app-page-title .page-title-actions .breadcrumb-item,
  .app-page-title .page-title-actions .breadcrumb,
  .app-page-title .page-title-subheading .breadcrumb-item,
  .app-page-title .page-title-subheading .breadcrumb {
    display: inline-block
  }

  .app-footer .app-footer__inner .app-footer-right {
    display: none
  }

  .app-footer .app-footer__inner .app-footer-left {
    width: 100%
  }

  .app-footer .app-footer__inner .app-footer-left .footer-dots {
    margin: 0 auto
  }

  .widget-content .widget-numbers {
    font-size: 1.6rem;
    line-height: 1
  }

  .slick-slider-sm .slick-slider {
    max-width: 650px !important
  }

  .bg-transparent.list-group-item {
    border-color: transparent
  }

  .tabs-lg-alternate.card-header>.nav .nav-item .widget-number {
    font-size: 1.5rem
  }

  .page-title-head {
    display: block
  }
}

@media (max-width: 991.98px) {

  .app-page-title .page-title-icon,
  .ui-theme-settings {
    display: none
  }

  .card-header.responsive-center {
    display: block;
    text-align: center;
    height: auto;
    padding: 1.5rem
  }

  .card-header.responsive-center .nav,
  .card-header.responsive-center .btn-actions-pane-right {
    margin: .75rem 0 0
  }

  .card-header.responsive-center .nav .d-inline-block.ml-2,
  .card-header.responsive-center .btn-actions-pane-right .d-inline-block.ml-2 {
    width: 100% !important;
    text-align: left;
    margin: 0 !important
  }

  .slick-slider-sm .slick-slider {
    max-width: 650px !important
  }
}

@media (min-width: 992px) {
  .slick-slider-sm .slick-slider {
    max-width: 850px !important
  }
}

@media (max-width: 1199.98px) {
  .-hide-paging .-pagination .-center {
    display: none
  }
}

@media (max-width: 767.98px) {
  .app-main .app-main__inner {
    padding: 15px 15px 0
  }

  .mbg-3,
  body .card.mb-3 {
    margin-bottom: 15px !important
  }

  .app-page-title {
    padding: 15px;
    margin: -15px -15px 15px
  }

  .app-page-title+.body-tabs-layout {
    margin-top: -15px !important
  }

  .body-tabs-line .body-tabs-layout {
    margin-bottom: 15px;
    margin-left: -15px;
    margin-right: -15px;
    padding: 0 15px
  }

  .body-tabs {
    padding: 0 15px;
    display: block
  }

  .body-tabs .nav-item .nav-link {
    margin: 0
  }

  .popover,
  .dropdown-menu {
    width: 80%;
    left: 10%
  }

  body .card-header {
    height: auto;
    display: block;
    padding: .75rem 1.5rem;
    text-align: center
  }

  body .card-header .btn-actions-pane-right {
    padding: .75rem 0 0
  }

  body .card-header .actions-icon-btn {
    padding: 0
  }

  .card-header.card-header-tab .card-header-title {
    display: inline-flex !important;
    line-height: 1
  }

  .card-header.card-header-tab>.nav {
    margin: .75rem 0 -.75rem;
    display: table !important;
    width: 100%
  }

  .card-header.card-header-tab>.nav .nav-item {
    display: table-cell
  }

  .header-icon {
    display: none
  }

  .profile-responsive-sm .dropdown-menu-header .menu-header-content.btn-pane-right,
  .profile-responsive .dropdown-menu-header .menu-header-content.btn-pane-right {
    display: block;
    text-align: center
  }

  .profile-responsive-sm .dropdown-menu-header .menu-header-content.btn-pane-right .avatar-icon-wrapper,
  .profile-responsive .dropdown-menu-header .menu-header-content.btn-pane-right .avatar-icon-wrapper {
    margin-right: 0 !important
  }

  .profile-responsive-sm .dropdown-menu-header .menu-header-content.btn-pane-right .menu-header-btn-pane,
  .profile-responsive .dropdown-menu-header .menu-header-content.btn-pane-right .menu-header-btn-pane {
    margin-top: 1rem
  }

  .slick-slider-sm .slick-slider .slick-prev {
    left: 15px
  }

  .slick-slider-sm .slick-slider .slick-next {
    right: 15px
  }
}

@media only screen and (min-width: 1200px) and (max-width: 1500px) {
  .profile-responsive .dropdown-menu-header .menu-header-content.btn-pane-right {
    display: block;
    text-align: center
  }

  .profile-responsive .dropdown-menu-header .menu-header-content.btn-pane-right .avatar-icon-wrapper {
    margin-right: 0 !important
  }

  .profile-responsive .dropdown-menu-header .menu-header-content.btn-pane-right .menu-header-btn-pane {
    margin-top: 1rem
  }
}

.ui-theme-settings {
  position: fixed;
  z-index: 155;
  right: -30px;
  top: 0;
  height: 100vh;
  transform: translate(500px);
  transition: all .2s;
  box-shadow: -0.46875rem 0 2.1875rem rgba(4, 9, 20, 0.03), -0.9375rem 0 1.40625rem rgba(4, 9, 20, 0.03), -0.25rem 0 0.53125rem rgba(4, 9, 20, 0.05), -0.125rem 0 0.1875rem rgba(4, 9, 20, 0.03)
}

.ui-theme-settings .btn-open-options {
  border-radius: 50px;
  position: absolute;
  left: -114px;
  bottom: 80px;
  padding: 0;
  height: 54px;
  line-height: 54px;
  width: 54px;
  text-align: center;
  display: block;
  box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03);
  margin-top: -27px
}

.ui-theme-settings .btn-open-options svg {
  top: 50%;
  left: 50%;
  position: absolute;
  margin: -0.5em 0 0 -0.5em
}

.ui-theme-settings .theme-settings__inner {
  background: #fff;
  width: 500px;
  height: 100vh;
  padding: 0
}

.ui-theme-settings.settings-open {
  transform: translate(0);
  right: 0
}

.ui-theme-settings .theme-settings-swatches {
  text-align: center
}

.ui-theme-settings .theme-settings-swatches .swatch-holder-img {
  width: 72px;
  height: auto;
  border-radius: 3px
}

.ui-theme-settings .theme-settings-swatches .swatch-holder-img img {
  width: 100%
}

.ui-theme-settings .themeoptions-heading {
  font-size: 1.1rem;
  color: #495057;
  margin: 0;
  background: #f8f9fa;
  padding: .75rem 1.5rem;
  border-bottom: #dee2e6 solid 1px;
  border-top: #dee2e6 solid 1px;
  display: flex;
  align-items: center;
  align-content: center
}

.ui-theme-settings .themeoptions-heading:first-child {
  border-top: 0
}

.ui-theme-settings .list-group-item h5 {
  color: #3f6ad8;
  font-size: .968rem;
  text-transform: uppercase;
  margin: 0;
  text-align: center
}

.swatch-holder {
  width: 24px;
  height: 24px;
  line-height: 24px;
  margin: 5px 5px 0;
  transition: all .2s;
  opacity: .7;
  display: inline-block;
  border-radius: 30px
}

.swatch-holder.active {
  border: #fff solid 2px;
  box-shadow: 0 0 0 5px #3f6ad8;
  opacity: 1
}

.swatch-holder:hover {
  opacity: 1
}

.swatch-holder-lg {
  width: 48px;
  height: 48px;
  line-height: 48px
}

.font-icon-wrapper {
  text-align: center;
  border: #e9ecef solid 1px;
  border-radius: .25rem;
  margin: 0 0 10px;
  padding: 5px
}

.font-icon-wrapper.font-icon-lg {
  float: left;
  padding: 10px;
  text-align: center;
  margin-right: 15px;
  min-width: 64px
}

.font-icon-wrapper.font-icon-lg i {
  font-size: 2.5rem
}

.font-icon-wrapper:hover {
  background: #f8f9fa;
  color: #3f6ad8
}

.font-icon-wrapper:hover p {
  color: #6c757d
}

.font-icon-wrapper i {
  font-size: 1.65rem
}

.font-icon-wrapper p {
  color: #adb5bd;
  font-size: .80667rem;
  margin: 5px 0 0
}

.btn-icon-vertical {
  min-width: 100px
}

.card.mb-3 {
  margin-bottom: 30px !important
}

.demo-image-bg {
  height: 350px;
  margin-bottom: 30px;
  background-size: 100%
}

.loader-wrapper {
  width: 150px;
  height: 100px;
  float: left !important
}

.slider-item {
  background: #dee2e6;
  border-radius: .25rem;
  color: #6c757d;
  font-size: 36px;
  padding: 0;
  position: relative;
  height: 150px;
  line-height: 150px;
  text-align: center;
  margin: 0 1.5rem;
  transition: all .2s
}

.slick-center .slider-item {
  background: #adb5bd;
  color: #495057
}

.after-img {
  max-width: 100%
}

.widget-chart-height{
  height: 190px;
}
.widget-chart-flex.f-z35{
  font-size:35px;
}
.widget-numbers.f-z30{
  font-size:30px;
}


</style>
    <section class="content">
        
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="box">
                    <div class="with-border">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-comments-o"></span>Chat Details</div>
                        </div>
                    </div>
                    <div class="box-body">

                        <div class="row">
                            
                            <div class="app-main__inner">
                    <div class="app-inner-layout chat-layout">
                        <div class="app-inner-layout__header text-white bg-premium-dark">
                            <div class="app-page-title">
                                <div class="page-title-wrapper">
                                    <div class="page-title-heading">
                                        <div class="page-title-icon"><i class="fa fa-comments-o"></i></div>
                                        <div>
                                            Chat
                                            <div class="page-title-subheading">ArchitectUI HTML Bootstrap 4 Dashboard Template</div>
                                        </div>
                                    </div>
                                    <div class="page-title-actions">
                                        <div class="d-inline-block dropdown">
                                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                                                    <span class="btn-icon-wrapper pr-2 opacity-7">
                                                                        <i class="fa fa-business-time fa-w-20"></i>
                                                                    </span>
                                                Buttons
                                            </button>
                                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a href="javascript:void(0);" class="nav-link">
                                                            <i class="nav-link-icon fa fa-inbox"></i>
                                                            <span>
                                                                                    Inbox
                                                                                </span>
                                                            <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="javascript:void(0);" class="nav-link">
                                                            <i class="nav-link-icon fa fa-book"></i>
                                                            <span>
                                                                                    Book
                                                                                </span>
                                                            <div class="ml-auto badge badge-pill badge-danger">5</div>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="javascript:void(0);" class="nav-link">
                                                            <i class="nav-link-icon fa fa-picture-o"></i>
                                                            <span>
                                                                                    Picture
                                                                                </span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a disabled="" href="javascript:void(0);" class="nav-link disabled">
                                                            <i class="nav-link-icon fa fa-file"></i>
                                                            <span>
                                                                                    File Disabled
                                                                                </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="app-inner-layout__wrapper">
						<div class="app-inner-layout__sidebar card">
                                <div class="app-inner-layout__sidebar-header">
                                    <ul class="nav flex-column">
                                        <li class="pt-4 pl-3 pr-3 pb-3 nav-item">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-search"></i>
                                                    </div>
                                                </div>
                                                <input placeholder="Search..." type="text" class="form-control"></div>
                                        </li>
                                        <li class="nav-item-header nav-item"><strong>Friends Online</strong></li>
                                    </ul>
                                </div>
								<div style="height:540px; overflow:scroll; overflow-x:hidden;">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <button type="button" tabindex="0" class="dropdown-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <div class="avatar-icon-wrapper">
                                                            <div class="badge badge-bottom badge-success badge-dot badge-dot-lg"></div>
                                                            <div class="avatar-icon"><img src="http://fab-admin-templates.multipurposethemes.com/fab-admin/images/user5-128x128.jpg" alt=""></div>
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Alina Mcloughlin</div>
                                                        <div class="widget-subheading">Aenean vulputate eleifend tellus.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="button" tabindex="0" class="dropdown-item active">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <div class="avatar-icon-wrapper">
                                                            <div class="badge badge-bottom badge-success badge-dot badge-dot-lg"></div>
                                                            <div class="avatar-icon"><img src="http://fab-admin-templates.multipurposethemes.com/fab-admin/images/user1-128x128.jpg" alt=""></div>
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Chad Evans</div>
                                                        <div class="widget-subheading">Vivamus elementum semper nisi.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="button" tabindex="0" class="dropdown-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <div class="avatar-icon-wrapper">
                                                            <div class="badge badge-bottom badge-success badge-dot badge-dot-lg"></div>
                                                            <div class="avatar-icon"><img src="http://fab-admin-templates.multipurposethemes.com/fab-admin/images/user6-128x128.jpg" alt=""></div>
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Ella-Rose Henry</div>
                                                        <div class="widget-subheading">Etiam sit amet orci eget eros faucibus</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="button" tabindex="0" class="dropdown-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <div class="avatar-icon-wrapper">
                                                            <div class="badge badge-bottom badge-success badge-dot badge-dot-lg"></div>
                                                            <div class="avatar-icon"><img src="http://fab-admin-templates.multipurposethemes.com/fab-admin/images/user3-128x128.jpg" alt=""></div>
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Ruben Tillman</div>
                                                        <div class="widget-subheading">Lorem ipsum dolor sit amet, consectetuer</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="button" tabindex="0" class="dropdown-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <div class="avatar-icon-wrapper">
                                                            <div class="badge badge-bottom badge-success badge-dot badge-dot-lg"></div>
                                                            <div class="avatar-icon"><img src="http://fab-admin-templates.multipurposethemes.com/fab-admin/images/user4-128x128.jpg" alt=""></div>
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Ella-Rose Henry</div>
                                                        <div class="widget-subheading">Etiam sit amet orci eget eros faucibus</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="button" tabindex="0" class="dropdown-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <div class="avatar-icon-wrapper">
                                                            <div class="badge badge-bottom badge-success badge-dot badge-dot-lg"></div>
                                                            <div class="avatar-icon"><img src="http://fab-admin-templates.multipurposethemes.com/fab-admin/images/user5-128x128.jpg" alt=""></div>
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Ruben Tillman</div>
                                                        <div class="widget-subheading">Lorem ipsum dolor sit amet, consectetuer</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </button>
                                    </li>
                                </ul>
								</div>
                                
                            </div>
                            
							<div class="app-inner-layout__content">
                                <div class="table-responsive">
                                    <div class="app-inner-layout__top-pane">
                                        <div class="pane-left">
                                            <div class="mobile-app-menu-btn">
                                                <button type="button" class="hamburger hamburger--elastic">
                                            <span class="hamburger-box">
                                                <span class="hamburger-inner"></span>
                                            </span>
                                                </button>
                                            </div>
                                            <div class="avatar-icon-wrapper mr-2">
                                                <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                <div class="avatar-icon avatar-icon-xl rounded"><img width="82" src="http://fab-admin-templates.multipurposethemes.com/fab-admin/images/user6-128x128.jpg" alt=""></div>
                                            </div>
                                            <h4 class="mb-0 text-nowrap">Chad Evans
                                                <div class="opacity-7">Last Seen Online: <span class="opacity-8">10 minutes ago</span></div>
                                            </h4>
                                        </div>
                                        <div class="pane-right">
										
										
										
                                            <div class="btn-group dropdown">
                                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="ml-2 dropdown-toggle btn btn-primary">
                                            <span>
                                                <i class="fa fa-user"></i>
                                            </span>
                                                   
                                                </button>
                                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item-header nav-item">Activity</li>
                                                        <li class="nav-item"><a href="javascript:void(0);" class="nav-link">Chat
                                                            <div class="ml-auto badge badge-pill badge-info">8</div>
                                                        </a></li>
                                                        <li class="nav-item"><a href="javascript:void(0);" class="nav-link">Recover Password</a></li>
                                                        <li class="nav-item-header nav-item">My Account</li>
                                                        <li class="nav-item"><a href="javascript:void(0);" class="nav-link">Settings
                                                            <div class="ml-auto badge badge-success">New</div>
                                                        </a></li>
                                                        <li class="nav-item"><a href="javascript:void(0);" class="nav-link">Messages
                                                            <div class="ml-auto badge badge-warning">512</div>
                                                        </a></li>
                                                        <li class="nav-item"><a href="javascript:void(0);" class="nav-link">Logs</a></li>
                                                        <li class="nav-item-divider nav-item"></li>
                                                        <li class="nav-item-btn nav-item">
                                                            <button class="btn-wide btn-shadow btn btn-danger btn-sm">Cancel</button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
											
											<i class="fa fa-star ml-3 mr-3"></i> <i class="fa fa-clock-o mr-3"></i> <i class="fa fa-check"></i>
											
                                        </div>
                                    </div>
                                    <div class="chat-wrapper">
                                        <div class="chat-box-wrapper">
                                            <div>
                                                <div class="avatar-icon-wrapper mr-1">
                                                    <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                    <div class="avatar-icon avatar-icon-lg rounded">
                                                        <img src="http://fab-admin-templates.multipurposethemes.com/fab-admin/images/user7-128x128.jpg" alt=""></div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="chat-box">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</div>
                                                <small class="opacity-6">
                                                    <i class="fa fa-calendar-alt mr-1"></i>
                                                    11:01 AM | Yesterday
                                                </small>
                                            </div>
                                        </div>
                                        <div style="float:right; width:100%;">
										<div class="float-right">
                                            <div class="chat-box-wrapper chat-box-wrapper-right">
                                                <div>
                                                    <div class="chat-box">Expound.</div>
                                                    <small class="opacity-6">
                                                        <i class="fa fa-calendar-alt mr-1"></i>
                                                        11:01 AM | Yesterday
                                                    </small>
                                                </div>
                                                <div>
                                                    <div class="avatar-icon-wrapper ml-1">
                                                        <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                        <div class="avatar-icon avatar-icon-lg rounded"><img src="http://fab-admin-templates.multipurposethemes.com/fab-admin/images/user8-128x128.jpg" alt=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										</div>
										<div style="float:right; width:100%;">
										<div class="float-right">
                                            <div class="chat-box-wrapper chat-box-wrapper-right">
                                                <div>
                                                    <div class="chat-box">Expound.</div>
                                                    <small class="opacity-6">
                                                        <i class="fa fa-calendar-alt mr-1"></i>
                                                        11:01 AM | Yesterday
                                                    </small>
                                                </div>
                                                <div>
                                                    <div class="avatar-icon-wrapper ml-1">
                                                        <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                        <div class="avatar-icon avatar-icon-lg rounded"><img src="http://fab-admin-templates.multipurposethemes.com/fab-admin/images/user8-128x128.jpg" alt=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										</div>
										<div style="float:right; width:100%;">
										<div class="float-right">
                                            <div class="chat-box-wrapper chat-box-wrapper-right">
                                                <div>
                                                    <div class="chat-box">Expound.</div>
                                                    <small class="opacity-6">
                                                        <i class="fa fa-calendar-alt mr-1"></i>
                                                        11:01 AM | Yesterday
                                                    </small>
                                                </div>
                                                <div>
                                                    <div class="avatar-icon-wrapper ml-1">
                                                        <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                        <div class="avatar-icon avatar-icon-lg rounded"><img src="http://fab-admin-templates.multipurposethemes.com/fab-admin/images/user8-128x128.jpg" alt=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										</div>
										<div class="chat-box-wrapper">
                                            <div>
                                                <div class="avatar-icon-wrapper mr-1">
                                                    <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                    <div class="avatar-icon avatar-icon-lg rounded">
                                                        <img src="http://fab-admin-templates.multipurposethemes.com/fab-admin/images/user7-128x128.jpg" alt=""></div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="chat-box">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</div>
                                                <small class="opacity-6">
                                                    <i class="fa fa-calendar-alt mr-1"></i>
                                                    11:01 AM | Yesterday
                                                </small>
                                            </div>
                                        </div>
										 <div style="float:right; width:100%;">
										<div class="float-right">
                                            <div class="chat-box-wrapper chat-box-wrapper-right">
                                                <div>
                                                    <div class="chat-box">Expound.</div>
                                                    <small class="opacity-6">
                                                        <i class="fa fa-calendar-alt mr-1"></i>
                                                        11:01 AM | Yesterday
                                                    </small>
                                                </div>
                                                <div>
                                                    <div class="avatar-icon-wrapper ml-1">
                                                        <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                        <div class="avatar-icon avatar-icon-lg rounded"><img src="http://fab-admin-templates.multipurposethemes.com/fab-admin/images/user8-128x128.jpg" alt=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										</div>
										<div style="float:right; width:100%;">
										<div class="float-right">
                                            <div class="chat-box-wrapper chat-box-wrapper-right">
                                                <div>
                                                    <div class="chat-box">Expound.</div>
                                                    <small class="opacity-6">
                                                        <i class="fa fa-calendar-alt mr-1"></i>
                                                        11:01 AM | Yesterday
                                                    </small>
                                                </div>
                                                <div>
                                                    <div class="avatar-icon-wrapper ml-1">
                                                        <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                        <div class="avatar-icon avatar-icon-lg rounded"><img src="http://fab-admin-templates.multipurposethemes.com/fab-admin/images/user8-128x128.jpg" alt=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										</div>
										<div style="float:right; width:100%;">
										<div class="float-right">
                                            <div class="chat-box-wrapper chat-box-wrapper-right">
                                                <div>
                                                    <div class="chat-box">Expound.</div>
                                                    <small class="opacity-6">
                                                        <i class="fa fa-calendar-alt mr-1"></i>
                                                        11:01 AM | Yesterday
                                                    </small>
                                                </div>
                                                <div>
                                                    <div class="avatar-icon-wrapper ml-1">
                                                        <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                        <div class="avatar-icon avatar-icon-lg rounded"><img src="http://fab-admin-templates.multipurposethemes.com/fab-admin/images/user8-128x128.jpg" alt=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										</div>
										<div class="chat-box-wrapper">
                                            <div>
                                                <div class="avatar-icon-wrapper mr-1">
                                                    <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                    <div class="avatar-icon avatar-icon-lg rounded">
                                                        <img src="http://fab-admin-templates.multipurposethemes.com/fab-admin/images/user7-128x128.jpg" alt=""></div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="chat-box">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</div>
                                                <small class="opacity-6">
                                                    <i class="fa fa-calendar-alt mr-1"></i>
                                                    11:01 AM | Yesterday
                                                </small>
                                            </div>
                                        </div>
										 <div style="float:right; width:100%;">
										<div class="float-right">
                                            <div class="chat-box-wrapper chat-box-wrapper-right">
                                                <div>
                                                    <div class="chat-box">Expound.</div>
                                                    <small class="opacity-6">
                                                        <i class="fa fa-calendar-alt mr-1"></i>
                                                        11:01 AM | Yesterday
                                                    </small>
                                                </div>
                                                <div>
                                                    <div class="avatar-icon-wrapper ml-1">
                                                        <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                        <div class="avatar-icon avatar-icon-lg rounded"><img src="http://fab-admin-templates.multipurposethemes.com/fab-admin/images/user8-128x128.jpg" alt=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										</div>
										<div style="float:right; width:100%;">
										<div class="float-right">
                                            <div class="chat-box-wrapper chat-box-wrapper-right">
                                                <div>
                                                    <div class="chat-box">Expound.</div>
                                                    <small class="opacity-6">
                                                        <i class="fa fa-calendar-alt mr-1"></i>
                                                        11:01 AM | Yesterday
                                                    </small>
                                                </div>
                                                <div>
                                                    <div class="avatar-icon-wrapper ml-1">
                                                        <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                        <div class="avatar-icon avatar-icon-lg rounded"><img src="http://fab-admin-templates.multipurposethemes.com/fab-admin/images/user8-128x128.jpg" alt=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										</div>
										<div style="float:right; width:100%;">
										<div class="float-right">
                                            <div class="chat-box-wrapper chat-box-wrapper-right">
                                                <div>
                                                    <div class="chat-box">Expound.</div>
                                                    <small class="opacity-6">
                                                        <i class="fa fa-calendar-alt mr-1"></i>
                                                        11:01 AM | Yesterday
                                                    </small>
                                                </div>
                                                <div>
                                                    <div class="avatar-icon-wrapper ml-1">
                                                        <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                        <div class="avatar-icon avatar-icon-lg rounded"><img src="http://fab-admin-templates.multipurposethemes.com/fab-admin/images/user8-128x128.jpg" alt=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										</div>
										<div class="chat-box-wrapper">
                                            <div>
                                                <div class="avatar-icon-wrapper mr-1">
                                                    <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                    <div class="avatar-icon avatar-icon-lg rounded">
                                                        <img src="http://fab-admin-templates.multipurposethemes.com/fab-admin/images/user7-128x128.jpg" alt=""></div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="chat-box">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</div>
                                                <small class="opacity-6">
                                                    <i class="fa fa-calendar-alt mr-1"></i>
                                                    11:01 AM | Yesterday
                                                </small>
                                            </div>
                                        </div>
										 <div style="float:right; width:100%;">
										<div class="float-right">
                                            <div class="chat-box-wrapper chat-box-wrapper-right">
                                                <div>
                                                    <div class="chat-box">Expound.</div>
                                                    <small class="opacity-6">
                                                        <i class="fa fa-calendar-alt mr-1"></i>
                                                        11:01 AM | Yesterday
                                                    </small>
                                                </div>
                                                <div>
                                                    <div class="avatar-icon-wrapper ml-1">
                                                        <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                        <div class="avatar-icon avatar-icon-lg rounded"><img src="http://fab-admin-templates.multipurposethemes.com/fab-admin/images/user8-128x128.jpg" alt=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										</div>
										<div style="float:right; width:100%;">
										<div class="float-right">
                                            <div class="chat-box-wrapper chat-box-wrapper-right">
                                                <div>
                                                    <div class="chat-box">Expound.</div>
                                                    <small class="opacity-6">
                                                        <i class="fa fa-calendar-alt mr-1"></i>
                                                        11:01 AM | Yesterday
                                                    </small>
                                                </div>
                                                <div>
                                                    <div class="avatar-icon-wrapper ml-1">
                                                        <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                        <div class="avatar-icon avatar-icon-lg rounded"><img src="http://fab-admin-templates.multipurposethemes.com/fab-admin/images/user8-128x128.jpg" alt=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										</div>
										<div style="float:right; width:100%;">
										<div class="float-right">
                                            <div class="chat-box-wrapper chat-box-wrapper-right">
                                                <div>
                                                    <div class="chat-box">Expound.</div>
                                                    <small class="opacity-6">
                                                        <i class="fa fa-calendar-alt mr-1"></i>
                                                        11:01 AM | Yesterday
                                                    </small>
                                                </div>
                                                <div>
                                                    <div class="avatar-icon-wrapper ml-1">
                                                        <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                        <div class="avatar-icon avatar-icon-lg rounded"><img src="http://fab-admin-templates.multipurposethemes.com/fab-admin/images/user8-128x128.jpg" alt=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										</div>
										<div class="chat-box-wrapper">
                                            <div>
                                                <div class="avatar-icon-wrapper mr-1">
                                                    <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                    <div class="avatar-icon avatar-icon-lg rounded">
                                                        <img src="http://fab-admin-templates.multipurposethemes.com/fab-admin/images/user7-128x128.jpg" alt=""></div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="chat-box">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</div>
                                                <small class="opacity-6">
                                                    <i class="fa fa-calendar-alt mr-1"></i>
                                                    11:01 AM | Yesterday
                                                </small>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
							
							<div class="app-inner-layout__sidebar-right">
							
							<div style="height:635px; overflow:scroll; overflow-x:auto; width:100%">
                                            <div class="">
                                                <div class="app-inner-layout__sidebar-header">
                                    <ul class="nav flex-column">
                                        <li class="pt-2 pl-3 pr-3 pb-3 nav-item">
                                            <div class="card-header-tab card-header">
                                        <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                            <i class="header-icon fa fa-user mr-3"> </i>
                                            New User
                                        </div>
                                        <div class="btn-actions-pane-right actions-icon-btn">
                                            <div class="btn-group dropdown">
                                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-icon btn-icon-only btn btn-link">
                                                    <i class="fa fa-bars btn-icon-wrapper"></i>
                                                </button>
                                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-shadow dropdown-menu-hover-link dropdown-menu dropdown-menu-right">
                                                    <button type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon fa fa-inbox"> </i><span>Menus</span></button>
                                                    <button type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon fa fa-cogs"> </i><span>Settings</span></button>
                                                    <button type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon fa fa-book"> </i><span>Actions</span></button>
                                                    <div tabindex="-1" class="dropdown-divider"></div>
                                                    <div class="p-1 text-right">
                                                        <button class="mr-2 btn-shadow btn-sm btn btn-link">View Details</button>
                                                        <button class="mr-2 btn-shadow btn-sm btn btn-primary">Action</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        </li>
										
										<li class="nav-item-header nav-item"><p><i class="fa fa-user pr-3"></i> <strong>Lead</strong></p>
          <p><i class="fa fa-map-marker pr-3"></i> 8:19pm in <span> Lucknow, India</span></p>
          <p><i class="fa fa-podcast pr-3"></i> <strong>IP</strong> <span>123.456.2.655</span></p>
          <p><i class="fa fa-globe pr-3"></i> <strong>Owner</strong> <span>No Owner</span></p>
          <p><i class="fa fa-envelope pr-3"></i> <strong>Email</strong> <span>akumar@usethegeeks.com</span></p>
          <p><i class="fa fa-random pr-3"></i> <strong>User Id</strong> <span>72bcd4f9-fe4f-4292-92ba</span></p>
          <p><i class="fa fa-phone pr-3"></i> <strong>Phone No.</strong> <span>+91 9867542390</span></p>
          <p><i class="fa fa-calendar pr-3"></i> <strong>First Seen</strong> <span>1 Month Ago</span></p>
          <p><i class="fa fa-calendar pr-3"></i> <strong>Last seen</strong> <span>3 Hour Ago</span></p></li>
										
                                    </ul>
									
									<div class="main-card mb-2 mt-2 card">
                        <div class="card-body">
						
						<div class="card-header-tab card-header">
                                        <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                            
                                           Lead notes
                                        </div>
                                        
                                    </div>
									
									<input type="text" class="form-control mt-2" id="firstName5" placeholder="Add a note">
						
						</div></div>
						
						<div class="main-card mb-2 mt-2 card">
                        <div class="card-body">
						<div class="card-header-tab card-header">
                        <div class="card-header-title font-size-lg text-capitalize font-weight-normal">  Lead tags </div>         
                        </div>
						<button class="btn btn-light mt-2">Add Tag</button> 
						</div></div>	
						
						<div class="main-card mb-2 mt-2 card">
                        <div class="card-body">
						<div class="card-header-tab card-header">
                        <div class="card-header-title font-size-lg text-capitalize font-weight-normal">  Recent Page Views</div>         
                        </div>
						<div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
  
  <div class="vertical-timeline-item vertical-timeline-element">
    <div> <span class="vertical-timeline-element-icon bounce-in"> <i class="badge badge-dot badge-dot-xl badge-warning"> </i> </span>
      <div class="vertical-timeline-element-content bounce-in">
        <p><a href="javascript:void(0);">https://www.utgone.com/</a></p>
        <span class="vertical-timeline-element-date">1d</span> </div>
    </div>
  </div>
  <div class="vertical-timeline-item vertical-timeline-element">
    <div> <span class="vertical-timeline-element-icon bounce-in"> <i class="badge badge-dot badge-dot-xl badge-danger"> </i> </span>
      <div class="vertical-timeline-element-content bounce-in">
        <p><a href="javascript:void(0);">https://www.utgone.com/</a></p>
        <span class="vertical-timeline-element-date">3d</span> </div>
    </div>
  </div>
  <div class="vertical-timeline-item vertical-timeline-element">
    <div> <span class="vertical-timeline-element-icon bounce-in"> <i class="badge badge-dot badge-dot-xl badge-primary"> </i> </span>
      <div class="vertical-timeline-element-content bounce-in">
        <p><a href="javascript:void(0);">https://www.utgone.com/</a></p>
        <span class="vertical-timeline-element-date">8d</span> </div>
    </div>
  </div>
  <div class="vertical-timeline-item vertical-timeline-element">
    <div> <span class="vertical-timeline-element-icon bounce-in"> <i class="badge badge-dot badge-dot-xl badge-success"> </i> </span>
      <div class="vertical-timeline-element-content bounce-in">
        <p><a href="javascript:void(0);">https://www.utgone.com/</a></p>
        <span class="vertical-timeline-element-date">11d</span> </div>
    </div>
  </div>
  <div class="vertical-timeline-item vertical-timeline-element">
    <div> <span class="vertical-timeline-element-icon bounce-in"> <i class="badge badge-dot badge-dot-xl badge-warning"> </i> </span>
      <div class="vertical-timeline-element-content bounce-in">
        <p><a href="javascript:void(0);">https://www.utgone.com/</a></p>
        <span class="vertical-timeline-element-date">14d</span> </div>
    </div>
  </div>
  <div class="vertical-timeline-item vertical-timeline-element">
    <div> <span class="vertical-timeline-element-icon bounce-in"> <i class="badge badge-dot badge-dot-xl badge-danger"> </i> </span>
      <div class="vertical-timeline-element-content bounce-in">
        <p><a href="javascript:void(0);">https://www.utgone.com/</a></p>
        <span class="vertical-timeline-element-date">1m</span> </div>
    </div>
  </div>
  <div class="vertical-timeline-item vertical-timeline-element">
    <div> <span class="vertical-timeline-element-icon bounce-in"> <i class="badge badge-dot badge-dot-xl badge-primary"> </i> </span>
      <div class="vertical-timeline-element-content bounce-in">
        <p><a href="javascript:void(0);">https://www.utgone.com/</a></p>
        <span class="vertical-timeline-element-date">1m</span> </div>
    </div>
  </div>
  <div class="vertical-timeline-item vertical-timeline-element">
    <div><span class="vertical-timeline-element-icon bounce-in"><i class="badge badge-dot badge-dot-xl badge-success"> </i></span>
      <div class="vertical-timeline-element-content bounce-in">
       <p><a href="javascript:void(0);">https://www.utgone.com/</a></p>
        <span class="vertical-timeline-element-date">1m</span></div>
    </div>
  </div>
</div>

						</div></div>
							
                        </div>
                                            </div>
                                        </div>
							
                                  </div>
							
                            
							
                        </div>
                    </div>
                </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(function () {
        "use strict";
    })
</script>
