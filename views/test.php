<?php
session_start();
echo $admin = $_SESSION['admin'];
echo $org = $_SESSION['organization'];
echo $dept = $_SESSION['department'];
