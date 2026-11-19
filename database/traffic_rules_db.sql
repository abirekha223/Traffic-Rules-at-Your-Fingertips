-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2026 at 01:17 PM
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
-- Database: `traffic_rules_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`admin_id`, `username`, `password`, `full_name`, `created_at`) VALUES
(1, 'Cookie123', '$2y$12$N6wxaMpq6Xsc1jgSSoJ9hutg5KIzflLVpaxGdwlcYuVIApcqKUYgu', 'Traffic Rules Administrator', '2026-09-15 20:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `faq_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `source` varchar(255) NOT NULL,
  `last_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`faq_id`, `question`, `answer`, `category`, `source`, `last_updated`) VALUES
(1, 'Do I need a driving licence to drive a motor vehicle?', 'Yes. A person must hold an effective driving licence authorising them to drive the particular class of motor vehicle in a public place.', 'Driving Licence', 'https://trafficpolicemumbai.maharashtra.gov.in/en/', '2026-09-16'),
(2, 'What is the minimum age for driving a motor vehicle?', 'Generally, a person must be at least 18 years old to drive a motor vehicle in a public place. A motorcycle without gear may be driven from the age of 16 subject to the conditions prescribed by law.', 'Driving Licence', 'https://trafficpolicemumbai.maharashtra.gov.in/en/', '2026-09-16'),
(3, 'Is wearing a helmet compulsory on a two-wheeler?', 'Yes. The law requires motorcycle drivers and applicable pillion riders to comply with the prescribed protective headgear requirements.', 'Road Safety', 'https://trafficpolicemumbai.maharashtra.gov.in/en/', '2026-09-16'),
(4, 'Is wearing a seat belt compulsory?', 'Drivers and passengers should use the prescribed safety belts in vehicles where seat belts are provided, in accordance with the applicable motor vehicle rules.', 'Road Safety', 'https://trafficpolicemumbai.maharashtra.gov.in/en/', '2026-09-16'),
(5, 'Can I use my mobile phone while driving?', 'Using a mobile phone while driving can distract the driver and may constitute a traffic violation depending on how the device is being used. Drivers should safely stop the vehicle before using a mobile phone.', 'Road Safety', 'https://trafficpolicemumbai.maharashtra.gov.in/en/', '2026-09-16'),
(6, 'Can I drive after drinking alcohol?', 'No. Driving or attempting to drive while under the influence of alcohol or drugs beyond the prescribed limit is an offence under the Motor Vehicles Act.', 'Offences', 'https://trafficpolicemumbai.maharashtra.gov.in/en/', '2026-09-16'),
(7, 'What should I do when an ambulance approaches?', 'Road users should give way to an ambulance, fire service vehicle or other specified emergency vehicle and allow it to pass safely.', 'Emergency', 'https://trafficpolicemumbai.maharashtra.gov.in/en/', '2026-09-16'),
(8, 'What should I do after a road accident?', 'The driver or person in charge of the vehicle should take reasonable steps to secure medical attention for injured persons and comply with the reporting and assistance requirements prescribed by law.', 'Accidents', 'https://trafficpolicemumbai.maharashtra.gov.in/en/', '2026-09-16'),
(9, 'Can I park anywhere on the road?', 'No. Vehicles should not be parked or left in a position that causes or is likely to cause danger, obstruction or undue inconvenience to other road users. Traffic signs and local parking restrictions must also be followed.', 'Parking', 'https://trafficpolicemumbai.maharashtra.gov.in/en/', '2026-09-16'),
(10, 'What does a No Entry sign mean?', 'A No Entry sign means that vehicles are not permitted to enter the road or area beyond the sign. Drivers must follow the restriction and use an appropriate alternative route.', 'Traffic Signs', 'https://trafficpolicemumbai.maharashtra.gov.in/en/', '2026-09-16'),
(11, 'What does a Give Way sign mean?', 'A Give Way sign means that the driver must give priority to traffic on the road being entered or crossed and proceed only when it is safe.', 'Traffic Signs', 'https://trafficpolicemumbai.maharashtra.gov.in/en/', '2026-09-16'),
(12, 'How can I check current traffic restrictions in Mumbai?', 'Traffic restrictions such as road closures, no-entry restrictions, no-parking zones and diversions can be issued by the Traffic Police. Citizens should check the latest official Mumbai Traffic Police public notices for current restrictions.', 'Traffic Updates', 'https://trafficpolicemumbai.maharashtra.gov.in/en/', '2026-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `offences`
--

CREATE TABLE `offences` (
  `offence_id` int(11) NOT NULL,
  `offence_name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `vehicle_type` varchar(100) NOT NULL,
  `penalty` varchar(255) NOT NULL,
  `legal_reference` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `last_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offences`
