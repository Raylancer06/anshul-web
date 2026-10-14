@echo off
title ANUKUL Local WordPress Server
echo ========================================================
echo   ANUKUL Ayur Vastu Harmony Clinic - Local WordPress
echo ========================================================
echo.
echo Site URL:     http://localhost:8000
echo Admin URL:    http://localhost:8000/wp-admin
echo Username:     anukul_admin
echo Password:     anukul_admin_2025
echo.
echo Press Ctrl+C in this terminal to stop the server.
echo.
php -S localhost:8000 -t wordpress wordpress/router.php
pause
