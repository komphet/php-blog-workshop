<?php
require "../system/config.php";

mysqli_query($conn,"SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';") or die(mysqli_error($conn));
mysqli_query($conn,"SET time_zone = '+07:00';") or die(mysqli_error($conn));
mysqli_query($conn,"CREATE TABLE `blogs` (`id` int(11) NOT NULL,`user_id` int(255) NOT NULL,`title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,`content` text COLLATE utf8_unicode_ci NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;") or die(mysqli_error($conn));
mysqli_query($conn,"CREATE TABLE `users` (`id` int(11) NOT NULL,`username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,`password` text COLLATE utf8_unicode_ci NOT NULL,`email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,`firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,`lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,`created_at` datetime NOT NULL,`updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;") or die(mysqli_error($conn));
mysqli_query($conn,"ALTER TABLE `blogs`  ADD PRIMARY KEY (`id`);") or die(mysqli_error($conn));
mysqli_query($conn,"ALTER TABLE `users`  ADD PRIMARY KEY (`id`);") or die(mysqli_error($conn));
mysqli_query($conn,"ALTER TABLE `blogs`  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;") or die(mysqli_error($conn));
mysqli_query($conn,"ALTER TABLE `users`  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;") or die(mysqli_error($conn));
echo "Migrated!";