--

INSERT INTO `offences` (`offence_id`, `offence_name`, `description`, `vehicle_type`, `penalty`, `legal_reference`, `source`, `last_updated`) VALUES
(1, 'Driving Without a Valid Licence', 'Driving a motor vehicle without holding a valid driving licence as required by law.', 'All motor vehicles', 'Fine up to Rs. 5,000 or imprisonment up to 3 months, or both.', 'Motor Vehicles Act, 1988 - Section 181', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(2, 'Allowing an Unauthorised Person to Drive', 'An owner or person in charge of a vehicle must not allow a person who does not satisfy the legal requirements for driving to operate the vehicle.', 'All motor vehicles', 'Fine up to Rs. 1,000 or imprisonment up to 3 months, or both.', 'Motor Vehicles Act, 1988 - Section 180', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(3, 'Overspeeding', 'Driving a motor vehicle above the speed limit prescribed for the road or vehicle.', 'All motor vehicles', 'Penalty as prescribed under the applicable law and enforcement schedule.', 'Motor Vehicles Act, 1988 - Section 183', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(4, 'Dangerous Driving', 'Driving a motor vehicle at a speed or in a manner that is dangerous to the public, considering traffic and road conditions.', 'All motor vehicles', 'First offence: imprisonment up to 6 months or fine up to Rs. 1,000, or both. Higher punishment applies to certain subsequent offences.', 'Motor Vehicles Act, 1988 - Section 184', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(5, 'Drunk or Drugged Driving', 'Driving or attempting to drive a motor vehicle while under the influence of alcohol or drugs to an extent that affects proper control of the vehicle.', 'All motor vehicles', 'First offence: imprisonment up to 6 months or fine up to Rs. 2,000, or both. Higher punishment applies to subsequent offences.', 'Motor Vehicles Act, 1988 - Section 185', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(6, 'Driving an Uninsured Vehicle', 'Using or allowing a motor vehicle to be used without the insurance required under the Motor Vehicles Act.', 'All motor vehicles', 'First offence: fine of Rs. 2,000 or imprisonment up to 3 months, or both. Subsequent offence: fine of Rs. 4,000 or imprisonment up to 3 months, or both.', 'Motor Vehicles Act, 1988 - Section 196', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(7, 'Driving Without Protective Headgear', 'Driving or allowing a motorcycle to be driven without complying with the protective headgear requirements.', 'Two-wheelers', 'Fine of Rs. 1,000 and disqualification from holding a driving licence for 3 months.', 'Motor Vehicles Act, 1988 - Section 194D', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(8, 'Failure to Allow Emergency Vehicles to Pass', 'Failing to give way to an approaching ambulance, fire service vehicle or other specified emergency vehicle.', 'All motor vehicles', 'Imprisonment up to 6 months or fine up to Rs. 10,000, or both.', 'Motor Vehicles Act, 1988 - Section 194E', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(9, 'Improper Use of Horn', 'Using the horn needlessly or continuously, using it more than necessary for safety, or using it where a no-horn traffic sign applies.', 'All motor vehicles', 'Fine of Rs. 1,000 for the first offence and Rs. 2,000 for a second or subsequent offence.', 'Motor Vehicles Act, 1988 - Section 194F', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(10, 'Driving an Unsafe Vehicle', 'Driving or allowing a vehicle to be driven when it has a known or discoverable defect that can make it dangerous to people or vehicles.', 'All motor vehicles', 'Penalty as prescribed under Section 190 of the Motor Vehicles Act. Additional punishment may apply where an unsafe condition causes injury or property damage.', 'Motor Vehicles Act, 1988 - Section 190', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(11, 'Exceeding Permissible Weight', 'Driving a vehicle carrying weight beyond the permissible limits prescribed under the Motor Vehicles Act.', 'Transport and goods vehicles', 'Penalty as prescribed under Section 194, including additional charges related to excess load and off-loading.', 'Motor Vehicles Act, 1988 - Section 194', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(12, 'Carrying Excess Passengers', 'Carrying passengers beyond the permitted seating or passenger capacity of the vehicle.', 'Passenger and transport vehicles', 'Penalty as prescribed under Section 194A for each excess passenger.', 'Motor Vehicles Act, 1988 - Section 194A', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(13, 'Not Wearing a Seat Belt', 'Failure to use a safety belt as required while travelling in a motor vehicle, or failure to ensure compliance with applicable child-seating requirements.', 'Four-wheelers', 'Fine as prescribed under Section 194B and applicable enforcement rules.', 'Motor Vehicles Act, 1988 - Section 194B', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(14, 'Violation of Motorcycle Safety Measures', 'Failure to comply with prescribed safety measures applicable to motorcycle drivers and pillion riders.', 'Two-wheelers', 'Fine as prescribed under Section 194C and applicable rules.', 'Motor Vehicles Act, 1988 - Section 194C', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(15, 'Using a Vehicle Without Registration', 'Using a motor vehicle in a public place without a valid registration as required by law.', 'All motor vehicles', 'Penalty as prescribed under Section 192 of the Motor Vehicles Act.', 'Motor Vehicles Act, 1988 - Section 192', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `road_signs`
--

CREATE TABLE `road_signs` (
  `sign_id` int(11) NOT NULL,
  `sign_name` varchar(150) NOT NULL,
  `category` varchar(100) NOT NULL,
  `meaning` text NOT NULL,
  `action_required` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `last_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `road_signs`
--

INSERT INTO `road_signs` (`sign_id`, `sign_name`, `category`, `meaning`, `action_required`, `image`, `source`, `last_updated`) VALUES
(1, 'Stop', 'Mandatory', 'Indicates that the driver must come to a complete stop before proceeding.', 'Stop completely and proceed only when it is safe.', 'stop.png', 'https://transport.maharashtra.gov.in/1161/Road-Signs', '2026-09-16'),
(2, 'Give Way', 'Mandatory', 'Indicates that the driver must give priority to traffic on the road being entered or crossed.', 'Slow down and give way to other traffic.', 'give-way.png', 'https://transport.maharashtra.gov.in/1161/Road-Signs', '2026-09-16'),
(3, 'No Entry', 'Mandatory', 'Indicates that vehicles are not permitted to enter the road or area beyond the sign.', 'Do not enter.', 'no-entry.png', 'https://transport.maharashtra.gov.in/1161/Road-Signs', '2026-09-16'),
(4, 'No Parking', 'Mandatory', 'Indicates that parking of vehicles is prohibited in the area where the sign is displayed.', 'Do not park the vehicle in the restricted area.', 'no-parking.png', 'https://transport.maharashtra.gov.in/1161/Road-Signs', '2026-09-16'),
(5, 'No Stopping', 'Mandatory', 'Indicates that vehicles are not permitted to stop in the restricted area except where specifically permitted.', 'Do not stop or wait in the restricted area.', 'no-stopping.png', 'https://transport.maharashtra.gov.in/1161/Road-Signs', '2026-09-16'),
(6, 'Speed Limit', 'Mandatory', 'Indicates the maximum permitted speed for vehicles on the road or section of road.', 'Do not exceed the displayed speed limit.', 'speed-limit.png', 'https://transport.maharashtra.gov.in/1161/Road-Signs', '2026-09-16'),
(7, 'No Overtaking', 'Mandatory', 'Indicates that overtaking of other vehicles is prohibited in the area.', 'Do not overtake another vehicle.', 'no-overtaking.png', 'https://transport.maharashtra.gov.in/1161/Road-Signs', '2026-09-16'),
(8, 'Compulsory Keep Left', 'Mandatory', 'Indicates that vehicles must keep to the left side of the road or traffic island as directed.', 'Keep to the left as indicated by the sign.', 'keep-left.png', 'https://transport.maharashtra.gov.in/1161/Road-Signs', '2026-09-16'),
(9, 'Right Hand Curve', 'Cautionary', 'Warns drivers that the road ahead curves towards the right.', 'Reduce speed and drive carefully around the curve.', 'right-curve.png', 'https://transport.maharashtra.gov.in/1161/Road-Signs', '2026-09-16'),
(10, 'Left Hand Curve', 'Cautionary', 'Warns drivers that the road ahead curves towards the left.', 'Reduce speed and drive carefully around the curve.', 'left-curve.png', 'https://transport.maharashtra.gov.in/1161/Road-Signs', '2026-09-16'),
(11, 'Narrow Bridge', 'Cautionary', 'Warns drivers that the road ahead passes over a narrow bridge.', 'Reduce speed and proceed carefully.', 'narrow-bridge.png', 'https://transport.maharashtra.gov.in/1161/Road-Signs', '2026-09-16'),
(12, 'Pedestrian Crossing', 'Cautionary', 'Warns drivers that pedestrians may be crossing the road ahead.', 'Slow down and watch for pedestrians.', 'pedestrian-crossing.png', 'https://transport.maharashtra.gov.in/1161/Road-Signs', '2026-09-16'),
(13, 'School Ahead', 'Cautionary', 'Warns drivers that a school or area frequently used by children is ahead.', 'Slow down and watch carefully for children and pedestrians.', 'school-ahead.png', 'https://transport.maharashtra.gov.in/1161/Road-Signs', '2026-09-16'),
(14, 'Men at Work', 'Cautionary', 'Warns drivers that road construction or maintenance work is being carried out ahead.', 'Slow down and follow temporary traffic directions.', 'men-at-work.png', 'https://transport.maharashtra.gov.in/1161/Road-Signs', '2026-09-16'),
(15, 'Cross Road', 'Cautionary', 'Warns drivers that another road crosses the road ahead.', 'Slow down and watch for crossing traffic.', 'cross-road.png', 'https://transport.maharashtra.gov.in/1161/Road-Signs', '2026-09-16'),
(16, 'Roundabout', 'Cautionary', 'Warns drivers that a roundabout is ahead.', 'Reduce speed and follow the direction of traffic around the roundabout.', 'roundabout.png', 'https://transport.maharashtra.gov.in/1161/Road-Signs', '2026-09-16'),
(17, 'Speed Breaker', 'Cautionary', 'Warns drivers that a speed breaker or hump is present ahead.', 'Reduce speed before reaching the speed breaker.', 'speed-breaker.png', 'https://transport.maharashtra.gov.in/1161/Road-Signs', '2026-09-16'),
(18, 'Hospital', 'Informatory', 'Indicates the location or direction of a hospital or medical facility.', 'Drive carefully and follow the indicated direction.', 'hospital.png', 'https://transport.maharashtra.gov.in/1161/Road-Signs', '2026-09-16'),
(19, 'Parking', 'Informatory', 'Indicates an area where vehicles may be parked.', 'Park only in the designated parking area.', 'parking.png', 'https://transport.maharashtra.gov.in/1161/Road-Signs', '2026-09-16'),
(20, 'Petrol Pump', 'Informatory', 'Indicates the location or direction of a petrol pump or fuel station.', 'Follow the indicated direction if fuel is required.', 'petrol-pump.png', 'https://transport.maharashtra.gov.in/1161/Road-Signs', '2026-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `traffic_rules`
--

CREATE TABLE `traffic_rules` (
  `rule_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `applicable_to` varchar(100) NOT NULL,
  `source` varchar(255) NOT NULL,
  `last_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `traffic_rules`
--

INSERT INTO `traffic_rules` (`rule_id`, `category`, `title`, `description`, `applicable_to`, `source`, `last_updated`) VALUES
(1, 'Traffic Signs', 'Obey Mandatory Traffic Signs', 'Drivers must follow mandatory traffic signs and comply with directions given by police officers regulating traffic in public places.', 'All motor vehicles', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(2, 'Speed', 'Follow the Prescribed Speed Limit', 'Drivers must not exceed the speed limit prescribed for the particular road, vehicle or area.', 'All motor vehicles', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(3, 'Helmet Safety', 'Wear a Protective Helmet', 'Every person driving or riding a motorcycle in a public place must wear protective headgear that meets the prescribed safety standards. The helmet must be securely fastened.', 'Motorcycle riders and pillion riders', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(4, 'Two-Wheeler Safety', 'Carry Only One Pillion Rider', 'A two-wheeler driver must not carry more than one person in addition to the driver. The pillion rider must sit on a proper seat securely fixed behind the driver.', 'Two-wheeler drivers', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(5, 'Driving Licence', 'Carry a Valid Driving Licence', 'A person driving a motor vehicle in a public place must hold the appropriate driving licence. The licence must be produced for examination when required by an authorised police officer.', 'All motor vehicle drivers', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(6, 'Parking', 'Do Not Park in a Dangerous or Prohibited Position', 'A vehicle must not be left in a public place in a position or condition that causes or is likely to cause danger, obstruction or undue inconvenience to other road users.', 'All motor vehicles', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(7, 'Vehicle Safety', 'Do Not Leave a Vehicle Unsecured', 'When a vehicle is stationary in a public place, appropriate precautions must be taken so that it cannot accidentally be put into motion when the driver is absent.', 'All motor vehicles', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(8, 'Road Safety', 'Use Proper Signals', 'Drivers must give the prescribed signals when required, including signals for turning or stopping, using the appropriate signalling device.', 'All motor vehicles', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(9, 'Accident', 'Follow the Required Procedure After an Accident', 'When a motor vehicle accident results in injury or third-party property damage, the driver must take reasonable steps to secure medical attention for injured persons and report the circumstances as required by law.', 'All motor vehicle drivers', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(10, 'Emergency Vehicles', 'Give Way to Emergency Vehicles', 'Road users must allow free passage to emergency vehicles such as ambulances and other vehicles entitled to priority under the applicable traffic rules.', 'All road users', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(11, 'Seat Belt Safety', 'Wear Seat Belts in Four-Wheelers', 'The driver and occupants of a four-wheeler should wear seat belts while the vehicle is moving. Seat belts help reduce the risk of serious injury during a collision.', 'Four-wheeler drivers and passengers', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(12, 'Mobile Phone Safety', 'Do Not Use Mobile Phones While Driving', 'Drivers should not use mobile phones while driving. If an urgent call is necessary, the driver should safely park the vehicle before using the phone.', 'All motor vehicle drivers', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(13, 'Drunk Driving', 'Do Not Drink and Drive', 'A driver must never drive after consuming alcohol or any substance that affects the ability to drive safely.', 'All motor vehicle drivers', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(14, 'Lane Changing', 'Use Indicators When Changing Direction or Lane', 'Drivers should use the appropriate indicators or hand signals before changing lanes or turning so that other road users are aware of their intention.', 'All motor vehicle drivers', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(15, 'Pedestrian Safety', 'Give Way to Pedestrians at Crossings', 'Drivers should slow down or stop and allow pedestrians to cross safely at appropriate zebra crossings and pedestrian crossings.', 'All motor vehicle drivers', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(16, 'Safe Distance', 'Maintain a Safe Distance from the Vehicle Ahead', 'A driver should maintain sufficient distance from the vehicle ahead so that the vehicle can be stopped safely if the vehicle in front suddenly slows down or stops.', 'All motor vehicle drivers', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(17, 'Braking Safety', 'Avoid Sudden Braking', 'Drivers should avoid applying the brakes abruptly unless it is necessary for safety. Sudden braking can increase the risk of collisions with vehicles behind.', 'All motor vehicle drivers', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(18, 'Vehicle Fitness', 'Keep Your Vehicle in Safe Working Condition', 'Drivers should ensure that their vehicles are properly maintained and roadworthy. Regular checks can help prevent breakdowns and unsafe situations on the road.', 'All motor vehicle owners and drivers', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(19, 'Vehicle Loading', 'Do Not Overload the Vehicle', 'Vehicles should not be overloaded with passengers or luggage beyond the permitted limits. Overloading can affect vehicle control and road safety.', 'All motor vehicle drivers and owners', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16'),
(20, 'Driver Safety', 'Do Not Obstruct the Driver', 'No person or object should be placed in a position that interferes with the driver’s control of the vehicle.', 'All motor vehicle drivers and passengers', 'https://www.mahapolice.gov.in/uploads/acts_rules/TheMotorVehicleAct,1988.pdf', '2026-09-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `offences`
--
ALTER TABLE `offences`
  ADD PRIMARY KEY (`offence_id`);

--
-- Indexes for table `road_signs`
--
ALTER TABLE `road_signs`
  ADD PRIMARY KEY (`sign_id`);

--
-- Indexes for table `traffic_rules`
--
ALTER TABLE `traffic_rules`
  ADD PRIMARY KEY (`rule_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `offences`
--
ALTER TABLE `offences`
  MODIFY `offence_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `road_signs`
--
ALTER TABLE `road_signs`
  MODIFY `sign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `traffic_rules`
--
ALTER TABLE `traffic_rules`
  MODIFY `rule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
