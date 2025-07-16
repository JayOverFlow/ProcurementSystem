<?php
/**
 * STEP - Status Tracking for e-Procurement
 *
 * This system follows a step-by-step procurement workflow—from initial PPMP submission to final delivery and issuance of items.
 * Each step reflects real-world roles and approvals, including planning, PR creation, PO processing, bidding, delivery, and item acknowledgment.
 * The process ensures structured tracking, accountability, and transparency throughout the entire procurement cycle.
 */

/**
 * Installation
 *
 * 1. Clone the repository:
 *    - git clone https://github.com/JayOverFlow/ProcurementSystem.git
 *    - cd ProcurementSystem
 *
 * 2. Import the database:
 *    - Install PHP 7.4+ and MySQL.
 *    - Import the included SQL file into your MySQL database.
 *
 * 3. Configure CodeIgniter:
 *    - Set database credentials in application/config/database.php.
 *
 * 4. Start the local server:
 *    "php spark serve"
 *
 * 5. Access the system:
 *    ('http://localhost:8080')
 */

/**
 * Usage Guide
 *
 * 1. Login:
 *    - Visit your local server (e.g. http://localhost:8080) and log in using your assigned credentials.
 *    - Each user type will have access to specific features based on their role.
 *      Example roles:
 *        ~ Faculty Member/Staff
 *        ~ Head
 *        ~ Planning Officer
 *        ~ Immediate Supervisor
 *        ~ Director
 *        ~ Procurement Office
 *        ~ Supply Office
 *        ~ Master Admin
 *    - Master Admin can assign roles and manage designations.
 *
 * 2. Procurement Workflow
 *    - The system supports a step-by-step procurement process:
 *
 *      2.1. Project Procurement Management Plan (PPMP) Submission
 *           - Head assign Project Procurement Management Plan (PPMP) to faculty → Faculty receives.
 *           - Faculty submits Project Procurement Management Plan (PPMP) → Head collects.
 *           - Head submits PPMP → Planning Officer receives and reviews the PPMP.
 *
 *      2.2. PPMP Evaluation
 *           - Planning Office approves or returns the PPMP with remarks.
 *           - Approved PPMP is used to create the Annual Procurement Plan (APP).
 *
 *      2.3. APP Approval
 *           - Planning Office submits APP to the Director.
 *           - Director reviews and approves or rejects the APP.
 *
 *      2.4. Purchase Request (PR) Assignment and Creation
 *           - Head assigns PR creation to a Faculty Member (or creates it themselves).
 *           - Faculty submits PR to Head for review and finalization.
 *
 *      2.5. PR Approval
 *           - Head submits final PR to Immediate Supervisor for approval.
 *           - Approved PR is received by the Procurement Office.
 *
 *      2.6. Bidding and Purchase Order (PO) Creation
 *           - The Supply Office handles the bidding process and updates the bidding status in the system.
 *           - Once an item is successfully bidded, the Procurement Office creates the Purchase Order (PO).
 *           - The PO is then submitted to the Director for approval.
 *           - After approval, the PO is forwarded to the Supply Office.
 *
 *      2.7. Delivery and Acknowledgment
 *           - The Supply Office updates the delivery status once items are received.
 *           - Delivered items are assigned to faculty members.
 *           - ICS (Inventory Custodian Slip) and PAR (Property Acknowledgment Receipt) documents are generated and confirmed.
 */

/**
 * License
 *
 * - This project is licensed under the MIT License.
 */
?>

