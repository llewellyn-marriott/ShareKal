<?php
SetPageName("Logout");
session_destroy();
DisplayRedirect(2000,$GLOBALS["settings"]["site"]["root"]."/board","You have been logged out successfully");
