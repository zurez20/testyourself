-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2024 at 07:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ohs`
--

-- --------------------------------------------------------

--
-- Table structure for table `addoncategories`
--

CREATE TABLE `addoncategories` (
  `uid` varchar(255) NOT NULL,
  `categoryUid` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `flag` varchar(255) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addoncategories`
--

INSERT INTO `addoncategories` (`uid`, `categoryUid`, `type`, `name`, `flag`, `createdBy`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
('a80ace74-f756-4127-8bdb-465f9169acc6', '99176263-f96e-45a6-84ec-aa2abf386a12,a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5', 'Radio', 'Cheese', 'Customize', 'Samruddhi Surve', 1, 0, '2024-09-06 01:23:54', '2024-09-24 12:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `addoncategoryitems`
--

CREATE TABLE `addoncategoryitems` (
  `uid` varchar(255) NOT NULL,
  `addonCategoryUid` varchar(255) DEFAULT NULL,
  `customizationUid` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `imgAlt` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `descPrice` decimal(8,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addoncategoryitems`
--

INSERT INTO `addoncategoryitems` (`uid`, `addonCategoryUid`, `customizationUid`, `image`, `imgAlt`, `name`, `price`, `descPrice`, `description`, `weight`, `unit`, `type`, `createdBy`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
('e9dff825-ec1f-4a81-bd1f-4664473cfb72', 'a80ace74-f756-4127-8bdb-465f9169acc6', 'd200c632-c7d2-4fbd-a672-dea2aa59e569', 'media/adminImages/customization/addonCategoryItem/1726849635-image-exps28800_UG143377D12_18_1b_RMS.jpg', 'image_alt', 'Mozilla', 100.00, 90.00, 'Test Description', '100', 'Ml', 'Veg', 'Samruddhi Surve', 1, 0, '2024-09-06 01:30:12', '2024-09-20 10:57:15');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `bannerImg` varchar(255) DEFAULT NULL,
  `bannerImgAlt` varchar(255) DEFAULT NULL,
  `bannerDisplayOn` varchar(255) DEFAULT NULL,
  `redirectToPage` varchar(255) DEFAULT NULL,
  `redirectToPageUid` varchar(255) DEFAULT NULL,
  `onclickType` varchar(255) DEFAULT NULL,
  `finalUrlPath` varchar(255) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`uid`, `name`, `bannerImg`, `bannerImgAlt`, `bannerDisplayOn`, `redirectToPage`, `redirectToPageUid`, `onclickType`, `finalUrlPath`, `startDate`, `endDate`, `sequence`, `createdBy`, `status`, `created_at`, `updated_at`) VALUES
('e7af74d1-c730-42e7-a738-494a8cfc2729', 'Food Banner', 'media/adminImages/other/banner/1726253061-bannerImg-th (3).jpeg', 'img_alt', 'Website', 'Product', NULL, 'InternalUrl', NULL, '2024-09-14', '2024-09-25', 1, 'Samruddhi Surve', 1, '2024-09-13 13:14:21', '2024-09-13 13:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `blogcategories`
--

CREATE TABLE `blogcategories` (
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogcategories`
--

INSERT INTO `blogcategories` (`uid`, `name`, `createdBy`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
('17af4b21-3cfb-482d-aac5-b1fbbd04ea4f', 'Healthy Food', 'Samruddhi Surve', 1, 0, '2024-09-13 12:31:58', '2024-09-13 12:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `uid` varchar(255) NOT NULL,
  `blogCategoryUid` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `subtitle` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `imgAlt` varchar(255) DEFAULT NULL,
  `bannerImage` varchar(255) DEFAULT NULL,
  `bannerImageAlt` varchar(255) DEFAULT NULL,
  `writer` varchar(255) DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL,
  `description1` text DEFAULT NULL,
  `description2` text DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`uid`, `blogCategoryUid`, `title`, `slug`, `subtitle`, `image`, `imgAlt`, `bannerImage`, `bannerImageAlt`, `writer`, `dateTime`, `description1`, `description2`, `createdBy`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
('ad46bc1d-a92d-439a-b015-983648b9f746', '17af4b21-3cfb-482d-aac5-b1fbbd04ea4f', 'In publishing and graphic design, Loram ipsum is a placeholder', 'in-publishing-and-graphic-design-loram-ipsum-is-a-placeholder', 'In publishing and graphic design, Loram ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.', 'media/adminImages/other/blog/1726251831-image-th (2).jpeg', 'img_alt', 'media/adminImages/other/blog/1726251831-bannerImage-th (3).jpeg', 'img_alt', 'Hyplap', '2024-09-13 23:53:00', '<p><span style=\"color: rgb(77, 81, 86); font-family: Roboto, &quot;helvetica neue&quot;, helvetica, arial, sans-serif;\">n publishing and graphic design, Loram ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Loram ipsum may be used as a placeholder before the final copy is available. It is also used to temporarily replace text in a process called greeking, which allows designers to consider the form of a webpage or publicati.</span><br></p>', '<p><span style=\"color: rgb(77, 81, 86); font-family: Roboto, &quot;helvetica neue&quot;, helvetica, arial, sans-serif;\">n publishing and graphic design, Loram ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Loram ipsum may be used as a placeholder before the final copy is available. It is also used to temporarily replace text in a process called greeking, which allows designers to consider the form of a webpage or publicati.</span><br></p>', 'Samruddhi Surve', 1, 0, '2024-09-13 12:53:51', '2024-09-13 12:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cartaddons`
--

CREATE TABLE `cartaddons` (
  `uid` varchar(255) NOT NULL,
  `cartUid` varchar(255) DEFAULT NULL,
  `addonCategoryItemUid` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cartaddons`
--

INSERT INTO `cartaddons` (`uid`, `cartUid`, `addonCategoryItemUid`, `created_at`, `updated_at`) VALUES
('895abdeb-yut6-18cb-8ad7-edc67190a7yh', '645abdeb-aed6-18cb-8ad7-edc25190a7yh', 'e9dff825-ec1f-4a81-bd1f-4664473cfb72', '2024-09-20 19:55:16', '2024-09-20 19:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `uid` varchar(255) NOT NULL,
  `customerUid` varchar(255) DEFAULT NULL,
  `randomKey` varchar(255) DEFAULT NULL,
  `productUid` varchar(255) DEFAULT NULL,
  `variantUid` varchar(255) DEFAULT NULL,
  `customizeUid` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`uid`, `customerUid`, `randomKey`, `productUid`, `variantUid`, `customizeUid`, `type`, `qty`, `created_at`, `updated_at`) VALUES
('645abdeb-aed6-18cb-8ad7-edc25190a7yh', '253abdeb-aed6-43cb-9ad7-edc25190a7ba', NULL, '0737cf58-f31f-49f7-bc5a-c8ff6a6a5728', '8ec06039-8c84-4a98-a4f9-8e92cd057543', 'd200c632-c7d2-4fbd-a672-dea2aa59e569', NULL, 2, '2024-09-20 19:57:24', '2024-09-20 19:57:31'),
('645abdeb-aed6-18cb-8ad7-edc56190a7yh', '673abdeb-aed6-43cb-9rh7-edc26y90a6yh', NULL, '0737cf58-f31f-49f7-bc5a-c8ff6a6a5728', '8ec06039-8c84-4a98-a4f9-8e92cd057543', 'd200c632-c7d2-4fbd-a672-dea2aa59e569', NULL, 2, '2024-09-20 19:57:24', '2024-09-20 19:57:31'),
('645abdeb-aed6-18cb-8ad7-eyuc25190a7yh', '253abdeb-aed6-43cb-9ad7-edc25190a7ba', NULL, '0737cf58-f31f-49f7-bc5a-c8ff6a6a5728', 'd520631d-4cdf-4a4b-a3cf-e96f3970a71a', 'd200c632-c7d2-4fbd-a672-dea2aa59e569', NULL, 2, '2024-09-20 19:57:24', '2024-09-20 19:57:31');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `imageAlt` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`uid`, `name`, `slug`, `image`, `imageAlt`, `description`, `createdBy`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
('4cc14995-40b2-4e51-ba97-fa5396009c95', 'Sandwich', 'sandwich', 'media/adminImages/product/category/1729491776-image-th (4).jpeg', NULL, 'Healthy Food', 'Samruddhi Surve', 1, 0, '2024-09-23 11:30:08', '2024-10-21 06:22:57'),
('7c3ba380-9d45-423d-972e-0764570d2dac', NULL, '', NULL, NULL, NULL, 'Samruddhi Surve', 1, 1, '2024-10-15 13:04:04', '2024-10-15 13:04:09'),
('99176263-f96e-45a6-84ec-aa2abf386a12', 'Pizza', 'pizza', 'media/adminImages/product/category/1729491700-image-th.jpeg', NULL, 'Test category description', 'Samruddhi Surve', 1, 0, '2024-09-02 08:45:50', '2024-10-21 06:21:40'),
('a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5', 'Burger', 'burger', 'media/adminImages/product/category/1729491683-image-th (2).jpeg', NULL, 'Burger category test description', 'Samruddhi Surve', 1, 0, '2024-09-02 08:52:30', '2024-10-21 06:21:25'),
('aeaf3977-82fa-4661-a31a-a872da19e789', 'Burgerr', 'burgerr', NULL, NULL, NULL, 'Samruddhi Surve', 1, 1, '2024-10-15 13:03:55', '2024-10-15 13:04:00'),
('e99e7430-9a84-47f2-a51d-48e27dcdd103', 'Wrap', 'wrap', 'media/adminImages/product/category/1729492164-image-exps105667__SD143206B04_02_6b.jpg', NULL, NULL, 'Samruddhi Surve', 1, 0, '2024-10-21 06:06:16', '2024-10-21 06:29:24');

-- --------------------------------------------------------

--
-- Table structure for table `combos`
--

CREATE TABLE `combos` (
  `uid` varchar(255) NOT NULL,
  `coverImage` varchar(255) DEFAULT NULL,
  `imgAlt` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `productUid` varchar(255) DEFAULT NULL,
  `descPrice` decimal(8,2) DEFAULT NULL,
  `descPercentage` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `combos`
--

INSERT INTO `combos` (`uid`, `coverImage`, `imgAlt`, `name`, `price`, `productUid`, `descPrice`, `descPercentage`, `count`, `description`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
('7b6554e8-7e95-48cf-ba8a-1ef93be06074', 'media/adminImages/customization/combo/1726851066-coverImage-image_1634391949017_Two_Loaded_Non-Veg_Medium_Pizza_Combo.avif', 'img_alt', 'Order Two Loaded Medium Pizza Combo', 999.00, '0737cf58-f31f-49f7-bc5a-c8ff6a6a5728,3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2', 899.10, 10, 2, 'In publishing and graphic design, Loram ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Loram ipsum may be used as a placeholder before the final', 1, 0, '2024-09-20 11:21:06', '2024-09-20 11:34:53');

-- --------------------------------------------------------

--
-- Table structure for table `couponlogs`
--

CREATE TABLE `couponlogs` (
  `uid` varchar(255) NOT NULL,
  `customerUid` varchar(255) DEFAULT NULL,
  `trxUid` varchar(255) DEFAULT NULL,
  `couponUid` varchar(255) DEFAULT NULL,
  `couponName` varchar(255) DEFAULT NULL,
  `discountPrice` decimal(8,2) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `couponValue` decimal(8,2) DEFAULT NULL,
  `usedDateTime` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `discountType` varchar(255) DEFAULT NULL,
  `discountPrice` decimal(8,2) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `startTime` time DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `endTime` date DEFAULT NULL,
  `maxDiscountPrice` decimal(8,2) DEFAULT NULL,
  `minCartPrice` decimal(8,2) DEFAULT NULL,
  `customerUid` varchar(255) DEFAULT NULL,
  `newUserFlag` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `termAndCondition` text DEFAULT NULL,
  `visibility` varchar(255) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customeraddresses`
--

CREATE TABLE `customeraddresses` (
  `uid` varchar(255) NOT NULL,
  `customerUid` varchar(255) DEFAULT NULL,
  `cityId` varchar(255) DEFAULT NULL,
  `stateId` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `long` varchar(255) DEFAULT NULL,
  `placeId` varchar(255) DEFAULT NULL,
  `googleAddress` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `otherType` varchar(255) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customeraddresses`
--

INSERT INTO `customeraddresses` (`uid`, `customerUid`, `cityId`, `stateId`, `pincode`, `address1`, `address2`, `lat`, `long`, `placeId`, `googleAddress`, `phone`, `name`, `type`, `otherType`, `createdBy`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
('254a998c-e350-4d9d-84f3-eb221e5821ca', '253abdeb-aed6-43cb-9ad7-edc25190a7ba', 'Vashi', 'Maharashtra', '400703', 'HYPLAP IT SOLUTION PVT LTD', 'Sector 30A', '19.0657308', '72.9991051', 'ChIJxVURTcHp5zsR1Ge4SljE8RI', '701, Haware Infotech Park, Sector 30A, Vashi, Navi Mumbai, Maharashtra 400703, India', '9987767676', 'Shrutika Patil', 'Office', NULL, 'Samruddhi Surve', 1, 0, '2024-09-13 11:30:45', '2024-09-13 11:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `uid` varchar(255) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `createdBy` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`uid`, `fname`, `lname`, `email`, `phone`, `dateOfBirth`, `gender`, `status`, `deleteId`, `createdBy`, `created_at`, `updated_at`) VALUES
('253abdeb-aed6-43cb-9ad7-edc25190a7ba', 'Shrutika', 'Patil', 'shrutika@gmail.com', '9987767676', '2001-06-23', 'Female', 1, 0, 'Samruddhi Surve', '2024-09-13 11:30:45', '2024-09-13 11:30:45'),
('673abdeb-aed6-43cb-9rh7-edc26y90a6yh', 'Rahul', 'Sawant', 'rahul@gmail.com', '9987765467', '2001-04-21', 'Male', 1, 0, 'Samruddhi Surve', '2024-09-13 11:30:45', '2024-09-13 11:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `customizations`
--

CREATE TABLE `customizations` (
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `groupName` varchar(255) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customizations`
--

INSERT INTO `customizations` (`uid`, `name`, `type`, `groupName`, `createdBy`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
('d200c632-c7d2-4fbd-a672-dea2aa59e569', 'Test Customization', 'Radio', 'Test Group Name', 'Samruddhi Surve', 1, 0, '2024-09-20 10:45:09', '2024-09-20 10:46:02'),
('fb548df7-a9d3-4315-9536-0e2e477bb890', 'Customization', 'Checkbox', NULL, 'Samruddhi Surve', 1, 0, '2024-10-15 13:19:27', '2024-10-15 13:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `customize`
--

CREATE TABLE `customize` (
  `uid` varchar(255) NOT NULL,
  `customerUid` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customizeproducts`
--

CREATE TABLE `customizeproducts` (
  `uid` varchar(255) NOT NULL,
  `addonCategoryUid` varchar(255) DEFAULT NULL,
  `addonCategoryItemUid` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `adminRemark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `uid` varchar(255) NOT NULL,
  `question` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`uid`, `question`, `answer`, `sequence`, `createdBy`, `status`, `created_at`, `updated_at`) VALUES
('53b76fb9-b6b1-449d-a119-09a03426cad5', 'In publishing and graphic design, Loram ipsum ?', 'In publishing and graphic design, Loram ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Loram ipsum may be used as a placeholder before the final copy is available. It is also used to temporarily replace text in a process called greeking, which allows designers to consider the form of a webpage or', 1, 'Samruddhi Surve', 1, '2024-09-13 12:18:26', '2024-09-13 12:18:26');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `uid` varchar(255) NOT NULL,
  `userUid` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `function` varchar(255) DEFAULT NULL,
  `data` text DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`uid`, `userUid`, `action`, `function`, `data`, `ip`, `created_at`, `updated_at`) VALUES
('03b79445-3ecd-412e-b729-1fe778adb00f', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Add', 'updateAddonCategory', '{\"uid\":\"a80ace74-f756-4127-8bdb-465f9169acc6\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"type\":\"Radio\",\"name\":\"Cheese\",\"flag\":\"Customize\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-06T06:53:54.000000Z\",\"updated_at\":\"2024-09-06T06:54:34.000000Z\"}', '127.0.0.1', '2024-09-06 01:24:34', '2024-09-06 01:24:34'),
('04bd63d9-adc7-4ac8-80ab-148cc97e1d91', 'Samruddhi Surve', 'Update', 'updateOutlet', '{\"uid\":\"5d048c91-f444-406b-8fd2-0b5f436a0f2d\",\"name\":\"Nerul Outlet\",\"type\":\"Outlet\",\"cityId\":\"Nerul\",\"stateId\":\"21\",\"pincode\":\"400706\",\"areaRadius\":\"400 Sq Ft\",\"address1\":\"Nerul West\",\"address2\":\"Nerul West\",\"lat\":\"19.0363194\",\"long\":\"73.0154376\",\"placeId\":\"ChIJhz2evenD5zsRNVKVwEsD87I\",\"googleAddress\":\"Nerul West, Nerul, Navi Mumbai, Maharashtra 400706, India\",\"contactFname\":\"Rahul\",\"contactLname\":\"Patil\",\"contactPhone\":\"8787878787\",\"contactEmail\":\"rahul@gmail.com\",\"fassaiNo\":\"12334567678765\",\"invoicePrefix\":\"NU\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-13T10:58:39.000000Z\",\"updated_at\":\"2024-10-15T12:44:44.000000Z\"}', '127.0.0.1', '2024-10-15 12:44:46', '2024-10-15 12:44:46'),
('06d84779-b149-40fd-b617-e8e37a356f71', 'Samruddhi Surve', 'Update', 'updateCategory', '{\"uid\":\"4cc14995-40b2-4e51-ba97-fa5396009c95\",\"name\":\"Sandwich\",\"slug\":\"sandwich\",\"image\":null,\"imageAlt\":null,\"description\":\"Healthy Food\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-23T11:30:08.000000Z\",\"updated_at\":\"2024-09-23T11:30:08.000000Z\"}', '127.0.0.1', '2024-10-15 13:02:37', '2024-10-15 13:02:37'),
('09c3c02f-eb5f-4e52-b3ec-72db43c49333', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Add', 'addCustomer', '{\"uid\":\"aedd9077-ca33-4920-ba05-51dc298fcf0d\",\"fname\":\"Shrutika\",\"lname\":\"Patil\",\"email\":\"shrutika@gmail.com\",\"phone\":\"9876543215\",\"gender\":\"Female\",\"dateOfBirth\":\"0001-09-04\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"updated_at\":\"2024-09-04T07:37:23.000000Z\",\"created_at\":\"2024-09-04T07:37:23.000000Z\"}', '127.0.0.1', '2024-09-04 02:07:23', '2024-09-04 02:07:23'),
('0aa136bf-5454-46eb-931e-6cb619d76300', 'Samruddhi Surve', 'Update', 'updateCustomerAddress', '{\"uid\":\"254a998c-e350-4d9d-84f3-eb221e5821ca\",\"customerUid\":\"253abdeb-aed6-43cb-9ad7-edc25190a7ba\",\"cityId\":\"Vashi\",\"stateId\":\"Maharashtra\",\"pincode\":\"400703\",\"address1\":\"HYPLAP IT SOLUTION PVT LTD\",\"address2\":\"Sector 30A\",\"lat\":\"19.0657308\",\"long\":\"72.9991051\",\"placeId\":\"ChIJxVURTcHp5zsR1Ge4SljE8RI\",\"googleAddress\":\"701, Haware Infotech Park, Sector 30A, Vashi, Navi Mumbai, Maharashtra 400703, India\",\"phone\":\"9987767676\",\"name\":\"Shrutika Patil\",\"type\":\"Office\",\"otherType\":null,\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-13T11:30:45.000000Z\",\"updated_at\":\"2024-09-13T11:30:45.000000Z\"}', '127.0.0.1', '2024-09-24 13:35:27', '2024-09-24 13:35:27'),
('0ca34595-5bf6-472b-b796-346475130f90', NULL, 'Add', 'addOutlet', '{\"uid\":\"5d048c91-f444-406b-8fd2-0b5f436a0f2d\",\"name\":\"Nerul Outlet\",\"type\":\"Outlet\",\"cityId\":\"Nerul\",\"stateId\":\"Maharashtra\",\"pincode\":\"400706\",\"areaRadius\":\"400 Sq Ft\",\"address1\":\"Nerul West\",\"address2\":\"Nerul West\",\"lat\":\"19.0363194\",\"long\":\"73.0154376\",\"placeId\":null,\"googleAddress\":\"Nerul West, Nerul, Navi Mumbai, Maharashtra 400706, India\",\"contactFname\":\"Rahul\",\"contactLname\":\"Patil\",\"contactPhone\":\"8787878787\",\"contactEmail\":\"rahul@gmail.com\",\"fassaiNo\":\"12334567678765\",\"invoicePrefix\":\"NU\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-13T16:28:39.000000Z\",\"updated_at\":\"2024-09-13T16:36:54.000000Z\"}', '127.0.0.1', '2024-09-13 11:06:54', '2024-09-13 11:06:54'),
('0d0fa214-48e2-47ea-b4ca-5b9c851b8b5e', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725792239-image-exps28800_UG143377D12_18_1b_RMS.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:43:59.000000Z\"}', '127.0.0.1', '2024-09-08 05:49:03', '2024-09-08 05:49:03'),
('0dec8d25-b0fa-4b51-a43a-8660167ea584', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725792239-image-exps28800_UG143377D12_18_1b_RMS.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:43:59.000000Z\"}', '127.0.0.1', '2024-09-08 05:47:00', '2024-09-08 05:47:00'),
('0e8c3c37-2d74-4e2f-a7b4-18a1c838479a', 'Samruddhi Surve', 'Add', 'addBanner', '{\"uid\":\"e7af74d1-c730-42e7-a738-494a8cfc2729\",\"bannerImg\":\"media\\/adminImages\\/other\\/banner\\/1726253061-bannerImg-th (3).jpeg\",\"bannerImgAlt\":\"img_alt\",\"name\":\"Food Banner\",\"bannerDisplayOn\":\"Website\",\"onClickType\":\"InternalUrl\",\"finalUrlPath\":null,\"redirectToPage\":\"Product\",\"redirectToPageUid\":null,\"startDate\":\"2024-09-14\",\"endDate\":\"2024-09-25\",\"sequence\":\"1\",\"status\":\"1\",\"createdBy\":\"Samruddhi Surve\",\"updated_at\":\"2024-09-13T18:44:21.000000Z\",\"created_at\":\"2024-09-13T18:44:21.000000Z\"}', '127.0.0.1', '2024-09-13 13:14:21', '2024-09-13 13:14:21'),
('0e9d78bd-7865-4eec-ab06-d8927bc2f3ec', 'Samruddhi Surve', 'Update', 'updateCategory', '{\"uid\":\"4cc14995-40b2-4e51-ba97-fa5396009c95\",\"name\":\"Sandwich\",\"slug\":\"sandwich\",\"image\":null,\"imageAlt\":null,\"description\":\"Healthy Food\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-23T11:30:08.000000Z\",\"updated_at\":\"2024-09-23T11:30:08.000000Z\"}', '127.0.0.1', '2024-10-15 13:02:27', '2024-10-15 13:02:27'),
('1044dc80-880b-4caa-8414-9a41b2d51c9c', 'Samruddhi Surve', 'Update', 'updateProduct', '{\"uid\":\"0737cf58-f31f-49f7-bc5a-c8ff6a6a5728\",\"categoryUid\":\"99176263-f96e-45a6-84ec-aa2abf386a12\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Chicken Cheese Pizza\",\"slug\":\"chicken-cheese-pizza\",\"price\":\"500.00\",\"disPercent\":\"20\",\"disPrice\":\"400.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1726303659-image-th.jpeg\",\"imageAlt\":\"img_alt\",\"itemCode\":\"PRO567\",\"description\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"tag\":\"20 % OFF\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-14T08:47:39.000000Z\",\"updated_at\":\"2024-09-14T09:15:38.000000Z\"}', '127.0.0.1', '2024-09-14 03:50:17', '2024-09-14 03:50:17'),
('106dda49-9fb7-4a72-b906-5c3d0b545615', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725792239-image-exps28800_UG143377D12_18_1b_RMS.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:43:59.000000Z\"}', '127.0.0.1', '2024-09-08 05:25:57', '2024-09-08 05:25:57'),
('11fcf02b-aa4a-4d3a-96b0-aa920e7205ed', NULL, 'Add', 'updateOutlet', '{\"uid\":\"5d048c91-f444-406b-8fd2-0b5f436a0f2d\",\"name\":\"Nerul Outlet\",\"type\":\"Outlet\",\"cityId\":\"Nerul\",\"stateId\":\"Maharashtra\",\"pincode\":\"400706\",\"areaRadius\":\"400 Sq Ft\",\"address1\":\"Nerul West\",\"address2\":\"Nerul West\",\"lat\":\"19.0363194\",\"long\":\"73.0154376\",\"placeId\":null,\"googleAddress\":\"Nerul West, Nerul, Navi Mumbai, Maharashtra 400706, India\",\"contactFname\":\"Rahul\",\"contactLname\":\"Patil\",\"contactPhone\":\"8787878787\",\"contactEmail\":\"rahul@gmail.com\",\"fassaiNo\":\"12334567678765\",\"invoicePrefix\":\"NU\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-13T16:28:39.000000Z\",\"updated_at\":\"2024-09-13T16:36:54.000000Z\"}', '127.0.0.1', '2024-09-13 11:18:26', '2024-09-13 11:18:26'),
('122b2877-cad2-4d82-b558-39ecee558757', 'Samruddhi Surve', 'Update', 'updateCustomization', '{\"uid\":\"d200c632-c7d2-4fbd-a672-dea2aa59e569\",\"name\":\"Test Customizationu\",\"type\":\"Radio\",\"groupName\":\"Test Group Nameu\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"0\",\"deleteId\":0,\"created_at\":\"2024-09-20T16:15:09.000000Z\",\"updated_at\":\"2024-09-20T16:15:24.000000Z\"}', '127.0.0.1', '2024-09-20 10:45:24', '2024-09-20 10:45:24'),
('122ebef8-747d-42b6-9158-32ad730cf9be', 'Samruddhi Surve', 'Update', 'updateProduct', '{\"uid\":\"0737cf58-f31f-49f7-bc5a-c8ff6a6a5728\",\"categoryUid\":\"99176263-f96e-45a6-84ec-aa2abf386a12\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Chicken Cheese Pizza\",\"slug\":\"chicken-cheese-pizza\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1726303659-image-th.jpeg\",\"imageAlt\":\"img_alt\",\"itemCode\":\"PRO567\",\"description\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"tag\":\"20 % OFF\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-14T03:17:39.000000Z\",\"updated_at\":\"2024-09-14T03:45:38.000000Z\"}', '127.0.0.1', '2024-09-25 05:20:08', '2024-09-25 05:20:08'),
('12b156e8-3786-4906-973f-2a778594418c', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateCategory', '{\"uid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"name\":\"Burger\",\"slug\":\"burger\",\"image\":null,\"imageAlt\":null,\"description\":\"Burger category test description\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-02T14:22:30.000000Z\",\"updated_at\":\"2024-09-02T14:22:30.000000Z\"}', '127.0.0.1', '2024-09-06 18:19:20', '2024-09-06 18:19:20'),
('1537e1ab-31d7-4570-9363-62ca2170ed86', 'Samruddhi Surve', 'Delete', 'deleteFaq', '1', '127.0.0.1', '2024-09-13 12:16:58', '2024-09-13 12:16:58'),
('155b703b-e679-4246-95e5-e4e57c86fa1c', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725792239-image-exps28800_UG143377D12_18_1b_RMS.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:43:59.000000Z\"}', '127.0.0.1', '2024-09-08 05:58:16', '2024-09-08 05:58:16'),
('17914aa8-be56-474c-a125-f752fe9c527f', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Add', 'addInfluencerVideo', '{\"uid\":\"5bb2d62b-850c-4700-aa86-0352f3f1ff90\",\"videoPath\":\"media\\/adminImages\\/product\\/category\\/1725665535-videoPath-big_buck_bunny_720p_1mb.mp4\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"sequence\":\"1\",\"productUid\":\"357d105a-e4b8-4bb7-bf7c-e6b51cec3731\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"updated_at\":\"2024-09-06T23:32:15.000000Z\",\"created_at\":\"2024-09-06T23:32:15.000000Z\"}', '127.0.0.1', '2024-09-06 18:02:15', '2024-09-06 18:02:15'),
('1843326e-283e-496a-872f-ea81d3373c32', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateUser', '{\"id\":1,\"uid\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"outletUid\":\"Test\",\"profileImage\":null,\"profileImageAlt\":null,\"fname\":\"Samruddhi\",\"lname\":\"Surve\",\"slug\":\"samruddhi-surve\",\"email\":\"sam@gmail.com\",\"phone\":\"9876543210\",\"role\":\"hyplap\",\"empNo\":\"EMP1805\",\"influencerTag\":null,\"influencerBio\":null,\"influencerFbLink\":null,\"influencerInstaLink\":null,\"influencerYoutubeLink\":null,\"influencerWebsiteLink\":null,\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-08-30T21:21:20.000000Z\",\"updated_at\":\"2024-09-06T05:42:46.000000Z\"}', '127.0.0.1', '2024-09-06 00:12:46', '2024-09-06 00:12:46'),
('18525c4b-feb8-4b49-af96-414784a3b740', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Delete', 'deleteInfluencerVideo', '1', '127.0.0.1', '2024-09-06 17:58:26', '2024-09-06 17:58:26'),
('187491b7-6e8c-4e3b-98ee-5b41aff3693c', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Add', 'addInfluencer', '{\"uid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"profileImage\":\"media\\/adminImages\\/influencers\\/1725642787-profileImage-student2.jpg\",\"profileImageAlt\":\"Influencer Profile Image\",\"fname\":\"Mansi\",\"lname\":\"Surve\",\"slug\":\"mansi-surve\",\"email\":\"mansi@gmail.com\",\"phone\":\"9889787878\",\"role\":\"influencer\",\"empNo\":\"EMP789\",\"influencerTag\":null,\"influencerBio\":\"n publishing and graphic design, Loram ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Loram ipsum may be used as a placeholder before the final copy is available. It is also used to temporarily replace text in a process called greeking,\",\"influencerFbLink\":\"https:\\/\\/www.facebook.com\\/mansi\",\"influencerInstaLink\":\"https:\\/\\/www.instagram.com\\/mansi\",\"influencerYoutubeLink\":null,\"influencerWebsiteLink\":\"https:\\/\\/www.example.com\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"updated_at\":\"2024-09-06T17:13:07.000000Z\",\"created_at\":\"2024-09-06T17:13:07.000000Z\"}', '127.0.0.1', '2024-09-06 11:43:07', '2024-09-06 11:43:07'),
('1ada277a-e761-4f38-8db0-a2aa6dc00c90', 'Samruddhi Surve', 'Add', 'addFaq', '{\"uid\":\"53b76fb9-b6b1-449d-a119-09a03426cad5\",\"question\":\"In publishing and graphic design, Loram ipsum ?\",\"answer\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Loram ipsum may be used as a placeholder before the final copy is available. It is also used to temporarily replace text in a process called greeking, which allows designers to consider the form of a webpage or\",\"sequence\":\"1\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"updated_at\":\"2024-09-13T17:48:26.000000Z\",\"created_at\":\"2024-09-13T17:48:26.000000Z\"}', '127.0.0.1', '2024-09-13 12:18:26', '2024-09-13 12:18:26'),
('1db570f0-1da2-4940-92e8-ec36bf22c343', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725792239-image-exps28800_UG143377D12_18_1b_RMS.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:43:59.000000Z\"}', '127.0.0.1', '2024-09-08 05:38:26', '2024-09-08 05:38:26'),
('1e210b9c-224c-4129-a2f2-2e13b289374c', 'Samruddhi Surve', 'Update', 'updateBlogCategory', '{\"uid\":\"17af4b21-3cfb-482d-aac5-b1fbbd04ea4f\",\"name\":\"Healthy FoodH\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"0\",\"deleteId\":0,\"created_at\":\"2024-09-13T18:01:58.000000Z\",\"updated_at\":\"2024-09-13T18:02:32.000000Z\"}', '127.0.0.1', '2024-09-13 12:32:32', '2024-09-13 12:32:32'),
('200865f7-1ebb-4be3-83a3-ccac4c017877', 'Samruddhi Surve', 'Update', 'updateProduct', '{\"uid\":\"0737cf58-f31f-49f7-bc5a-c8ff6a6a5728\",\"categoryUid\":\"99176263-f96e-45a6-84ec-aa2abf386a12\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Chicken Cheese Pizza\",\"slug\":\"chicken-cheese-pizza\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1726303659-image-th.jpeg\",\"imageAlt\":\"img_alt\",\"itemCode\":\"PRO567\",\"description\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"tag\":\"20 % OFF\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-14T03:17:39.000000Z\",\"updated_at\":\"2024-09-14T03:45:38.000000Z\"}', '127.0.0.1', '2024-09-25 06:54:51', '2024-09-25 06:54:51'),
('207902bc-66cb-4565-a9e1-681beae85b26', 'Samruddhi Surve', 'Add', 'addPincode', '{\"uid\":\"cf8da4b9-fb51-4f47-be5e-5f8ef67b1c7b\",\"pincode\":\"400706\",\"createdBy\":\"Samruddhi Surve\",\"updated_at\":\"2024-09-13T17:30:12.000000Z\",\"created_at\":\"2024-09-13T17:30:12.000000Z\"}', '127.0.0.1', '2024-09-13 12:00:12', '2024-09-13 12:00:12'),
('20d9774e-7b8b-451d-b6b6-4137731d07a2', NULL, 'Add', 'addOutlet', '{\"uid\":\"5d048c91-f444-406b-8fd2-0b5f436a0f2d\",\"name\":\"Nerul Outlet\",\"type\":\"Outlet\",\"cityId\":\"Nerul\",\"stateId\":\"Maharashtra\",\"pincode\":\"400706\",\"address1\":\"Nerul West\",\"address2\":\"Nerul West\",\"lat\":\"19.0363194\",\"long\":\"73.0154376\",\"placeId\":\"ChIJhz2evenD5zsRNVKVwEsD87I\",\"googleAddress\":\"Nerul West, Nerul, Navi Mumbai, Maharashtra 400706, India\",\"contactFname\":\"Rahul\",\"contactLname\":\"Patil\",\"contactPhone\":\"8787878787\",\"contactEmail\":\"rahul@gmail.com\",\"areaRadius\":\"400 Sq Ft\",\"fassaiNo\":\"12334567678765\",\"invoicePrefix\":\"NU\",\"createdBy\":null,\"status\":\"1\",\"updated_at\":\"2024-09-13T16:28:39.000000Z\",\"created_at\":\"2024-09-13T16:28:39.000000Z\"}', '127.0.0.1', '2024-09-13 10:58:39', '2024-09-13 10:58:39'),
('22ab0c53-e9f3-4c81-863a-6523c6054388', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateUser', '{\"id\":1,\"uid\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"outletUid\":\"1d1f8cfe-c444-67h1-abed-5430254c249d\",\"profileImage\":null,\"profileImageAlt\":null,\"fname\":\"Samruddhi\",\"lname\":\"Surve\",\"slug\":\"samruddhi-surve\",\"email\":\"sam@gmail.com\",\"phone\":\"9876543210\",\"role\":\"hyplap\",\"empNo\":\"EMP1805\",\"influencerTag\":null,\"influencerBio\":null,\"influencerFbLink\":null,\"influencerInstaLink\":null,\"influencerYoutubeLink\":null,\"influencerWebsiteLink\":null,\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-08-30T21:21:20.000000Z\",\"updated_at\":\"2024-09-06T05:44:06.000000Z\"}', '127.0.0.1', '2024-09-06 00:14:06', '2024-09-06 00:14:06'),
('25814b87-d050-4db0-b4ab-57875bae0696', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725791404-image-pizza.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:30:04.000000Z\"}', '127.0.0.1', '2024-09-08 05:06:05', '2024-09-08 05:06:05'),
('26316c02-0373-4db9-a2a0-36505a3bf119', 'Samruddhi Surve', 'Update', 'updateRole', '{\"uid\":\"af0fbca5-9a05-4937-981e-6b625768201c\",\"name\":\"Super Admin\",\"slug\":\"super-admin\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-10-21T05:53:17.000000Z\",\"updated_at\":\"2024-10-21T05:55:04.000000Z\"}', '127.0.0.1', '2024-10-21 05:55:04', '2024-10-21 05:55:04'),
('27477dea-af7b-4a6f-b536-55bb8fc390f3', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Add', 'addInfluencerVideo', '{\"uid\":\"940c6a07-6326-4fa4-b5e9-55bf1855bf3c\",\"videoPath\":null,\"influencerUid\":null,\"sequence\":null,\"productUid\":\"357d105a-e4b8-4bb7-bf7c-e6b51cec3731\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"updated_at\":\"2024-09-06T23:04:24.000000Z\",\"created_at\":\"2024-09-06T23:04:24.000000Z\"}', '127.0.0.1', '2024-09-06 17:34:24', '2024-09-06 17:34:24'),
('27a5ac0f-8dc5-4468-8a06-39a78d5ed179', 'Samruddhi Surve', 'Add', 'addWallethistory', '{\"uid\":\"09e2a3d6-31b4-4209-91ae-b80512f9ab08\",\"customerUid\":\"253abdeb-aed6-43cb-9ad7-edc25190a7ba\",\"adminRemark\":null,\"amount\":\"200\",\"type\":\"Debit\",\"flag\":\"admin\",\"createdBy\":\"Samruddhi Surve\",\"updated_at\":\"2024-09-13T17:13:44.000000Z\",\"created_at\":\"2024-09-13T17:13:44.000000Z\"}', '127.0.0.1', '2024-09-13 11:43:44', '2024-09-13 11:43:44'),
('281c0c2a-a255-483a-b604-a7059617c6a6', 'Samruddhi Surve', 'Add', 'addWallethistory', '{\"uid\":\"4b81c9bb-3761-4bd7-8555-da02ab8fddc3\",\"customerUid\":\"253abdeb-aed6-43cb-9ad7-edc25190a7ba\",\"adminRemark\":\"Test Remark\",\"amount\":\"1000\",\"type\":\"Credit\",\"flag\":\"admin\",\"createdBy\":\"Samruddhi Surve\",\"updated_at\":\"2024-09-13T17:13:31.000000Z\",\"created_at\":\"2024-09-13T17:13:31.000000Z\"}', '127.0.0.1', '2024-09-13 11:43:31', '2024-09-13 11:43:31'),
('29326747-40a5-42ae-9547-2263d8376fef', 'Samruddhi Surve', 'Add', 'addPincode', '{\"uid\":\"6947e815-0c26-475f-bfce-ef8475f61f5d\",\"pincode\":\"400705\",\"createdBy\":\"Samruddhi Surve\",\"updated_at\":\"2024-09-13T17:30:29.000000Z\",\"created_at\":\"2024-09-13T17:30:29.000000Z\"}', '127.0.0.1', '2024-09-13 12:00:29', '2024-09-13 12:00:29'),
('298577c9-e78f-4cd9-9f7b-3be7cd111316', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Add', 'addInfluencerVideo', '{\"uid\":\"5688467b-f1f6-46f5-90c8-e36b95d9f03e\",\"videoPath\":null,\"influencerUid\":null,\"sequence\":null,\"productUid\":\"357d105a-e4b8-4bb7-bf7c-e6b51cec3731\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"updated_at\":\"2024-09-06T23:04:17.000000Z\",\"created_at\":\"2024-09-06T23:04:17.000000Z\"}', '127.0.0.1', '2024-09-06 17:34:17', '2024-09-06 17:34:17'),
('2a6cbd34-2235-4131-b73f-c3f1d88c5334', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725791404-image-pizza.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:30:04.000000Z\"}', '127.0.0.1', '2024-09-08 05:05:42', '2024-09-08 05:05:42'),
('2e31bff0-8a1d-4bc3-a8b5-7901215600db', 'Samruddhi Surve', 'Update', 'updateCategory', '{\"uid\":\"99176263-f96e-45a6-84ec-aa2abf386a12\",\"name\":\"Pizza\",\"slug\":\"pizza\",\"image\":\"media\\/adminImages\\/product\\/category\\/1729491700-image-th.jpeg\",\"imageAlt\":null,\"description\":\"Test category description\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-02T08:45:50.000000Z\",\"updated_at\":\"2024-10-21T06:21:40.000000Z\"}', '127.0.0.1', '2024-10-21 06:21:40', '2024-10-21 06:21:40'),
('2e9fc5d8-f609-4356-b236-95018226d24a', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725792239-image-exps28800_UG143377D12_18_1b_RMS.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:43:59.000000Z\"}', '127.0.0.1', '2024-09-08 06:11:43', '2024-09-08 06:11:43'),
('2ecc80e6-1e59-430b-ac96-d0fbe5108cfa', 'Samruddhi Surve', 'Update', 'updateCategory', '{\"uid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"name\":\"Burger\",\"slug\":\"burger\",\"image\":\"media\\/adminImages\\/product\\/category\\/1729491683-image-th (2).jpeg\",\"imageAlt\":null,\"description\":\"Burger category test description\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-02T08:52:30.000000Z\",\"updated_at\":\"2024-10-21T06:21:25.000000Z\"}', '127.0.0.1', '2024-10-21 06:21:25', '2024-10-21 06:21:25'),
('30de2ded-e549-4c1e-967d-818d82352e11', 'Samruddhi Surve', 'Update', 'updateCombo', '{\"uid\":\"7b6554e8-7e95-48cf-ba8a-1ef93be06074\",\"coverImage\":\"media\\/adminImages\\/customization\\/combo\\/1726851066-coverImage-image_1634391949017_Two_Loaded_Non-Veg_Medium_Pizza_Combo.avif\",\"imgAlt\":\"img_alt\",\"name\":\"Order Two Loaded Medium Pizza Combo\",\"price\":\"999.00\",\"productUid\":\"0737cf58-f31f-49f7-bc5a-c8ff6a6a5728,3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"descPrice\":\"899.10\",\"descPercentage\":\"10\",\"count\":\"2\",\"description\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Loram ipsum may be used as a placeholder before the final\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-20T16:51:06.000000Z\",\"updated_at\":\"2024-09-20T17:04:53.000000Z\"}', '127.0.0.1', '2024-09-20 11:34:53', '2024-09-20 11:34:53'),
('31b699e0-9447-4ef6-8c62-1c313afbc4bc', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725792239-image-exps28800_UG143377D12_18_1b_RMS.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:43:59.000000Z\"}', '127.0.0.1', '2024-09-08 06:04:38', '2024-09-08 06:04:38'),
('3332d82d-50e3-4f8e-9711-26d60e3945b9', 'Samruddhi Surve', 'Add', 'addSeopage', '{\"uid\":\"7529cc5f-b970-40f6-9698-7b2dbeb8a839\",\"name\":\"Blog\",\"url\":\"our-blogs\",\"status\":\"1\",\"updated_at\":\"2024-09-13T19:00:04.000000Z\",\"created_at\":\"2024-09-13T19:00:04.000000Z\"}', '127.0.0.1', '2024-09-13 13:30:04', '2024-09-13 13:30:04'),
('3ca75ead-d977-4697-8a25-72a68d6936c7', NULL, 'Add', 'updateOutlet', '{\"uid\":\"5d048c91-f444-406b-8fd2-0b5f436a0f2d\",\"name\":\"Nerul Outlet\",\"type\":\"Outlet\",\"cityId\":\"Nerul\",\"stateId\":\"Maharashtra\",\"pincode\":\"400706\",\"areaRadius\":\"400 Sq Ft\",\"address1\":\"Nerul West\",\"address2\":\"Nerul West\",\"lat\":\"19.0363194\",\"long\":\"73.0154376\",\"placeId\":null,\"googleAddress\":\"Nerul West, Nerul, Navi Mumbai, Maharashtra 400706, India\",\"contactFname\":\"Rahul\",\"contactLname\":\"Patil\",\"contactPhone\":\"8787878787\",\"contactEmail\":\"rahul@gmail.com\",\"fassaiNo\":\"12334567678765\",\"invoicePrefix\":\"NU\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-13T16:28:39.000000Z\",\"updated_at\":\"2024-09-13T16:36:54.000000Z\"}', '127.0.0.1', '2024-09-13 11:18:36', '2024-09-13 11:18:36'),
('3d6cb4b0-bf80-4d7c-b56d-7e65f81a9c80', 'Samruddhi Surve', 'Add', 'updateTestimonial', '{\"uid\":\"6373c60e-0ae1-49e5-b509-595041be5419\",\"name\":\"Samruddhi Surve\",\"image\":\"media\\/adminImages\\/other\\/testimonial\\/1726249276-image-student2.jpg\",\"imgAlt\":\"img_alt\",\"location\":\"Nerul\",\"sequence\":\"1\",\"comment\":\"Ever looked at Pizza Toppings and wondered, \\\"WHY SO LESS\\\"?\\r\\nWell, we did. And we definitely wanted more! So, we immediately took it upon ourselves to fix it, and made the pizzas that we all deserve - PIZZAS LOADED WITH\",\"starCount\":\"5\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"created_at\":\"2024-09-13T17:38:42.000000Z\",\"updated_at\":\"2024-09-13T17:41:16.000000Z\"}', '127.0.0.1', '2024-09-13 12:11:17', '2024-09-13 12:11:17'),
('3e5827a6-778e-4735-82f1-0b0905aa0c0e', 'Samruddhi Surve', 'Add', 'addAddonCategoryItem', '{\"uid\":\"7823d760-4dbb-4471-bdf3-25be9da11cd1\",\"addonCategoryUid\":\"a80ace74-f756-4127-8bdb-465f9169acc6\",\"customizationUid\":\"d200c632-c7d2-4fbd-a672-dea2aa59e569\",\"image\":null,\"imgAlt\":null,\"name\":\"Test Item\",\"description\":null,\"price\":\"400\",\"descPrice\":\"399\",\"createdBy\":\"Samruddhi Surve\",\"unit\":\"Gram\",\"weight\":\"400\",\"type\":\"Veg\",\"status\":\"1\",\"updated_at\":\"2024-09-24T14:05:55.000000Z\",\"created_at\":\"2024-09-24T14:05:55.000000Z\"}', '127.0.0.1', '2024-09-24 14:05:55', '2024-09-24 14:05:55'),
('3ef98882-80bf-4f61-a321-c8e05bd344c1', 'Samruddhi Surve', 'Update', 'updateCategory', '{\"uid\":\"4cc14995-40b2-4e51-ba97-fa5396009c95\",\"name\":\"Sandwich\",\"slug\":\"sandwich\",\"image\":null,\"imageAlt\":null,\"description\":\"Healthy Food\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-23T11:30:08.000000Z\",\"updated_at\":\"2024-09-23T11:30:08.000000Z\"}', '127.0.0.1', '2024-10-15 13:03:06', '2024-10-15 13:03:06'),
('3f715331-9b5a-4c8f-97a5-243f83e8e1d5', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Add', 'addAddonCategoryItem', '{\"uid\":\"e9dff825-ec1f-4a81-bd1f-4664473cfb72\",\"addonCategoryUid\":\"a80ace74-f756-4127-8bdb-465f9169acc6\",\"image\":null,\"imgAlt\":null,\"name\":\"Mozilla\",\"description\":\"Test Description\",\"price\":\"100\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"unit\":\"gram\",\"weight\":\"100\",\"type\":\"Veg\",\"status\":\"1\",\"updated_at\":\"2024-09-06T07:00:12.000000Z\",\"created_at\":\"2024-09-06T07:00:12.000000Z\"}', '127.0.0.1', '2024-09-06 01:30:12', '2024-09-06 01:30:12'),
('40c42257-a0cd-4178-843e-12e420d08746', 'Samruddhi Surve', 'Add', 'addCategory', '{\"uid\":\"aeaf3977-82fa-4661-a31a-a872da19e789\",\"name\":\"Burgerr\",\"slug\":\"burgerr\",\"image\":null,\"imageAlt\":null,\"description\":null,\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"updated_at\":\"2024-10-15T13:03:55.000000Z\",\"created_at\":\"2024-10-15T13:03:55.000000Z\"}', '127.0.0.1', '2024-10-15 13:03:55', '2024-10-15 13:03:55'),
('441e743e-b1fa-4732-b9f2-fd6b88df8e07', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725792239-image-exps28800_UG143377D12_18_1b_RMS.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:43:59.000000Z\"}', '127.0.0.1', '2024-09-08 05:37:26', '2024-09-08 05:37:26'),
('4450e7ff-fb37-40a8-9cf1-40f324787038', 'Samruddhi Surve', 'Add', 'addInfluencerVideo', '{\"uid\":\"582dab5f-89c5-48bf-9f1a-d1a16a3a06a4\",\"videoPath\":\"\\\"http:\\/\\/commondatastorage.googleapis.com\\/gtv-videos-bucket\\/sample\\/BigBuckBunny.mp4\\\"\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"sequence\":\"1\",\"productUid\":\"0737cf58-f31f-49f7-bc5a-c8ff6a6a5728\",\"createdBy\":\"Samruddhi Surve\",\"updated_at\":\"2024-09-24T12:54:28.000000Z\",\"created_at\":\"2024-09-24T12:54:28.000000Z\"}', '127.0.0.1', '2024-09-24 12:54:28', '2024-09-24 12:54:28'),
('4773618b-24ba-4859-aa46-9a5bcb59fd3e', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725792239-image-exps28800_UG143377D12_18_1b_RMS.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:43:59.000000Z\"}', '127.0.0.1', '2024-09-08 05:31:33', '2024-09-08 05:31:33'),
('4c62fe54-386e-4c41-aef8-4f2f4d8871d4', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725792239-image-exps28800_UG143377D12_18_1b_RMS.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:43:59.000000Z\"}', '127.0.0.1', '2024-09-08 05:17:42', '2024-09-08 05:17:42'),
('4c768648-ad61-4f6a-bdef-cbeaee9fb2a5', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725791404-image-pizza.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:30:04.000000Z\"}', '127.0.0.1', '2024-09-08 05:00:04', '2024-09-08 05:00:04'),
('4ed34953-350a-4b97-b277-7cd6e82606f3', 'Samruddhi Surve', 'Delete', 'deleteCategory', '{\"uid\":\"aeaf3977-82fa-4661-a31a-a872da19e789\",\"name\":\"Burgerr\",\"slug\":\"burgerr\",\"image\":null,\"imageAlt\":null,\"description\":null,\"createdBy\":\"Samruddhi Surve\",\"status\":1,\"deleteId\":1,\"created_at\":\"2024-10-15T13:03:55.000000Z\",\"updated_at\":\"2024-10-15T13:04:00.000000Z\"}', '127.0.0.1', '2024-10-15 13:04:00', '2024-10-15 13:04:00'),
('4ed94179-2968-4577-a2f5-bc88e69568eb', 'Samruddhi Surve', 'Update', 'updateProduct', '{\"uid\":\"0737cf58-f31f-49f7-bc5a-c8ff6a6a5728\",\"categoryUid\":\"99176263-f96e-45a6-84ec-aa2abf386a12\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Chicken Cheese Pizza\",\"slug\":\"chicken-cheese-pizza\",\"price\":\"500.00\",\"disPercent\":\"20\",\"disPrice\":\"400.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1726303659-image-th.jpeg\",\"imageAlt\":\"img_alt\",\"itemCode\":\"PRO567\",\"description\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"tag\":\"20 % OFF\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-14T08:47:39.000000Z\",\"updated_at\":\"2024-09-14T09:15:38.000000Z\"}', '127.0.0.1', '2024-09-14 03:48:26', '2024-09-14 03:48:26'),
('4f7a243f-b1c6-49b8-87e1-2cffb3d87d78', 'Samruddhi Surve', 'Update', 'updateProduct', '{\"uid\":\"0737cf58-f31f-49f7-bc5a-c8ff6a6a5728\",\"categoryUid\":\"99176263-f96e-45a6-84ec-aa2abf386a12\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Chicken Cheese Pizza\",\"slug\":\"chicken-cheese-pizza\",\"price\":\"500.00\",\"disPercent\":\"20\",\"disPrice\":\"400.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1726303659-image-th.jpeg\",\"imageAlt\":\"img_alt\",\"itemCode\":\"PRO567\",\"description\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"tag\":\"20 % OFF\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-14T08:47:39.000000Z\",\"updated_at\":\"2024-09-14T09:15:38.000000Z\"}', '127.0.0.1', '2024-09-14 03:45:38', '2024-09-14 03:45:38'),
('561ae154-4444-44bd-84e2-dd4aa547a0bf', 'Samruddhi Surve', 'Add', 'addProduct', '{\"uid\":\"0737cf58-f31f-49f7-bc5a-c8ff6a6a5728\",\"categoryUid\":\"99176263-f96e-45a6-84ec-aa2abf386a12\",\"name\":\"Chicken Cheese Pizza\",\"slug\":\"chicken-cheese-pizza\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1726303659-image-th.jpeg\",\"imageAlt\":\"img_alt\",\"itemCode\":\"PRO567\",\"description\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"tag\":\"20 % OFF\",\"preparationTime\":\"30 Mins\",\"type\":\"Non-Veg\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"ingredients\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"price\":\"500\",\"disPercent\":\"20\",\"disPrice\":\"400.00\",\"updated_at\":\"2024-09-14T08:47:39.000000Z\",\"created_at\":\"2024-09-14T08:47:39.000000Z\"}', '127.0.0.1', '2024-09-14 03:17:39', '2024-09-14 03:17:39'),
('58194007-00ac-4a65-a73e-b3d747aa5fe7', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateInfluencer', '{\"id\":null,\"uid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"outletUid\":null,\"profileImage\":\"media\\/adminImages\\/influencers\\/1725642787-profileImage-student2.jpg\",\"profileImageAlt\":\"Influencer Profile Image\",\"fname\":\"Mansi\",\"lname\":\"Surve\",\"slug\":\"mansi-surve\",\"email\":\"mansi@gmail.com\",\"phone\":\"9889787878\",\"role\":\"influencer\",\"empNo\":\"EMP789\",\"influencerTag\":\"Food Content Creator\",\"influencerBio\":\"n publishing and graphic design, Loram ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Loram ipsum may be used as a placeholder before the final copy is available. It is also used to temporarily replace text in a process called greeking,\",\"influencerFbLink\":\"https:\\/\\/www.facebook.com\\/mansi\",\"influencerInstaLink\":\"https:\\/\\/www.instagram.com\\/mansi\",\"influencerYoutubeLink\":\"https:\\/\\/youtube.com\\/ChannelName\",\"influencerWebsiteLink\":\"https:\\/\\/www.example.com\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-06T17:13:07.000000Z\",\"updated_at\":\"2024-09-06T17:15:04.000000Z\"}', '127.0.0.1', '2024-09-06 11:45:04', '2024-09-06 11:45:04'),
('59069fab-67a7-4dc2-80dd-357ac45605d4', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Add', 'addInfluencerVideo', '{\"uid\":\"a5473bcc-1597-47fe-9c8e-caeaab4e81d2\",\"videoPath\":null,\"influencerUid\":null,\"sequence\":null,\"productUid\":\"357d105a-e4b8-4bb7-bf7c-e6b51cec3731\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"updated_at\":\"2024-09-06T23:04:20.000000Z\",\"created_at\":\"2024-09-06T23:04:20.000000Z\"}', '127.0.0.1', '2024-09-06 17:34:20', '2024-09-06 17:34:20'),
('5dfe27d4-5310-4d0d-a206-fb9798c83f40', 'Samruddhi Surve', 'Update', 'updateCategory', '{\"uid\":\"4cc14995-40b2-4e51-ba97-fa5396009c95\",\"name\":\"Sandwich\",\"slug\":\"sandwich\",\"image\":null,\"imageAlt\":null,\"description\":\"Healthy Food\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-23T11:30:08.000000Z\",\"updated_at\":\"2024-09-23T11:30:08.000000Z\"}', '127.0.0.1', '2024-10-15 13:02:57', '2024-10-15 13:02:57'),
('60bb1850-c790-4272-b782-9641f719a3dd', NULL, 'Add', 'addOutlet', '{\"uid\":\"5d048c91-f444-406b-8fd2-0b5f436a0f2d\",\"name\":\"Nerul Outlet\",\"type\":\"Outlet\",\"cityId\":\"Nerul\",\"stateId\":\"Maharashtra\",\"pincode\":\"400706\",\"areaRadius\":\"400 Sq Ft\",\"address1\":\"Nerul West\",\"address2\":\"Nerul West\",\"lat\":\"19.0363194\",\"long\":\"73.0154376\",\"placeId\":null,\"googleAddress\":\"Nerul West, Nerul, Navi Mumbai, Maharashtra 400706, India\",\"contactFname\":\"Rahul\",\"contactLname\":\"Patil\",\"contactPhone\":\"8787878787\",\"contactEmail\":\"rahul@gmail.com\",\"fassaiNo\":\"12334567678765\",\"invoicePrefix\":\"NU\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-13T16:28:39.000000Z\",\"updated_at\":\"2024-09-13T16:36:54.000000Z\"}', '127.0.0.1', '2024-09-13 11:07:08', '2024-09-13 11:07:08');
INSERT INTO `logs` (`uid`, `userUid`, `action`, `function`, `data`, `ip`, `created_at`, `updated_at`) VALUES
('60dd7886-5ddd-42dd-8b78-f4ca0c5bde7d', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725792239-image-exps28800_UG143377D12_18_1b_RMS.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:43:59.000000Z\"}', '127.0.0.1', '2024-09-08 05:56:47', '2024-09-08 05:56:47'),
('61a10104-cf6e-4b85-8523-f0d051c20a52', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Add', 'addInfluencerVideo', '{\"uid\":\"475e3ac0-2dab-49b8-87a0-f1f0d1770f7c\",\"videoPath\":\"media\\/adminImages\\/product\\/category\\/1725665228-videoPath-big_buck_bunny_720p_1mb.mp4\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"sequence\":\"1\",\"productUid\":\"357d105a-e4b8-4bb7-bf7c-e6b51cec3731\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"updated_at\":\"2024-09-06T23:27:08.000000Z\",\"created_at\":\"2024-09-06T23:27:08.000000Z\"}', '127.0.0.1', '2024-09-06 17:57:08', '2024-09-06 17:57:08'),
('620c84f2-3840-426c-a1a6-586aff5da9f6', 'Samruddhi Surve', 'Update', 'updateCustomization', '{\"uid\":\"d200c632-c7d2-4fbd-a672-dea2aa59e569\",\"name\":\"Test Customization\",\"type\":\"Radio\",\"groupName\":\"Test Group Name\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-20T16:15:09.000000Z\",\"updated_at\":\"2024-09-20T16:16:02.000000Z\"}', '127.0.0.1', '2024-09-20 10:46:02', '2024-09-20 10:46:02'),
('6e0529ca-d5a8-4eb2-9490-5056521ae40a', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725792239-image-exps28800_UG143377D12_18_1b_RMS.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:43:59.000000Z\"}', '127.0.0.1', '2024-09-08 06:05:10', '2024-09-08 06:05:10'),
('6e45894f-7a0a-4257-b4c8-8951ec550fbe', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725792239-image-exps28800_UG143377D12_18_1b_RMS.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:43:59.000000Z\"}', '127.0.0.1', '2024-09-08 05:36:56', '2024-09-08 05:36:56'),
('6e825eaa-a123-444f-86d3-91378e4b91af', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Add', 'addCustomer', '{\"uid\":\"c7569685-07e4-4d51-b863-0d07673310f0\",\"fname\":\"Shrutika\",\"lname\":\"Patil\",\"email\":\"shrutika@gmail.com\",\"phone\":\"9876543218\",\"gender\":\"Female\",\"dateOfBirth\":\"2001-09-04\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"updated_at\":\"2024-09-04T08:39:26.000000Z\",\"created_at\":\"2024-09-04T08:39:26.000000Z\"}', '127.0.0.1', '2024-09-04 03:09:26', '2024-09-04 03:09:26'),
('6f2801a9-000b-455c-acb7-346337657f4b', 'Samruddhi Surve', 'Update', 'updateAddonCategory', '{\"uid\":\"a80ace74-f756-4127-8bdb-465f9169acc6\",\"categoryUid\":\"99176263-f96e-45a6-84ec-aa2abf386a12\",\"type\":\"Radio\",\"name\":\"Cheese\",\"flag\":\"Customize\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-06T01:23:54.000000Z\",\"updated_at\":\"2024-09-24T12:48:05.000000Z\"}', '127.0.0.1', '2024-09-24 12:48:08', '2024-09-24 12:48:08'),
('70a6481f-8b67-4f8e-bb5a-d0f70f738b48', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Add', 'updateAddonCategory', '{\"uid\":\"a80ace74-f756-4127-8bdb-465f9169acc6\",\"categoryUid\":\"99176263-f96e-45a6-84ec-aa2abf386a12,a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"type\":\"Radio\",\"name\":\"Cheese\",\"flag\":\"Customize\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-06T06:53:54.000000Z\",\"updated_at\":\"2024-09-06T15:14:49.000000Z\"}', '127.0.0.1', '2024-09-06 09:44:51', '2024-09-06 09:44:51'),
('724186de-8ab6-488c-bf3f-2f62e9cf93ba', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Add', 'addInfluencerVideo', '{\"uid\":\"2a3e6e97-147b-4124-bb56-d63526b24007\",\"videoPath\":\"media\\/adminImages\\/product\\/category\\/1725665549-videoPath-SampleVideo_720x480_2mb.mp4\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"sequence\":\"2\",\"productUid\":\"357d105a-e4b8-4bb7-bf7c-e6b51cec3731\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"updated_at\":\"2024-09-06T23:32:29.000000Z\",\"created_at\":\"2024-09-06T23:32:29.000000Z\"}', '127.0.0.1', '2024-09-06 18:02:29', '2024-09-06 18:02:29'),
('7262fa2a-70a3-496a-af46-348fad4b9d3b', 'Samruddhi Surve', 'Add', 'addRole', '{\"uid\":\"e4577323-7626-4834-b9a8-71af491f2a58\",\"name\":\"Admin\",\"slug\":\"admin\",\"status\":\"1\",\"createdBy\":\"Samruddhi Surve\",\"updated_at\":\"2024-10-21T05:49:50.000000Z\",\"created_at\":\"2024-10-21T05:49:50.000000Z\"}', '127.0.0.1', '2024-10-21 05:49:50', '2024-10-21 05:49:50'),
('739a6b74-0a03-48cf-aa53-df419eb90e1e', 'Samruddhi Surve', 'Add', 'addRole', '{\"uid\":\"af0fbca5-9a05-4937-981e-6b625768201c\",\"name\":\"Super Admin\",\"slug\":\"super-admin\",\"status\":\"1\",\"createdBy\":\"Samruddhi Surve\",\"updated_at\":\"2024-10-21T05:53:17.000000Z\",\"created_at\":\"2024-10-21T05:53:17.000000Z\"}', '127.0.0.1', '2024-10-21 05:53:17', '2024-10-21 05:53:17'),
('740b5948-de65-4561-b3b6-031741e7977d', 'Samruddhi Surve', 'Add', 'addWallethistory', '{\"uid\":\"ea408bcf-456a-4a26-a233-3c6314926f00\",\"customerUid\":\"253abdeb-aed6-43cb-9ad7-edc25190a7ba\",\"adminRemark\":\"Test\",\"amount\":\"200\",\"type\":\"Credit\",\"flag\":\"admin\",\"createdBy\":\"Samruddhi Surve\",\"updated_at\":\"2024-10-15T12:48:29.000000Z\",\"created_at\":\"2024-10-15T12:48:29.000000Z\"}', '127.0.0.1', '2024-10-15 12:48:29', '2024-10-15 12:48:29'),
('7463e74f-7c91-4f64-b623-5f0b230c4723', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Add', 'addAddonCategory', '{\"uid\":\"a80ace74-f756-4127-8bdb-465f9169acc6\",\"categoryUid\":\"99176263-f96e-45a6-84ec-aa2abf386a12\",\"name\":\"Cheese\",\"flag\":\"Customize\",\"type\":\"Radio\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"updated_at\":\"2024-09-06T06:53:54.000000Z\",\"created_at\":\"2024-09-06T06:53:54.000000Z\"}', '127.0.0.1', '2024-09-06 01:23:54', '2024-09-06 01:23:54'),
('756ff623-605d-4a3a-bca4-aec679991e9d', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Add', 'addProduct', '{\"uid\":\"aa4a8b72-f6d2-4469-a1cb-ad649a0307d5\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"name\":\"sderft\",\"slug\":\"sderft\",\"image\":null,\"imageAlt\":\"ert\",\"itemCode\":\"rftyu\",\"description\":\"fgh\",\"unit\":\"Gram\",\"weight\":\"55\",\"note\":\"fghj\",\"tag\":\"fgh\",\"preparationTime\":\"fgh\",\"type\":\"Veg\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"ingredients\":\"fgtyhjk\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"updated_at\":\"2024-09-08T07:21:52.000000Z\",\"created_at\":\"2024-09-08T07:21:52.000000Z\"}', '127.0.0.1', '2024-09-08 01:51:52', '2024-09-08 01:51:52'),
('75c04568-ee30-49dc-8974-9cf4abed06b0', NULL, 'Add', 'addOutlet', '{\"uid\":\"5d048c91-f444-406b-8fd2-0b5f436a0f2d\",\"name\":\"Nerul Outlet\",\"type\":\"Outlet\",\"cityId\":\"Nerul\",\"stateId\":\"Maharashtra\",\"pincode\":\"400706\",\"areaRadius\":\"400 Sq Ft\",\"address1\":\"Nerul West\",\"address2\":\"Nerul West\",\"lat\":\"19.0363194\",\"long\":\"73.0154376\",\"placeId\":null,\"googleAddress\":\"Nerul West, Nerul, Navi Mumbai, Maharashtra 400706, India\",\"contactFname\":\"Rahul\",\"contactLname\":\"Patil\",\"contactPhone\":\"8787878787\",\"contactEmail\":\"rahul@gmail.com\",\"fassaiNo\":\"12334567678765\",\"invoicePrefix\":\"NU\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-13T16:28:39.000000Z\",\"updated_at\":\"2024-09-13T16:36:54.000000Z\"}', '127.0.0.1', '2024-09-13 11:09:38', '2024-09-13 11:09:38'),
('77aa9691-4ded-4382-8499-1832ddead77b', 'Samruddhi Surve', 'Delete', 'deleteCategory', '{\"uid\":\"7c3ba380-9d45-423d-972e-0764570d2dac\",\"name\":null,\"slug\":\"\",\"image\":null,\"imageAlt\":null,\"description\":null,\"createdBy\":\"Samruddhi Surve\",\"status\":1,\"deleteId\":1,\"created_at\":\"2024-10-15T13:04:04.000000Z\",\"updated_at\":\"2024-10-15T13:04:09.000000Z\"}', '127.0.0.1', '2024-10-15 13:04:09', '2024-10-15 13:04:09'),
('7a2cecfa-5829-4874-bf23-9c19ba1c4610', 'Samruddhi Surve', 'Add', 'addCategory', '{\"uid\":\"e99e7430-9a84-47f2-a51d-48e27dcdd103\",\"name\":\"Wrap\",\"slug\":\"wrap\",\"image\":\"media\\/adminImages\\/product\\/category\\/1729490776-image-th.jpeg\",\"imageAlt\":null,\"description\":null,\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"updated_at\":\"2024-10-21T06:06:16.000000Z\",\"created_at\":\"2024-10-21T06:06:16.000000Z\"}', '127.0.0.1', '2024-10-21 06:06:16', '2024-10-21 06:06:16'),
('7b4ffe49-4b7b-46f6-b7ed-39d383f0cf8b', 'Samruddhi Surve', 'Update', 'updateProduct', '{\"uid\":\"79818f73-2f4e-46d5-87da-e093086bc298\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"dfg\",\"slug\":\"dfg\",\"price\":null,\"disPercent\":null,\"disPrice\":null,\"image\":\"media\\/adminImages\\/Product\\/Product\\/1726864130-image-image_1634391949017_Two_Loaded_Non-Veg_Medium_Pizza_Combo.avif\",\"imageAlt\":\"df\",\"itemCode\":\"fgh\",\"description\":\"vfgh\",\"unit\":\"Pcs\",\"weight\":\"5\",\"note\":\"vgh\",\"tag\":\"cgh\",\"preparationTime\":\"cg\",\"type\":\"Veg\",\"ingredients\":\"ghj\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-20T20:28:50.000000Z\",\"updated_at\":\"2024-09-20T20:28:50.000000Z\"}', '127.0.0.1', '2024-09-20 20:35:07', '2024-09-20 20:35:07'),
('7c6b99a4-da1b-4e5f-8223-1bf638a8aeb8', 'Samruddhi Surve', 'Update', 'addTestimonial', '{\"uid\":\"6373c60e-0ae1-49e5-b509-595041be5419\",\"image\":\"media\\/adminImages\\/other\\/testimonial\\/1726249122-image-th (1).jpeg\",\"imgAlt\":\"img_alt\",\"name\":\"Samruddhi Surve\",\"sequence\":\"1\",\"starCount\":\"5\",\"location\":\"Nerul\",\"comment\":\"Ever looked at Pizza Toppings and wondered, \\\"WHY SO LESS\\\"?\\r\\nWell, we did. And we definitely wanted more! So, we immediately took it upon ourselves to fix it, and made the pizzas that we all deserve - PIZZAS LOADED WITH\",\"status\":\"1\",\"createdBy\":\"Samruddhi Surve\",\"updated_at\":\"2024-09-13T17:38:42.000000Z\",\"created_at\":\"2024-09-13T17:38:42.000000Z\"}', '127.0.0.1', '2024-09-13 12:08:42', '2024-09-13 12:08:42'),
('81e555fd-1210-4530-b94f-492871bfc06e', 'Samruddhi Surve', 'Update', 'updateCategory', '{\"uid\":\"4cc14995-40b2-4e51-ba97-fa5396009c95\",\"name\":\"Sandwich\",\"slug\":\"sandwich\",\"image\":\"media\\/adminImages\\/product\\/category\\/1729491776-image-th (4).jpeg\",\"imageAlt\":null,\"description\":\"Healthy Food\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-23T11:30:08.000000Z\",\"updated_at\":\"2024-10-21T06:22:57.000000Z\"}', '127.0.0.1', '2024-10-21 06:22:57', '2024-10-21 06:22:57'),
('822d3505-57ca-4f1b-827e-ad23e8e86efb', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725791404-image-pizza.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:30:04.000000Z\"}', '127.0.0.1', '2024-09-08 05:01:20', '2024-09-08 05:01:20'),
('841f2286-dabc-4da3-8b2a-322db4ccc58d', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateInfluencer', '{\"id\":null,\"uid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"outletUid\":\"1d1f8cfe-c444-67h1-abed-5430254c249d\",\"profileImage\":\"media\\/adminImages\\/influencers\\/1725642787-profileImage-student2.jpg\",\"profileImageAlt\":\"Influencer Profile Image\",\"fname\":\"Mansi\",\"lname\":\"Surve\",\"slug\":\"mansi-surve\",\"email\":\"mansi@gmail.com\",\"phone\":\"9889787878\",\"role\":\"influencer\",\"empNo\":\"EMP789\",\"influencerTag\":\"Food Content Creator\",\"influencerBio\":\"n publishing and graphic design, Loram ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Loram ipsum may be used as a placeholder before the final copy is available. It is also used to temporarily replace text in a process called greeking,\",\"influencerFbLink\":\"https:\\/\\/www.facebook.com\\/mansi\",\"influencerInstaLink\":\"https:\\/\\/www.instagram.com\\/mansi\",\"influencerYoutubeLink\":\"https:\\/\\/youtube.com\\/ChannelName\",\"influencerWebsiteLink\":\"https:\\/\\/www.example.com\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-06T17:13:07.000000Z\",\"updated_at\":\"2024-09-06T17:18:40.000000Z\"}', '127.0.0.1', '2024-09-06 11:48:40', '2024-09-06 11:48:40'),
('892d452f-053b-468c-baf1-31b64fa5c34e', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Add', 'updateAddonCategory', '{\"uid\":\"a80ace74-f756-4127-8bdb-465f9169acc6\",\"categoryUid\":\"99176263-f96e-45a6-84ec-aa2abf386a12\",\"type\":\"Radio\",\"name\":\"Cheese\",\"flag\":\"Customize\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-06T06:53:54.000000Z\",\"updated_at\":\"2024-09-06T16:10:24.000000Z\"}', '127.0.0.1', '2024-09-06 10:40:24', '2024-09-06 10:40:24'),
('8ae6c4b2-5c83-4302-a55b-ef9344872d75', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Delete', 'deleteInfluencerVideo', '1', '127.0.0.1', '2024-09-06 18:07:40', '2024-09-06 18:07:40'),
('90317def-ce44-4934-a800-73ba069950ef', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725792239-image-exps28800_UG143377D12_18_1b_RMS.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:43:59.000000Z\"}', '127.0.0.1', '2024-09-08 05:49:25', '2024-09-08 05:49:25'),
('90fbc7d2-8636-442a-87aa-7c528a6a2239', 'Samruddhi Surve', 'Add', 'addFaq', '{\"uid\":\"842ab7dc-0fec-4496-8a11-cd6f6950da8f\",\"question\":null,\"answer\":null,\"sequence\":null,\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"updated_at\":\"2024-09-13T17:46:51.000000Z\",\"created_at\":\"2024-09-13T17:46:51.000000Z\"}', '127.0.0.1', '2024-09-13 12:16:51', '2024-09-13 12:16:51'),
('93e4b15f-a888-4bd3-aba0-cf81bdb1a374', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725792239-image-exps28800_UG143377D12_18_1b_RMS.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:43:59.000000Z\"}', '127.0.0.1', '2024-09-08 05:18:07', '2024-09-08 05:18:07'),
('950aba33-1275-4a87-8999-b6a934df3bff', 'Samruddhi Surve', 'Add', 'addNotificationSegment', '{\"uid\":\"729fb6d4-42e2-4b75-bfcf-ceb52eefb0c4\",\"name\":\"Test Segment\",\"createdBy\":\"Samruddhi Surve\",\"updated_at\":\"2024-09-20T17:19:29.000000Z\",\"created_at\":\"2024-09-20T17:19:29.000000Z\"}', '127.0.0.1', '2024-09-20 11:49:29', '2024-09-20 11:49:29'),
('9538e9c9-5907-48ef-a6b5-ab026f934867', 'Samruddhi Surve', 'Update', 'updateProduct', '{\"uid\":\"0737cf58-f31f-49f7-bc5a-c8ff6a6a5728\",\"categoryUid\":\"99176263-f96e-45a6-84ec-aa2abf386a12\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Chicken Cheese Pizza\",\"slug\":\"chicken-cheese-pizza\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1726303659-image-th.jpeg\",\"imageAlt\":\"img_alt\",\"itemCode\":\"PRO567\",\"description\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"tag\":\"20 % OFF\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-14T03:17:39.000000Z\",\"updated_at\":\"2024-09-14T03:45:38.000000Z\"}', '127.0.0.1', '2024-09-25 05:19:54', '2024-09-25 05:19:54'),
('956d3236-b70c-4a3c-8f41-d95df8f84a30', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateCustomer', '{\"uid\":\"c7569685-07e4-4d51-b863-0d07673310f0\",\"fname\":\"Shrutika\",\"lname\":\"Patil\",\"email\":\"shrutika@gmail.com\",\"phone\":\"9876543218\",\"dateOfBirth\":\"2001-09-04\",\"gender\":\"Female\",\"status\":\"1\",\"deleteId\":0,\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"created_at\":\"2024-09-04T08:39:26.000000Z\",\"updated_at\":\"2024-09-04T08:39:26.000000Z\"}', '127.0.0.1', '2024-09-06 00:26:16', '2024-09-06 00:26:16'),
('96a14126-a893-49c4-85d2-11876c9baad0', 'Samruddhi Surve', 'Update', 'updateProduct', '{\"uid\":\"0737cf58-f31f-49f7-bc5a-c8ff6a6a5728\",\"categoryUid\":\"99176263-f96e-45a6-84ec-aa2abf386a12\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Chicken Cheese Pizza\",\"slug\":\"chicken-cheese-pizza\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1726303659-image-th.jpeg\",\"imageAlt\":\"img_alt\",\"itemCode\":\"PRO567\",\"description\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"tag\":\"20 % OFF\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-14T03:17:39.000000Z\",\"updated_at\":\"2024-09-14T03:45:38.000000Z\"}', '127.0.0.1', '2024-09-25 06:57:08', '2024-09-25 06:57:08'),
('96b15dac-9125-4f85-9600-aa936b2674de', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Add', 'addProduct', '{\"uid\":\"32ef8076-0ac8-4713-b1a5-3ed5fce4e201\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"name\":\"sdf\",\"slug\":\"sdf\",\"image\":null,\"imageAlt\":\"sdfg\",\"itemCode\":\"dfg\",\"description\":\"sdfgh\",\"unit\":\"Ml\",\"weight\":\"44\",\"note\":\"sdfgh\",\"tag\":\"sdf\",\"preparationTime\":\"df\",\"type\":\"Veg\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"ingredients\":\"asdfg\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"price\":\"555\",\"disPercent\":\"5\",\"disPrice\":\"527.25\",\"updated_at\":\"2024-09-08T10:15:56.000000Z\",\"created_at\":\"2024-09-08T10:15:56.000000Z\"}', '127.0.0.1', '2024-09-08 04:45:56', '2024-09-08 04:45:56'),
('9bd97bc2-2f55-45b4-8300-22c645dd5729', 'Samruddhi Surve', 'Add', 'updateOutlet', '{\"uid\":\"5d048c91-f444-406b-8fd2-0b5f436a0f2d\",\"name\":\"Nerul Outlet\",\"type\":\"Outlet\",\"cityId\":\"Nerul\",\"stateId\":\"Maharashtra\",\"pincode\":\"400706\",\"areaRadius\":\"400 Sq Ft\",\"address1\":\"Nerul West\",\"address2\":\"Nerul West\",\"lat\":\"19.0363194\",\"long\":\"73.0154376\",\"placeId\":\"ChIJhz2evenD5zsRNVKVwEsD87I\",\"googleAddress\":\"Nerul West, Nerul, Navi Mumbai, Maharashtra 400706, India\",\"contactFname\":\"Rahul\",\"contactLname\":\"Patil\",\"contactPhone\":\"8787878787\",\"contactEmail\":\"rahul@gmail.com\",\"fassaiNo\":\"12334567678765\",\"invoicePrefix\":\"NU\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-13T16:28:39.000000Z\",\"updated_at\":\"2024-09-13T16:52:53.000000Z\"}', '127.0.0.1', '2024-09-13 11:22:53', '2024-09-13 11:22:53'),
('9c1cb728-6f7d-45ad-8301-40b7b54a0caf', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725792239-image-exps28800_UG143377D12_18_1b_RMS.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:43:59.000000Z\"}', '127.0.0.1', '2024-09-08 05:31:10', '2024-09-08 05:31:10'),
('9d88d2ff-faa5-491a-9841-f3fe629fe0dd', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725792239-image-exps28800_UG143377D12_18_1b_RMS.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:43:59.000000Z\"}', '127.0.0.1', '2024-09-08 05:52:04', '2024-09-08 05:52:04'),
('a1c499a3-3951-4385-b055-87a1765f9879', 'Samruddhi Surve', 'Update', 'updateCategory', '{\"uid\":\"e99e7430-9a84-47f2-a51d-48e27dcdd103\",\"name\":\"Wrap\",\"slug\":\"wrap\",\"image\":\"media\\/adminImages\\/product\\/category\\/1729492164-image-exps105667__SD143206B04_02_6b.jpg\",\"imageAlt\":null,\"description\":null,\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-10-21T06:06:16.000000Z\",\"updated_at\":\"2024-10-21T06:29:24.000000Z\"}', '127.0.0.1', '2024-10-21 06:29:24', '2024-10-21 06:29:24'),
('a23637a5-7f53-4835-849e-f1020c1f11a5', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725792239-image-exps28800_UG143377D12_18_1b_RMS.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:43:59.000000Z\"}', '127.0.0.1', '2024-09-08 05:46:50', '2024-09-08 05:46:50'),
('a25736e4-42b6-4805-92c1-1c0c9a14be69', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Add', 'updateAddonCategory', '{\"uid\":\"a80ace74-f756-4127-8bdb-465f9169acc6\",\"categoryUid\":\"99176263-f96e-45a6-84ec-aa2abf386a12,a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"type\":\"Radio\",\"name\":\"Cheese\",\"flag\":\"Customize\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-06T06:53:54.000000Z\",\"updated_at\":\"2024-09-06T16:12:03.000000Z\"}', '127.0.0.1', '2024-09-06 10:42:03', '2024-09-06 10:42:03'),
('a752c6b6-d079-4658-97c9-6f5e0cadb8dc', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Add', 'addInfluencerVideo', '{\"uid\":\"4c3f7e06-5fd0-4d3e-9edc-3856b0b07e00\",\"videoPath\":\"media\\/adminImages\\/product\\/category\\/1725664577-videoPath-big_buck_bunny_720p_1mb.mp4\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"sequence\":\"1\",\"productUid\":\"357d105a-e4b8-4bb7-bf7c-e6b51cec3731\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"updated_at\":\"2024-09-06T23:16:18.000000Z\",\"created_at\":\"2024-09-06T23:16:18.000000Z\"}', '127.0.0.1', '2024-09-06 17:46:18', '2024-09-06 17:46:18'),
('a75630e8-1a53-4b0e-917c-277820c5698a', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateUser', '{\"id\":null,\"uid\":\"4a3cc096-fd36-4fba-a6b9-fa2dac537971\",\"outletUid\":\"1d1f8cfe-c444-67h1-abed-5430254c249d\",\"profileImage\":\"media\\/adminImages\\/users\\/1725600846-profileImage-hyplap logo.png\",\"profileImageAlt\":\"Hyplap Logo\",\"fname\":\"Hyplap\",\"lname\":\"User\",\"slug\":\"hyplap-user\",\"email\":\"hyplap1@gmail.com\",\"phone\":\"9876543211\",\"role\":\"hyplap\",\"empNo\":\"EMP123\",\"influencerTag\":null,\"influencerBio\":null,\"influencerFbLink\":null,\"influencerInstaLink\":null,\"influencerYoutubeLink\":null,\"influencerWebsiteLink\":null,\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-06T05:34:06.000000Z\",\"updated_at\":\"2024-09-06T23:46:05.000000Z\"}', '127.0.0.1', '2024-09-06 18:16:05', '2024-09-06 18:16:05'),
('a8dfbab8-fb60-4626-adc0-fd765b0e6949', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725792239-image-exps28800_UG143377D12_18_1b_RMS.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:43:59.000000Z\"}', '127.0.0.1', '2024-09-08 05:21:14', '2024-09-08 05:21:14'),
('a9cd79bb-c06d-42c4-be61-09dd239c886e', 'Samruddhi Surve', 'Update', 'updateAddonCategoryItem', '{\"uid\":\"e9dff825-ec1f-4a81-bd1f-4664473cfb72\",\"addonCategoryUid\":\"a80ace74-f756-4127-8bdb-465f9169acc6\",\"customizationUid\":\"d200c632-c7d2-4fbd-a672-dea2aa59e569\",\"image\":\"media\\/adminImages\\/customization\\/addonCategoryItem\\/1726849635-image-exps28800_UG143377D12_18_1b_RMS.jpg\",\"imgAlt\":\"image_alt\",\"name\":\"Mozilla\",\"price\":\"100.00\",\"descPrice\":\"90\",\"description\":\"Test Description\",\"weight\":\"100\",\"unit\":\"Ml\",\"type\":\"Veg\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-06T07:00:12.000000Z\",\"updated_at\":\"2024-09-20T16:27:15.000000Z\"}', '127.0.0.1', '2024-09-20 10:57:15', '2024-09-20 10:57:15'),
('aa1eb8b4-4523-47eb-89f3-7f557a05ecf6', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725792239-image-exps28800_UG143377D12_18_1b_RMS.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:43:59.000000Z\"}', '127.0.0.1', '2024-09-08 05:35:26', '2024-09-08 05:35:26'),
('aa6a10bc-b9f6-41f6-8ceb-0d100fdd1d05', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Add', 'addProduct', '{\"uid\":\"35797e09-f04a-44e0-b2d1-930356bb6219\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"name\":\"xfgh\",\"slug\":\"xfgh\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725790258-image-banner1.webp\",\"imageAlt\":\"dfg\",\"itemCode\":\"sdfgh\",\"description\":\"sdfgh\",\"unit\":\"Ml\",\"weight\":\"44\",\"note\":\"sdfg\",\"tag\":\"sdfgh\",\"preparationTime\":\"345\",\"type\":\"Veg\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"ingredients\":\"zsxdfg\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"price\":\"567\",\"disPercent\":\"5\",\"disPrice\":\"538.65\",\"updated_at\":\"2024-09-08T10:10:58.000000Z\",\"created_at\":\"2024-09-08T10:10:58.000000Z\"}', '127.0.0.1', '2024-09-08 04:40:58', '2024-09-08 04:40:58'),
('abd19cea-2fc1-4eb5-91aa-281c8daeb46b', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725792239-image-exps28800_UG143377D12_18_1b_RMS.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:43:59.000000Z\"}', '127.0.0.1', '2024-09-08 05:50:01', '2024-09-08 05:50:01'),
('b0fab347-c800-42f3-8105-41b351edb028', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Add', 'addProduct', '{\"uid\":\"43577036-a80f-4b32-a602-6018934f2117\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"name\":\"zxdfgh sdfghj\",\"slug\":\"zxdfgh-sdfghj\",\"image\":\"media\\/adminImages\\/product\\/product\\/1725781661-image-accounts-payable.png\",\"imageAlt\":\"hgfd\",\"itemCode\":\"gfds\",\"description\":\"dfghjk\",\"unit\":\"Ml\",\"weight\":\"55\",\"note\":\"dfghj\",\"tag\":\"sxdfghj\",\"preparationTime\":\"cfvghj\",\"type\":\"Veg\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"ingredients\":\"sdfghj dfghjk\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"updated_at\":\"2024-09-08T07:47:41.000000Z\",\"created_at\":\"2024-09-08T07:47:41.000000Z\"}', '127.0.0.1', '2024-09-08 02:17:41', '2024-09-08 02:17:41'),
('b22c3215-d077-45f9-977f-c2a7fbe23f18', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725792239-image-exps28800_UG143377D12_18_1b_RMS.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:43:59.000000Z\"}', '127.0.0.1', '2024-09-08 05:26:57', '2024-09-08 05:26:57'),
('b3538830-2fd8-4596-869b-84011eb39931', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateRole', '{\"uid\":\"0c2ddd42-815d-43ec-8cc8-e91c256e4116\",\"name\":\"Hyplap\",\"slug\":\"hyplap\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-08-30T21:20:13.000000Z\",\"updated_at\":\"2024-08-30T21:20:13.000000Z\"}', '127.0.0.1', '2024-09-06 18:15:43', '2024-09-06 18:15:43'),
('b41fec8d-88e6-45a1-8f44-72dd467300f6', 'Samruddhi Surve', 'Update', 'updateProduct', '{\"uid\":\"0737cf58-f31f-49f7-bc5a-c8ff6a6a5728\",\"categoryUid\":\"99176263-f96e-45a6-84ec-aa2abf386a12\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Chicken Cheese Pizza\",\"slug\":\"chicken-cheese-pizza\",\"price\":\"500.00\",\"disPercent\":\"20\",\"disPrice\":\"400.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1726303659-image-th.jpeg\",\"imageAlt\":\"img_alt\",\"itemCode\":\"PRO567\",\"description\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"tag\":\"20 % OFF\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-14T08:47:39.000000Z\",\"updated_at\":\"2024-09-14T09:15:38.000000Z\"}', '127.0.0.1', '2024-09-14 04:18:20', '2024-09-14 04:18:20'),
('b43dbff0-5b9b-4aad-8b8f-c9a3b0c9b3cb', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725792239-image-exps28800_UG143377D12_18_1b_RMS.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:43:59.000000Z\"}', '127.0.0.1', '2024-09-08 23:02:37', '2024-09-08 23:02:37'),
('b4f975a6-5a19-4bf1-a984-44d5e6bec3c9', 'Samruddhi Surve', 'Add', 'addWallethistory', '{\"uid\":\"43ff26a2-d2be-4d59-b1a5-ba6a76064bec\",\"customerUid\":\"253abdeb-aed6-43cb-9ad7-edc25190a7ba\",\"adminRemark\":\"Test\",\"amount\":\"200\",\"type\":\"Debit\",\"flag\":\"admin\",\"createdBy\":\"Samruddhi Surve\",\"updated_at\":\"2024-10-15T12:48:46.000000Z\",\"created_at\":\"2024-10-15T12:48:46.000000Z\"}', '127.0.0.1', '2024-10-15 12:48:46', '2024-10-15 12:48:46'),
('b755c67a-b727-47b2-9547-b27a6f22b2c9', 'Samruddhi Surve', 'Add', 'addCategory', '{\"uid\":\"7c3ba380-9d45-423d-972e-0764570d2dac\",\"name\":null,\"slug\":\"\",\"image\":null,\"imageAlt\":null,\"description\":null,\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"updated_at\":\"2024-10-15T13:04:04.000000Z\",\"created_at\":\"2024-10-15T13:04:04.000000Z\"}', '127.0.0.1', '2024-10-15 13:04:04', '2024-10-15 13:04:04'),
('b8281bfc-ac3b-4644-a80a-d1a8779d9b65', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725791404-image-pizza.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:30:04.000000Z\"}', '127.0.0.1', '2024-09-08 05:06:33', '2024-09-08 05:06:33'),
('bdd41d39-0bb8-46b5-bbb1-ecea7bc9707c', 'Samruddhi Surve', 'Add', 'addCustomization', '{\"uid\":\"fb548df7-a9d3-4315-9536-0e2e477bb890\",\"name\":\"Customization\",\"groupName\":null,\"type\":\"Checkbox\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"updated_at\":\"2024-10-15T13:19:27.000000Z\",\"created_at\":\"2024-10-15T13:19:27.000000Z\"}', '127.0.0.1', '2024-10-15 13:19:27', '2024-10-15 13:19:27'),
('c1f8da7f-7da7-4821-b671-c5d86a1f22d8', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Add', 'addProduct', '{\"uid\":\"7f7f4397-42de-4917-b1a6-f462083c9a11\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"name\":\"sdfg\",\"slug\":\"sdfg\",\"image\":null,\"imageAlt\":null,\"itemCode\":\"efg\",\"description\":\"xs\",\"unit\":\"Ml\",\"weight\":\"44\",\"note\":null,\"tag\":null,\"preparationTime\":\"eecfvg\",\"type\":\"Veg\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"ingredients\":\"s\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"price\":\"444\",\"disPercent\":\"4\",\"disPrice\":\"426.24\",\"updated_at\":\"2024-09-08T10:19:13.000000Z\",\"created_at\":\"2024-09-08T10:19:13.000000Z\"}', '127.0.0.1', '2024-09-08 04:49:13', '2024-09-08 04:49:13'),
('c39f3bed-ed41-4f5f-be44-25e2ba011c54', 'Samruddhi Surve', 'Add', 'addBlog', '{\"uid\":\"ad46bc1d-a92d-439a-b015-983648b9f746\",\"blogCategoryUid\":\"17af4b21-3cfb-482d-aac5-b1fbbd04ea4f\",\"title\":\"In publishing and graphic design, Loram ipsum is a placeholder\",\"slug\":\"in-publishing-and-graphic-design-loram-ipsum-is-a-placeholder\",\"subtitle\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.\",\"image\":\"media\\/adminImages\\/other\\/blog\\/1726251831-image-th (2).jpeg\",\"bannerImage\":\"media\\/adminImages\\/other\\/blog\\/1726251831-bannerImage-th (3).jpeg\",\"imgAlt\":\"img_alt\",\"bannerImageAlt\":\"img_alt\",\"writer\":\"Hyplap\",\"dateTime\":\"2024-09-13T23:53\",\"description1\":\"<p><span style=\\\"color: rgb(77, 81, 86); font-family: Roboto, &quot;helvetica neue&quot;, helvetica, arial, sans-serif;\\\">n publishing and graphic design, Loram ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Loram ipsum may be used as a placeholder before the final copy is available. It is also used to temporarily replace text in a process called greeking, which allows designers to consider the form of a webpage or publicati.<\\/span><br><\\/p>\",\"description2\":\"<p><span style=\\\"color: rgb(77, 81, 86); font-family: Roboto, &quot;helvetica neue&quot;, helvetica, arial, sans-serif;\\\">n publishing and graphic design, Loram ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Loram ipsum may be used as a placeholder before the final copy is available. It is also used to temporarily replace text in a process called greeking, which allows designers to consider the form of a webpage or publicati.<\\/span><br><\\/p>\",\"status\":\"1\",\"createdBy\":\"Samruddhi Surve\",\"updated_at\":\"2024-09-13T18:23:51.000000Z\",\"created_at\":\"2024-09-13T18:23:51.000000Z\"}', '127.0.0.1', '2024-09-13 12:53:51', '2024-09-13 12:53:51'),
('c9eaa106-bd3b-49b4-b058-e05bcaf66e16', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateInfluencer', '{\"id\":null,\"uid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"outletUid\":\"Test\",\"profileImage\":\"media\\/adminImages\\/influencers\\/1725642787-profileImage-student2.jpg\",\"profileImageAlt\":\"Influencer Profile Image\",\"fname\":\"Mansi\",\"lname\":\"Surve\",\"slug\":\"mansi-surve\",\"email\":\"mansi@gmail.com\",\"phone\":\"9889787878\",\"role\":\"influencer\",\"empNo\":\"EMP789\",\"influencerTag\":\"Food Content Creator\",\"influencerBio\":\"n publishing and graphic design, Loram ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Loram ipsum may be used as a placeholder before the final copy is available. It is also used to temporarily replace text in a process called greeking,\",\"influencerFbLink\":\"https:\\/\\/www.facebook.com\\/mansi\",\"influencerInstaLink\":\"https:\\/\\/www.instagram.com\\/mansi\",\"influencerYoutubeLink\":\"https:\\/\\/youtube.com\\/ChannelName\",\"influencerWebsiteLink\":\"https:\\/\\/www.example.com\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-06T17:13:07.000000Z\",\"updated_at\":\"2024-09-06T17:17:46.000000Z\"}', '127.0.0.1', '2024-09-06 11:47:46', '2024-09-06 11:47:46'),
('cb0ca30f-5106-443a-9a23-0841ea4f2dca', 'Samruddhi Surve', 'Add', 'addProduct', '{\"uid\":\"79818f73-2f4e-46d5-87da-e093086bc298\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"name\":\"dfg\",\"slug\":\"dfg\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1726864130-image-image_1634391949017_Two_Loaded_Non-Veg_Medium_Pizza_Combo.avif\",\"imageAlt\":\"df\",\"itemCode\":\"fgh\",\"description\":\"vfgh\",\"unit\":\"Pcs\",\"weight\":\"5\",\"note\":\"vgh\",\"tag\":\"cgh\",\"preparationTime\":\"cg\",\"type\":\"Veg\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"ingredients\":\"ghj\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"updated_at\":\"2024-09-20T20:28:50.000000Z\",\"created_at\":\"2024-09-20T20:28:50.000000Z\"}', '127.0.0.1', '2024-09-20 20:28:50', '2024-09-20 20:28:50'),
('cc8abc8c-ea27-4282-85b3-06f13e57f8d0', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Add', 'addUser', '{\"uid\":\"4a3cc096-fd36-4fba-a6b9-fa2dac537971\",\"profileImage\":\"media\\/adminImages\\/users\\/1725600846-profileImage-hyplap logo.png\",\"profileImageAlt\":\"Hyplap Logo\",\"fname\":\"Hyplap\",\"lname\":\"User\",\"slug\":\"hyplap-user\",\"email\":\"hyplap1@gmail.com\",\"phone\":\"9876543211\",\"role\":\"hyplap\",\"empNo\":\"EMP123\",\"influencerTag\":null,\"influencerBio\":null,\"influencerFbLink\":null,\"influencerInstaLink\":null,\"influencerYoutubeLink\":null,\"influencerWebsiteLink\":null,\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"updated_at\":\"2024-09-06T05:34:06.000000Z\",\"created_at\":\"2024-09-06T05:34:06.000000Z\"}', '127.0.0.1', '2024-09-06 00:04:06', '2024-09-06 00:04:06');
INSERT INTO `logs` (`uid`, `userUid`, `action`, `function`, `data`, `ip`, `created_at`, `updated_at`) VALUES
('d270ba28-fb85-4dbd-985b-3535bb89da38', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725792239-image-exps28800_UG143377D12_18_1b_RMS.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:43:59.000000Z\"}', '127.0.0.1', '2024-09-08 05:31:58', '2024-09-08 05:31:58'),
('d2c4f378-84f9-4297-9b6b-b3e44d8ec463', 'Samruddhi Surve', 'Add', 'addSeopage', '{\"uid\":\"2e47d56e-d830-4c4f-932e-0a9de9df0a95\",\"name\":\"Home\",\"url\":\"\\/\",\"status\":\"1\",\"updated_at\":\"2024-09-13T19:02:07.000000Z\",\"created_at\":\"2024-09-13T19:02:07.000000Z\"}', '127.0.0.1', '2024-09-13 13:32:07', '2024-09-13 13:32:07'),
('d4162e6a-9117-47a1-8e86-e775c6f0cb67', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725792239-image-exps28800_UG143377D12_18_1b_RMS.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:43:59.000000Z\"}', '127.0.0.1', '2024-09-08 05:13:59', '2024-09-08 05:13:59'),
('d6c010de-8845-42b6-a80f-330f32051cb1', 'Samruddhi Surve', 'Update', 'updateUser', '{\"id\":null,\"uid\":\"4a3cc096-fd36-4fba-a6b9-fa2dac537971\",\"outletUid\":null,\"profileImage\":\"media\\/adminImages\\/users\\/1725600846-profileImage-hyplap logo.png\",\"profileImageAlt\":\"Hyplap Logo\",\"fname\":\"Hyplap\",\"lname\":\"User\",\"slug\":\"hyplap-user\",\"email\":\"hyplap1@gmail.com\",\"phone\":\"9876543211\",\"role\":\"hyplap\",\"empNo\":\"EMP123\",\"influencerTag\":null,\"influencerBio\":null,\"influencerFbLink\":null,\"influencerInstaLink\":null,\"influencerYoutubeLink\":null,\"influencerWebsiteLink\":null,\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-06T00:04:06.000000Z\",\"updated_at\":\"2024-09-24T14:11:45.000000Z\"}', '127.0.0.1', '2024-09-24 14:11:45', '2024-09-24 14:11:45'),
('db2d526c-3d71-41e4-8ef7-51a8ffa162c2', 'Samruddhi Surve', 'Add', 'addSeo', '{\"uid\":\"57dba819-3068-4ce5-b466-3425adf0ee2b\",\"type\":\"Product\",\"fieldId\":\"0737cf58-f31f-49f7-bc5a-c8ff6a6a5728\",\"title\":\"Test Title\",\"metaTitle\":\"Test Title\",\"metaKeyword\":null,\"metaAuthor\":null,\"metaRobot\":\"index\",\"twitterImage\":null,\"ogImage\":null,\"ogTitle\":null,\"twitterTitle\":null,\"twitterType\":\"summary\",\"fbogType\":\"website\",\"fbogTitle\":null,\"fbogSiteName\":null,\"metaDescription\":null,\"fbogDescription\":null,\"ogDescription\":null,\"twitterDescription\":null,\"organizationSchema\":null,\"localSchema\":null,\"websiteSchema\":null,\"articleSchema\":null,\"updated_at\":\"2024-09-24T13:15:25.000000Z\",\"created_at\":\"2024-09-24T13:15:25.000000Z\"}', '127.0.0.1', '2024-09-24 13:15:25', '2024-09-24 13:15:25'),
('db6bd7f8-a773-49a1-88ea-714b58390c41', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Add', 'addProduct', '{\"uid\":\"48508e72-f6aa-40df-8905-7529bd2dbcd2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"name\":\"sdfgh ndfghj\",\"slug\":\"sdfgh-ndfghj\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725783477-image-banner2.webp\",\"imageAlt\":\"dfgh\",\"itemCode\":\"dfghj\",\"description\":\"ghj.\",\"unit\":\"Gram\",\"weight\":\"66\",\"note\":\"fghjk\",\"tag\":\"dfghjk\",\"preparationTime\":\"dfghjk\",\"type\":\"Veg\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"ingredients\":\"fghjk\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"updated_at\":\"2024-09-08T08:17:57.000000Z\",\"created_at\":\"2024-09-08T08:17:57.000000Z\"}', '127.0.0.1', '2024-09-08 02:47:57', '2024-09-08 02:47:57'),
('dd0cdf04-40b5-4fb9-8653-83fb1043eef5', 'Samruddhi Surve', 'Add', 'addBlogCategory', '{\"uid\":\"17af4b21-3cfb-482d-aac5-b1fbbd04ea4f\",\"name\":\"Healthy Food\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"updated_at\":\"2024-09-13T18:01:58.000000Z\",\"created_at\":\"2024-09-13T18:01:58.000000Z\"}', '127.0.0.1', '2024-09-13 12:31:58', '2024-09-13 12:31:58'),
('e33b47d1-4782-4259-a215-6f524e0888be', 'Samruddhi Surve', 'Update', 'updateProduct', '{\"uid\":\"0737cf58-f31f-49f7-bc5a-c8ff6a6a5728\",\"categoryUid\":\"99176263-f96e-45a6-84ec-aa2abf386a12\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Chicken Cheese Pizza\",\"slug\":\"chicken-cheese-pizza\",\"price\":\"500.00\",\"disPercent\":\"20\",\"disPrice\":\"400.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1726303659-image-th.jpeg\",\"imageAlt\":\"img_alt\",\"itemCode\":\"PRO567\",\"description\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"tag\":\"20 % OFF\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-14T08:47:39.000000Z\",\"updated_at\":\"2024-09-14T09:15:38.000000Z\"}', '127.0.0.1', '2024-09-14 03:52:00', '2024-09-14 03:52:00'),
('e35060a0-7d2d-465f-8983-3cd3f4cc2fb7', 'Samruddhi Surve', 'Add', 'addCustomer', '{\"uid\":\"253abdeb-aed6-43cb-9ad7-edc25190a7ba\",\"fname\":\"Shrutika\",\"lname\":\"Patil\",\"email\":\"shrutika@gmail.com\",\"phone\":\"9987767676\",\"gender\":\"Female\",\"dateOfBirth\":\"2001-06-23\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"updated_at\":\"2024-09-13T17:00:45.000000Z\",\"created_at\":\"2024-09-13T17:00:45.000000Z\"}', '127.0.0.1', '2024-09-13 11:30:45', '2024-09-13 11:30:45'),
('e3b7419a-be4e-4744-ac1f-066ed1b23112', 'Samruddhi Surve', 'Add', 'addCombo', '{\"uid\":\"7b6554e8-7e95-48cf-ba8a-1ef93be06074\",\"productUid\":\"0737cf58-f31f-49f7-bc5a-c8ff6a6a5728,3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"coverImage\":\"media\\/adminImages\\/customization\\/combo\\/1726851066-coverImage-image_1634391949017_Two_Loaded_Non-Veg_Medium_Pizza_Combo.avif\",\"name\":\"Order Two Loaded Medium Pizza Combo\",\"price\":\"999\",\"descPrice\":\"899.10\",\"descPercentage\":\"10\",\"count\":\"2\",\"status\":\"1\",\"description\":\"In publishing and graphic design, Loram ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Loram ipsum may be used as a placeholder before the final\",\"updated_at\":\"2024-09-20T16:51:06.000000Z\",\"created_at\":\"2024-09-20T16:51:06.000000Z\"}', '127.0.0.1', '2024-09-20 11:21:06', '2024-09-20 11:21:06'),
('e5d6ee2f-bf95-4a81-8cfe-2296c67b0c8d', 'Samruddhi Surve', 'Add', 'addCustomization', '{\"uid\":\"d200c632-c7d2-4fbd-a672-dea2aa59e569\",\"name\":\"Test Customization\",\"groupName\":\"Test Group Name\",\"type\":\"Checkbox\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"updated_at\":\"2024-09-20T16:15:09.000000Z\",\"created_at\":\"2024-09-20T16:15:09.000000Z\"}', '127.0.0.1', '2024-09-20 10:45:09', '2024-09-20 10:45:09'),
('e7aab16c-a597-495d-bd64-502f956e26f4', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725791404-image-pizza.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:30:04.000000Z\"}', '127.0.0.1', '2024-09-08 05:12:21', '2024-09-08 05:12:21'),
('f049385b-1f84-4609-9866-a67e8bb73f71', 'Samruddhi Surve', 'Update', 'updateAddonCategory', '{\"uid\":\"a80ace74-f756-4127-8bdb-465f9169acc6\",\"categoryUid\":\"99176263-f96e-45a6-84ec-aa2abf386a12,a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"type\":\"Radio\",\"name\":\"Cheese\",\"flag\":\"Customize\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-06T01:23:54.000000Z\",\"updated_at\":\"2024-09-24T12:48:21.000000Z\"}', '127.0.0.1', '2024-09-24 12:48:21', '2024-09-24 12:48:21'),
('f126c2c0-66b2-4fa4-8cac-3ae4df7b6ab5', 'Samruddhi Surve', 'Update', 'updateRole', '{\"uid\":\"af0fbca5-9a05-4937-981e-6b625768201c\",\"name\":null,\"slug\":\"\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-10-21T05:53:17.000000Z\",\"updated_at\":\"2024-10-21T05:54:37.000000Z\"}', '127.0.0.1', '2024-10-21 05:54:37', '2024-10-21 05:54:37'),
('f4a98eda-0258-4aeb-9c69-fbba62069b19', 'Samruddhi Surve', 'Update', 'updateBlogCategory', '{\"uid\":\"17af4b21-3cfb-482d-aac5-b1fbbd04ea4f\",\"name\":\"Healthy Food\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-13T18:01:58.000000Z\",\"updated_at\":\"2024-09-13T18:03:02.000000Z\"}', '127.0.0.1', '2024-09-13 12:33:02', '2024-09-13 12:33:02'),
('f82d5c53-9550-482a-b019-f775ae75f9f0', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateInfluencer', '{\"id\":null,\"uid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"outletUid\":null,\"profileImage\":\"media\\/adminImages\\/influencers\\/1725642787-profileImage-student2.jpg\",\"profileImageAlt\":\"Influencer Profile Image\",\"fname\":\"Mansi\",\"lname\":\"Surve\",\"slug\":\"mansi-surve\",\"email\":\"mansi@gmail.com\",\"phone\":\"9889787878\",\"role\":\"influencer\",\"empNo\":\"EMP789\",\"influencerTag\":null,\"influencerBio\":\"n publishing and graphic design, Loram ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Loram ipsum may be used as a placeholder before the final copy is available. It is also used to temporarily replace text in a process called greeking,\",\"influencerFbLink\":\"https:\\/\\/www.facebook.com\\/mansi\",\"influencerInstaLink\":\"https:\\/\\/www.instagram.com\\/mansi\",\"influencerYoutubeLink\":\"https:\\/\\/youtube.com\\/ChannelName\",\"influencerWebsiteLink\":\"https:\\/\\/www.example.com\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-06T17:13:07.000000Z\",\"updated_at\":\"2024-09-06T17:14:28.000000Z\"}', '127.0.0.1', '2024-09-06 11:44:28', '2024-09-06 11:44:28'),
('f8b21a40-7c9d-405c-808c-3da4002c1448', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Update', 'updateProduct', '{\"uid\":\"3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"Cheesy Veg Burger\",\"slug\":\"cheesy-veg-burger\",\"price\":\"100.00\",\"disPercent\":\"10\",\"disPrice\":\"90.00\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725792239-image-exps28800_UG143377D12_18_1b_RMS.jpg\",\"imageAlt\":\"Pizza\",\"itemCode\":\"PRO123\",\"description\":\"Packed with goodness \\u2013 though your kids would never know\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Packed with goodness \\u2013 though your kids would never know\",\"tag\":\"Bestceller\",\"preparationTime\":\"30 Mins\",\"type\":\"Veg\",\"ingredients\":\"2 large carrots, peeled and coarsely grated,1 tbsp soy sauce\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-08T10:25:13.000000Z\",\"updated_at\":\"2024-09-08T10:43:59.000000Z\"}', '127.0.0.1', '2024-09-08 06:06:20', '2024-09-08 06:06:20'),
('f98cdbbc-c85a-47e8-9b45-acf06f021eaf', 'Samruddhi Surve', 'Update', 'updateProduct', '{\"uid\":\"79818f73-2f4e-46d5-87da-e093086bc298\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"name\":\"dfg\",\"slug\":\"dfg\",\"price\":null,\"disPercent\":null,\"disPrice\":null,\"image\":\"media\\/adminImages\\/Product\\/Product\\/1726864130-image-image_1634391949017_Two_Loaded_Non-Veg_Medium_Pizza_Combo.avif\",\"imageAlt\":\"df\",\"itemCode\":\"fgh\",\"description\":\"vfgh\",\"unit\":\"Pcs\",\"weight\":\"5\",\"note\":\"vgh\",\"tag\":\"cgh\",\"preparationTime\":\"cg\",\"type\":\"Veg\",\"ingredients\":\"ghj\",\"createdBy\":\"Samruddhi Surve\",\"status\":\"1\",\"deleteId\":0,\"created_at\":\"2024-09-20T20:28:50.000000Z\",\"updated_at\":\"2024-09-20T20:28:50.000000Z\"}', '127.0.0.1', '2024-09-20 21:04:42', '2024-09-20 21:04:42'),
('fb316329-4653-457a-a893-e496c17ba5e8', '1d1f8cfe-c444-4d81-abed-5430254c249d', 'Add', 'addProduct', '{\"uid\":\"0ae3d689-b609-489a-b3a0-007e8902e7d7\",\"categoryUid\":\"a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5\",\"name\":\"dcfgh\",\"slug\":\"dcfgh\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1725782942-image-banner3.webp\",\"imageAlt\":\"xdcf\",\"itemCode\":\"dfgh\",\"description\":\"dfghj\",\"unit\":\"Ml\",\"weight\":\"55\",\"note\":\"dfghj\",\"tag\":\"dfgh\",\"preparationTime\":\"efgh\",\"type\":\"Veg\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"ingredients\":\"fg dfghj\",\"createdBy\":\"1d1f8cfe-c444-4d81-abed-5430254c249d\",\"status\":\"1\",\"updated_at\":\"2024-09-08T08:09:02.000000Z\",\"created_at\":\"2024-09-08T08:09:02.000000Z\"}', '127.0.0.1', '2024-09-08 02:39:02', '2024-09-08 02:39:02'),
('fb847d97-2fbb-436a-9138-6a7074013bc5', NULL, 'Add', 'addProduct', '{\"uid\":\"fef2bc54-c713-48b3-9556-75745275132c\",\"categoryUid\":\"99176263-f96e-45a6-84ec-aa2abf386a12\",\"name\":\"Classic Panner Pizza\",\"slug\":\"classic-panner-pizza\",\"image\":\"media\\/adminImages\\/Product\\/Product\\/1726245972-image-pizza.jpg\",\"imageAlt\":\"Pizza_img\",\"itemCode\":\"PRO56\",\"description\":\"Ever looked at Pizza Toppings and wondered, \\\"WHY SO LESS\\\"?\\r\\nWell, we did. And we definitely wanted more! So, we immediately took it upon ourselves to fix it, and made the pizzas that we all deserve - PIZZAS LOADED WITH\",\"unit\":\"Pcs\",\"weight\":\"1\",\"note\":\"Ever looked at Pizza Toppings and wondered, \\\"WHY SO LESS\\\"?\\r\\nWell, we did. And we definitely wanted more! So, we immediately took it upon ourselves to fix it, and made the pizzas that we all deserve - PIZZAS LOADED WITH\",\"tag\":\"Bestceller\",\"preparationTime\":\"15 Mins\",\"type\":\"Veg\",\"influencerUid\":\"e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49\",\"ingredients\":\"Ever looked at Pizza Toppings and wondered, \\\"WHY SO LESS\\\"\",\"createdBy\":null,\"status\":\"1\",\"price\":\"300\",\"disPercent\":\"0\",\"disPrice\":\"300.00\",\"updated_at\":\"2024-09-13T16:46:12.000000Z\",\"created_at\":\"2024-09-13T16:46:12.000000Z\"}', '127.0.0.1', '2024-09-13 11:16:12', '2024-09-13 11:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '2024_08_27_061351_create_serviceablepincodes_table', 1),
(4, '2024_08_27_062711_create_outlets_table', 1),
(5, '2024_08_27_063201_create_rolepermissions_table', 1),
(6, '2024_08_27_063901_create_permissions_table', 1),
(7, '2024_08_27_064058_create_userpermissions_table', 1),
(8, '2024_08_27_064442_create_roles_table', 1),
(9, '2024_08_27_064916_create_categories_table', 1),
(10, '2024_08_27_065115_create_products_table', 1),
(11, '2024_08_27_065536_create_productimagevideos_table', 2),
(12, '2024_08_27_070219_create_productnutritions_table', 2),
(13, '2024_08_27_070506_create_productreviews_table', 2),
(14, '2024_08_27_070833_create_customers_table', 2),
(15, '2024_08_27_071247_create_productvarients_table', 2),
(16, '2024_08_27_071810_create_customeraddresses_table', 2),
(17, '2024_08_27_072312_create_wallets_table', 2),
(18, '2024_08_27_072507_create_wallethistories_table', 2),
(19, '2024_08_29_060551_create_testimonials_table', 2),
(20, '2024_08_29_061159_create_newsletters_table', 2),
(21, '2024_08_29_061633_create_faqs_table', 2),
(22, '2024_08_29_062103_create_enquiries_table', 2),
(23, '2024_08_29_062414_create_blogcategories_table', 2),
(24, '2024_08_29_062745_create_blogs_table', 2),
(25, '2024_08_29_063408_create_notificationsegments_table', 2),
(26, '2024_08_29_063630_create_notificationsegmentusers_table', 2),
(27, '2024_08_29_063837_create_notifications_table', 2),
(28, '2024_08_29_063924_create_notificationusers_table', 2),
(29, '2024_08_29_064322_create_sentnotifications_table', 2),
(30, '2024_08_29_064551_create_banners_table', 2),
(31, '2024_08_29_064805_create_coupons_table', 2),
(32, '2024_08_29_065542_create_couponlogs_table', 2),
(33, '2024_08_29_070021_create_seopages_table', 2),
(34, '2024_08_29_070419_create_seos_table', 2),
(35, '2024_08_29_071307_create_customizeproducts_table', 2),
(36, '2024_08_29_071737_create_carts_table', 2),
(37, '2024_08_29_072151_create_cartaddons_table', 2),
(38, '2024_08_29_072456_create_wishlists_table', 2),
(39, '2024_08_29_072648_create_transactions_table', 2),
(40, '2024_08_29_073240_create_orders_table', 2),
(41, '2024_08_29_073603_create_orderaddons_table', 2),
(43, '2024_08_29_104403_create_productinfluencervideos_table', 2),
(44, '2024_08_29_105753_create_addoncategories_table', 2),
(45, '2024_08_29_110136_create_addoncategoryitems_table', 2),
(46, '2024_08_29_121404_create_logs_table', 2),
(47, '2024_09_02_082659_create_quicksearches_table', 2),
(48, '2024_09_18_113648_create_customizations_table', 2),
(49, '2024_09_19_110617_create_combos_table', 2),
(50, '2024_08_29_102827_create_outletproducts_table', 3),
(51, '2024_09_25_102327_create_states_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `uid` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `uid` varchar(255) NOT NULL,
  `notificationSegmentUid` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `redirectionPage` varchar(255) DEFAULT NULL,
  `redirectionPageUid` varchar(255) DEFAULT NULL,
  `finalUrlPath` varchar(255) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notificationsegments`
--

CREATE TABLE `notificationsegments` (
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notificationsegments`
--

INSERT INTO `notificationsegments` (`uid`, `name`, `createdBy`, `deleteId`, `created_at`, `updated_at`) VALUES
('729fb6d4-42e2-4b75-bfcf-ceb52eefb0c4', 'Test Segment', 'Samruddhi Surve', 0, '2024-09-20 11:49:29', '2024-09-20 11:49:29');

-- --------------------------------------------------------

--
-- Table structure for table `notificationsegmentusers`
--

CREATE TABLE `notificationsegmentusers` (
  `uid` varchar(255) NOT NULL,
  `notificationSegmentUid` varchar(255) DEFAULT NULL,
  `customerUid` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notificationsegmentusers`
--

INSERT INTO `notificationsegmentusers` (`uid`, `notificationSegmentUid`, `customerUid`, `created_at`, `updated_at`) VALUES
('1b3a3d54-a569-4030-8b80-773b0f756a8d', '729fb6d4-42e2-4b75-bfcf-ceb52eefb0c4', '253abdeb-aed6-43cb-9ad7-edc25190a7ba', '2024-09-20 11:49:29', '2024-09-20 11:49:29'),
('1b3a3d54-a569-46730-8b80-77389b0f756a67', '729fb6d4-42e2-4b75-bfcf-ceb52eefb0c4', '673abdeb-aed6-43cb-9rh7-edc26y90a6yh', '2024-09-20 11:49:29', '2024-09-20 11:49:29');

-- --------------------------------------------------------

--
-- Table structure for table `notificationusers`
--

CREATE TABLE `notificationusers` (
  `uid` varchar(255) NOT NULL,
  `notificationUid` varchar(255) DEFAULT NULL,
  `customerUid` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `uid` varchar(255) NOT NULL,
  `trxUid` varchar(255) DEFAULT NULL,
  `productUid` varchar(255) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productVarientUid` varchar(255) DEFAULT NULL,
  `productVarientName` varchar(255) DEFAULT NULL,
  `customizeName` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `actualProductPrice` decimal(8,2) DEFAULT NULL,
  `actualTotalAddonAmount` decimal(8,2) DEFAULT NULL,
  `totalDiscountAmount` decimal(8,2) DEFAULT NULL,
  `totalPaidPrice` decimal(8,2) DEFAULT NULL,
  `influencerUid` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderaddons`
--

CREATE TABLE `orderaddons` (
  `uid` varchar(255) NOT NULL,
  `orderUid` varchar(255) DEFAULT NULL,
  `addonCategoryItemUid` varchar(255) DEFAULT NULL,
  `addonCategoryItemName` varchar(255) DEFAULT NULL,
  `actualPrice` decimal(8,2) DEFAULT NULL,
  `discountPrice` decimal(8,2) DEFAULT NULL,
  `paidPrice` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `outletproducts`
--

CREATE TABLE `outletproducts` (
  `uid` varchar(255) NOT NULL,
  `outletUid` varchar(255) DEFAULT NULL,
  `productUid` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outletproducts`
--

INSERT INTO `outletproducts` (`uid`, `outletUid`, `productUid`, `created_at`, `updated_at`) VALUES
('7f042c8d-9668-4239-9d59-d20890b2bb23', '5d048c91-f444-406b-8fd2-0b5f436a0f2d', 'fef2bc54-c713-48b3-9556-75745275132c', '2024-10-15 12:44:46', '2024-10-15 12:44:46'),
('7fbf66c5-cc62-4879-91dc-26418ea5f532', '5d048c91-f444-406b-8fd2-0b5f436a0f2d', '0737cf58-f31f-49f7-bc5a-c8ff6a6a5728', '2024-10-15 12:44:46', '2024-10-15 12:44:46');

-- --------------------------------------------------------

--
-- Table structure for table `outlets`
--

CREATE TABLE `outlets` (
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `cityId` varchar(255) DEFAULT NULL,
  `stateId` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `areaRadius` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `long` varchar(255) DEFAULT NULL,
  `placeId` varchar(255) DEFAULT NULL,
  `googleAddress` text DEFAULT NULL,
  `contactFname` varchar(255) DEFAULT NULL,
  `contactLname` varchar(255) DEFAULT NULL,
  `contactPhone` varchar(255) DEFAULT NULL,
  `contactEmail` varchar(255) DEFAULT NULL,
  `fassaiNo` varchar(255) DEFAULT NULL,
  `invoicePrefix` varchar(255) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outlets`
--

INSERT INTO `outlets` (`uid`, `name`, `type`, `cityId`, `stateId`, `pincode`, `areaRadius`, `address1`, `address2`, `lat`, `long`, `placeId`, `googleAddress`, `contactFname`, `contactLname`, `contactPhone`, `contactEmail`, `fassaiNo`, `invoicePrefix`, `createdBy`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
('5d048c91-f444-406b-8fd2-0b5f436a0f2d', 'Nerul Outlet', 'Outlet', 'Nerul', '21', '400706', '400 Sq Ft', 'Nerul West', 'Nerul West', '19.0363194', '73.0154376', 'ChIJhz2evenD5zsRNVKVwEsD87I', 'Nerul West, Nerul, Navi Mumbai, Maharashtra 400706, India', 'Rahul', 'Patil', '8787878787', 'rahul@gmail.com', '12334567678765', 'NU', 'Samruddhi Surve', 1, 0, '2024-09-13 10:58:39', '2024-10-15 12:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `uid` varchar(255) NOT NULL,
  `panel` varchar(255) DEFAULT NULL,
  `tab` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productimagevideos`
--

CREATE TABLE `productimagevideos` (
  `uid` varchar(255) NOT NULL,
  `productUid` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  `imageAlt` varchar(255) DEFAULT NULL,
  `thumbnailImg` varchar(255) DEFAULT NULL,
  `thumbnailImgAlt` varchar(255) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productimagevideos`
--

INSERT INTO `productimagevideos` (`uid`, `productUid`, `type`, `path`, `sequence`, `imageAlt`, `thumbnailImg`, `thumbnailImgAlt`, `createdBy`, `created_at`, `updated_at`) VALUES
('0718ab59-a5b5-49a2-939b-cd7c91e9b2bf', 'fef2bc54-c713-48b3-9556-75745275132c', 'Image', 'media/adminImages/Product/Product/1726245972-th (1).jpeg', 1, 'pizza_img', NULL, NULL, 'Samruddhi Surve', '2024-09-13 11:16:12', '2024-09-13 11:16:12'),
('20fa4879-030f-42b3-be54-e281a26fbd90', '0737cf58-f31f-49f7-bc5a-c8ff6a6a5728', 'Video', 'youtubevideo.com', 3, NULL, 'media/adminImages/Product/Product/1726303659-exps28800_UG143377D12_18_1b_RMS.jpg', 'img_alt1', 'Samruddhi Surve', '2024-09-14 03:17:39', '2024-09-14 03:50:17'),
('2aec2407-8b09-4818-afb8-5349ba26cee9', '0737cf58-f31f-49f7-bc5a-c8ff6a6a5728', 'Image', 'media/adminImages/Product/Product/1726303659-pizza.jpg', 1, 'img_alt3', NULL, NULL, 'Samruddhi Surve', '2024-09-14 03:17:39', '2024-09-14 03:45:38'),
('313b547d-8df5-4820-96f9-3d30ba4cea96', '0737cf58-f31f-49f7-bc5a-c8ff6a6a5728', 'Video', 'youtube.com', 4, NULL, 'media/adminImages/Product/Product/1726303659-th.jpeg', 'img_alt2', 'Samruddhi Surve', '2024-09-14 03:17:39', '2024-09-14 03:45:38'),
('3b1543df-398d-4fc3-a8fc-f34ec38f67ca', 'fef2bc54-c713-48b3-9556-75745275132c', 'Image', 'media/adminImages/Product/Product/1726245972-th.jpeg', 2, 'pizza_img', NULL, NULL, 'Samruddhi Surve', '2024-09-13 11:16:12', '2024-09-13 11:16:12'),
('7b9beef2-3e8e-47b2-a09b-4d5cbe2a35ce', '3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2', 'Image', 'media/adminImages/Product/Product/1725794896-th (2).jpeg', 1, 'Image 1', NULL, NULL, 'Samruddhi Surve', '2024-09-08 05:58:16', '2024-09-08 06:05:10'),
('97120823-038e-4a0b-9eb7-80ff6af10f91', '0737cf58-f31f-49f7-bc5a-c8ff6a6a5728', 'Image', 'media/adminImages/Product/Product/1726303659-th (1).jpeg', 2, 'img_alt4', NULL, NULL, 'Samruddhi Surve', '2024-09-14 03:17:39', '2024-09-14 03:45:38'),
('bf00b1b1-0553-4960-b32b-b72286c2f7c4', '3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2', 'Image', 'media/adminImages/Product/Product/1725794896-th (3).jpeg', 2, 'Image 2', NULL, NULL, 'Samruddhi Surve', '2024-09-08 05:58:16', '2024-09-08 23:02:37');

-- --------------------------------------------------------

--
-- Table structure for table `productinfluencervideos`
--

CREATE TABLE `productinfluencervideos` (
  `uid` varchar(255) NOT NULL,
  `productUid` varchar(255) DEFAULT NULL,
  `influencerUid` varchar(255) DEFAULT NULL,
  `videoPath` varchar(255) DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productinfluencervideos`
--

INSERT INTO `productinfluencervideos` (`uid`, `productUid`, `influencerUid`, `videoPath`, `sequence`, `createdBy`, `created_at`, `updated_at`) VALUES
('582dab5f-89c5-48bf-9f1a-d1a16a3a06a4', '0737cf58-f31f-49f7-bc5a-c8ff6a6a5728', 'e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49', 'https://youtu.be/EngW7tLk6R8?feature=shared', 1, 'Samruddhi Surve', '2024-09-24 12:54:28', '2024-09-24 12:54:28'),
('5bb2d62b-850c-4700-aa86-0352f3f1ff90', '357d105a-e4b8-4bb7-bf7c-e6b51cec3731', 'e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49', 'media/adminImages/product/category/1725665535-videoPath-big_buck_bunny_720p_1mb.mp4', 1, '1d1f8cfe-c444-4d81-abed-5430254c249d', '2024-09-06 18:02:15', '2024-09-06 18:02:15');

-- --------------------------------------------------------

--
-- Table structure for table `productnutritions`
--

CREATE TABLE `productnutritions` (
  `uid` varchar(255) NOT NULL,
  `productUid` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productnutritions`
--

INSERT INTO `productnutritions` (`uid`, `productUid`, `name`, `value`, `createdBy`, `created_at`, `updated_at`) VALUES
('09dfb245-42fb-45d9-a24b-0b4b9149881c', '3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2', 'Protien', '8 Gram', '1d1f8cfe-c444-4d81-abed-5430254c249d', '2024-09-08 23:02:37', '2024-09-08 23:02:37'),
('0d887e94-6d5b-4b50-bd15-8ce62116f1a3', '3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2', 'Carbs', '21 Gram', '1d1f8cfe-c444-4d81-abed-5430254c249d', '2024-09-08 23:02:37', '2024-09-08 23:02:37'),
('1a2ff037-394d-474b-81d0-f67d9955b655', 'fef2bc54-c713-48b3-9556-75745275132c', 'Protien', '10 Gram', NULL, '2024-09-13 11:16:12', '2024-09-13 11:16:12'),
('6d706260-fd88-4c83-844e-36626f6772a6', '3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2', 'Suger', '5 Gram', '1d1f8cfe-c444-4d81-abed-5430254c249d', '2024-09-08 23:02:37', '2024-09-08 23:02:37'),
('ae596332-c4df-4690-9ab1-06b003296063', '0737cf58-f31f-49f7-bc5a-c8ff6a6a5728', 'Protine', '20 Gram', 'Samruddhi Surve', '2024-09-25 06:57:08', '2024-09-25 06:57:08'),
('cd72de3e-e99e-4584-a21d-5514730a5eb9', 'fef2bc54-c713-48b3-9556-75745275132c', 'Fat', '15 Gram', NULL, '2024-09-13 11:16:12', '2024-09-13 11:16:12'),
('ec0859e0-1d08-4929-bb06-1288f871b4b7', '0737cf58-f31f-49f7-bc5a-c8ff6a6a5728', 'Fats', '30 Gram', 'Samruddhi Surve', '2024-09-25 06:57:08', '2024-09-25 06:57:08'),
('f7fd60b0-2c0d-4492-9d9b-1ad3ac6808ba', '3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2', 'Fat', '10 Gram', '1d1f8cfe-c444-4d81-abed-5430254c249d', '2024-09-08 23:02:37', '2024-09-08 23:02:37');

-- --------------------------------------------------------

--
-- Table structure for table `productreviews`
--

CREATE TABLE `productreviews` (
  `uid` varchar(255) NOT NULL,
  `productUid` varchar(255) DEFAULT NULL,
  `customerUid` varchar(255) DEFAULT NULL,
  `orderUid` varchar(255) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `starCount` int(11) DEFAULT NULL,
  `adminReply` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `uid` varchar(255) NOT NULL,
  `categoryUid` varchar(255) DEFAULT NULL,
  `influencerUid` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `imageAlt` varchar(255) DEFAULT NULL,
  `itemCode` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `preparationTime` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `ingredients` varchar(255) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`uid`, `categoryUid`, `influencerUid`, `name`, `slug`, `image`, `imageAlt`, `itemCode`, `description`, `unit`, `weight`, `note`, `tag`, `preparationTime`, `type`, `ingredients`, `createdBy`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
('0737cf58-f31f-49f7-bc5a-c8ff6a6a5728', '99176263-f96e-45a6-84ec-aa2abf386a12', 'e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49', 'Chicken Cheese Pizza', 'chicken-cheese-pizza', 'media/adminImages/Product/Product/1726303659-image-th.jpeg', 'img_alt', 'PRO567', 'In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly', 'Pcs', 1, 'In publishing and graphic design, Loram ipsum is a placeholder text commonly In publishing and graphic design, Loram ipsum is a placeholder text commonly', '20 % OFF', '30 Mins', 'Veg', 'In publishing and graphic design, Loram ipsum is a placeholder text commonly', 'Samruddhi Surve', 1, 0, '2024-09-14 03:17:39', '2024-09-14 03:45:38'),
('3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2', 'a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5', 'e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49', 'Cheesy Veg Burger', 'cheesy-veg-burger', 'media/adminImages/Product/Product/1725792239-image-exps28800_UG143377D12_18_1b_RMS.jpg', 'Pizza', 'PRO123', 'Packed with goodness – though your kids would never know', 'Pcs', 1, 'Packed with goodness – though your kids would never know', 'Bestceller', '30 Mins', 'Veg', '2 large carrots, peeled and coarsely grated,1 tbsp soy sauce', 'Samruddhi Surve', 1, 0, '2024-09-08 04:55:13', '2024-09-08 05:13:59'),
('79818f73-2f4e-46d5-87da-e093086bc298', 'a2d4aff5-48c4-4480-bbab-8f1a06dc9fc5', 'e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49', 'dfg', 'dfg', 'media/adminImages/Product/Product/1726864130-image-image_1634391949017_Two_Loaded_Non-Veg_Medium_Pizza_Combo.avif', 'df', 'fgh', 'vfgh', 'Pcs', 5, 'vgh', 'cgh', 'cg', 'Veg', 'ghj', 'Samruddhi Surve', 1, 0, '2024-09-20 20:28:50', '2024-09-20 20:28:50'),
('fef2bc54-c713-48b3-9556-75745275132c', '99176263-f96e-45a6-84ec-aa2abf386a12', 'e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49', 'Classic Panner Pizza', 'classic-panner-pizza', 'media/adminImages/Product/Product/1726245972-image-pizza.jpg', 'Pizza_img', 'PRO56', 'Ever looked at Pizza Toppings and wondered, \"WHY SO LESS\"?\r\nWell, we did. And we definitely wanted more! So, we immediately took it upon ourselves to fix it, and made the pizzas that we all deserve - PIZZAS LOADED WITH', 'Pcs', 1, 'Ever looked at Pizza Toppings and wondered, \"WHY SO LESS\"?\r\nWell, we did. And we definitely wanted more! So, we immediately took it upon ourselves to fix it, and made the pizzas that we all deserve - PIZZAS LOADED WITH', 'Bestceller', '15 Mins', 'Veg', 'Ever looked at Pizza Toppings and wondered, \"WHY SO LESS\"', 'Samruddhi Surve', 1, 0, '2024-09-13 11:16:12', '2024-09-13 11:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `productvarients`
--

CREATE TABLE `productvarients` (
  `uid` varchar(255) NOT NULL,
  `productUid` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `imageAlt` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `disPercent` int(11) DEFAULT NULL,
  `disPrice` decimal(8,2) DEFAULT NULL,
  `availability` varchar(255) DEFAULT NULL,
  `mainpriceFlag` varchar(11) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productvarients`
--

INSERT INTO `productvarients` (`uid`, `productUid`, `image`, `imageAlt`, `name`, `price`, `disPercent`, `disPrice`, `availability`, `mainpriceFlag`, `createdBy`, `created_at`, `updated_at`) VALUES
('04d4ec4f-3a19-4051-939a-f6e88c30aef8', '79818f73-2f4e-46d5-87da-e093086bc298', 'media/adminImages/Product/Product/1726303659-image-th.jpeg', NULL, 'fgh', 456.00, 5, 433.20, 'yes', '0', 'Samruddhi Surve', '2024-09-20 21:04:42', '2024-09-20 21:04:42'),
('3149d0d8-e9b7-44b6-82c9-909ed2052c86', '3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2', NULL, NULL, 'Large', 180.00, 10, 162.00, 'Yes', '1', 'Samruddhi Surve', '2024-09-08 23:02:37', '2024-09-08 23:02:37'),
('33eadb5c-f137-472c-b855-0b3f8fb3a1a5', '3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2', NULL, NULL, 'Medium', 160.00, 10, 144.00, 'yes', '0', 'Samruddhi Surve', '2024-09-08 23:02:37', '2024-09-08 23:02:37'),
('36be5a55-cfd6-4b25-9d2f-2650c147317c', '79818f73-2f4e-46d5-87da-e093086bc298', NULL, NULL, NULL, 567.00, 77, 130.41, 'Yes', '1', 'Samruddhi Surve', '2024-09-20 21:04:42', '2024-09-20 21:04:42'),
('3d46b5b7-deb6-4b9a-9b1d-56fbb9c5b820', '3c12fdb5-21f8-4a42-b8cc-a335bb0fb7a2', NULL, NULL, 'Small', 120.00, 10, 108.00, 'Yes', '0', 'Samruddhi Surve', '2024-09-08 23:02:37', '2024-09-08 23:02:37'),
('8bfb9454-2a38-4de6-ba00-7ac134ab61c9', 'fef2bc54-c713-48b3-9556-75745275132c', NULL, 'pizza_img', 'Small', 200.00, 0, 200.00, 'Yes', '0', 'Samruddhi Surve', '2024-09-13 11:16:12', '2024-09-13 11:16:12'),
('8c458a98-9b69-4a9e-904b-4d31175c8b9a', 'fef2bc54-c713-48b3-9556-75745275132c', NULL, 'pizza_img', 'Medium', 400.00, 0, 400.00, 'Yes', '1', 'Samruddhi Surve', '2024-09-13 11:16:12', '2024-09-13 11:16:12'),
('8ec06039-8c84-4a98-a4f9-8e92cd057543', '0737cf58-f31f-49f7-bc5a-c8ff6a6a5728', NULL, NULL, NULL, 900.00, 20, 720.00, 'Yes', '1', 'Samruddhi Surve', '2024-09-25 05:20:08', '2024-09-25 06:57:08'),
('e4b42cf9-f27f-4478-8f71-84aec77f86a4', '0737cf58-f31f-49f7-bc5a-c8ff6a6a5728', NULL, 'img_alt', 'Large', 800.00, 10, 720.00, 'yes', '0', 'Samruddhi Surve', '2024-09-25 06:57:08', '2024-09-25 06:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `quicksearches`
--

CREATE TABLE `quicksearches` (
  `uid` varchar(255) NOT NULL,
  `tabGroup` varchar(255) DEFAULT NULL,
  `tabName` varchar(255) DEFAULT NULL,
  `svg` text DEFAULT NULL,
  `tabUrl` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quicksearches`
--

INSERT INTO `quicksearches` (`uid`, `tabGroup`, `tabName`, `svg`, `tabUrl`, `created_at`, `updated_at`) VALUES
('ef0c421c-8e35-4cf9-bd60-20e58d1b0e59', 'User', 'Shop Users', '<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\">\r\n												<g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\r\n													<polygon points=\"0 0 24 0 24 24 0 24\" />\r\n													<path d=\"M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z\" fill=\"currentColor\" fill-rule=\"nonzero\" opacity=\"0.3\" />\r\n													<path d=\"M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z\" fill=\"currentColor\" fill-rule=\"nonzero\" />\r\n												</g>\r\n											</svg>', 'admin/user', '2024-09-02 03:47:42', '2024-09-02 03:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `rolepermissions`
--

CREATE TABLE `rolepermissions` (
  `uid` varchar(255) NOT NULL,
  `roleUid` varchar(255) DEFAULT NULL,
  `permission` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`uid`, `name`, `slug`, `createdBy`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
('0c2ddd42-815d-43ec-8cc8-e91c256e4116', 'Hyplap', 'hyplap', '1d1f8cfe-c444-4d81-abed-5430254c249d', 1, 0, '2024-08-30 15:50:13', '2024-08-30 15:50:13'),
('af0fbca5-9a05-4937-981e-6b625768201c', 'Super Admin', 'super-admin', 'Samruddhi Surve', 1, 0, '2024-10-21 05:53:17', '2024-10-21 05:55:04'),
('e4577323-7626-4834-b9a8-71af491f2a58', 'Admin', 'admin', 'Samruddhi Surve', 1, 0, '2024-10-21 05:49:50', '2024-10-21 05:49:50'),
('f655fe2e-8897-4120-8462-f2e646595916', 'Influencer', 'influencer', '1d1f8cfe-c444-4d81-abed-5430254c249d', 1, 0, '2024-09-04 01:40:09', '2024-09-04 01:40:09');

-- --------------------------------------------------------

--
-- Table structure for table `sentnotifications`
--

CREATE TABLE `sentnotifications` (
  `uid` varchar(255) NOT NULL,
  `notificationUid` varchar(255) DEFAULT NULL,
  `customerUid` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seopages`
--

CREATE TABLE `seopages` (
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seopages`
--

INSERT INTO `seopages` (`uid`, `name`, `url`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
('2e47d56e-d830-4c4f-932e-0a9de9df0a95', 'Home', '/', 1, 0, '2024-09-13 13:32:07', '2024-09-13 13:32:07'),
('7529cc5f-b970-40f6-9698-7b2dbeb8a839', 'Blog', 'our-blogs', 1, 0, '2024-09-13 13:30:04', '2024-09-13 13:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `uid` varchar(255) NOT NULL,
  `fieldId` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `metaTitle` varchar(255) DEFAULT NULL,
  `metaKeyword` varchar(255) DEFAULT NULL,
  `metaAuthor` varchar(255) DEFAULT NULL,
  `metaRobot` varchar(255) DEFAULT NULL,
  `ogImage` varchar(255) DEFAULT NULL,
  `ogTitle` varchar(255) DEFAULT NULL,
  `twitterImage` varchar(255) DEFAULT NULL,
  `twitterTitle` varchar(255) DEFAULT NULL,
  `twitterType` varchar(255) DEFAULT NULL,
  `fbogTitle` varchar(255) DEFAULT NULL,
  `fbogType` varchar(255) DEFAULT NULL,
  `fbogSiteName` varchar(255) DEFAULT NULL,
  `metaDescription` text DEFAULT NULL,
  `fbogDescription` text DEFAULT NULL,
  `ogDescription` text DEFAULT NULL,
  `twitterDescription` text DEFAULT NULL,
  `organizationSchema` text DEFAULT NULL,
  `localSchema` text DEFAULT NULL,
  `websiteSchema` text DEFAULT NULL,
  `articleSchema` text DEFAULT NULL,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`uid`, `fieldId`, `type`, `title`, `metaTitle`, `metaKeyword`, `metaAuthor`, `metaRobot`, `ogImage`, `ogTitle`, `twitterImage`, `twitterTitle`, `twitterType`, `fbogTitle`, `fbogType`, `fbogSiteName`, `metaDescription`, `fbogDescription`, `ogDescription`, `twitterDescription`, `organizationSchema`, `localSchema`, `websiteSchema`, `articleSchema`, `deleteId`, `created_at`, `updated_at`) VALUES
('57dba819-3068-4ce5-b466-3425adf0ee2b', '0737cf58-f31f-49f7-bc5a-c8ff6a6a5728', 'Product', 'Test Title', 'Test Title', NULL, NULL, 'index', NULL, NULL, NULL, NULL, 'summary', NULL, 'website', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-09-24 13:15:25', '2024-09-24 13:15:25');

-- --------------------------------------------------------

--
-- Table structure for table `serviceablepincodes`
--

CREATE TABLE `serviceablepincodes` (
  `uid` varchar(255) NOT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `serviceablepincodes`
--

INSERT INTO `serviceablepincodes` (`uid`, `pincode`, `createdBy`, `created_at`, `updated_at`) VALUES
('6947e815-0c26-475f-bfce-ef8475f61f5d', '400705', 'Samruddhi Surve', '2024-09-13 12:00:29', '2024-09-13 12:00:29'),
('cf8da4b9-fb51-4f47-be5e-5f8ef67b1c7b', '400706', 'Samruddhi Surve', '2024-09-13 12:00:12', '2024-09-13 12:00:12');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `state` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state`, `status`) VALUES
(1, 'Andaman & Nicobar Islands', 'Active'),
(2, 'Andhra Pradesh', 'Active'),
(3, 'Arunachal Pradesh', 'Active'),
(4, 'Assam', 'Active'),
(5, 'Bihar', 'Active'),
(6, 'Chandigarh', 'Active'),
(7, 'Chhattisgarh', 'Active'),
(8, 'Dadra & Nagar Haveli', 'Active'),
(9, 'Daman & Diu', 'Active'),
(10, 'Delhi', 'Active'),
(11, 'Goa', 'Active'),
(12, 'Gujarat', 'Active'),
(13, 'Haryana', 'Active'),
(14, 'Himachal Pradesh', 'Active'),
(15, 'Jammu & Kashmir', 'Active'),
(16, 'Jharkhand', 'Active'),
(17, 'Karnataka', 'Active'),
(18, 'Kerala', 'Active'),
(19, 'Lakshadweep', 'Active'),
(20, 'Madhya Pradesh', 'Active'),
(21, 'Maharashtra', 'Active'),
(22, 'Manipur', 'Active'),
(23, 'Meghalaya', 'Active'),
(24, 'Mizoram', 'Active'),
(25, 'Nagaland', 'Active'),
(26, 'Odisha', 'Active'),
(27, 'Puducherry', 'Active'),
(28, 'Punjab', 'Active'),
(29, 'Rajasthan', 'Active'),
(30, 'Sikkim', 'Active'),
(31, 'Tamil Nadu', 'Active'),
(32, 'Tripura', 'Active'),
(33, 'Uttar Pradesh', 'Active'),
(34, 'Uttarakhand', 'Active'),
(35, 'West Bengal', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `imgAlt` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `starCount` int(11) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`uid`, `name`, `image`, `imgAlt`, `location`, `sequence`, `comment`, `starCount`, `createdBy`, `status`, `created_at`, `updated_at`) VALUES
('6373c60e-0ae1-49e5-b509-595041be5419', 'Samruddhi Surve', 'media/adminImages/other/testimonial/1726249276-image-student2.jpg', 'img_alt', 'Nerul', 1, 'Ever looked at Pizza Toppings and wondered, \"WHY SO LESS\"?\r\nWell, we did. And we definitely wanted more! So, we immediately took it upon ourselves to fix it, and made the pizzas that we all deserve - PIZZAS LOADED WITH', 5, 'Samruddhi Surve', 1, '2024-09-13 12:08:42', '2024-09-13 12:11:16');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `uid` varchar(255) NOT NULL,
  `outletUid` varchar(255) DEFAULT NULL,
  `customerUid` varchar(255) DEFAULT NULL,
  `actualAmount` decimal(8,2) DEFAULT NULL,
  `discountAmount` decimal(8,2) DEFAULT NULL,
  `discountCode` varchar(255) DEFAULT NULL,
  `paidAmount` decimal(8,2) DEFAULT NULL,
  `pgId1` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL,
  `instructions` text DEFAULT NULL,
  `addThrough` varchar(255) DEFAULT NULL,
  `refundAmount` decimal(8,2) DEFAULT NULL,
  `refundReason` varchar(255) DEFAULT NULL,
  `refundPgId` varchar(255) DEFAULT NULL,
  `paymentStatus` varchar(255) DEFAULT NULL,
  `deliveryAgentUid` varchar(255) DEFAULT NULL,
  `deliveryStatus` varchar(255) DEFAULT NULL,
  `deliveryDateTime` datetime DEFAULT NULL,
  `deliveryCharges` decimal(8,2) DEFAULT NULL,
  `cityId` varchar(255) DEFAULT NULL,
  `stateId` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `long` varchar(255) DEFAULT NULL,
  `placeId` varchar(255) DEFAULT NULL,
  `googleAddress` text DEFAULT NULL,
  `customerName` varchar(255) DEFAULT NULL,
  `customerPhone` varchar(255) DEFAULT NULL,
  `timeRequired` varchar(255) DEFAULT NULL,
  `invoiceNo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userpermissions`
--

CREATE TABLE `userpermissions` (
  `uid` varchar(255) NOT NULL,
  `userUid` varchar(255) DEFAULT NULL,
  `permission` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) DEFAULT NULL,
  `uid` varchar(255) NOT NULL,
  `outletUid` varchar(255) DEFAULT NULL,
  `profileImage` varchar(255) DEFAULT NULL,
  `profileImageAlt` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `empNo` varchar(255) DEFAULT NULL,
  `influencerTag` varchar(255) DEFAULT NULL,
  `influencerBio` text DEFAULT NULL,
  `influencerFbLink` varchar(255) DEFAULT NULL,
  `influencerInstaLink` varchar(255) DEFAULT NULL,
  `influencerYoutubeLink` varchar(255) DEFAULT NULL,
  `influencerWebsiteLink` varchar(255) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uid`, `outletUid`, `profileImage`, `profileImageAlt`, `fname`, `lname`, `slug`, `email`, `phone`, `password`, `role`, `empNo`, `influencerTag`, `influencerBio`, `influencerFbLink`, `influencerInstaLink`, `influencerYoutubeLink`, `influencerWebsiteLink`, `createdBy`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
(1, '1d1f8cfe-c444-4d81-abed-5430254c249d', '1d1f8cfe-c444-67h1-abed-5430254c249d', NULL, NULL, 'Samruddhi', 'Surve', 'samruddhi-surve', 'sam@gmail.com', '9876543210', '$2y$10$ZcxG7uw8Yx6wd8TV.hzMJONjzOQjmfbDPsSEp6sWOwPfD6.Bzd4U6', 'hyplap', 'EMP1805', NULL, NULL, NULL, NULL, NULL, NULL, '1d1f8cfe-c444-4d81-abed-5430254c249d', 1, 0, '2024-08-30 15:51:20', '2024-09-06 00:14:06'),
(NULL, '4a3cc096-fd36-4fba-a6b9-fa2dac537971', NULL, 'media/adminImages/users/1725600846-profileImage-hyplap logo.png', 'Hyplap Logo', 'Hyplap', 'User', 'hyplap-user', 'hyplap1@gmail.com', '9876543211', '$2y$12$ic2nYLYrN38BezDmGhCy9.k2Pk02G2GLVykNUlYSCU/aZlhdlJI1i', 'hyplap', 'EMP123', NULL, NULL, NULL, NULL, NULL, NULL, 'Samruddhi Surve', 1, 0, '2024-09-06 00:04:06', '2024-09-24 14:11:45'),
(NULL, 'e60fc2b4-0856-4a83-9ea9-a4bd4bd82f49', '1d1f8cfe-c444-67h1-abed-5430254c249d', 'media/adminImages/influencers/1725642787-profileImage-student2.jpg', 'Influencer Profile Image', 'Mansi', 'Surve', 'mansi-surve', 'mansi@gmail.com', '9889787878', '$2y$12$Mj7sq3DtWrjzIafmanfC4eOi2LDk/hG7URDtpk.qVKTjq7GsQkUi2', 'influencer', 'EMP789', 'Food Content Creator', 'n publishing and graphic design, Loram ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Loram ipsum may be used as a placeholder before the final copy is available. It is also used to temporarily replace text in a process called greeking,', 'https://www.facebook.com/mansi', 'https://www.instagram.com/mansi', 'https://youtube.com/ChannelName', 'https://www.example.com', '1d1f8cfe-c444-4d81-abed-5430254c249d', 1, 0, '2024-09-06 11:43:07', '2024-09-06 11:48:40');

-- --------------------------------------------------------

--
-- Table structure for table `wallethistories`
--

CREATE TABLE `wallethistories` (
  `uid` varchar(255) NOT NULL,
  `customerUid` varchar(255) DEFAULT NULL,
  `orderUuid` varchar(255) DEFAULT NULL,
  `trxUid` varchar(255) DEFAULT NULL,
  `adminRemark` text DEFAULT NULL,
  `flag` varchar(255) DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallethistories`
--

INSERT INTO `wallethistories` (`uid`, `customerUid`, `orderUuid`, `trxUid`, `adminRemark`, `flag`, `amount`, `type`, `createdBy`, `created_at`, `updated_at`) VALUES
('09e2a3d6-31b4-4209-91ae-b80512f9ab08', '253abdeb-aed6-43cb-9ad7-edc25190a7ba', NULL, NULL, NULL, 'admin', 200.00, 'Debit', 'Samruddhi Surve', '2024-09-13 11:43:44', '2024-09-13 11:43:44'),
('43ff26a2-d2be-4d59-b1a5-ba6a76064bec', '253abdeb-aed6-43cb-9ad7-edc25190a7ba', NULL, NULL, 'Test', 'admin', 200.00, 'Debit', 'Samruddhi Surve', '2024-10-15 12:48:46', '2024-10-15 12:48:46'),
('4b81c9bb-3761-4bd7-8555-da02ab8fddc3', '253abdeb-aed6-43cb-9ad7-edc25190a7ba', NULL, NULL, 'Test Remark', 'admin', 1000.00, 'Credit', 'Samruddhi Surve', '2024-09-13 11:43:31', '2024-09-13 11:43:31'),
('ea408bcf-456a-4a26-a233-3c6314926f00', '253abdeb-aed6-43cb-9ad7-edc25190a7ba', NULL, NULL, 'Test', 'admin', 200.00, 'Credit', 'Samruddhi Surve', '2024-10-15 12:48:29', '2024-10-15 12:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `uid` varchar(255) NOT NULL,
  `customerUid` varchar(255) DEFAULT NULL,
  `totalAmount` decimal(8,2) DEFAULT NULL,
  `paidAmount` decimal(8,2) DEFAULT NULL,
  `balanceAmount` decimal(8,2) DEFAULT NULL,
  `totalLoyaltyPoints` int(11) DEFAULT NULL,
  `usedLoyaltyPoints` int(11) DEFAULT NULL,
  `balanceLoyaltyPoints` int(11) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`uid`, `customerUid`, `totalAmount`, `paidAmount`, `balanceAmount`, `totalLoyaltyPoints`, `usedLoyaltyPoints`, `balanceLoyaltyPoints`, `createdBy`, `created_at`, `updated_at`) VALUES
('ded437b5-08a7-4a70-aa9c-8d113338be0f', '253abdeb-aed6-43cb-9ad7-edc25190a7ba', 800.00, 0.00, 800.00, 0, 0, 0, 'Samruddhi Surve', '2024-09-13 11:30:45', '2024-10-15 12:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `uid` varchar(255) NOT NULL,
  `customerUid` varchar(255) DEFAULT NULL,
  `productUid` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addoncategories`
--
ALTER TABLE `addoncategories`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `addoncategoryitems`
--
ALTER TABLE `addoncategoryitems`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `blogcategories`
--
ALTER TABLE `blogcategories`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cartaddons`
--
ALTER TABLE `cartaddons`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `combos`
--
ALTER TABLE `combos`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `couponlogs`
--
ALTER TABLE `couponlogs`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `customeraddresses`
--
ALTER TABLE `customeraddresses`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `customizations`
--
ALTER TABLE `customizations`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `customize`
--
ALTER TABLE `customize`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `customizeproducts`
--
ALTER TABLE `customizeproducts`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `notificationsegments`
--
ALTER TABLE `notificationsegments`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `notificationsegmentusers`
--
ALTER TABLE `notificationsegmentusers`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `notificationusers`
--
ALTER TABLE `notificationusers`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `orderaddons`
--
ALTER TABLE `orderaddons`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `outletproducts`
--
ALTER TABLE `outletproducts`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `outlets`
--
ALTER TABLE `outlets`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `productimagevideos`
--
ALTER TABLE `productimagevideos`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `productinfluencervideos`
--
ALTER TABLE `productinfluencervideos`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `productnutritions`
--
ALTER TABLE `productnutritions`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `productreviews`
--
ALTER TABLE `productreviews`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `productvarients`
--
ALTER TABLE `productvarients`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `quicksearches`
--
ALTER TABLE `quicksearches`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `rolepermissions`
--
ALTER TABLE `rolepermissions`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `sentnotifications`
--
ALTER TABLE `sentnotifications`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `seopages`
--
ALTER TABLE `seopages`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `serviceablepincodes`
--
ALTER TABLE `serviceablepincodes`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `userpermissions`
--
ALTER TABLE `userpermissions`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `wallethistories`
--
ALTER TABLE `wallethistories`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
